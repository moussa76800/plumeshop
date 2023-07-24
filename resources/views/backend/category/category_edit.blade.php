@extends('admin.admin_master')
@section('admin')

<br>
<div class="col-10">
    <div class="box">
        <div class="box-header with-border">
            <h3 class="box-title"> Edit Category</h3>
        </div>
        <!--  box.header -->
        <div class="box-body">
            <div class="table_responsive">

                <form method="post" action="{{route('category.update', $category->id) }}" enctype="multipart/form-data">
                    @csrf

                    <input type="hidden" name="id" value="{{ $category->id }}">
                    <input type="hidden" name="old_image" value="{{ $category->image }}">


        <div class="form-group">
            <h5> @if (session()->get('language') == 'english')  Name   @else Nom  @endif <span class="text-danger">*</span></h5>
            <div class="controls">
                <input type="text" name="name_en" class="form-control" value="{{ $category->name }}">
                    @error('name_en')
                    <span class="text-danger">{{ $message}} </span>
                    @enderror
            </div>
        </div>

        <div class="text-xs-right">
            <input type="submit" class="btn btn-rounded btn-primary mb-5" value="@if (session()->get('language') == 'english') To Validate   @else Valider @endif">
        </div>
                </form>

            </div>
        </div>
    </div>
</div>

@endsection