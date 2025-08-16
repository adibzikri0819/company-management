@extends('layouts.app')

@section('title', 'Companies')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-4">
    <h2>Companies</h2>
    <a href="{{ route('companies.create') }}" class="btn btn-primary">Add New Company</a>
</div>

<div class="card">
    <div class="card-body">
        @if($companies->count() > 0)
            <div class="table-responsive">
                <table class="table">
                    <thead>
                        <tr>
                            <th>Logo</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Website</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($companies as $company)
                            <tr>
                                <td>
                                    @if($company->logo)
                                        <img src="{{ $company->logo_url }}" alt="Logo" width="50" height="50" class="rounded">
                                    @else
                                        <div class="bg-secondary rounded d-flex align-items-center justify-content-center" style="width:50px;height:50px;">
                                            <span class="text-white">No Logo</span>
                                        </div>
                                    @endif
                                </td>
                                <td>{{ $company->name }}</td>
                                <td>{{ $company->email }}</td>
                                <td>
                                    <a href="{{ $company->website }}" target="_blank" class="text-decoration-none">
                                        {{ $company->website }}
                                    </a>
                                </td>
                                <td>
                                    <a href="{{ route('companies.edit', $company) }}" class="btn btn-sm btn-outline-primary">Edit</a>
                                    <form method="POST" action="{{ route('companies.destroy', $company) }}" class="d-inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-sm btn-outline-danger" 
                                                onclick="return confirm('Are you sure?')">Delete</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            
            {{ $companies->links() }}
        @else
            <p class="text-muted text-center">No companies found.</p>
        @endif
    </div>
</div>
@endsection