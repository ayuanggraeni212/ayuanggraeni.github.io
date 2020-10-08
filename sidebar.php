
<div id="left">
<div id="hightlight"><i class="fa fa-tasks"></i> Shop By Category</div>
<div class="kiri_kategori">
<?php
 //$idbarang = "SELECT id FROM php_shop_products WHERE id=".$_GET['id']"";
echo"<form method='post' action='list_barang.php'>";
$rcat= @mysqli_query("SELECT * FROM categories");

    
while ($rowcat = @mysqli_fetch_array($rcat)) {

      echo"<div id='kategori'>";
         echo"<ul id=''>";
           echo "<li><i class='fa fa-check-square'></i>
           <a href=\"list_barang.php?category=".$rowcat['nama']."\">".$rowcat['nama']. " </a>";
           ?>

           <?php
           $idkat = "SELECT id categories";

           $jumlahkategori = mysql_num_rows(mysql_query("SELECT * FROM produk WHERE id = $idkat"));
           ?> <?php echo"".$jumlahkategori.""?> </li>

<?php

         echo"</ul>";
       echo"</div>";
}
echo"</form>";
echo"</div>";
echo"<br>";
?>


<div id="hightlight2"><i class="fa fa-user-plus"></i><a href="testimoni.php"> #Testimoni</a></div>
<div id="hightlight2"><i class="fa fa-user-plus"></i><a href="isi testimoni.php"> #Isi Testimoni</a></div>
<div id="hightlight2"><i class="fa fa-user-plus"></i><a href="review produk.php"> #Review Produk</a></div>
<div id="hightlight2"><i class="fa fa-user-plus"></i><a href="contact.php"> #Info Pemesanan</a></div>
<div id="hightlight2"><i class="fa fa-user-plus"></i><a href="help.php"> #Bantuan</a></div>
<div id="hightlight2"><i class="fa fa-user-plus"></i><a href="promo.php"> #Promo Menarik</a></div>
<div class="kiri">


</div><br>





</div>