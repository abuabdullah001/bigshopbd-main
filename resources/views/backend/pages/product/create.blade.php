@extends('backend.master')

@section('content')

    <!-- start page title -->
    <div class="row">
        <div class="col-12">
            <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                <h4 class="mb-sm-0">Create new product</h4>

                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
                        <li class="breadcrumb-item active">Product</li>
                        <li class="breadcrumb-item active">Create</li>
                    </ol>
                </div>

            </div>
        </div>
    </div>
    <!-- end page title -->

    <div class="container">
        <div class="card">
            <div class="card-body">
                <form action="{{ route('product.store') }}" method="post" class="form-control" enctype="multipart/form-data">
                    @csrf

                    <label for="image" class="mt-2">Image</label>
                    <input type="file" name="images[]" value="{{ old('images') }}" class="form-control @error('images') is-invalid @enderror" id="image" multiple>
                    @error('images')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror

                    <label for="name" class="mt-2">Name</label>
                    <input type="text" name="name" value="{{ old('name') }}" class="form-control @error('name') is-invalid @enderror" id="name" autocomplete="" placeholder="Enter Product name...">
                    @error('name')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror

                    <label for="brand" class="mt-2">Brand</label>
                    <select name="brand_id" class="form-control @error('brand_id') is-invalid @enderror" id="brand" data-placeholder="Choose a Brand...">
                        <option value="unknown" selected disabled>Choose a brand ...</option>
                        @foreach($brands as $brand)
                            <option value="{{ $brand->id }}">{{ $brand->name }}</option>
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
                                <option value="{{ $category->id }}">{{ $category->name }}</option>
                            @endforeach
                        </optgroup>
                    </select>
                    @error('category_id')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror

                    <label for="qty" class="mt-2">Qty</label>
                    <input type="number" name="qty" value="{{ old('qty') }}" class="form-control @error('qty') is-invalid @enderror" id="qty" placeholder="Enter Product quantity...">
                    @error('qty')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror

                    <label for="sku" class="mt-2">SKU</label>
                    <input type="text" name="sku" value="{{ old('sku') }}" class="form-control @error('sku') is-invalid @enderror" id="sku" placeholder="Enter Product uniqe code...">
                    @error('sku')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror

                    <label for="regular_price" class="mt-2">Regular price</label>
                    <input type="number" name="regular_price" value="{{ old('regular_price') }}" class="form-control @error('regular_price') is-invalid @enderror" id="regular_price" placeholder="Enter Product regular price...">
                    @error('regular_price')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror

                    <label for="discount_price" class="mt-2">Discount price</label>
                    <input type="number" name="discount_price" value="{{ old('discount_price') }}" class="form-control @error('discount_price') is-invalid @enderror" id="discount_price" placeholder="Enter Product discount price...">
                    @error('discount_price')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror

                    <label for="short_description" class="mt-2">Short description</label>
                    <textarea name="short_description" class="form-control editor @error('short_description') is-invalid @enderror" rows="3" cols="50" id="short_description" placeholder="Enter a short description...">{{ old('short_description') }}</textarea>
                    @error('short_description')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror

                    <label for="long_description" class="mt-2">Long description</label>
                        
                    <textarea name="long_description" class="form-control editor @error('long_description') is-invalid @enderror" rows="10" cols="50" id="long_description" placeholder="Enter a long description...">{{ old('long_description') }}</textarea>
                    @error('long_description')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror

                    <button type="submit" class="btn btn-primary mt-3">Create</button>
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