@extends('backend.master')

@section('content')

    <!-- start page title -->
    <div class="row">
        <div class="col-12">
            <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                <h4 class="mb-sm-0">Edit Category</h4>

                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
                        <li class="breadcrumb-item active">Category</li>
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

                @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
                @endif


                <div class="row-fluid sortable">
                <div class="box span12">
                    <div class="box-content">
                        <form class="form-horizontal form-control" action="{{url('/categories/'.$category->id)}}" method="post" enctype="multipart/form-data" >
                            @csrf
                            @method('PATCH')

                            <div class="control-group mt-3">
                                <label class="control-label ">File Upload</label>
                                <div class="controls">
                                    <input class="form-control" type="file" name="image">
                                </div>
                            </div>

                            <fieldset>
                                <div class="control-group mt-3">
                                    <label class="control-label" for="date01">Category Name</label>
                                    <div class="controls">
                                        <input type="text" class="input-xlarge form-control" name="name" value="{{$category->name}}">
                                    </div>
                                </div>


                                <div class="control-group hidden-phone mt-3">
                                    <label class="control-label" for="textarea2">Category Description</label>
                                    <div class="controls">
                                        <textarea class="cleditor form-control" name="description" rows="3">{{$category->description}}</textarea>
                                    </div>

                                </div>
                                <div class="form-actions">
                                    <button type="submit" class="btn btn-primary mt-3 mb-3">Update </button>
                                </div>
                            </fieldset>
                        </form>
                    </div>
                </div>
                </div>
                </div>
            </div>
        </div>
    </div>

@endsection
