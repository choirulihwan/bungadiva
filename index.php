<?php

require_once "include/fungsi_mysql.php";
require_once "include/global_function.php";
require_once "classes/mysql/Bunga.class.php";

$page = 2;
$start = 0;
$status = "1";
$kategori = "";

if(!empty($_POST['btn_cari'])){
	//print_r($_POST);
	$status = $_POST['status'];
	$kategori = $_POST['kategori'];
	if($status == '0'){
		$soldout_selected = 'selected';
	}else{
		$soldout_selected = '';
	} 
	
	if ($status == '1'){
		$ready_selected = 'selected';
	}else{
		$ready_selected = '';
	} 
	
}


$obj = new Bunga();
$bunga = $obj->GetAllBunga($status, $kategori, $start, $limit);
$arr_jml_bunga = $obj->GetCountBunga($status, $kategori);
$jml_bunga = $arr_jml_bunga[0]['jml'];

$arrKategori = $obj->GetComboKategori();	
$KatSelected = (trim($kategori) == "") ? "" : $kategori;
$cmbKat = render_combo($arrKategori, 'kategori', $KatSelected, "", "", 'comboKategori', 'form-control');   


?>


<!DOCTYPE html>
<html>
<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Galeri Bunga Diva</title>

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link href="https://fonts.googleapis.com/css?family=Droid+Sans:400,700" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/baguettebox.js/1.8.1/baguetteBox.min.css">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="css/thumbnail-gallery.css">
	<!-- Custom styles for this template -->
    <link rel="stylesheet" href="css/jumbotron.css" >

</head>
<body>

	<nav class="navbar navbar-inverse navbar-fixed-top">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="#">Bunga Diva</a>
        </div>
        <div id="navbar" class="navbar-collapse collapse">
          <form class="navbar-form navbar-right" method="post" action="index.php">
            <div class="form-group">              
			  <label for="comboStatus" style="color:#fff;font-weight:1;">Status&nbsp;</label>
				<select name="status" class="form-control" id="comboStatus">
					<option <?=$ready_selected?> value="1">Ready</option>
					<option <?=$soldout_selected?> value="0">Sold Out</option>			  
				</select>
            </div>
			&nbsp;&nbsp;&nbsp;
            <div class="form-group">
				<label for="comboKategori" style="color:#fff;font-weight:1;">Kategori&nbsp;</label>
				<?=$cmbKat?>
            </div>
            <input type="submit" name="btn_cari" value="Cari" class="btn btn-primary">
          </form>
        </div><!--/.navbar-collapse -->
      </div>
    </nav>

	<!--<div class="jumbotron">
      <div class="container" style="text-align:center;">
        <h1>Bunga Diva</h1>
        <p>Gambar disini adalah semua stock. Silahkan pilih status untuk melihat stock yang ready</p>
        <p><a class="btn btn-primary btn-lg" href="#" role="button">Learn more &raquo;</a></p>
      </div>
    </div>-->

<div class="container gallery-container">    
    
    
    <div class="tz-gallery">

        <div class="row scroll">
		
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
            </div>-->
			
			
            <a href="index2.php?page=<?=$page?>&jml=<?=$jml_bunga?>&status=<?=$status?>&kategori=<?=$kategori?>">next</a>
				
        </div>

    </div>
	
	

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
<script src="//unpkg.com/jscroll/dist/jquery.jscroll.min.js"></script>
<script>
$('.scroll').jscroll();

</script>
</body>
</html>