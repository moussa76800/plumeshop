@extends('admin.admin_master')
@section('admin')

<br>
<div class="col-10">
    <div class="box">
        <div class="box-header with-border">
            <h3 class="box-title"> @if (session()->get('language') == 'english') Edit Blog Category @else Editer une  Catégorie dans le Blog @endif </h3>
        </div>
        <!--  box.header -->
        <div class="box-body">
            <div class="table_responsive">

                
                <form method="post" action="{{route('update.blogCategory') }}">
                    @csrf
                    <input type="hidden" name="id" value="{{ $editBlogCategory->id }}">


        <div class="form-group">
            <h5>@if (session()->get('language') == 'english')  Name English  @else Nom en Anglais @endif <span class="text-danger">*</span></h5>
            <div class="controls">
                <input type="text" name="name_en" class="form-control" value="{{ $editBlogCategory->name_en }}"">
                    @error('name_en')
                    <span class="text-danger">{{ $message}} </span>
                    @enderror
            </div>
        </div>
        <div class="form-group">
            <h5>@if (session()->get('language') == 'english')  Name French  @else Nom en Francais @endif <span class="text-danger">*</span></h5>
            <div class="controls">
                <input type="text" name="name_fr" class="form-control" value="{{ $editBlogCategory->name_fr }}">
                    @error('name_fr')
                    <span class="text-danger">{{ $message}} </span>
                    @enderror
            </div>
<br>
        <div class="text-xs-right">
            <input type="submit" class="btn btn-rounded btn-primary mb-5" value="@if (session()->get('language') == 'english') To Validate   @else Valider @endif">
        </div>
                </form>

            </div>
        </div>
    </div>
</div>

@endsection