<?php include 'cek_session.php'; ?>
<!doctype html>
<html lang="en">

    <head>
        <meta charset="utf-8">
        <title>Detail Musyawarah PPG</title>
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
                        $skripdetail = "SELECT * FROM data_musyawarah a inner join data_bidang_ppg b on a.pelaksana_mswrh = b.id_bid Where a.tipe_mswrh IN ('B','P') and a.id_mswrh = '" . $_GET['detail'] . "' ";
                        $selectdetail = mysql_query($skripdetail);
                        $selectdetail2 = mysql_fetch_object($selectdetail);
                        if ($selectdetail2 == false) {
                            echo "Data tidak ditemukan";
                            echo '
                            </div>
                            <div class="panel-footer">
                            <a href="data-mswrh-ppg.php?lihat-msw" class="btn btn-warning btn-md"><span class="fa fa-angle-left" aria-hidden="true" title="kembali"></span> Kembali</a>
                                </div>
                        ';
                        } else {
                            ?>                                                                                  
                            <div class="form-group">
                                <label>Judul Musyawarah</label>
                                <input type="text" value="<?= $selectdetail2->judul_mswrh ?>" class="form-control" disabled>
                            </div>                                                                        
                            <div class="form-group">
                                <label>Pelaksana</label>
                                <input type="text" value="<?= $selectdetail2->nama ?>" class="form-control" disabled>
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
                            <a href="data-mswrh-ppg.php?lihat-msw" class="btn btn-warning btn-md"><span class="fa fa-angle-left" aria-hidden="true" title="kembali"></span> Kembali</a>
                            <a href="?edit=<?= $selectdetail2->id_mswrh; ?>" class="btn btn-info"><span class="fa fa-pencil" aria-hidden="true" title="Ubah"></span> Ubah</a>
                            <a href="data-mswrh-ppg.php?hapus=<?= $selectdetail2->id_mswrh; ?>" onclick="return confirm('Yakin menghapus data ini?')" class="btn btn-danger"><span class="glyphicon glyphicon-trash" aria-hidden="true" title="Hapus"></span> Hapus</a>


                        </div>
                    </div>
                </div>                
                <?php
                //edit//
            }
        }
        if (isset($_GET['edit'])) {

            require_once "../db/database.php";
            $skripedit = "SELECT * FROM data_musyawarah a inner join data_bidang_ppg b on a.pelaksana_mswrh = b.id_bid Where a.tipe_mswrh IN ('B','P') and a.id_mswrh = '" . $_GET['edit'] . "' ";
            $selectedit = mysql_query($skripedit) or die(mysql_error());
            $selectedit2 = mysql_fetch_object($selectedit);
            if ($selectedit2 == false) {
                echo "Data tidak ditemukan";
                ?>
            </div>
            <div class="panel-footer">
                <a href="data-mswrh-ppg.php?lihat-msw" class="btn btn-warning btn-md"><span class="fa fa-angle-left" aria-hidden="true" title="kembali"></span> Kembali</a>
            </div>
            <?php
        } else {
            ?>




            <form method="post" enctype="multipart/form-data" >                        
                <input type="hidden" value="<?= $selectedit2->id_mswrh ?> " name="id_mswrh">
                <div class="form-group">
                    <label>Judul Musyawarah</label>
                    <input type="text" value="<?= $selectedit2->judul_mswrh ?>" class="form-control" name='judul_mswrh' >
                </div>                                                                        
                <div class="form-group">
                    <label>Pelaksana</label>
                    <select name="pelaksana" class="form-control input-md">
                        <?php
                        $sql_pelaksana = mysql_query("select `id_bid`,`nama`,`tipe_bidang` from data_bidang_ppg");
                        while ($get_pelaksana = mysql_fetch_object($sql_pelaksana)) {
                            ?>
                            <option value="<?= $get_pelaksana->id_bid ?>-<?= $get_pelaksana->tipe_bidang ?>" <?php
                            if ($selectedit2->pelaksana_mswrh == $get_pelaksana->id_bid) {
                                echo 'selected';
                            }
                            ?>> <?= $get_pelaksana->nama; ?></option>
                                <?php }
                                ?>
                    </select>
                </div>
                <div class="form-group">
                    <label>Tanggal Pelaksanaan</label>
                    <div class="input-group date form_date col-md-5" data-date="" data-date-format="dd/mm/yyyy" data-link-field="dtp_input2" data-link-format="yyyy-mm-dd" placeholder="dd/mm/yyyy">
                        <input class="form-control" size="10" type="text" name="tgl_pelaksana" required placeholder="dd/mm/yyy" value="<?= $selectedit2->tgl_dibuat; ?>">
                        <span class="input-group-addon"><span class="glyphicon glyphicon-calendar"></span></span>
                    </div>
                </div>
                <div class="form-group">
                    <label>Hasil Musyawarah</label>
                    <textarea name="hsl_mswrh" rows="3" class="form-control" ><?= $selectedit2->hasil_mswrh ?></textarea>
                </div>      
            </div>
            <div class="panel-footer">
                <a href="detail-mswrh-ppg.php?detail=<?= $_GET['edit'] ?>" class="btn btn-warning btn-md"><span class="fa fa-angle-left" aria-hidden="true" title="kembali"></span> Kembali</a>
                <button type="submit" name="btn_ubah" class="btn btn-success btn-md" ><i class="fa fa-save"></i>&nbsp;Simpan</button>
            </div>        
            </div>

            </form>		
            <?php
        }


        if (isset($_POST['btn_ubah'])) {
            $input = new stdClass();
            $input->id = antiinjection($_POST['id_mswrh']);
            $input->judul = antiinjection($_POST['judul_mswrh']);
            $input->tgl = antiinjection($_POST['tgl_pelaksana']);
            $input->tipepelaksana = explode('-', $_POST['pelaksana']);
            $input->pelaksana = $input->tipepelaksana[0];
            $input->tipe_mswrh = $input->tipepelaksana[1];
            $input->hasil = mysql_escape_string($_POST['hsl_mswrh']);
            require_once "../db/database.php";
            $input->isi = "Update data_musyawarah set judul_mswrh ='" . $input->judul . "' , tgl_dibuat='" . $input->tgl . "',pelaksana_mswrh='" . $input->pelaksana . "', tipe_mswrh='" . $input->tipe_mswrh . "',hasil_mswrh='" . $input->hasil . "' WHERE id_mswrh = '" . $input->id . "'";
//                                echo '<pre>';print_r($input);echo '</pre>';die();
            $sqltambah = mysql_query($input->isi) or die(mysql_error());
            if ($sqltambah) {
                echo '<meta http-equiv="refresh" content="0;url=detail-mswrh-ppg.php?detail=' . $input->id . '">';
            } else {
                echo "<script type='text/javascript'>alert('Data gagal diubah')</script>";
            }
        }
    }
}
?>
<script type="text/javascript">
    $('.form_date').datetimepicker({
        language: 'id',
        weekStart: 1,
        todayBtn: 1,
        autoclose: 1,
        todayHighlight: 1,
        startView: 2,
        minView: 2,
        forceParse: 0
    });
</script>


</body></html>		