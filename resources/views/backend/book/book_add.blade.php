@extends('admin.admin_master')
@section('admin')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<br>
<div class="col-10">
    <div class="box">
        <div class="box-header with-border">
            <h1 class="box-title"> Add Book</h1>
        </div>
        <!--  box.header -->
        <div class="container">
         
            <form method="POST" action="{{ route('book.store') }}">
                @csrf
                <div class="form-group">
                    <h5> ISBN<span class="text-danger">*</span></h5>
                    <input type="text" class="form-control" id="isbn" name="isbn" required>
                </div>
                <div class="form-group">
                    <h5> Price<span class="text-danger">*</span></h5>
                    <div class="controls">
                        <input type="text" name="prix" class="form-control">
                            @error('prix')
                            <span class="text-danger">{{ $message}} </span>
                            @enderror
                    </div>
                    
                    <div class="form-group">
                        <h5> product_qty<span class="text-danger">*</span></h5>
                        <div class="controls">
                            <input type="text" name="product_qty" class="form-control">
                                @error('product_qty')
                                <span class="text-danger">{{ $message}} </span>
                                @enderror
                        </div>
                        <div class="form-group">
                            <h5> discount_price<span class="text-danger">*</span></h5>
                            <div class="controls">
                                <input type="text" name="discount_price" class="form-control">
                                    @error('discount_price')
                                    <span class="text-danger">{{ $message}} </span>
                                    @enderror
                            </div>
                            <div class="form-group">
                                <h5>Category Select <span class="text-danger">*</span></h5>
                                <div class="controls">
                                    <select name="category_id" class="form-control" required="" >
                                        <option value="" selected="" disabled="">Select Category</option>
                                        @foreach($categories as $category)
                             <option value="{{ $category->id }}">{{ $category->name_en }}</option>	
                                        @endforeach
                                    </select>
                                    @error('category_id') 
                                 <span class="text-danger">{{ $message }}</span>
                                 @enderror 
                                 </div>
                                     </div>
                                     </div>
                                     </div>
                                     <div class="form-group">
                                        <h5>SubCategory Select <span class="text-danger">*</span></h5>
                                        <div class="controls">
                                            <select name="subcategory_id" class="form-control" required="" >
                                                <option value="" selected="" disabled="">Select SubCategory</option>
                                                 
                                            </select>
                                            @error('subcategory_id') 
                                         <span class="text-danger">{{ $message }}</span>
                                         @enderror 
                                         </div>
                                             </div>
                            

              
            

            <BR>
                <div class="row">
                
                    <div class="col-md-6">
                        <div class="form-group">
                        
                            <div class="controls">
                                <fieldset>
                                    <input type="checkbox" id="checkbox_2"  name = "featured"  value="1">
                                    <label for="checkbox_2">Featured</label>
                                </fieldset>
                                <fieldset>
                                    <input type="checkbox" id="checkbox_3" name= "special_offer" value="1">
                                    <label for="checkbox_3">Special Offer</label>
                                </fieldset>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="text-xs-right">
                    <input type="submit" class="btn btn-rounded btn-primary mb-5" value="Enregistrer" name="submit">
                </div>
            </form>
        </div>
    </div>
    <hr>
    {{-- <div class="book-info">
        <img src="book_cover.jpg" alt="Book Cover">
        <h2> Nom :{{ $name_en}}</h2>
        <p>Author: {{ $authorName}}</p>
        <p>ISBN: {{ $book->isbn }}</p>
        <p>Publisher: {{ $book->Publisher->name }}</p>
        <p>Published Date: 01-01-2022</p>
        <p>Description: Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam nec ultricies quam. Praesent vestibulum, sapien vitae blandit congue, lectus ipsum gravida elit, quis tempor est quam at orci. Nam consequat lobortis dolor, in tempor sapien bibendum ac. Sed semper, nibh vitae iaculis viverra, nisi mauris tristique augue, eu accumsan dolor orci vel est.</p>
      </div> --}}
      
</div>
                
      


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
                    var d= $('select[name="subcategory_id"]').empty();
                    $.each(data, function(key, value){
                        $('select[name="subcategory_id"]').append('<option value="'+value.id +'">' +value.name_en + '</option>');
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
    if(input.files && input.files[0]){
        var reader = new FileReader();
        reader.onload = function(e){
            $('#mainThamb').attr('src',e.target.result).width(80).height(80);
        };
        reader.readAsDataURL(input.files[0]);
    }
}
</script>


<!-- ================================= Start Show Multi Image JavaScript Code. ==================== -->
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
<!--  ================================= End Show Multi Image JavaScript Code. ==================== -->

@endsection