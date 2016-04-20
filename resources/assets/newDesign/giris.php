<?php header('Content-Type: text/html; charset=utf-8'); ?>

<!DOCTYPE html>
<html dir="ltr" lang="tr">

<head>

    <title>YouTestify - A unique web platform for test engineers</title>
    <?php include ('meta-tags.php'); ?>

</head>

<body class="theme-night ui-x-dark"> <!-- LOGİN İÇİN ÖZEL OLARAK: body'e bu classı ekleyebilirseniz koyu arkaplanlı giriş sayfası daha güzel duruyor -->

    <!-- header -->
    <?php include ('header.php'); ?>

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

                            <form action="#">

                                <!-- hata mesajı --
                                <div class="portlet-error rounded padding-15 theme-red ui-x-light">
                                    <h4 class="font-red">Hatalı Giriş Yaptınız!</h4>
                                    <p>Giriş bilgilerinizi kontrol ederek tekrar deneyiniz.</p>
                                </div>
                                <!-- -->

                                <div class="text margin-10-b text-icon rounded bordered light-bordered ease-form">
                                    <input placeholder="E-posta Adresiniz" type="text">
                                    <i class="icon xx-dark fa fa-fw fa-envelope ease-opacity"></i>
                                </div>
                                <div class="text margin-10-b text-icon rounded bordered light-bordered ease-form">
                                    <input placeholder="Şifre" type="password">
                                    <i class="icon xx-dark fa fa-fw fa-lock ease-opacity"></i>
                                </div>
                                <button type="submit" class="btn margin-10-b btn-block rounded theme-youtestify ui-dark ease-bg">GİRİŞ YAP</button>
                                <a href="#" class="btn btn-block rounded ounded theme-night ui-dark ease-bg">Şifremi Unuttum</a>
                            </form>

                        </div>
                    </div>

                </div>
            </div>
        </div>
    </main>

</body>
</html>
