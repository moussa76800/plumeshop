@extends('admin.admin_master')
@section('admin')
    

  

      <!-- Main content -->
      
      <section class="content">
        {{Form::hidden('',$increment=1)}}
        <div class="row">
         
       
          <div class="col-10">

           <div class="box">
              <div class="box-header with-border">
                <h3 class="box-title">Book_Author Table Pivot</h3>
              </div>
              <!-- /.box-header -->
              <div class="box-body">
                  <div class="table-responsive">
                    <table id="example1" class="table table-bordered table-striped">
                      <thead>
                          <tr>
                              <th>Number</th>
                              <th>Book Id</th>
                              <th>Author Id</th>
                              <th>Action</th>
                          </tr>
                      </thead>
                      <tbody>
                        @foreach ( $booksAthors as $item)
                            
                        
                          <tr>
                              <td>{{$increment}}</td>
                              <td>{{ $item['book']['book_id'] }}</td>
                              <td>{{$item['author']['author_id']}}</td>
                            <td>
                                <a href="{{route('edit.bookAuthor',$item->id) }}" class="btn btn-warning" title="Edit data"><i class="fa fa-pencil" ></i></a>
                                <a href="{{route('delete.bookAuthor',$item->id) }}" class="btn btn-danger" title="Delete data" id="delete"><i class="fa fa-trash "></i></a>
                            </td>
                          </tr>
                                {{Form::hidden('',$increment = $increment + 1)}}
                          @endforeach
                        </tbody>
                      </table><br>
                      <div>
                    <a class="btn btn-success btn-lg btn-block pull-right" href="{{route('add.bookAuthor') }}"  title="Add data">Insert Data Book/Author</a>
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