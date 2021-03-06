<?php
require_once "../db/database.php";
$query2 = mysql_query("SELECT * FROM data_pengajar inner join data_tpq on data_pengajar.tpq_desa=data_tpq.id_tpq");
$numrowslihat = mysql_num_rows($query2);
?>	
<div class="panel panel-default">
        <!-- <a class="panel-heading">Pengajar <span class="label label-warning">+15</span> </a> -->
    <div class="panel-heading">Keseluruhan Data Pengajar</div>			
    <div class="panel-body">
        <div id="success" class="alert alert-success alert-dismissable" style="display:none"><span id="success_message"></span><button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button></div>
        <table class="display nowrap" cellspacing="0" width="100%" id="table_export">
            <thead>
                <tr class="warning">
                    <th>#</th>
                    <th>ID</th>
                    <th>Nama</th>
                    <th>Jns Kelamin</th>
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
                    echo '<tr><td >' . $num . '</td>';
                    if($hsl->j_klmn == "P") { $klmn = "Pria";} elseif($hsl->j_klmn == "W"){ $klmn = "Wanita";}
                    echo '									
					<td ><a href="detail-pengajar.php?detail=' . $hsl->id_peng . '">' . $hsl->id_peng . '</a></td>
					<td >' . $hsl->nm_peng . '</td>
					<td >' . $klmn . '</td>												
					<td >' . $hsl->nama_tpq . ' - ' . $hsl->desa . '</td>					
					<td >' . $hsl->kontak_peng . '</td>
					<td >' . $hsl->alamat_peng . '</td>';
                    ?>
                <td><center>
                    <a title="edit" href="detail-pengajar.php?edit=<?= $hsl->id_peng; ?>" class="btn btn-sm btn-default"><span class="glyphicon glyphicon-edit" title="Ganti"></span></a>
                    <a title="hapus" href="?hapus=<?= $hsl->id_peng; ?>" class="btn btn-sm btn-default" onclick='return confirm("Yakin menghapus data ini?")'><span class="glyphicon glyphicon-trash" title="Hapus"></span></a>
                </center>
                </td>										
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
</div>



<?php

