<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Validation\Rule;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categories = Category::orderBy('sort_order', 'asc')
            ->orderBy('name', 'asc')
            ->withCount('services')
            ->get();
            
        return view('admin.categories.index', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.categories.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:100|unique:categories,name',
            'title' => 'required|string|max:200',
            'description' => 'nullable|string|max:500',
            'tagline' => 'nullable|string|max:300',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'category_icon_image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'submenu' => 'nullable|array',
            'submenu.*' => 'string|max:200',
            'is_active' => 'boolean',
            'sort_order' => 'integer|min:0'
        ]);

        $data = $request->except('image');
        $data['slug'] = Str::slug($request->name);
        $data['is_active'] = $request->has('is_active');
        
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('categories', 'public');
            $data['image'] = $imagePath;
        }
        
        if ($request->hasFile('category_icon_image')) {
            $iconImagePath = $request->file('category_icon_image')->store('categories/icons', 'public');
            $data['category_icon_image'] = $iconImagePath;
        }

        Category::create($data);

        return redirect()->route('admin.categories.index')
            ->with('success', 'Category created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Category $category)
    {
        $category->load('services');
        return view('admin.categories.show', compact('category'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Category $category)
    {
        return view('admin.categories.edit', compact('category'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Category $category)
    {
        $request->validate([
            'name' => [
                'required',
                'string',
                'max:100',
                Rule::unique('categories', 'name')->ignore($category->id)
            ],
            'title' => 'required|string|max:200',
            'description' => 'nullable|string|max:500',
            'tagline' => 'nullable|string|max:300',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'category_icon_image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'submenu' => 'nullable|array',
            'submenu.*' => 'string|max:200',
            'is_active' => 'boolean',
            'sort_order' => 'integer|min:0'
        ]);

        $data = $request->except(['image', 'category_icon_image']);
        $data['slug'] = Str::slug($request->name);
        $data['is_active'] = $request->has('is_active');
        
        if ($request->hasFile('image')) {
            // Delete old image if exists
            if ($category->image && \Storage::disk('public')->exists($category->image)) {
                \Storage::disk('public')->delete($category->image);
            }
            
            $imagePath = $request->file('image')->store('categories', 'public');
            $data['image'] = $imagePath;
        }
        
        if ($request->hasFile('category_icon_image')) {
            // Delete old icon image if exists
            if ($category->category_icon_image && \Storage::disk('public')->exists($category->category_icon_image)) {
                \Storage::disk('public')->delete($category->category_icon_image);
            }
            
            $iconImagePath = $request->file('category_icon_image')->store('categories/icons', 'public');
            $data['category_icon_image'] = $iconImagePath;
        }

        $category->update($data);

        return redirect()->route('admin.categories.index')
            ->with('success', 'Category updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Category $category)
    {
        // Check if category has services
        if ($category->services()->count() > 0) {
            return redirect()->route('admin.categories.index')
                ->with('error', 'Cannot delete category. It has associated services.');
        }

        // Delete image if exists
        if ($category->image && \Storage::disk('public')->exists($category->image)) {
            \Storage::disk('public')->delete($category->image);
        }
        
        // Delete category icon image if exists
        if ($category->category_icon_image && \Storage::disk('public')->exists($category->category_icon_image)) {
            \Storage::disk('public')->delete($category->category_icon_image);
        }

        $category->delete();

        return redirect()->route('admin.categories.index')
            ->with('success', 'Category deleted successfully.');
    }
}
