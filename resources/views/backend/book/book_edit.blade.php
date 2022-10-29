@extends('admin.admin_master')
@section('admin')

<br>
<div class="col-10">
    <div class="box">
        <div class="box-header with-border">
            <h3 class="box-title"> Edit Book</h3>
        </div>
        <!--  box.header -->
        <div class="box-body">
            <div class="table_responsive">

                <form method="post" action="{{route('book.update', $book->id) }}" enctype="multipart/form-data">
                    @csrf

                    <input type="hidden" name="id" value="{{ $book->id }}">
                    <input type="hidden" name="old_image" value="{{ $book->image }}">


        <div class="form-group">
            <h5> Book Name English <span class="text-danger">*</span></h5>
            <div class="controls">
                <input type="text" name="name_en" class="form-control" value="{{ $book->name_en }}">
                    @error('name_en')
                    <span class="text-danger">{{ $message}} </span>
                    @enderror
            </div>
        </div>
        <div class="form-group">
            <h5> Book Name French <span class="text-danger">*</span></h5>
            <div class="controls">
                <input type="text" name="name_fr" class="form-control" value="{{ $book->name_fr }}">
                    @error('name_fr')
                    <span class="text-danger">{{ $message}} </span>
                    @enderror
            </div>
        </div>
        <div class="form-group">
            <h5> Book Image <span class="text-danger">*</span></h5>
            <div class="controls">
                <input type="file" name="image" class="form-control" value="{{('upload/book/'.$book->image)}}">
                    @error('image')
                    <span class="text-danger">{{ $message}} </span>
                    @enderror
            </div>
        </div>

        <div class="text-xs-right">
            <input type="submit" class="btn btn-rounded btn-primary mb-5" value="Valider">
        </div>
                </form>

            </div>
        </div>
    </div>
</div>

@endsection