<?php
require_once "../db/database.php";
$query2 = mysql_query("SELECT * FROM data_remaja inner join data_tpq on data_tpq.id_tpq=data_remaja.tpq_desa");
$numrowslihat = mysql_num_rows($query2);
?>

<div class="panel panel-default">	
    <div class="panel-heading">Keseluruhan Data Remaja</div>	
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
                    <th>Pendidikan/Status</th>
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
                    echo '									
					<td ><a href="detail-remaja.php?detail=' . $hsl->id_rmj . '">' . $hsl->id_rmj . '</a></td>
					<td >' . $hsl->nm_rmj . '</td>
					<td >' . $hsl->j_klmn . '</td>					
					<td>';
                    $kls = $hsl->kls;
                    if (empty($kls)) {
                        echo $hsl->pdkn;
                        echo " di ";
                        echo $hsl->nm_sklh;
                    } else {
                        echo $hsl->pdkn;
                        echo "-Kelas ";
                        echo $hsl->kls;
                        echo " di ";
                        echo $hsl->nm_sklh;
                    }
                    echo '</td>
					
					<td >' . $hsl->nama_tpq . ' - ' . $hsl->desa . '</td>
					<td >' . $hsl->kontak_rmj . '</td>
					<td >' . $hsl->alamat_rmj . '</td>';
                    ?>
                <td><center>
                    <a href="detail-remaja.php?edit=<?= $hsl->id_rmj; ?>" class="btn btn-sm btn-default"><span class="glyphicon glyphicon-edit" title="Ganti"></span></a>
                    <a href="?hapus=<?= $hsl->id_rmj; ?>" onclick='return confirm("Yakin menghapus data ini?")' class="btn btn-sm btn-default"><span class="glyphicon glyphicon-trash" title="Hapus"></span></a>
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
                        <li class="active"><a href="#profil" data-toggle="tab">Profil Remaja</a></li>
                        <li><a href="#foto" data-toggle="tab">Foto Remaja</a></li>


                    </ul>
                    <div id="my-tab-content" class="tab-content">
                        <div class="tab-pane active" id="profil">

                            <br>
                            <form  method="post" enctype="multipart/form-data">
                                <!--
                                <div class="form-group">
                                <label>ID Remaja</label>
                        <input type="text" name="tx_id_rmj"  class="form-control" value="<?php //echo autoNumber();      ?>" >
                        </div>
                                -->
                                <div class="form-group">
                                    <label>Nama Remaja</label>
                                    <input type="text" class="form-control" name='tx_nm_rmj' placeholder="Nama" required>
                                </div>
                                <div class="form-group">
                                    <label>Jenis Kelamin</label>
                                    <select name="tx_jklmn" class="form-control input-md" required>
                                        <option value="Pria">Pria</option>
                                        <option value="Wanita">Wanita</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label>Tempat Lahir</label>
                                    <input type="text" name="tx_tmp_lhr" class="form-control" placeholder="Tempat Lahir" required>
                                </div>
                                <div class="form-group">
                                    <label>Tanggal Lahir</label>
                                    <div class="input-group date form_date col-md-5" data-date="" data-date-format="dd/mm/yyyy" data-link-field="dtp_input2" data-link-format="yyyy-mm-dd" placeholder="dd/mm/yyyy">
                                        <input class="form-control" size="10" type="text" name="tx_tgl_lhr" required placeholder="dd/mm/yyy">
                                        <span class="input-group-addon"><span class="glyphicon glyphicon-calendar"></span></span>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label>Pendidikan/Status</label>
                                    <select name="tx_pdkn" class="form-control input-md">
                                        <option value="SMA">SMA</option>
                                        <option value="SMK">SMK</option>
                                        <option value="MTA">MTA</option>
                                        <option value="Mahasiswa">Mahasiswa</option>
                                        <option value="Bekerja">Bekerja</option>


                                    </select>
                                </div>
                                <div class="form-group">
                                    <label>Kelas (Khusus pelajar SMA/SMK/MTA)</label>
                                    <select name="tx_kls" class="form-control input-md">
                                        <option value="7">10</option>
                                        <option value="8">11</option>
                                        <option value="9">12</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label>Nama Sekolah/Universitas/Tempat Kerja<label>
                                            <div class="form-group">
                                                <input type="text" name="tx_nm_sklh" class="form-control" placeholder="Nama Sekolah/Universitas/Tempat Kerja" required>
                                            </div>
                                            <div class="form-group">
                                                <label>Hobi</label>
                                                <input type="text" name="tx_hobi" class="form-control" placeholder="Hobi Remaja">
                                            </div>
                                            <div class="form-group">
                                                <label>TPQ/Desa</label>
                                                <div class="input-group-btn">

                                                    <select class="form-control input-md" name="tx_tpq">
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

                                                                    echo '<option value="' . $hsl_kat->id_tpq . '" >' . $hsl_kat->nama_tpq . '</option>';
                                                                    $nmtpq = $hsl_kat->nama_tpq;
                                                                    $x++;
                                                                }
                                                            }
                                                        ?>

                                                    </select>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label>Orang Tua</label>
                                                <input type="text" name="bapak" class="form-control" placeholder="Nama Bapak">
                                            </div>
                                            <div class="form-group">
                                                <input type="text" name="ibu" class="form-control" placeholder="Nama Ibu">
                                            </div>

                                            <div class="form-group">
                                                <label>Kontak</label>
                                                <input type="text" name="tx_kontak" class="form-control" placeholder="08XXXXXXXXXX">
                                            </div>

                                            <div class="form-group">
                                                <label>Alamat</label>
                                                <textarea rows="3" class="form-control" name="tx_alamat" placeholder="Alamat"></textarea>
                                            </div>
                                            </div>
                                            </div>

                                            <div class="tab-pane" id="foto">
                                                <br>
                                                <input type="file" class="btn btn-default" name="Filegambar2" id="filesToUpload2">
                                                <br>
                                                <div class="row col-sm-12">	
                                                    <output id="filesInfo2"></output>
                                                </div>

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
                                                                    divOne.innerHTML = '<img id="img_prev2" style="width: 20; height: 30;" src="' + evt.target.result + '" class="img-responsive img-thumbnail" src="no"/>';
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
                    <button type="submit" name="simpan" class="btn btn-success btn-md" data-dismiss="modal"><i class="fa fa-save"></i>&nbsp;Simpan</button>
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
                                            <?php

                                            function tambah() {
                                                if (isset($_POST['simpan'])) {
                                                    //$id=$_POST['tx_id_peng'];
                                                    $nm = $_POST['tx_nm_rmj'];
                                                    $klmn = $_POST['tx_jklmn'];
                                                    $nm_p = mysql_real_escape_string($nm);
                                                    $tmp_lhr = $_POST['tx_tmp_lhr'];
                                                    $tgl_lhr = $_POST['tx_tgl_lhr'];
                                                    $pdkn = $_POST['tx_pdkn'];
                                                    $kls = $_POST['tx_kls'];
                                                    $nm_sklh = $_POST['tx_nm_sklh'];
                                                    $nm_sklh_p = mysql_real_escape_string($nm_sklh);
                                                    $kls = $_POST['tx_kls'];
                                                    $kls = mysql_real_escape_string($kls);
                                                    $hobi = $_POST['tx_hobi'];
                                                    $tpq_ds = $_POST['tx_tpq'];
                                                    $nm_tpq = $nmtpq;
                                                    $bapak = $_POST['bapak'];
                                                    $ibu = $_POST['ibu'];
                                                    $kontak = $_POST['tx_kontak'];
                                                    $almt = $_POST['tx_alamat'];
                                                    $foto = $_FILES['Filegambar2']['name'];

                                                    require_once "../db/database.php";
                                                    $query = "SELECT MAX(RIGHT(id_rmj, 4)) as max_id FROM data_remaja ORDER BY id_rmj";
                                                    $result = mysql_query($query);
                                                    $data = mysql_fetch_array($result);
                                                    $id_max = $data['max_id'];
                                                    $sort_num = (int) substr($id_max, 2, 4);
                                                    $sort_num++;
                                                    $gmx = "RMJ";
                                                    $new_code = sprintf("%02s", $sort_num, $gmx);
                                                    $new_code_2 = "$gmx$new_code";
                                                    $id = $new_code_2;

                                                    $isi = "INSERT INTO data_remaja VALUES('$id','$nm_p','$klmn','$tmp_lhr','$tgl_lhr','$pdkn','$kls','$nm_sklh_p','$hobi','$tpq_ds','$nm_tpq','$bapak','$ibu','$kontak','$almt','$foto')";
                                                    echo $isi;
                                                    $sqltambah = mysql_query($isi) or die(mysql_error());
                                                    $dir_foto = "../images/foto_rmj/";
                                                    $foto_data = $dir_foto . basename($_FILES['Filegambar2']['name']);
                                                    $move_foto = move_uploaded_file($_FILES['Filegambar2']['tmp_name'], $foto_data);
                                                    if ($sqltambah) {
                                                        ?>
                                                        <script type="text/javascript">
                                                            alert("Data sudah disimpan");
                                                            window.location.href = 'detail-Remaja.php?detail=<?php echo $id; ?>';
                                                        </script>
                                                        <?php
                                                    }
                                                    if (!$sqltambah) {
                                                        echo '<script type="text/javascript"> 	alert("Data gagal disimpan");	</script>';
                                                    }
                                                }
                                                ?>

                                                <?php
                                                if (isset($_GET['hapus'])) {
                                                    require_once "../db/database.php";
                                                    $hapus = "DELETE FROM `data_remaja` WHERE `id_rmj` = '" . $_GET['hapus'] . "'";

                                                    $sqlhapus = mysql_query($hapus);

                                                    if ($sqlhapus) {

                                                        echo '<script type="text/javascript">alert("Data sudah dihapus");window.location.href="data-Remaja.php";	</script>';
                                                    } else {
                                                        echo '<script type="text/javascript"> 	alert("Data gagal dihapus!!");	</script>';
                                                    }
                                                }
                                            }
                                            ?>
	
