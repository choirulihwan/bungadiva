<?php

require_once "include/fungsi_mysql.php";
require_once "classes/mysql/Bunga.class.php";


$jml_bunga = $_GET['jml'];
$status = $_GET['status'];
$kategori = $_GET['kategori'];
/*if(empty($_GET['page'])){
	$page = 2;
	$start = 0;
} else {*/
	
	$page = $_GET['page'];
	$start = ($page*$limit)-($limit);
	
//}

//print_r($_GET);

$obj = new Bunga();
$bunga = $obj->GetAllBunga($status, $kategori, $start, $limit);
?>

<?php
			
			for($i=0;$i<count($bunga);$i++){
				
		?>
			<div class="col-sm-6 col-md-4">
                <div class="thumbnail">
                    <a class="lightbox" href="images/<?=$bunga[$i]['gambar_produk']?>">
                        <img src="images/<?=$bunga[$i]['gambar_produk']?>" alt="<?=$bunga[$i]['nama_produk']?>">
                    </a>
                    <div class="caption">
                        <h3><?=$bunga[$i]['nama_produk']?></h3>
                        <p style="text-align:left"><?=$bunga[$i]['deskripsi_produk']?></p>
						<p style="margin-top:10px;"><button type='button' class='btn btn-lg btn-success'><i class='fa fa-whatsapp fa-2x'></i></button></p>
                    </div>
                </div>
            </div>
			
		<?php
			}
		?>

        
		<!--
            <div class="col-sm-6 col-md-4">
                <div class="thumbnail">
                    <a class="lightbox" href="images/park.jpg">
                        <img src="images/park.jpg" alt="Park">
                    </a>
                    <div class="caption">
                        <h3>Thumbnail label</h3>
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
                    </div>
                </div>
            </div>
            <div class="col-sm-6 col-md-4">
                <div class="thumbnail">
                    <a class="lightbox" href="images/bridge.jpg">
                        <img src="images/bridge.jpg" alt="Bridge">
                    </a>
                    <div class="caption">
                        <h3>Thumbnail label</h3>
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
                    </div>
                </div>
            </div>
            <div class="col-sm-6 col-md-4">
                <div class="thumbnail">
                    <a class="lightbox" href="images/tunnel.jpg">
                        <img src="images/tunnel.jpg" alt="Tunnel">
                    </a>
                    <div class="caption">
                        <h3>Thumbnail label</h3>
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
                    </div>
                </div>
            </div>
			
			<div class="col-sm-6 col-md-4">
                <div class="thumbnail">
                    <a class="lightbox" href="images/coast.jpg">
                        <img src="images/coast.jpg" alt="Coast">
                    </a>
                    <div class="caption">
                        <h3>Thumbnail label</h3>
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
                    </div>
                </div>
            </div>
            <div class="col-sm-6 col-md-4">
                <div class="thumbnail">
                    <a class="lightbox" href="images/rails.jpg">
                        <img src="images/rails.jpg" alt="Rails">
                    </a>
                    <div class="caption">
                        <h3>Thumbnail label</h3>
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
                    </div>
                </div>
            </div>
            <div class="col-sm-6 col-md-4">
                <div class="thumbnail">
                    <a class="lightbox" href="images/traffic.jpg">
                        <img src="images/traffic.jpg" alt="Traffic">
                    </a>
                    <div class="caption">
                        <h3>Talenan Hias Bunga Rumput</h3>
                        <p style="text-align:left">
Full cat deco + kain goni dipermanis dengan lace kupu-kupu. Ukuran: -/+ 15cm x 30cm</p>
						<p style="margin-top:10px;"><button type='button' class='btn btn-lg btn-success'><i class='fa fa-whatsapp fa-2x'></i></button></p>
                    </div>
                </div>
            </div>
			
		-->	
            
            
        
	
<div class="next">
<?php

if ($jml_bunga <= ($page*$limit)){
	
?>
	<a href="index3.html">next</a>
<?php
} else {
	$page++;
?>
	<a href="index2.php?page=<?=$page?>&jml=<?=$jml_bunga?>">next</a>
<?php
}
?>
	
</div>

<script src="https://cdnjs.cloudflare.com/ajax/libs/baguettebox.js/1.8.1/baguetteBox.min.js"></script>
<script>
    baguetteBox.run('.tz-gallery', {
					captions: true
	});
</script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
<script>

$( ".btn-success" ).click(function() {
	var url = "https://api.whatsapp.com/send?phone=6287838858913&text=Assalamualaikum%20BungaDiva";
	event.preventDefault();
    event.stopPropagation();
    window.open(url, '_blank');	
});
</script>