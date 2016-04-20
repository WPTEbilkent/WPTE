@extends('layouts.masterLogin')
@extends('HeadFoot')
@section('content')

    {{--<div class="container">--}}
        {{--<form method="POST" action="/auth/login">--}}
            {{--{{ csrf_field() }}--}}
            {{--<div class="form-group row">--}}
                {{--<label for="inputEmail3" class="col-sm-2 form-control-label">Email Adresiniz</label>--}}
                {{--<div class="col-sm-10">--}}
                    {{--<input type="email" class="form-control" id="inputEmail3" name="email" placeholder="Email" value="{{ old('email') }}">--}}
                {{--</div>--}}
            {{--</div>--}}
            {{--<div class="form-group row">--}}
                {{--<label for="inputPassword3" class="col-sm-2 form-control-label">Şifreniz</label>--}}
                {{--<div class="col-sm-10">--}}
                    {{--<input type="password" class="form-control" id="inputPassword3" name="password" placeholder="Şifre">--}}
                {{--</div>--}}
            {{--</div>--}}
            {{--<div class="form-group row">--}}
                {{--<div class="col-sm-offset-2 col-sm-10">--}}
                    {{--<button type="submit" class="btn btn-success" >GİRİŞ YAP</button>--}}
                    {{--<a href="/auth/register" class="button"><button type="button" class="btn btn-success" >KAYIT OL</button></a>--}}
                {{--</div>--}}
            {{--</div>--}}
        {{--</form>--}}
    {{--</div>--}}

    <body class="theme-night ui-x-dark">
            <!-- main -->
    <main role="main" class="container">

        <div class="fixed padding-20-v">
            <div class="row">
                <div class="col-6 push-3 break-3 padding-30-v sm-responsive">

                    <div class="portlet margin-30-v rounded bordered light-bordered">
                        <div class="content-side padding-15-h padding-5-v theme-gray ui-light">
                            <h4 class="align-left xs-align-center theme-night ui-text margin-5-v">Giriş Yapınız</h4>
                        </div>
                        <div class="content-side padding-15">

                            <form method="POST" action="/auth/login">
                                {{ csrf_field() }}
                                <!-- hata mesajı --
                                <div class="portlet-error rounded padding-15 theme-red ui-x-light">
                                    <h4 class="font-red">Hatalı Giriş Yaptınız!</h4>
                                    <p>Giriş bilgilerinizi kontrol ederek tekrar deneyiniz.</p>
                                </div>
                                <!-- -->

                                <div class="text margin-10-b text-icon rounded bordered light-bordered ease-form">
                                    <input placeholder="E-posta Adresiniz" type="text" name="email">
                                    <i class="icon xx-dark fa fa-fw fa-envelope ease-opacity"></i>
                                </div>
                                <div class="text margin-10-b text-icon rounded bordered light-bordered ease-form">
                                    <input placeholder="Şifre" type="password" name="password">
                                    <i class="icon xx-dark fa fa-fw fa-lock ease-opacity"></i>
                                </div>
                                <button type="submit" class="btn margin-10-b btn-block rounded theme-youtestify ui-dark ease-bg">GİRİŞ YAP</button>
                                {{--<a href="#" class="btn btn-block rounded ounded theme-night ui-dark ease-bg">Şifremi Unuttum</a>--}}
                                <a href="/auth/register" class="btn btn-block rounded ounded theme-night ui-dark ease-bg">Kayıt Ol</a>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
</body>

@stop