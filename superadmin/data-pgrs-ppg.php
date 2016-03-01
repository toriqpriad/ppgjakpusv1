<?php include 'cek_session.php'; ?>
<!doctype html>
<html lang="en">
    <head>

        <meta charset="utf-8">
        <title>Pengurus PPG</title>
        <?php include 'header_superadmin.php'; ?>
<!--        <script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
        <script type="text/javascript" src="//cdn.rawgit.com/MrRio/jsPDF/master/dist/jspdf.min.js"></script> 
        <script type="text/javascript" src="//cdn.rawgit.com/niklasvh/html2canvas/0.5.0-alpha2/dist/html2canvas.min.js"></script>        -->

    </head>
    <?php include 'menu_superadmin.php'; ?>   

    <?php include 'script-data-pgrs-ppg.php'; ?>

</div>
<?php tambah(); ?>
</div>

</div>
</div>

<script type="text/javascript">
    $('.form_date').datetimepicker({
        language: 'id',
        weekStart: 1,
        todayBtn: 1,
        autoclose: 1,
        todayHighlight: 1,
        startView: 2,
        minView: 2,
        forceParse: 0
    });
</script>
</body></html>
