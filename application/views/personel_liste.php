<!doctype html>
<html lang="tr">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="<?php echo base_url("assets/css/bootstrap.min.css")?>">
    <title>Personel Liste</title>
</head>
<body>
<!--?php print_r($list); // list değişkenini kontrol etmek için ekranı yazdırdık ?> -->
<div class="container">
<h3 class="text-center">Personel Listesi</h3>
<hr>
<a href="<?php echo base_url("personel/insert_form");?>" class="btn btn-primary btn-sm">Yeni Ekle</a>
<br><br>

       <table class="table table-striped table-bordered table-hover col-md-6">
           <thead>
           <th>#id</th>
           <th>Personel Adı <a href="<?php echo base_url("personel/order/personel_ad/ASC");?>">[A-z]</a> <a href="<?php echo base_url("personel/order/personel_ad/DESC");?>">[Z-a]</a></th>
           <th>E-mail <a href="<?php echo base_url("personel/order/email/ASC");?>">[A-z]</a> <a href="<?php echo base_url("personel/order/email/DESC");?>">[Z-a]</a></th>
           <th>Telefon <a href="<?php echo base_url("personel/order/telefon/ASC");?>">[0-9]</a> <a href="<?php echo base_url("personel/order/telefon/DESC");?>">[9-0]</a></th>
           <th>Departman <a href="<?php echo base_url("personel/order/departman/ASC");?>">[A-z]</a> <a href="<?php echo base_url("personel/order/departman/DESC");?>">[Z-a]</a></th>
           <th>Adres <a href="<?php echo base_url("personel/order/adres/ASC");?>">[A-z]</a> <a href="<?php echo base_url("personel/order/adres/DESC");?>">[Z-a]</a></th>
           <th>İşlemler</th>
           </thead>
           <tbody>
           <?php foreach ($list as $row) {  ?>
           <tr>
               <td><?php echo $row->id; ?></td>
               <td><?php echo $row->personel_ad; ?></td>
               <td><?php echo $row->email; ?></td>
               <td><?php echo $row->telefon; ?></td>
               <td><?php echo $row->departman; ?></td>
               <td><?php echo $row->adres; ?></td>
               <td>
                   <a class="btn-xs btn-warning" href="<?php echo base_url("personel/update_form/$row->id")?>">Düzenle</a>
                   <a class="btn-xs btn-danger" href="<?php echo base_url("personel/delete/$row->id")?>">Sil</a>
               </td>
           </tr>
           <?php } ?>
           </tbody>
       </table>
   </div>
</body>
</html>