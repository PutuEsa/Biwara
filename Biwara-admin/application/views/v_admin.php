<section class="content">
	<div class="main">
			<!-- MAIN CONTENT -->
			<div class="main-content">
				<div class="container-fluid">
					<!-- OVERVIEW -->
					<div class="panel panel-headline">
                    <div class="panel-heading">
							<h1 class="panel-title">Data Admin</h1>
						</div>
                        <div class="panel-body">
                        <a href="#tambah" class="btn btn-primary" data-toggle="modal" style="float: left;">Tambah</a><br>
                        <div class="panel-heading"></div>
                        <table class="table table-hover table-striped">
                <thead>
                  <tr>
                      <th>No</th>
                      <th>Id</th>
                      <th>Username</th>
                      <th>Password</th>
                      <th colspan="2" style="text-align:center; left:10px;"></th>
                  </tr>
                  </thead>

                  <tbody>

           	<?php $no = 0; foreach($data_admin as $adm): $no++;?>


               <tr>
       
                   <td><?=$no?></td>
                   <td><?=$adm->id_admin?></td>
                   <td><?=$adm->username?></td>
                   <td><?=$adm->password?></td>
                   <td colspan><a href="#update_admin" data-toggle="modal" onclick="tm_detail(<?=$adm->id_admin?>)"  class="btn btn-info">Ubah</a>
                   <a href="<?=base_url('index.php/Admin/hapus_admin/'.$adm->id_admin)?>" onclick="return confirm('apakah anda yakin untuk menghapus?')" class="btn btn-danger">Hapus</a></td>
       
               </tr>

           <?php endforeach?>
            </tbody>
              </table>

              <div class="modal fade" id="tambah">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
        <h4 class="modal-title">Tambah Admin</h4>
      </div>
      <div class="modal-body">
        <form action="<?=base_url('index.php/admin/simpan_admin')?>" method="post">
        Username
        <input type="text" name="username" class="form-control"><br>
        Password
        <input type="text" name="password" class="form-control"><br>

        <input type="submit" name="simpan" value="Simpan" class="btn btn-primary" style="float: right;">
        </form>
      </div>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->

<div class="modal fade" id="update_admin">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
        <h4 class="modal-title">Ubah Admin</h4>
      </div>
      <div class="modal-body">
        <form action="<?=base_url('index.php/admin/update_admin')?>" method="post">
        <input type="hidden" name="id_admin" id="id_admin">
        Username
        <input type="text" name="username" class="form-control" value="" id="username"><br>
        Password
        <input type="text" name="password" class="form-control" placeholder="" id="password"><br>

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
  function tm_detail(id_admin) {
    $.getJSON("<?=base_url()?>index.php/Admin/get_detail_admin/"+id_admin,function(data){
      $('#id_admin').val(data['id_admin']);
      $('#username').val(data['username']);
      $("#password").val(data['password']);
    });
  }
</script>
