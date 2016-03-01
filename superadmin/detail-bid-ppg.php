<?php include 'cek_session.php'; ?>
<!doctype html>
<html lang="en">

    <head>
        <meta charset="utf-8">
        <title>Detail Pengurus PPG</title>
        <?php include 'header_superadmin.php'; ?>
    </head>
    <?php include 'menu_superadmin.php'; ?>   
    <div class="main-content">
        <div class="panel panel-default">
            <div class="panel-heading">Detail Data</div>
            <div class="panel-body"><?php detail(); ?></div>
            <?php

            function detail() {

                if (isset($_GET['detail'])) {
                    require_once "../db/database.php";
                    $skripdetail = "SELECT * FROM data_bidang_ppg where id_bid ='" . $_GET['detail'] . "' ";
                    $selectdetail = mysql_query($skripdetail);
                    $countpgrs = mysql_num_rows(mysql_query("select id_pgrs from data_pgrs_ppg where id_bid = '" . $_GET['detail'] . "'"));
                    $selectdetail2 = mysql_fetch_object($selectdetail);
                    if ($selectdetail2 == false) {
                        echo "Data tidak ditemukan";
                        echo '
                            </div>
                            <div class="panel-footer">
                            <a href="data-bid-ppg.php?lihat-bid" class="btn btn-warning btn-md"><span class="fa fa-angle-left" aria-hidden="true" title="kembali"></span> Kembali</a>
                                </div>
                        ';
                    } else {
                        ?>

                        <form id="tab">                                    
                            <div class="form-group">
                                <label>Nama Bidang</label>
                                <input type="text" class="form-control" value="<?= $selectdetail2->nama ?>" disabled>
                            </div>                            

                            <div class="form-group">
                                <label>Tipe Bidang</label>
                                <input type="text" class="form-control" value="<?php
                                if ($selectdetail2->tipe_bidang == "P") {
                                    echo "Pengurus Harian";
                                } else {
                                    echo "Bidang PPG";
                                }
                                ?>" disabled>
                            </div>
                            <div class="form-group">
                                <label>Jumlah Pengurus</label>
                                <input type="text" class="form-control" value="<?= $countpgrs ?>" disabled>
                            </div>            
                            <div class="form-group">
                                <label>Pengurus </label>
                                <br>
                                <?php
                                $sqlgetpgrs = mysql_query("select * from data_pgrs_ppg where id_bid = '" . $_GET['detail'] . "' ");
                                if ($countpgrs == '0') {
                                    echo "<font color='red'>Tidak ada pengurus di bidang ini</font>";
                                } else {
                                    while ($row = mysql_fetch_object($sqlgetpgrs)) {
                                        ?>

                                        <strong><label class="label label-primary "><?= $row->nm_pgrs ?></label></strong>
                                        &nbsp;&nbsp;

                                        <?php
                                    }
                                }
                                ?>
                            </div>    
                            <div class="form-group">
                                <label>Deskripsi</label>
                                <textarea rows="3" class="form-control" disabled><?= $selectdetail2->desk ?></textarea>
                            </div>


                    </div>
                </form>                           
                <br> <div class="panel-footer">                        
                    <a href="data-bid-ppg.php?lihat-bid" class="btn btn-warning btn-md"><span class="fa fa-angle-left" aria-hidden="true" title="kembali"></span> Kembali</a>
                    <a href="?edit=<?= $selectdetail2->id_bid; ?>" class="btn btn-info"><span class="fa fa-pencil" aria-hidden="true" title="Ubah"></span> Ubah</a>
                    <a href="data-bid-ppg.php.php?hapus=<?= $selectdetail2->id_bid; ?>" onclick="return confirm('Yakin menghapus data ini?')" class="btn btn-danger"><span class="glyphicon glyphicon-trash" aria-hidden="true" title="Hapus"></span> Hapus</a>


                </div>
            </div>
            </div>                
            <?php
            //edit//
        }
    }
    if (isset($_GET['edit'])) {
        require_once "../db/database.php";
        $skripedit = "SELECT * FROM data_bidang_ppg where id_bid  ='" . $_GET['edit'] . "' ";
        $selectedit = mysql_query($skripedit) or die(mysql_error());
        $selectedit2 = mysql_fetch_object($selectedit);
        if ($selectedit2 == false) {
            echo "Data tidak ditemukan";
            ?>
            </div>
            <div class="panel-footer">
                <a href="data-bid-ppg.php?lihat-bidang" class="btn btn-warning btn-md"><span class="fa fa-angle-left" aria-hidden="true" title="kembali"></span> Kembali</a>
            </div>
            <?php
        } else {
            ?>            
            <form method="post" enctype="multipart/form-data" >                        
                <input type="hidden" value="<?= $selectedit2->id_bid ?> " name="tx_id">
                <div class="form-group">
                    <label>Nama Bidang</label>
                    <input type="text" class="form-control" value="<?= $selectedit2->nama ?> "  name="tx_nm">
                </div>                            
                <div class="form-group">
                    <label>Tipe Bidang</label>
                    <select class="form-control" name="tipe_bidang" required>
                        <option value="B" <?php
                        if ($selectedit2->tipe_bidang == "B") {
                            echo "selected";
                        }
                        ?> >Bidang PPG</option>
                        <option value="P" <?php
                        if ($selectedit2->tipe_bidang == "P") {
                            echo "selected";
                        }
                        ?> >Pengurus Harian PPG</option>
                    </select>
                </div>
                <div class="form-group">
                    <label>Deskripsi</label>
                    <textarea rows="3" class="form-control" name="tx_desk"><?= $selectedit2->desk ?></textarea>
                </div>   
            </div>
            <div class="panel-footer">
                <a href="detail-bid-ppg.php?detail=<?= $_GET['edit'] ?>" class="btn btn-warning btn-md"><span class="fa fa-angle-left" aria-hidden="true" title="kembali"></span> Kembali</a>
                <button type="submit" name="btn_ubah" class="btn btn-success btn-md" ><i class="fa fa-save"></i>&nbsp;Simpan</button>
            </div>        


            </form>		
            <?php
        }


        if (isset($_POST['btn_ubah'])) {
            $input = new stdClass();
            $input->id = antiinjection($_POST['tx_id']);
            $input->nm_p = antiinjection($_POST['tx_nm']);
            $input->tipe = antiinjection($_POST['tipe_bidang']);
            $input->desk = mysql_escape_string($_POST['tx_desk']);
            require_once "../db/database.php";
//            echo '<pre>';
//            print_r($input);
//            echo '</pre>';
//            die();
            $isi = "Update data_bidang_ppg set nama ='" . $input->nm_p . "' , desk='" . $input->desk . "' , tipe_bidang = '" . $input->tipe . "' WHERE id_bid = '" . $input->id . "'";

            $sqltambah = mysql_query($isi) or die(mysql_error());
            if ($sqltambah) {
                echo '<meta http-equiv="refresh" content="0;url=detail-bid-ppg.php?detail=' . $input->id . '">';
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