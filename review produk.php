<?php
error_reporting(E_ALL ^ (E_NOTICE | E_WARNING));
// *** LOAD PAGE HEADER
include "header.php";
include"sidebar.php";

// *** MENGHAPUS SESSION SEARCH / RESETING
if ($_POST['clear']=="y"){ unset($_SESSION['scari']); unset($_SESSION['scategory']);
unset($_POST['cari']); unset($_POST['kategori']);}
if ($_GET['clear']=="y"){ unset($_SESSION['scari']); unset($_SESSION['scategory']);
}

// ***  DEKLARASI VARIABLE
if (!empty($_GET['page'])) $_SESSION['page']=$_GET['page'];
if (!empty($_SESSION['page'])) $_GET['page']=$_SESSION['page'];
if (!empty($_POST['kategori'])) $_SESSION['scategory']=$_POST['kategori'];
if (!empty($_POST['cari'])) $_SESSION['scari']=$_POST['cari'];


// *** DEFAULT VARIABLE SETTING
$line_cost=0; // *** CART - SUBTOTAL COST
$total_cost=0; // *** CART - TOTAL COST
$line_quantity=0; // *** CART - SUBTOTAL QUANTITY
$total_quantity=0; // *** CART - TOTAL QUANTITY

// *** QUERY SEARCH
$qry_0 = "SELECT id_produk FROM produk ";
$qry_t="WHERE  category LIKE '%".$_SESSION['scategory']."%' AND ";
$qry_t.="( nama_produk LIKE '%".$_SESSION['scari']."%' ";
$qry_t.="OR category LIKE '%".$_SESSION['scari']."%' ";
$qry_t.="OR deskripsi LIKE '%".$_SESSION['scari']."%') ";


 $total_rec=@mysqli_num_rows(mysqli_query($qry_0.$qry_t)); // *** TOTAL RECORD PRODUCT

$rowperpage=1; // *** DISPLAY NUM RECORD PER PAGE


// QUERY TABLE php_shop_products n record
//$sql = "SELECT id, name, description, price FROM php_shop_products limit 0,9";
$sql = "SELECT * FROM produk ".$qry_t." ORDER BY id_produk DESC LIMIT $recno,$rowperpage;";

//echo $sql;
$result = mysqli_query($sql);
$ada = @mysqli_num_rows($result);

?>

<style>
#bgslider{
    margin-left:1px;
    height:auto;
    width:980px;
    float:right;
    
}

</style>
<div id="bgslider">
     
<h2>Cireng Banyur</h2>
<img src="data1/images/1.jpeg"><br>
<br><p>
    Dengan rasa cireng yang krispy dan lembut saat digigit, cocok untuk anda yang senang ngemil dan
    menyantap olahan gorengan khas jawa barat.
</p> <br>

<h2>Cireng Rujak</h2>

<img src="data1/images/2.jpeg"><br>
<br><p>
    Untuk anda yang ingin inovasi dari olahan gorengan cireng, variant cireng rujak sangat cocok dimakan karena memiliki rasa yang khas dan akan membuat anda ketagihan.
</p> <br>

<h2>Tahu Walik Krispy</h2>

<img src="data1/images/3.jpeg"><br>
<br><p>
    Olahan dari tahu yang digoreng dengan isian daging dan mie kremes akan sangat menggoda dilidah anda, rasa krispy dari mie dan renyah gurih dari telur sangat pas untuk anda nikmati.
</p> <br>

<h2>Tempe Mercon Krispy</h2>

<img src="data1/images/4.jpeg"><br>
<br><p>
    Bagi anda yang doyan ngemil gorengan dengan sensasi pedas, anda wajib mencoba varian ini, karena selain rasanya yang krispy dan rasa khas tempe, sensasi mercon yang pedas akan membuat anda ketagihan.
</p> <br>


</div>

<?php
// *** MENGHAPUS SESSION SEARCH / RESETING
if ($_POST['clear']=="y"){ unset($_SESSION['scari']); unset($_SESSION['scategory']);
unset($_POST['cari']); unset($_POST['category']);}
if ($_GET['clear']=="y"){ unset($_SESSION['scari']); unset($_SESSION['scategory']);
}

