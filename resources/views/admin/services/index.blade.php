@extends('admin.layouts.app')

@section('title', 'Services Management')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h5 class="mb-0">Services Management</h5>
                    <a href="{{ route('admin.services.create') }}" class="btn btn-primary">
                        <i class="fas fa-plus"></i> Add New Service
                    </a>
                </div>
                <div class="card-body">
                    @if(session('success'))
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            {{ session('success') }}
                            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                        </div>
                    @endif
                    
                    @if(session('error'))
                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                            {{ session('error') }}
                            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                        </div>
                    @endif

                    <div class="table-responsive">
                        <table class="table table-striped table-hover">
                            <thead>
                                <tr>
                                    <th>Image</th>
                                    <th>Name</th>
                                    <th>Category</th>
                                    <th>Subcategory</th>
                                    <th>Price</th>
                                    <th>Duration</th>
                                    <th>Status</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($services as $service)
                                    <tr>
                                        <td>
                                            @if($service->image)
                                                <img src="{{ asset('storage/' . $service->image) }}" 
                                                     alt="{{ $service->name }}" 
                                                     class="img-thumbnail" 
                                                     style="width: 50px; height: 50px; object-fit: cover;">
                                            @else
                                                <div class="bg-light d-inline-block text-center align-middle" 
                                                     style="width: 50px; height: 50px; line-height: 50px;">
                                                    <i class="fas fa-image text-muted"></i>
                                                </div>
                                            @endif
                                        </td>
                                        <td>
                                            <strong>{{ $service->name }}</strong>
                                            <br>
                                            <small class="text-muted">{{ $service->slug }}</small>
                                        </td>
                                        <td>
                                            <span class="badge bg-info">{{ $service->category }}</span>
                                        </td>
                                        <td>
                                            @if($service->subcategory)
                                                <span class="badge bg-secondary">{{ $service->subcategory }}</span>
                                            @else
                                                <span class="text-muted">-</span>
                                            @endif
                                        </td>
                                        <td>
                                            <div>
                                                <strong>{{ $service->formatted_price }}</strong>
                                                @if($service->original_price && $service->original_price > $service->final_price)
                                                    <br>
                                                    <small class="text-muted text-decoration-line-through">
                                                        {{ $service->formatted_original_price }}
                                                    </small>
                                                    <br>
                                                    <span class="badge bg-danger">{{ $service->discount_percentage }}% OFF</span>
                                                @endif
                                            </div>
                                        </td>
                                        <td>
                                            @if($service->duration)
                                                <span class="text-muted">{{ $service->formatted_duration }}</span>
                                            @else
                                                <span class="text-muted">-</span>
                                            @endif
                                        </td>
                                        <td>
                                            @if($service->is_active)
                                                <span class="badge bg-success">Active</span>
                                            @else
                                                <span class="badge bg-secondary">Inactive</span>
                                            @endif
                                        </td>
                                        <td>
                                            <div class="btn-group" role="group">
                                                <a href="{{ route('admin.services.show', $service) }}" 
                                                   class="btn btn-sm btn-outline-info" 
                                                   title="View">
                                                    <i class="fas fa-eye"></i>
                                                </a>
                                                <a href="{{ route('admin.services.edit', $service) }}" 
                                                   class="btn btn-sm btn-outline-primary" 
                                                   title="Edit">
                                                    <i class="fas fa-edit"></i>
                                                </a>
                                                <form action="{{ route('admin.services.destroy', $service) }}" 
                                                      method="POST" 
                                                      style="display: inline-block;"
                                                      onsubmit="return confirm('Are you sure you want to delete this service?')">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-sm btn-outline-danger" title="Delete">
                                                        <i class="fas fa-trash"></i>
                                                    </button>
                                                </form>
                                            </div>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="8" class="text-center py-4">
                                            <i class="fas fa-inbox fa-3x text-muted mb-3"></i>
                                            <h5 class="text-muted">No services found</h5>
                                            <p class="text-muted">Get started by adding your first service.</p>
                                            <a href="{{ route('admin.services.create') }}" class="btn btn-primary">
                                                <i class="fas fa-plus"></i> Add New Service
                                            </a>
                                        </td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>

                    @if($services->hasPages())
                        <div class="d-flex justify-content-between align-items-center mt-3">
                            <span class="text-muted">
                                Showing {{ $services->firstItem() }} to {{ $services->lastItem() }} of {{ $services->total() }} services
                            </span>
                            {{ $services->links() }}
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
