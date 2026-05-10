<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Service;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;

class ServiceController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth', ['except' => ['getSubcategories']]);
    }

    public function index()
    {
        $services = Service::with('category')
            ->orderBy('category')
            ->orderBy('name')
            ->paginate(15);

        return view('admin.services.index', compact('services'));
    }

    public function create()
    {
        $categories = Category::where('is_active', true)
            ->orderBy('sort_order')
            ->get();

        return view('admin.services.create', compact('categories'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'slug' => 'nullable|string|max:255|unique:services,slug',
            'description' => 'nullable|string',
            'short_description' => 'nullable|string|max:500',
            'original_price' => 'required|numeric|min:0',
            'final_price' => 'required|numeric|min:0',
            'discount_percentage' => 'nullable|numeric|min:0|max:100',
            'duration' => 'nullable|integer|min:1',
            'category' => 'required|string|exists:categories,name',
            'subcategory' => 'nullable|string|max:255',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'is_active' => 'boolean'
        ]);

        $data = $request->all();

        // Generate slug if not provided
        if (empty($data['slug'])) {
            $data['slug'] = Str::slug($data['name']);
        }

        // Calculate discount percentage if not provided
        if (empty($data['discount_percentage']) && $data['original_price'] > $data['final_price']) {
            $data['discount_percentage'] = round((($data['original_price'] - $data['final_price']) / $data['original_price']) * 100, 2);
        }

        // Handle image upload
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('services', 'public');
            $data['image'] = $imagePath;
        }

        // Set default values
        $data['is_active'] = $request->has('is_active') ? 1 : 0;

        Service::create($data);

        return redirect()
            ->route('admin.services.index')
            ->with('success', 'Service created successfully!');
    }

    public function show(Service $service)
    {
        $service->load('category');
        return view('admin.services.show', compact('service'));
    }

    public function edit(Service $service)
    {
        $categories = Category::where('is_active', true)
            ->orderBy('sort_order')
            ->get();

        return view('admin.services.edit', compact('service', 'categories'));
    }

    public function update(Request $request, Service $service)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'slug' => 'nullable|string|max:255|unique:services,slug,' . $service->id,
            'description' => 'nullable|string',
            'short_description' => 'nullable|string|max:500',
            'original_price' => 'required|numeric|min:0',
            'final_price' => 'required|numeric|min:0',
            'discount_percentage' => 'nullable|numeric|min:0|max:100',
            'duration' => 'nullable|integer|min:1',
            'category' => 'required|string|exists:categories,name',
            'subcategory' => 'nullable|string|max:255',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'is_active' => 'boolean'
        ]);

        $data = $request->except(['image']);

        // Generate slug if not provided
        if (empty($data['slug'])) {
            $data['slug'] = Str::slug($data['name']);
        }

        // Calculate discount percentage if not provided
        if (empty($data['discount_percentage']) && $data['original_price'] > $data['final_price']) {
            $data['discount_percentage'] = round((($data['original_price'] - $data['final_price']) / $data['original_price']) * 100, 2);
        }

        // Handle image upload
        if ($request->hasFile('image')) {
            // Delete old image
            if ($service->image && Storage::disk('public')->exists($service->image)) {
                Storage::disk('public')->delete($service->image);
            }

            $imagePath = $request->file('image')->store('services', 'public');
            $data['image'] = $imagePath;
        }

        // Set default values
        $data['is_active'] = $request->has('is_active') ? 1 : 0;

        $service->update($data);

        return redirect()
            ->route('admin.services.index')
            ->with('success', 'Service updated successfully!');
    }

    public function destroy(Service $service)
    {
        // Delete image if exists
        if ($service->image && Storage::disk('public')->exists($service->image)) {
            Storage::disk('public')->delete($service->image);
        }

        $service->delete();

        return redirect()
            ->route('admin.services.index')
            ->with('success', 'Service deleted successfully!');
    }

    public function getSubcategories(Request $request)
    {
        try {
            $category = Category::where('name', $request->category)->first();
            
            if ($category && $category->submenu) {
                $subcategories = [];
                
                foreach ($category->submenu as $index => $subcategory) {
                    // Count existing services for this subcategory
                    $serviceCount = Service::where('category', $category->name)
                        ->where('subcategory', $subcategory)
                        ->count();
                    
                    $subcategories[] = [
                        'id' => $index + 1,
                        'name' => $subcategory,
                        'slug' => Str::slug($subcategory),
                        'service_count' => $serviceCount,
                        'status' => $serviceCount > 0 ? 'Has Services' : 'Empty'
                    ];
                }
                
                return response()->json([
                    'success' => true,
                    'category' => $category->name,
                    'subcategories' => $subcategories,
                    'total_subcategories' => count($subcategories)
                ]);
            }

            return response()->json([
                'success' => false,
                'message' => 'No subcategories found for this category',
                'subcategories' => []
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Error loading subcategories: ' . $e->getMessage(),
                'subcategories' => []
            ], 500);
        }
    }
}
