@extends('admin.admin_master')
@section('admin')
    

  

      <!-- Main content -->
      
      <section class="content">
        {{Form::hidden('',$increment=1)}}
        <div class="row">
         
       
          <div class="col-12">

           <div class="box">
              <div class="box-header with-border">
                <h3 class="box-title"> @if (session()->get('language') == 'english')List of blog content @else Liste des Contenus du blog @endif  <span class="badge badge-pill badge-danger"> {{ count( $viewBlogPost) }} </span></h3>
              </div>
              <!-- /.box-header -->
              <div class="box-body">
                  <div class="table-responsive">
                    <table id="example1" class="table table-bordered table-striped">
                      <thead>
                          <tr>
                              <th> @if (session()->get('language') == 'english')Number @else Numéro @endif </th>
                              <th>  Image </th>
                              <th> @if (session()->get('language') == 'english') Title in English @else Titre en Anglais @endif </th>
                              <th> @if (session()->get('language') == 'english') Title in French @else Titre en Français @endif </th>
                              <th> @if (session()->get('language') == 'english') Content in English @else Contenu en Anglais @endif </th>
                              <th> @if (session()->get('language') == 'english') Content in French @else Contenu en Francais @endif </th>
                              <th> @if (session()->get('language') == 'english') Category  @else Categorie @endif </th>
                              <th>Action</th>
                          </tr>
                      </thead>
                      <tbody>
                        @foreach ($viewBlogPost as $item)
                          <tr>
                              <td>{{$increment}}</td>
                              <td>{{ $item->post_image}}</td>
                              <td>{{ $item->post_title_en}}</td>
                              <td>{{ $item->post_title_fr}}</td>
                              <td>{{ $item->post_details_en}}</td>
                              <td>{{ $item->post_details_fr}}</td>
                              <td>{{ $item->category_id}}</td>
                              <td>
                                {{-- <a href="{{route('edit.blogCategory',$item->id) }}" class="btn btn-warning" title="Edit data"><i class="fa fa-pencil" ></i></a>
                                <a href="{{route('delete.blogCategory',$item->id) }}" class="btn btn-danger" title="Delete data" id="delete"><i class="fa fa-trash "></i></a>  --}}
                              </td>
                          </tr>
                                {{Form::hidden('',$increment = $increment + 1)}}
                          @endforeach
                        </tbody>
                      </table><br>
                      <div>
                    <a class="btn btn-success btn-lg btn-block pull-right" href="{{route('add.Post') }}"  title="Add data">@if (session()->get('language') == 'english')Add Content
                    @else Ajouter un Contenu @endif</a>
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

@endsection