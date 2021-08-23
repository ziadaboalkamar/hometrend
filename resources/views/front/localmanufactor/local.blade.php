@extends('layouts.site')

@section('content')
    <div class="local-manufacture">
        <div class="title-saved title text-center row-2-pd-30-product">
            <h2>Local Manufacture</h2>
        </div>
        <div class="container">
            @include('admin.includes.alerts.success')
            @include('admin.includes.alerts.errors')
            <form method="POST" action="{{route('local.save')}}" enctype="multipart/form-data">
                @csrf
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="inputEmail4"><i class="fa fa-shapes"></i> Name</label>
                        <input type="text" name="name" class="form-control" id="inputEmail4">
                        @error('name')
                        <span class="text-danger">{{$message}}</span>
                        @enderror
                    </div>
                    <div class="form-group col-md-6">
                        <label for="inputPassword4"><i class="fas fa-tools"></i> Wood Type</label>
                        <select name="wood" id="inputState" class="form-control">
                            <option selected>Choose...</option>
                            @foreach($woods as $wood)

                            <option>{{$wood->name}}</option>
                            @endforeach
                        </select>
                        @error('wood')
                        <span class="text-danger">{{$message}}</span>
                        @enderror
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="inputEmail4"><i class="fa fa-ruler-vertical"></i> Length</label>
                        <input name="length" type="text" class="form-control" id="inputEmail4">
                        @error('length')
                        <span class="text-danger">{{$message}}</span>
                        @enderror
                    </div>
                    <div class="form-group col-md-6">
                        <label for="inputEmail4"><i class="fa fa-ruler-horizontal"></i> Width</label>
                        <input name="width" type="text" class="form-control" id="inputEmail4">
                        @error('width')
                        <span class="text-danger">{{$message}}</span>
                        @enderror
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="inputEmail4"><i class="fa fa-paint-roller"></i> Color</label>
                        <input name="color" type="text" class="form-control" id="inputEmail4">
                        @error('color')
                        <span class="text-danger">{{$message}}</span>
                        @enderror
                    </div>
                    <div class="form-group col-md-6">
                        <label for="inputEmail4"><i class="fa fa-phone-alt"></i> Phone</label>
                        <input name="phone" type="text" class="form-control" id="inputEmail4">
                        @error('phone')
                        <span class="text-danger">{{$message}}</span>
                        @enderror
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-12">
                        <label for="exampleFormControlTextarea1"><i class="fa fa-info"></i> Details</label>
                        <textarea name="details" class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
                        @error('details')
                        <span class="text-danger">{{$message}}</span>
                        @enderror
                    </div>
                </div>
                <label for="exampleFormControlFile1">Cover Photo</label>
                <div class="input-group mb-3">
                    <div class="input-group-prepend">
                        <span class="input-group-text" id="inputGroupFileAddon01">Upload</span>
                    </div>
                    <div class="custom-file">
                        <input type="file" name="photo" class="custom-file-input" id="inputGroupFile01" aria-describedby="inputGroupFileAddon01">
                        <label class="custom-file-label" for="inputGroupFile01">Choose file</label>
                    </div>
                    @error('photo')
                    <span class="text-danger">{{$message}}</span>
                    @enderror
                </div>

                <label for="exampleFormControlFile1">Photo from different ways</label>
                <div class="input-group mb-3">
                    <div class="input-group-prepend">
                        <span class="input-group-text" id="inputGroupFileAddon01">Upload</span>
                    </div>
                    <div class="custom-file">
                        <input type="file" name="gallery[]" multiple class="custom-file-input" id="inputGroupFile01" aria-describedby="inputGroupFileAddon01">
                        <label class="custom-file-label" for="inputGroupFile01">Choose file</label>
                    </div>
                    @error('gallery')
                    <span class="text-danger">{{$message}}</span>
                    @enderror
                </div>
                <div class="button-local text-center">
                    <button type="submit" class="btn btn-primary local-add-design"><i class="fa fa-plus"></i> Add Design</button>
                </div>
            </form>
        </div>
    </div>
@endsection
