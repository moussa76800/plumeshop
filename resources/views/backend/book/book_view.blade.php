@extends('admin.admin_master')
@section('admin')
    

  

      <!-- Main content -->
      
      <section class="content">
        {{Form::hidden('',$increment=1)}}
        <div class="row">
         
       
          <div class="col-12">

           <div class="box">
              <div class="box-header with-border">
                <h3 class="box-title">Book List <span class="badge badge-pill badge-danger"> {{ count( $book) }} </span></h3>
              </div>
              <!-- /.box-header -->
              <div class="box-body">
                  <div class="table-responsive">
                    <table id="example1" class="table table-bordered table-striped">
                      <thead>
                          <tr>
                              <th>Number</th>
                              <th>Images</th>
                              <th>Name_en</th>
                              <th>Name_fr</th>
                              <th>ISBN</th>
                              <th>Publication's Date</th>
                              <th>Language</th>
                              <th>Prix</th>
                              <th>Quantity</th> 
                              <th>Discount Price</th>
                               <th>Status</th>
                                <th>Action</th>
                              {{-- <th>Product Code</th>
                              <th>Discount Price</th>
                              <th>short_descp_en</th>
                              <th>short_descp_fr</th>
                              <th>Product Thambail</th>
                              <th>Special Offer</th>
                              <th>long Descp En</th>
                              <th>long Descp Fr</th>
                             
                              <th>SubCategory</th>
                              <th>Category</th>
                              <th>Publisher</th> --}}
                             
                          </tr>
                      </thead>
                      <tbody>
                        @foreach ($book as $item)
                            
                        
                          <tr>
                              <td>{{$increment}}</td>
                              <td><img src="{{asset($item->product_thambnail) }}" style="width: 150px; height:60px;"></td>
                              <td>{{ $item->name_en}}</td>
                              <td>{{ $item->name_fr}}</td>
                              <td>{{ $item->ISBN}}</td>
                              <td>{{ $item->datePublication}}</td>
                              <td>{{ $item->langue}}</td>
                              <td>{{ $item->prix}}</td>
                              <td>{{ $item->product_qty}}</td>
                              <td> 
                                @if ($item->discount_price == null)
                                <span class="badge badge-pill badge-danger">No Discount</span> 
                                @else
                                   @php
                                      $amount = $item->prix - $item->discount_price;
                                      $discount =($amount/$item->prix)* 100;
                                  @endphp
                                        <span class="badge badge-pill badge-success">{{ round($discount)}} %</span>
                                   
                                 @endif
                              </td>
                              <td>
                                @if ($item->status == 1)
                                    <span class="badge badge-pill badge-success">Active</span>
                                @else
                                    <span class="badge badge-pill badge-danger">Inactive</span>   
                                @endif
                              </td>
                             
                              <td width = "30%"">
                                <a href="{{route('edit.book',$item->id) }}" class="btn btn-primary" title="Details data"><i class="fa fa-eye" ></i></a>
                                <a href="{{route('edit.book',$item->id) }}" class="btn btn-warning" title="Edit data"><i class="fa fa-pencil" ></i></a>
                                <a href="{{route('delete.book',$item->id) }}" class="btn btn-danger" title="Delete data" id="delete"><i class="fa fa-trash "></i></a>

                               {{-- @if ($item->status == 1)
                               <a href="{{route('bookInactiveNow',$item->id) }}" class="btn btn-danger" title="Inactive Now"><i class="fa fa-arrow-down" ></i></a>
                                @else
                                <a href="{{route('bookActiveNow',$item->id) }}" class="btn btn-success" title="Active Now"><i class="fa fa-arrow-up" ></i></a>
                                @endif --}}
                            </tr>
                                {{Form::hidden('',$increment = $increment + 1)}}
                          @endforeach
                        </tbody>
                      </table><br>
                      <div>
                    <a class="btn btn-success btn-lg btn-block pull-right" href="{{route('add.book') }}"  title="Add data">Add Book</a>
                      </div>
                                      
                  </div>
              </div>
              <!-- /.box-body -->
            </div>
            <!-- /.box -->

                    
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </section>
      <!-- /.content -->
    
    </div>

























@endsection