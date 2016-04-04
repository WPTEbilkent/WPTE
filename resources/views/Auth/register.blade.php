@extends('layouts.masterLogin')
@extends('HeadFoot')
@section('content')

    <div class="container">
        <form method="POST" action="/auth/register">
            {{ csrf_field() }}
            <div class="form-group row">
                <label for="name" class="col-sm-2 form-control-label">İsim</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="inputEmail3" name="name" placeholder="İsim" value="{{ old('name') }}">
                </div>
            </div>

            <div class="form-group row">
                <label for="inputEmail3" class="col-sm-2 form-control-label">Email</label>
                <div class="col-sm-10">
                    <input type="email" class="form-control" id="inputEmail3" name="email" placeholder="Email" value="{{ old('email') }}">
                </div>
            </div>

            <div class="form-group row">
                <label for="address" class="col-sm-2 form-control-label">Adres</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="inputEmail3" name="address" placeholder="Adres" value="{{ old('address') }}">
                </div>
            </div>

            <div class="form-group row">
                <label for="phone" class="col-sm-2 form-control-label">Telefon</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="inputEmail3" name="phone" placeholder="Telefon" value="{{ old('phone') }}">
                </div>
            </div>

            <div class="form-group row">
                <label for="inputPassword3" class="col-sm-2 form-control-label">Şifre</label>
                <div class="col-sm-10">
                    <input type="password" class="form-control" id="inputPassword3" name="password" placeholder="Şifre">
                </div>
            </div>

            <div class="form-group row">
                <label for="inputPassword3" class="col-sm-2 form-control-label">Şifre Tekrarı</label>
                <div class="col-sm-10">
                    <input type="password" class="form-control" id="inputPassword3" name="password_confirmation" placeholder="Şifre Tekrarı">
                </div>
            </div>

            <div class="form-group row">
                <div class="col-sm-offset-2 col-sm-10">
                    <button type="submit" class="btn btn-success" >KAYIT OL</button>
                    <a href="/auth/login" class="button"><button type="button" class="btn btn-success" >GİRİŞ YAP</button></a>
                </div>
            </div>

        </form>
    </div>
@stop