@extends('admin.admin_master')
@section('admin')

<br>
<div class="col-10">
    <div class="box">
        <div class="box-header with-border">
            <h3 class="box-title"> Edit subCategory</h3>
        </div>
        <!--  box.header -->
        <div class="box-body">
            <div class="table_responsive">

                <form method="post" action="{{route('subcategory.update', $subCategory->id) }}" >
                    @csrf

                    <input type="hidden" name="id" value="{{ $subCategory->id }}">
                    

        <div class="form-group">
            <h5>Category Select <span class="text-danger">*</span></h5>
            <div class="controls">
                <select name="category_id" id="select" required="" class="form-control">
                    <option value="" selected="" disabled="">Select the Category</option>
                        @foreach($categorie as $category)                
                    <option value="{{$category->id }}"{{ $category->id == $subCategory->category_id ? 'selected': '' }} >{{ $category->name }}</option>
                    @endforeach
                </select>
                @error('category_id')
        <span class="text-danger">{{ $message}} </span>
        @enderror
            </div>
        </div>

        
        <div class="form-group">
            <h5> Category Name  <span class="text-danger">*</span></h5>
            <div class="controls">
                <input type="text" name="name" class="form-control" value="{{ $subCategory->name }}">
                    @error('name')
                    <span class="text-danger">{{ $message}} </span>
                    @enderror
            </div>
        </div>
       

        <div class="text-xs-right">
            <input type="submit" class="btn btn-rounded btn-primary mb-5" value="Valider">
        </div>
                </form>

            </div>
        </div>
    </div>
</div>

@endsection