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
			  <h4 class="box-title">@if (session()->get('language') == 'english') Edit Blog Post @else Editer un Contenu dans le Blog @endif</h4>
			   
			</div>
			<!-- /.box-header -->
			<div class="box-body">
			  <div class="row"> 
				<div class="col">

  <form method="post" action="{{ route('update.Post',$editBlogPost->id) }}" enctype="multipart/form-data" >
		 	@csrf

             <input type="hidden" name="id" value="{{ $editBlogPost->id }}">
             <input type="hidden" name="old_image" value="{{$editBlogPost->post_image }}">


		 <div class="row">
	        <div class="col-12">	
                <div class="row"> 

			<div class="col-md-6">
                        <div class="form-group">
                    <h5>@if (session()->get('language') == 'english') Title English @else Titre en Anglais @endif  <span class="text-danger">*</span></h5>
                    <div class="controls">
                        <input type="text" name="post_title_en" class="form-control" value="{{ $editBlogPost->post_title_en }}" >
            @error('post_title_en') 
            <span class="text-danger">{{ $message }}</span>
            @enderror
	 	  </div>
		</div>
            </div> <!-- end col md 6 -->


			<div class="col-md-6">
                        <div class="form-group">
                    <h5>@if (session()->get('language') == 'english') Title in French  @else Titre en Français @endif  <span class="text-danger">*</span></h5>
                    <div class="controls">
                        <input type="text" name="post_title_fr" class="form-control" value="{{$editBlogPost->post_title_fr }}" >
            @error('post_title_fr') 
            <span class="text-danger">{{ $message }}</span>
            @enderror
	 		 </div>
		</div>
            </div> <!-- end col md 6 -->
					</div> <!-- end row  -->


<div class="row"> 
			<div class="col-md-6">
	 <div class="form-group">
	<h5>@if (session()->get('language') == 'english') Select a Category @else Selectionnez une Categorie @endif <span class="text-danger">*</span></h5>
	<div class="controls">
		<select name="category_id" class="form-control" >
			<option value="" selected="" disabled="">@if (session()->get('language') == 'english') Select a Category @else Selectionnez une Categorie @endif </option>
		 @foreach($blogCategory as $category)
         @if (session()->get('language') == 'english') <option value="{{$category->id }}"{{ $category->id == $editBlogPost->category_id ? 'selected': '' }} >{{ $category->name_en }}</option> 
         @else <option value="{{$category->id }}"{{ $category->id == $editBlogPost->category_id ? 'selected': '' }} >{{ $category->name_fr }}</option>	 @endif 
			@endforeach
		</select>
		@error('category_id') 
	 <span class="text-danger">{{ $message }}</span>
	 @enderror 
	 </div>
		 </div>
            </div> <!-- end col md 6 -->

			<div class="col-md-6">
	    <div class="form-group">
			<h5> Image  <span class="text-danger">*</span></h5>
			<div class="controls">
	 <input type="file" name="post_image" class="form-control"   value="{{('upload/post/'.$editBlogPost->post_image)}}"   >
     @error('post_image') 
	 <span class="text-danger">{{ $message }}</span>
	 @enderror
	 <img src="" id="mainThmb">
	 		 </div>
		</div>
			</div> <!-- end col md 6 -->
</div> <!-- end row  -->
 
<div class="row"> <!-- start row  -->
			<div class="col-md-6">

	    <div class="form-group">
			<h5>@if (session()->get('language') == 'english')Add Content in English @else Ajouter du Contenu en Anglais @endif  <span class="text-danger">*</span></h5>
			<div class="controls">
	<textarea id="editor1" name="post_details_en" rows="10" cols="80"  value="{{ $editBlogPost->post_details_en }}" >
		@if (session()->get('language') == 'english') Content Details in English @else Détails du Contenu en Anglais @endif
						</textarea>  
	 		 </div>
		</div>
				
			</div> <!-- end col md 6 -->

			<div class="col-md-6">

	     <div class="form-group">
			<h5>@if (session()->get('language') == 'english')Add  Content in French @else Ajouter un Contenu en Français @endif <span class="text-danger">*</span></h5>
			<div class="controls">
	<textarea id="editor2" name="post_details_fr" rows="10" cols="80" value="{{ $editBlogPost->post_details_fr }}" >
		@if (session()->get('language') == 'english') Content Details in French @else Détails du Contenu en Français @endif
						</textarea>       
	 		 </div>
		</div>
            </div> <!-- end col md 6 -->		 
                </div> <!-- end  row  -->
	 <hr>

	 	<div class="text-xs-right">
<input type="submit" class="btn btn-rounded btn-primary mb-5" value="@if (session()->get('language') == 'english') To Validate @else Valider  @endif">
						</div>
					</form>
 </div>
			<!-- /.box-body -->
		  </div>
		  <!-- /.box -->

		</section>
		<!-- /.content -->
	  </div>
 
@endsection