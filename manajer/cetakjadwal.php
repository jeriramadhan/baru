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
  <button onClick="javascript:cetak()" id="tombol"><i class="fa fa-print"></i>Cetak Data Jadwal</button>
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
                  <h2 class="box-title">Data Jadwal</h2>
                </div>

                <!-- /.box-header -->
					<div class="box-body">
											<br />
											<table id="tabel" class="table table-bordered table-striped">
												<thead>

													<tr>
														<th>No</th>
														<th>Nama Pekerjaan</th>
														<th>Tanggal Mulai</th>
														<th>Tanggal Selesai</th>
														<th>Durasi Kegiatan</th>
													</tr>
												</thead>
												<tbody>
													<?php
													if (isset($_GET['id_proyek'])) {
														$id_proyek = $_GET['id_proyek'];
														$jadwal = mysql_query("SELECT jadwal.id_proyek,jadwal.id_sub,nama_sub,id_jadwal,tanggal_mulai_j,tanggal_selesai_j,durasi_kegiatan
														   FROM jadwal
														   JOIN sub_pekerjaan ON (sub_pekerjaan.id_sub=jadwal.id_sub)
														   JOIN master_sub_pekerjaan ON (master_sub_pekerjaan.id_master_sub=sub_pekerjaan.id_master_sub)
														   WHERE jadwal.id_proyek='$id_proyek'");

														$no = 0;
														while ($r = mysql_fetch_array($jadwal)) {
															$n = 1;
															$no = $no + $n;
															echo "
										<tr>
										  <td align='center'>$no</td>
										  <td>$r[nama_sub]</td>
										";
													?>
													<td><?php echo date("d/m/Y", strtotime($r['tanggal_mulai_j'])) ?></td>
													<td><?php echo date("d/m/Y", strtotime($r['tanggal_selesai_j'])) ?></td>
													<td><?php echo $r['durasi_kegiatan'] ?> jam</td>
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
			  </div>			       </div>
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