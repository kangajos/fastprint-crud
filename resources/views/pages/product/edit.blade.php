@extends('layouts.main')
@section('content')
    <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
        <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
            <h1 class="h2">Edit Product</h1>
            <div class="btn-toolbar mb-2 mb-md-0">
                <a href="{{ route('product.index') }}" class="btn btn-md btn-outline-secondary">Back</a>
            </div>
        </div>
        <div class="">
            <form action="{{ route('product.update', $product) }}" method="post">
                @method('put')
                @csrf
                <div class="row">
                    <div class="col md-6">
                        <div class="form-group">
                            <label for="" class="form-label">Name</label>
                            <input type="text" name="name" value="{{ old('name',$product->name) }}" class="form-control" required>
                            @error('name')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="" class="form-label">Price</label>
                            <input type="number" name="price" value="{{ old('price', $product->price) }}" class="form-control" required>
                            @error('price')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                    </div>
                    <div class="col md-6">
                        <div class="form-group">
                            <label for="" class="form-label">Category</label>
                            <select name="category_id" id="" class="form-select" required>
                                <option value="">a select</option>
                                @foreach ($categories as $item)
                                    <option value="{{ $item->id }}" {{ old('category_id', $product->category?->id) == $item->id ? 'selected' : '' }}>{{ $item->name }}</option>
                                @endforeach
                            </select>
                            @error('category_id')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="" class="form-label">Status</label>
                            <select name="status_id" id="" class="form-select" required>
                                <option value="">a select</option>
                                @foreach ($statuses as $item)
                                    <option value="{{ $item->id }}"  {{ old('status_id', $product->status?->id) == $item->id ? 'selected' : '' }}>{{ $item->name }}</option>
                                @endforeach
                            </select>
                            @error('status_id')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="form-group mt-2">
                            <button type="submit" class="btn btn-outline-primary">Save</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </main>
@endsection
