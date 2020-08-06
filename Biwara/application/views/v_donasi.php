<!DOCTYPE html>
<html>
  <head>
  <link href="<?php echo base_url(); ?>assets/images/icon.ico" rel="shortcut icon">
	<title>Donasi</title>
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700" rel="stylesheet">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU" crossorigin="anonymous">
	<link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/donasi.css" media="screen">
	<link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/normalize.css" media="screen">
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/grid.css" media="screen">
  
  <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
  </head>
  <body>

  <div class="menu">
		<div class="container clearfix">

			<div id="logo" class="grid_3">
				<img src="<?php echo base_url(); ?>assets/images/biwara.png">
			</div>
 
		</div>
	</div>
<br><br><br><br><br>
    <div class="testbox">
    <form action="<?=base_url('index.php/donasi/simpan_donasi')?>" method="post">
      <div class="banner">
    <h1>Donasi</h1>
      </div>
      <br>
      <fieldset>
      <legend><b>Detail</b></legend>
      <div class="colums">
      </div>
      <div class="item">
      <label for="amount"><b>Nominal Donasi<span>*</span></b></label>
      <input type="text" name="nominal" class="form-control" required placeholder="Penulisan Salah(Rp 1.000,-) - Penulisan Benar(1000)">
      </div>
      <div class="item">
      <label for="donation"><b>Pembayaran Via<span>*</span></b></label> <br>
      <select name="alat_pembayaran" class="form-control" style="width:100%">
        <option value="" disabled selected>Pilih Pembayaran</option>
        <option value="BCA">BCA - 1241412513</option>
        <option value="BNI">BNI - 1241411242513</option>
        <option value="BRI">BRI - 2441411236636</option>
        <option value="Mandiri">Mandiri - 1241411242513</option>
      </select>
      </div>
      <div>
      <label for="donation"><b>Bencana<span>*</span></b></label> <br>
        <select name="id_laporan"class="form-control" style="width:100%">
        <option value="" disabled selected>Pilih Bencana</option>
        <option value="1">Banjir bandang di Malang</option>
        <option value="2">Tsunami setinggi 3 meter di Aceh</option>
        <option value="3">Kebakaran hutan di Riau</option>
        <option value="9">Gunung Agung Meletus di Bali</option>
        <option value="10">Gempa tektonik di Solo</option>
        <option value="12">Kekeringan akibat musim kemarau di NTB</option>
        <option value="15">Tanah Longsor di Tulungagung</option>
        <option value="14">Badai di Malang</option>
        <option value="16">Puting beliung di Blitar</option>
        
        </select>
      </div>
      </fieldset>
      <div class="btn-block">
      <button type="order" href="/" onclick="return confirm('apakah anda yakin untuk donasi?')" class="btn btn-danger"><b>Donasikan</b></button>
      </div>
    </form>
    </div>
  </body>
</html>