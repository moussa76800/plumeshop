@extends('admin.admin_master')
@section('admin')

<br>
<div class="col-10">
    <div class="box">
        <div class="box-header with-border">
            <h3 class="box-title"> Add Book</h3>
        </div>
        <!--  box.header -->
        <div class="box-body">
            <div class="table_responsive">

                <form method="post" action="{{route('book.store') }}" enctype="multipart/form-data">
                   
                    @csrf

        <div class="form-group">
            <h5> Book Name English <span class="text-danger">*</span></h5>
            <div class="controls">
                <input type="text" name="name_en" class="form-control">
                    @error('name_en')
                    <span class="text-danger">{{ $message}} </span>
                    @enderror
            </div>
        </div>
        <div class="form-group">
            <h5> Book Name French <span class="text-danger">*</span></h5>
            <div class="controls">
                <input type="text" name="name_fr" class="form-control">
                    @error('name_fr')
                    <span class="text-danger">{{ $message}} </span>
                    @enderror
            </div>
        </div>
        <div class="form-group">
            <h5> ISBN <span class="text-danger">*</span></h5>
            <div class="controls">
                <input type="text" name="ISBN" class="form-control">
                    @error('ISBN')
                    <span class="text-danger">{{ $message}} </span>
                    @enderror
            </div>
        </div>
        <div class="form-group">
            <h5> Prix <span class="text-danger">*</span></h5>
            <div class="controls">
                <input type="text" name="prix" class="form-control">
                    @error('prix')
                    <span class="text-danger">{{ $message}} </span>
                    @enderror
            </div>
        </div>
        <div class="form-group">
            <h5> Langue <span class="text-danger">*</span></h5>
            <div class="controls">
                <input type="text" name="langue" class="form-control">
                    @error('langue')
                    <span class="text-danger">{{ $message}} </span>
                    @enderror
            </div>
        </div>
        <div class="form-group">
            <h5> Publication's Date <span class="text-danger">*</span></h5>
            <div class="controls">
                <input type="text" name="date_Publication" class="form-control">
                    @error('date_Publication')
                    <span class="text-danger">{{ $message}} </span>
                    @enderror
            </div>
        </div>
    
        </div> <div class="form-group">
            <h5>Quantity<span class="text-danger">*</span></h5>
            <div class="controls">
                <input type="text" name="product_qty" class="form-control">
                    @error('product_qty')
                    <span class="text-danger">{{ $message}} </span>
                    @enderror
            </div>
        </div>
        <div class="form-group">
            <h5>product_code <span class="text-danger">*</span></h5>
            <div class="controls">
                <input type="text" name="product_code" class="form-control">
                    @error('product_code')
                    <span class="text-danger">{{ $message}} </span>
                    @enderror
            </div>
        </div>
        <div class="form-group">
            <h5>discount_price <span class="text-danger">*</span></h5>
            <div class="controls">
                <input type="text" name="discount_price" class="form-control">
                    @error('discount_price')
                    <span class="text-danger">{{ $message}} </span>
                    @enderror
            </div>
        </div>
        <div class="form-group">
            <h5>short_descp_en <span class="text-danger">*</span></h5>
            <div class="controls">
                <input type="text" name="short_descp_en" class="form-control">
                    @error('short_descp_en')
                    <span class="text-danger">{{ $message}} </span>
                    @enderror
            </div>
        </div> 
        <div class="form-group">
            <h5>short_descp_fr <span class="text-danger">*</span></h5>
            <div class="controls">
                <input type="text" name="short_descp_fr" class="form-control">
                    @error('short_descp_fr')
                    <span class="text-danger">{{ $message}} </span>
                    @enderror
            </div>
        </div>
        <div class="form-group">
            <h5>product_thambnail<span class="text-danger">*</span></h5>
            <div class="controls">
                <input type="text" name="product_thambnail" class="form-control">
                    @error('product_thambnail')
                    <span class="text-danger">{{ $message}} </span>
                    @enderror
            </div>
        </div>
        <div class="form-group">
            <h5>special_offer <span class="text-danger">*</span></h5>
            <div class="controls">
                <input type="text" name="special_offer" class="form-control">
                    @error('special_offer')
                    <span class="text-danger">{{ $message}} </span>
                    @enderror
            </div>
        </div>
        <div class="form-group">
            <h5>long_descp_en<span class="text-danger">*</span></h5>
            <div class="controls">
                <input type="text" name="long_descp_en" class="form-control">
                    @error('long_descp_en')
                    <span class="text-danger">{{ $message}} </span>
                    @enderror
            </div>
        </div>
        <div class="form-group">
            <h5>long_descp_fr <span class="text-danger">*</span></h5>
            <div class="controls">
                <input type="text" name="long_descp_fr" class="form-control">
                    @error('long_descp_fr')
                    <span class="text-danger">{{ $message}} </span>
                    @enderror
            </div>
        </div>
        <div class="form-group">
            <h5>status <span class="text-danger">*</span></h5>
            <div class="controls">
                <input type="text" name="status" class="form-control">
                    @error('status')
                    <span class="text-danger">{{ $message}} </span>
                    @enderror
            </div>
        </div>
        <div class="form-group">
            <h5>subCategory Select <span class="text-danger">*</span></h5>
            <div class="controls">
                <select name="subCategory_id" id="select" required="" class="form-control">
                    <option value="" selected="" disabled="">Select the subCategory</option>
                     @foreach($subCategories as $subCategory)                
                    <option value="{{$subCategory->id }}">{{ $subCategory->name_en }}</option>
                    @endforeach
                </select>
                @error('subCategory_id')
        <span class="text-danger">{{ $message}} </span>
        @enderror
            </div>
</div>
         <div class="form-group">
            <h5>categoryBook_id<span class="text-danger">*</span></h5>
            <div class="controls">
                <input type="text" name="categoryBook_id" class="form-control">
                    @error('categoryBook_id')
                    <span class="text-danger">{{ $message}} </span>
                    @enderror
            </div>
        </div>
        <div class="form-group">
            <h5>publisher_id <span class="text-danger">*</span></h5>
            <div class="controls">
                <input type="text" name="publisher_id" class="form-control">
                    @error('publisher_id')
                    <span class="text-danger">{{ $message}} </span>
                    @enderror
            </div>
        </div>
        <div class="form-group">
            <h5> Book Image <span class="text-danger">*</span></h5>
            <div class="controls">
                <input type="file" name="image" class="form-control">
                    @error('image')
                    <span class="text-danger">{{ $message}} </span>
                    @enderror
            </div>
        </div>

        <div class="text-xs-right">
            <input type="submit" class="btn btn-rounded btn-primary mb-5" value="Add New Book">
        </div>
                </form>

            </div>
        </div>
    </div>
</div>

@endsection