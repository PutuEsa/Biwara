<section class="content">
	<div class="main">
			<!-- MAIN CONTENT -->
			<div class="main-content">
				<div class="container-fluid">
					<!-- OVERVIEW -->
					<div class="panel panel-headline">
                    <div class="panel-heading">
							<h1 class="panel-title">Data Laporan</h1>
						</div>
                        <div class="panel-body">
                        <a href="#tambah" class="btn btn-primary" data-toggle="modal" style="float: left;">Tambah</a><br>
                        <div class="panel-heading"></div>
                        <table class="table table-hover table-striped">
                <thead>
                  <tr>
                      <th>No</th>
                      <th>Id</th>
                      <th>Bencana</th>
                      <th>Lokasi</th>
                      <th>Deskripsi</th>
                      <th>Gambar</th>
                      <th>Tanggal</th>
                      <th colspan="2" style="text-align:center; left:10px;"></th>
                  </tr>
                  </thead>

                  <tbody>

           	<?php $no = 0; foreach($data_laporan as $lpr): $no++;?>


               <tr>
       
                   <td><?=$no?></td>
                   <td><?=$lpr->id_laporan?></td>
                   <td><?=$lpr->bencana?></td>
                   <td><?=$lpr->lokasi?></td>
                   <td><?=$lpr->deskripsi?></td>
                   <td><img src="<?php echo base_url('assets/img/bencana/'.$lpr->gambar);?>" style="width:100px; height:80px" alt="foto bukti"></td>
                   <td><?=$lpr->tanggal?></td>
                   <td colspan>
                   <a href="#update_laporan" data-toggle="modal" onclick="tm_detail(<?=$lpr->id_laporan?>)"  class="btn btn-info">Ubah</a>
                   <a href="<?=base_url('index.php/Laporan/hapus_laporan/'.$lpr->id_laporan)?>" onclick="return confirm('apakah anda yakin untuk menghapus?')" class="btn btn-danger">Hapus</a></td>
       
               </tr>

           <?php endforeach?>
            </tbody>
              </table>

              <div class="modal fade" id="tambah">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
        <h4 class="modal-title">Tambah Laporan</h4>
      </div>
      <div class="modal-body">
        <form action="<?=base_url('index.php/laporan/simpan_laporan')?>" method="post">
        Bencana
        <input type="text" name="bencana" class="form-control"><br>
        Lokasi
        <input type="text" name="lokasi" class="form-control"><br>
        deskripsi
        <input type="text" name="deskripsi" class="form-control"><br>
        gambar
        <input type="file" name="gambar" class="form-control"><br>
        tanggal
        <input type="date" name="tanggal" class="form-control"><br>
        

        <input type="submit" name="simpan" value="Simpan" class="btn btn-primary" style="float: right;">
        </form>
      </div>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->

<div class="modal fade" id="update_laporan">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
        <h4 class="modal-title">Ubah Laporan</h4>
      </div>
      <div class="modal-body">
        <form action="<?=base_url('index.php/Laporan/update_laporan')?>" method="post">
        <input type="hidden" name="id_laporan" id="id_laporan">
        Bencana
        <input type="text" name="bencana" class="form-control"><br>
        Lokasi
        <input type="text" name="lokasi" class="form-control"><br>
        deskripsi
        <input type="text" name="deskripsi" class="form-control"><br>
        gambar
        <input type="file" name="gambar" class="form-control"><br>
        tanggal
        <input type="date" name="tanggal" class="form-control"><br>

        <input type="submit" name="simpan" value="Simpan" class="btn btn-primary" style="float: right;">
        </form>
      </div>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->

              <?php if ($this->session->flashdata('pesan')!=null): ?>
                  <div class="alert alert-danger"><?= $this->session->flashdata('pesan'); ?></div> 
              <?php endif ?>
                        </div>
					</div>
				</div>
			</div>
			<!-- END MAIN CONTENT -->
		</div>
</section>

<script>
  function tm_detail(id_laporan) {
    $.getJSON("<?=base_url()?>index.php/Laporan/get_detail_laporan/"+id_laporan,function(data){
      $('#id_laporan').val(data['id_laporan']);
      $('#bencana').val(data['bencana']);
      $("#lokasi").val(data['lokasi']);
      $("#deskripsi").val(data['deskripsi']);
      $("#gambar").val(data['gambar']);
      $("#tanggal").val(data['tanggal']);
    });
  }
</script>
