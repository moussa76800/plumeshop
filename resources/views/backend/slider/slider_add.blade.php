@extends('admin.admin_master')
@section('admin')

<br>
<div class="col-10">
    <div class="box">
        <div class="box-header with-border">
            <h3 class="box-title"> Add Slider</h3>
        </div>
        <!--  box.header -->
        <div class="box-body">
            <div class="table_responsive">

                <form method="post" action="{{route('slider.store') }}" enctype="multipart/form-data">
                    @csrf
                    

        <div class="form-group">
            <h5> Title <span class="text-danger">*</span></h5>
            <div class="controls">
                <input type="text" name="title" class="form-control">
                    @error('title')
                    <span class="text-danger">{{ $message}} </span>
                    @enderror
            </div>
        </div>
        <div class="form-group">
            <h5> Description <span class="text-danger">*</span></h5>
            <div class="controls">
                <input type="text" name="description" class="form-control">
                    @error('description')
                    <span class="text-danger">{{ $message}} </span>
                    @enderror
            </div>
        </div>
            <div class="form-group">
            <h5>Image <span class="text-danger">*</span></h5>
            <div class="controls">
                <input type="file" name="slider_img" class="form-control">
                    @error('slider_img')
                    <span class="text-danger">{{ $message}} </span>
                    @enderror
            </div>
        </div>

        <div class="text-xs-right">
            <input type="submit" class="btn btn-rounded btn-primary mb-5" value="Add New Slider">
        </div>
                </form>

            </div>
        </div>
    </div>
</div>

@endsection