@extends('admin.admin_master')
@section('admin')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>


	  <div class="container-full">
		<!-- Content Header (Page header) -->
		  
		<!-- Main content -->
		<section class="content">
 
		 <!-- Basic Forms -->
		  <div class="box">
			<div class="box-header with-border">
			  <h4 class="box-title">@if (session()->get('language') == 'english') Add Blog Post @else Ajouter un Contenu dans le Blog @endif</h4>
			   
			</div>
			<!-- /.box-header -->
			<div class="box-body">
			  <div class="row"> 
				<div class="col">
					

  <form method="post" action="{{ route('store.Post') }}" enctype="multipart/form-data" >
		 	@csrf
           


		 <div class="row">
	        <div class="col-12">	
                <div class="row"> 

			<div class="col-md-6">
                        <div class="form-group">
                    <h5> Title <span class="text-danger">*</span></h5>
                    <div class="controls">
                        <input type="text" name="post_title_en" class="form-control" required="">
            @error('post_title_en') 
            <span class="text-danger">{{ $message }}</span>
            @enderror
	 	  </div>
		</div>
            </div> <!-- end col md 6 -->


					</div> <!-- end row  -->


<div class="row"> 
			<div class="col-md-6">
	 <div class="form-group">
	<h5> Select a Category  <span class="text-danger">*</span></h5>
	<div class="controls">
		<select name="category_id" class="form-control" required="" >
			<option value="" selected="" disabled=""> Select a Category  </option>
		 @foreach($blogCategory as $category)
         <option value="{{ $category->id }}">{{ $category->name }}</option>  
			@endforeach
		</select>
		@error('category_id') 
	 <span class="text-danger">{{ $message }}</span>
	 @enderror 
	 </div>
		 </div>
            </div> <!-- end col md 6 -->
</div> <!-- end row  -->
<div class="row"> 
			<div class="col-md-6">
	    <div class="form-group">
			<h5> Image  <span class="text-danger">*</span></h5>
			<div class="controls">
	 <input type="file" name="post_image" class="form-control" onChange="mainThamUrl(this)" >
     @error('post_image') 
	 <span class="text-danger">{{ $message }}</span>
	 @enderror
	 <img src="" id="mainThmb">
	 		 </div>
		</div>
			</div> <!-- end col md 6 -->
</div>

 
<div class="row"> <!-- start row  -->
			<div class="col-md-6">

	    <div class="form-group">
			<h5>Add Content in English  <span class="text-danger">*</span></h5>
			<div class="controls">
	<textarea id="editor1" name="post_details_en" rows="10" cols="80" required="">
		 Content Details in English 
						</textarea>  
	 		 </div>
		</div>
				
			</div> <!-- end col md 6 -->
	 
                </div> <!-- end  row  -->
	 <hr>

	 	<div class="text-xs-right">
<input type="submit" class="btn btn-rounded btn-primary mb-5" value=" Add Content ">
						</div>
					</form>
 </div>
			<!-- /.box-body -->
		  </div>
		  <!-- /.box -->

		</section>
		<!-- /.content -->
	  </div>
 
  
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

@endsection