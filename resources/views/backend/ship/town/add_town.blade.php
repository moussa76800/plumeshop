@extends('admin.admin_master')
@section('admin')

<br>
<div class="col-10">
    <div class="box">
        <div class="box-header with-border">
            <h3 class="box-title">@if (session()->get('language') == 'english')Add the Town @else Ajouter une Ville @endif </h3>
        </div>
        <!--  box.header -->
        <div class="box-body">
            <div class="table_responsive">

                <form method="post" action="{{route('town.store') }}" >
                    @csrf


                    <div class="form-group">
                        <h5> @if (session()->get('language') == 'english')Select Country @else Sélectionner le pays @endif  <span class="text-danger">*</span></h5>
                        <div class="controls">
                            <select name="country_id" id="select" required="" class="form-control">
                                <option value="" selected="" disabled=""> @if (session()->get('language') == 'english')Select the Country @else Sélectionner le pays @endif </option>
                                 @foreach($countries as $country)                
                                <option value="{{$country->id }}">{{ $country->name }}</option>
                                @endforeach
                            </select>
                            @error('country_id')
                    <span class="text-danger">{{ $message}} </span>
                    @enderror
                                </div>
                                <BR>
                <div class="form-group">
                    <h5>@if (session()->get('language') == 'english') Town Name @else Nom de la Ville @endif <span class="text-danger">*</span></h5>
                    <div class="controls">
                        <input type="text" name="name" class="form-control">
                            @error('name')
                            <span class="text-danger">{{ $message}} </span>
                            @enderror
                    </div>
                </div>
            
        </div>
              <br>
        <div class="text-xs-right">
            <input type="submit" class="btn btn-rounded btn-primary mb-5" @if (session()->get('language') == 'english')value="Add New Town" @else value='Ajouter une ville' @endif >
        </div>
                </form>

            </div>
        </div>
    </div>
</div>

@endsection