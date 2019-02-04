<script src="<?php echo base_url(); ?>layout/bower_components/jquery/dist/jquery.min.js"></script>

<script src="<?php echo base_url(); ?>layout/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<script src="<?php echo base_url(); ?>layout/bower_components/jquery-slimscroll/jquery.slimscroll.min.js"></script>
<script src="<?php echo base_url(); ?>layout/dist/js/adminlte.min.js"></script>

<footer class="main-footer no-print">
    <div class="pull-right hidden-xs">
        <b>Version</b> 2.1.0
    </div>
    <strong>Copyright &copy; 2018     All rights
        reserved.
</footer>
<div class="control-sidebar-bg"></div>
</div>

</body>
</html>
<script>
    $(document).ready(function () {
        var table = $('#example2').DataTable({
            "columnDefs": [
                {"width": "1%", "targets": 0}
            ],
            dom: 'Bfrtip',
            "aLengthMenu": [100],
            "order": [[0, "desc"]],
            "scrollX": true,
            buttons: [
                'copy', 'csv', 'excel', 'pdf', 'print'
            ]
        });
        var mtable = $('#modal').DataTable({
            "columnDefs": [
                {"width": "1%", "targets": 0}
            ],
            dom: 'Bfrtip',
            "aLengthMenu": [25],
            "order": [[0, "desc"]],
            buttons: [
            ]
        });
    }
</script>
