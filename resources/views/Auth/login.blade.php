@extends('layouts.masterLogin')
@extends('HeadFoot')
@section('content')

    <div class="container">
        <form method="POST" action="/auth/login">
            {{ csrf_field() }}
            <div class="form-group row">
                <label for="inputEmail3" class="col-sm-2 form-control-label">Email Adresiniz</label>
                <div class="col-sm-10">
                    <input type="email" class="form-control" id="inputEmail3" name="email" placeholder="Email" value="{{ old('email') }}">
                </div>
            </div>
            <div class="form-group row">
                <label for="inputPassword3" class="col-sm-2 form-control-label">Şifreniz</label>
                <div class="col-sm-10">
                    <input type="password" class="form-control" id="inputPassword3" name="password" placeholder="Şifre">
                </div>
            </div>
            <div class="form-group row">
                <div class="col-sm-offset-2 col-sm-10">
                    <button type="submit" class="btn btn-success" >GİRİŞ YAP</button>
                    <a href="/auth/register" class="button"><button type="button" class="btn btn-success" >KAYIT OL</button></a>
                </div>
            </div>
        </form>
    </div>
@stop