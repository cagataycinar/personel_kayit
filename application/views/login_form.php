<!doctype html>
<html lang="tr">
<head>
    <meta charset="UTF-8">
    <title>Kullanıcı Girişi</title>
    <link rel="stylesheet" href="<?php echo base_url("assets/css/bootstrap.min.css") ?>">
</head>
<body>
<div class="container">
    <div class="row">
        <div class="col-md-6">
            <h3 class="text-center">Giriş Yap</h3>
            <hr>
            <form action="<?php base_url("kullanici/login"); ?>" method="post">
                <div class="form-group">
                    <label for="">E-Posta Adresiniz</label>
                    <input type="text" class="form-control" name="email" id="email">
                    <br>
                    <div class="form-group">
                        <label for="">Şifreniz</label>
                        <input type="password" class="form-control" name="email" id="pas">
                    </div>
                    <br>
                    <div class="row">
                        <div class="col-md-4">
                            <label for="">Doğrulama Kodu</label>
                            <input type="text" class="form-control" name="captcha">
                        </div>
                        <br>
                        <div class="col-md-3">
                            <?php echo $captcha; ?>
                        </div>
                    </div>
                    <br>
                    <button type="submit" class="btn btn-success">Giriş Yap</button>
                </div>
            </form>
        </div>
    </div>
</div>
</body>
</html>