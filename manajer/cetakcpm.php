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
	<button onClick="javascript:cetak()" id="tombol"><i class="fa fa-print"></i>Cetak Data CPM</button>
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
							<h2 class="box-title">Data CPM</h2>
						</div>

						<!-- /.box-header -->
						<?php
        if(isset($_GET['id_proyek'])) 
		{ 
          $id_proyek = $_GET['id_proyek'];
          $jadwal = mysql_query("SELECT jadwal.id_proyek,jadwal.id_sub,nama_sub,id_jadwal,tanggal_mulai_j,tanggal_selesai_j,durasi_kegiatan,es,ef,ls,lf,sl
		                         FROM jadwal
								 JOIN sub_pekerjaan ON (sub_pekerjaan.id_sub=jadwal.id_sub)
								 JOIN master_sub_pekerjaan ON (master_sub_pekerjaan.id_master_sub=sub_pekerjaan.id_master_sub)
								 WHERE jadwal.id_proyek='$id_proyek'");
    ?>

						<!-- /.box-header -->
						<div class="box-body">
							
							<table id="tabel" class="table table-bordered table-striped">
								<thead>

									<tr>
										<th>No</th>
										<th>Nama Pekerjaan</th>
										<th>Earliest Start</th>
										<th>Earliest Finish</th>
										<th>Slack</th>
										<th>Latest Start</th>
										<th>Latest Finish</th>
										<!--<th> Aksi</th>-->
									</tr>
								</thead>
								<tbody>
									<?php
    
                        $no=0;
                        while($r=mysql_fetch_array($jadwal)){
                          $n=1;
                          $no=$no+$n;
                          echo"
                            <tr>
                              <td align='center'>$no</td>
                              <td>$r[nama_sub]</td>
                              <td>$r[es]</td>
                              <td>$r[ef]</td>
                              <td>$r[sl]</td>
                              <td>$r[ls]</td>
                              <td>$r[lf]</td>
                              <!--<td>
                              <a href='' class='btn btn-info btn-fill btn-sm' >Ubah</a>
                              <a href='' class='btn btn-danger btn-fill btn-sm'>Hapus</a></td>-->
                            </tr>
                          ";
                        $n++; }
                      ?>
								</tbody>
							</table>
						</div>
						<?php } ?>
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