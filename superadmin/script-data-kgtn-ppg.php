<?php
require_once "../db/database.php";
$query2 = mysql_query("SELECT * FROM data_kegiatan a 
         left outer join data_bidang_ppg b on a.pelaksana_kgtn = b.id_bid 
         left outer join data_tpq c on a.pelaksana_kgtn = c.id_tpq ");
$numrowslihat = mysql_num_rows($query2);
?>	
<div class="panel panel-default">	
    <div class="panel-heading">Keseluruhan Data Kegiatan PPG </div>		
    <div class="panel-body">            
        <!-- Tab panes -->                
        <div id="success" class="alert alert-success alert-dismissable" style="display:none"><span id="success_message"></span><button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button></div>
        <table class="display nowrap" cellspacing="0" width="100%" id="table_export">    
            <thead>
            <th>#</th>                    
            <th>Nama Kegiatan</th>
            <th>Pelaksana</th>            
            <th>Tgl Kegiatan</th>                    
            <th><center>Aksi</center></th>
            </tr>
            </thead>
            <tbody>            
                <?php
                $num = 1;
                while ($hsl = mysql_fetch_object($query2)) {
                    if ($hsl->nama == NULL) {
                        $pelaksana = 'TPQ ' . $hsl->nama_tpq . '- Desa ' . $hsl->desa;
                    } else {
                        $pelaksana = $hsl->nama;
                    }
                    echo '<td >' . $num . '</td>';
                    echo '<td ><a href="detail-kgtn-ppg.php?detail=' . $hsl->id_kgtn . '">' . $hsl->nama_kgtn . '</a></td>';
                    echo '<td >' . $pelaksana . '</td >';
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
                        <div id="danger" class="alert alert-danger alert-dismissable" style="display:none"><span id="error_message"></span><button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button></div>
                        <form  method="post" enctype="multipart/form-data" >                                  
                            <div class="form-group">
                                <label>Nama Kegiatan </label>
                                <input type="text" value="<?php
                                if (isset($_POST['nama_kgtn'])) {
                                    echo $_POST['nama_kgtn'];
                                } else {
                                    echo '';
                                }
                                ?>" class="form-control" name='nama_kgtn' placeholder="Nama Kegiatan" required>
                            </div>                           
                            <div class="form-group">
                                <label>Tanggal Kegiatan</label>
                                <div class="input-group date form_date col-md-5" data-date="" data-date-format="dd/mm/yyyy" data-link-field="dtp_input2" data-link-format="yyyy-mm-dd" placeholder="dd/mm/yyyy">
                                    <input class="form-control" size="10" type="text" value="<?php
                                    if (isset($_POST['tgl_kgtn'])) {
                                        echo $_POST['tgl_kgtn'];
                                    } else {
                                        echo '';
                                    }
                                    ?>" name="tgl_kgtn" required placeholder="dd/mm/yyy">
                                    <span class="input-group-addon"><span class="glyphicon glyphicon-calendar"></span></span>
                                </div>
                            </div>
                            <div class="form-group">
                                <label>Pelaksana</label>
                                <select name="pelaksana" class="form-control input-md">
                                    <?php
                                    $sql_pelaksana = mysql_query("select `id_bid`,`nama`,`tipe_bidang` from data_bidang_ppg");
                                    while ($get_pelaksana = mysql_fetch_object($sql_pelaksana)) {
                                        echo '<option value="' . $get_pelaksana->id_bid . '-' . $get_pelaksana->tipe_bidang . '">' . $get_pelaksana->nama . '</option>';
                                    }
                                    ?>
                                </select>
                            </div>

                            <div class="form-group">
                                <label>Deskripsi Kegiatan</label>
                                <textarea class="form-control" name="desk_kgtn" style="max-height: 350px;    overflow:auto;resize:none"><?php
                                    if (isset($_POST['desk'])) {
                                        echo $_POST['desk'];
                                    } else {
                                        echo '';
                                    }
                                    ?></textarea>
                            </div>                                    

                            <div class="form-group">
                                <label>Foto Kegiatan</label>                               
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="panel">
                                            <div class="panel-heading">Foto 1 (Wajib)</div>
                                            <div class="panel-body">
                                                <img src="../images/foto_kgtn/ppg/no_img.jpg" id="gambar_nodin1"  alt="Preview Gambar" class="img-thumbnail img-responsive img-preview"/>                                                                                        
                                                <input type="file" name="img_1" id="preview_gambar1" class="btn btn-default btn-xs"/>
                                                <br>                                                                                        
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-4">
                                        <div class="panel">
                                            <div class="panel-heading">Foto 2</div>
                                            <div class="panel-body">
                                                <img src="../images/foto_kgtn/ppg/no_img.jpg" id="gambar_nodin2"  alt="Preview Gambar" class="img-thumbnail img-responsive img-preview"/>                                                
                                                <input type="file" name="img_2" id="preview_gambar2" class="btn btn-default btn-xs"/>
                                                <br>                                                                                        
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="panel">
                                            <div class="panel-heading">Foto 3 </div>
                                            <div class="panel-body">
                                                <img src="../images/foto_kgtn/ppg/no_img.jpg" id="gambar_nodin3"  alt="Preview Gambar" class="img-thumbnail img-responsive img-preview"/>                                                
                                                <input type="file" name="img_3" id="preview_gambar3" class="btn btn-default btn-xs"/>
                                                <br>                                                                                      
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                    </div>    
                </div>                                    
                <div class="modal-footer">
                    <button type="button" class="btn btn-default btn-md" data-dismiss="modal"><i class="fa fa-times"></i>&nbsp;Tutup</button>
                    <button type="submit" name="simpan" class="btn btn-success btn-md" onclick="myFunction()"><i class="fa fa-save"></i>&nbsp;Simpan</button>
                    </form>
                </div>
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
<style>
    .img-preview{
        width: 350px; 
        height:300px;
    }
    
</style>    
<?php

function tambah() {
    if (isset($_POST['simpan'])) {
        $input = new stdClass();
        $input->nama_kgtn = antiinjection($_POST['nama_kgtn']);
        $input->tgl = antiinjection($_POST['tgl_kgtn']);
        $input->tipepelaksana = explode('-', $_POST['pelaksana']);
        $input->pelaksana = $input->tipepelaksana[0];
        $input->tipe_kgtn = $input->tipepelaksana[1];
        $input->desk = mysql_escape_string($_POST['desk_kgtn']);
        $files_name = array('', $_FILES['img_1']['name'], $_FILES['img_2']['name'], $_FILES['img_3']['name']);
        $files_size = array('', $_FILES['img_1']['size'], $_FILES['img_2']['size'], $_FILES['img_3']['size']);
        $files_ext = array('', $_FILES['img_1']['type'], $_FILES['img_2']['type'], $_FILES['img_3']['type']);
        $files_tmp = array('', $_FILES['img_1']['tmp_name'], $_FILES['img_2']['tmp_name'], $_FILES['img_3']['tmp_name']);
        $errors = "Terjadi kesalahan : ";
        $i = 1;
        $image_file_type = array('image/gif', 'image/png', 'image/jpg', '');
        while ($i <= 3) {            
            if ($files_size[1] == "") {
                $alert = TRUE;
                $foto1_kosong = "Foto pertama harus diunggah. ";
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
            $i++;
        }
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
        $input->isi = "INSERT INTO data_kegiatan VALUES(NULL,'$input->tipe_kgtn','$input->nama_kgtn','$input->desk','$input->tgl','$input->pelaksana','$input->foto_1','$input->foto_2','$input->foto_3',now(),now())";
        $sqltambah = mysql_query($input->isi);
//                                echo '<pre>';print_r($input);echo '</pre>';die();
        $folderfoto = '../images/foto_kgtn/ppg/';

        function upload_foto($foto_name, $tmp_name, $foto_dir) {
            $datafoto = $foto_dir . basename($foto_name);
            $movefoto = move_uploaded_file($tmp_name, $datafoto);
        }

        if ($sqltambah == true) {
            $upload_foto_1 = upload_foto($input->foto_1, $files_tmp[1], $folderfoto);
            $upload_foto_2 = upload_foto($input->foto_2, $files_tmp[2], $folderfoto);
            $upload_foto_3 = upload_foto($input->foto_3, $files_tmp[3], $folderfoto);
            ?>            
            <script type="text/javascript">
                $('#success').removeAttr("style");
                $('#success_message').text("Data Berhasil Dimasukkan");
                $('#table_export').ajax.reload();                
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
    $hapus = "DELETE FROM `data_kegiatan` WHERE `id_kgtn` = '" . $_GET['hapus'] . "'";
    $sqlhapus = mysql_query($hapus);

    if ($sqlhapus) {
        ?>
        <script type="text/javascript">
            $(document).ready(function () {
                table_data.ajax.reload();
            });</script>
        <?php
    } else {
        echo '<script type="text/javascript"> 	alert("Data gagal dihapus!!");	</script>';
    }
}
?>

