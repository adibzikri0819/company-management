@extends('layouts.app')

@section('title', 'Edit Company')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-4">
    <h2>Edit Company</h2>
    <a href="{{ route('companies.index') }}" class="btn btn-outline-secondary">Back</a>
</div>

<div class="card">
    <div class="card-header">
        <h5 class="mb-0">Company Information</h5>
    </div>
    <div class="card-body">
        <form method="POST" action="{{ route('companies.update', $company) }}" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="row">
                <div class="col-md-6">
                    <div class="mb-3">
                        <label for="name" class="form-label">Name *</label>
                        <input type="text" class="form-control @error('name') is-invalid @enderror" 
                               id="name" name="name" value="{{ old('name', $company->name) }}" required>
                        @error('name')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="mb-3">
                        <label for="email" class="form-label">Email Address</label>
                        <input type="email" class="form-control @error('email') is-invalid @enderror" 
                               id="email" name="email" value="{{ old('email', $company->email) }}">
                        @error('email')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
            </div>
            
            <div class="row">
                <div class="col-md-6">
                    <div class="mb-3">
                        <label for="logo" class="form-label">Logo (min 100x100px)</label>
                        <input type="file" class="form-control @error('logo') is-invalid @enderror" 
                               id="logo" name="logo" accept="image/*">
                        @if($company->logo)
                            <div class="mt-2">
                                <img src="{{ $company->logo_url }}" alt="Current logo" width="100" height="100" class="rounded">
                                <p class="text-muted mt-1">Current logo</p>
                            </div>
                        @endif
                        @error('logo')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="mb-3">
                        <label for="website" class="form-label">Website</label>
                        <input type="url" class="form-control @error('website') is-invalid @enderror" 
                               id="website" name="website" value="{{ old('website', $company->website) }}" 
                               placeholder="https://example.com">
                        @error('website')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
            </div>
            
            <button type="submit" class="btn btn-primary">Save</button>
        </form>
    </div>
</div>
@endsection