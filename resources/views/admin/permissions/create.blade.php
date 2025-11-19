@extends('layouts.app-crud')

@section('content')
<div class="container py-4">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card shadow-sm">
                <div class="card-header bg-white">
                    <h4 class="mb-0">Create New Permission</h4>
                </div>
                
                <div class="card-body">
                    <form action="{{ route('admin.permissions.store') }}" method="POST">
                        @csrf
                        
                        <div class="mb-4">
                            <label for="name" class="form-label">Permission Name</label>
                            <input type="text" name="name" id="name" 
                                   value="{{ old('name') }}"
                                   class="form-control @error('name') is-invalid @enderror" 
                                   placeholder="e.g. create posts"
                                   required>
                            
                            <div class="form-text text-muted">
                                Use lowercase letters and spaces only (e.g., 'edit articles').
                            </div>

                            @error('name')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <div class="d-flex justify-content-between align-items-center">
                            <button type="submit" class="btn btn-primary">
                                <i class="bi bi-save"></i> Create Permission
                            </button>
                            
                            <a href="{{ route('admin.permissions.index') }}" class="btn btn-secondary">
                                Cancel
                            </a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection