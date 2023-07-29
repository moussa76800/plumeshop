@extends('admin.admin_master')
@section('admin')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<br>
<section class="content">
    <div class="col-10">
        <div class="box">
            <div class="box-header with-border">
                <h3 class="box-title"> Edit Book</h3>
            </div>
            <!--  box.header -->
            <div class="box-body">
                <div class="table_responsive">

                    <form method="post" action="{{route('book.update', $book->id) }}">
                        @csrf
                        <input type="hidden" name="id" value="{{ $book->id }}">

                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <h5> Price<span class="text-danger">*</span></h5>
                                    <div class="controls">
                                        <input type="text" name="prix" class="form-control" required="" value="{{ $book->price }}">
                                        @error('prix')
                                        <span class="text-danger">{{ $message}} </span>
                                        @enderror
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="form-group">
                                    <h5>Quantity<span class="text-danger">*</span></h5>
                                    <div class="controls">
                                        <input type="text" name="product_qty" class="form-control" required="" value="{{ $book->product_qty }}">
                                        @error('product_qty')
                                        <span class="text-danger">{{ $message}} </span>
                                        @enderror
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="form-group">
                                    <h5>product_code <span class="text-danger">*</span></h5>
                                    <div class="controls">
                                        <input type="text" name="product_code" class="form-control" required="" value="{{ $book->product_code }}">
                                        @error('product_code')
                                        <span class="text-danger">{{ $message}} </span>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                        </div><!--end row -->

                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <h5>discount_price <span class="text-danger">*</span></h5>
                                    <div class="controls">
                                        <input type="text" name="discount_price" class="form-control" value="{{ $book->discount_price }}">
                                        @error('discount_price')
                                        <span class="text-danger">{{ $message}} </span>
                                        @enderror
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="form-group">
                                    <h5>subCategory Select <span class="text-danger">*</span></h5>
                                    <div class="controls">
                                        <select name="subCategory_id" id="select" required="" class="form-control">
                                            <option value="" selected="" disabled="">Select the subCategory</option>
                                            @foreach($subCategories as $subCategory)
                                            <option value="{{ $subCategory->id }}" {{ $subCategory->id == $book->subCategory_id ? 'selected':'' }}>{{ $subCategory->name }}</option>
                                            @endforeach
                                        </select>
                                        @error('subCategory_id')
                                        <span class="text-danger">{{ $message}} </span>
                                        @enderror
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="form-group">
                                    <h5>Category Select <span class="text-danger">*</span></h5>
                                    <div class="controls">
                                        <select name="categoryBook_id" id="select" required="" class="form-control">
                                            <option value="" selected="" disabled="">Select the Category</option>
                                            @foreach($categories as $category)
                                            <option value="{{ $category->id }}" {{ $category->id == $book->categoryBook_id ? 'selected':'' }}>{{ $category->name }}</option>
                                            @endforeach
                                        </select>
                                        @error('categoryBook_id')
                                        <span class="text-danger">{{ $message}} </span>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                        </div><!--end row -->

                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <div class="controls">
                                        <fieldset>
                                            <input type="checkbox" id="checkbox_1" name="newBook" value="1" {{ $book->newBook == 1 ? 'checked' : '' }}>
                                            <label for="checkbox_1">New Book</label>
                                        </fieldset>
                                        <fieldset>
                                            <input type="checkbox" id="checkbox_2" name="featured" value="1" {{ $book->featured == 1 ? 'checked' : '' }}>
                                            <label for="checkbox_2">Featured</label>
                                        </fieldset>
                                        <fieldset>
                                            <input type="checkbox" id="checkbox_3" name="special_offer" value="1" {{ $book->special_offer == 1 ? 'checked' : '' }}>
                                            <label for="checkbox_3">Special Offer</label>
                                        </fieldset>
                                    </div>
                                </div>
                            </div>
                        </div>
                        {{-- <div class="form-group">
                            <h5> Book Image <span class="text-danger">*</span></h5>
                            <div class="controls">
                                <input type="file" name="image" class="form-control">
                                    @error('image')
                                    <span class="text-danger">{{ $message}} </span>
                                    @enderror
                            </div>
                        </div> --}}

                        <div class="text-xs-right">
                            <input type="submit" class="btn btn-rounded btn-primary mb-5" value="Valider">
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>
</section>



<!-- /////////////////////////////// start Thambnail Image Update ///////////////////////////////// -->

