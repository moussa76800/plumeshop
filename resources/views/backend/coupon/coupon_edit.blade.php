@extends('admin.admin_master')
@section('admin')
@section('title')
@if (session()->get('language') == 'french')Editer un Coupon @else  Update Coupon @endif 
@endsection

<br>
<div class="col-10">
    <div class="box">
        <div class="box-header with-border">
            <h3 class="box-title">@if (session()->get('language') == 'french')Editer un Coupon @else Update  Coupon @endif </h3>
        </div>
        <!--  box.header -->
        <div class="box-body">
            <div class="table_responsive">

                <form method="post" action="{{ route('coupon.update',$coupon->id) }}">
                    @csrf
                <input type="hidden" name="id" value="{{ $coupon->id }}">
           
        <div class="form-group">
            <h5>@if (session()->get('language') == 'french')Nom en Anglais  @else Name @endif  <span class="text-danger">*</span></h5>
            <div class="controls">
                <input type="text" name="name_en" class="form-control" value="{{$coupon->name}}">
                    @error('name_en')
                    <span class="text-danger">{{ $message}} </span>
                    @enderror
            </div>
        </div>
       
        <div class="form-group">
            <h5>@if (session()->get('language') == 'french')Réduction @else Discount @endif<span class="text-danger">*</span></h5>
            <div class="controls">
                <input type="text" name="coupon_discount" class="form-control"  value="{{$coupon->coupon_discount}}">
                    @error('coupon_discount')
                    <span class="text-danger">{{ $message}} </span>
                    @enderror
            </div>
        </div>
            <div class="form-group">
            <h5>@if (session()->get('language') == 'french')Validité @else  Validity @endif <span class="text-danger">*</span></h5>
            <div class="controls">
                <input type="date" name="validity" class="form-control"  value="{{$coupon->validity}}">
                    @error('validity')
                    <span class="text-danger">{{ $message}} </span>
                    @enderror
            </div>
        </div>
        <div class="form-group">
            <h5>Status <span class="text-danger">*</span></h5>
            <div class="controls">
                <input type="text" name="status" class="form-control"  value="{{$coupon->status}}">
                    @error('status')
                    <span class="text-danger">{{ $message}} </span>
                    @enderror
            </div>
        </div>
<br>
<br>
        <div class="text-xs-right">
            <input type="submit" class="btn btn-rounded btn-primary mb-5" @if (session()->get('language') == 'french')value="Valider" @else value="To Validate" @endif>
        </div>
                </form>

            </div>
        </div>
    </div>
</div>

@endsection