<?php include "header.php"; 
include "fungsi_romawi.php";
?>
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <ol class="breadcrumb">
    </ol>
  </section>


  <!-- Main content -->
  <section class="content">
    <div class="row">
      <!-- left column -->
      <div class="col-md-12">
        <!-- general form elements -->
        <div class="box box-primary">
          <div class="box-header with-border">
            <h3 class="box-title"></h3>
          </div>
          <!-- /.box-header -->
          <?php 
                  $link=koneksidb();
                  $id_proyek = $_GET['id_proyek'];
                  $id_jadwal = $_GET['id_jadwal'];
                  $getproyek = mysql_query("SELECT jam,tanggal_selesai,tanggal_mulai FROM proyek WHERE id_proyek = '$id' ");
                  $p = mysql_fetch_array($getproyek);
                  $jam = $p['jam'];
														$jadwal = mysql_query("SELECT jadwal.id_proyek,jadwal.id_sub,nama_sub,id_jadwal,tanggal_mulai_j,tanggal_selesai_j,durasi_kegiatan
														   FROM jadwal
														   JOIN sub_pekerjaan ON (sub_pekerjaan.id_sub=jadwal.id_sub)
														   JOIN master_sub_pekerjaan ON (master_sub_pekerjaan.id_master_sub=sub_pekerjaan.id_master_sub)
														   WHERE jadwal.id_proyek='$id_proyek' and jadwal.id_jadwal='$id_jadwal'");

														$no = 0;
                            $r = mysql_fetch_array($jadwal);
                            $id = $_GET['id_proyek'];
$getpekerjaan = mysql_query("SELECT id_sub,kode_pekerjaan,sub_pekerjaan.kode_sub,nama_sub 
  							   FROM master_sub_pekerjaan
							   JOIN pekerjaan
							   ON (pekerjaan.id_pekerjaan=master_sub_pekerjaan.id_pekerjaan)
							   JOIN sub_pekerjaan
							   ON (sub_pekerjaan.id_master_sub=master_sub_pekerjaan.id_master_sub)
                 WHERE sub_pekerjaan.id_proyek ='$id'");
                 
                 $getpekerjaan1 = mysql_query("SELECT * FROM master_sub_pekerjaan
								JOIN pekerjaan
								ON (pekerjaan.id_pekerjaan=master_sub_pekerjaan.id_pekerjaan)
								JOIN sub_pekerjaan
							    ON (sub_pekerjaan.id_master_sub=master_sub_pekerjaan.id_master_sub)
								WHERE sub_pekerjaan.id_proyek ='$id'");
              ?>
              
          <!-- form start -->
          <form role="form" action="fungsi.php?proses2=ubah_jadwal" method="POST" class="form-horizontal">
            <div class="box-body">
													<input type="hidden" class="form-control" name="id_proyek" value="<?= $_GET['id_proyek'] ?>">
													<input type="hidden" class="form-control" name="jam" value="<?= $jam ?>">
                          <input type="hidden" class="form-control" name="id_jadwal" value="<?= $_GET['id_jadwal'] ?>">
													<div class="form-group">
														<label class="col-sm-3 control-label">Nama Pekerjaan : </label>
														<div class="col-sm-4">
															<select class="form-control select2" style="width: 100%;" name="id_sub">
																<?php while ($row = mysql_fetch_array($getpekerjaan)) { ?>
																<option value="<?php echo $row['id_sub']; ?>">
																	<?php echo Romawi($row['kode_pekerjaan']) . '.' . $row['kode_sub'] . ' - ' . $row['nama_sub'];  ?>
																</option>
																<?php } ?>
															</select>
														</div>
													</div>
                          <div class="form-group">
														<label class="col-sm-3 control-label">Tanggal Mulai Pekerjaan : </label>
														<div class="col-sm-2">
															<div class="input-group date">
																<div class="input-group-addon">
																	<i class="fa fa-calendar"></i>
																</div>
																<input type="text" class="form-control pull-right" id="tanggal_mulai" value="<?php echo $r['tanggal_mulai_j']?>"
																	name="tanggal_mulai_j" required>
															</div>
														</div>
													</div>
                          <div class="form-group">
														<label class="col-sm-3 control-label">Durasi Pekerjaan : </label>
														<div class="col-sm-2">
															<div class="input-group">
																<input type="text" minlength="1" maxlength="3" class="form-control"
																	name="durasi_kegiatan" value="<?php echo $r['durasi_kegiatan']?>" onkeyup="this.value=this.value.replace(/[^\\0-9\\]/g, '')"
																	required>
																<span class="input-group-addon">Jam</span>
															</div>
														</div>
													</div>
                          <div class="form-group">
														<label class="col-sm-3 control-label">Pekerjaan Pendahulu : </label>
														<div class="col-sm-6">
															<select class="form-control select2" multiple="multiple"
																data-placeholder="--Pilih Pekerjaan--" style="width: 100%;" name="id_pek_pendahulu[]">
																<option value="TIDAK">Tidak ada Pendahulu</option>
																<?php while ($r = mysql_fetch_array($getpekerjaan1)) { ?>
																<option value="<?php echo $r['id_sub']; ?>">
																	<?php echo Romawi($r['kode_pekerjaan']) . '.' . $r['kode_sub'] . ' - ' . $r['nama_sub'];  ?>
																</option>
																<?php } ?>
																<option value="<?php echo $r['id_pek_pendahulu']?>"></option>
															</select>
														</div>
													</div>

              <!-- /.box-body -->

              <div class="box-footer">
                <input type="submit" value="Ubah" class="btn btn-danger btn-fill btn-wd"></input>
                <a href="jadwal.php" class="btn btn-info btn-fill btn-wd">Batal</a>
              </div>
          </form>
        </div>
        <!-- /.box -->
      </div>
    </div>
    <!-- /.row -->
  </section>
  <!-- /.content -->
</div>
<?php include "footer.php"; ?>