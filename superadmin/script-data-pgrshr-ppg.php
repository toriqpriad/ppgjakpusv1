<?php
require_once "../db/database.php";
$query2 = mysql_query("
select * from data_pgrs_ppg a 
join data_bidang_ppg b on a.id_bid = b.id_bid 
join data_tpq c on a.tpq_desa = c.id_tpq
where b.tipe_bidang = 'P'");
$numrowslihat = mysql_num_rows($query2);
?>	

<div class="panel panel-default">	
    <div class="panel-heading">Keseluruhan Data Pengurus Harian PPG </div>		
    <div class="panel-body">
        <table class="display nowrap" cellspacing="0" width="100%" id="table_export">    
            <thead>
            <th>#</th>
            <th>ID</th>
            <th>Nama</th>
            <th>Jns Kelamin</th>            
            <th>Pendidikan</th>
            <th>Bidang</th>
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
					<td ><a href="detail-pgrs-ppg.php?detail=' . $hsl->id_pgrs . '">' . $hsl->id_pgrs . '</a></td>
					<td >' . $hsl->nm_pgrs . '</td>
					<td >' . $hsl->j_klmn . '</td>					
					<td >' . $hsl->pdkn . ' - ' . $hsl->ket_pdkn . ' </td>
                                        <td >' . $hsl->nama . '</td>
					<td >' . $hsl->nama_tpq . ' - ' . $hsl->desa . '</td>                                        
					<td >' . $hsl->kontak . '</td>
					<td >' . $hsl->alamat . '</td>';
                    ?>
                <th><center>
                    <a title="edit" href="detail-pgrs.php?edit=<?= $hsl->id_pgrs; ?>" class="btn btn-default btn-sm"><span class="glyphicon glyphicon-edit" title="Ganti"></span></a>
                    <a title="hapus" href="?hapus=<?= $hsl->id_pgrs; ?>" class="btn btn-default btn-sm" onclick='return confirm("Yakin menghapus data ini?")'><span class="glyphicon glyphicon-trash" title="Hapus"></span></a>
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
                            <li class="active"><a href="#profil" data-toggle="tab">Profil Pengurus PPG</a></li>
                            <li><a href="#foto" data-toggle="tab">Foto Pengurus PPG</a></li>


                        </ul>
                        <div id="my-tab-content" class="tab-content">
                            <div class="tab-pane active" id="profil">

                                <br>
                                <form  method="post" enctype="multipart/form-data" >                                  
                                    <div class="form-group">
                                        <label>Nama </label>
                                        <input type="text" class="form-control" name='tx_nm_pgrs' placeholder="Nama" required>
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
                                        <label>Pendidikan</label>
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
                                        <label>Keterangan</label>
                                        <input type="text" name="ket_pdkn" class="form-control" placeholder="Keterangan Pendidikan" required>
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
                                        <label>Pernikahan</label>
                                        <select name="tx_nkh" class="form-control input-md" required>
                                            <option value="Sudah Menikah">Sudah Menikah</option>
                                            <option value="Belum Menikah">Belum Menikah</option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label>Email</label>
                                        <input type="text" name="tx_email" class="form-control" placeholder = "Email">
                                    </div>
                                    <div class="form-group">
                                        <label>Kontak</label>
                                        <input type="text" name="tx_kontak" class="form-control" placeholder = "Kontak" >
                                    </div>

                                    <div class="form-group">
                                        <label>Alamat</label>
                                        <textarea rows="3" class="form-control" name="tx_alamat"></textarea>
                                    </div>
                                    <div class="form-group">
                                        <label>Bidang PPG</label>
                                        <div class="input-group-btn">

                                            <select class="form-control input-md" name="tx_bid">
                                                <?php
                                                require_once "../db/database.php";
                                                $select_kat = "SELECT * FROM `data_bidang_ppg`";
                                                $query_kat = mysql_query($select_kat);
                                                $numrowslihat_kat = mysql_num_rows($query_kat);
                                                while ($hsl_kat = mysql_fetch_object($query_kat)) {
                                                    echo '<option value="' . $hsl_kat->id_bid . '" >' . $hsl_kat->nama . '</option>';
                                                }
                                                ?>

                                            </select>
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
                    <button type="submit" name="simpan" class="btn btn-success btn-md" onclick="myFunction()"><i class="fa fa-save"></i>&nbsp;Simpan</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script type="text/javascript">
        jQuery(document).ready(function ($) {
            $("#tabs").tab();
        });
        < script >
                $(function () {

                    $('form').on('submit', function (e) {

                        e.preventDefault();
                    });
                });
    </script>
</script>    




<?php

function tambah() {
    if (isset($_POST['simpan'])) {
        $input = new stdClass();
        $input->nm = antiinjection($_POST['tx_nm_pgrs']);
        $input->klmn = antiinjection($_POST['tx_jklmn']);
        $input->tmp_lhr = antiinjection($_POST['tx_tmp_lhr']);
        $input->tgl_lhr = antiinjection($_POST['tx_tgl_lhr']);
        $input->pdkn = antiinjection($_POST['tx_pdkn']);
        $input->ket_pdkn = antiinjection($_POST['ket_pdkn']);
        $input->tpq_ds = antiinjection($_POST['tx_tpq']);
        $input->pkw = antiinjection($_POST['tx_nkh']);
        $input->email = antiinjection($_POST['tx_email']);
        $input->kontak = antiinjection($_POST['tx_kontak']);
        $input->bidang = antiinjection($_POST['tx_bid']);
        $input->almt = mysql_escape_string($_POST['tx_alamat']);
        require_once "../db/database.php";
        $query = "SELECT MAX(RIGHT(id_pgrs, 4)) as max_id FROM data_pgrs_ppg ORDER BY id_pgrs";
        $result = mysql_query($query);
        $data = mysql_fetch_array($result);
        $id_max = $data['max_id'];
        $sort_num = (int) substr($id_max, 2, 4);
        $sort_num++;
        $gmx = "PGR";
        $new_code = sprintf("%02s", $sort_num, $gmx);
        $new_code_2 = "$gmx$new_code";
        $input->id = $new_code_2;
        if (empty($_FILES['Filegambar2']['tmp_name'])) {
            $input->foto = "";
        } else {
            $input->foto = $_FILES['Filegambar2']['name'];
            $input->ext_foto = end((explode(".", $input->foto)));
            $ext_foto = end((explode(".", $input->foto)));
            $string = preg_replace("/[^A-Za-z0-9 ]/", '', $input->id);
            $string = str_ireplace(" ", "_", $string);
            $input->foto = strtolower($string . "_FOTO" . '.' . $ext_foto);
        }


        $input->isi = "INSERT INTO data_pgrs_ppg VALUES('$input->id','$input->nm','$input->klmn','$input->tmp_lhr','$input->tgl_lhr','$input->pdkn','$input->ket_pdkn','$input->pkw','$input->tpq_ds','$input->kontak','$input->almt','$input->foto','$input->bid')";
//                        echo '<pre>';print_r($input);echo '</pre>';die();
        $sqltambah = mysql_query($input->isi) or die(mysql_error());
        if (!empty($_FILES['Filegambar2']['tmp_name'])) {
            $dir_foto = "../images/foto_pgrs/";
            $foto_data = $dir_foto . $input->foto;
            $move_foto = move_uploaded_file($_FILES['Filegambar2']['tmp_name'], $foto_data);
        }
        if ($sqltambah) {
            ?>
            <script type="text/javascript">
                alert("Data sudah disimpan");
                window.location.href = 'detail-pgrs-ppg.php?detail=<?php echo $id; ?>';</script>
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
    $hapus = "DELETE FROM `data_pgrs_ppg` WHERE `id_pgrs` = '" . $_GET['hapus'] . "'";
    $sqlhapus = mysql_query($hapus);

    if ($sqlhapus) {
        echo '<script type="text/javascript">alert("Data sudah dihapus");window.location.href="data-pgrs-ppg.php?lihat-pgrs";	</script>'; 
    } else {
        echo '<script type="text/javascript"> 	alert("Data gagal dihapus!!");	</script>';
    }
}
?>
	