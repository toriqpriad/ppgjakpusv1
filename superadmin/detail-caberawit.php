<?php include 'cek_session.php'; ?>
<!doctype html>
<html lang="en">

    <head>
        <meta charset="utf-8">
        <title>Detail Caberawit</title>
        <?php include 'header_superadmin.php'; ?>
    </head>
    <?php include 'menu_superadmin.php'; ?>   
    <div class="main-content">
        <div class="panel panel-default">
            <div class="panel-heading">Detail Data</div>
            <div class="panel-body">
                 <style>
                    .img-preview{
                        width: 200px; 
                        height:200px;
                    }

                </style>
                <?php detail(); ?>             
            </div>
            <?php

            function detail() {
                $dirfoto = "../images/foto_cbr/";                
                require_once "../db/database.php";
                if(isset($_GET['detail'])) 
                {
                    $id = $_GET['detail'];
                }
                elseif(isset($_GET['edit'])) {
                    $id = $_GET['edit'];
                }
                $skripdetail = "SELECT * FROM data_caberawit inner join data_tpq on data_caberawit.tpq_desa=data_tpq.id_tpq where id_cbr='" . $id . "' ";
                $selectdetail = mysql_query($skripdetail);
                $result = mysql_fetch_object($selectdetail);
                if ($result == false) {
                ?>
                Data tidak ditemukan
                </div>
                <div class="panel-footer">
                <a href="data-caberawit.php" class="btn btn-warning btn-md"><span class="fa fa-angle-left" aria-hidden="true" title="kembali"></span> Kembali</a>
                </div>
                <?php
                } else {
                if (isset($_GET['detail'])) {
                ?>
                <div id="my-tab-content" class="tab-content">
                <ul id="tabs" class="nav nav-tabs" data-tabs="tabs">
                 <li class="active"><a href="#profil" data-toggle="tab">Profil Caberawit</a></li>
                 <li><a href="#foto" data-toggle="tab">Foto Caberawit</a></li>
                </ul>
                <div class="tab-pane active" id="profil">
                <br>                                    
                    <div class="form-group">
                        <label>Nama Caberawit</label>
                        <input type="text" class="form-control" name='tx_nm_cbr' value="<?=$result->nm_cbr?>" disabled>
                    </div>
                    <div class="form-group">
                        <label>Jenis Kelamin</label>
                        <select name="tx_jklmn" class="form-control input-md" disabled>                                                
                            <option value="P" <?php if($result->j_klmn == 'P' ) { echo 'selected'; }  ?> >Pria</option>
                            <option value="W" <?php if($result->j_klmn == 'W' ) { echo 'selected'; }  ?> >Wanita</option>
                        </select>
                    </div>
                
                    <div class="form-group">
                        <label>Tempat Lahir</label>
                        <input type="text" name="tx_tmp_lhr" class="form-control"  disabled value="<?=$result->tmp_lhr?>">
                    </div>
                    
                    <div class="form-group">
                        <label>Tanggal Lahir</label>
                        <input class="form-control single-date-picker" size="10" name="tx_tgl_lhr" type="text" value="<?=$result->tgl_lhr?>" name="tgl_lhr" disabled >
                    </div>
                    
                    <div class="form-group">
                        <label>Pendidikan</label>
                        <input type="text" name="tx_tmp_lhr" class="form-control"  disabled value="<?=$result->pdkn?> - kelas <?=$result->kls?> - di <?=$result->nm_sklh?>" >
                    </div>                     
                                   
                    <div class="form-group">
                        <label>Hobi</label>
                        <input type="text" name="tx_hobi" class="form-control"  value="<?=$result->hobi?>" disabled>
                    </div>
                    
                    <div class="form-group">
                       <label>TPQ </label>                       
                       <input type="text" name="tpq" class="form-control" value="<?=$result->nama_tpq.' - '.$result->desa?>" disabled>
                    </div>
                    
                    <div class="form-group">
                        <label>Orang Tua</label>
                        <input type="text" name="bapak" class="form-control"  value="<?=$result->bapak?><?php if($result->bapak != "" && $result->ibu != "") { echo ' & ';}?><?=$result->ibu?>" disabled>
                    </div>                                   
                                    
                    <div class="form-group">
                        <label>Kontak</label>
                        <input type="text" name="tx_kontak" class="form-control" value="<?=$result->kontak_cbr?>" disabled >
                    </div>

                    <div class="form-group">
                        <label>Alamat</label>
                        <textarea disabled rows="3" class="form-control" name="tx_alamat"><?=$result->alamat_cbr?></textarea>
                    </div>
                    </div>                            
                    
                    <div class="tab-pane" id="foto">
                        <br>
                        <img src="<?php
                                if (($result->foto_cbr != "") AND ( file_exists($dirfoto . $result->foto_cbr))) {
                                    echo $dirfoto . $result->foto_cbr;
                                } else {
                                    echo $dirfoto . 'no_img.jpg';
                                }
                                ?>"  class="img img-preview img-responsive img-thumbnail" id="gambar_nodin1">
                    </div>                        
                    </div>	
                    </div>                
                <div class="panel-footer">
                    <a href="data-caberawit.php" class="btn btn-warning btn-md"><span class="fa fa-angle-left" aria-hidden="true" title="kembali"></span> Kembali</a>
                    <a href="?edit=<?= $result->id_cbr; ?>" class="btn btn-info"><span class="glyphicon glyphicon-pencil" aria-hidden="true" title="Ubah"></span> Ubah</a>
                    <a href="data-caberawit.php.php?hapus=<?= $result->id_cbr; ?>" onclick="return confirm('Yakin menghapus data ini?')" class="btn btn-danger"><span class="glyphicon glyphicon-trash" aria-hidden="true" title="Hapus"></span> Hapus</a>            
                </div>  
                <?php
                }                    
            elseif (isset($_GET['edit'])) {
                ?>
                <div id="my-tab-content" class="tab-content">
                <ul id="tabs" class="nav nav-tabs" data-tabs="tabs">
                 <li class="active"><a href="#profil" data-toggle="tab">Profil Caberawit</a></li>
                 <li><a href="#foto" data-toggle="tab">Foto Caberawit</a></li>
                </ul>
                <div class="tab-pane active" id="profil">
                    <br>
                    <div id="danger" class="alert alert-danger alert-dismissable" style="display:none"><span id="error_message"></span><button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button></div>
                    <div id="success" class="alert alert-success alert-dismissable" style="display:none"><span id="success_message"></span><button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button></div>
                                <form  method="post" enctype="multipart/form-data">                                    
                                    <div class="form-group">
                                        <label>Nama Caberawit</label>
                                        <input type="text" class="form-control" name='tx_nm_cbr' placeholder="Nama" value="<?php if(isset($_POST['tx_nm_cbr'])) { echo $_POST['tx_nm_cbr'];} else { echo $result->nm_cbr; }?>" required>
                                        <input type="hidden" class="form-control" name='tx_id' value="<?=$result->id_cbr;?>">
                                    </div>
                                    <div class="form-group">
                                        <label>Jenis Kelamin</label>
                                        <select name="tx_jklmn" class="form-control input-md" required>                                                
                                                <option value="P" <?php if(isset($_POST['tx_jklmn'])){ if($_POST['tx_jklmn'] == 'P' ) { echo 'selected'; } } else {if($result->j_klmn == "P") { echo 'selected';}}?> >Pria</option>
                                                <option value="W" <?php if(isset($_POST['tx_jklmn'])){ if($_POST['tx_jklmn'] == 'W' ) { echo 'selected'; } } else {if($result->j_klmn == "W") { echo 'selected';}}?> >Wanita</option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label>Tempat Lahir</label>
                                        <input type="text" name="tx_tmp_lhr" class="form-control" placeholder="Tempat Lahir" required value="<?php if(isset($_POST['tx_tmp_lhr'])) { echo $_POST['tx_tmp_lhr'];} else { echo $result->tmp_lhr; }?>">
                                    </div>
                                    <div class="form-group">
                                        <label>Tanggal Lahir</label>
                                                
                                                <input class="form-control single-date-picker" size="10" name="tx_tgl_lhr" type="text" value="<?php
                                                if (isset($_POST['tgl_lhr'])) {
                                                    echo $_POST['tgl_lhr'];
                                                } else {
                                                    echo $result->tgl_lhr;
                                                }
                                                ?>" name="tgl_lhr" required placeholder="dd/mm/yyy">

                                    </div>
                                    <div class="form-group">
                                        <label>Pendidikan</label>
                                        <div class='row'>
                                        <div class='col-lg-2'>
                                            <div class="form-group">
                                            <div class="radio">
                                                <label>
                                                <input type="radio" name="tx_pdkn" value="TK" <?php if(isset($_POST['tx_pdkn'])) { if($_POST['tx_pdkn'] == "TK") { echo "checked";}} else {if($result->pdkn == "TK") { echo "checked";}}?> id='radioTK'> TK                                        
                                                </label>
                                            </div>
                                            </div>
                                            <div class="form-group">
                                            <div class="radio">
                                                <label>
                                                <input type="radio" name="tx_pdkn" value="SD" <?php if(isset($_POST['tx_pdkn'])) { if($_POST['tx_pdkn'] == "SD") { echo "checked";}} else {if($result->pdkn == "SD") { echo "checked";}}?> id = 'radioSD'> SD
                                                </label>
                                            </div>                  
                                            </div>
                                        </div>
                                        <div class='col-lg-10'>
                                            <div class="form-group">
                                            <select name="tx_kls" class="form-control input-md" id="klsTk">
                                                <option value="0 Kecil" <?php if(isset($_POST['tx_kls'])){ if($_POST['tx_kls'] == "0 Kecil") { echo 'selected';}}else { if($result->kls == "0 Kecil"){ echo "selected";} } ?> >0 Kecil</option>
                                                <option value="0 Besar" <?php if(isset($_POST['tx_kls'])){ if($_POST['tx_kls'] == "0 Besar") { echo 'selected';}}else { if($result->kls == "0 Besar"){ echo "selected";} } ?> >0 Besar</option>                                            
                                            </select>
                                            <select name="tx_kls" class="form-control input-md" id="klsSd">
                                                <?php for($i = 1;$i < 7;$i++){ if(isset($_POST['tx_kls'])) { if($_POST['tx_kls'] == $i) { echo "<option value='$i' selected>$i</option>"; } } elseif($result->kls == $i){ echo "<option value='$i' selected>$i</option>"; } else { echo "<option value='$i'>$i</option>";} } ?>                                            
                                            </select>                                        
                                            </div>
                                            <div class="form-group">
                                            <input type="text" name="tx_nm_sklh" class="form-control" placeholder="Nama Sekolah" value="<?php if(isset($_POST['tx_nm_sklh'])) { echo $_POST['tx_nm_sklh'];} else { echo $result->nm_sklh; }?>">
                                            </div>
                                        </div>
                                        </div>
                                    </div>
                                    <script>
                                        $(document).ready(function(){
                                            $("#klsTk").hide();
                                            $("#klsSd").show();
                                            $('input[type="radio"]').click(function(){
                                                if($(this).attr("value")=="TK"){                                                    
                                                        $("#klsTk").show();
                                                        $("#klsSd").hide();                                                    
                                                }
                                                if($(this).attr("value")=="SD"){                                                    
                                                        $("#klsTk").hide();
                                                        $("#klsSd").show();                                                    
                                                }
                                            });
                                          if($('#radioTK').attr("checked")){
                                              $("#klsTk").show();
                                              $("#klsSd").hide();                                                                                                  
                                          };  
                                          if($('#radioSD').attr("checked")){
                                              $("#klsTk").hide();
                                              $("#klsSd").show();                                                                                                  
                                          };  
                                    });
                                    </script>                                        
                                    
                                    <div class="form-group">
                                        <label>Hobi</label>
                                        <input type="text" name="tx_hobi" class="form-control" placeholder="Hobi Caberawit" value="<?php if(isset($_POST['tx_hobi'])) { echo $_POST['tx_hobi'];} else { echo $result->hobi; }?>">
                                    </div>
                                    <div class="form-group">
                                            <label>TPQ </label>
                                            <div class="input-group-btn">
                                                <select class="form-control input-md" name="tx_tpq" required>
                                                    <?php
                                                    require_once "../db/database.php";
                                                    $select_kat = "SELECT id_tpq,nama_tpq FROM `data_tpq`";
                                                    $query_kat = mysql_query($select_kat);
                                                    $numrowslihat_kat = mysql_num_rows($query_kat);
                                                    echo $numrowslihat_kat;
                                                    $x = 1;
                                                    while ($hsl_kat = mysql_fetch_object($query_kat)) {
                                                    ?>    
                                                        <option value=<?=$hsl_kat->id_tpq?> <?php if(isset($_POST['tx_tpq'])) { if($_POST['tx_tpq'] == $hsl_kat->id_tpq ) { echo "selected";}} elseif($result->tpq_desa == $hsl_kat->id_tpq) { echo "selected"; }?> ><?=$hsl_kat->nama_tpq?></option>
                                                    <?php                                                    
                                                    $x++;
                                                    }s                                                        
                                                    ?>
                                                </select>
                                            </div>
                                        </div>
                                    <div class="form-group">
                                        <label>Orang Tua</label>
                                        <input type="text" name="bapak" class="form-control" placeholder="Nama Ayah" value="<?php if(isset($_POST['bapak'])) { echo $_POST['bapak'];} else { echo $result->bapak; }?>" >
                                    </div>
                                    <div class="form-group">
                                        <input type="text" name="ibu" class="form-control" placeholder="Nama Ibu" value="<?php if(isset($_POST['ibu'])) { echo $_POST['ibu'];} else { echo $result->ibu; }?>" >
                                    </div>

                                    <div class="form-group">
                                        <label>Kontak</label>
                                        <input type="text" name="tx_kontak" class="form-control" value="<?php if(isset($_POST['tx_kontak'])) { echo $_POST['tx_kontak'];} else { echo $result->kontak; }?>" >
                                    </div>

                                    <div class="form-group">
                                        <label>Alamat</label>
                                        <textarea rows="3" class="form-control" name="tx_alamat"><?php if(isset($_POST['tx_alamat'])) { echo $_POST['tx_alamat'];} else { echo $result->alamat; }?></textarea>
                                    </div>
                            </div>
                            
                            <div class="tab-pane" id="foto">
                                <br>
                                <img src="<?php
                                if (($result->foto_cbr != "") AND ( file_exists($dirfoto . $result->foto_cbr))) {
                                    echo $dirfoto . $result->foto_cbr;
                                } else {
                                    echo $dirfoto . 'no_img.jpg';
                                }
                                ?>"  class="img img-preview img-responsive img-thumbnail" id="gambar_nodin1">
                                <br>
                                    <input type="file" name="img_1" id="preview_gambar1" class="btn btn-default btn-xs"/>                                    
                                    <input type="hidden" name="old_img_1" value="<?= $result->foto_cbr ?>"/>
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
                    <a href="?detail=<?=$result->id_cbr;?>" class="btn btn-warning btn-md"><span class="fa fa-angle-left" aria-hidden="true" title="kembali"></span> Kembali</a>
                    <button type="submit" name="simpan" class="btn btn-success btn-md"><i class="fa fa-save"></i>&nbsp;Simpan</button>
                    </form>
                </div>                                    
                <?php    
                 if (isset($_POST['simpan'])) {
                $input = new stdClass();
                $input->id = antiinjection($_POST['tx_id']);
                $input->nm = antiinjection($_POST['tx_nm_cbr']);
                $input->klmn = antiinjection($_POST['tx_jklmn']);
                $input->tmp_lhr = antiinjection($_POST['tx_tmp_lhr']);
                $input->tgl_lhr = antiinjection($_POST['tx_tgl_lhr']);
                $input->pdkn = antiinjection($_POST['tx_pdkn']);
                $input->kls = antiinjection($_POST['tx_kls']);
                $input->sklh = antiinjection($_POST['tx_nm_sklh']);
                $input->kls = antiinjection($_POST['tx_kls']);
                $input->hobi = antiinjection($_POST['tx_hobi']);
                $input->tpq_desa = antiinjection($_POST['tx_tpq']);
                $input->bapak = antiinjection($_POST['bapak']);
                $input->ibu = antiinjection($_POST['ibu']);
                $input->kontak = antiinjection($_POST['tx_kontak']);
                $input->almt = mysql_escape_string($_POST['tx_alamat']);
                
                require_once "../db/database.php";                                            
                $files_name = $_FILES['img_1']['name'];
                $files_size = $_FILES['img_1']['size'];
                $files_ext = $_FILES['img_1']['type'];
                $files_tmp = $_FILES['img_1']['tmp_name'];
                $old_files = $_POST['old_img_1']; 
                $errors = "Terjadi kesalahan : ";            
                $image_file_type = array('image/gif', 'image/png', 'image/jpg','image/jpeg', '');                
                if ($files_tmp != "") {
                            if (!in_array($files_ext, $image_file_type)) {
                                $alert = TRUE;
                                $error_ext = "Ekstensi gambar tidak sesuai dengan yang ditentukan (jpg,png,jpg). ";
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
                $input->isi = "Update data_caberawit set id_cbr='" . $input->id . "' , nm_cbr='" . $input->nm . "' , j_klmn='" . $input->klmn . "',tmp_lhr='" . $input->tmp_lhr . "', tgl_lhr='" . $input->tgl_lhr . "',pdkn='" . $input->pdkn . "', kls='" . $input->kls . "',nm_sklh='" . $input->sklh . "',hobi='" . $input->hobi . "', tpq_desa='" . $input->tpq_desa . "', bapak='" . $input->bapak . "',bapak='" . $input->ibu . "', kontak_cbr='" . $input->kontak . "', alamat_cbr='" . $input->almt . "',foto_cbr='" . $input->name_foto . "'  WHERE id_cbr = '" . $input->id . "'";;                        
                
              
                $sqltambah = mysql_query($input->isi) or die(mysql_error());
//                echo $input->isi;exit();
                function upload_foto($old_files,$foto_name, $tmp_name, $foto_dir) {
                    $datafoto = $foto_dir . basename($foto_name);                    
                    if($old_files != "" and file_exists($foto_dir.$old_files)) {
                        $deleteold = unlink($foto_dir . $old_files);
                    }
                    $movefoto = move_uploaded_file($tmp_name, $datafoto);
                }
                
                $dirfoto = "../images/foto_cbr/";
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
                </script>                
                <?php
                }
            
            }                 

        }
    }
}
?>
</body></html>		