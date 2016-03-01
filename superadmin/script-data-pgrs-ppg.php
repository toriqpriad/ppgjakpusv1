<?php
require_once "../db/database.php";
$query2 = mysql_query("SELECT * FROM data_pgrs_ppg inner join data_tpq on data_tpq.id_tpq=data_pgrs_ppg.tpq_desa inner join data_bidang_ppg on data_bidang_ppg.id_bid = data_pgrs_ppg.id_bid");
$numrowslihat = mysql_num_rows($query2);
?>	
<div class="panel panel-default">	
    <div class="panel-heading">Keseluruhan Data Pengurus PPG </div>		
    <div class="panel-body">    
        <ul class="nav nav-tabs" role="tablist">
            <li role="presentation" class="active"><a href="#tabel" aria-controls="tabel" role="tab" data-toggle="tab">Tabel Data</a></li>
            <li role="presentation"><a href="#struktur" aria-controls="struktur" role="tab" data-toggle="tab">Struktur</a></li>    
        </ul>
        <!-- Tab panes -->
        <div class="tab-content">            
            <div role="tabpanel" class="tab-pane active" id="tabel">
                <br>
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
                            <a title="edit" href="detail-pgrs-ppg.php?edit=<?= $hsl->id_pgrs; ?>" class="btn btn-default btn-sm"><span class="glyphicon glyphicon-edit" title="Ganti"></span></a>
                            <a title="hapus" href="?hapus=<?= $hsl->id_pgrs; ?>" class="btn btn-default btn-sm" onclick='return confirm("Yakin menghapus data ini?")'><span class="glyphicon glyphicon-trash" title="Hapus"></span></a>
                        </center>
                        </th>


                        </tr>					

                        <?php
                        $num++;
                    }
                    ?>
                </table>

            </div>
            <div role="tabpanel" class="tab-pane" id="struktur">                
                <br>
                <div class="tree">
                    <ul>                        
                        <li>
                            <span><i class="fa fa-star"></i> Pengurus Harian</span> 
                            <ul>
                                <?php
                                $sql1 = mysql_query("select * from data_bidang_ppg where tipe_bidang = 'P' ");
                                while ($data = mysql_fetch_object($sql1)) {
                                    ?>
                                    <li><span><i class="fa fa-bars"></i>&nbsp; <?= $data->nama; ?></span>
                                        <ul>
                                            <?php
                                            $sql2 = mysql_query("select * from data_pgrs_ppg where id_bid = '$data->id_bid' ");
                                            while ($data2 = mysql_fetch_object($sql2)) {
                                                ?>
                                            <li><a href="detail-pgrs-ppg.php?detail=<?= $data2->id_pgrs; ?>"><span class="label label-default"><i class="fa fa-user"></i>&nbsp; <?= $data2->nm_pgrs; ?></span></a></li>
                                                    <?php
                                                }
                                                ?>
                                        </ul>
                                    </li>
                                    <?php
                                }
                                ?>
                            </ul>
                        </li>
                        <li>
                            <span><i class="fa fa-star"></i> Bidang PPG</span> 
                            <ul>
                                <?php
                                $sql4 = mysql_query("select * from data_bidang_ppg where tipe_bidang = 'B' ");
                                while ($data4 = mysql_fetch_object($sql4)) {
                                    ?>
                                    <li><span><i class="fa fa-bars"></i>&nbsp; <?= $data4->nama; ?></span>
                                        <ul>
                                            <?php
                                            $sql5 = mysql_query("select * from data_pgrs_ppg where id_bid = '$data4->id_bid' ");
                                            while ($data4 = mysql_fetch_object($sql5)) {
                                                ?>
                                                <li><a href="detail-pgrs-ppg.php?detail=<?= $data4->id_pgrs; ?>"><span class="label label-default"><i class="fa fa-user"></i>&nbsp; <?= $data4->nm_pgrs; ?></span></a></li>
                                                    <?php
                                                }
                                                ?>
                                        </ul>
                                    </li>
                                    <?php
                                }
                                ?>
                            </ul>
                        </li>
                    </ul>
                </div>                
            </div>            
        </div>
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
        $input->isi = "INSERT INTO data_pgrs_ppg VALUES('$input->id','$input->nm','$input->klmn','$input->tmp_lhr','$input->tgl_lhr','$input->pdkn','$input->ket_pdkn','$input->pkw','$input->tpq_ds','$input->kontak','$input->almt','$input->foto','$input->bidang')";
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


<script>
    $(function () {
        $('.tree li:has(ul)').addClass('parent_li').find(' > span').attr('title', 'Collapse this branch');
        $('.tree li.parent_li > span').on('click', function (e) {
            var children = $(this).parent('li.parent_li').find(' > ul > li');
            if (children.is(":visible")) {
                children.hide('fast');
                $(this).attr('title', 'Expand this branch').find(' > i').addClass('icon-plus-sign').removeClass('icon-minus-sign');
            } else {
                children.show('fast');
                $(this).attr('title', 'Collapse this branch').find(' > i').addClass('icon-minus-sign').removeClass('icon-plus-sign');
            }
            e.stopPropagation();
        });
    });
</script>

<!--<script>
var doc = new jsPDF();
var specialElementHandlers = {
    '.tree': function (element, renderer) {
        return true;
    }
};

$('#BtnDownloadPdf').click(function () {
    doc.fromHTML($('.tree').html(), 15, 15, {
        'width': 170,
            'elementHandlers': specialElementHandlers
    });
    doc.save('sample-file.pdf');
});
</script>-->

<style>
    .tree {
        min-height:20px;
        padding:19px;
        margin-bottom:20px;
        background-color:#fbfbfb;
        border:1px solid #999;
        -webkit-border-radius:4px;
        -moz-border-radius:4px;
        border-radius:4px;
        -webkit-box-shadow:inset 0 1px 1px rgba(0, 0, 0, 0.05);
        -moz-box-shadow:inset 0 1px 1px rgba(0, 0, 0, 0.05);
        box-shadow:inset 0 1px 1px rgba(0, 0, 0, 0.05)
    }
    .tree li {
        list-style-type:none;
        margin:0;
        padding:10px 5px 0 5px;
        position:relative
    }
    .tree li::before, .tree li::after {
        content:'';
        left:-20px;
        position:absolute;
        right:auto
    }
    .tree li::before {
        border-left:1px solid #999;
        bottom:50px;
        height:100%;
        top:0;
        width:1px
    }
    .tree li::after {
        border-top:1px solid #999;
        height:20px;
        top:25px;
        width:25px
    }
    .tree li span {
        -moz-border-radius:5px;
        -webkit-border-radius:5px;
        border:1px solid #999;
        border-radius:5px;
        display:inline-block;
        padding:3px 8px;
        text-decoration:none
    }
    .tree li.parent_li>span {
        cursor:pointer
    }
    .tree>ul>li::before, .tree>ul>li::after {
        border:0
    }
    .tree li:last-child::before {
        height:30px
    }
    .tree li.parent_li>span:hover, .tree li.parent_li>span:hover+ul li span {
        background:#eee;
        border:1px solid #94a0b4;
        color:#000
    }
</style>