function tambah() {


    function autoNumber() {
        require_once "../db/database.php";
        $query = "SELECT MAX(RIGHT(id_peng, 4)) as max_id FROM data_pengajar ORDER BY id_peng";
        $result = mysql_query($query);
        $data = mysql_fetch_array($result);
        $id_max = $data['max_id'];
        $sort_num = (int) substr($id_max, 1, 4);
        $sort_num++;
        //$new_code="GM00$sort_num";
        $gmx = "PGJ";
        $new_code = sprintf("%03s", $sort_num, $gmx);
        $new_code_2 = "$gmx$new_code";
        return $new_code_2;
    }
    ?>
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
                            <li class="active"><a href="#profil" data-toggle="tab">Profil Pengajar</a></li>
                            <li><a href="#foto" data-toggle="tab">Foto Pengajar</a></li>
                        </ul>
                        <div id="my-tab-content" class="tab-content">
                            <div class="tab-pane active" id="profil">
                                <br>
                                <div id="danger" class="alert alert-danger alert-dismissable" style="display:none"><span id="error_message"></span><button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button></div>
                                <div class="form-group">
                                    <form  method="post" enctype="multipart/form-data">
                                        <label>ID Pengajar</label>
                                        <input type="text" name="tx_id_peng"  class="form-control" value="<?php if(isset($_POST['tx_id_peng'])){ echo $_POST['tx_id_peng'];} else { echo autoNumber(); } ?>" required>
                                        </div>
                                        <div class="form-group">
                                            <label>Nama Pengajar</label>
                                            <input type="text" class="form-control" name='tx_nm_peng' required value="<?php if(isset($_POST['tx_nm_peng'])){ echo $_POST['tx_nm_peng'];} else { echo '';}?>">
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
                                            <input type="text" name="tx_tmp_lhr" class="form-control" required value="<?php if(isset($_POST['tx_tmp_lhr'])){ echo $_POST['tx_tmp_lhr'];} else { echo '';}?>">
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
                                            <label>Pendidikan Akhir</label>
                                            <select name="tx_pdkn" class="form-control input-md">
                                                <option value="SD" <?php if(isset($_POST['tx_pdkn'])) { if($_POST['tx_pdkn'] == "SD") { echo "selected";}}?>>SD</option>
                                                <option value="SMP" <?php if(isset($_POST['tx_pdkn'])) { if($_POST['tx_pdkn'] == "SMP") { echo "selected";}}?> >SMP</option>
                                                <option value="SMA" <?php if(isset($_POST['tx_pdkn'])) { if($_POST['tx_pdkn'] == "SMA") { echo "selected";}}?>>SMA</option>
                                                <option value="D3" <?php if(isset($_POST['tx_pdkn'])) { if($_POST['tx_pdkn'] == "D3") { echo "selected";}}?>>D3</option>
                                                <option value="S1" <?php if(isset($_POST['tx_pdkn'])) { if($_POST['tx_pdkn'] == "S1") { echo "selected";}}?>>S1</option>
                                                <option value="S2" <?php if(isset($_POST['tx_pdkn'])) { if($_POST['tx_pdkn'] == "S2") { echo "selected";}}?>>S2</option>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <input type="text" name="tx_ket_pdkn" class="form-control" value="<?php if(isset($_POST['tx_ket_pdkn'])){ echo $_POST['tx_ket_pdkn'];} else { echo '';}?>" placeholder="Nama Sekolah/Universitas(Fakultas)">
                                        </div>
                                        <div class="form-group">
                                            <label>Status</label>
                                            <select name="tx_status" class="form-control input-md" required>
                                                <option value="Pribumi" <?php if(isset($_POST['tx_status'])) { if($_POST['tx_status'] == "Pribumi") { echo "selected";}}?>>Pribumi</option>
                                                <option value="MT" <?php if(isset($_POST['tx_status'])) { if($_POST['tx_status'] == "MT") { echo "selected";}}?>>Mubalegh Tugasan</option>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label>Pernikahan</label>
                                            <select name="tx_nkh" class="form-control input-md" required>
                                                <option value="Sudah Menikah" <?php if(isset($_POST['tx_nkh'])) { if($_POST['tx_nkh'] == "Sudah Menikah") { echo "selected";}}?>>Sudah Menikah</option>
                                                <option value="Belum Menikah" <?php if(isset($_POST['tx_nkh'])) { if($_POST['tx_nkh'] == "Belum Menikah") { echo "selected";}}?>>Belum Menikah</option>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label>TPQ</label>
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
                                                        <option value=<?=$hsl_kat->id_tpq?> <?php if(isset($_POST['tx_tpq'])) { if($_POST['tx_tpq'] == $hsl_kat->id_tpq ) { echo "selected";}}?> ><?=$hsl_kat->nama_tpq?></option>
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
                                                <option value="Caberawit" <?php if(isset($_POST['tx_kls'])) { if($_POST['tx_kls'] == "Caberawit") { echo "selected";}}?> >Caberawit</option>
                                                <option value="Praremaja" <?php if(isset($_POST['tx_kls'])) { if($_POST['tx_kls'] == "Praremaja") { echo "selected";}}?>>Praremaja</option>
                                                <option value="Remaja" <?php if(isset($_POST['tx_kls'])) { if($_POST['tx_kls'] == "Remaja") { echo "selected";}}?>>Remaja</option>
                                            </select>
                                        </div>

                                        <div class="form-group">
                                            <label>Kontak</label>
                                            <input type="number" name="tx_kontak" class="form-control" value="<?php if(isset($_POST['tx_kontak'])){ echo $_POST['tx_kontak'];} else { echo '';}?>">
                                        </div>

                                        <div class="form-group">
                                            <label>Alamat</label>
                                            <textarea rows="3" class="form-control" name="tx_alamat"><?php if(isset($_POST['tx_alamat'])){ echo $_POST['tx_alamat'];} else { echo '';}?></textarea>
                                        </div>
                                </div>


                                <div class="tab-pane" id="foto">
                                    <br>
                                    <img src="../images/foto_pengajar/no_img.jpg" id="gambar_nodin1"  alt="Preview Gambar" class="img-thumbnail img-responsive img-preview"/>                                                                                        
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
            $input->tpq_ds = antiinjection($_POST['tx_tpq']);
            $input->kls = $_POST['tx_kls'];
            $input->kontak = antiinjection($_POST['tx_kontak']);
            $input->almt = mysql_escape_string($_POST['tx_alamat']);            
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
            $input->isi = "INSERT INTO data_pengajar VALUES('$input->id','$input->nm_p','$input->klmn','$input->tmp_lhr','$input->tgl_lhr','$input->pdkn','$input->pdkn_ket','$input->sts_p','$input->nkh_p','$input->tpq_ds','$input->kls','$input->kontak','$input->almt','$input->name_foto')";
//            echo $input->isi;exit();
            $sqltambah = mysql_query($input->isi) or die(mysql_error());
            
            function upload_foto($foto_name, $tmp_name, $foto_dir) {
                    $datafoto = $foto_dir . basename($foto_name);
                    $movefoto = move_uploaded_file($tmp_name, $datafoto);
            }
            $dirfoto = "../images/foto_pengajar/";
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
                $('#table_export').ajax.reload();                
            </script>
                    <?php
            }
        }
    }
    ?>

    <?php
    if (isset($_GET['hapus'])) {
        require_once "../db/database.php";
        $hapus = "DELETE FROM `data_pengajar` WHERE `id_peng` = '" . $_GET['hapus'] . "'";
        $sqlhapus = mysql_query($hapus);
        if ($sqlhapus) {
        ?>
            
            <script type="text/javascript">
                $('#success').removeAttr("style");                
                $('#success_message').text("Data Berhasil Dihapus");                              
            </script>
            <meta http-equiv="refresh" content= "1;url=data-pengajar.php"/>
            
        <?php
        } else {
        ?>
            <script type="text/javascript">
                $('#success').removeAttr("style");
                $('#success').removeClass("alert-success");
                $('#success').addClass("alert-danger");
                $('#success_message').text("Data Gagal Dihapus");        
            </script>
            <meta http-equiv="refresh" content= "1;url=data-pengajar.php"/>
        <?php
        }
    }
    ?>		