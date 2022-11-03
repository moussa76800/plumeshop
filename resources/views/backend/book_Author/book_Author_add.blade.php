@extends('admin.admin_master')
@section('admin')

<br>
<div class="col-10">
    <div class="box">
        <div class="box-header with-border">
            <h3 class="box-title"> Add Author/Book</h3>
        </div>
        <!--  box.header -->
        <div class="box-body">
            <div class="table_responsive">

                <form method="post" action="{{route('bookAuthor.store') }}" >
                    @csrf


                    <div class="form-group">
                        <h5> Select Book <span class="text-danger">*</span></h5>
                        <div class="controls">
                            <select name="book_id" id="select" required="" class="form-control">
                                <option value="" selected="" disabled="">Select the Book</option>
                                 @foreach($books as $book)                
                                <option value="{{$book->id }}">{{ $book->name_en }}</option>
                                @endforeach
                            </select>
                            @error('book_id')
                    <span class="text-danger">{{ $message}} </span>
                    @enderror
                        </div>
                   </div>

                   
                   <div class="form-group">
                    <h5> Select Author <span class="text-danger">*</span></h5>
                    <div class="controls">
                        <select name="author_id" id="select" required="" class="form-control">
                            <option value="" selected="" disabled="">Select the Author</option>
                             @foreach($authors as $author)                
                            <option value="{{$author->id }}">{{ $author->name_en }}</option>
                            @endforeach
                        </select>
                        @error('author_id')
                <span class="text-danger">{{ $message}} </span>
                @enderror
                    </div>
               </div>

        {{-- <div class="form-group">
            <h5> Book Id<span class="text-danger">*</span></h5>
            <div class="controls">
                <input type="text" name="book_id" class="form-control">
                    @error('book_id')
                    <span class="text-danger">{{ $message}} </span>
                    @enderror
            </div>
        </div>
        <div class="form-group">
            <h5> Author Id <span class="text-danger">*</span></h5>
            <div class="controls">
                <input type="text" name="author_id" class="form-control">
                    @error('author_id')
                    <span class="text-danger">{{ $message}} </span>
                    @enderror
            </div>
        </div> --}}
        
        <div class="text-xs-right">
            <input type="submit" class="btn btn-rounded btn-primary mb-5" value="Insert Data Book/Author">
        </div>
                </form>

            </div>
        </div>
    </div>
</div>

@endsection