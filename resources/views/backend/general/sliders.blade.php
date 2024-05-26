@extends('backend.master')

@section('content')

    <!-- start page title -->
    <div class="row">
        <div class="col-12">
            <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                <h4 class="mb-sm-0">Manage Sliders</h4>

                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
                        <li class="breadcrumb-item"><a href="javascript: void(0);">General</a></li>
                        <li class="breadcrumb-item active">Sliders</li>
                    </ol>
                </div>

            </div>
        </div>
    </div>
    <!-- end page title -->

    <div class="container">
        <div class="card">
            <div class="card-body">
                @if($sliders->isEmpty())
                    Currently, you don't have any sliders.
                @else
                <table id="datatable" class="table table-striped dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                    <thead>
                        <tr>
                            <th>SL</th>
                            <th>Image</th>
                            <th>Slider Name</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($sliders as $slider)
                        <tr>
                            <td>{{$loop->index+1}}</td>
                            <td>
                                <img src="{{ $slider->image }}" width="50" alt="{{$slider->name}}">
                            </td>
                            <td>{{$slider->name}}</td>
                            <td class="text-center">
                                <a href="{{ route('slider.edit',$slider->id) }}" class="text-info px-2">
                                    <i class="fa-solid fa-pen"></i>
                                </a>
                                <a href="{{ route('slider.destroy',$slider->id) }}" class="text-danger pe-2">
                                    <i class="fa-solid fa-trash"></i>
                                </a>
                                {{-- <form id="delete-form" method="POST" action="{{ route('slider.destroy',$slider->id) }}">
                                    @csrf
                                    @method('DELETE')
                                </form> --}}
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                @endif
            </div>
        </div>
    </div>

     @push('script')
        <x-responsive-table />
     @endpush
@endsection