<?php
error_reporting(E_ALL ^ (E_NOTICE | E_WARNING));
// *** LOAD PAGE HEADER
include "header.php";
include"sidebar.php";


$query = "UPDATE news SET views = views + 1  WHERE id='35'";
mysqli_query($query);

$idArtikel = '35';

// proses menampilkan detail artikel berdasarkan id artikel
$query = "SELECT * FROM news WHERE id = '35'";
$hasil = mysqli_query($query);
$row  = mysqli_fetch_array($hasil);


echo"<div id='bgartikel2'>";      
?>
<div>
	
<li><i class="fa fa-phone-square"></i> Phone : 085778119750</li>
	<li><i class="fa fa-whatsapp"></i> Whatsapp : 085778119750</li>
       <li><i class="fa fa-envelope-o"></i> Email : SundaneseFood@gmail.com</li>
       <li><i class="fa fa-facebook"></i> Email : Sundanese Food Series</li>
       <li><i class="fa fa-instagram"></i> Email : @SundaneseFoodSeries</li>
       <li><i class="fa fa-building-o"></i> Office : Jl. Raya Griya Bukit Jaya</li>
</div>


<?php


echo"</div>";
 echo"<div class='cleared'></div>";

include"footer.php";
?>