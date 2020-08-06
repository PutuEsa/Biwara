<section class="content">
	<div class="main">
			<!-- MAIN CONTENT -->
			<div class="main-content">
				<div class="container-fluid">
					<!-- OVERVIEW -->
					<div class="panel panel-headline">
                    <div class="panel-heading">
							<h1 class="panel-title">Data Donasi</h1>
						</div>
                        <div class="panel-body">
                        <div class="panel-heading"></div>
                        <table class="table table-hover table-striped">
                <thead>
                  <tr>
                  <th>No</th>
                  <th>ID Donasi</th>
                  <th>User</th>
                  <th>Foto Bukti</th>
                  <th>Tanggal</th>
                  <th>Bencana</th>
                  <th>Nominal</th>
                  <th>Pembayaran</th>
                  <th>Status</th>
                  </tr>
                  </thead>

                  <tbody>

           	<?php $no = 0; foreach($data_donasi as $isi): $no++;?>


               <tr>
       
               <td>
						<?= $no++ ?>
					</td>
					<td>
						<?php echo $isi->id_donasi?>
					</td>
          <td>
						<?php echo $isi->nama_user?>
					</td>
          <td>
          <a href="<?php echo base_url('assets/img/foto_bukti/'.$isi->foto_bukti);?>">
          <img src="<?php echo base_url('assets/img/foto_bukti/'.$isi->foto_bukti);?>" style="width:80px; height:100px" alt="foto bukti">
          </a>
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
                    <a href="<?php echo base_url('index.php/Donasi/status_sukses/'.$isi->id_donasi)?>" class="btn btn-warning"><?php echo $isi->status?></a>
					<?php } elseif($isi->status="Donasi Sukses"){?>
                    <a href=""class="btn btn-success"><?php echo $isi->status?></a>
                    <?php } ?>
                    </td>
               </tr>

           <?php endforeach?>
            </tbody>
              </table>

              
              <?php if ($this->session->flashdata('pesan')!=null): ?>
                  <div class="alert alert-success"><?= $this->session->flashdata('pesan'); ?></div> 
              <?php endif ?>
                        </div>
					</div>
				</div>
			</div>
			<!-- END MAIN CONTENT -->
		</div>
</section>

<script>
  function tm_detail(id_donasi) {
    $.getJSON("<?=base_url()?>index.php/Donasi/get_detail_donasi/"+id_donasi,function(data){
      $('#id_donasi').val(data['id_donasi']);
      $('#nama').val(data['nama']);
      $("#no_telp").val(data['no_telp']);
      $("#email").val(data['email']);
      $("#tanggal").val(data['tanggal']);
      $("#nominal").val(data['nominal']);
      $("#alat_pembayaran").val(data['alat_pembayaran']);
    });
  }
</script>
