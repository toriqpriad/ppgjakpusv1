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
                $dirfoto = "../images/foto_pgrs/";
                if (isset($_GET['detail'])) {
                    require_once "../db/database.php";
                    $skripdetail = "SELECT * FROM data_pgrs_ppg pgrs join data_tpq tpq on pgrs.tpq_desa= tpq.id_tpq join data_bidang_ppg bid on pgrs.id_bid = bid.id_bid where pgrs.id_pgrs ='" . $_GET['detail'] . "' ";
                    $selectdetail = mysql_query($skripdetail);
                    $selectdetail2 = mysql_fetch_object($selectdetail);
                    if ($selectdetail2 == false) {
                        echo "Data tidak ditemukan";
                        echo '
                            </div>
                            <div class="panel-footer">
                            <a href="data-pgrs-ppg.php?lihat-pgrs-ppg" class="btn btn-warning btn-md"><span class="fa fa-angle-left" aria-hidden="true" title="kembali"></span> Kembali</a>
                                </div>
                        ';
                    } else {
                        ?>
                        <ul id="tabs" class="nav nav-tabs" data-tabs="tabs">
                            <li class="active"><a href="#detail_tpq" data-toggle="tab">Detail Pengurus</a></li>
                            <li><a href="#foto" data-toggle="tab">Foto Pengurus</a></li>


                        </ul>
                        <div id="my-tab-content" class="tab-content">
                            <div class="tab-pane active" id="detail_tpq">
                                <br>
                                <form id="tab">
                                    <div class="form-group">
                                        <label>ID Pengurus</label>
                                        <input type="text" value="<?= $selectdetail2->id_pgrs ?>" class="form-control" disabled>
                                    </div>
                                    <div class="form-group">
                                        <label>Nama Pengurus</label>
                                        <input type="text" class="form-control" value="<?= $selectdetail2->nm_pgrs ?>" disabled>
                                    </div>
                                    <div class="form-group">
                                        <label>Jenis Kelamin</label>
                                        <input type="text" class="form-control" value="<?= $selectdetail2->j_klmn ?>" disabled>
                                    </div>
                                    <div class="form-group">
                                        <label>Tempat Lahir</label>
                                        <input type="text" value="<?= $selectdetail2->tmp_lhr ?>" class="form-control" disabled>
                                    </div>
                                    <div class="form-group">
                                        <label>Tanggal Lahir</label>
                                        <input type="text" value="<?= $selectdetail2->tgl_lhr ?>" class="form-control" disabled>
                                    </div>
                                    <div class="form-group">
                                        <label>Pendidikan</label>
                                        <input type="text" value="<?= $selectdetail2->pdkn ?> - <?= $selectdetail2->ket_pdkn ?>" class="form-control" disabled>
                                    </div>                                    
                                    <div class="form-group">
                                        <label>TPQ/Desa</label>
                                        <input type="text" value="<?= $selectdetail2->tpq_desa . ' - ' . $selectdetail2->nama_tpq . ' - ' . $selectdetail2->desa ?>" class="form-control" disabled>
                                    </div>		

                                    <div class="form-group">
                                        <label>Kontak</label>
                                        <input type="text" value="<?= $selectdetail2->kontak ?>" class="form-control" disabled>
                                    </div>
                                    <div class="form-group">
                                        <label>Alamat</label>
                                        <textarea rows="3" class="form-control" disabled><?= $selectdetail2->alamat ?></textarea>
                                    </div>      

                            </div>
                            </form>

                            <div class="tab-pane" id="foto">
                                <br>
                                <?php
                                if (empty($selectdetail2->foto_pgrs) OR ! file_exists($dirfoto . $selectdetail2->foto_pgrs)) {
                                    echo '<img src="../images/foto_pgrs/noimg.jpg" class="img-responsive img-thumbnail" style="width:300px; height:300px;">';
                                } else {
                                    echo '
                                <img src="../images/foto_pgrs/' . $selectdetail2->foto_pgrs . '" class="img-responsive img-thumbnail" style="width:300px; height:300px;">';
                                }
                                ?>
                            </div>
                        </div>
                    </div>
                    <br> <div class="panel-footer">                        
                        <a href="data-pgrs-ppg.php?lihat-pgrs-ppg" class="btn btn-warning btn-md"><span class="fa fa-angle-left" aria-hidden="true" title="kembali"></span> Kembali</a>
                        <a href="?edit=<?= $selectdetail2->id_pgrs; ?>" class="btn btn-info"><span class="fa fa-pencil" aria-hidden="true" title="Ubah"></span> Ubah</a>
                        <a href="data-pgrs-ppg.php?hapus=<?= $selectdetail2->id_pgrs; ?>" onclick="return confirm('Yakin menghapus data ini?')" class="btn btn-danger"><span class="glyphicon glyphicon-trash" aria-hidden="true" title="Hapus"></span> Hapus</a>


                    </div>
                </div>
            </div>                
            <?php
            //edit//
        }
    }
    if (isset($_GET['edit'])) {

        require_once "../db/database.php";
        $skripedit = "SELECT * FROM data_pgrs_ppg pgrs join data_tpq tpq on pgrs.tpq_desa= tpq.id_tpq join data_bidang_ppg bid on pgrs.id_bid = bid.id_bid where pgrs.id_pgrs ='" . $_GET['edit'] . "' ";
        $selectedit = mysql_query($skripedit) or die(mysql_error());
        $selectedit2 = mysql_fetch_object($selectedit);
        if ($selectedit2 == false) {
            echo "Data tidak ditemukan";
            ?>
            </div>
            <div class="panel-footer">
                <a href="data-pgrs-ppg.php?lihat-pgrs-ppg" class="btn btn-warning btn-md"><span class="fa fa-angle-left" aria-hidden="true" title="kembali"></span> Kembali</a>
            </div>
            <?php
        } else {
            ?>



            <ul id="tabs" class="nav nav-tabs" data-tabs="tabs">
                <li class="active"><a href="#detail_tpq" data-toggle="tab">Detail Pengurus</a></li>
                <li><a href="#foto" data-toggle="tab">Foto Pengurus</a></li>


            </ul>
            <div id="my-tab-content" class="tab-content">
                <div class="tab-pane active" id="detail_tpq">
                    <br>
                    <form method="post" enctype="multipart/form-data" >                        
                        <input type="hidden" value="<?= $selectedit2->id_pgrs ?> " name="tx_id">
                        <div class="form-group">
                            <label>Nama Pengurus</label>
                            <input type="text" class="form-control" value="<?= $selectedit2->nm_pgrs ?> " name="tx_nm">
                        </div>
                        <div class="form-group">
                            <label>Jenis Kelamin</label>
                            <div class="input-group-btn">
                                <select class="form-control input-md" name="jk_kl" >
                                    <option value=' <?= $selectedit2->j_klmn ?>' ><?= $selectedit2->j_klmn ?> </option>
                                    <option value="Pria">Pria</option>
                                    <option value="Wanita">Wanita</option>
                                </select>	
                            </div>
                        </div>
                        <div class="form-group">
                            <label>Tempat Lahir</label>
                            <input type="text" value="<?= $selectedit2->tmp_lhr ?> " class="form-control" name="tx_tmp_lhr" >
                        </div>
                        <div class="form-group">
                            <label>Tanggal Lahir</label>
                            <div class="input-group date form_date col-md-5" data-date="" data-date-format="dd/mm/yyyy" data-link-field="dtp_input2" data-link-format="yyyy-mm-dd">
                                <input class="form-control" size="10" value="<?= $selectedit2->tgl_lhr ?>" type="text" name="tx_tgl_lhr" >
                                <span class="input-group-addon"><span class="glyphicon glyphicon-calendar">
                                    </span></span>
                            </div>
                        </div>                       
                        <div class="form-group">
                            <label>Pendidikan</label>
                            <select name="tx_pdkn" class="form-control input-md">
                                <option value="<?= $selectedit2->pdkn ?> "><?= $selectedit2->pdkn ?> </option> 
                                <option>------</option>
                                <option value="SD">SD</option>
                                <option value="SMP">SMP</option>
                                <option value="SMA">SMA</option>
                                <option value="D3">D3</option>
                                <option value="S1">S1</option>
                                <option value="S2">S2</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Keterangan</label>
                            <input type="text" name="ket_pdkn" value="<?= $selectedit2->ket_pdkn ?>" class="form-control" placeholder="Keterangan Pendidikan" required>
                        </div> 
                        <div class="form-group">
                            <label>TPQ/Desa</label>
                            <select class="form-control input-md" name="tx_tpq" >

                                <option value='<?= $selectedit2->tpq_desa ?> '><?= $selectedit2->nama_tpq . ' - ' . $selectedit2->desa ?> </option>;
                                <option>------</option>
                                <?php
                                require_once "../db/database.php";
                                $select_kat = "SELECT * FROM `data_tpq`";
                                $query_kat = mysql_query($select_kat);
                                $numrowslihat_kat = mysql_num_rows($query_kat);
                                $x = 1;
                                if ($query_kat)
                                    while ($x <= $numrowslihat_kat) {
                                        while ($hsl_kat = mysql_fetch_object($query_kat)) {
                                            echo '<option value="' . $hsl_kat->id_tpq . '" >' . $hsl_kat->nama_tpq . ' - ' . $hsl_kat->desa . '</option>';
                                            $nmtpq = $hsl_kat->nama_tpq;
                                            $x++;
                                        }
                                    }
                                ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Pernikahan</label>
                            <select name="tx_nkh" class="form-control input-md" required>
                                <option value="<?= $selectedit2->pkw ?> "><?= $selectedit2->pkw ?> </option> 
                                <option>------</option>
                                <option value="Sudah Menikah">Sudah Menikah</option>
                                <option value="Belum Menikah">Belum Menikah</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Kontak</label>
                            <input type="text" value="<?= $selectedit2->kontak ?>" class="form-control" name="tx_kontak">
                        </div>

                        <div class="form-group">
                            <label>Alamat</label>
                            <textarea rows="3" class="form-control" name="alamat" ><?= $selectedit2->alamat ?></textarea>
                        </div> 

                        <div class="form-group">
                            <label>Bidang PPG</label>
                            <div class="input-group-btn">
                                <select class="form-control input-md" name="tx_bid">
                                    <option value="<?= $selectedit2->id_bid ?> "><?= $selectedit2->nama ?> </option> 
                                    <option>------</option>
                                    <?php
                                    require_once "../db/database.php";
                                    $select_kat = "SELECT * FROM `data_bidang_ppg`";
                                    $query_kat = mysql_query($select_kat);
                                    $numrowslihat_kat = mysql_num_rows($query_kat);
                                    while ($hsl_kat = mysql_fetch_object($query_kat)) {
                                        echo '<option value="' . $hsl_kat->id_bid . '" >' . $hsl_kat->nama . '</option>';
                                    }
                                    ?>

                                </select>
                            </div>
                        </div>   

                </div>

                <div class="tab-pane" id="foto">
                    <br>
                    <?php
                    if (empty($selectedit2->foto_pgrs) OR ! file_exists($dirfoto . $selectedit2->foto_pgrs)) {
                        echo '<img src="../images/foto_pgrs/noimg.jpg" class="img-responsive img-thumbnail" style="width:300px; height:300px;">';
                    } else {
                        echo '
                    <img src="../images/foto_pgrs/' . $selectedit2->foto_pgrs . '" class="img-responsive img-thumbnail" style="width:300px; height:300px;">';
                    }
                    ?>
                    <output id="gambar_nodin"></output>
                    <input type="hidden" name="oldfoto" value='<?= $selectedit2->foto_pgrs ?>'>
                    <input type="file" name="Filegambar" id="preview_gambar" class="btn btn-info" value=' . $selectedit2->foto_pgrs . '/>

                    <script>
                        function bacaGambar(input) {
                            if (input.files && input.files[0]) {
                                var reader = new FileReader();
                                reader.onload = function (e)
                                {
                                    $('#gambar_nodin').attr('src', e.target.result);
                                }
                                reader.readAsDataURL(input.files[0]);
                            }
                        }
                    </script>
                    <script>
                        $("#preview_gambar").change(function () {
                            bacaGambar(this);
                        });
                    </script> 
                </div>
            </div>



            </div>
            <div class="panel-footer">
                <a href="detail-pgrs-ppg.php?detail=<?= $_GET['edit'] ?>" class="btn btn-warning btn-md"><span class="fa fa-angle-left" aria-hidden="true" title="kembali"></span> Kembali</a>
                <button type="submit" name="btn_ubah" class="btn btn-success btn-md" ><i class="fa fa-save"></i>&nbsp;Simpan</button>
            </div>        
            </div>

            </form>		
            <?php
        }


        if (isset($_POST['btn_ubah'])) {
            $input = new stdClass();
            $input->id = antiinjection($_POST['tx_id']);
            $input->nm_p = antiinjection($_POST['tx_nm']);
            $input->klmn = antiinjection($_POST['jk_kl']);
            $input->tmp_lhr = antiinjection($_POST['tx_tmp_lhr']);
            $input->tgl_lhr = $_POST['tx_tgl_lhr'];
            $input->pdkn = antiinjection($_POST['tx_pdkn']);
            $input->ket_pdkn = antiinjection($_POST['ket_pdkn']);
            $input->tpq_desa = antiinjection($_POST['tx_tpq']);
            $input->pkw = antiinjection($_POST['tx_nkh']);
            $input->kontak = $_POST['tx_kontak'];
            $input->almt = mysql_escape_string($_POST['alamat']);
            $input->oldfoto = $_POST['oldfoto'];
            $input->id_bid = $_POST['tx_bid'];
            if (empty($_FILES['Filegambar']['tmp_name'])) {
                if (empty($input->oldfoto)) {
                    $input->foto = "";
                } else {
                    $input->foto = $input->oldfoto;
                }
            } else {
                $input->foto = $_FILES['Filegambar']['name'];
            }
            $input->ext_foto = end((explode(".", $input->foto)));
            $ext_foto = end((explode(".", $input->foto)));
            $string = preg_replace("/[^A-Za-z0-9 ]/", '', $input->id);
            $string = str_ireplace(" ", "_", $string);
            $input->foto = strtolower($string . "FOTO" . '.' . $ext_foto);
            require_once "../db/database.php";
//            echo '<pre>';
//            print_r($input);
//            echo '</pre>';
//            die();
            $isi = "Update data_pgrs_ppg set nm_pgrs ='" . $input->nm_p . "' , j_klmn='" . $input->klmn . "',tmp_lhr='" . $input->tmp_lhr . "', tgl_lhr='" . $input->tgl_lhr . "',pdkn='" . $input->pdkn . "', ket_pdkn='" . $input->ket_pdkn . "',tpq_desa='" . $input->tpq_desa . "', kontak='" . $input->kontak . "', alamat='" . $input->almt . "',foto_pgrs='" . $input->foto . "' , id_bid = '" . $input->id_bid . "' WHERE id_pgrs = '" . $input->id . "'";

            $sqltambah = mysql_query($isi) or die(mysql_error());

            if (!empty($_FILES['Filegambar']['tmp_name'])) {
                $dirfoto = "../images/foto_pgrs/";
                if (file_exists($dirfoto . $input->oldfoto)) {
                    unlink($dirfoto . $input->oldfoto);
                }
                $foto_data = $dirfoto . $input->foto;
                $foto_move = move_uploaded_file($_FILES['Filegambar']['tmp_name'], $foto_data);
            }            
            if ($sqltambah) {
                echo '<meta http-equiv="refresh" content="0;url=detail-pgrs-ppg.php?detail=' . $input->id . '">';
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