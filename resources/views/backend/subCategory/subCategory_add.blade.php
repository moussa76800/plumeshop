@extends('admin.admin_master')
@section('admin')

<br>
<div class="col-10">
    <div class="box">
        <div class="box-header with-border">
            <h3 class="box-title"> Add subCategory</h3>
        </div>
        <!--  box.header -->
        <div class="box-body">
            <div class="table_responsive">

                <form method="post" action="{{route('subcategory.store') }}">
                    @csrf



         <div class="form-group">
                        <h5>Category Select <span class="text-danger">*</span></h5>
                        <div class="controls">
                            <select name="category_id" id="select" required="" class="form-control">
                                <option value="" selected="" disabled="">Select the Category</option>
                                 @foreach($categories as $category)                
                                <option value="{{$category->id }}">{{ $category->name_en }}</option>
                                @endforeach
                            </select>
                            @error('category_id')
                    <span class="text-danger">{{ $message}} </span>
                    @enderror
                        </div>
        </div>
							
        <div class="form-group">
            <h5> subCategory Name English <span class="text-danger">*</span></h5>
            <div class="controls">
                <input type="text" name="name_en" class="form-control">
                    @error('name_en')
                    <span class="text-danger">{{ $message}} </span>
                    @enderror
            </div>
        </div>
        <div class="form-group">
            <h5> subCategory Name French <span class="text-danger">*</span></h5>
            <div class="controls">
                <input type="text" name="name_fr" class="form-control">
                    @error('name_fr')
                    <span class="text-danger">{{ $message}} </span>
                    @enderror
            </div>
        </div>
        
        <br>    
       
        <div class="text-xs-right">
            <input type="submit" class="btn btn-rounded btn-primary mb-5" value="Add New subCategory">
        </div>
                </form>

            </div>
        </div>
    </div>
</div>

@endsection