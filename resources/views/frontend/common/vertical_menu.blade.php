

@php
$categories = App\Models\Category::orderBy('name','ASC')->get();
@endphp

<div class="side-menu animate-dropdown outer-bottom-xs">
    <div class="head"><i class="icon fa fa-align-justify fa-fw"></i>Categories</div>
    <nav class="yamm megamenu-horizontal">
      <ul class="nav">

        @foreach( $categories as $category)
        <li class="dropdown menu-item"> <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="" aria-hidden="true"></i>{{ $category->name}}</a>
          <ul class="dropdown-menu mega-menu">
            <li class="yamm-content">
              <div class="row">

                @php
                $subCategories = App\Models\SubCategory::where('category_id' ,$category->id)->orderBy('name' , 'ASC')->get();
            @endphp

            @foreach( $subCategories as $sub)

                <div class="col-sm-12 col-md-3">
                                                                         
                     <a href="{{ url('subCategory/book/'.$sub->id.'/'.$sub->name ) }}">  {{ $sub->name }} </a>
                    
                </div>
                @endforeach
                <!-- /.col -->
              </div>
              <!-- /.row --> 
            </li>
            <!-- /.yamm-content -->
          </ul>
          <!-- /.dropdown-menu --> </li>
          @endforeach
         
        <!-- /.menu-item -->
        
{{--        
                 </div>
                <div class="dropdown-banner-holder"> <a href="#"><img alt="" src="{{ asset('frontend/assets/images/banners/banner-side.png') }}" /></a> </div>
              </div>  --}}
              <!-- /.row --> 
            </li>
            <!-- /.yamm-content -->
          {{-- </ul>
          <!-- /.dropdown-menu --> </li>
        <!-- /.menu-item -->
        
       <li class="dropdown menu-item"> <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="icon fa fa-paper-plane"></i>Kids and Babies</a> 
          <!-- /.dropdown-menu --> </li>
        <!-- /.menu-item -->
        
        <li class="dropdown menu-item"> <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="icon fa fa-futbol-o"></i>Sports</a>  
          <!-- ================================== MEGAMENU VERTICAL ================================== --> 
          <!-- /.dropdown-menu --> 
          <!-- ================================== MEGAMENU VERTICAL ================================== --> </li>
        <!-- /.menu-item -->
        
         <li class="dropdown menu-item"> <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="icon fa fa-envira"></i>Home and Garden</a> 
          <!-- /.dropdown-menu --> </li> 
        <!-- /.menu-item -->
        
      </ul> --}}
      <!-- /.nav --> 
    </nav>
    <!-- /.megamenu-horizontal --> 
  </div>
  <!-- /.side-menu --> 
