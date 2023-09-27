@php
$categories = App\Models\Category::orderBy('name', 'ASC')->get();
@endphp

<div class="side-menu animate-dropdown outer-bottom-xs">
  <div class="head">
      <i class="icon fa fa-align-justify fa-fw"></i>
      {{ trans('categories.Categories') }}
  </div>
  <nav class="yamm megamenu-horizontal">
      <ul class="nav">
          @foreach ($categories as $category)
              <li class="dropdown menu-item"> 
                  <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                      <i class="" aria-hidden="true"></i>
                      {{ trans("categories.{$category->name}") }}
                  </a>
                  <ul class="dropdown-menu mega-menu">
                      <li class="yamm-content">
                          <div class="row">
                              @php
                              $subCategories = App\Models\SubCategory::where('category_id', $category->id)->orderBy('name', 'ASC')->get();
                              @endphp

                              @foreach ($subCategories as $sub)
                                  <div class="col-sm-12 col-md-3">
                                    <a href="{{ url('subCategory/book/' . $sub->id . '/' . $sub->name) }}">
                                        {{ trans("categories.Sub-categories.{$sub->name}") }}
                                    </a>
                                    
                                  </div>
                              @endforeach
                          </div>
                      </li>
                  </ul>
              </li>
          @endforeach
      </ul>
  </nav>
</div>
