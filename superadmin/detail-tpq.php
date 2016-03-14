<!doctype html>
<?php include 'cek_session.php'; ?>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <title>Detail TPQ</title>
        <?php
        include 'header_superadmin.php';
        include 'menu_superadmin.php';
        ?>
    <div class="main-content">
        <div class="panel panel-default">
            <div class="panel-heading">Detail Data</div>
            <div class="panel-body"><?php detail(); ?>
                <?php

                function detail() {
                    $dirfoto = "../images/foto_tpq/";
                    $dirlogo = "../images/logo_tpq/";
                    if (isset($_GET['detail'])) {

                        $iddetail = $_GET['detail'];
                        require_once "../db/database.php";
                        $detail_skrip = "SELECT * FROM data_tpq inner join user_entry_login on data_tpq.id_tpq=user_entry_login.id_tpq where `data_tpq`.`id_tpq` = '" . $_GET['detail'] . "' ";
                        $selectdetail = mysql_query($detail_skrip) or die(mysql_error());
                        $selectdetail2 = mysql_fetch_object($selectdetail);
                        if ($selectdetail2 == false) {
                            ?>
                            Data tidak ditemukan
                        </div>
                        <div class="panel-footer">
                            <a href="data-tpq.php" class="btn btn-warning btn-md"><span class="fa fa-angle-left" aria-hidden="true" title="kembali"></span> Kembali</a>
                        </div>
                        <?php
                    } else {
                        $getimg = $selectdetail2->logo;
                        ?>
                        <ul id="tabs" class="nav nav-tabs" data-tabs="tabs">
                            <li class="active"><a href="#detail_tpq" data-toggle="tab">Profil TPQ</a></li>
                            <li><a href="#login" data-toggle="tab">User Login</a></li>
                            <li><a href="#logo" data-toggle="tab">Logo TPQ</a></li>
                            <li><a href="#foto" data-toggle="tab">Foto TPQ</a></li>
                            <li><a href="#musyawarah" data-toggle="tab">Hasil Musyawarah TPQ</a></li>
                            <li><a href="#kegiatan" data-toggle="tab">Kegiatan TPQ</a></li>		        
                        </ul>
                        <div id="my-tab-content" class="tab-content">
                            <div class="tab-pane active" id="detail_tpq">
                                <br>
                                <form id="tab">                                                                    
                                    <input type="hidden" value='<?= $selectdetail2->id_tpq ?>' class="form-control" disabled>                                
                                    <div class="form-group">
                                        <label>Nama TPQ</label>
                                        <input type="text" class="form-control" value="<?= $selectdetail2->nama_tpq ?>" disabled>
                                    </div>
                                    <div class="form-group">
                                        <label>Kepala TPQ</label>
                                        <input type="text" value="<?= $selectdetail2->kepala_tpq ?>" class="form-control" disabled>
                                    </div>
                                    <div class="form-group">
                                        <label>Pembina TPQ</label>
                                        <input type="text" value="<?= $selectdetail2->pembina_tpq ?>" class="form-control" disabled>
                                    </div>
                                    <div class="form-group">
                                        <label>Desa</label>
                                        <input type="text" value="<?= $selectdetail2->desa ?>" class="form-control" disabled>
                                    </div>
                                    <div class="form-group">
                                        <label>Jumlah Kelompok</label>
                                        <input type="text" value="<?= $selectdetail2->jml_kelompok ?>" class="form-control" disabled>
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
                            <div class="tab-pane" id="login">
                                <br>
                                <div class="form-group">
                                    <label>Username</label>
                                    <input type="text" name="tx_id_user" class="form-control" value="<?= $selectdetail2->id_user ?>"  disabled>
                                </div>			
                                <div class="form-group">
                                    <label>Password</label>
                                    <input id="pwd0"  class="form-control" type="password"   value="*************" name="pass_user" disabled>
                                </div>

                                <div class="form-group">
                                    <label>Email</label>
                                    <input type="text" name="tx_id_email" class="form-control"   disabled value="<?= $selectdetail2->email ?>">
                                </div>
                            </div>
                            <div class="tab-pane" id="logo">
                                <br> <img src="<?php
                                if (($selectdetail2->logo != "") AND ( file_exists($dirlogo . $selectdetail2->logo))) {
                                    echo $dirlogo . $selectdetail2->logo;
                                } else {
                                    echo $dirlogo . 'no_img.jpg';
                                }
                                ?>"  class="img img-preview img-responsive img-thumbnail" id="gambar_nodin1">
                            </div>
                            <div class="tab-pane" id="foto">
                                <br> <img src="<?php
                                if (($selectdetail2->foto != "") AND ( file_exists($dirfoto . $selectdetail2->foto))) {
                                    echo $dirfoto . $selectdetail2->foto;
                                } else {
                                    echo $dirfoto . 'no_img.jpg';
                                }
                                ?>"  class="img img-preview-foto img-responsive img-thumbnail" id="gambar_nodin1">
                            </div>		
                            <div class="tab-pane" id="musyawarah">
                                <br>
                                <?php
                                $query_musyawarah = mysql_query("SELECT * FROM data_musyawarah a inner join data_tpq b on a.pelaksana_mswrh = b.id_tpq Where a.tipe_mswrh IN ('T') and a.pelaksana_mswrh = '$selectdetail2->id_tpq'");
                                ?>
                                <table class="display nowrap" cellspacing="0" width="100%" id="table_export">    
                                    <thead>
                                    <th>#</th>                    
                                    <th>Judul Musyawarah</th>                                     
                                    <th>Tgl Pelaksanaan</th>                    
                                    <th><center>Aksi</center></th>
                                    </tr>
                                    </thead>
                                    <tbody>            
                                        <?php
                                        $num = 1;
                                        while ($hsl = mysql_fetch_object($query_musyawarah)) {
                                            echo '<td >' . $num . '</td>';
                                            echo '<td ><a href="detail-mswrh-tpq.php?detail=' . $hsl->id_mswrh . '">' . $hsl->judul_mswrh . '</a></td>';
                                            echo '<td >' . $hsl->tgl_dibuat . '</td >';
                                            ?>
                                        <td><center>
                                            <a title="Lihat" href="detail-mswrh-tpq.php?detail=<?= $hsl->id_mswrh; ?>" class="btn btn-default btn-sm" ><span class="glyphicon glyphicon-eye-open"></span></a>
                                        </center>
                                        </td>


                                        </tr>					

                                        <?php
                                        $num++;
                                    }
                                    ?>
                                </table>

                            </div>
                            <div class="tab-pane" id="kegiatan">
                                <br>
                                <?php
                                $query_kgtn = mysql_query("SELECT * FROM data_kegiatan a inner join data_tpq c on a.pelaksana_kgtn = c.id_tpq and a.pelaksana_kgtn = '$selectdetail2->id_tpq    '");
                                ?>
                                <table class="display nowrap" cellspacing="0" width="100%" id="table_export2">    
                                    <thead>
                                    <th>#</th>                    
                                    <th>Nama Kegiatan</th>                                
                                    <th>Tgl Kegiatan</th>                    
                                    <th><center>Aksi</center></th>
                                    </tr>
                                    </thead>
                                    <tbody>            
                                        <?php
                                        $num = 1;
                                        while ($hsl = mysql_fetch_object($query_kgtn)) {
                                            echo '<td >' . $num . '</td>';
                                            echo '<td ><a href="detail-kgtn-tpq.php?detail=' . $hsl->id_kgtn . '">' . $hsl->nama_kgtn . '</a></td>';
                                            echo '<td >' . $hsl->tgl_kgtn . '</td >';
                                            ?>
                                        <td><center>
                                            <a title="Lihat" href="detail-kgtn-tpq.php?detail=<?= $hsl->id_kgtn; ?>" class="btn btn-default btn-sm" ><span class="glyphicon glyphicon-eye-open"></span></a>
                                        </center>
                                        </td>


                                        </tr>					

                                        <?php
                                        $num++;
                                    }
                                    ?>
                                </table>
                            </div>
                        </div></div>
                    <br>                                
                    <div class="panel-footer">                                    
                        <a href="data-tpq.php" class="btn btn-warning btn-md"><span class="fa fa-angle-left" aria-hidden="true" title="kembali"></span> Kembali</a>
                        <a href="?edit=<?= $selectdetail2->id_tpq; ?>" class="btn btn-info"><span class="glyphicon glyphicon-pencil" aria-hidden="true" title="Ubah"></span> Ubah</a>
                        <a href="data-tpq.php?hapus=<?= $selectdetail2->id_tpq; ?>" onclick="return confirm('Yakin menghapus data ini?')" class="btn btn-danger"><span class="glyphicon glyphicon-trash" aria-hidden="true" title="Hapus"></span> Hapus</a>            
                    </div>
                </div>			                
                <?php
            }
        }
        //edit//
        if (isset($_GET['edit'])) {
            $idedit = $_GET['edit'];
            require_once "../db/database.php";
            $selectedit = mysql_query("SELECT * FROM data_tpq inner join user_entry_login on data_tpq.id_tpq=user_entry_login.id_tpq where `data_tpq`.`id_tpq` = '" . $_GET['edit'] . "' ") or die(mysql_error());
            $selectedit2 = mysql_fetch_object($selectedit);
            if ($selectedit2 == false) {
                ?>
                Data tidak ditemukan 
            </div>
            <div class="panel-footer">
                <a href="detail-tpq.php?detail=<?= $_GET['edit'] ?>" class="btn btn-warning btn-md"><span class="fa fa-angle-left" aria-hidden="true" title="kembali"></span> Kembali</a>
            </div>
        <?php } else {
            ?>	
            <ul id="tabs" class="nav nav-tabs" data-tabs="tabs">
                <li class="active"><a href="#detail_tpq" data-toggle="tab">Detail TPQ</a></li>
                <li><a href="#logo" data-toggle="tab">Logo TPQ</a></li>
                <li><a href="#foto" data-toggle="tab">Foto TPQ</a></li>	
                <li><a href="#musyawarah" data-toggle="tab">Hasil Musyawarah TPQ</a></li>
                <li><a href="#kegiatan" data-toggle="tab">Kegiatan TPQ</a></li>		        
            </ul>           
            <div id="my-tab-content" class="tab-content">
                <div class="tab-pane active" id="detail_tpq">
                    <br>       
                    <div id="success" class="alert alert-success alert-dismissable" style="display:none"><span id="success_message"></span><button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button></div>
                    <div id="danger" class="alert alert-danger alert-dismissable" style="display:none"><span id="error_message"></span><button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button></div>
                    <div class="form-group">
                        <form  method="post" enctype="multipart/form-data">                            
                            <input type="hidden" name="tx_id_tpq"  class="form-control" value='<?= $selectedit2->id_tpq ?>' >                            
                            <div class="form-group">
                                <label>Nama TPQ</label>
                                <input type="text" class="form-control" name="tx_nm_tpq" value="<?php
                                if (isset($_POST['tx_nm_tpq'])) {
                                    echo $_POST['tx_nm_tpq'];
                                } else {
                                    echo $selectedit2->nama_tpq;
                                }
                                ?>" required>
                            </div>  
                            <div class="form-group">
                                <label>Kepala TPQ</label>
                                <input type="text" name="tx_kpl_tpq" class="form-control" value="<?php
                                if (isset($_POST['tx_kpl_tpq'])) {
                                    echo $_POST['tx_kpl_tpq'];
                                } else {
                                    echo $selectedit2->kepala_tpq;
                                }
                                ?>" required>
                            </div>
                            <div class="form-group">
                                <label>Pembina TPQ</label>
                                <input type="text" name="tx_pmbn_tpq" class="form-control" value="<?php
                                if (isset($_POST['tx_pmbn_tpq'])) {
                                    echo $_POST['tx_pmbn_tpq'];
                                } else {
                                    echo $selectedit2->pembina_tpq;
                                }
                                ?>" required>
                            </div>
                            <div class="form-group">
                                <label>PC (Pengurus Cabang) </label>
                                <input type="text" name="tx_desa" class="form-control" value="<?php
                                if (isset($_POST['tx_desa'])) {
                                    echo $_POST['tx_desa'];
                                } else {
                                    echo $selectedit2->desa;
                                }
                                ?>" required>
                            </div>
                            <div class="form-group">
                                <label>Jumlah PAC (Pengurus Anak Cabang)</label>
                                <input type="text" name="tx_jml_tpq" class="form-control" value='<?php
                                if (isset($_POST['tx_jml_tpq'])) {
                                    echo $_POST['tx_jml_tpq'];
                                } else {
                                    echo $selectedit2->jml_kelompok;
                                }
                                ?>' required>
                            </div>
                            <div class="form-group">
                                <label>Kontak</label>
                                <input type="number" name="tx_kontak_tpq" class="form-control" value='<?php
                                if (isset($_POST['tx_kontak_tpq'])) {
                                    echo $_POST['tx_kontak_tpq'];
                                } else {
                                    echo $selectedit2->kontak;
                                }
                                ?>' required>
                            </div>		
                            <div class="form-group">
                                <label>Alamat</label>
                                <textarea rows="3" class="form-control" name="tx_alamat"><?php
                                    if (isset($_POST['tx_alamat'])) {
                                        echo $_POST['tx_alamat'];
                                    } else {
                                        echo $selectedit2->alamat;
                                    }
                                    ?></textarea>
                            </div>  		
                            <blockquote><p><h3>Informasi Login</h3></p></blockquote>
                            <div class="form-group">
                                <label>Username</label>
                                <input type="text" name="tx_id_user" class="form-control" value='<?php
                                if (isset($_POST['tx_id_user'])) {
                                    echo $_POST['tx_id_user'];
                                } else {
                                    echo $selectedit2->id_user;
                                }
                                ?>' required>
                            </div>			
                            <div class="form-group">
                                <label>Password</label>
                                <input id="pwd0"  class="form-control" type="password"  name="pass_user" value='<?php
                                if (isset($_POST['pass_user'])) {
                                    echo $_POST['pass_user'];
                                } else {
                                    echo $selectedit2->password;
                                }
                                ?>' required>			
                            </div>		
                            <div class="form-group">
                                <label>Email</label>
                                <input type="email" name="tx_id_email" class="form-control" value='<?php
                                if (isset($_POST['tx_id_email'])) {
                                    echo $_POST['tx_id_email'];
                                } else {
                                    echo $selectedit2->email;
                                }
                                ?> ' required>
                            </div>		
                    </div>
                </div>
                <div class="tab-pane" id="logo">
                    <br>
                    <img src="<?php
                    if (($selectedit2->logo != "") AND ( file_exists($dirlogo . $selectedit2->logo))) {
                        echo $dirlogo . $selectedit2->logo;
                    } else {
                        echo $dirlogo . 'no_img.jpg';
                    }
                    ?>"  class="img img-preview img-responsive img-thumbnail" id="gambar_nodin1">
                    <input type="file" name="file_logo" id="preview_gambar1" class="btn btn-default btn-xs"/>
                    <input type="hidden" name="old_logo" value="<?= $selectedit2->logo ?>"/>
                    <br>                                                                                        

                    <script>
                        function bacaGambar1(input) {
                            if (input.files && input.files[0]) {
                                var reader = new FileReader();

                                reader.onload = function (e) {

                                    $('#gambar_nodin1').attr('src', e.target.result);
                                }

                                reader.readAsDataURL(input.files[0]);
                            }
                        }
                    </script>
                    <script>
                        $("#preview_gambar1").change(function () {
                            bacaGambar1(this);
                        });
                    </script>                    
                </div>                               

                <div class="tab-pane" id="foto">
                    <br>
                    <img src="<?php
                    if (($selectedit2->foto != "") AND ( file_exists($dirfoto . $selectedit2->foto))) {
                        echo $dirfoto . $selectedit2->foto;
                    } else {
                        echo $dirfoto . 'no_img.jpg';
                    }
                    ?>"  class="img img-preview-foto img-responsive img-thumbnail" id="gambar_nodin2">
                    <input type="file" name="file_foto" id="preview_gambar2" class="btn btn-default btn-xs"/>
                    <input type="hidden" name="old_foto" value="<?= $selectedit2->foto ?>"/>
                    <br>                                                                                        

                    <script>
                        function bacaGambar2(input) {
                            if (input.files && input.files[0]) {
                                var reader = new FileReader();

                                reader.onload = function (e) {

                                    $('#gambar_nodin2').attr('src', e.target.result);
                                }

                                reader.readAsDataURL(input.files[0]);
                            }
                        }
                    </script>
                    <script>
                        $("#preview_gambar2").change(function () {
                            bacaGambar2(this);
                        });
                    </script> 
                </div>
                <div class="tab-pane" id="musyawarah">
                    <br>
                    <?php
                    $query_musyawarah = mysql_query("SELECT * FROM data_musyawarah a inner join data_tpq b on a.pelaksana_mswrh = b.id_tpq Where a.tipe_mswrh IN ('T') and a.pelaksana_mswrh = '$selectedit2->id_tpq'");
                    ?>
                    <table class="display nowrap" cellspacing="0" width="100%" id="table_export">    
                        <thead>
                        <th>#</th>                    
                        <th>Judul Musyawarah</th>                                     
                        <th>Tgl Pelaksanaan</th>                    
                        <th><center>Aksi</center></th>
                        </tr>
                        </thead>
                        <tbody>            
                            <?php
                            $num = 1;
                            while ($hsl = mysql_fetch_object($query_musyawarah)) {
                                echo '<td >' . $num . '</td>';
                                echo '<td ><a href="detail-mswrh-tpq.php?detail=' . $hsl->id_mswrh . '">' . $hsl->judul_mswrh . '</a></td>';
                                echo '<td >' . $hsl->tgl_dibuat . '</td >';
                                ?>
                            <td><center>                                
                                <a href="detail-mswrh-tpq.php?detail=<?= $hsl->id_mswrh; ?>" class="btn btn-default btn-sm" ><span class="glyphicon glyphicon-eye-open"></span></a>                                
                            </center>
                            </td>


                            </tr>					

                            <?php
                            $num++;
                        }
                        ?>
                    </table>

                </div>
                <div class="tab-pane" id="kegiatan">
                    <br>
                    <?php
                    $query_kgtn = mysql_query("SELECT * FROM data_kegiatan a inner join data_tpq c on a.pelaksana_kgtn = c.id_tpq and a.pelaksana_kgtn = '$selectedit2->id_tpq    '");
                    ?>
                    <table class="display nowrap" cellspacing="0" width="100%" id="table_export2">    
                        <thead>
                        <th>#</th>                    
                        <th>Nama Kegiatan</th>                                
                        <th>Tgl Kegiatan</th>                    
                        <th><center>Aksi</center></th>
                        </tr>
                        </thead>
                        <tbody>            
                            <?php
                            $num = 1;
                            while ($hsl = mysql_fetch_object($query_kgtn)) {
                                echo '<td >' . $num . '</td>';
                                echo '<td ><a href="detail-kgtn-tpq.php?detail=' . $hsl->id_kgtn . '">' . $hsl->nama_kgtn . '</a></td>';
                                echo '<td >' . $hsl->tgl_kgtn . '</td >';
                                ?>
                            <td><center>
                                <a  href="detail-kgtn-tpq.php?detail=<?= $hsl->id_kgtn; ?>" class="btn btn-default btn-sm" ><span class="glyphicon glyphicon-eye-open"></span></a>
                            </center>
                            </td>


                            </tr>					

                            <?php
                            $num++;
                        }
                        ?>
                    </table>
                </div>                
            </div>
            </div>

            <?php
            ?>

            <div class="panel-footer">
                <a href="detail-tpq.php?detail=<?= $idedit ?>" class="btn btn-warning btn-md"><span class="fa fa-angle-left" aria-hidden="true" title="kembali"></span> Kembali</a>
                <button type="submit" name="btn_ubah" class="btn btn-success btn-md" ><i class="fa fa-save"></i>&nbsp;Simpan</button>
            </div>


            </form>
            <?php
            if (isset($_POST['btn_ubah'])) {                
                $input = new stdClass();
                $input->id = $_POST['tx_id_tpq'];
                $input->nm_tpq = antiinjection($_POST['tx_nm_tpq']);
                $input->kpl = antiinjection($_POST['tx_kpl_tpq']);
                $input->pbn = antiinjection($_POST['tx_pmbn_tpq']);
                $input->ds = antiinjection($_POST['tx_desa']);
                $input->jml_k = antiinjection($_POST['tx_jml_tpq']);
                $input->kontak = antiinjection($_POST['tx_kontak_tpq']);
                $input->almt = antiinjection($_POST['tx_alamat']);
                $old_files = array('', $_POST['old_logo'], $_POST['old_foto']);
//            print_r($old_files);
                $files_name = array('', $_FILES['file_logo']['name'], $_FILES['file_foto']['name']);
//            print_r($files_name);
                $files_size = array('', $_FILES['file_logo']['size'], $_FILES['file_foto']['size']);
//            print_r($files_size);
                $files_ext = array('', $_FILES['file_logo']['type'], $_FILES['file_foto']['type']);
//            print_r($files_ext);
                $files_tmp = array('', $_FILES['file_logo']['tmp_name'], $_FILES['file_foto']['tmp_name']);
//            print_r($files_tmp);
//            exit();


                $i = 1;
                $image_file_type = array('image/gif', 'image/png', 'image/jpg', 'image/jpeg', '');
                while ($i <= 2) {
                    if ($old_files[$i] != "") {
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
                            $foto_name[] = $old_files[$i];
                        }
                    } else {
                        if ($files_tmp[$i] != "") {
                            if (!in_array($files_ext[$i], $image_file_type)) {
                                $alert = TRUE;
                                $error_ext = "Ekstensi gambar tidak sesuai dengan yang ditentukan (jpg,png,jpg). ";
                            }
                            if ($files_size[$i] > 1000000) {
                                $alert = TRUE;
                                $error_size = "Ukuran gambar melebihi ukuran maksimal (1 MB). ";
                            }
                            if ($files_name[$i] != "") {
                                $nospacename = str_ireplace(" ", "_", $input->id);
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
                        $error .= $error_ext . $error_size;
                        echo "<script>$('#danger').removeAttr('style')</script>";
                        echo "<script> var error = '$error' ; $('#error_message').text(error);</script>";
                        die();
                    }
                }
                $input->name_logo = $foto_name[0];
                $input->name_foto = $foto_name[1];
                $input->id_user = antiinjection($_POST['tx_id_user']);
                $input->pas = antiinjection(md5($_POST['pass_user']));
                $input->email = antiinjection($_POST['tx_id_email']);
                require_once "../db/database.php";
                $isi = "Update data_tpq set id_tpq='" . $input->id . "' , nama_tpq='" . $input->nm_tpq . "' , kepala_tpq='" . $input->kpl . "', pembina_tpq='" . $input->pbn . "',desa='" . $input->ds . "', jml_kelompok='" . $input->jml_k . "',kontak='" . $input->kontak . "', alamat='" . $input->almt . "', logo = '" . $input->name_logo . "' , foto = '" . $input->name_foto . "'  WHERE id_tpq = '" . $input->id . "'";
                $isi_login = "Update user_entry_login set id_user='" . $input->id_user . "' , id_tpq='" . $input->id . "' , password='" . $input->pas . "', email='" . $input->email . "'  WHERE id_tpq = '" . $input->id . "'";
                $sqltambah = mysql_query($isi) or die(mysql_error());
                $sqllogin = mysql_query($isi_login) or die(mysql_error());

                function upload_foto($foto_name, $tmp_name, $foto_dir) {
                    $datafoto = $foto_dir . basename($foto_name);
                    $movefoto = move_uploaded_file($tmp_name, $datafoto);
                }

                if ($sqltambah == TRUE && $sqllogin == TRUE) {
                    if($files_tmp[1] != ""){
                    $upload_logo = upload_foto($input->name_logo, $files_tmp[1], $dirlogo);                     
                    }
                    if($files_tmp[2] != ""){
                    $upload_foto = upload_foto($input->name_foto, $files_tmp[2], $dirfoto);
                    }
                    ?>
                    <meta http-equiv="refresh" content= "0;URL=?detail=<?= $input->id; ?>"/>
                    <script type="text/javascript">
                        $('#success').removeAttr("style");
                        $('#success_message').text("Data Berhasil Dimasukkan");
                    </script>
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