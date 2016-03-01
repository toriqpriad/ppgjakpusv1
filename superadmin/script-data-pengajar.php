<?php
require_once "../db/database.php";
$query2 = mysql_query("SELECT * FROM data_pengajar inner join data_tpq on data_pengajar.tpq_desa=data_tpq.id_tpq");
$numrowslihat = mysql_num_rows($query2);
?>	
<div class="panel panel-default">
        <!-- <a class="panel-heading">Pengajar <span class="label label-warning">+15</span> </a> -->
    <div class="panel-heading">Keseluruhan Data Pengajar</div>			
    <div class="panel-body">
        <table class="display nowrap" cellspacing="0" width="100%" id="table_export">
            <thead>
                <tr class="warning">
                    <th>#</th>
                    <th>ID</th>
                    <th>Nama</th>
                    <th>Jns Kelamin</th>
<!--                    <th>Tmp Lahir</th>
                    <th>Tgl Lahir</th>-->
<!--                    <th>Status</th>-->
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
                    echo '									
					<td ><a href="detail-pengajar.php?detail=' . $hsl->id_peng . '">' . $hsl->id_peng . '</a></td>
					<td >' . $hsl->nm_peng . '</td>
					<td >' . $hsl->j_klmn . '</td>					
							
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
                                <div class="form-group">
                                    <form  method="post" enctype="multipart/form-data">
                                        <label>ID Pengajar</label>
                                        <input type="text" name="tx_id_peng"  class="form-control" value="<?php echo autoNumber(); ?>" required>
                                        </div>
                                        <div class="form-group">
                                            <label>Nama Pengajar</label>
                                            <input type="text" class="form-control" name='tx_nm_peng' required>
                                        </div>
                                        <div class="form-group">
                                            <label>Jenis Kelamin</label>
                                            <select name="tx_jklmn" class="form-control input-md" required>
                                                <option value="Pria">Pria</option>
                                                <option value="SD">Wanita</option>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label>Tempat Lahir</label>
                                            <input type="text" name="tx_tmp_lhr" class="form-control" required>
                                        </div>
                                        <div class="form-group">
                                            <label>Tanggal Lahir</label>
                                            <div class="input-group date form_date col-md-5" data-date="" data-date-format="dd/mm/yyyy" data-link-field="dtp_input2" data-link-format="yyyy-mm-dd" required>
                                                <input class="form-control" size="10" type="text" name="tx_tgl_lhr">
                                                <span class="input-group-addon"><span class="glyphicon glyphicon-calendar"></span></span>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label>Pendidikan Akhir</label>
                                            <select name="tx_pdkn" class="form-control input-md">
                                                <option value="SD">SD</option>
                                                <option value="SMP">SMP</option>
                                                <option value="SMA">SMA</option>
                                                <option value="D3">D3</option>
                                                <option value="S1">S1</option>
                                                <option value="S2">S2</option>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <input type="text" name="tx_ket_pdkn" class="form-control" placeholder="Nama Sekolah/Universitas(Fakultas)">
                                        </div>
                                        <div class="form-group">
                                            <label>Status</label>
                                            <select name="tx_status" class="form-control input-md" required>
                                                <option value="Pribumi">Pribumi</option>
                                                <option value="MT">Mubalegh Tugasan</option>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label>Pernikahan</label>
                                            <select name="tx_nkh" class="form-control input-md" required>
                                                <option value="Sudah Menikah">Sudah Menikah</option>
                                                <option value="Belum Menikah">Belum Menikah</option>
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
                                                    if ($query_kat)
                                                        while ($x <= $numrowslihat_kat) {
                                                            while ($hsl_kat = mysql_fetch_object($query_kat)) {

                                                                echo '<option value="' . $hsl_kat->id_tpq . '" >' . $hsl_kat->nama_tpq . ' - ' . $hsl_kat->desa . '</option>';
                                                                $nmtpq = $hsl_kat->nama_tpq;
                                                                $x++;
                                                            }
                                                        }
                                                    ?>

                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label>Kelas Ajar</label>
                                            <select name="tx_kls" class="form-control input-md">
                                                <option value="Caberawit">Caberawit</option>
                                                <option value="Praremaja">Praremaja</option>
                                                <option value="Remaja">Remaja</option>
                                            </select>
                                        </div>

                                        <div class="form-group">
                                            <label>Kontak</label>
                                            <input type="text" name="tx_kontak" class="form-control" >
                                        </div>

                                        <div class="form-group">
                                            <label>Alamat</label>
                                            <textarea rows="3" class="form-control" name="tx_alamat"></textarea>
                                        </div>
                                </div>


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
                                                        divOne.innerHTML = '<img id="img_prev2" style="width: 300px; height: 300px;" src="' + evt.target.result + '" class="img-responsive img-thumbnail" src="no"/>';
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
                        <button type="button" class="btn btn-default btn-md" data-dismiss="modal"><i class="fa fa-times"></i>&nbsp;Tutup</button>
                        <button type="submit" name="simpan" class="btn btn-success btn-md"><i class="fa fa-save"></i>&nbsp;Simpan</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <?php
        if (isset($_POST['simpan'])) {
//            $input = new stdClass()
            $id = $_POST['tx_id_peng'];
            $klmn = antiinjection($_POST['tx_jklmn']);
            $nm_p = antiinjection($_POST['tx_nm_peng']);
            $tmp_lhr = antiinjection($_POST['tx_tmp_lhr']);
            $tgl_lhr = antiinjection($_POST['tx_tgl_lhr']);
            $pdkn = antiinjection($_POST['tx_pdkn']);
            $pdkn_ket = antiinjection($_POST['tx_ket_pdkn']);
            $sts_p = antiinjection($_POST['tx_status']);
            $nkh_p = antiinjection($_POST['tx_nkh']);
            $tpq_ds = antiinjection($_POST['tx_tpq']);
            $kls = $_POST['tx_kls'];
            $kontak = antiinjection($_POST['tx_kontak']);
            $almt = mysql_escape_string($_POST['tx_alamat']);
            if (!empty($_FILES['Filegambar2']['tmp_name'])) {
                $foto = $_FILES['Filegambar2']['name'];
                $dir_foto = "../images/foto_pengajar/";
                $ext_foto = end((explode(".", $foto)));
                $string = preg_replace("/[^A-Za-z0-9 ]/", '', $id);
                $string = str_ireplace(" ", "_", $string);
                $foto_name = strtolower($string . "_FOTO" . '.' . $ext_foto);
            } else {
                $foto_name = "";
            }
            require_once "../db/database.php";
            $isi = "INSERT INTO data_pengajar VALUES('$id','$nm_p','$klmn','$tmp_lhr','$tgl_lhr','$pdkn','$pdkn_ket','$sts_p','$nkh_p','$tpq_ds','$kls','$kontak','$almt','$foto_name')";
            $sqltambah = mysql_query($isi) or die(mysql_error());
            if (!empty($_FILES['Filegambar2']['tmp_name'])) {
                $foto_data = $dir_foto . $foto_name;
                $move_foto = move_uploaded_file($_FILES['Filegambar2']['tmp_name'], $foto_data);
            }
            if ($sqltambah) {
                ?>
                <script type="text/javascript">
                    alert("Data sudah disimpan");
                    window.location.href = 'detail-pengajar.php?detail=<?php echo $id; ?>';
                </script>
                <?php
            }
            if (!$sqltambah) {
                echo '<script type="text/javascript"> 	alert("Data gagal disimpan");	</script>';
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
            echo '<script type="text/javascript">alert("Data sudah dihapus")';
            ?>
            var table = $('#table_export').DataTable( {
            ajax: "data.json"
            } );

            setInterval( function () {
            table.ajax.reload();
            }, 30000 );
            <?php
            echo '</script>';
        } else {
            echo '<script type="text/javascript"> 	alert("Data gagal dihapus!!");	</script>';
            echo $hapus;
        }
    }
    ?>		