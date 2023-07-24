@extends('admin.admin_master')
@section('admin')

<br>





<div class="col-12">
    <div class="box">
        <div class="box-header with-border">
            <h3 class="box-title"> @if (session()->get('language') == 'english') Add Blog Category @else Ajouter une  Catégory dans le Blog @endif </h3>
        </div>
        <!--  box.header -->
        <div class="box-body">
            <div class="table_responsive">

                
                <form method="post" action="{{route('store.blogCategory') }}">
                    @csrf


        <div class="form-group">
            <h5>@if (session()->get('language') == 'english')  Name   @else Nom  @endif <span class="text-danger">*</span></h5>
            <div class="controls">
                <input type="text" name="name_en" class="form-control">
                    @error('name_en')
                    <span class="text-danger">{{ $message}} </span>
                    @enderror
            </div>
        </div>
       
<br>
        <div class="text-xs-right">
            <input type="submit" class="btn btn-rounded btn-primary mb-5" value="@if (session()->get('language') == 'english') Add  @else Ajouter @endif">
        </div>
                </form>

            </div>
        </div>
    </div>
</div>

@endsection