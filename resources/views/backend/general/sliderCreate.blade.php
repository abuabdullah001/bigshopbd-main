@extends('backend.master')

@section('content')

    <!-- start page title -->
    <div class="row">
        <div class="col-12">
            <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                <h4 class="mb-sm-0">Create New Slider</h4>

                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
                        <li class="breadcrumb-item"><a href="javascript: void(0);">General</a></li>
                        <li class="breadcrumb-item active">Slider</li>
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
                <form action="{{ route('slider.store') }}" method="post" class="form-control" enctype="multipart/form-data">
                    @csrf

                    <label for="image" class="mt-2">Image <span class="text-danger"><small>Size must be 1280 × 426 px</small></span></label>
                    <input type="file" name="image" value="{{ old('image') }}" class="form-control @error('image') is-invalid @enderror" id="image">
                    @error('image')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror

                    <label for="name" class="mt-2">Name</label>
                    <input type="text" name="name" value="{{ old('name') }}" class="form-control @error('name') is-invalid @enderror" id="name" placeholder="Enter Slider name...">
                    @error('name')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror

                    <label for="description" class="mt-2">Description</label>
                    <textarea name="description" class="form-control @error('description') is-invalid @enderror" rows="3" cols="50" id="description" placeholder="Enter a short description...">{{ old('description') }}</textarea>
                    @error('description')
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
        <x-off_autocomplete />
    @endpush

@endsection