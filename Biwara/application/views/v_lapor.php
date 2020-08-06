<!DOCTYPE html>
<html>
  <head>
  <link href="<?php echo base_url(); ?>assets/images/icon.ico" rel="shortcut icon">
	<title>Lapor Bencana</title>
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700" rel="stylesheet">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU" crossorigin="anonymous">
	<link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/laporan.css" media="screen">
	<link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/normalize.css" media="screen">
	<link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/grid.css" media="screen">
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
    <form action="<?=base_url('index.php/laporan/simpan_laporan')?>" method="post">
      <div class="banner">
		<h1>Laporan Bencana</h1>
      </div>
      <br/>
      <fieldset>
        <legend><b>Bencana</b></legend>
        <div class="colums">
          <div class="item">
            <label for="fname"><b>Bencana<span>*</span></b></label>
            <input type="text" name="bencana" class="form-control" placeholder="Bencana Yang Terjadi">
          </div>
		  <div class="item">
            <label for="city"><b>Lokasi</b></label>
            <input type="text" name="lokasi" class="form-control" placeholder="Lokasi Kejadian">
          </div>
          <div class="item">
            <label for="address"><b>Deskripsi<span>*</span></b></label>
            <input type="text" name="deskripsi" class="form-control" placeholder="Deskripsi Kejadian">
          </div>
          <div class="item">
            <label for="phone"><b>Gambar</b></label>
            <input type="file" name="gambar" class="form-control">
          </div>
          <div class="item">
            <label for="phone"><b>Tanggal</b></label>
            <input type="date" name="tanggal" class="form-control">
          </div>
      </fieldset>
      <br/><br>
      <div class="btn-block">
      <button type="order" href="/" onclick="return confirm('apakah anda yakin untuk melapor?')" class="btn btn-danger"><b>Laporkan</b></button>
      </div>
    </form>
    </div>
  </body>
</html>
