@extends('backend.master')

@section('content')

    <!-- start page title -->
    <div class="row">
        <div class="col-12">
            <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                <h4 class="mb-sm-0">Categories</h4>

                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
                        <li class="breadcrumb-item active">Category</li>
                    </ol>
                </div>

            </div>
        </div>
    </div>
    <!-- end page title -->

    <div class="container">
        <div class="card">
            <div class="card-body">

                <div class="box-content">
                 <table id="datatable" class="table table-striped dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                    <thead>
                        <tr>
                            <th>SL</th>
                            <th>Image</th>
                            <th>Category Name</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($categories as $category )
                        <tr>
                            <td>{{$loop->index+1}}</td>
                            <td>
                                <img src="{{ $category->image }}" width="50" alt="{{$category->name}}">
                            </td>
                            <td>{{$category->name}}</td>
                            <td>
                                @if ($category->status==1)
                                <a href="{{url('/cat-status'.$category->id)}}">
                                <span  class="label label-success">Active</span>
                                </a>
                                @else
                                <a href="{{url('/cat-status'.$category->id)}}">
                                <span class="label label-danger">Deactive</span>
                                </a>
                                @endif
                            </td>
                            <td class="text-center">
                                <a href="{{url('/categories/'.$category->id.'/edit')}}" class="text-info px-2">
                                    <i class="fa-solid fa-pen"></i>
                                </a>
                                <a href="#" class="text-danger pe-2" onclick="event.preventDefault(); document.getElementById('delete-form').submit();">
                                    <i class="fa-solid fa-trash"></i>
                                </a>
                                <form id="delete-form" method="POST" action="{{ route('categories.destroy', $category->id) }}">
                                    @csrf
                                    @method('DELETE')
                                </form>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                 </table>
                </div>

            </div>
        </div>
    </div>

    @push('script')
        <x-responsive-table />
    @endpush
    
@endsection
