@extends('admin.admin_master')
@section('admin')

<br>
<div class="col-10">
    <div class="box">
        <div class="box-header with-border">
            <h3 class="box-title"> @if (session()->get('language') == 'english') Add Common @else Sélectionner la ville @endif</h3>
        </div>
        <!--  box.header -->
        <div class="box-body">
            <div class="table_responsive">

                <form method="post" action="{{route('common.store') }}" >
                    @csrf
                    <div class="form-group">
                        <h5>Town Select <span class="text-danger">*</span></h5>
                        <div class="controls">
                            <select name="town_id" id="select" required="" class="form-control">
                                <option value="" selected="" disabled=""> @if (session()->get('language') == 'english')Select the Town @else Sélectionner la ville @endif</option>
                                 @foreach($towns as $town)                
                                <option value="{{$town->id }}">{{$town->name}}</option>
                                @endforeach
                            </select>
                            @error('town_id')
                    <span class="text-danger">{{ $message}} </span>
                    @enderror
                        </div>

                    <div class="form-group">
                        <h5> Common Name <span class="text-danger">*</span></h5>
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
            <input type="submit" class="btn btn-rounded btn-primary mb-5" @if (session()->get('language') == 'english')value="Add New Common" @else value="Ajouter une nouvelle commune"@endif >
        </div>
                </form>

            </div>
        </div>
    </div>
</div>

@endsection