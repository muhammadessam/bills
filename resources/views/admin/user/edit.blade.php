@extends('layouts.master')
@section('title', 'المدير / العملاء / انشاء جديد')
@section('content')
    <div class="col-xl-8 col-lg-6 col-md-6 col-sm-12 col-12" style="margin:0 auto 24px auto">
        <div class="statbox widget box box-shadow">
            <div class="widget-header">
                <div class="row">
                    <div class="col-xl-12 col-md-12 col-sm-12 col-12">
                        <h4>انشاء فاتورة جديدة</h4>
                    </div>
                </div>
            </div>
            <div class="widget-content widget-content-area">
                <form action="{{route('admin.user.update', $user)}}" method="post">
                    @csrf
                    @method('PATCH')
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="number">اسم المستخدم:</label>
                            <input type="text" class="form-control" id="user.name" name="name" value="{{old('name', $user->name)}}" placeholder="اسم المستخدم">
                            @error('name')
                            <span class="text-danger">{{$message}}</span>
                            @enderror
                        </div>
                        <div class="form-group col-md-6">
                            <label for="number">رقم الهاتف:</label>
                            <input type="text" class="form-control" id="user.phone" name="phone" value="{{old('phone', $user->phone)}}" placeholder="رقم الهاتف">
                            @error('phone')
                            <span class="text-danger">{{$message}}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="number">رقم هاتف الواتس اب:</label>
                            <input type="text" class="form-control" id="user.whatsapp" name="whatsapp" value="{{old('whatsapp', $user->whatsapp)}}" placeholder="الواتس اب">
                            @error('whatsapp')
                            <span class="text-danger">{{$message}}</span>
                            @enderror
                        </div>
                        <div class="form-group col-md-6">
                            <label for="number">البريد:</label>
                            <input type="email" class="form-control" id="user.email" name="email" value="{{old('email', $user->email)}}" placeholder="البريد الالكتروني">
                            @error('email')
                            <span class="text-danger">{{$message}}</span>
                            @enderror
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary float-right">حفظ</button>
                </form>
            </div>
        </div>
    </div>
@endsection