<section class="content">
    <div class="row">
        <div class="col-md-12">
            <div class="box bt-3 border-info">
                <div class="box-header">
                    <h4 class="box-title">Book Thambnail Image <strong>Update</strong></h4>
                </div>
               
                <form method="post" action="{{ route('update-bookThambnail', ['id' => $book->id]) }}" enctype="multipart/form-data">

                    @csrf
                    <input type="hidden" name="id" value="{{ $book->id }}">
                    <input type="hidden" name="old_img" value="{{ $book->image }}">

                    <div class="row row-sm">
                        <div class="col-md-3">
                            <div class="card">
                                <img src="{{ asset($book->image) }}" class="card-img-top" style="height: 130px; width: 280px;">
                                <div class="card-body">
                                    <p class="card-text"> 
                                        <div class="form-group">
                                            <label class="form-control-label">Change Image <span class="tx-danger">*</span></label>
                                            <input type="file" name="image" class="form-control" onChange="mainThamUrl(this)" required="">
                                            <img src="" id="mainThmb">
                                        </div> 
                                    </p>
                                </div>
                            </div> 	
                        </div><!--  end col md 3		 -->	
                    </div>			
                    <div class="text-xs-right">
                        <input type="submit" class="btn btn-rounded btn-primary mb-5" value="Update Image">
                    </div>
                    <br><br>
                </form>		   
            </div>
        </div>
    </div> <!-- // end row  -->
</section>

<!-- /////////////////////////////// End Thambnail Image Update ///////////////////////////////// -->

<!-- /////////////////////////////// start Multiple Image Update ///////////////////////////////// -->

 {{-- <section class="content">
 	<div class="row">

<div class="col-md-12">
				<div class="box bt-3 border-info">
				  <div class="box-header">
		 <h4 class="box-title">Product Multiple Image <strong>Update</strong></h4>
				  </div>
			
		<form method="post" action="{{ route('update-bookMultiImage')}}" enctype="multipart/form-data">
        @csrf
			<div class="row row-sm">
				@foreach($multiImgs as $img)
				<div class="col-md-3">

<div class="card">
  <img src="{{ asset($img->photo_name) }}" class="card-img-top" style="height: 130px; width: 280px;">
  <div class="card-body">
    <h5 class="card-title">
<a href="{{ route ('book.multiImg.delete', $img->id) }}" class="btn btn-sm btn-danger" id="delete" title="Delete Data"><i class="fa fa-trash"></i> </a>
     </h5>
    <p class="card-text"> 
    	<div class="form-group">
    		<label class="form-control-label">Change Image <span class="tx-danger">*</span></label>
    		<input class="form-control" type="file" name="multi_img[{{ $img->id }}]">
    	</div> 
    </p>
   
  </div>
</div> 		
						</div><!--  end col md 3		 -->	
				@endforeach
			</div>			

			<div class="text-xs-right">
<input type="submit" class="btn btn-rounded btn-primary mb-5" value="Update Image">
		 </div>
<br><br>
		</form>		   
				</div>
			  </div>
  	</div> <!-- // end row  -->
 	 </section>--}}
<!-- /////////////////////////////// start Multiple Image Update ///////////////////////////////// -->




<script type="text/javascript">
    $(document).ready(function(){
       $('select[name="category_id"]').on('change', function(){
           var category_id = $(this).val();
           if(category_id) {
               $.ajax({
                   url :"{{ url('/subcategory/ajax') }}/"+ category_id,
                   type:"GET",
                   dataType:"json",
                   success:function(data) {
                       var d= $('select[name="subCategory_id"]').empty();
                       $.each(data, function(key, value){
                           $('select[name="subCategory_id"]').append('<option value="'+value.id +'">' +value.name + '</option>');
                       });
                   },
               });
           }else {
               alert('danger');
           }
       });
    });
   </script>

<script type="text/javascript">
	function mainThamUrl(input){
		if (input.files && input.files[0]) {
			var reader = new FileReader();
			reader.onload = function(e){
				$('#mainThmb').attr('src',e.target.result).width(80).height(80);
			};
			reader.readAsDataURL(input.files[0]);
		}
	}	
</script>


{{--<script>
 
  $(document).ready(function(){
   $('#multiImg').on('change', function(){ //on file input change
      if (window.File && window.FileReader && window.FileList && window.Blob) //check File API supported browser
      {
          var data = $(this)[0].files; //this file data
           
          $.each(data, function(index, file){ //loop though each file
              if(/(\.|\/)(gif|jpe?g|png)$/i.test(file.type)){ //check supported file type
                  var fRead = new FileReader(); //new filereader
                  fRead.onload = (function(file){ //trigger function on successful read
                  return function(e) {
                      var img = $('<img/>').addClass('thumb').attr('src', e.target.result) .width(80)
                  .height(80); //create image element 
                      $('#preview_img').append(img); //append image to output element
                  };
                  })(file);
                  fRead.readAsDataURL(file); //URL representing the file's data.
              }
          });
           
      }else{
          alert("Your browser doesn't support File API!"); //if File API is absent
      }
   });
  });
   
  </script> --}}

@endsection