<!doctype html>
<html lang="tr">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="<?php echo base_url("assets/css/bootstrap.min.css")?>">
    <title>Personel Düzenle</title>
</head>
<body>
<div class="container">
<h3 class="text-center">Personel DÜzenle</h3>
    <hr>
    <div class="row">
        <div class="col-md-6">
            <form action="<?php echo base_url("personel/update/$personel->id");?>" method="post"> <!--personel insert fonksiyonuna göndermek için form action kısmına yazdık-->
                <div class="formgroup">
                    <label for="">Personelin Adı</label>
                    <input type="text" class="form-control" name="personel_ad" value="<?php echo $personel->personel_ad; ?>"> <!-- name kısmına personel_ad yazdık -->
                </div>

                <div class="formgroup">
                    <label for="">E-Mail</label>
                    <input type="text" class="form-control" name="email" value="<?php echo $personel->email; ?>">
                </div>

                <div class="formgroup">
                    <label for="">Telefon</label>
                    <input type="text" class="form-control" name="telefon" value="<?php echo $personel->telefon; ?>">
                </div>

                <div class="formgroup">
                    <label for="">Departman</label>
                    <input type="text" class="form-control" name="departman" value="<?php echo $personel->departman; ?>">
                </div>

                <div class="formgroup">
                    <label for="">Adres</label>
                    <input type="text" class="form-control" name="adres" value="<?php echo $personel->adres; ?>">
                </div>

                <div class="form-group">
                    <label for="">Personelin Resmi</label>
                    <input type="file" name="img_id" id="">
                </div>

                <button type="submit" class="btn btn-success">Kaydet</button>
                <a class="btn btn-danger" href="<?php echo base_url(); ?>">İptal</a>

            </form>
        </div>
    </div>
</div>

</body>
</html>
