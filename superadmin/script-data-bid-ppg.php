<?php
require_once "../db/database.php";
$query2 = mysql_query("SELECT * FROM data_bidang_ppg bidang ");
$numrowslihat = mysql_num_rows($query2);
?>	

<div class="panel panel-default">	
    <div class="panel-heading">Keseluruhan Data Bidang PPG </div>		
    <div class="panel-body">
        <table class="display nowrap" cellspacing="0" width="100%" id="table_export">    
            <thead>
            <th>#</th>            
            <th>Nama</th>            
            <th>Jml Pengurus</th>                             
            <th>Deskripsi</th>
            <th><center>Aksi</center></th>
            </tr>
            </thead>
            <tbody>            
                <?php
                $num = 1;
                while ($hsl = mysql_fetch_object($query2)) {
                    echo '<td >' . $num . '</td>';
                    $query_jml_pgrs = mysql_query("select id_pgrs from data_pgrs_ppg where id_bid = '$hsl->id_bid'");                    
                    if ($query_jml_pgrs > 0) {
                        $jml_pgrs = mysql_num_rows($query_jml_pgrs);
                    } else {
                        $jml_pgrs = 0;
                    }

                    echo '														
					<td ><a href="detail-bid-ppg.php?detail=' . $hsl->id_bid . '">' . $hsl->nama . '</a></td>					
                                        <td >' . $jml_pgrs . ' Orang </td>                            
					<td >' . $hsl->desk . '</td>';
                    ?>
                <th><center>
                    <a title="edit" href="detail-bid-ppg.php?edit=<?= $hsl->id_bid; ?>" class="btn btn-default btn-sm"><span class="glyphicon glyphicon-edit" title="Ganti"></span></a>
                    <a title="hapus" href="?hapus=<?= $hsl->id_bid; ?>" class="btn btn-default btn-sm" onclick='return confirm("Yakin menghapus data ini?")'><span class="glyphicon glyphicon-trash" title="Hapus"></span></a>
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
                        <form  method="post" enctype="multipart/form-data" >                                  
                            <div class="form-group">
                                <label>Nama Bidang </label>
                                <input type="text" class="form-control" name='tx_nm_bdg' placeholder="Nama" required>
                            </div>
                            <div class="form-group">
                                <label>Tipe Bidang</label>
                                <select class="form-control" name="tipe_bidang" required>
                                    <option value="B">Bidang PPG</option>
                                    <option value="P">Pengurus Harian PPG</option>
                                </select>
                            </div>                            
                            <div class="form-group">
                                <label>Deskripsi Bidang</label>
                                <textarea rows="3" class="form-control" name="tx_deskp"></textarea>
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
        $input->nm = antiinjection($_POST['tx_nm_bdg']);
        $input->desk = mysql_escape_string($_POST['tx_deskp']);
        $input->tipe_bdg = mysql_escape_string($_POST['tipe_bidang']);        
        require_once "../db/database.php";
        $input->isi = "INSERT INTO data_bidang_ppg VALUES(NULL,'$input->nm','$input->desk','$input->tipe_bdg')";
//                       echo '<pre>';print_r($input);echo '</pre>';die();
        $sqltambah = mysql_query($input->isi) or die(mysql_error());
        if ($sqltambah) {
            ?>
            <script type="text/javascript">
                alert("Data sudah disimpan");
                
            </script>
            <meta http-equiv="refresh" content="0;url=data-bid-ppg.php?lihat-bid">           
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
    $hapus = "DELETE FROM `data_bidang_ppg` WHERE `id_bid` = '" . $_GET['hapus'] . "'";
    $sqlhapus = mysql_query($hapus);

    if ($sqlhapus) {
        echo '<script type="text/javascript">window.location.href="data-bid-ppg.php?lihat-bid";	</script>';
    } else {
        echo '<script type="text/javascript"> 	alert("Data gagal dihapus!!");	</script>';
    }
}
?>
	