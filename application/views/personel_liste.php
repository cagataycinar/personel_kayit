<!doctype html>
<html lang="tr">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="<?php echo base_url("assets/css/bootstrap.min.css")?>">
    <title>Personel Liste</title>
</head>
<body>
<!--?php print_r($list); // list değişkenini kontrol etmek için ekranı yazdırdık ?> -->
<h3 class="text-center">Personel Listesi</h3>
<hr>
   <div class="container">
       <table class="table table-striped table-bordered table-hover col-md-6">
           <thead>
           <th>#id</th>
           <th>Personel Adı <a href="#">[A-z]</a> <a href="#">[Z-a]</a></th>
           <th>E-mail <a href="#">[A-z]</a> <a href="#">[Z-a]</a></th>
           <th>Telefon <a href="#">[0-9]</a> <a href="#">[9-0]</a></th>
           <th>Departman <a href="#">[A-z]</a> <a href="#">[Z-a]</a></th>
           <th>Adres <a href="#">[A-z]</a> <a href="#">[Z-a]</a></th>
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
                   <a class="btn-xs btn-warning" href="#">Düzenle</a>
                   <a class="btn-xs btn-danger" href="#">Sil</a>
               </td>
           </tr>
           <?php } ?>
           </tbody>
       </table>
   </div>
</body>
</html>