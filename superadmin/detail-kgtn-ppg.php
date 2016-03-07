<?php include 'cek_session.php'; ?>
<!doctype html>
<html lang="en">

    <head>
        <meta charset="utf-8">
        <title>Detail Kegiatan PPG</title>
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
                                    left outer join data_bidang_ppg b on a.pelaksana_kgtn = b.id_bid 
                                    left outer join data_tpq c on a.pelaksana_kgtn = c.id_tpq 
                                    where a.id_kgtn = '" . $_GET['detail'] . "'";
                        //echo $skripdetail;
                        $selectdetail = mysql_query($skripdetail);
                        $selectdetail2 = mysql_fetch_object($selectdetail);
                        if ($selectdetail2 == false) {
                            echo "Data tidak ditemukan";
                            echo '
                            </div>
                            <div class="panel-footer">
                            <a href="data-kgtn-ppg.php?lihat-kegiatan" class="btn btn-warning btn-md"><span class="fa fa-angle-left" aria-hidden="true" title="kembali"></span> Kembali</a>
                                </div>
                        ';
                        } else {
                            if ($selectdetail2->nama == NULL) {
                                $pelaksana = 'TPQ ' . $selectdetail2->nama_tpq . '- Desa ' . $selectdetail2->desa;
                            } else {
                                $pelaksana = $selectdetail2->nama;
                            }
                            ?>       

                            <div class="form-group">
                                <label>Nama Kegiatan</label>
                                <input type="text" value="<?= $selectdetail2->nama_kgtn ?>" class="form-control" disabled>
                            </div>                                                                        
                            <div class="form-group">
                                <label>Pelaksana</label>
                                <input type="text" value="<?= $pelaksana ?>" class="form-control" disabled>
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
                            <a href="data-kgtn-ppg.php?lihat-kegiatan" class="btn btn-warning btn-md"><span class="fa fa-angle-left" aria-hidden="true" title="kembali"></span> Kembali</a>                            
                            <a href="?edit=<?= $selectdetail2->id_kgtn; ?>" class="btn btn-info"><span class="fa fa-pencil" aria-hidden="true" title="Ubah"></span> Ubah</a>                            
                            <a href="data-kgtn-ppg.php?hapus=<?= $selectdetail2->id_kgtn; ?>" onclick="return confirm('Yakin menghapus data ini?')" class="btn btn-danger"><span class="glyphicon glyphicon-trash" aria-hidden="true" title="Hapus"></span> Hapus</a>


                        </div>
                    </div>
                </div>   

                <?php
                //edit//
            }
        }
        if (isset($_GET['edit'])) {

            require_once "../db/database.php";
            $skripedit = "SELECT * FROM data_kegiatan a 
                                    left outer join data_bidang_ppg b on a.pelaksana_kgtn = b.id_bid 
                                    left outer join data_tpq c on a.pelaksana_kgtn = c.id_tpq 
                                    where a.id_kgtn = '" . $_GET['edit'] . "'";
            $selectedit = mysql_query($skripedit) or die(mysql_error());
            $selectedit2 = mysql_fetch_object($selectedit);
            if ($selectedit2 == false) {
                echo "Data tidak ditemukan";
                ?>
            </div>
            <div class="panel-footer">
                <a href="data-kgtn-ppg.php?lihat-kegiatan" class="btn btn-warning btn-md"><span class="fa fa-angle-left" aria-hidden="true" title="kembali"></span> Kembali</a>
            </div>
            <?php
        } else {
            if ($selectedit2->nama == NULL) {
                $pelaksana = 'TPQ ' . $selectedit2->nama_tpq . '- Desa ' . $selectedit2->desa;
            } else {
                $pelaksana = $selectedit2->nama;
            }
            ?>
            <form method="post" enctype="multipart/form-data" >                        
                <input type="hidden" value="<?= $selectedit2->id_kgtn ?> " name="id_kgtn">
                <div class="form-group">
                    <label>Nama Kegiatan</label>
                    <input type="text" value="<?= $selectedit2->nama_kgtn ?>" class="form-control" name="nama_kgtn">
                </div>                                                                                                                          
                <div class="form-group">
                    <label>Tanggal Kegiatan</label>

                    <input class="form-control single-date-picker" size="10" type="text" value="<?php
                    if (isset($_POST['tgl_kgtn'])) {
                        echo $_POST['tgl_kgtn'];
                    } else {
                        if (isset($selectedit2->tgl_kgtn)) {
                            echo $selectedit2->tgl_kgtn;
                        } else {
                            echo '';
                        }
                    }
                    ?>" name="tgl_kgtn" required placeholder="dd/mm/yyy" >                    
                </div>

                <div class="form-group">
                    <label>Pelaksana</label>
                    <?php if ($selectedit2->tipe_kgtn != "T") { ?>
                        <select name="pelaksana" class="form-control input-md">
                            <?php
                            $sql_pelaksana = mysql_query("select `id_bid`,`nama`,`tipe_bidang` from data_bidang_ppg");
                            while ($get_pelaksana = mysql_fetch_object($sql_pelaksana)) {
                                ?>
                                <option value="<?= $get_pelaksana->id_bid ?>-<?= $get_pelaksana->tipe_bidang ?>" <?php
                                if ($selectedit2->pelaksana_kgtn == $get_pelaksana->id_bid) {
                                    echo 'selected';
                                }
                                ?> > <?= $get_pelaksana->nama; ?></option>
                                        <?php
                                    }
                                    ?>
                        </select>
                    <?php } else { ?>
                        <select name="pelaksana" class="form-control input-md">
                            <?php
                            $sql_pelaksana = mysql_query("select `id_tpq`,`nama_tpq`,`desa` from data_tpq");
                            while ($get_pelaksana = mysql_fetch_object($sql_pelaksana)) {
                                ?>
                                <option value="<?= $get_pelaksana->id_tpq ?>-T" <?php
                                if ($selectedit2->pelaksana_kgtn == $get_pelaksana->id_tpq) {
                                    echo 'selected';
                                }
                                ?> > <?= $get_pelaksana->nama_tpq; ?> - <?= $get_pelaksana->desa ?></option>
                                        <?php
                                    }
                                    ?>
                        </select>
                    <?php } ?>
                </div>  
                <div class="form-group">
                    <label>Deskripsi Kegiatan</label>
                    <textarea rows="3" class="form-control" name="desk_kgtn"><?= $selectedit2->desk_kgtn ?></textarea>
                </div>      
                <div class="form-group">
                    <label>Foto Kegiatan</label>
                </div>
                <div class="form-group">
                    <div class="row">
                        <?php
                        if ($selectedit2->tipe_kgtn == "B" OR $selectedit2->tipe_kgtn == "P") {
                            $dirfoto = "../images/foto_kgtn/ppg/";
                        } else {
                            $dirfoto = "../images/foto_kgtn/tpq/";
                        }
                        ?>
                        <div class="col-md-4">
                            <div class="panel">
                                <div class="panel-heading">Foto 1 (Wajib)</div>
                                <div class="panel-body">
                                    <img src="<?php
                                    if (($selectedit2->foto_1 != "") AND ( file_exists($dirfoto . $selectedit2->foto_1))) {
                                        echo $dirfoto . $selectedit2->foto_1;
                                    } else {
                                        echo $dirfoto . 'no_img.jpg';
                                    }
                                    ?>"  class="img img-preview img-responsive img-thumbnail" id="gambar_nodin1">
                                    <input type="file" name="img_1" id="preview_gambar1" class="btn btn-default btn-xs"/>
                                    <input type="hidden" name="old_img_1" value="<?= $selectedit2->foto_1 ?>"/>
                                    <br>                                                                                        
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="panel">
                                <div class="panel-heading">Foto 2</div>
                                <div class="panel-body">
                                    <img src="<?php
                                    if (($selectedit2->foto_2 != "") AND ( file_exists($dirfoto . $selectedit2->foto_2))) {
                                        echo $dirfoto . $selectedit2->foto_2;
                                    } else {
                                        echo $dirfoto . 'no_img.jpg';
                                    }
                                    ?>" class="img img-preview img-responsive img-thumbnail" id="gambar_nodin2">
                                    <input type="file" name="img_2" id="preview_gambar2" class="btn btn-default btn-xs"/>
                                    <input type="hidden" name="old_img_2" value="<?= $selectedit2->foto_2 ?>"/>
                                    <br>                                                                                        
                                </div>
                            </div>                            
                        </div>
                        <div class="col-md-4">
                            <div class="panel">
                                <div class="panel-heading">Foto 3 </div>
                                <div class="panel-body">
                                    <img src="<?php
                                    if (($selectedit2->foto_3 != "") AND ( file_exists($dirfoto . $selectedit2->foto_3))) {
                                        echo $dirfoto . $selectedit2->foto_3;
                                    } else {
                                        echo $dirfoto . 'no_img.jpg';
                                    }
                                    ?>" class="img img-preview img-responsive img-thumbnail" id="gambar_nodin3">
                                    <input type="file" name="img_3" id="preview_gambar3" class="btn btn-default btn-xs"/>
                                    <input type="hidden" name="old_img_3" value="<?= $selectedit2->foto_3 ?>"/>
                                    <br>                                                                                      
                                </div>
                            </div>

                        </div>
                    </div>      
                </div>
            </div>
            <div class="panel-footer">            
                <a href="detail-kgtn-ppg.php?detail=<?= $_GET['edit'] ?>" class="btn btn-warning btn-md"><span class="fa fa-angle-left" aria-hidden="true" title="kembali"></span> Kembali</a>
                <button type="submit" name="btn_ubah" class="btn btn-success btn-md" ><i class="fa fa-save"></i>&nbsp;Simpan</button>
            </div>        
            </div>

            </form>
            <script>
                function bacaGambar(input) {
                    if (input.files && input.files[0]) {
                        var reader = new FileReader();
                        reader.onload = function (e)
                        {
                            $('#gambar_nodin1').attr('src', e.target.result);
                        }
                        reader.readAsDataURL(input.files[0]);
                    }
                }
                $("#preview_gambar1").change(function () {
                    bacaGambar(this);
                });
                
                function bacaGambar2(input) {
                    if (input.files && input.files[0]) {
                        var reader = new FileReader();
                        reader.onload = function (e)
                        {
                            $('#gambar_nodin2').attr('src', e.target.result);
                        }
                        reader.readAsDataURL(input.files[0]);
                    }
                }
                $("#preview_gambar2").change(function () {
                    bacaGambar2(this);
                });
                
                function bacaGambar3(input) {
                    if (input.files && input.files[0]) {
                        var reader = new FileReader();
                        reader.onload = function (e)
                        {
                            $('#gambar_nodin3').attr('src', e.target.result);
                        }
                        reader.readAsDataURL(input.files[0]);
                    }
                }
                $("#preview_gambar3").change(function () {
                    bacaGambar3(this);
                });
            </script>            
            <?php
        }


        if (isset($_POST['btn_ubah'])) {
            $input = new stdClass();
            $input->id = antiinjection($_POST['id_kgtn']);
            $input->nama_kgtn = antiinjection($_POST['nama_kgtn']);
            $input->tgl = antiinjection($_POST['tgl_kgtn']);
            $input->tipepelaksana = explode('-', $_POST['pelaksana']);
            $input->pelaksana = $input->tipepelaksana[0];
            $input->tipe_kgtn = $input->tipepelaksana[1];
            $input->desk = mysql_escape_string($_POST['desk_kgtn']);
            $old_files = array('', $_POST['old_img_1'], $_POST['old_img_2'], $_POST['old_img_3']);
//            print_r($old_files);
            $files_name = array('', $_FILES['img_1']['name'], $_FILES['img_2']['name'], $_FILES['img_3']['name']);
//            print_r($files_name);
            $files_size = array('', $_FILES['img_1']['size'], $_FILES['img_2']['size'], $_FILES['img_3']['size']);
//            print_r($files_size);
            $files_ext = array('', $_FILES['img_1']['type'], $_FILES['img_2']['type'], $_FILES['img_3']['type']);
//            print_r($files_ext);
            $files_tmp = array('', $_FILES['img_1']['tmp_name'], $_FILES['img_2']['tmp_name'], $_FILES['img_3']['tmp_name']);
//            print_r($files_tmp);
//            exit();
            $errors = "Terjadi kesalahan : ";
            $i = 1;
            $image_file_type = array('image/gif', 'image/png', 'image/jpg', 'image/jpeg', '');
            while ($i <= 3) {
                if ($old_files[$i] != "") {
                    if ($files_tmp[$i] != "") {
                        if ($files_size[1] == "") {
                            if ($old_files[1] == "") {
                                $alert = TRUE;
                                $foto1_kosong = "Foto pertama harus diunggah. ";
                            } else {
                                $foto1_kosong = "";
                            }
                        } else {
                            $foto1_kosong = "";
                        }
                        if (!in_array($files_ext[$i], $image_file_type)) {
                            $alert = TRUE;
                            $error_ext = "Ekstensi foto tidak sesuai dengan yang ditentukan (jpg,png,jpg). ";
                        } else {
                            $error_ext = "";
                        }
                        if ($files_size[$i] > 1000000) {
                            $alert = TRUE;
                            $error_size = "Ukuran foto melebihi ukuran yang ditentukan (1 MB). ";
                        } else {
                            $error_size = "";
                        }
                        if ($files_name[$i] != "") {
                            $nospacename = str_ireplace(" ", "_", $input->nama_kgtn);
                            $extension = end((explode("/", $files_ext[$i])));
                            $foto_name[] = $nospacename . "-" . $i . "." . $extension;
                        } else {
                            $foto_name[] = "";
                        }
                    } else {
                        $foto_name[] = $old_files[$i];
                    }
                } else {
                    if ($files_tmp[$i] != "") {
                        if ($files_size[1] == "") {
                            if ($old_files[1] == "") {
                                $alert = TRUE;
                                $foto1_kosong = "Foto pertama harus diunggah. ";
                            }
                        } else {
                            $foto1_kosong = "";
                        }   
                        if (!in_array($files_ext[$i], $image_file_type)) {
                            $alert = TRUE;
                            $error_ext = "Ekstensi foto tidak sesuai dengan yang ditentukan (jpg,png,jpg). ";
                        }
                        if ($files_size[$i] > 1000000) {
                            $alert = TRUE;
                            $error_size = "Ukuran foto melebihi ukuran yang ditentukan (1 MB). ";
                        }
                        if ($files_name[$i] != "") {
                            $nospacename = str_ireplace(" ", "_", $input->nama_kgtn);
                            $extension = end((explode("/", $files_ext[$i])));
                            $foto_name[] = $nospacename . "-" . $i . "." . $extension;
                        } else {
                            $foto_name[] = "";
                        }
                    } else {
                        $foto_name[] = $old_files[$i];
                    }
                }
                $i++;
            }
//            print_r($foto_name);
            if (isset($alert)) {
                if ($alert == TRUE) {
                    $error = '';
                    $error .= 'Terjadi kesalahan : ';
                    $error .= $foto1_kosong . $error_ext . $error_size;
                    echo "<script>$('#danger').removeAttr('style')</script>";
                    echo "<script>$('#myModal').modal('show')</script>";
                    echo "<script> var error = '$error' ; $('#error_message').text(error);</script>";
                    die();
                }
            }
            $input->foto_1 = $foto_name[0];
            $input->foto_2 = $foto_name[1];
            $input->foto_3 = $foto_name[2];
            require_once "../db/database.php";
            $input->update = "Update data_kegiatan set tipe_kgtn ='" . $input->tipe_kgtn . "' , nama_kgtn ='" . $input->nama_kgtn . "' , desk_kgtn='" . $input->desk . "',tgl_kgtn='" . $input->tgl . "', foto_1='" . $input->foto_1 . "',foto_2='" . $input->foto_2 . "' ,foto_3='" . $input->foto_3 . "', waktu_diubah = now() WHERE id_kgtn = '" . $input->id . "'";
//            echo '<pre>';
//            print_r($input);
//            echo '</pre>';
//            die();
            $sqltambah = mysql_query($input->update);
            if ($input->tipe_kgtn != "T") {
                $folderfoto = '../images/foto_kgtn/ppg/';
            } else {
                $folderfoto = '../images/foto_kgtn/tpq/';
            }

            function upload_foto($foto_name, $tmp_name, $foto_dir) {
                $datafoto = $foto_dir . basename($foto_name);
                $movefoto = move_uploaded_file($tmp_name, $datafoto);
            }

            if ($sqltambah == true) {
                $upload_foto_1 = upload_foto($input->foto_1, $files_tmp[1], $folderfoto);
                $upload_foto_2 = upload_foto($input->foto_2, $files_tmp[2], $folderfoto);
                $upload_foto_3 = upload_foto($input->foto_3, $files_tmp[3], $folderfoto);
                ?>
                <meta http-equiv="refresh" content= "0;URL=?detail=<?= $input->id; ?>"/>
                <script type="text/javascript">
                    $('#success').removeAttr("style");
                    $('#success_message').text("Data Berhasil Dimasukkan");
                </script>
                <?php
            }
            if ($sqltambah == false) {
                ?>
                <script type="text/javascript">
                    $('#success').removeAttr("style");
                    $('#success').removeClass("alert-success");
                    $('#success').addClass("alert-danger");
                    $('#success_message').text("Data Gagal Dimasukkan");
                </script>
                <?php
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

<style>
    .img-preview{
        width: 400px; 
        height:300px;
    }

</style>   
</body></html>		