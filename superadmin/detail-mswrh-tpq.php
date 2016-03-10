<?php include 'cek_session.php'; ?>
<!doctype html>
<html lang="en">

    <head>
        <meta charset="utf-8">
        <title>Detail Musyawarah TPQ</title>
        <?php include 'header_superadmin.php'; ?>
    </head>
    <?php include 'menu_superadmin.php'; ?>   
    <div class="main-content">
        <div class="panel panel-default">
            <div class="panel-heading">Detail Data</div>
            <div class="panel-body">                
                <?php detail(); ?>
                <?php

                function detail() {
                    if (isset($_GET['detail'])) {
                        require_once "../db/database.php";
                        $skripdetail = "SELECT * FROM data_musyawarah a inner join data_tpq b on a.pelaksana_mswrh = b.id_tpq Where a.tipe_mswrh IN ('T') and a.id_mswrh = '" . $_GET['detail'] . "' ";
                        $selectdetail = mysql_query($skripdetail);
                        $selectdetail2 = mysql_fetch_object($selectdetail);
                        if ($selectdetail2 == false) {
                            ?>
                            Data tidak ditemukan                            
                        </div>
                        <div class="panel-footer">
                            <button onclick="goBack()" class="btn btn-warning btn-md"><span class="fa fa-angle-left" aria-hidden="true" title="kembali"></span> Kembali</button>
                        </div>
                        <?php
                    } else {
                        ?>                                                                                  
                        <div class="form-group">
                            <label>Judul Musyawarah</label>
                            <input type="text" value="<?= $selectdetail2->judul_mswrh ?>" class="form-control" disabled>
                        </div>                                                                                                                                       
                        <div class="form-group">
                            <label>Tanggal Pelaksanaan</label>
                            <input type="text" value="<?= $selectdetail2->tgl_dibuat ?>" class="form-control" disabled>
                        </div>
                        <div class="form-group">
                            <label>Hasil Musyawarah</label>
                            <textarea rows="3" class="form-control" disabled><?= $selectdetail2->hasil_mswrh ?></textarea>
                        </div>      

                    </div>

                    <div class="panel-footer">                        
                        <a href="detail-tpq.php?detail=<?= $selectdetail2->id_tpq ?>" class="btn btn-warning btn-md"><span class="fa fa-angle-left" aria-hidden="true" title="kembali"></span> Kembali</a>                                                        
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
</body></html>		