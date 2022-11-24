@extends('admin.admin_master')
@section('admin')
 
@section('title')
@if (session()->get('language') == 'french')Liste des Coupons @else   Coupons Page  @endif 
@endsection

  

      <!-- Main content -->
      
      <section class="content">
        {{Form::hidden('',$increment=1)}}
        <div class="row">
         
       
          <div class="col-10">

           <div class="box">
              <div class="box-header with-border">
                <h3 class="box-title">Coupon List</h3>
              </div>
              <!-- /.box-header -->
              <div class="box-body">
                  <div class="table-responsive">
                    <table id="example1" class="table table-bordered table-striped">
                      <thead>
                        @if (session()->get('language') == 'french')
                          <tr>
                              <th>Numéro</th>
                              <th>Nom</th>
                              <th>Réduction</th>
                              <th>Status</th>
                              <th>Action</th>
                          </tr>
                          @else 
                          <tr>
                            <th>Number</th>
                            <th>Name</th>
                            <th>Discount</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                         @endif 
                      </thead>
                      <tbody>
                        @foreach ($coupons  as $item)
                                                    
                          <tr>
                              <td>{{$increment}}</td>
                              <td>@if (session()->get('language') == 'french'){{ $item->name_fr}} @else {{ $item->name_en}}@endif </td>
                              <td>{{ $item->coupon_discount}} %</td>
                              <td>{{ $item->validity}}</td>
                              <td>
                                @if ($item->status == 1)
                                <span class="badge badge-pill badge-success">Active</span>
                            @else
                                <span class="badge badge-pill badge-danger">Inactive</span>   
                            @endif
                              </td>
                              <td>
                                <a href="" class="btn btn-warning" title="Edit data"><i class="fa fa-pencil" ></i></a>
                                <a href="" class="btn btn-danger" title="Delete data" id="delete"><i class="fa fa-trash "></i></a>
                                @if ($item->status == 1)
                                <a href="" class="btn btn-danger" title="Inactive Now"><i class="fa fa-arrow-down" ></i></a>
                                 @else
                                 <a href="" class="btn btn-success" title="Active Now"><i class="fa fa-arrow-up" ></i></a>
                                 @endif
                              </td>
                          </tr>
                                {{Form::hidden('',$increment = $increment + 1)}}
                          @endforeach
                        </tbody>
                      </table><br>
                      <div>
                    <a class="btn btn-success btn-lg btn-block pull-right" href="{{ route('add.coupon') }}"  title="Add data">@if (session()->get('language') == 'french')Ajouter un Coupon @else Add Coupon @endif</a>
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