@extends('admin.layouts.app')

@section('title', 'Service Details')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h5 class="mb-0">Service Details: {{ $service->name }}</h5>
                    <div>
                        <a href="{{ route('admin.services.edit', $service) }}" class="btn btn-primary me-2">
                            <i class="fas fa-edit"></i> Edit Service
                        </a>
                        <a href="{{ route('admin.services.index') }}" class="btn btn-outline-secondary">
                            <i class="fas fa-arrow-left"></i> Back to Services
                        </a>
                    </div>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-3">
                            <div class="text-center">
                                @if($service->image)
                                    <img src="{{ asset('storage/' . $service->image) }}" 
                                         alt="{{ $service->name }}" 
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
                            <h4>{{ $service->name }}</h4>
                            <p class="text-muted"><strong>Slug:</strong> {{ $service->slug }}</p>
                            
                            <div class="row mb-3">
                                <div class="col-md-6">
                                    <span class="badge bg-info">{{ $service->category }}</span>
                                    @if($service->subcategory)
                                        <span class="badge bg-secondary ms-1">{{ $service->subcategory }}</span>
                                    @endif
                                </div>
                                <div class="col-md-6 text-end">
                                    @if($service->is_active)
                                        <span class="badge bg-success">Active</span>
                                    @else
                                        <span class="badge bg-secondary">Inactive</span>
                                    @endif
                                </div>
                            </div>

                            @if($service->short_description)
                                <div class="alert alert-light">
                                    <strong>Short Description:</strong>
                                    <p class="mb-0">{{ $service->short_description }}</p>
                                </div>
                            @endif
                            
                            @if($service->description)
                                <div class="card mt-3">
                                    <div class="card-header">
                                        <h6 class="mb-0"><i class="fas fa-align-left me-2"></i>Detailed Description</h6>
                                    </div>
                                    <div class="card-body">
                                        <div class="content-description">
                                            {!! $service->description !!}
                                        </div>
                                    </div>
                                </div>
                            @endif

                            <div class="row mt-3">
                                <div class="col-md-6">
                                    <div class="card">
                                        <div class="card-body">
                                            <h6 class="card-title">Pricing Information</h6>
                                            <table class="table table-sm">
                                                <tr>
                                                    <td><strong>Original Price:</strong></td>
                                                    <td>{{ $service->formatted_original_price }}</td>
                                                </tr>
                                                <tr>
                                                    <td><strong>Final Price:</strong></td>
                                                    <td><strong>{{ $service->formatted_price }}</strong></td>
                                                </tr>
                                                @if($service->discount_percentage > 0)
                                                <tr>
                                                    <td><strong>Discount:</strong></td>
                                                    <td><span class="badge bg-danger">{{ $service->discount_percentage }}% OFF</span></td>
                                                </tr>
                                                @endif
                                                <tr>
                                                    <td><strong>Duration:</strong></td>
                                                    <td>{{ $service->formatted_duration ?: 'Not specified' }}</td>
                                                </tr>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="card">
                                        <div class="card-body">
                                            <h6 class="card-title">Service Information</h6>
                                            <table class="table table-sm">
                                                <tr>
                                                    <td><strong>Status:</strong></td>
                                                    <td>
                                                        @if($service->is_active)
                                                            <span class="badge bg-success">Active</span>
                                                        @else
                                                            <span class="badge bg-secondary">Inactive</span>
                                                        @endif
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td><strong>Created:</strong></td>
                                                    <td>{{ $service->created_at->format('M d, Y H:i') }}</td>
                                                </tr>
                                                <tr>
                                                    <td><strong>Updated:</strong></td>
                                                    <td>{{ $service->updated_at->format('M d, Y H:i') }}</td>
                                                </tr>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<style>
.content-description {
    line-height: 1.6;
}

.content-description h1,
.content-description h2,
.content-description h3,
.content-description h4,
.content-description h5,
.content-description h6 {
    margin-top: 1.5rem;
    margin-bottom: 1rem;
}

.content-description ul,
.content-description ol {
    margin-bottom: 1rem;
}

.content-description blockquote {
    border-left: 4px solid #007bff;
    padding-left: 1rem;
    margin: 1rem 0;
    font-style: italic;
}

.content-description table {
    margin-bottom: 1rem;
}

.content-description img {
    max-width: 100%;
    height: auto;
    margin: 1rem 0;
}
</style>
@endsection
