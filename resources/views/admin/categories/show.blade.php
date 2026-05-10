@extends('admin.layouts.app')

@section('title', 'Category Details')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h5 class="mb-0">Category Details: {{ $category->name }}</h5>
                    <div>
                        <a href="{{ route('admin.categories.edit', $category) }}" class="btn btn-primary me-2">
                            <i class="fas fa-edit"></i> Edit Category
                        </a>
                        <a href="{{ route('admin.categories.index') }}" class="btn btn-outline-secondary">
                            <i class="fas fa-arrow-left"></i> Back to Categories
                        </a>
                    </div>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-3">
                            <div class="text-center">
                                @if($category->image)
                                    <img src="{{ asset('storage/' . $category->image) }}" 
                                         alt="{{ $category->name }}" 
                                         class="img-fluid rounded shadow-sm">
                                @else
                                    <div class="bg-light rounded d-inline-flex align-items-center justify-content-center" 
                                         style="width: 200px; height: 200px;">
                                        <i class="fas fa-image fa-3x text-muted"></i>
                                    </div>
                                @endif
                            </div>
                        </div>
                        <div class="col-md-9">
                            <div class="d-flex align-items-center mb-3">
                                @if($category->category_icon_image)
                                    <img src="{{ asset('storage/' . $category->category_icon_image) }}" 
                                         alt="{{ $category->name }} icon" 
                                         class="rounded me-3" 
                                         style="width: 48px; height: 48px; object-fit: cover;">
                                @endif
                                <div>
                                    <h4 class="mb-1">{{ $category->name }}</h4>
                                    @if($category->title)
                                        <h5 class="text-muted mb-0">{{ $category->title }}</h5>
                                    @endif
                                </div>
                            </div>
                            <p class="text-muted"><strong>Slug:</strong> {{ $category->slug }}</p>
                            
                            @if($category->tagline)
                                <div class="alert alert-info">
                                    <i class="fas fa-quote-left me-2"></i>
                                    <em>{{ $category->tagline }}</em>
                                </div>
                            @endif
                            
                            @if($category->description)
                                <p><strong>Description:</strong></p>
                                <p>{{ $category->description }}</p>
                            @endif

                            @if($category->submenu && count($category->submenu) > 0)
                                <div class="card mt-3">
                                    <div class="card-header">
                                        <h6 class="mb-0"><i class="fas fa-list me-2"></i>Submenu Items</h6>
                                    </div>
                                    <div class="card-body">
                                        <ul class="list-unstyled mb-0">
                                            @foreach($category->submenu as $item)
                                                <li class="mb-2">
                                                    <i class="fas fa-chevron-right text-primary me-2"></i>
                                                    {{ $item }}
                                                </li>
                                            @endforeach
                                        </ul>
                                    </div>
                                </div>
                            @endif

                            <div class="row mt-3">
                                <div class="col-md-6">
                                    <div class="card">
                                        <div class="card-body">
                                            <h6 class="card-title">Category Information</h6>
                                            <table class="table table-sm">
                                                <tr>
                                                    <td><strong>Status:</strong></td>
                                                    <td>
                                                        @if($category->is_active)
                                                            <span class="badge bg-success">Active</span>
                                                        @else
                                                            <span class="badge bg-secondary">Inactive</span>
                                                        @endif
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td><strong>Sort Order:</strong></td>
                                                    <td>{{ $category->sort_order }}</td>
                                                </tr>
                                                <tr>
                                                    <td><strong>Created:</strong></td>
                                                    <td>{{ $category->created_at->format('M d, Y H:i') }}</td>
                                                </tr>
                                                <tr>
                                                    <td><strong>Updated:</strong></td>
                                                    <td>{{ $category->updated_at->format('M d, Y H:i') }}</td>
                                                </tr>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="card">
                                        <div class="card-body">
                                            <h6 class="card-title">Statistics</h6>
                                            <table class="table table-sm">
                                                <tr>
                                                    <td><strong>Total Services:</strong></td>
                                                    <td>
                                                        <span class="badge bg-info">
                                                            {{ $category->services->count() }} services
                                                        </span>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td><strong>Active Services:</strong></td>
                                                    <td>
                                                        <span class="badge bg-success">
                                                            {{ $category->services()->where('is_active', true)->count() }} active
                                                        </span>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td><strong>Inactive Services:</strong></td>
                                                    <td>
                                                        <span class="badge bg-secondary">
                                                            {{ $category->services()->where('is_active', false)->count() }} inactive
                                                        </span>
                                                    </td>
                                                </tr>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    @if($category->services->count() > 0)
                        <div class="row mt-4">
                            <div class="col-12">
                                <div class="card">
                                    <div class="card-header">
                                        <h6 class="mb-0">Services in this Category</h6>
                                    </div>
                                    <div class="card-body">
                                        <div class="table-responsive">
                                            <table class="table table-striped">
                                                <thead>
                                                    <tr>
                                                        <th>Service Name</th>
                                                        <th>Price</th>
                                                        <th>Duration</th>
                                                        <th>Status</th>
                                                        <th>Created</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @foreach($category->services as $service)
                                                        <tr>
                                                            <td>{{ $service->name }}</td>
                                                            <td>₹{{ number_format($service->price, 2) }}</td>
                                                            <td>{{ $service->duration ?? 'N/A' }}</td>
                                                            <td>
                                                                @if($service->is_active)
                                                                    <span class="badge bg-success">Active</span>
                                                                @else
                                                                    <span class="badge bg-secondary">Inactive</span>
                                                                @endif
                                                            </td>
                                                            <td>{{ $service->created_at->format('M d, Y') }}</td>
                                                        </tr>
                                                    @endforeach
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
