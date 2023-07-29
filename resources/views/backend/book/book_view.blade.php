@extends('admin.admin_master')
@section('admin')
    
    <!-- Main content -->
    <section class="content">
        {{ Form::hidden('', $increment=1) }}
        <div class="row">
            <div class="col-14">
                <div class="box">
                    <div class="box-header with-border">
                        <h3 class="box-title">Book List <span class="badge badge-pill badge-danger">{{ count($books) }}  </span></h3>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <div class="table-responsive">
                            <table id="example1" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>Number</th>
                                        {{-- <th>Images</th> --}}
                                        <th>Title</th>
                                        <th>ISBN</th>
                                        <th>Price</th>
                                        <th>Quantity</th> 
                                        <th>Discount Price</th>
                                        <th>Status</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                            
                                    @foreach ($books as $item)
                                    
                                    <tr>
                                        <td>{{ $increment }}</td>
                                        {{-- <td><img src="{{ asset($item->image) }}" style="width: 150px; height: 60px;"></td> --}}
                                        <td>{{ $item->title }}</td>
                                        <td>{{ $item->ISBN }}</td>
                                        <td>{{ $item->price }}</td>
                                        <td>{{ $item->product_qty }}</td>
                                        <td> 
                                            @if ($item->discount_price == null)
                                                <span class="badge badge-pill badge-danger">No Discount</span> 
                                            @else
                                                @php
                                                    $amount = $item->price - $item->discount_price;
                                                    $discount = ($amount / $item->price) * 100;
                                                @endphp
                                                <span class="badge badge-pill badge-success">{{ round($discount) }} %</span>
                                            @endif
                                        </td>
                                        <td>
                                            @if ($item->status == 1)
                                                <span class="badge badge-pill badge-success">Active</span>
                                            @else
                                                <span class="badge badge-pill badge-danger">Inactive</span>   
                                            @endif
                                        </td>
                                        <td width="30%">
                                            <a href="{{ route('book.detail', $item->id) }}" class="btn btn-primary" title="Details data"><i class="fa fa-eye"></i></a> 
                                            <a href="{{ route('edit.book', $item->id) }}" class="btn btn-warning" title="Edit data"><i class="fa fa-pencil"></i></a>
                                            <a href="{{ route('delete.book', $item->id) }}" class="btn btn-danger" title="Delete data" id="delete"><i class="fa fa-trash"></i></a>
                                            @if ($item->status == 1)
                                                <a href="{{ route('bookInactiveNow', $item->id) }}" class="btn btn-danger" title="Inactive Now"><i class="fa fa-arrow-down"></i></a>
                                            @else
                                                <a href="{{ route('bookActiveNow', $item->id) }}" class="btn btn-success" title="Active Now"><i class="fa fa-arrow-up"></i></a>
                                            @endif 
                                        </td>
                                    </tr>
                                    {{ Form::hidden('', $increment = $increment + 1) }}
                                    @endforeach
                                </tbody>
                            </table><br>
                            <div>
                                <a class="btn btn-success btn-lg btn-block pull-right" href="{{ route('add.book') }}"  title="Add data">Add Book</a>
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

        
@endsection
