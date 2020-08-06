<!DOCTYPE html>
<html>

<head>
	<link href="<?php echo base_url(); ?>assets/images/icon.ico" rel="shortcut icon">
	<title>Donasi</title>
	<link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700" rel="stylesheet">
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css"
		integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU" crossorigin="anonymous">
	<link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/donasi.css" media="screen">
	<link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/normalize.css" media="screen">
	<link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/grid.css" media="screen">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <script
  src="https://code.jquery.com/jquery-3.4.1.js"
  integrity="sha256-WpOohJOqMqqyKL9FccASB9O0KwACQJpFTUBLTYOVvVU="
  crossorigin="anonymous"></script><script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

	<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
</head>

<body>

<div class="menu">
		<div class="container clearfix">

			<div id="logo" class="grid_3">
				<img src="<?php echo base_url(); ?>assets/images/biwara.png">
			</div>

			<div id="nav" class="grid_9 omega">
				<ul class="navigation">
				<a href="<?=base_url()."index.php/login/logout"?>">Logout</a>
				</ul>

				
				<a href="<?=base_url()."index.php/dashboard"?>">Beranda</a>

			</div>

		</div>
	</div>
    </body>

	<br><br><br><br><br>
	<div class="testbox" style="background-color:#EAEAEA">
    
		<table class="table table-hover" id="LaporanTabel" style="width:100%;">
			<thead>
				<tr>
					<th>No</th>
					<th>ID Donasi</th>
					<th>Tanggal</th>
					<th>Bencana</th>
					<th>Nominal</th>
					<th>Pembayaran</th>
					<th>Status</th>
				</tr>
			</thead>
			<tbody>
				<?php $no=1; ?>
				<?php 
                foreach ($activities as $isi) : ?>
				<tr>
					<td>
						<?= $no++ ?>
					</td>
					<td>
						<?php echo $isi->id_donasi?>
					</td>
					<td>
						<?php echo $isi->tanggal?>
					</td>
					<td>
						<?php echo $isi->deskripsi; echo " di "; echo $isi->lokasi?>
					</td>
					<td>
						Rp. <?php echo $isi->nominal?>
					</td>
					<td>
						<?php echo $isi->alat_pembayaran?>
					</td>

					<td>
                    <?php if($isi->status=="Menunggu Pembayaran"){?>
                    <a href="#modal_bukti" onclick="tm_detail('<?php echo ($isi->id_donasi)?>')" data-toggle="modal" class="btn btn-warning"><?php echo $isi->status?></a>
					<?php } elseif($isi->status="Donasi Sukses"){?>
                    <a href=""class="btn btn-success"><?php echo $isi->status?></a>
                    <?php } ?>
                    </td>

				</tr>


				<?php endforeach; ?>
			</tbody>
		</table>
	</div>

<div id="modal_bukti" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title">Upload Bukti Pembayaran</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>
      <div class="modal-body">
        <form action="<?php echo base_url('index.php/Donasi/upload_bukti')?>" method="post" enctype="multipart/form-data">
        <input type="hidden" id="id_donasi" name="id_donasi">
        <input type="file" name="foto_bukti" class="form-control" required>
      </div>
      <div class="modal-footer">
		<input type="submit" value="Upload" class="btn btn-success">
        </form>
      </div>
    </div>

  </div>
</div>
</body>

</html>
<script>
function tm_detail(id_donasi) {
$.getJSON("<?=base_url()?>index.php/Donasi/get_detail_donasi/"+id_donasi,function(data){
console.log(data);
$("#id_donasi").val(data['id_donasi']);
});
}
</script>