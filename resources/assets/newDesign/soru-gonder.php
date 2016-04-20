<?php header('Content-Type: text/html; charset=utf-8'); ?>

<!DOCTYPE html>
<html dir="ltr" lang="tr">

<head>

    <title>YouTestify - A unique web platform for test engineers</title>
    <?php include ('meta-tags.php'); ?>

</head>

<body>

    <!-- header -->
    <?php include ('header.php'); ?>

    <!-- main -->
    <main role="main" class="container">

        <div class="row row-no-padding-hor theme-gray ui-light">
            <div class="col-12">
                <div class="fixed">
                    <div class="row row-no-padding-ver">
                        <div class="col-12 xs-responsive">
                            <h4 class="align-left xs-align-center theme-night ui-text margin-5-v">Soru Gönder</h4>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="fixed padding-20-v">
            <div class="row">
                <div class="col-12">

                    <!-- hata mesajı -->
                    <div class="portlet-error rounded padding-15 theme-red ui-x-light">
                        <h4 class="font-red">Gönderilemedi!</h4>
                        <ul>
                            <li>Sorunuz için bir başlık yazınız.</li>
                            <li>Soru alanını boş bırakmayınız.</li>
                        </ul>
                    </div>
                    <!-- -->

                    <!-- şifre gönderildi mesajı -->
                    <div class="portlet-success rounded padding-15 theme-green ui-x-light">
                        <h4 class="font-green">Gönderildi!</h4>
                        <p>Sorunuz başarılı bir şekilde gönderildi. İncelemek için <a class="underline-default ease-link" href="#">tıklayınız.</a></p>
                    </div>
                    <!-- -->

                    <div class="margin-10-b">
                        <span class="dark x-large">Gönderen:</span> <span class="x-large link-default ease-link">Yaşar Ozan Türkcan</span>
                    </div>
                    <div class="text margin-15-b rounded bordered light-bordered dual-bordered ease-form">
                        <input type="text" placeholder="Başlık Yazınız *">
                    </div>
                    <div class="x-large margin-15-b">Sorunuzu Yazın:</div>
                    <div class="textarea margin-15-b rounded bordered light-bordered dual-bordered ease-form">
                        <textarea cols="30" rows="8"></textarea>
                    </div>
                    <div class="text margin-5-b rounded bordered light-bordered dual-bordered ease-form">
                        <input type="text" placeholder="Etiketler (Zorunlu Değildir)">
                    </div>
                    <p class="hint dark margin-15-b">Aralarına virgül koyarak ilgili etiketleri yazınız.</p>
                    <div class="md-align-center">
                        <button class="btn btn-responsive rounded theme-youtestify ui-dark ease-bg" type="button">SORU GÖNDER</button>
                    </div>

                </div>
            </div>
        </div>
    </main>

    <!-- footer -->
    <?php include ('footer.php'); ?>

</body>
</html>
