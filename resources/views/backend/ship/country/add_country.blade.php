@extends('admin.admin_master')
@section('admin')

<br>
<div class="col-10">
    <div class="box">
        <div class="box-header with-border">
            <h3 class="box-title">@if (session()->get('language') == 'french') Ajouter un Pays @else Add  Country @endif</h3>
        </div>
        <!--  box.header -->
        <div class="box-body">
            <div class="table_responsive">

                <form method="post" action="{{route('country.store') }}" >
                    @csrf


        <div class="form-group">
            <h5>@if (session()->get('language') == 'french') Nom du Pays @else Country Name @endif  <span class="text-danger">*</span></h5>
            <div class="controls">
                <input type="text" name="name" class="form-control">
                    @error('name')
                    <span class="text-danger">{{ $message}} </span>
                    @enderror
            </div>
        </div>

       
              <br>
        <div class="text-xs-right">
            <input type="submit" class="btn btn-rounded btn-primary mb-5" value="Add New Country">
        </div>
                </form>

            </div>
        </div>
    </div>
</div>

@endsection