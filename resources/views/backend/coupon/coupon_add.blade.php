@extends('admin.admin_master')
@section('admin')
@section('title')
@if (session()->get('language') == 'french')Ajouter un Coupon @else  Add  Coupon @endif 
@endsection

<br>
<div class="col-10">
    <div class="box">
        <div class="box-header with-border">
            <h3 class="box-title">@if (session()->get('language') == 'french')Ajouter un Coupon @else  Add  Coupon @endif </h3>
        </div>
        <!--  box.header -->
        <div class="box-body">
            <div class="table_responsive">

                <form method="post" action="{{route('coupon.store') }}">
                    @csrf
           
        <div class="form-group">
            <h5>@if (session()->get('language') == 'french')Nom en Anglais  @else Name in English @endif  <span class="text-danger">*</span></h5>
            <div class="controls">
                <input type="text" name="name_en" class="form-control">
                    @error('name_en')
                    <span class="text-danger">{{ $message}} </span>
                    @enderror
            </div>
        </div>

        <div class="form-group">
            <h5>@if (session()->get('language') == 'french')Nom en Francais  @else Name in French  @endif  <span class="text-danger">*</span></h5>
            <div class="controls">
                <input type="text" name="name_fr" class="form-control">
                    @error('name_fr')
                    <span class="text-danger">{{ $message}} </span>
                    @enderror
            </div>
        </div>
       
        <div class="form-group">
            <h5>@if (session()->get('language') == 'french')Réduction @else Discount @endif<span class="text-danger">*</span></h5>
            <div class="controls">
                <input type="text" name="coupon_discount" class="form-control">
                    @error('coupon_discount')
                    <span class="text-danger">{{ $message}} </span>
                    @enderror
            </div>
        </div>
            <div class="form-group">
            <h5>@if (session()->get('language') == 'french')Validité @else  Validity @endif <span class="text-danger">*</span></h5>
            <div class="controls">
                <input type="date" name="validity" class="form-control">
                    @error('validity')
                    <span class="text-danger">{{ $message}} </span>
                    @enderror
            </div>
        </div>
        <div class="form-group">
            <h5>Status <span class="text-danger">*</span></h5>
            <div class="controls">
                <input type="text" name="status" class="form-control">
                    @error('status')
                    <span class="text-danger">{{ $message}} </span>
                    @enderror
            </div>
        </div>

        <div class="text-xs-right">
            <input type="submit" class="btn btn-rounded btn-primary mb-5" @if (session()->get('language') == 'french')value="Ajouter nouveau Coupon" @else value="Add New Coupon" @endif>
        </div>
                </form>

            </div>
        </div>
    </div>
</div>

@endsection