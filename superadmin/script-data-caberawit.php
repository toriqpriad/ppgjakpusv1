<?php
require_once "../db/database.php";
$query2 = mysql_query("SELECT * FROM data_caberawit inner join data_tpq on data_tpq.id_tpq=data_caberawit.tpq_desa");
$numrowslihat = mysql_num_rows($query2);
?>	

<div class="panel panel-default">	
    <div class="panel-heading">Keseluruhan Data Caberawit </div>		
    <div class="panel-body">
        <div id="success" class="alert alert-success alert-dismissable" style="display:none"><span id="success_message"></span><button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button></div>
        <table class="display nowrap" cellspacing="0" width="100%" id="table_export">    
            <thead>
            <th>#</th>
            <th>ID</th>
            <th>Nama</th>
            <th>Jns Kelamin</th>            
            <th>Pendidikan</th>
            <th>TPQ/Desa</th>
            <th>Kontak</th>
            <th>Alamat</th>
            <th><center>Aksi</center></th>
            </tr>
            </thead>
            <tbody>            
                <?php
                $num = 1;
                while ($hsl = mysql_fetch_object($query2)) {
                    echo '<td >' . $num . '</td>';                    
                    if($hsl->j_klmn == "P") { $klmn = "Pria";} elseif($hsl->j_klmn == "W"){ $klmn = "Wanita";}
                    echo '									
					<td ><a href="detail-caberawit.php?detail=' . $hsl->id_cbr . '">' . $hsl->id_cbr . '</a></td>
					<td >' . $hsl->nm_cbr . '</td>
					<td >' . $klmn. '</td>					
					<td >' . $hsl->pdkn . ' - Kelas ' . $hsl->kls . ' di ' . $hsl->nm_sklh . ' </td>
					<td >' . $hsl->nama_tpq . ' - ' . $hsl->desa . '</td>
					<td >' . $hsl->kontak_cbr . '</td>
					<td >' . $hsl->alamat_cbr . '</td>';
                    ?>
                <th><center>
                    <a title="edit" href="detail-caberawit.php?edit=<?= $hsl->id_cbr; ?>" class="btn btn-default btn-sm"><span class="glyphicon glyphicon-edit" title="Ganti"></span></a>
                    <a title="hapus" href="?hapus=<?= $hsl->id_cbr; ?>" class="btn btn-default btn-sm" onclick='return confirm("Yakin menghapus data ini?")'><span class="glyphicon glyphicon-trash" title="Hapus"></span></a>
                </center>
                </th>


                </tr>					

                <?php
                $num++;
            }
            ?>
        </table></div>
    <div class="panel-footer">
        <div class="row">
            <div class="col-md-6"><a title="Tambah Data" data-toggle="modal" data-target="#myModal" class="btn btn-success"><span class="fa fa-plus"></span> Tambah Data</a></div>
        </div>
    </div>
    <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" data-backdrop="static">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="myModalLabel">Tambah Data</h4>
                </div>
                <div class="modal-body">
                    <div id="content">
                        <ul id="tabs" class="nav nav-tabs" data-tabs="tabs">
                            <li class="active"><a href="#profil" data-toggle="tab">Profil Caberawit</a></li>
                            <li><a href="#foto" data-toggle="tab">Foto Caberawit</a></li>
                        </ul>
                        <div id="my-tab-content" class="tab-content">
                            <div class="tab-pane active" id="profil">
                                <br>
                                <div id="danger" class="alert alert-danger alert-dismissable" style="display:none"><span id="error_message"></span><button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button></div>
                                <form  method="post" enctype="multipart/form-data">                                    
                                    <div class="form-group">
                                        <label>Nama Caberawit</label>
                                        <input type="text" class="form-control" name='tx_nm_cbr' placeholder="Nama" value="<?php if(isset($_POST['tx_nm_cbr'])) { echo $_POST['tx_nm_cbr'];} else { echo ''; }?>" required>
                                    </div>
                                    <div class="form-group">
                                        <label>Jenis Kelamin</label>
                                        <select name="tx_jklmn" class="form-control input-md" required>                                                
                                                <option value="P" <?php if(isset($_POST['tx_jklmn'])){ if($_POST['tx_jklmn'] == 'P' ) { echo 'selected'; } } ?> >Pria</option>
                                                <option value="W" <?php if(isset($_POST['tx_jklmn'])){ if($_POST['tx_jklmn'] == 'W' ) { echo 'selected'; } } ?> >Wanita</option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label>Tempat Lahir</label>
                                        <input type="text" name="tx_tmp_lhr" class="form-control" placeholder="Tempat Lahir" required value="<?php if(isset($_POST['tx_tmp_lhr'])) { echo $_POST['tx_tmp_lhr'];} else { echo ''; }?>">
                                    </div>
                                    <div class="form-group">
                                        <label>Tanggal Lahir</label>
                                                
                                                <input class="form-control single-date-picker" size="10" name="tx_tgl_lhr" type="text" value="<?php
                                                if (isset($_POST['tgl_lhr'])) {
                                                    echo $_POST['tgl_lhr'];
                                                } else {
                                                    echo '';
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
                                                <input type="radio" name="tx_pdkn" value="TK" <?php if(isset($_POST['tx_pdkn'])) { if($_POST['tx_pdkn'] == "TK") { echo "selected";}}?> > TK                                        
                                                </label>
                                            </div>
                                            </div>
                                            <div class="form-group">
                                            <div class="radio">
                                                <label>
                                                <input type="radio" name="tx_pdkn" value="SD" <?php if(isset($_POST['tx_pdkn'])) { if($_POST['tx_pdkn'] == "SD") { echo "selected";}}?> > SD
                                                </label>
                                            </div>                  
                                            </div>
                                        </div>
                                        <div class='col-lg-10'>
                                            <div class="form-group">
                                            <select name="tx_kls" class="form-control input-md" id="klsTk">
                                                <option value="0 Kecil">0 Kecil</option>
                                                <option value="0 Besar">0 Besar</option>                                            
                                            </select>
                                            <select name="tx_kls" class="form-control input-md" id="klsSd">
                                                <?php for($i = 1;$i < 7;$i++){ if(isset($_POST['tx_kls'])) { if($_POST['tx_kls'] == $i) { echo "<option value='{$i}' selected>{$i}</option>"; } } else { echo "<option value='{$i}'>{$i}</option>"; } } ?>                                            
                                            </select>                                        
                                            </div>
                                            <div class="form-group">
                                            <input type="text" name="tx_nm_sklh" class="form-control" placeholder="Nama Sekolah" value="<?php if(isset($_POST['tx_nm_sklh'])) { echo $_POST['tx_nm_sklh'];} else { echo ''; }?>">
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
                                    });
                                    </script>                                        
                                    
                                    <div class="form-group">
                                        <label>Hobi</label>
                                        <input type="text" name="tx_hobi" class="form-control" placeholder="Hobi Caberawit" value="<?php if(isset($_POST['tx_hobi'])) { echo $_POST['tx_hobi'];} else { echo ''; }?>">
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
                                                        <option value=<?=$hsl_kat->id_tpq?> <?php if(isset($_POST['tx_tpq'])) { if($_POST['tx_tpq'] == $hsl_kat->id_tpq ) { echo "selected";}}?> ><?=$hsl_kat->nama_tpq?></option>
                                                    <?php                                                    
                                                    $x++;
                                                    }s                                                        
                                                    ?>
                                                </select>
                                            </div>
                                        </div>
                                    <div class="form-group">
                                        <label>Orang Tua</label>
                                        <input type="text" name="bapak" class="form-control" placeholder="Nama Ayah" value="<?php if(isset($_POST['bapak'])) { echo $_POST['bapak'];} else { echo ''; }?>" >
                                    </div>
                                    <div class="form-group">
                                        <input type="text" name="ibu" class="form-control" placeholder="Nama Ibu" value="<?php if(isset($_POST['ibu'])) { echo $_POST['ibu'];} else { echo ''; }?>" >
                                    </div>

                                    <div class="form-group">
                                        <label>Kontak</label>
                                        <input type="text" name="tx_kontak" class="form-control" value="<?php if(isset($_POST['tx_kontak'])) { echo $_POST['tx_kontak'];} else { echo ''; }?>" >
                                    </div>

                                    <div class="form-group">
                                        <label>Alamat</label>
                                        <textarea rows="3" class="form-control" name="tx_alamat"><?php if(isset($_POST['tx_alamat'])) { echo $_POST['tx_alamat'];} else { echo ''; }?></textarea>
                                    </div>
                            </div>
                            
                            <div class="tab-pane" id="foto">
                                    <br>
                                    <img src="../images/foto_cbr/no_img.jpg" id="gambar_nodin1"  alt="Preview Gambar" class="img-thumbnail img-responsive img-preview"/>                                                                                        
                                    <br>
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
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default btn-md" data-dismiss="modal"><i class="fa fa-times"></i>&nbsp;Tutup</button>
                    <button type="submit" name="simpan" class="btn btn-success btn-md"><i class="fa fa-save"></i>&nbsp;Simpan</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <style>
        .img-preview{
            width: 200px; 
            height:200px;
        }
            
        </style>
    <?php

    function tambah() {
        if (isset($_POST['simpan'])) {
            $input = new stdClass();
            $input->nm = antiinjection($_POST['tx_nm_cbr']);
            $input->klmn = antiinjection($_POST['tx_jklmn']);
            $input->tmp_lhr = antiinjection($_POST['tx_tmp_lhr']);
            $input->tgl_lhr = antiinjection($_POST['tx_tgl_lhr']);
            $input->pdkn = antiinjection($_POST['tx_pdkn']);
            $input->kls = antiinjection($_POST['tx_kls']);
            $input->nm_sklh = antiinjection($_POST['tx_nm_sklh']);
            $input->kls = antiinjection($_POST['tx_kls']);
            $input->hobi = antiinjection($_POST['tx_hobi']);
            $input->tpq_ds = antiinjection($_POST['tx_tpq']);
            $input->bapak = antiinjection($_POST['bapak']);
            $input->ibu = antiinjection($_POST['ibu']);
            $input->kontak = antiinjection($_POST['tx_kontak']);
            $input->almt = mysql_escape_string($_POST['tx_alamat']);
            require_once "../db/database.php";
            $query = "SELECT MAX(RIGHT(id_cbr, 4)) as max_id FROM data_caberawit ORDER BY id_cbr";
            $result = mysql_query($query);
            $data = mysql_fetch_array($result);
            $id_max = $data['max_id'];
            $sort_num = (int) substr($id_max, 2, 4);
            $sort_num++;
            $gmx = "CBR";
            $new_code = sprintf("%02s", $sort_num, $gmx);
            $new_code_2 = "$gmx$new_code";
            $input->id = $new_code_2;
            $files_name = $_FILES['img_1']['name'];
            $files_size = $_FILES['img_1']['size'];
            $files_ext = $_FILES['img_1']['type'];
            $files_tmp = $_FILES['img_1']['tmp_name'];
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
                                $foto_name = "";
                            }
                        } else {
                            $foto_name = "";
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
            $input->isi = "INSERT INTO data_caberawit VALUES('$input->id','$input->nm','$input->klmn','$input->tmp_lhr','$input->tgl_lhr','$input->pdkn','$input->kls','$input->nm_sklh','$input->hobi','$input->tpq_ds','$input->bapak','$input->ibu','$input->kontak','$input->almt','$input->name_foto')";            
            
            $sqltambah = mysql_query($input->isi) or die(mysql_error());
            
            function upload_foto($foto_name, $tmp_name, $foto_dir) {
                    $datafoto = $foto_dir . basename($foto_name);
                    $movefoto = move_uploaded_file($tmp_name, $datafoto);
            }
            $dirfoto = "../images/foto_cbr/";
            if ($sqltambah == TRUE) {                    
                    $upload_foto = upload_foto($input->name_foto, $files_tmp, $dirfoto);
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
            <meta http-equiv="refresh" content= "1;url=data-caberawit.php"/>
                    <?php
            }
            
        }
    }
    ?>

    <?php
    if (isset($_GET['hapus'])) {
        require_once "../db/database.php";
        $hapus = "DELETE FROM `data_caberawit` WHERE `id_cbr` = '" . $_GET['hapus'] . "'";
        $sqlhapus = mysql_query($hapus);
        if ($sqlhapus) {
        ?>
            
            <script type="text/javascript">
                $('#success').removeAttr("style");                
                $('#success_message').text("Data Berhasil Dihapus");                              
            </script>
            <meta http-equiv="refresh" content= "1;url=data-caberawit.php"/>
            
        <?php
        } else {
        ?>
            <script type="text/javascript">
                $('#success').removeAttr("style");
                $('#success').removeClass("alert-success");
                $('#success').addClass("alert-danger");
                $('#success_message').text("Data Gagal Dihapus");        
            </script>
            <meta http-equiv="refresh" content= "1;url=data-caberawit.php"/>
        <?php
        }
    }
    ?>
	