 <ul>
	@foreach($books as $item)
    @if (session()->get('language') == 'french')
    <li> <img src="{{ asset($item->product_thambnail) }} " style="width: 30px; height: 30px;"> {{ $item->name_fr }}
        <hr>
 </li>
 @else
	<li> <img src="{{ asset($item->product_thambnail) }} " style="width: 30px; height: 30px;"> {{ $item->name_en }}
        <hr>
 </li>
 @endif
    
	@endforeach
</ul> 

<style>
	
    body {
        background-color: #eee
    }
    .card {
        background-color: #fff;
        padding: 15px;
        border: none
    }
    .input-box {
        position: relative
    }
    .input-box i {
        position: absolute;
        right: 13px;
        top: 15px;
        color: #ced4da
    }
    .form-control {
        height: 50px;
        background-color: #eeeeee69
    }
    .form-control:focus {
        background-color: #eeeeee69;
        box-shadow: none;
        border-color: #eee
    }
    .list {
        padding-top: 20px;
        padding-bottom: 10px;
        display: flex;
        align-items: center
    }
    .border-bottom {
        border-bottom: 2px solid #eee
    }
    .list i {
        font-size: 19px;
        color: red
    }
    .list small {
        color: #dedddd
    }
    </style>
    
    @if(!$books->isEmpty())
    <div class="alert alert-danger text-center" role="alert">
        @if (session()->get('language') == 'english') <strong>Product Not Found</strong> @else <strong>Article pas trouvé !</strong> @endif
    </div>

    
    @else
     
    
    <div class="container mt-5">
        <div class="row d-flex justify-content-center ">
            <div class="col-md-6">
                <div class="card">
                    
    
                @foreach($books as $item)
                @if (session()->get('language') == 'english')
       <a href="{{ url('book/detail/'.$item->id.'/'.$item->name_en ) }}">
                    <div class="list border-bottom">  <img src="{{ asset($item->product_thambnail) }}" style="width: 30px; height: 30px;"> 
                        
       <div class="d-flex flex-column ml-3" style="margin-left: 10px;"> <span>{{ $item->name_en }} </span> <small> ${{ $item->prix }}</small> </div>
                    </div>
                    </a>
                @else
                <a href="{{ url('book/detail/'.$item->id.'/'.$item->name_fr ) }}">
                    <div class="list border-bottom">  <img src="{{ asset($item->product_thambnail) }}" style="width: 30px; height: 30px;"> 
                        
       <div class="d-flex flex-column ml-3" style="margin-left: 10px;"> <span>{{ $item->name_fr }} </span> <small> ${{ $item->prix }}</small> </div>
                    </div>
                    </a>
                @endif

                    @endforeach
                    
                </div>
            </div>
        </div>
    </div>
    
    @endif