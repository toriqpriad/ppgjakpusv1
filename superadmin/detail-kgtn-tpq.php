<?php include 'cek_session.php'; ?>
<!doctype html>
<html lang="en">

    <head>
        <meta charset="utf-8">
        <title>Detail Kegiatan TPQ</title>
        <?php include 'header_superadmin.php'; ?>
    </head>
    <?php include 'menu_superadmin.php'; ?>   
    <div class="main-content">
        <div class="panel panel-default">
            <div class="panel-heading">Detail Data</div>
            <div class="panel-body">
                <div id="success" class="alert alert-success alert-dismissable" style="display:none"><span id="success_message"></span><button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button></div>
                <div id="danger" class="alert alert-danger alert-dismissable" style="display:none"><span id="error_message"></span><button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button></div>
                <?php data(); ?>
                <?php

                function data() {
                    if (isset($_GET['detail'])) {
                        require_once "../db/database.php";
                        $skripdetail = "SELECT * FROM data_kegiatan a                                     
                                    inner join data_tpq c on a.pelaksana_kgtn = c.id_tpq 
                                    where a.id_kgtn = '" . $_GET['detail'] . "'";
                        //echo $skripdetail;
                        $selectdetail = mysql_query($skripdetail);
                        $selectdetail2 = mysql_fetch_object($selectdetail);
                        if ($selectdetail2 == false) {
                            ?>
                            Data tidak ditemukan
                            
                            </div>
                            <div class="panel-footer">
                            <a href="data-kgtn-ppg.php?lihat-kegiatan" class="btn btn-warning btn-md"><span class="fa fa-angle-left" aria-hidden="true" title="kembali"></span> Kembali</a>
                                </div>
                        <?php                        
                        } else {                            
                            ?>       
                            <div class="form-group">
                                <label>Nama Kegiatan</label>
                                <input type="text" value="<?= $selectdetail2->nama_kgtn ?>" class="form-control" disabled>
                            </div>                                                                                                    
                            <div class="form-group">
                                <label>Tanggal Kegiatan</label>
                                <input type="text" value="<?= $selectdetail2->tgl_kgtn ?>" class="form-control" disabled>
                            </div>
                            <div class="form-group">
                                <label>Deskripsi Kegiatan</label>
                                <textarea rows="3" class="form-control" disabled><?= $selectdetail2->desk_kgtn ?></textarea>
                            </div>      
                            <div class="form-group">
                                <label>Foto Kegiatan</label>
                            </div>
                            <div class="form-group">
                                <div class="row">
                                    <?php
                                    if ($selectdetail2->tipe_kgtn == "B" OR $selectdetail2->tipe_kgtn == "P") {
                                        $dirfoto = "../images/foto_kgtn/ppg/";
                                    } else {
                                        $dirfoto = "../images/foto_kgtn/tpq/";
                                    }
                                    ?>
                                    <div class="col-md-4">
                                        <img src="<?php
                                        if (($selectdetail2->foto_1 != "") AND ( file_exists($dirfoto . $selectdetail2->foto_1))) {
                                            echo $dirfoto . $selectdetail2->foto_1;
                                        } else {
                                            echo $dirfoto . 'no_img.jpg';
                                        }
                                        ?>" class="img img-preview img-responsive img-thumbnail">
                                    </div>
                                    <div class="col-md-4">
                                        <img src="<?php
                                        if (($selectdetail2->foto_2 != "") AND ( file_exists($dirfoto . $selectdetail2->foto_2))) {
                                            echo $dirfoto . $selectdetail2->foto_2;
                                        } else {
                                            echo $dirfoto . 'no_img.jpg';
                                        }
                                        ?>" class="img img-preview img-responsive img-thumbnail">
                                    </div>
                                    <div class="col-md-4">
                                        <img src="<?php
                                        if (($selectdetail2->foto_3 != "") AND ( file_exists($dirfoto . $selectdetail2->foto_3))) {
                                            echo $dirfoto . $selectdetail2->foto_3;
                                        } else {
                                            echo $dirfoto . 'no_img.jpg';
                                        }
                                        ?>"  class="img img-preview img-responsive img-thumbnail">
                                    </div>
                                </div>      
                            </div>
                        </div>
                        <div class="panel-footer">                        
                            <a href="detail-tpq.php?detail=<?=$selectdetail2->id_tpq?>" class="btn btn-warning btn-md"><span class="fa fa-angle-left" aria-hidden="true" title="kembali"></span> Kembali</a>                                                        
                        </div>
                    </div>
                </div>   

                <?php
                //edit//
            }
        }                
}
?>
<script>
    function goBack() {
        window.history.back();
    }
</script>
<style>
    .img-preview{
        width: 400px; 
        height:300px;
    }

</style>   
</body></html>		