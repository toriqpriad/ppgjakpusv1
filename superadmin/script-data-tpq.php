<!--<script src="https://code.jquery.com/jquery-1.11.3.min.js" type="text/javascript"></script>    -->
<?php
require_once "../db/database.php";
$select = mysql_query("SELECT * FROM data_tpq") or die(mysql_error());
$numrowslihat = mysql_num_rows($select);
?>
<div class="panel panel-default">

    <!-- <a class="panel-heading">Pengajar <span class="label label-warning">+15</span> </a> -->
    <div class="panel-heading">Keseluruhan Data TPQ </div>		
    <div class="panel-body">
        <div id="success" class="alert alert-success alert-dismissable" style="display:none"><span id="success_message"></span><button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button></div>
        <table class="display nowrap" cellspacing="0" width="100%" id="table_export">
            <thead>
                <tr class="warning">
                    <th>#</th>
                    <th>ID TPQ</th>
                    <th>Nama TPQ</th>
                    <th>Kpl TPQ</th>
                    <th>Desa</th>
                    <th>Kontak</th>
                    <th><center>Aksi</center></th>
            </tr>
            </thead>                
            <tbody>                            

                <?php
                $x = 1;
                while ($hsl = mysql_fetch_object($select)) {
                    ?>
                    <tr >
                        <td ><?php echo "$x"; ?></td>
                        <td ><a href="detail-tpq.php?detail=<?= $hsl->id_tpq; ?>"><?= $hsl->id_tpq; ?></a></td>
                        <td ><?= $hsl->nama_tpq; ?></td>
                        <td ><?= $hsl->kepala_tpq; ?></td>
    <!--                                    <td ><?= $hsl->pembina_tpq; ?></td>-->
                        <td ><?= $hsl->desa; ?></td>
    <!--                                    <td ><?= $hsl->jml_kelompok; ?></td>-->
                        <td ><?= $hsl->kontak; ?> </td>
    <!--                                    <td ><?= $hsl->alamat; ?></td>-->

                        <td><center>
                    <a title='Edit' href="detail-tpq.php?edit=<?= $hsl->id_tpq; ?>" class="btn-sm btn btn-default"><span class="glyphicon glyphicon-edit" title="Ganti"></span></a>
                    <a title='Hapus' href="?hapus=<?= $hsl->id_tpq; ?>" onclick='return confirm("Yakin menghapus data ini?")'class="btn btn-default btn-sm" ><span class="glyphicon glyphicon-trash" title="Hapus"></span></a>
                </center>
                </td>
                </tr>
                <?php
                $x++;
            }
            ?>
            <tbody>
        </table>           
    </div>
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
        $query = "SELECT MAX(RIGHT(id_tpq, 4)) as max_id FROM data_tpq ORDER BY id_tpq";
        $result = mysql_query($query);
        $data = mysql_fetch_array($result);
        $id_max = $data['max_id'];
        $sort_num = (int) substr($id_max, 1, 4);
        $sort_num++;
        //$new_code="GM00$sort_num";
        $gmx = "TPQ";
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
                            <li class="active"><a href="#profil" data-toggle="tab">Profil TPQ</a></li>
                            <li><a href="#logo" data-toggle="tab">Logo TPQ</a></li>
                            <li><a href="#foto" data-toggle="tab">Foto TPQ</a></li>
                        </ul>
                        <div id="my-tab-content" class="tab-content">
                            <div class="tab-pane active" id="profil">
                                <br>
                                <div id="danger" class="alert alert-danger alert-dismissable" style="display:none"><span id="error_message"></span><button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button></div>
                                <div class="form-group">
                                    <form  method="post" enctype="multipart/form-data">
                                        <label>ID TPQ</label>
                                        <input type="text" name="tx_id_tpq"  class="form-control" value="<?php echo autoNumber(); ?>" required>
                                        </div>
                                        <div class="form-group">
                                            <label>Nama TPQ</label>
                                            <input type="text" class="form-control" name='tx_nm_tpq' value="<?php if(isset($_POST['tx_nm_tpq'])){ echo $_POST['tx_nm_tpq']; } else { echo '';}?>" required>
                                        </div>
                                        <div class="form-group">
                                            <label>Kepala TPQ</label>
                                            <input type="text" name="tx_kpl_tpq" class="form-control" value="<?php if(isset($_POST['tx_kpl_tpq'])){ echo $_POST['tx_kpl_tpq']; } else { echo '';}?>" required>
                                        </div>
                                        <div class="form-group">
                                            <label>Pembina TPQ</label>
                                            <input type="text" name="tx_pmbn_tpq" class="form-control" required value="<?php if(isset($_POST['tx_pmbn_tpq'])){ echo $_POST['tx_pmbn_tpq']; } else { echo '';}?>">
                                        </div>
                                        <div class="form-group">
                                            <label>PC (Pengurus Cabang)</label>
                                            <input type="text" name="tx_desa" class="form-control" value="<?php if(isset($_POST['tx_desa'])){ echo $_POST['tx_desa']; } else { echo '';}?>" required>
                                        </div>
                                        <div class="form-group">
                                            <label>Jumlah PAC (Pengurus Anak Cabang)</label>
                                            <input type="text" name="tx_jml_tpq" class="form-control" value="<?php if(isset($_POST['tx_jml_tpq'])){ echo $_POST['tx_jml_tpq']; } else { echo '';}?>" required>
                                        </div>

                                        <div class="form-group">
                                            <label>Kontak</label>
                                            <input type="number" name="tx_kontak_tpq" class="form-control" value="<?php if(isset($_POST['tx_kontak_tpq'])){ echo $_POST['tx_kontak_tpq']; } else { echo '';}?>" required>
                                        </div>

                                        <div class="form-group">
                                            <label>Alamat</label>
                                            <textarea rows="3" class="form-control" name="tx_alamat"><?php if(isset($_POST['tx_alamat'])){ echo $_POST['tx_alamat']; } else { echo '';}?></textarea>
                                        </div>

                                        <br>
                                        <blockquote><p><h3>Informasi User Entry Login</h3></p></blockquote>
                                        <div class="form-group">
                                            <label>Username</label>
                                            <input type="text" name="tx_id_user" class="form-control" value="<?php if(isset($_POST['tx_id_user'])){ echo $_POST['tx_id_user']; } else { echo 'user_'.autonumber();}?>" required>
                                        </div>

                                        <div class="form-group">
                                            <label>Password</label>
                                            <input id="pwd0"  class="form-control" type="password"  placeholder="Isi Password Login" name="pass_user" <?php if(isset($_POST['pass_user'])){ echo $_POST['pass_user']; } else { echo '';}?> required>                                            
                                        </div>

                                        <div class="form-group">
                                            <label>Email</label>
                                            <input type="email" name="tx_id_email" class="form-control" placeholder="Alamat Email" required <?php if(isset($_POST['tx_id_email'])){ echo $_POST['tx_id_email']; } else { echo '';}?>>
                                        </div>
                                </div>                                
                                <div class="tab-pane" id="logo">
                                   <br>
                                   <img src="../images/logo_tpq/no_img.jpg" id="gambar_nodin1"  alt="Preview Gambar" class="img-thumbnail img-responsive img-preview"/>                                                
                                   <br>
                                   <input type="file" name="file_logo" id="preview_gambar1" class="btn btn-default btn-xs"/>                                   
                                </div>                                
                                <div class="tab-pane" id="foto">
                                   <br>
                                   <img src="../images/foto_tpq/no_img.jpg" id="gambar_nodin2"  alt="Preview Gambar" class="img-thumbnail img-responsive img-preview"/>                                                
                                   <br>
                                   <input type="file" name="file_foto" id="preview_gambar2" class="btn btn-default btn-xs"/>
                                </div>                                
                            </div>	
                        </div>	
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal"><i class="fa fa-times"></i>&nbsp;Tutup</button>
                        <button type="submit" name="simpan" class="btn btn-success" ><i class="fa fa-save"></i>&nbsp;Simpan</button>
                        </form>
                    </div>
                </div>
            </div>
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
        </script>
    
        <style>
        .img-preview{
            width: 350px; 
            height:300px;
        }
            
        </style>   



        <?php
        if (isset($_POST['simpan'])) {
            $input = new stdClass();
            $dirlogo = "../images/logo_tpq/";
            $dirfoto = "../images/foto_tpq/";
            $input->id = antiinjection($_POST['tx_id_tpq']);            
            $input->nm_tpq =  antiinjection($_POST['tx_nm_tpq']);
            $input->kpl = antiinjection($_POST['tx_kpl_tpq']);
            $input->pbn = antiinjection($_POST['tx_pmbn_tpq']);
            $input->ds = antiinjection($_POST['tx_desa']);
            $input->jml_k = antiinjection($_POST['tx_jml_tpq']);
            $input->kontak = antiinjection($_POST['tx_kontak_tpq']);
            $input->almt = mysql_escape_string($_POST['tx_alamat']);            
            $input->id_user = antiinjection($_POST['tx_id_user']);
            $input->pas = antiinjection(md5($_POST['pass_user']));
            $input->email = antiinjection($_POST['tx_id_email']);
            $files_name = array('', $_FILES['file_logo']['name'], $_FILES['file_foto']['name']);
//            print_r($files_name);
            $files_size = array('', $_FILES['file_logo']['size'], $_FILES['file_foto']['size']);
//            print_r($files_size);
            $files_ext = array('', $_FILES['file_logo']['type'], $_FILES['file_foto']['type']);
//            print_r($files_ext);
            $files_tmp = array('', $_FILES['file_logo']['tmp_name'], $_FILES['file_foto']['tmp_name']);
//            print_r($files_tmp);
            $i = 1;
            $image_file_type = array('image/gif', 'image/png', 'image/jpg', 'image/jpeg', '');
            while ($i <= 2) {                    
                        if ($files_tmp[$i] != "") {
                            if (!in_array($files_ext[$i], $image_file_type)) {
                                $alert = TRUE;
                                $error_ext = "Ekstensi gambar tidak sesuai dengan yang ditentukan (jpg,png,jpg). ";
                            } else {
                                $error_ext = "";
                            }
                            if ($files_size[$i] > 1000000) {
                                $alert = TRUE;
                                $error_size = "Ukuran gambar melebihi maksimal (1 MB). ";
                            } else {
                                $error_size = "";
                            }
                            if ($files_name[$i] != "") {
                                $nospacename = str_ireplace(" ", "_", $input->id);
                                $extension = end((explode("/", $files_ext[$i])));
                                $foto_name[] = $nospacename . "-" . $i . "." . $extension;
                            } else {
                                $foto_name[] = "";
                            }
                        } else {
                            $foto_name[] = "";
                        }                    
                    
                    $i++;
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
            $input->name_logo = $foto_name[0];
            $input->name_foto = $foto_name[1];
            
            require_once "../db/database.php";
            $input->isi = "INSERT INTO data_tpq VALUES('$input->id','$input->nm_tpq','$input->kpl','$input->pbn','$input->ds','$input->jml_k','$input->kontak','$input->almt','$input->name_logo','$input->name_foto')";
            $sqltambah = mysql_query($input->isi) or die(mysql_error());            
            $user_login_sql = "INSERT INTO user_entry_login values('$input->id_user','$input->id','$input->pas','$input->email')";
            $insert_user_login = mysql_query($user_login_sql) or mysql_error();
            function upload_foto($foto_name, $tmp_name, $foto_dir) {
                    $datafoto = $foto_dir . basename($foto_name);
                    $movefoto = move_uploaded_file($tmp_name, $datafoto);
            }
            if ($sqltambah == TRUE && $insert_user_login == TRUE) {
                    $upload_logo = upload_foto($input->name_logo, $files_tmp[1], $dirlogo);
                    $upload_foto = upload_foto($input->name_foto, $files_tmp[2], $dirfoto);
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
        $sqlhapus = mysql_query("DELETE FROM data_tpq WHERE id_tpq = '" . $_GET['hapus'] . "'");

        if ($sqlhapus) {
            echo '<meta http-equiv="refresh" content="0;url=data-tpq.php">';
        } else {
            echo '<script type="text/javascript"> 	alert("Data gagal dihapus!!");	</script>';
        }
    }
    ?>
		