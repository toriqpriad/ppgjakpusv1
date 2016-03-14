<?php include 'cek_session.php'; ?>
<!doctype html>
<html lang="en">

    <head>
        <meta charset="utf-8">
        <title>Detail Pengajar</title>
        <meta content="IE=edge,chrome=1" http-equiv="X-UA-Compatible">   
        <?php
        include 'header_superadmin.php';
        include 'menu_superadmin.php';
        ?>
    <div class="main-content">
        <div class="panel panel-default">
            <div class="panel-heading">Detail Data</div>
            <div class="panel-body"><?php detail(); ?>
        </div>

        <?php

        function detail() {
            if (isset($_GET['detail'])) {
                require_once "../db/database.php";
                //$selectdetail = mysql_query("SELECT * FROM data_pengajar where id_peng = '".$_GET['detail']."' ") or die(mysql_error());
                $skripdetail = "SELECT * FROM data_pengajar inner join data_tpq on data_pengajar.tpq_desa=data_tpq.id_tpq where id_peng='" . $_GET['detail'] . "' ";
                $selectdetail = mysql_query($skripdetail);
                $selectdetail2 = mysql_fetch_object($selectdetail);
                if ($selectdetail2 == false) {
                    echo "Data tidak ditemukan";
                } else {
                    $getimg = $selectdetail2->foto_peng;
                    $dirfoto = "../images/foto_pengajar/";
                    echo '
                    <ul id="tabs" class="nav nav-tabs" data-tabs="tabs">
                    <li class="active"><a href="#detail_tpq" data-toggle="tab">Detail Pengajar</a></li>
                    <li><a href="#foto" data-toggle="tab">Foto Pengajar</a></li>		
                    </ul>
                    <div id="my-tab-content" class="tab-content">
                    <div class="tab-pane active" id="detail_tpq">
                    <br>
                    <form id="tab">
                    <div class="form-group">
                    <label>ID Pengajar</label>
                    <input type="text" value=' . $selectdetail2->id_peng . ' class="form-control" disabled>
                    </div>
                    <div class="form-group">
                    <label>Nama Pengajar</label>
                    <input type="text" class="form-control" value="' . $selectdetail2->nm_peng . '" disabled>
                    </div>
                    <div class="form-group">
                    <label>Jenis Kelamin</label>
                    <input type="text" class="form-control" value="' . $selectdetail2->j_klmn . '" disabled>
                    </div>
                    <div class="form-group">
                    <label>Tempat Lahir</label>
                    <input type="text" value="' . $selectdetail2->tmp_lhr . '" class="form-control" disabled>
                    </div>
                    <div class="form-group">
                    <label>Tanggal Lahir</label>
                    <input type="text" value="' . $selectdetail2->tgl_lhr . '" class="form-control" disabled>
                    </div>
                    <div class="form-group">
                    <label>Pendidikan</label>
                    <input type="text" value="' . $selectdetail2->pdkn . '" class="form-control" disabled>
                    </div>
                    <div class="form-group">
                    <input type="text" value="' . $selectdetail2->ket_pdkn . '" class="form-control" disabled>
                    </div>
                    <div class="form-group">
                    <label>Status</label>
                    <input type="text" value="' . $selectdetail2->status . '" class="form-control" disabled>
                    </div>		
                    <div class="form-group">
                    <label>Pernikahan</label>
                    <input type="text" value="' . $selectdetail2->pkw . '" class="form-control" disabled>
                    </div>
		
                    <div class="form-group">
                    <label>TPQ/Desa</label>
                    <input type="text" value="' . $selectdetail2->tpq_desa . ' - ' . $selectdetail2->nama_tpq . ' - ' . $selectdetail2->desa . ' " class="form-control" disabled>
                    </div>
		
                    <div class="form-group">
                    <label>Kelas Ajar</label>
                    <input type="text" value="' . $selectdetail2->kelas_ajar . '" class="form-control" disabled>
                    </div>
                    <div class="form-group">
                    <label>Kontak</label>
                    <input type="text" value="' . $selectdetail2->kontak_peng . '" class="form-control" disabled>
                    </div>
                    <div class="form-group">
                    <label>Alamat</label>
                    <textarea rows="3" class="form-control" disabled>' . $selectdetail2->alamat_peng . '</textarea>
                    </div>      
        
                    </div>
                    </form>
                
                     <div class="tab-pane" id="foto">
                     <br>';
                    if (empty($getimg) OR ! file_exists($dirfoto . $getimg)) {
                        echo '<img src="../images/foto_pengajar/noimg.jpg" class="img img-preview img-responsive img-thumbnail " >';
                    } else {
                        echo '
                            <img src="../images/foto_pengajar/' . $selectdetail2->foto_peng . '" class="img img-preview img-responsive img-thumbnail" >';
                    }                    
                    echo '</div>';
                    ?>    
                </div>
            </div>
            <div class="panel-footer">
                <a href="data-pengajar.php?lihat-pengajar" class="btn btn-warning btn-md"><span class="fa fa-angle-left" aria-hidden="true" title="kembali"></span> Kembali</a>
                <a href="?edit=<?= $selectdetail2->id_peng; ?>" class="btn btn-info"><span class="glyphicon glyphicon-pencil" aria-hidden="true" title="Ubah"></span> Ubah</a>
                <a href="data-pengajar.php?hapus=<?= $selectdetail2->id_peng; ?>" onclick="return confirm('Yakin menghapus data ini?')" class="btn btn-danger"><span class="glyphicon glyphicon-trash" aria-hidden="true" title="Hapus"></span> Hapus</a>
            </div>



            <?php
        }
    }

    //edit//
    if (isset($_GET['edit'])) {
        require_once "../db/database.php";
        $idedit = $_GET['edit'];
        $skripedit = "SELECT * FROM data_pengajar inner join data_tpq on data_pengajar.tpq_desa=data_tpq.id_tpq where id_peng='" . $_GET['edit'] . "' ";
        $selectedit = mysql_query($skripedit) or die(mysql_error());
        $selectedit2 = mysql_fetch_object($selectedit);
        if ($selectedit2 == false) {
            echo "Data tidak ditemukan";
        } else {
            $dirfoto = "../images/foto_pengajar/";
            ?>	
            <ul id="tabs" class="nav nav-tabs" data-tabs="tabs">
            <li class="active"><a href="#profil" data-toggle="tab">Profil Pengajar</a></li>
            <li><a href="#foto" data-toggle="tab">Foto Pengajar</a></li>
            </ul>
                        <div id="my-tab-content" class="tab-content">
                            <div class="tab-pane active" id="profil">
                                <br>
                                <div id="danger" class="alert alert-danger alert-dismissable" style="display:none"><span id="error_message"></span><button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button></div>
                                <div id="success" class="alert alert-success alert-dismissable" style="display:none"><span id="success_message"></span><button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button></div>
                                <div class="form-group">
                                    <form  method="post" enctype="multipart/form-data">
                                        
                                        <input type="hidden" name="tx_id_peng"  class="form-control" value="<?php if(isset($_POST['tx_id_peng'])){ echo $_POST['tx_id_peng'];} else { echo $selectedit2->id_peng; } ?>" required>
                                        
                                        <div class="form-group">
                                            <label>Nama Pengajar</label>
                                            <input type="text" class="form-control" name='tx_nm_peng' required value="<?php if(isset($_POST['tx_nm_peng'])){ echo $_POST['tx_nm_peng'];} else { echo $selectedit2->nm_peng;}?>">
                                        </div>
                                        <div class="form-group">
                                            <label>Jenis Kelamin</label>
                                            <select name="tx_jklmn" class="form-control input-md" required>                                                
                                                <option value="P" <?php if(isset($_POST['tx_jklmn'])){ if($_POST['tx_jklmn'] == 'P' ) { echo 'selected'; } } else { if($selectedit2->j_klmn == 'P'){ echo 'selected';}} ?> >Pria</option>
                                                <option value="W" <?php if(isset($_POST['tx_jklmn'])){ if($_POST['tx_jklmn'] == 'W' ) { echo 'selected'; } } else { if($selectedit2->j_klmn == 'W'){ echo 'selected';}} ?> >Wanita</option>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label>Tempat Lahir</label>
                                            <input type="text" name="tx_tmp_lhr" class="form-control" required value="<?php if(isset($_POST['tx_tmp_lhr'])){ echo $_POST['tx_tmp_lhr'];} else { echo $selectedit2->tmp_lhr;}?>">
                                        </div>
                                        <div class="form-group">
                                            <label>Tanggal Lahir</label>
                                                
                                                <input class="form-control single-date-picker" size="10" name="tx_tgl_lhr" type="text" value="<?php if (isset($_POST['tgl_lhr'])) { echo $_POST['tgl_lhr']; } else { echo $selectedit2->tgl_lhr ; } ?>" name="tgl_lhr" required placeholder="dd/mm/yyy">

                                        </div>
                                        <div class="form-group">
                                            <label>Pendidikan Akhir</label>
                                            <select name="tx_pdkn" class="form-control input-md">
                                                <option value="SD" <?php if(isset($_POST['tx_pdkn'])) { if($_POST['tx_pdkn'] == "SD") { echo "selected";}} else { if($selectedit2->pdkn == "SD") { echo "selected";}}?>>SD</option>
                                                <option value="SMP" <?php if(isset($_POST['tx_pdkn'])) { if($_POST['tx_pdkn'] == "SMP") { echo "selected";}}else { if($selectedit2->pdkn == "SMP") { echo "selected";}} ?> >SMP</option>
                                                <option value="SMA" <?php if(isset($_POST['tx_pdkn'])) { if($_POST['tx_pdkn'] == "SMA") { echo "selected";}} else { if($selectedit2->pdkn == "SMA") { echo "selected";}} ?>>SMA</option>
                                                <option value="D3" <?php if(isset($_POST['tx_pdkn'])) { if($_POST['tx_pdkn'] == "D3") { echo "selected";}} else { if($selectedit2->pdkn == "D3") { echo "selected";}}?>>D3</option>
                                                <option value="S1" <?php if(isset($_POST['tx_pdkn'])) { if($_POST['tx_pdkn'] == "S1") { echo "selected";}}else { if($selectedit2->pdkn == "S1") { echo "selected";}}?>>S1</option>
                                                <option value="S2" <?php if(isset($_POST['tx_pdkn'])) { if($_POST['tx_pdkn'] == "S2") { echo "selected";}}else { if($selectedit2->pdkn == "S2") { echo "selected";}}?>>S2</option>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <input type="text" name="tx_ket_pdkn" class="form-control" value="<?php if(isset($_POST['tx_ket_pdkn'])){ echo $_POST['tx_ket_pdkn'];} else { echo $selectedit2->ket_pdkn;}?>" placeholder="Nama Sekolah/Universitas(Fakultas)">
                                        </div>
                                        <div class="form-group">
                                            <label>Status</label>
                                            <select name="tx_status" class="form-control input-md" required>
                                                <option value="Pribumi" <?php if(isset($_POST['tx_status'])) { if($_POST['tx_status'] == "Pribumi") { echo "selected";}} else { if($selectedit2->status == "Pribumi") { echo "selected";}} ?>>Pribumi</option>
                                                <option value="MT" <?php if(isset($_POST['tx_status'])) { if($_POST['tx_status'] == "MT") { echo "selected";}} else { if($selectedit2->status == "MT") { echo "selected";}} ?>>Mubalegh Tugasan</option>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label>Pernikahan</label>
                                            <select name="tx_nkh" class="form-control input-md" required>
                                                <option value="Sudah Menikah" <?php if(isset($_POST['tx_nkh'])) { if($_POST['tx_nkh'] == "Sudah Menikah") { echo "selected";}} else { if($selectedit2->pkw == "Sudah Menikah") { echo "selected";}} ?>>Sudah Menikah</option>
                                                <option value="Belum Menikah" <?php if(isset($_POST['tx_nkh'])) { if($_POST['tx_nkh'] == "Belum Menikah") { echo "selected";}} else { if($selectedit2->pkw == "Belum Menikah") { echo "selected";}} ?>>Belum Menikah</option>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label>TPQ/Desa</label>
                                            <div class="input-group-btn">
                                                <select class="form-control input-md" name="tx_tpq" required>
                                                    <?php
                                                    require_once "../db/database.php";
                                                    $select_kat = "SELECT * FROM `data_tpq`";
                                                    $query_kat = mysql_query($select_kat);
                                                    $numrowslihat_kat = mysql_num_rows($query_kat);
                                                    echo $numrowslihat_kat;
                                                    $x = 1;
                                                    while ($hsl_kat = mysql_fetch_object($query_kat)) {
                                                    ?>    
                                                        <option value=<?=$hsl_kat->id_tpq?> <?php if(isset($_POST['tx_tpq'])) { if($_POST['tx_tpq'] == $hsl_kat->id_tpq ) { echo "selected";}} else { if($selectedit2->tpq_desa == $hsl_kat->id_tpq) { echo "selected";}} ?> ><?=$hsl_kat->nama_tpq?></option>
                                                    <?php                                                    
                                                    $x++;
                                                    }s                                                        
                                                    ?>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label>Kelas Ajar</label>
                                            <select name="tx_kls" class="form-control input-md">
                                                <option value="Caberawit" <?php if(isset($_POST['tx_kls'])) { if($_POST['tx_kls'] == "Caberawit") { echo "selected";}} else { if($selectedit2->kelas_ajar == "Caberawit") { echo "selected";}} ?> >Caberawit</option>
                                                <option value="Praremaja" <?php if(isset($_POST['tx_kls'])) { if($_POST['tx_kls'] == "Praremaja") { echo "selected";}} else { if($selectedit2->kelas_ajar == "Praremaja") { echo "selected";}}?>>Praremaja</option>
                                                <option value="Remaja" <?php if(isset($_POST['tx_kls'])) { if($_POST['tx_kls'] == "Remaja") { echo "selected";}} else { if($selectedit2->kelas_ajar == "Remaja") { echo "selected";}}?>>Remaja</option>
                                            </select>
                                        </div>

                                        <div class="form-group">
                                            <label>Kontak</label>
                                            <input type="number" name="tx_kontak" class="form-control" value="<?php if(isset($_POST['tx_kontak'])){ echo $_POST['tx_kontak'];} else { echo $selectedit2->kontak_peng ;}?>">
                                        </div>

                                        <div class="form-group">
                                            <label>Alamat</label>
                                            <textarea rows="3" class="form-control" name="tx_alamat"><?php if(isset($_POST['tx_alamat'])){ echo $_POST['tx_alamat'];} else { echo $selectedit2->kelas_ajar;}?></textarea>
                                        </div>
                                </div>

                                </div>
                                <div class="tab-pane" id="foto">
                                    <br>
                                    <img src="<?php if (($selectedit2->foto_peng != "") AND ( file_exists($dirfoto . $selectedit2->foto_peng))) { echo $dirfoto . $selectedit2->foto_peng;} else { echo $dirfoto . 'no_img.jpg';} ?>" class="img img-preview img-responsive img-thumbnail" id="gambar_nodin1">
                                    <br><br>
                                    <input type="hidden" name="old_img_1" value="<?= $selectedit2->foto_peng ?>"/>
                                    <input type="file" name="img_1" id="preview_gambar1" class="btn btn-default btn-xs"/>                                    
                                </div>
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
                                </script>
                            </div>	
                        </div>                    
            <div class="panel-footer">
                <a href="detail-pengajar.php?detail=<?= $idedit ?>" class="btn btn-warning btn-md"><span class="fa fa-angle-left" aria-hidden="true" title="kembali"></span> Kembali</a>
                <button type="submit" name="simpan" class="btn btn-success btn-md" ><i class="fa fa-save"></i>&nbsp;Simpan</button>
            </div>
            </form>                                   
            <?php
            if (isset($_POST['simpan'])) {
            $input = new stdClass();
            $input->id = $_POST['tx_id_peng'];
            $input->klmn = antiinjection($_POST['tx_jklmn']);
            $input->nm_p = antiinjection($_POST['tx_nm_peng']);
            $input->tmp_lhr = antiinjection($_POST['tx_tmp_lhr']);
            $input->tgl_lhr = antiinjection($_POST['tx_tgl_lhr']);
            $input->pdkn = antiinjection($_POST['tx_pdkn']);
            $input->pdkn_ket = antiinjection($_POST['tx_ket_pdkn']);
            $input->sts_p = antiinjection($_POST['tx_status']);
            $input->nkh_p = antiinjection($_POST['tx_nkh']);
            $input->tpq_desa = antiinjection($_POST['tx_tpq']);
            $input->kls = $_POST['tx_kls'];
            $input->kontak = antiinjection($_POST['tx_kontak']);
            $input->almt = mysql_escape_string($_POST['tx_alamat']);
            
            $files_name = $_FILES['img_1']['name'];
            $files_size = $_FILES['img_1']['size'];
            $files_ext = $_FILES['img_1']['type'];
            $files_tmp = $_FILES['img_1']['tmp_name'];
            $old_files = $_POST['old_img_1'];            
            $errors = "Terjadi kesalahan : ";            
            $image_file_type = array('image/gif', 'image/png', 'image/jpg', 'image/jpeg','');
            if ($files_tmp != "") {
                            if (!in_array($files_ext, $image_file_type)) {
                                $alert = TRUE;
                                $error_ext = "Ekstensi gambar tidak sesuai dengan yang ditentukan (jpg,png,jpg).";
                            } else {
                                $error_ext = "";
                            }
                            if ($files_size > 1000000) {
                                $alert = TRUE;
                                $error_size = "Ukuran gambar melebihi maksimal (1 MB). ";
                            } else {
                                $error_size = "";
                            }
                            if ($files_name != "") {
                                $nospacename = str_ireplace(" ", "_", $input->id);
                                $extension = end((explode("/", $files_ext)));
                                $foto_name = $nospacename . "-" . "foto"  . "." . $extension;
                            } else {
                                $foto_name = $old_files;
                            }
                        } else {
                            $foto_name = $old_files;
                        }    
                if (isset($alert)) {                            
                    if ($alert == TRUE) {
                        $error = '';
                        $error .= 'Terjadi kesalahan : ';
                        $error .= $error_ext . $error_size;
                        echo "<script>$('#danger').removeAttr('style')</script>";
                        echo "<script>$('#myModal').modal('show')</script>";
                        echo "<script> var error = '$error' ; $('#error_message').text(error);</script>";
                        die();
                    }
                }            
            $input->name_foto = $foto_name;
            
            require_once "../db/database.php";
            $input->isi = "Update data_pengajar set id_peng='" . $input->id . "' , j_klmn='" . $input->klmn . "',nm_peng='" . $input->nm_p . "' , tmp_lhr='" . $input->tmp_lhr . "', tgl_lhr='" . $input->tgl_lhr . "',pdkn='" . $input->pdkn . "', ket_pdkn='" . $input->pdkn_ket . "',status='" . $input->sts_p . "', pkw='" . $input->nkh_p . "', tpq_desa='" . $input->tpq_desa . "', kelas_ajar='" . $input->kls . "', kontak_peng='" . $input->kontak . "', alamat_peng='" . $input->almt . "',foto_peng='" . $input->name_foto . "'  WHERE id_peng = '" . $input->id . "'";
//            echo $input->isi;exit();
            $sqltambah = mysql_query($input->isi) or die(mysql_error());
            
            function upload_foto($old_files,$foto_name, $tmp_name, $foto_dir) {
                    $datafoto = $foto_dir . basename($foto_name);
                    if($old_files != "") {
                    $deleteold = unlink($foto_dir . $old_files);
                    }
                    $movefoto = move_uploaded_file($tmp_name, $datafoto);
            }
            $dirfoto = "../images/foto_pengajar/";
            if ($sqltambah == TRUE) {                    
                if($files_tmp != ""){
                    $upload_foto = upload_foto($old_files,$input->name_foto, $files_tmp, $dirfoto);
                }
            ?>
            
            <script type="text/javascript">
                $('#success').removeAttr("style");                
                $('#success_message').text("Data Berhasil Dimasukkan");                              
            </script>
            <meta http-equiv="refresh" content= "1"/>
            <?php
            } else {
            ?>
            <script type="text/javascript">
                $('#success').removeAttr("style");
                $('#success').removeClass("alert-success");
                $('#success').addClass("alert-danger");
                $('#success_message').text("Data Gagal Dimasukkan");        
                $('#table_export').ajax.reload();                
            </script>
                    <?php
            }                        
        }
       }
    }
  }
?>
             <style>
        .img-preview{
            width: 200px; 
            height:200px;
        }
            
        </style>
<footer>
    <hr>

    <!-- Purchase a site license to remove this link from the footer: http://www.portnine.com/bootstrap-themes -->

    <p>© 2015 <a href="http://www.portnine.com" target="_blank">PPG Jakarta Pusat</a></p>
</footer>
</body></html>		