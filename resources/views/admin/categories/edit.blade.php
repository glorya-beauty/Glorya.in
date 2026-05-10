@extends('admin.layouts.app')

@section('title', 'Edit Category')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h5 class="mb-0">Edit Category: {{ $category->name }}</h5>
                    <div>
                        <a href="{{ route('admin.categories.show', $category) }}" class="btn btn-outline-info me-2">
                            <i class="fas fa-eye"></i> View
                        </a>
                        <a href="{{ route('admin.categories.index') }}" class="btn btn-outline-secondary">
                            <i class="fas fa-arrow-left"></i> Back to Categories
                        </a>
                    </div>
                </div>
                <div class="card-body">
                    <form action="{{ route('admin.categories.update', $category) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        
                        <div class="row">
                            <div class="col-md-8">
                                <div class="mb-3">
                                    <label for="name" class="form-label">Category Name <span class="text-danger">*</span></label>
                                    <input type="text" 
                                           class="form-control @error('name') is-invalid @enderror" 
                                           id="name" 
                                           name="name" 
                                           value="{{ old('name', $category->name) }}" 
                                           required>
                                    @error('name')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="mb-3">
                                    <label for="title" class="form-label">Category Title <span class="text-danger">*</span></label>
                                    <input type="text" 
                                           class="form-control @error('title') is-invalid @enderror" 
                                           id="title" 
                                           name="title" 
                                           value="{{ old('title', $category->title) }}" 
                                           required>
                                    <small class="form-text text-muted">Display title for the category (max 200 characters)</small>
                                    @error('title')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="mb-3">
                                    <label for="description" class="form-label">Description</label>
                                    <textarea class="form-control @error('description') is-invalid @enderror" 
                                              id="description" 
                                              name="description" 
                                              rows="4">{{ old('description', $category->description) }}</textarea>
                                    <small class="form-text text-muted">Brief description of the category (max 500 characters)</small>
                                    @error('description')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="mb-3">
                                    <label for="tagline" class="form-label">Tagline</label>
                                    <textarea class="form-control @error('tagline') is-invalid @enderror" 
                                              id="tagline" 
                                              name="tagline" 
                                              rows="2">{{ old('tagline', $category->tagline) }}</textarea>
                                    <small class="form-text text-muted">Catchy tagline for the category (max 300 characters)</small>
                                    @error('tagline')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="mb-3">
                                    <label for="image" class="form-label">Category Image</label>
                                    <input type="file" 
                                           class="form-control @error('image') is-invalid @enderror" 
                                           id="image" 
                                           name="image" 
                                           accept="image/*">
                                    <small class="form-text text-muted">Recommended size: 800x600px. Max file size: 2MB</small>
                                    @if($category->image)
                                        <div class="mt-2">
                                            <img src="{{ asset('storage/' . $category->image) }}" alt="{{ $category->name }}" class="img-thumbnail" style="max-height: 100px;">
                                            <small class="form-text text-muted">Current image</small>
                                        </div>
                                    @endif
                                    @error('image')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="mb-3">
                                    <label for="category_icon_image" class="form-label">Category Title Icon Image</label>
                                    <input type="file" 
                                           class="form-control @error('category_icon_image') is-invalid @enderror" 
                                           id="category_icon_image" 
                                           name="category_icon_image" 
                                           accept="image/*">
                                    <small class="form-text text-muted">Icon for category title display. Recommended size: 64x64px. Max file size: 2MB</small>
                                    @if($category->category_icon_image)
                                        <div class="mt-2">
                                            <img src="{{ asset('storage/' . $category->category_icon_image) }}" alt="{{ $category->name }} icon" class="img-thumbnail" style="max-height: 50px;">
                                            <small class="form-text text-muted">Current icon</small>
                                        </div>
                                    @endif
                                    @error('category_icon_image')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="card">
                                    <div class="card-header">
                                        <h6 class="mb-0">Category Settings</h6>
                                    </div>
                                    <div class="card-body">
                                        <div class="mb-3">
                                            <label for="sort_order" class="form-label">Sort Order</label>
                                            <input type="number" 
                                                   class="form-control @error('sort_order') is-invalid @enderror" 
                                                   id="sort_order" 
                                                   name="sort_order" 
                                                   value="{{ old('sort_order', $category->sort_order) }}" 
                                                   min="0">
                                            <small class="form-text text-muted">Lower numbers appear first</small>
                                            @error('sort_order')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>

                                        <div class="mb-3">
                                            <label for="submenu" class="form-label">Submenu Items</label>
                                            <div id="submenu-container">
                                                @if($category->submenu && count($category->submenu) > 0)
                                                    @foreach($category->submenu as $index => $item)
                                                        <div class="submenu-item mb-2">
                                                            <div class="input-group">
                                                                <input type="text" 
                                                                       class="form-control @error('submenu.'.$index) is-invalid @enderror" 
                                                                       name="submenu[]" 
                                                                       placeholder="Enter submenu item"
                                                                       value="{{ old('submenu.'.$index, $item) }}">
                                                                <button type="button" class="btn btn-outline-danger" onclick="removeSubmenuItem(this)">
                                                                    <i class="fas fa-trash"></i>
                                                                </button>
                                                            </div>
                                                            @error('submenu.'.$index)
                                                                <div class="invalid-feedback">{{ $message }}</div>
                                                            @enderror
                                                        </div>
                                                    @endforeach
                                                @else
                                                    <div class="submenu-item mb-2">
                                                        <div class="input-group">
                                                            <input type="text" 
                                                                   class="form-control @error('submenu.*') is-invalid @enderror" 
                                                                   name="submenu[]" 
                                                                   placeholder="Enter submenu item"
                                                                   value="{{ old('submenu.0') }}">
                                                            <button type="button" class="btn btn-outline-danger" onclick="removeSubmenuItem(this)">
                                                                <i class="fas fa-trash"></i>
                                                            </button>
                                                        </div>
                                                    </div>
                                                @endif
                                            </div>
                                            <button type="button" class="btn btn-outline-primary btn-sm mt-2" onclick="addSubmenuItem()">
                                                <i class="fas fa-plus"></i> Add Submenu Item
                                            </button>
                                            <small class="form-text text-muted">Add submenu items that will appear under this category</small>
                                            @error('submenu.*')
                                                <div class="invalid-feedback">Please check submenu items for errors</div>
                                            @enderror
                                        </div>

                                        <div class="mb-3">
                                            <div class="form-check">
                                                <input class="form-check-input" 
                                                       type="checkbox" 
                                                       id="is_active" 
                                                       name="is_active" 
                                                       value="1" 
                                                       {{ old('is_active', $category->is_active) ? 'checked' : '' }}>
                                                <label class="form-check-label" for="is_active">
                                                    Active
                                                </label>
                                            </div>
                                            <small class="form-text text-muted">Inactive categories won't be shown on the website</small>
                                        </div>

                                        <div class="alert alert-info">
                                            <i class="fas fa-info-circle"></i>
                                            <strong>Current Slug:</strong><br>
                                            <code>{{ $category->slug }}</code>
                                            <br>
                                            <small class="text-muted">Will be updated based on category name</small>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row mt-4">
                            <div class="col-12">
                                <button type="submit" class="btn btn-primary">
                                    <i class="fas fa-save"></i> Update Category
                                </button>
                                <a href="{{ route('admin.categories.index') }}" class="btn btn-outline-secondary ms-2">
                                    <i class="fas fa-times"></i> Cancel
                                </a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
function addSubmenuItem() {
    const container = document.getElementById('submenu-container');
    const newItem = document.createElement('div');
    newItem.className = 'submenu-item mb-2';
    newItem.innerHTML = `
        <div class="input-group">
            <input type="text" 
                   class="form-control" 
                   name="submenu[]" 
                   placeholder="Enter submenu item">
            <button type="button" class="btn btn-outline-danger" onclick="removeSubmenuItem(this)">
                <i class="fas fa-trash"></i>
            </button>
        </div>
    `;
    container.appendChild(newItem);
}

function removeSubmenuItem(button) {
    const container = document.getElementById('submenu-container');
    if (container.children.length > 1) {
        button.closest('.submenu-item').remove();
    } else {
        alert('At least one submenu item must remain');
    }
}

// Auto-generate slug from name
document.getElementById('name').addEventListener('input', function() {
    const name = this.value;
    const slug = name.toLowerCase()
        .replace(/[^a-z0-9\s-]/g, '')
        .replace(/\s+/g, '-')
        .replace(/-+/g, '-')
        .replace(/^-|-$/g, '');
    
    // You can add a hidden slug field if needed
    console.log('Generated slug:', slug);
});
</script>
@endsection
