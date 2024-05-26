 @extends('backend.master')

@section('content')

    <!-- start page title -->
    <div class="row">
        <div class="col-12">
            <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                <h4 class="mb-sm-0">Create New Brand</h4>

                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
                        <li class="breadcrumb-item active">Brand</li>
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
                            <form class="form-horizontal form-control" action="{{url('/brands')}}" method="post" enctype="multipart/form-data" >
                                @csrf
                                <fieldset>
                                    <div class="control-group mt-3">
                                        <label class="control-label" for="date01">Brand Name</label>
                                        <div class="controls">
                                            <input type="text" class="input-xlarge form-control" name="name" required>
                                        </div>
                                    </div>
                                    <div class="control-group hidden-phone mt-3">
                                        <label class="control-label" for="textarea2">Brand Description</label>
                                        <div class="controls">
                                            <textarea class="form-control" name="description" rows="3" required></textarea>
                                        </div>
                                    </div>
                                    <div class="form-actions">
                                        <button type="submit" class="btn btn-primary mt-3 mb-3">Brand Category</button>
                                    </div>
                                </fieldset>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
