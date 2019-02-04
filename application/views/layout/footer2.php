<footer class="main-footer">
    <div class="pull-right hidden-xs">
        <b>Version</b> 2.1.0
    </div>
    <strong>Copyright &copy; 2018     All rights
        reserved.
</footer>
</div>
<script src="<?php echo base_url(); ?>layout/bower_components/jquery/dist/jquery.min.js"></script>
<script src="<?php echo base_url(); ?>layout/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<script src="<?php echo base_url(); ?>layout/bower_components/datatables.net/js/jquery.dataTables.min.js"></script>
<script src="<?php echo base_url(); ?>layout/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
<script src="<?php echo base_url(); ?>layout/bower_components/jquery-slimscroll/jquery.slimscroll.min.js"></script>
<script src="<?php echo base_url(); ?>layout/bower_components/fastclick/lib/fastclick.js"></script>
<script src="<?php echo base_url(); ?>layout/dist/js/adminlte.min.js"></script>
<script src="<?php echo base_url(); ?>layout/dist/js/demo.js"></script>

<script src="<?php echo base_url(); ?>layout/bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/ekko-lightbox/5.3.0/ekko-lightbox.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/ekko-lightbox/5.3.0/ekko-lightbox.js.map"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/ekko-lightbox/5.3.0/ekko-lightbox.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/ekko-lightbox/5.3.0/ekko-lightbox.min.js.map"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>layout/datatables/datatables.min.js"></script>
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
<script type="text/javascript" language="javascript" src="<?php echo base_url(); ?>layout/datatables/DataTables-1.10.16/js/jquery.dataTables.min.js"></script>
<script type="text/javascript" language="javascript" src="<?php echo base_url(); ?>layout/datatables/Buttons-1.5.1/js/dataTables.buttons.min.js"></script>
<script type="text/javascript" language="javascript" src="<?php echo base_url(); ?>layout/datatables/Buttons-1.5.1/js/buttons.flash.min.js"></script>
<script type="text/javascript" language="javascript" src="<?php echo base_url(); ?>layout/datatables/JSZip-2.5.0/jszip.min.js"></script>
<script type="text/javascript" language="javascript" src="<?php echo base_url(); ?>layout/datatables/pdfmake-0.1.32/pdfmake.min.js"></script>
<script type="text/javascript" language="javascript" src="<?php echo base_url(); ?>layout/datatables/pdfmake-0.1.32/vfs_fonts.js"></script>
<script type="text/javascript" language="javascript" src="<?php echo base_url(); ?>layout/datatables/Buttons-1.5.1/js/buttons.html5.min.js"></script>
<script type="text/javascript" language="javascript" src="<?php echo base_url(); ?>layout/datatables/Buttons-1.5.1/js/buttons.print.min.js"></script>
<script>
    $(document).on('click', '[data-toggle="lightbox"]', function (event) {
        event.preventDefault();
        $(this).ekkoLightbox();
    });
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
            "order": [[0, "desc"]],
            buttons: [
            ]
        });

        $('#datepicker').datepicker({
            dateFormat: 'yy-mm-dd',
            autoclose: true
        })

        $("#datefrom,#dateto").datepicker({
            dateFormat: 'yy-mm-dd',
            maxDate: new Date()
        });
    });

    function confirm_delete(num)
    {
        var x;
        var r = confirm("Are you Sure Delete?");
        if (r == true)
        {
            document.getElementById("frm1" + num + "").submit();
        } else {
        }
    }
</script>
</body>
</html>
