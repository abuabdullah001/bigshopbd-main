@extends('backend.master')

@section('content')

    <!-- start page title -->
    <div class="row">
        <div class="col-12">
            <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                <h4 class="mb-sm-0">Edit Product</h4>

                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
                        <li class="breadcrumb-item active">Product</li>
                        <li class="breadcrumb-item active">Edit</li>
                    </ol>
                </div>

            </div>
        </div>
    </div>
    <!-- end page title -->

    <div class="container">
        <div class="card">
            <div class="card-body">
                <form action="{{ route('product.update',$product->id) }}" method="post" class="form-control" enctype="multipart/form-data">
                    @csrf
                    @method('PATCH')
                    
                    <div class="text-center">
                        @if($product->images)
                            @foreach(explode(',', $product->images) as $image)
                                <img src="{{ $image }}" width="120" class="rounded" alt="{{ $product->name }}">
                            @endforeach
                        @endif
                    </div>                    

                    <label for="image" class="mt-2">Image</label>
                    <input type="file" name="images[]" value="{{ $product->images }}" class="form-control @error('images') is-invalid @enderror" id="image" multiple>
                    @error('images')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror

                    <label for="name" class="mt-2">Name</label>
                    <input type="text" name="name" value="{{ $product->name }}" class="form-control @error('name') is-invalid @enderror" id="name">
                    @error('name')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror

                    <label for="brand" class="mt-2">Brand</label>
                    <select name="brand_id" class="form-control @error('brand_id') is-invalid @enderror" id="brand" data-placeholder="Choose a Brand...">
                        @foreach($brands as $brand)
                            <option value="{{ $brand->id }}" {{ $product->brand->id == $brand->id ? 'selected' : '' }}>{{ $brand->name }}</option>
                        @endforeach
                    </select>
                    @error('brand_id')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror

                    <label for="category" class="mt-2">Category</label>
                    <select name="category_id[]" class="select2 form-control select2-multiple @error('category_id') is-invalid @enderror" id="category" multiple="multiple" data-placeholder="Choose a Category...">
                        <optgroup label="You can select multiple categories">
                            @foreach($categories as $category)
                                <option value="{{ $category->id }}" {{ in_array($category->id, explode(',', $product->category_id)) ? 'selected' : '' }}>{{ $category->name }}</option>
                            @endforeach
                        </optgroup>
                    </select>
                    @error('category_id')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror

                    <label for="qty" class="mt-2">Qty</label>
                    <input type="text" name="qty" value="{{ $product->qty }}" class="form-control @error('qty') is-invalid @enderror" id="qty">
                    @error('qty')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror

                    <label for="sku" class="mt-2">Sku</label>
                    <input type="text" name="sku" value="{{ $product->sku }}" class="form-control @error('sku') is-invalid @enderror" id="sku">
                    @error('sku')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror

                    <label for="regular_price" class="mt-2">Regular_price</label>
                    <input type="text" name="regular_price" value="{{ $product->regular_price }}" class="form-control @error('regular_price') is-invalid @enderror" id="regular_price">
                    @error('regular_price')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror

                    <label for="discount_price" class="mt-2">Discount_price</label>
                    <input type="text" name="discount_price" value="{{ $product->discount_price }}" class="form-control @error('discount_price') is-invalid @enderror" id="discount_price">
                    @error('discount_price')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror

                    <label for="short_description" class="mt-2">Short description</label>
                    <textarea name="short_description" class="form-control editor @error('short_description') is-invalid @enderror" id="short_description" rows="3" cols="50">{{ $product->short_description }}</textarea>
                    @error('short_description')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror

                    <label for="long_description" class="mt-2">Long description</label>
                    <textarea name="long_description" class="form-control editor @error('long_description') is-invalid @enderror" id="long_description" rows="5" cols="50">{{ $product->long_description }}</textarea>
                    @error('long_description')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror

                    <button type="submit" class="btn btn-primary mt-3">Update</button>
                </form>
            </div>
        </div>
    </div>
    @push('script')
        <x-editor />
        <x-multipleSelector />
        <x-off_autocomplete />
    @endpush
@endsection