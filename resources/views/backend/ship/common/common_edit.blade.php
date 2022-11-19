@extends('admin.admin_master')
@section('admin')

@section('title')
@if (session()->get('language') == 'french') Editer une Commune @else Update The Common @endif 
@endsection

<br>
<div class="col-10">
    <div class="box">
        <div class="box-header with-border">
            <h3 class="box-title">@if (session()->get('language') == 'english') Edit Common @else Editer une Commune @endif </h3>
        </div>
        <!--  box.header -->
        <div class="box-body">
            <div class="table_responsive">

                <form method="post" action="{{route('update.common', $common->id) }}" >
                    @csrf

                    <input type="hidden" name="id" value="{{ $common->id }}">
                    

        
                    <div class="form-group">
                        <h5>@if (session()->get('language') == 'english') Select the Town @else Sélectionner une Ville @endif <span class="text-danger">*</span></h5>
                        <div class="controls">
                            <select name="town_id" id="select" required="" class="form-control">
                                <option value="" selected="" disabled="">@if (session()->get('language') == 'english') Select the Town @else Sélectionner une Ville @endif</option>
                                    @foreach($town as $item)                
                                <option value="{{$item->id }}"{{ $item->id == $common->town_id ? 'selected': '' }} >{{ $item->name }}</option>
                                @endforeach
                            </select>
                            @error('town_id')
                    <span class="text-danger">{{ $message}} </span>
                    @enderror
                        </div>
                    </div>

        
        <div class="form-group">
            <h5>@if (session()->get('language') == 'english') Common Name @else Nom de la Commune @endif <span class="text-danger">*</span></h5>
            <div class="controls">
                <input type="text" name="name" class="form-control" value="{{ $common->name }}">
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