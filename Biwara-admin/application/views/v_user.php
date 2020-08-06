<section class="content">
	<div class="main">
			<!-- MAIN CONTENT -->
			<div class="main-content">
				<div class="container-fluid">
					<!-- OVERVIEW -->
					<div class="panel panel-headline">
                    <div class="panel-heading">
							<h1 class="panel-title">Data user</h1>
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
                      <th>Email</th>
                      <th>Password</th>
                      <th colspan="2" style="text-align:center; left:10px;"></th>
                  </tr>
                  </thead>

                  <tbody>

           	<?php $no = 0; foreach($data_user as $user): $no++;?>


               <tr>
       
                   <td><?=$no?></td>
                   <td><?=$user->id_user?></td>
                   <td><?=$user->nama_user?></td>
                   <td><?=$user->email?></td>
                   <td><?=$user->password?></td>
                   <td colspan><a href="#update_user" data-toggle="modal" onclick="tm_detail(<?=$user->id_user?>)"  class="btn btn-info">Ubah</a>
                   <a href="<?=base_url('index.php/user/hapus_user/'.$user->id_user)?>" onclick="return confirm('apakah anda yakin untuk menghapus?')" class="btn btn-danger">Hapus</a></td>
       
               </tr>

           <?php endforeach?>
            </tbody>
              </table>

              <div class="modal fade" id="tambah">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
        <h4 class="modal-title">Tambah user</h4>
      </div>
      <div class="modal-body">
        <form action="<?=base_url('index.php/user/simpan_user')?>" method="post">
        Username
        <input type="text" name="nama_user" class="form-control"><br>
        Email
        <input type="text" name="email" class="form-control"><br>
        Password
        <input type="text" name="password" class="form-control"><br>

        <input type="submit" name="simpan" value="Simpan" class="btn btn-primary" style="float: right;">
        </form>
      </div>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->

<div class="modal fade" id="update_user">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
        <h4 class="modal-title">Ubah user</h4>
      </div>
      <div class="modal-body">
        <form action="<?=base_url('index.php/user/update_user')?>" method="post">
        <input type="hidden" name="id_user" id="id_user">
        Username
        <input type="text" name="nama_user" class="form-control" value="" id="nama_user"><br>
        Email
        <input type="text" name="email" class="form-control" id="email"><br>
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
  function tm_detail(id_user) {
    $.getJSON("<?=base_url()?>index.php/user/get_detail_user/"+id_user,function(data){
      $('#id_user').val(data['id_user']);
      $('#nama_user').val(data['nama_user']);
      $('#email').val(data['email']);
      $("#password").val(data['password']);
    });
  }
</script>
