@extends('admin.admin_master')
@section('admin')

@section('title')
@if (session()->get('language') == 'french') Editer une Ville @else Update The Ville @endif 
@endsection

<br>
<div class="col-10">
    <div class="box">
        <div class="box-header with-border">
            <h3 class="box-title">@if (session()->get('language') == 'english') Edit Town @else Editer une Ville @endif </h3>
        </div>
        <!--  box.header -->
        <div class="box-body">
            <div class="table_responsive">

                <form method="post" action="{{route('update.town', $town->id) }}">
                    @csrf

                    <input type="hidden" name="id" value="{{ $town->id }}">
                    

        
                    <div class="form-group">
                        <h5>@if (session()->get('language') == 'english') Select the Town @else Sélectionner une ville @endif <span class="text-danger">*</span></h5>
                        <div class="controls">
                            <select name="country_id" id="select" required="" class="form-control">
                                <option value="" selected="" disabled="">@if (session()->get('language') == 'english') Select the Town @else Sélectionner une ville @endif</option>
                                    @foreach($countries as $item)                
                                <option value="{{$item->id }}"{{ $item->id == $town->country_id ? 'selected': '' }} >{{ $item->name }}</option>
                                @endforeach
                            </select>
                            @error('country_id')
                    <span class="text-danger">{{ $message}} </span>
                    @enderror
                        </div>
                    </div>

        
        <div class="form-group">
            <h5>@if (session()->get('language') == 'english') Town Name @else Nom de la Ville @endif <span class="text-danger">*</span></h5>
            <div class="controls">
                <input type="text" name="name" class="form-control" value="{{ $town->name }}">
                    @error('name')
                    <span class="text-danger">{{ $message}} </span>
                    @enderror
            </div>
        </div>
        
       
       

        <div class="text-xs-right">
            <input type="submit" class="btn btn-rounded btn-primary mb-5" @if (session()->get('language') == 'english')value="To Validate" @else value="Valider" @endif>
        </div>
                </form>

            </div>
        </div>
    </div>
</div>

@endsection