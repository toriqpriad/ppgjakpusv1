<!doctype html>
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
                                    <input type="hidden" value='<?= $selectdetail2->id_tpq ?> ' class="form-control" disabled>                                
                                    <div class="form-group">
                                        <label>Nama TPQ</label>
                                        <input type="text" class="form-control" value="<?= $selectdetail2->nama_tpq ?>'" disabled>
                                    </div>
                                    <div class="form-group">
                                        <label>Kepala TPQ</label>
                                        <input type="text" value="<?= $selectdetail2->kepala_tpq ?>'" class="form-control" disabled>
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
                                        <input type="text" value="<?= $selectdetail2->kontak ?>'" class="form-control" disabled>
                                    </div>

                                    <div class="form-group">
                                        <label>Alamat</label>
                                        <textarea rows="3" class="form-control" disabled><?= $selectdetail2->alamat ?>'</textarea>
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
                                <br><?php
                                if (empty($getimg) OR ! file_exists($dirlogo . $selectdetail2->logo)) {
                                    echo '<img src="../images/logo_tpq/no_img.jpg" class="img-responsive img-thumbnail" style="width:200px; height:200px;">';
                                } else {
                                    echo '
                            <img src="../images/logo_tpq/' . $selectdetail2->logo . '" class="img-responsive img-thumbnail" style="width:400px; height:420px;">';
                                }
                                ?>
                            </div>
                            <div class="tab-pane" id="foto">
                                <br> <?php
                                if (empty($selectdetail2->foto) OR ! file_exists($dirlogo . $selectdetail2->foto)) {
                                    echo '<img src="../images/logo_tpq/no_img.jpg" class="img-responsive img-thumbnail" style="width:425px; height:300px;">';
                                } else {
                                    echo '
                            <img src="../images/logo_tpq/' . $selectdetail2->foto . '" class="img-responsive img-thumbnail" style="width:200px; height:200px;">';
                                }
                                ?>
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
                                            echo '<td ><a href="detail-mswrh-ppg.php?detail=' . $hsl->id_mswrh . '">' . $hsl->judul_mswrh . '</a></td>';
                                            echo '<td >' . $hsl->tgl_dibuat . '</td >';
                                            ?>
                                        <td><center>
                                            <a title="edit" href="detail-mswrh-ppg.php?edit=<?= $hsl->id_mswrh; ?>" class="btn btn-default btn-sm"><span class="glyphicon glyphicon-edit" title="Ganti"></span></a>
                                            <a title="hapus" href="?hapus=<?= $hsl->id_mswrh; ?>" class="btn btn-default btn-sm" onclick='return confirm("Yakin menghapus data ini?")'><span class="glyphicon glyphicon-trash" title="Hapus"></span></a>
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
                                            echo '<td ><a href="detail-kgtn-ppg.php?detail=' . $hsl->id_kgtn . '">' . $hsl->nama_kgtn . '</a></td>';
                                            echo '<td >' . $hsl->tgl_kgtn . '</td >';
                                            ?>
                                        <td><center>
                                            <a title="edit" href="detail-kgtn-tpq.php?<?= $hsl->id_kgtn; ?>" class="btn btn-default btn-sm"><span class="glyphicon glyphicon-edit" title="Ganti"></span></a>
                                            <a title="hapus" href="?hapus=<?= $hsl->id_kgtn; ?>" class="btn btn-default btn-sm" onclick='return confirm("Yakin menghapus data ini?")'><span class="glyphicon glyphicon-trash" title="Hapus"></span></a>
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
                        <a href="?edit=<?= $selectdetail2->id_tpq; ?>" class="btn btn-info"><span class="glyphicon glyphicon-pencil" aria-hidden="true" title="Ubah"></span> Ubah</a>
                        <a href="data-tpq.php?hapus=<?= $selectdetail2->id_tpq; ?>" onclick="return confirm('Yakin menghapus data ini?')" class="btn btn-danger"><span class="glyphicon glyphicon-trash" aria-hidden="true" title="Hapus"></span> Hapus</a>            

                    </div>
                </div>			
                <script type="text/javascript">
                    jQuery(document).ready(function ($) {
                        $("#tabs").tab();
                    });
                </script>    
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
                echo "Data tidak ditemukan";
            } else {
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
                        <div class="form-group">
                            <form  method="post" enctype="multipart/form-data">                            
                                <input type="hidden" name="tx_id_tpq"  class="form-control" value='<?= $selectedit2->id_tpq ?>' >                            
                                <div class="form-group">
                                    <label>Nama TPQ</label>
                                    <input type="text" class="form-control" name="tx_nm_tpq" value="<?= $selectedit2->nama_tpq ?>'">
                                </div>  
                                <div class="form-group">
                                    <label>Kepala TPQ</label>
                                    <input type="text" name="tx_kpl_tpq" class="form-control" value="<?= $selectedit2->kepala_tpq ?>">
                                </div>
                                <div class="form-group">
                                    <label>Pembina TPQ</label>
                                    <input type="text" name="tx_pmbn_tpq" class="form-control" value="<?= $selectedit2->pembina_tpq ?>">
                                </div>
                                <div class="form-group">
                                    <label>Desa</label>
                                    <input type="text" name="tx_desa" class="form-control" value="<?= $selectedit2->desa ?>">
                                </div>
                                <div class="form-group">
                                    <label>Jumlah Kelompok</label>
                                    <input type="text" name="tx_jml_tpq" class="form-control" value='<?= $selectedit2->jml_kelompok ?>'>
                                </div>
                                <div class="form-group">
                                    <label>Kontak</label>
                                    <input type="text" name="tx_kontak_tpq" class="form-control" value='<?= $selectedit2->kontak ?>'>
                                </div>		
                                <div class="form-group">
                                    <label>Alamat</label>
                                    <textarea rows="3" class="form-control" name="tx_alamat"><?= $selectedit2->alamat ?></textarea>
                                </div>  		
                                <blockquote><p><h3>Informasi User Entry Login</h3></p></blockquote>
                                <div class="form-group">
                                    <label>Username</label>
                                    <input type="text" name="tx_id_user" class="form-control" value='<?= $selectedit2->id_user ?>' required>
                                </div>			
                                <div class="form-group">
                                    <label>Password</label>
                                    <input id="pwd0"  class="form-control" type="password"  name="pass_user" value='<?= $selectedit2->password ?> ' required>			
                                </div>		
                                <div class="form-group">
                                    <label>Email</label>
                                    <input type="email" name="tx_id_email" class="form-control" value='<?= $selectedit2->email ?> ' required>
                                </div>		
                        </div>
                    </div>
                    <div class="tab-pane" id="logo">
                        <br><?php
                        if (empty($selectedit2->logo) OR ! file_exists($dirlogo . $selectedit2->logo)) {
                            echo '<img src="../images/logo_tpq/no_img.jpg" class="img-responsive img-thumbnail" style="width:200px; height:200px;">';
                        } else {
                            echo '
                        <img src="../images/logo_tpq/' . $selectedit2->logo . '" class="img-responsive img-thumbnail" style="width:400px; height:420px;">';
                        }
                        ?>	
                        <input type="hidden" name="old_logo" value="' . $selectedit2->logo . '">
                        <output id="gambar_nodin"></output>
                        <input type="file" name="Filegambar" id="preview_gambar" class="btn btn-info" value=' . $selectedit2->logo . '/>';
                        ?>
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
                    <?php
                    ?>


                    <div class="tab-pane" id="foto">
                        <br><?php
                        if (empty($selectedit2->foto) OR ! file_exists($dirfoto . $selectedit2->foto)) {
                            echo '<img src="../images/logo_tpq/no_img.jpg" class="img-responsive img-thumbnail" style="width:200px; height:200px;">';
                        } else {
                            echo '
                        <img src="../images/logo_tpq/' . $selectedit2->foto . '" class="img-responsive img-thumbnail" style="width:400px; height:420px;">';
                        }
                        ?>
                        <input type="hidden" name="old_foto" value="' . $selectedit2->foto . '">
                        <output id="gambar_nodin2"></output>
                        <input type="file" name="Filegambar2" id="preview_gambar2" class="btn btn-info" value=' . $selectedit2->foto . '/>';
                        ?>
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
                                    echo '<td ><a href="detail-mswrh-ppg.php?detail=' . $hsl->id_mswrh . '">' . $hsl->judul_mswrh . '</a></td>';
                                    echo '<td >' . $hsl->tgl_dibuat . '</td >';
                                    ?>
                                <td><center>
                                    <a title="edit" href="detail-mswrh-ppg.php?edit=<?= $hsl->id_mswrh; ?>" class="btn btn-default btn-sm"><span class="glyphicon glyphicon-edit" title="Ganti"></span></a>
                                    <a title="hapus" href="?hapus=<?= $hsl->id_mswrh; ?>" class="btn btn-default btn-sm" onclick='return confirm("Yakin menghapus data ini?")'><span class="glyphicon glyphicon-trash" title="Hapus"></span></a>
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
                                    echo '<td ><a href="detail-kgtn-ppg.php?detail=' . $hsl->id_kgtn . '">' . $hsl->nama_kgtn . '</a></td>';
                                    echo '<td >' . $hsl->tgl_kgtn . '</td >';
                                    ?>
                                <td><center>
                                    <a title="edit" href="detail-kgtn-ppg.php?edit=<?= $hsl->id_kgtn; ?>" class="btn btn-default btn-sm"><span class="glyphicon glyphicon-edit" title="Ganti"></span></a>
                                    <a title="hapus" href="?hapus=<?= $hsl->id_kgtn; ?>" class="btn btn-default btn-sm" onclick='return confirm("Yakin menghapus data ini?")'><span class="glyphicon glyphicon-trash" title="Hapus"></span></a>
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

                <?php
                ?>

                <div class="panel-footer">
                    <a href="detail-tpq.php?detail=' . $idedit . '" class="btn btn-warning btn-md"><span class="fa fa-angle-left" aria-hidden="true" title="kembali"></span> Kembali</a>
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

                if (empty($_FILES['Filegambar']['tmp_name'])) {
                    $input->logo = $_POST['old_logo'];
                } else {
                    $input->logo = $_FILES['Filegambar']['name'];
                }
                if (empty($_FILES['Filegambar2']['tmp_name'])) {
                    $input->foto = $_POST['old_foto'];
                } else {
                    $input->foto = $_FILES['Filegambar2']['name'];
                }
                $ext_logo = end((explode(".", $input->logo)));
                $ext_foto = end((explode(".", $input->foto)));
                $string = preg_replace("/[^A-Za-z0-9 ]/", '', $input->id);
                $string = str_ireplace(" ", "_", $string);
                $input->logo = strtolower($string . "_LOGO" . '.' . $ext_logo);
                $input->foto = strtolower($string . "_FOTO" . '.' . $ext_foto);
                $input->id_user = antiinjection($_POST['tx_id_user']);
                $input->pas = antiinjection(md5($_POST['pass_user']));
                $input->email = antiinjection($_POST['tx_id_email']);
                require_once "../db/database.php";
                $isi = "Update data_tpq set id_tpq='" . $input->id . "' , nama_tpq='" . $input->nm_tpq . "' , kepala_tpq='" . $input->kpl . "', pembina_tpq='" . $input->pbn . "',desa='" . $input->ds . "', jml_kelompok='" . $input->jml_k . "',kontak='" . $input->kontak . "', alamat='" . $input->almt . "', logo = '" . $input->logo . "' , foto = '" . $input->foto . "'  WHERE id_tpq = '" . $input->id . "'";
                $isi_login = "Update user_entry_login set id_user='" . $input->id_user . "' , id_tpq='" . $input->id . "' , password='" . $input->pas . "', email='" . $input->email . "'  WHERE id_tpq = '" . $input->id . "'";
                $sqltambah = mysql_query($isi) or die(mysql_error());
                $sqllogin = mysql_query($isi_login) or die(mysql_error());
                if (!empty($_FILES['Filegambar']['tmp_name']) OR ! empty($_FILES['Filegambar2']['tmp_name'])) {
                    $dirlogo = "../images/logo_tpq/";
                    $dirfoto = "../images/foto_tpq/";
                    if (!empty($_FILES['Filegambar']['tmp_name'])) {
                        if (file_exists($dirfoto . $_POST['old_logo'])) {
                            $deloldlogo = unlink($dirlogo . $_POST['old_logo']);
                        }
                        $logo_data = $dirlogo . $input->logo;
                        $logo_move = move_uploaded_file($_FILES['Filegambar']['tmp_name'], $logo_data);
                    }
                    if (!empty($_FILES['Filegambar2']['tmp_name'])) {
                        if (file_exists($dirfoto . $_POST['old_foto'])) {
                            $deloldfoto = unlink($dirfoto . $_POST['old_foto']);
                        }
                        $foto_data = $dirfoto . $input->foto;
                        $foto_move = move_uploaded_file($_FILES['Filegambar2']['tmp_name'], $foto_data);
                    }
                }
                if ($sqltambah && $sqllogin) {
                    echo '<meta http-equiv="refresh" content="0;url=detail-tpq.php?detail=' . $input->id . '">';
                } else {
                    echo "<script type='text/javascript'>alert('Data gagal diubah')</script>";
                }
            }
        }
    }
}
?>
</body></html>		