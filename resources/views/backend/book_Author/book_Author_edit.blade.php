@extends('admin.admin_master')
@section('admin')

<br>
<div class="col-10">
    <div class="box">
        <div class="box-header with-border">
            <h3 class="box-title"> Edit Author/Book</h3>
        </div>
        <!--  box.header -->
        <div class="box-body">
            <div class="table_responsive">

                <form method="post" action="{{route('bookAuthor.update', $book_Author->id) }}">
                    @csrf

                    <input type="hidden" name="id" value="{{ $book_Author->id }}">
                    <input type="hidden" name="old_image" value="{{ $book_Author->image }}">


        <div class="form-group">
            <h5> Book Id <span class="text-danger">*</span></h5>
            <div class="controls">
                @foreach($books as $book)
                <input type="text" name="book_id" class="form-control" value="{{ $book->name_en }}">
                @endforeach
                    @error('book_id')
                    <span class="text-danger">{{ $message}} </span>
                    @enderror
            </div>
        </div>
        <div class="form-group">
            <h5> Author Id <span class="text-danger">*</span></h5>
            <div class="controls">
                @foreach($authors as $author)
                <input type="text" name="author_id" class="form-control" value="{{ $author->name_en }}">
                @endforeach
                    @error('author_id')
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