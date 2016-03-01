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
                                <div class="form-group">
                                    <form  method="post" enctype="multipart/form-data">
                                        <label>ID TPQ</label>
                                        <input type="text" name="tx_id_tpq"  class="form-control" value="<?php echo autoNumber(); ?>" required>
                                        </div>
                                        <div class="form-group">
                                            <label>Nama TPQ</label>
                                            <input type="text" class="form-control" name='tx_nm_tpq' required>
                                        </div>
                                        <div class="form-group">
                                            <label>Kepala TPQ</label>
                                            <input type="text" name="tx_kpl_tpq" class="form-control" required>
                                        </div>
                                        <div class="form-group">
                                            <label>Pembina TPQ</label>
                                            <input type="text" name="tx_pmbn_tpq" class="form-control" required>
                                        </div>
                                        <div class="form-group">
                                            <label>Desa</label>
                                            <input type="text" name="tx_desa" class="form-control" required>
                                        </div>
                                        <div class="form-group">
                                            <label>Jumlah Kelompok</label>
                                            <input type="text" name="tx_jml_tpq" class="form-control" required>
                                        </div>

                                        <div class="form-group">
                                            <label>Kontak</label>
                                            <input type="text" name="tx_kontak_tpq" class="form-control" required>
                                        </div>

                                        <div class="form-group">
                                            <label>Alamat</label>
                                            <textarea rows="3" class="form-control" name="tx_alamat"></textarea>
                                        </div>

                                        <br>
                                        <blockquote><p><h3>Informasi User Entry Login</h3></p></blockquote>
                                        <div class="form-group">
                                            <label>Username</label>
                                            <input type="text" name="tx_id_user" class="form-control" value="user_<?php echo autoNumber(); ?>" required>
                                        </div>

                                        <div class="form-group">
                                            <label>Password</label>
                                            <input id="pwd0"  class="form-control" type="password"  placeholder="Isi Password Login" name="pass_user" required>
                                            <!--                                            <br>
                                                                                        <p><a href="#" onclick="toggle_password('pwd0');" id="showhide" class="btn btn-warning btn-sm">Tunjukkan Password</a></p>-->
                                        </div>

                                        <div class="form-group">
                                            <label>Email</label>
                                            <input type="email" name="tx_id_email" class="form-control" placeholder="Alamat Email" required>
                                        </div>
                                </div>
                                <script>
                                    function toggle_password(target) {
                                        var d = document;
                                        var tag = d.getElementById(target);
                                        var tag2 = d.getElementById("showhide");

                                        if (tag2.innerHTML == 'Show') {
                                            tag.setAttribute('type', 'text');
                                            tag2.innerHTML = 'Hide';
                                        } else {
                                            tag.setAttribute('type', 'password');
                                            tag2.innerHTML = 'Show';
                                        }
                                    }
                                </script>

                                <div class="tab-pane" id="logo">
                                    <br>
                                    <input type="file" class="btn btn-default" name="Filegambar" id="filesToUpload">
                                    <br>

                                    <output id="filesInfo"></output>


                                </div>
                                <!--- Preview Gambar -->
                                <script>
                                    function fileSelect(evt) {
                                        if (window.File && window.FileReader && window.FileList && window.Blob) {
                                            var files = evt.target.files;
                                            var divOne = document.getElementById('filesInfo');
                                            var result = '';
                                            var file;
                                            for (var i = 0; file = files[i]; i++) {
                                                // if the file is not an image, continue
                                                if (!file.type.match('image.*')) {
                                                    continue;
                                                }

                                                reader = new FileReader();
                                                reader.onload = (function (tFile) {
                                                    return function (evt) {
                                                        var div = document.createElement('div');
                                                        divOne.innerHTML = '<img id="img_prev" style="width: 200px; height:200px" src="' + evt.target.result + '" class="img-responsive img-thumbnail" src="no"/>';
                                                        document.getElementById('filesInfo').appendChild(div);
                                                    };
                                                }(file));
                                                reader.readAsDataURL(file);
                                            }
                                        } else {
                                            alert('The File APIs are not fully supported in this browser.');
                                        }
                                    }
                                    document.getElementById('filesToUpload').addEventListener('change', fileSelect, false);
                                </script>

                                <script>
                                    $('input[type=file]').bootstrapFileInput();
                                    $('.file-inputs').bootstrapFileInput();
                                </script>

                                <div class="tab-pane" id="foto">
                                    <br>
                                    <input type="file" class="btn btn-default" name="Filegambar2" id="filesToUpload2">
                                    <br>

                                    <output id="filesInfo2"></output>


                                </div>
                                <!--- Preview Gambar -->
                                <script>
                                    function fileSelect(evt) {
                                        if (window.File && window.FileReader && window.FileList && window.Blob) {
                                            var files = evt.target.files;
                                            var divOne = document.getElementById('filesInfo2');
                                            var result = '';
                                            var file;
                                            for (var i = 0; file = files[i]; i++) {
                                                // if the file is not an image, continue
                                                if (!file.type.match('image.*')) {
                                                    continue;
                                                }

                                                reader = new FileReader();
                                                reader.onload = (function (tFile) {
                                                    return function (evt) {
                                                        var div = document.createElement('div');
                                                        divOne.innerHTML = '<img id="img_prev2" style="width: 100px; height:100px" src="' + evt.target.result + '" class="img-responsive img-thumbnail" src="no"/>';
                                                        document.getElementById('filesInfo2').appendChild(div);
                                                    };
                                                }(file));
                                                reader.readAsDataURL(file);
                                            }
                                        } else {
                                            alert('The File APIs are not fully supported in this browser.');
                                        }
                                    }
                                    document.getElementById('filesToUpload2').addEventListener('change', fileSelect, false);
                                </script>

                                <script>
                                    $('input[type=file]').bootstrapFileInput();
                                    $('.file-inputs').bootstrapFileInput();
                                </script>


                            </div>	
                        </div>	
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default btn-lg" data-dismiss="modal"><i class="fa fa-times"></i>&nbsp;Tutup</button>
                        <button type="submit" name="simpan" class="btn btn-success btn-lg" ><i class="fa fa-save"></i>&nbsp;Simpan</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <script type="text/javascript">
            jQuery(document).ready(function ($) {
                $("#tabs").tab();
            });
        </script>    


        <script type="text/javascript">
            jQuery(document).ready(function ($) {
                $("#tabs").tab();
            });
        </script>    



        <?php
        if (isset($_POST['simpan'])) {
            $id = antiinjection($_POST['tx_id_tpq']);
            $nm = antiinjection($_POST['tx_nm_tpq']);
            $nm_tpq = antiinjection($nm);
            $kpl = antiinjection($_POST['tx_kpl_tpq']);
            $pbn = antiinjection($_POST['tx_pmbn_tpq']);
            $ds = antiinjection($_POST['tx_desa']);
            $jml_k = antiinjection($_POST['tx_jml_tpq']);
            $kontak = antiinjection($_POST['tx_kontak_tpq']);
            $almt = mysql_escape_string($_POST['tx_alamat']);
            $logo = $_FILES['Filegambar']['name'];
            $foto = $_FILES['Filegambar2']['name'];
            $id_user = antiinjection($_POST['tx_id_user']);
            $pas = antiinjection(md5($_POST['pass_user']));
            $email = antiinjection($_POST['tx_id_email']);

            require_once "../db/database.php";
            $isi = "INSERT INTO data_tpq VALUES('$id','$nm_tpq','$kpl','$pbn','$ds','$jml_k','$kontak','$almt','$logo','$foto')";

            $sqltambah = mysql_query($isi) or die(mysql_error());
            $dir_logo = "../images/logo_tpq/";
            $dir_foto = "../images/foto_tpq/";
            $logo_data = $dir_logo . basename($_FILES['Filegambar']['name']);
            $move_logo = move_uploaded_file($_FILES['Filegambar']['tmp_name'], $logo_data);
            $foto_data = $dir_foto . basename($_FILES['Filegambar2']['name']);
            $move_foto = move_uploaded_file($_FILES['Filegambar2']['tmp_name'], $foto_data);
            $user_login_sql = "INSERT INTO user_entry_login values('$id_user','$id','$pas','$email')";
            $insert_user_login = mysql_query($user_login_sql) or mysql_error();
            if ($sqltambah AND $insert_user_login) {
                echo '<meta http-equiv="refresh" content="0;url=?detail-tpq.php?detail=' . $id . '">';
            }
            if (!$sqltambah) {
                echo '<script type="text/javascript">alert("Data gagal disimpan");</script>';
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
		