<?php
include "header_cetak.php";

?>

<script type="text/javascript">
  function cetak() {
    var tombol = document.getElementById("tombol");
    tombol.innerHTML = '';
    window.print();
  }
</script>
<br><br><br>
<div class="pull-right">
  <!-- <a href="" onclick="javascript:cetak()" id="tombol"><i class="fa fa-print"></i> cetak kuitansi</a> -->
  <button onClick="javascript:cetak()" id="tombol"><i class="fa fa-print"></i>Cetak Data Alat</button>
</div>
<?php
$link=koneksidb();
?>
<!-- Content Wrapper. Contains page content -->
<!-- <div class="content-wrapper"> -->
  <!-- Content Header (Page header) -->

  <section class="content">
    <div class="row">
      <div class="col-xs-12">
        <div class="nav-tabs-custom">
            <div class="active tab-pane" id="lihat_proyek">
              <!-- Post -->
              <div class="post">
                <br />
                <div class="box-header with-border">
                  <h2 class="box-title">Data Tenaga</h2>
                </div>

                <!-- /.box-header -->
                					<div class="box-body">
					  <table id="table" class="table table-bordered table-striped">
					      <thead>
							<tr>
							  <th>No</th>
							  <th>Kode</th>
							  <th>Nama Alat</th>
							  <th>Harga Satuan Alat</th>
							  <th>Satuan</th>
							  <!-- <th width="100">Aksi</th> -->
							</tr>
						  </thead>
						  <tbody>
						   <?php
			  					if(isset($_GET['id_proyek'])) 
								{ 
									$id_proyek = $_GET['id_proyek'];
									$kegiatan = mysql_query("SELECT * from bahan_material
															 WHERE bahan_material.id_proyek = '$id_proyek' AND bahan_material.kode LIKE 'E0%'");
									$no=0;
									while($r=mysql_fetch_array($kegiatan)){
									  $n=1;
									  $no=$no+$n;
									
									  echo"
										<tr>
										  <td align='left'>$no</td>
										  <td>$r[kode]</td>
										  <td>$r[nama_bahan]</td>"
									?>
										  <td><?php echo "Rp ". number_format(round($r['harga_bahan'],2),2,',','.')?></td>
										  <td><?php echo $r['satuan']?></td>						
										</tr> 
									  <?php 
								   }
								}
							  ?>
						  </tbody>
					   </table>
				    </div>
			       </div>
                </div>
                <!-- /.post -->
              </div>
              <!-- /.tab-pane -->
			  </div>
              </div>
            </div>
            <!-- /.post -->
          </div>
          <!-- /.tab-pane -->
        </div>
        <!-- /.tab-content -->

      </div>
    </div>
</div>
</section>


<?php
include "footer.php";
?>