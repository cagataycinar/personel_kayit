<!doctype html>
<html lang="tr">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="<?php echo base_url("assets/css/bootstrap.min.css")?>">
    <title>Personel Ekle</title>
</head>
<body>
<div class="container">
<h3 class="text-center">Personel Ekle</h3>
    <hr>
    <div class="row">
        <div class="col-md-6">
            <form action="<?php echo base_url("personel/insert");?>" method="post"> <!--personel insert fonksiyonuna göndermek için form action kısmına yazdık-->
                <div class="formgroup">
                    <label for="">Personelin Adı</label>
                    <input type="text" class="form-control" name="personel_ad"> <!-- name kısmına personel_ad yazdık -->
                </div>

                <div class="formgroup">
                    <label for="">E-Mail</label>
                    <input type="text" class="form-control" name="email">
                </div>

                <div class="formgroup">
                    <label for="">Telefon</label>
                    <input type="text" class="form-control" name="telefon">
                </div>

                <div class="formgroup">
                    <label for="">Departman</label>
                    <input type="text" class="form-control" name="departman">
                </div>

                <div class="formgroup">
                    <label for="">Adres</label>
                    <input type="text" class="form-control" name="adres">
                </div>

                <button type="submit" class="btn btn-success">Kaydet</button>
                <a class="btn btn-danger" href="<?php echo base_url(); ?>">İptal</a>

            </form>
        </div>
    </div>
</div>

</body>
</html>
