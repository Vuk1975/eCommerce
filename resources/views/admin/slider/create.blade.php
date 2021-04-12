@extends('admin.layouts.main')

@section('content')
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 ml-4 text-gray-800">Slider</h1>
            <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="./">Home</a></li>
              <li class="breadcrumb-item active" aria-current="page">Slider</li>
            </ol>
    </div>

    <div class="row justify-content-center">
    @if(Session::has('message'))
      <div class="alert alert-success">
        {{Session::get('message')}}
      </div>
    @endif
      <div class="col-lg-10">
        <form action="{{route('slider.store')}}" method="POST" enctype="multipart/form-data">
          @csrf
              <div class="card mb-6">
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                  <h6 class="m-0 font-weight-bold text-primary">Create Slider</h6>
                </div>
                <div class="card-body">
                    
                    <div class="form-group">
                      <div class="custom-file">
                        <label class="custom-file-label" for="customFile">Choose file</label>
                        <input type="file" class="form control @error('image') is-invalid @enderror" id="customFile" name="image" value="">
                        @error('image')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                        @enderror
                      </div>
                    </div>
                    <div class="form-group">
                                <label for="image">Image</label>
                                <input type="file" class="form-control{{ $errors->has('image') ? ' border-danger' : '' }}" id="customFile" name="image" value="">
                                <small class="form-text text-danger">{!! $errors->first('image') !!}</small>
                    </div>
                  


                       
                   
                   
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
              </div>
            </form>

          </div>
</div>
@endsection