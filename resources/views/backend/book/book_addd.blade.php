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
                


             <form novalidate>
                        <div class="row">
                    <br>
                    <div class="col-md-4">
                          <div class="form-group">
                                <h5> Book Name English <span class="text-danger">*</span></h5>
                                 <div class="controls">
                                    <input type="text" name="name_en" class="form-control" required='' value="{{$book->name_en}}">
                                        @error('name_en')
                                        <span class="text-danger">{{ $message}} </span>
                                        @enderror
                                 </div>
                           </div>
                    </div> <!--end col md 4 -->

                    <div class="col-md-4">
                        <div class="form-group">
                            <h5> Book Name French <span class="text-danger">*</span></h5>
                            <div class="controls">
                                <input type="text" name="name_fr" class="form-control"required='' value="{{$book->name_fr}}">
                                    @error('name_fr')
                                    <span class="text-danger">{{ $message}} </span>
                                    @enderror
                            </div>
                        </div>
                    </div> <!--end col md 4 -->

                    <div class="col-md-4">
                         <div class="form-group">
                <h5> ISBN <span class="text-danger">*</span></h5>
                            <div class="controls">
                                <input type="text" name="ISBN" class="form-control" required='' value="{{$book->ISBN}}">
                                    @error('ISBN')
                                    <span class="text-danger">{{ $message}} </span>
                                    @enderror
                            </div>
                         </div>
                   </div> <!--end col md 4 -->

                            <div class="col-md-4">
                                <div class="form-group">
                        <h5> Prix <span class="text-danger">*</span></h5>
                        <div class="controls">
                            <input type="text" name="prix" class="form-control"required='' value="{{$book->prix}}">
                                @error('prix')
                                <span class="text-danger">{{ $message}} </span>
                                @enderror
                        </div>
                    </div>
                 </div> <!--end col md 4 -->

                         <div class="col-md-4">
                              <div class="form-group">
                                <h5> Langue <span class="text-danger">*</span></h5>
                                <div class="controls">
                                    <input type="text" name="langue" class="form-control"required='' value="{{$book->langue}}">
                                        @error('langue')
                                        <span class="text-danger">{{ $message}} </span>
                                        @enderror
                                </div>
                          </div>
                      </div> <!--end col md 4 -->

                 <div class="col-md-4">
                                <div class="form-group">
                            <h5> Publication's Date <span class="text-danger">*</span></h5>
                            <div class="controls">
                                <input type="text" name="date_Publication" class="form-control" required='' value="{{$book->datePublication}}">
                                    @error('date_Publication')
                                    <span class="text-danger">{{ $message}} </span>
                                    @enderror
                            </div>
                        </div>          
                 </div> <!--end col md 4 -->
                        
                <div class="col-md-4"> 
                        <div class="form-group">
                            <h5>Quantity<span class="text-danger">*</span></h5>
                            <div class="controls">
                                <input type="text" name="product_qty" class="form-control" required='' value="{{$book->product_qty}}">
                                    @error('product_qty')
                                    <span class="text-danger">{{ $message}} </span>
                                    @enderror
                            </div>
                         </div>
                 </div> <!--end col md 4 -->

                <div class="col-md-4"> 
                        <div class="form-group">
                            <h5>product_code <span class="text-danger">*</span></h5>
                            <div class="controls">
                                <input type="text" name="product_code" class="form-control" required='' value="{{$book->product_code}}">
                                    @error('product_code')
                                    <span class="text-danger">{{ $message}} </span>
                                    @enderror
                            </div>
                         </div> 
                </div> <!--end col md 4 -->
        
                <div class="col-md-4">  
                        <div class="form-group">
                            <h5>discount_price <span class="text-danger">*</span></h5>
                            <div class="controls">
                                <input type="text" name="discount_price" class="form-control"required='' value="{{$book->discount_price}}">
                                    @error('discount_price')
                                    <span class="text-danger">{{ $message}} </span>
                                    @enderror
                            </div>
                        </div>
                </div> <!--end col md 4 -->
                        </div>
    
                <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                             <h5>short_descp_en <span class="text-danger">*</span></h5>
                            <div class="controls">
                                <textarea name="short_descp_en" class="form-control"  required placeholder='Textarea Text'>
                                {!! $book->short_descp_en !!}</textarea>
                                    @error('short_descp_en')
                                    <span class="text-danger">{{ $message}} </span>
                                    @enderror
                            </div>
                        </div> <!--end col md 4S -->
                        </div>
                        <div class="col-md-4"> 
                            <div class="form-group">
                                <h5>short_descp_fr <span class="text-danger">*</span></h5>
                                <div class="controls">
                                    <textarea name="short_descp_fr" class="form-control" required placeholder='Textarea Text'>
                                        {!! $book->short_descp_fr !!}
                                    </textarea>
                                        @error('short_descp_fr')
                                        <span class="text-danger">{{ $message}} </span>
                                        @enderror
                             </div>
                        </div>
                 </div> <!--end col md 4 -->
                            <div class="col-md-4">  
                                <div class="form-group">
                                    <h5>status <span class="text-danger">*</span></h5>
                                    <div class="controls">
                                        <input type="text" name="status" class="form-control" value="{{$book->status}}">
                                            @error('status')
                                            <span class="text-danger">{{ $message}} </span>
                                            @enderror
                                    </div>
                                </div>
                            </div> <!--end col md 4 -->                        
    </div><!--end row -->

    <div class="row">                 
        </div>
        <div class="row">
            <div class="col-md-6">
            <div class="form-group">
                <h5>long_descp_en<span class="text-danger">*</span></h5>
                <div class="controls">
                    <textarea id="editor1" name="long_descp_en" rows="10" cols="80" >
                        
                        {!! $book->long_descp_en !!}
                    </textarea>
                        @error('long_descp_en')
                        <span class="text-danger">{{ $message}} </span>
                        @enderror
                </div>
            </div>
        </div> <!--end col md 6 -->
        <div class="col-md-6">
            <div class="form-group">
                <h5>long_descp_fr <span class="text-danger">*</span></h5>
                <div class="controls">
                    <textarea id="editor2" name="long_descp_fr" rows="10" cols="80">
                        
                        {!! $book->long_descp_fr !!}
                    </textarea>
                        @error('long_descp_fr')
                        <span class="text-danger">{{ $message}} </span>
                        @enderror
                </div>
            </div>
        </div> <!--end col md 6 -->
        
    </div> <!--end ROW-->
    <div class="col-md-4">
        <div class="form-group">
            <h5>subCategory Select <span class="text-danger">*</span></h5>
            <div class="controls">
                <select name="subCategory_id" id="select" required="" class="form-control">
                    <option value="" selected="" disabled="">Select the subCategory</option>
                    @foreach($subCategories as $subCategory)      
                    <option value="{{$subCategory->id }}"{{$subCategory->id == $book->subCategory_id ? 'selected':'' }}>{{ $subCategory->name_en }}</option>
                    @endforeach
                </select>
                @error('subCategory_id')
        <span class="text-danger">{{ $message}} </span>
        @enderror
            </div>
        </div>
    </div> <!--end col md 4 -->

            <div class="col-md-4">
                <div class="form-group">
                    <h5>Category Select <span class="text-danger">*</span></h5>
                    <div class="controls">
                        <select name="categoryBook_id" id="select" required="" class="form-control">
                            <option value="" selected="" disabled="">Select the Category</option>
                            @foreach($categories as $category)                
                            <option value="{{$category->id }}"{{$category->id == $book->categoryBook_id ? 'selected':'' }}>{{ $category->name_en }}</option>
                            @endforeach
                        </select>
                        @error('categoryBook_id')
                <span class="text-danger">{{ $message}} </span>
                @enderror
                    </div>
                </div>
            </div> <!--end col md 4 -->
            
                          
            <div class="col-md-4">
                <div class="form-group">
                    <h5>Publisher Select <span class="text-danger">*</span></h5>
                    <div class="controls">
                        <select name="publisher_id" id="select" required="" class="form-control">
                            <option value="" selected="" disabled="">Select the Publisher</option>
                            @foreach($publishers as $publisher)                
                            <option value="{{$publisher->id }}"{{$publisher->id == $book->publisher_id ? 'selected':'' }}>{{ $publisher->name_en }}</option>
                            @endforeach
                        </select>
                        @error('publisher_id')
                <span class="text-danger">{{ $message}} </span>
                @enderror
                    </div>
                </div>
            </div> <!--end col md 4 -->
        
    <BR>
        <div class="row">
        
            <div class="col-md-6">
                <div class="form-group">
                
                    <div class="controls">
                        <fieldset>
                            <input type="checkbox" id="checkbox_2"name="special_offer"  value="1"
                            {{ $book->special_offer == 1 ? 'checked' : ''}}>
                            <label for="checkbox_2">Special Offer</label>
                        </fieldset>
                        <fieldset>
                            <input type="checkbox" id="checkbox_3" name="featured"  value="1"
                            {{ $book->featured == 1 ? 'checked' : ''}}>
                            <label for="checkbox_3">Featured</label>
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
           
       <form method="post" action="{{ route('update-bookThambnail')}}" enctype="multipart/form-data">
       @csrf
                <input type="hidden" name="id" value="{{ $book->id }}">
                <input type="hidden" name="old_img" value="{{ $book->product_thambnail }}">


           <div class="row row-sm">
                <div class="col-md-3">

                        <div class="card">
                            <img src="{{ asset($book->product_thambnail) }}" class="card-img-top" style="height: 130px; width: 280px;">
                            <div class="card-body">
                        
                                <p class="card-text"> 
                                    <div class="form-group">
                                        <label class="form-control-label">Change Image <span class="tx-danger">*</span></label>
                                        <input  type="file" name="product_thambnail" class="form-control" onChange="mainThamUrl(this)" required="">
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

 <section class="content">
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
 	 </section>
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
                           $('select[name="subCategory_id"]').append('<option value="'+value.id +'">' +value.name_en + '</option>');
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

<script>
 
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
     
    </script>

@endsection