// ***  DEKLARASI VARIABLE
if (!empty($_GET['page'])) $_SESSION['page']=$_GET['page'];
if (!empty($_SESSION['page'])) $_GET['page']=$_SESSION['page'];
if (!empty($_POST['category'])) $_SESSION['scategory']=$_POST['category'];
if (!empty($_GET['category'])) $_SESSION['scategory']=$_GET['category'];
if (!empty($_POST['cari'])) $_SESSION['scari']=$_POST['cari'];



// *** DEFAULT VARIABLE SETTING
$line_cost=0; // *** CART - SUBTOTAL COST
$total_cost=0; // *** CART - TOTAL COST
$line_quantity=0; // *** CART - SUBTOTAL QUANTITY
$total_quantity=0; // *** CART - TOTAL QUANTITY

// *** QUERY SEARCH
$qry_0 = "SELECT id_produk FROM produk ";
$qry_t="WHERE  category LIKE '%".$_SESSION['scategory']."%' AND ";
$qry_t.="( nama_produk LIKE '%".$_SESSION['scari']."%' ";
$qry_t.="OR category LIKE '%".$_SESSION['scari']."%' ";
$qry_t.="OR deskripsi LIKE '%".$_SESSION['scari']."%') ";
 

//echo "[ $qry_0.$qry_t ]";
$total_rec=@mysqli_num_rows(mysqli_query($qry_0.$qry_t)); // *** TOTAL RECORD PRODUCT

$rowperpage=12; // *** DISPLAY NUM RECORD PER PAGE

// ** predefine record number
if (!empty($_GET['page'])) $recno=($_GET['page']-1)*$rowperpage; else $recno=0;

// QUERY TABLE php_shop_products n record per page
$sql = "SELECT * FROM produk ".$qry_t." ORDER BY id_produk DESC LIMIT $recno,$rowperpage;";

//echo $sql;
$result = mysqli_query($sql);
$ada = @mysqli_num_rows($result);
$no=0;

if ($ada>0){ // ** IF RECORD EXISTS

    // ** PAGING NAVIGATION
    if ($total_rec>$rowperpage){ // *** IF TOTAL RECORD GREATER THAN RECORD PER PAGE => SHOW PAGING
    $paging_html.= '<div id="paging">';
    if (empty($_GET['page'])) $_GET['page']=1; // ** SET DEFAULT PAGE = 1
    // *** PREV RECORD LINK
    if ($_GET['page']>1) $paging_html.= '<a href="'.$_SERVER['PHP_SELF'].'?page='.($_GET['page']-1).'">&laquo;prev</a>';
    // *** PAGING NUMBERS LINK
    for ($i=1; $i<= ceil($total_rec/$rowperpage); $i++){
        $paging_html.= '<a href="'.$_SERVER['PHP_SELF'].'?page='.$i.'"';
        if ($_GET['page']==$i) $paging_html.= ' class="paging_cur" ';
        $paging_html.= '>'.$i.'</a>';
    }
    // *** NEXT RECORD LINK
    if ($_GET['page']<ceil($total_rec/$rowperpage)) $paging_html.= '<a href="'.$_SERVER['PHP_SELF'].'?page='.($_GET['page']+1).'">next&raquo;</a> ';
    $paging_html.= '</div><!-- id="paging" -->';
    } // *** end if ($total_rec>$rowperpage)

?>

   
<div id='bgproduct'>
<div id="hightlight2"> <i class="fa fa-tasks"></i> New Realese <a href="list_barang.php"> [&raquo; Browse All Produducts &laquo;]</a></div> 

<?php
    while ($row = mysql_fetch_array($result))
        {
         echo "<a href=\"detail.php?id_barang=".$row['id_produk']."\" class=\"tbeli\">";
		 
        echo'<div class="barang">';		  
        echo'<table>';
		
		 echo'<tr><td class="nama_barang" align="center">';
         echo"".$row['nama_produk']."";
         echo'</td></tr>';
		
        echo'<tr><td>';
        echo"".$gambar."<a href=\"items/".$row['id_produk'].".jpg\" target='_blank'>
        <img src=\"items/".$row['id_produk'].".jpg\" width=190 height=204  align=center border=0 ></a>";
        echo'</td></tr>';
          
		 
		
          

          echo'</table>';
		  echo"</a>";
        echo'</div>';
}


//echo"<div id='bgpaging'>".$paging_html."</div>";
echo '</div>';

} else {
     echo"<br>";


}
// *** LOAD PAGE FOOTER

include "footer.php";
?>