@extends('admin.admin_master')
@section('admin')
    

  

      <!-- Main content -->
      
      <section class="content">
        {{Form::hidden('',$increment=1)}}
        <div class="row">
         
       
          <div class="col-12">

           <div class="box">
              <div class="box-header with-border">
                <h3 class="box-title">Book List</h3>
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
                              <th>Prix</th>
                              <th>Language</th>
                              <th>Publication's Date</th>
                              <th>Quantity</th>
                              <th>Product Code</th>
                              <th>Discount Price</th>
                              <th>short_descp_en</th>
                              <th>short_descp_fr</th>
                              <th>Product Thambail</th>
                              <th>Special Offer</th>
                              <th>long Descp En</th>
                              <th>long Descp Fr</th>
                              <th>Status</th>
                              <th>SubCategory</th>
                              <th>Publisher</th>
                              <th>Category</th>
                              <th>Action</th>
                          </tr>
                      </thead>
                      <tbody>
                        @foreach ($book as $item)
                            
                        
                          <tr>
                              <td>{{$increment}}</td>
                              <td><img src="{{asset($item->image) }}" style="width: 200px; height:60px;"></td>
                              <td>{{ $item->name_en}}</td>
                              <td>{{ $item->name_fr}}</td>
                              <td>{{ $item->ISBN}}</td>
                              <td>{{ $item->prix}}</td>
                              <td>{{ $item->langue}}</td>
                              <td>{{ $item->datePublication}}</td>
                              <td>{{ $item->product_code}}</td>
                              <td>{{ $item->discount_price}}</td>
                              <td>{{ $item->short_descp_en}}</td>
                              <td>{{ $item->short_descp_fr}}</td>
                              <td>{{ $item->product_thambnail}}</td>
                              <td>{{ $item->special_offer}}</td>
                              <td>{{ $item->long_descp_en}}</td>
                              <td>{{ $item->long_descp_fr}}</td>
                              <td>{{ $item->Status}}</td>
                              <td>{{ $item->subCategory_id}}</td>
                              <td>{{ $item->publisher_id}}</td>
                              <td>{{ $item->category_id}}</td>

                              <td>
                                <a href="" class="btn btn-warning" title="Edit data"><i class="fa fa-pencil" ></i></a>
                                <a href="" class="btn btn-danger" title="Delete data" id="delete"><i class="fa fa-trash "></i></a>
                                {{-- <a href="{{route('edit.book',$item->id) }}" class="btn btn-warning" title="Edit data"><i class="fa fa-pencil" ></i></a>
                                <a href="{{route('delete.book',$item->id) }}" class="btn btn-danger" title="Delete data" id="delete"><i class="fa fa-trash "></i></a> --}}
                              </td>
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