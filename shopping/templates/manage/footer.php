<?php
    $jquery = '<script src="'. DIST_JQUERY .'jquery.min.js"></script>';
    $bootstrapCoreJavascript = '<script src="'. JS_DIST_BOOTSTRAP .'bootstrap.min.js"></script>';
    $metisMenuPluginJavascript = '<script src="'. DIST_METIS_MENU .'metisMenu.min.js"></script>';
    $customThemeJavascript = '<script src="'. JS_DIST .'sb-admin-2.js"></script>';
    $dataTablesJavascript_01 = '<script src="'. JS_MEDIA_DATABASES .'jquery.dataTables.min.js"></script>';
    $dataTablesJavascript_02 = '<script src="'. THREE .'dataTables.bootstrap.min.js"></script>';
?>
    </div>
    <!-- /#wrapper -->
    
    <!-- jQuery -->
    <?php echo $jquery; ?>

    <!-- Bootstrap Core JavaScript -->
    <?php echo $bootstrapCoreJavascript; ?>

    <!-- Metis Menu Plugin JavaScript -->
    <?php echo $metisMenuPluginJavascript; ?>

    <!-- Custom Theme JavaScript -->
    <?php echo $customThemeJavascript; ?>

    <!-- DataTables JavaScript -->
    <?php echo $dataTablesJavascript_01; ?>
    <?php echo $dataTablesJavascript_02; ?>

    <!-- Page-Level Demo Scripts - Tables - Use for reference -->
    <script>
    $(document).ready(function() {
        $('#dataTables-example').DataTable({
                responsive: true
        });
    });
    </script>
</body>

</html>
