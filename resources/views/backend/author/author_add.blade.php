@extends('admin.admin_master')
@section('admin')

<br>
<div class="col-10">
    <div class="box">
        <div class="box-header with-border">
            <h3 class="box-title"> Add Author</h3>
        </div>
        <!--  box.header -->
        <div class="box-body">
            <div class="table_responsive">

                <form method="post" action="{{route('author.store') }}" >
                    @csrf


        <div class="form-group">
            <h5> Author Name English <span class="text-danger">*</span></h5>
            <div class="controls">
                <input type="text" name="name_en" class="form-control">
                    @error('name_en')
                    <span class="text-danger">{{ $message}} </span>
                    @enderror
            </div>
        </div>
        <div class="form-group">
            <h5> Author Name French <span class="text-danger">*</span></h5>
            <div class="controls">
                <input type="text" name="name_fr" class="form-control">
                    @error('name_fr')
                    <span class="text-danger">{{ $message}} </span>
                    @enderror
            </div>
        </div>
        <div class="form-group">
            <h5> Author FirstName English <span class="text-danger">*</span></h5>
            <div class="controls">
                <input type="text" name="firstname_en" class="form-control">
                    @error('firstname_en')
                    <span class="text-danger">{{ $message}} </span>
                    @enderror
            </div>
        </div>
        <div class="form-group">
            <h5> Author FirstName French <span class="text-danger">*</span></h5>
            <div class="controls">
                <input type="text" name="firstname_fr" class="form-control">
                    @error('firstname_fr')
                    <span class="text-danger">{{ $message}} </span>
                    @enderror
            </div>
        </div>
        
        <div class="text-xs-right">
            <input type="submit" class="btn btn-rounded btn-primary mb-5" value="Add New Author">
        </div>
                </form>

            </div>
        </div>
    </div>
</div>

@endsection