<section class="content">
	<div class="main">
			<!-- MAIN CONTENT -->
			<div class="main-content">
				<div class="container-fluid">
					<!-- OVERVIEW -->
					<div class="panel panel-headline">
                    <div class="panel-heading">
							<h1 class="panel-title">Data Transaksi</h1>
						</div>
                        <div class="panel-body">
                        <div class="panel-heading"></div>
                        <table class="table table-hover table-striped">
                <thead>
                  <tr>
                      <th>No</th>
                      <th>Id</th>
                      <th>Nama Bencana</th>
                      <th>Total</th>
                      <th colspan="2" style="text-align:center; left:10px;"></th>
                  </tr>
                  </thead>

                  <tbody>

           	<?php $no = 0; foreach($data_transaksi as $trn): $no++;?>


               <tr>
       
                   <td><?=$no?></td>
                   <td><?=$trn->id_transaksi?></td>
                   <td><?=$trn->bencana?></td>
                   <td><?=$trn->total?></td>
                   <td colspan>
                   <a href="<?=base_url('index.php/Transaksi/hapus_transaksi/'.$trn->id_transaksi)?>" onclick="return confirm('apakah anda yakin untuk menghapus?')" class="btn btn-danger">Hapus</a></td>
       
               </tr>

           <?php endforeach?>
            </tbody>
              </table>

              
        

        
