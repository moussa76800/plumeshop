@extends('admin.admin_master')
@section('admin')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<br>
<div class="col-10">
    <div class="box">
        <div class="box-header with-border">
            <h3 class="box-title"> Add Book</h3>
        </div>
        <!--  box.header -->
        <div class="box-body">
            <div class="table_responsive">

                <form action="{{ route('books.search') }}" method="GET">
                    <input type="text" name="query" placeholder="Entrez votre recherche">
                   
                    <button type="submit">Rechercher</button>
                </form>
                

                {{-- <form method="post" action="{{route('book.store') }}" enctype="multipart/form-data">
                        @csrf

                        <form novalidate>
                            <div class="row">
                        <br>
                        <div class="col-md-4">
                        <div class="form-group">
                                    <h5> Book Name English <span class="text-danger">*</span></h5>
                                    <div class="controls">
                                        <input type="text" name="name_en" class="form-control">
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
                                    <input type="text" name="name_fr" class="form-control">
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
                        <input type="text" name="ISBN" class="form-control">
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
                        <input type="text" name="prix" class="form-control">
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
                        <input type="text" name="langue" class="form-control">
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
                        <input type="text" name="date_Publication" class="form-control">
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
                        <input type="text" name="product_qty" class="form-control">
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
                        <input type="text" name="product_code" class="form-control">
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
                        <input type="text" name="discount_price" class="form-control">
                            @error('discount_price')
                            <span class="text-danger">{{ $message}} </span>
                            @enderror
                    </div>
                </div>
                                </div> <!--end col md 4 -->
                            </div>
        
                            <div class="row">
                                <div class="col-md-6">
        <div class="form-group">
                    <h5>short_descp_en <span class="text-danger">*</span></h5>
                    <div class="controls">
                        <textarea name="short_descp_en" class="form-control" required placeholder='Textarea Text'></textarea>
                            @error('short_descp_en')
                            <span class="text-danger">{{ $message}} </span>
                            @enderror
                    </div>
                </div> 
                                </div> <!--end col md 6 -->

                                <div class="col-md-6"> 
        <div class="form-group">
                    <h5>short_descp_fr <span class="text-danger">*</span></h5>
                    <div class="controls">
                        <textarea name="short_descp_fr" class="form-control" required placeholder='Textarea Text'></textarea>
                            @error('short_descp_fr')
                            <span class="text-danger">{{ $message}} </span>
                            @enderror
                    </div>
                </div>
                                </div> <!--end col md 6 -->
        </div><!--end row -->
        <div class="row">
                                <div class="col-md-4"> 
                                    <div class="form-group">
                                        <h5>Main_thambnail<span class="text-danger">*</span></h5>
                                        <div class="controls">
                                            <input type="file" name="product_thambnail" class="form-control" onchange="mainThamUrl(this)">
                                                @error('product_thambnail')
                                                <span class="text-danger">{{ $message}} </span>
                                                @enderror
                                                <img src="" id="mainThamb">
                                        </div>
                                    </div> 
                                </div> <!--end col md 4 -->
                                <div class="col-md-4"> 
                                    <div class="form-group">
                                        <h5>Multiple Thambnail<span class="text-danger">*</span></h5>
                                        <div class="controls">
                                            <input type="file" name="multi_img[]" class="form-control" multiple="" id="multiImg">
                                                @error('multi_img')
                                                <span class="text-danger">{{ $message}} </span>
                                                @enderror
                                                <div class="row" id="preview_img"></div>
                                        </div>
                                    </div> 
                                </div> <!--end col md 4 -->
        
                                </div> <!--end col md 4 -->
                                {{-- <div class="col-md-4">  
                                    <div class="form-group">
                                        <h5>status <span class="text-danger">*</span></h5>
                                        <div class="controls">
                                            <input type="text" name="status" class="form-control">
                                                @error('status')
                                                <span class="text-danger">{{ $message}} </span>
                                                @enderror
                                        </div>
                                    </div>
                                </div> <!--end col md 4 -->
            </div>
             --}}
            {{-- <div class="row">
                <div class="col-md-6">
                <div class="form-group">
                    <h5>long_descp_en<span class="text-danger">*</span></h5>
                    <div class="controls">
                        <textarea id="editor1" name="long_descp_en" rows="10" cols="80" >
                            Long description English
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
                            Longue description en francais
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
                        <option value="{{$subCategory->id }}">{{ $subCategory->name_en }}</option>
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
                </div> <!--end col md 4 -->
                
                              
                <div class="col-md-4">
                    <div class="form-group">
                        <h5>Publisher Select <span class="text-danger">*</span></h5>
                        <div class="controls">
                            <select name="publisher_id" id="select" required="" class="form-control">
                                <option value="" selected="" disabled="">Select the Publisher</option>
                                @foreach($publishers as $publisher)                
                                <option value="{{$publisher->id }}">{{ $publisher->name_en }}</option>
                                @endforeach
                            </select>
                            @error('publisher_id')
                    <span class="text-danger">{{ $message}} </span>
                    @enderror
                        </div>
                    </div>
                </div> <!--end col md 4 -->  --}}
            
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