@extends('layouts.main')
@section('content')
    <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
        <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
            <h1 class="h2">Product List</h1>
            <div class="btn-toolbar mb-2 mb-md-0">
                {{-- <div class="btn-group me-2">
                    <button type="button" class="btn btn-sm btn-outline-secondary">Share</button>
                    <button type="button" class="btn btn-sm btn-outline-secondary">Export</button>
                </div>
                <button type="button" class="btn btn-sm btn-outline-secondary dropdown-toggle">
                    <span data-feather="calendar"></span>
                    This week
                </button> --}}
                <a href="{{ route('product.create') }}" class="btn btn-md btn-outline-secondary">Add New Data</a>
            </div>
        </div>
        <div class="table-responsive">
            <table class="table table-striped table-sm">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Name</th>
                        <th scope="col">Price</th>
                        <th scope="col">Category</th>
                        <th scope="col">Status</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($products as $key => $item)
                        <tr>
                            <td>{{ $key + 1 }}</td>
                            <td>{{ $item->name }}</td>
                            <td>{{ number_format($item->price, 0, '.') }}</td>
                            <td>{{ $item->status?->name }}</td>
                            <td>{{ $item->category?->name }}</td>
                            <td>
                                <a href="{{ route('product.edit', $item) }}" class="btn btn-sm btn-outline-secondary">Edit</a>
                                <a href="{{ route('product.delete', $item->id) }}" class="btn btn-sm btn-outline-danger" onclick="return confirm('Are you delete this data?')">Delete</a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </main>
@endsection
