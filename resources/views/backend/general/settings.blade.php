@extends('backend.master')

@section('content')

    <!-- start page title -->
    <div class="row">
        <div class="col-12">
            <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                <h4 class="mb-sm-0">Edit Site Settings</h4>

                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
                        <li class="breadcrumb-item"><a href="javascript: void(0);">General</a></li>
                        <li class="breadcrumb-item active">edit</li>
                    </ol>
                </div>

            </div>
        </div>
    </div>
    <!-- end page title -->
    
    <div class="container">
        <div class="card">
            <div class="card-body">
                <form action="{{ route('settings.general.update',$settings->id) }}" method="post" class="form-control" enctype="multipart/form-data">
                    @csrf
                    @method('PATCH')

                    <div class="row">

                        <div class="col-md-6 mt-2 d-flex justify-content-center align-items-center">
                            <img src="{{ $settings->site_logo }}" width="120" alt="Company logo">
                        </div>
                        <div class="col-md-6 mt-2 d-flex justify-content-center align-items-center">
                            <img src="{{ $settings->site_logo_footer }}" width="100" alt="Company footer logo">
                        </div>

                        <div class="col-md-6">
                            <label for="site_name" class="mt-2">Site name</label>
                            <input type="text" name="site_name" value="{{ $settings->site_name }}" class="form-control @error('site_name') is-invalid @enderror" id="site_name" placeholder="Enter your site name ...">
                            @error('site_name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        
                        <div class="col-md-6">
                            <label for="site_logo" class="mt-2">Site Logo</label>
                            <input type="file" name="site_logo" value="{{ $settings->site_logo }}" class="form-control @error('site_logo') is-invalid @enderror" id="site_logo">
                            @error('site_logo')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="col-md-6">
                            <label for="site_logo_white" class="mt-2">Variant Logo <span class="text-danger">(optional)</span></label>
                            <input type="file" name="site_logo_white" value="{{ $settings->site_logo_white }}" class="form-control @error('site_logo_white') is-invalid @enderror" id="site_logo_white">
                            @error('site_logo_white')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
    
                        <div class="col-md-6">
                            <label for="site_logo_footer" class="mt-2">Site Footer Logo <small class="text-danger">(Optional)</small></label>
                            <input type="file" name="site_logo_footer" value="{{ $settings->site_logo_footer }}" class="form-control" id="site_logo_footer">
                        </div>


                        <div class="col-md-6">
                            <label for="email" class="mt-2">Email address</label>
                            <input type="email" name="email" value="{{ $settings->email }}" class="form-control @error('email') is-invalid @enderror" id="email" placeholder="examplemail@gmail.com">
                            @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
    
                        <div class="col-md-6">
                            <label for="phone" class="mt-2">Phone number</label>
                            <input type="text" name="phone" value="{{ $settings->phone }}" class="form-control @error('phone') is-invalid @enderror" id="phone" placeholder="01700000000">
                            @error('phone')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
    
                        <div class="col-md-6">
                            <label for="address" class="mt-2">Full address</label>
                            <input type="text" name="address" value="{{ $settings->address }}" class="form-control @error('address') is-invalid @enderror" id="address" placeholder="Enter your bussiness address ...">
                            @error('address')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        
                        <div class="col-md-6">
                            <label for="active_time" class="mt-2">Site Active Time</label>
                            <input type="text" name="active_time" value="{{ $settings->active_time }}" class="form-control @error('active_time') is-invalid @enderror" id="active_time" placeholder="Enter your availability time ...">
                            @error('active_time')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>

                        <div class="col-md-12">
                            <label for="site_slogan" class="mt-2">Site Slogan</label>
                            <input type="text" name="site_slogan" value="{{ $settings->site_slogan }}" class="form-control @error('site_slogan') is-invalid @enderror" id="site_slogan" placeholder="Enter your bussiness slogan ...">
                            @error('site_slogan')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                    <button type="submit" class="btn btn-primary mt-3">Update</button>
                </form>
            </div>
        </div>

        <p class="card-title">Quick links</p>
        
        <div class="card mt-4">
            <div class="card-body">
                <form action="{{ route('settings.quicklinks.update',$settings->id) }}" method="post" class="form-control">
                    @csrf
                    @method('PATCH')

                    <div class="row">

                        <div class="col-md-3">
                            <label for="links_1_name" class="mt-2">Name of links</label>
                            <input type="text" name="links_1_name" value="{{ $settings->links_1_name }}" class="form-control" id="links_1_name" placeholder="About Us">
                        </div>

                        <div class="col-md-9">
                            <label for="links_1" class="mt-2">Links</label>
                            <input type="text" name="links_1" value="{{ $settings->links_1 }}" class="form-control @error('links_1') is-invalid @enderror" id="links_1" placeholder="Enter quick access url ...">
                            @error('links_1')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="col-md-3">
                            <label for="links_2_name" class="mt-2">Name of links <small class="text-danger">(Optional)</small></label>
                            <input type="text" name="links_2_name" value="{{ $settings->links_2_name }}" class="form-control" id="links_2_name" placeholder="Contact Us">
                        </div>

                        <div class="col-md-9">
                            <label for="links_2" class="mt-2">Links</label>
                            <input type="text" name="links_2" value="{{ $settings->links_2 }}" class="form-control @error('links_2') is-invalid @enderror" id="links_2" placeholder="Enter quick access url ...">
                            @error('links_2')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="col-md-3">
                            <label for="links_3_name" class="mt-2">Name of links <small class="text-danger">(Optional)</small></label>
                            <input type="text" name="links_3_name" value="{{ $settings->links_3_name }}" class="form-control" id="links_3_name" placeholder="Order tack">
                        </div>

                        <div class="col-md-9">
                            <label for="links_3" class="mt-2">Links</label>
                            <input type="text" name="links_3" value="{{ $settings->links_3 }}" class="form-control @error('links_3') is-invalid @enderror" id="links_3" placeholder="Enter quick access url ...">
                            @error('links_3')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="col-md-3">
                            <label for="links_4_name" class="mt-2">Name of links <small class="text-danger">(Optional)</small></label>
                            <input type="text" name="links_4_name" value="{{ $settings->links_4_name }}" class="form-control" id="links_4_name" placeholder="Others">
                        </div>

                        <div class="col-md-9">
                            <label for="links_4" class="mt-2">Links</label>
                            <input type="text" name="links_4" value="{{ $settings->links_4 }}" class="form-control @error('links_4') is-invalid @enderror" id="links_4" placeholder="Enter quick access url ...">
                            @error('links_4')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                    <button type="submit" class="btn btn-primary mt-3">Update</button>
                </form>
            </div>
        </div>

        <p class="card-title">Social links</p>

        <div class="card mt-4">
            <div class="card-body">
                <form action="{{ route('settings.sociallinks.update',$settings->id) }}" method="post" class="form-control">
                    @csrf
                    @method('PATCH')

                    <div class="row">
                        <div class="col-md-6">
                            <label for="facebook" class="mt-2">Facebook</label>
                            <input type="text" name="facebook" value="{{ $settings->facebook }}" class="form-control @error('facebook') is-invalid @enderror" id="facebook" placeholder="Enter your facebook profile link ...">
                            @error('facebook')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="col-md-6">
                            <label for="instagram" class="mt-2">Instagram</label>
                            <input type="text" name="instagram" value="{{ $settings->instagram }}" class="form-control @error('instagram') is-invalid @enderror" id="instagram" placeholder="Enter your instagram profile link ...">
                            @error('instagram')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="col-md-6">
                            <label for="twitter" class="mt-2">Twitter</label>
                            <input type="text" name="twitter" value="{{ $settings->twitter }}" class="form-control @error('twitter') is-invalid @enderror" id="twitter" placeholder="Enter your twitter profile link ...">
                            @error('twitter')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="col-md-6">
                            <label for="youtube" class="mt-2">Youtube</label>
                            <input type="text" name="youtube" value="{{ $settings->youtube }}" class="form-control @error('youtube') is-invalid @enderror" id="youtube" placeholder="Enter your youtube profile link ...">
                            @error('youtube')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                    <button type="submit" class="btn btn-primary mt-3">Update</button>
                </form>
            </div>
        </div>
    </div>

@endsection