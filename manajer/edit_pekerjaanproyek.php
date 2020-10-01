<?php include "header.php"; 
?>
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <ol class="breadcrumb">
    </ol>
  </section>
  <?php
$link=koneksidb();
$id_proyek = $_GET['id_proyek'];
$id_sub = $_GET['id_sub'];

$sql=mysql_query("SELECT * FROM proyek where id_proyek = '$id_proyek'");
$data=mysql_fetch_array($sql);
$m = $data['id_proyek'];
$jenis = $data['id_jenis'];

$sql1=mysql_query("SELECT * FROM sub_pekerjaan where id_proyek = '$id_proyek' and id_sub = '$id_sub' ");
$data1=mysql_fetch_array($sql1);
$n= $data1['id_sub']
?>
  <section class="content">
    <div class="row">
      <!-- left column -->
      <div class="col-md-12">
        <!-- general form elements -->
        <div class="box box-primary">
          <div class="box-header with-border">
            <h3 class="box-title">Form Ubah Data Pekerjaan Proyek</h3>
          </div>
          <form role="form" action="fungsi.php?proses_edit_pekerjaan_proyek" method="POST" class="form-horizontal">
            <input type="hidden" input class="form-control" name="id_proyek" value="<?=$m ?>">
            <input type="hidden" input class="form-control" name="id_sub" value="<?= $_GET['id_sub']; ?>">
            <div class="box-body">

              <div class="form-group">
                <label class="col-sm-3 control-label">Harga Satuan: </label>
                <div class="col-sm-4">
                  <div class="input-group">
                    <span class="input-group-addon">Rp.</span>
                    <input id="harga_bahan" type="text" class="form-control" name="harga_satuan" value="<?= $data1['harga_satuan']?>" required>
                  </div>
                </div>
              </div>
              <div class="form-group">
                <label class="col-sm-3 control-label">Volume Pekerjaan </label>
                <div class="col-sm-3">
                  <input id="volume" type="text" class="form-control" value="<?= $data1['volume']?>" name="volume" value="" required>
                </div>
              </div>


            </div>

            <input type="submit" value="Simpan" class="btn btn-info btn-fill btn-wd"></input>
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