<?php
$mainmenu = $this->mainmenu->buildMenu($session_data['id'], 7);
$prof_inf = $this->messages->getUserInf($session_data['id']);
$data['title'] = "STOCK";
$data['mainmenu'] = $mainmenu;
$data['profinf'] = $prof_inf;
$data['userinf'] = $session_data;
if (isset($msg)) {
    $data['msg'] = $this->messages->getMessage($msg);
}
$this->load->view('layout/header2', $data);
?>
<div class="content-wrapper">
    <section class="content-header">
        <h1>
            Add Tool
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i>Add Tool</a></li>
        </ol>
    </section>
    <section class="content">
        <div class="box box-default">
            <div class="box-header with-border">
                <h3 class="box-title">please add your tool</h3>
            </div>
            <div class="box-body">
                <?php echo form_open('stock/save_tool', 'id="form1" data-parsley-validate class=""'); ?>

                <div class="row">
                    <div class="col-md-12">
                        <button id="item" type="button" class="btn btn-primary pull-right"> Add Tool</button>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-12 table-responsive">
                        <table class="table invoice-table table-striped" id="myTable">
                            <thead>
                            <tr>
                                <th width="8%">ID</th>
                                <th width="15%">Tool Name</th>
                                <th width="10%">Brand</th>
                                <th width="30%">Description</th>
                                <th width="10%">Qty</th>
                                <th width="10%">Code</th>
                            </tr>
                            </thead>
                            <tbody>

                            </tbody>
                        </table>

                    </div>
                </div>
                <?php
                echo form_input('name_fa', '1', 'class="form-control" id="numr" style="display:none" ');
                ?>
            </div>
            <div class="box-footer">
                <button class="btn btn-primary btn" type="reset">Reset</button>
                <button type="submit" value="Validate!" class="btn btn-success pull-right">Submit</button>
            </div>
            <?php echo form_close(); ?>
        </div>

        <div id="myModal" class="modal fade" role="dialog">
            <div class="modal-dialog modal-lg ">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <h4 class="modal-title"> Select Tools </h4>
                    </div>
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-xs-12">
                                <div class="box">
                                    <div class="box-header">
                                        <h3 class="box-title"> Tools  </h3>
                                    </div>
                                    <div class="box-body">
                                        <div class="table-responsive">
                                            <table id="modal" class="table table-bordered table-striped dataTable " width="100%">
                                                <thead>
                                                <tr>
                                                    <th> ID </th>
                                                    <th> Tool Name </th>
                                                    <th> Brand </th>
                                                    <th> Description </th>
                                                    <th> Action </th>
                                                </tr>
                                                </thead>
                                                <tbody>
                                                <?php foreach ($items as $item) { ?>
                                                    <tr>
                                                        <td> <?php echo $item['id'] ?></td>
                                                        <td> <?php echo $item['name'] ?></td>
                                                        <td> <?php echo $brand[$item['brand']] ?></td>
                                                        <td> <?php echo $item['description'] ?></td>
                                                        <td>
                                                            <div class="named" >  <button value = "<?php echo $item['id'] ?>" type="button" class="btn btn-sm btn-success">Select</button> </h5></div>
                                                        </td>
                                                    </tr>
                                                <?php } ?>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    </div>
                </div>
            </div>
        </div>

    </section>
</div>

<?php
$this->load->view('layout/footer2');
?>
<script type="text/javascript" src="<?php echo base_url(); ?>layout/js/jquery.validate.js"></script>
<script>
    $(document).ready(function () {
        jQuery.validator.addMethod("lettersonly", function (value, element) {
            return this.optional(element) || /^[a-z]+$/i.test(value);
        }, "Please enter only letters without space.");
        $("#form1").validate({
            errorElement: "p",
            rules: {

            },
            errorPlacement: function (error, element) {
                error.appendTo(element.parent());
            }

        });

        $("#item").click(function () {
            $("#myModal").modal();
        });

        $("#modal tbody").on('click','button',function () {
            var e = this.value;
                $.ajax({
                    url: "<?php echo base_url(); ?>index.php/ajax/get_item/" + e,
                    cache: false,
                    type: "GET",
                    dataType: "text",
                    data: "test",
                    success: function (result) {
                        var dataObj = JSON.parse(result);
                        var num = parseInt($('#numr').val());
                        $('#myTable').append('<tr id="tr_' + num + '" ><td style="width: 8%" id="id_' + num + '"> <button type="button" class="btn btns btn-info btn-sm"   onclick="cancel(' + num + ')" > <i class="fa fa-times"></i></button>  </td>\n\
                        <td style="width: 15%" id="item_' + num + '"> <input type="text" style="display : none" name="id2_' + num + '" id="id2_' + num + '"></td><td style="width: 10%" id="brand_' + num + '"><td style="width: 30%" id="description_' + num + '">\n\
                        <td style="width: 10%" > <input  class="form-control" type="text" value = "1" name="qtn_' + num + '"  id="qtn_' + num + '" disabled> </td>\n\
                        <td style="width: 10%" > <input  class="form-control" onkeyup="barcode(' + num + ')" type="text" name="barcode_' + num + '"  id="barcode_' + num + '"> </td></tr>');

                        $('#id_' + num).append(num);
                        $('#item_' + num).append(dataObj.item);
                        $('#numr').val(num + 1);
                        $('#id2_' + num).val(dataObj.id);
                        $('#description_' + num).append(dataObj.description);
                        $('#brand_' + num).append(dataObj.brand);
                        barcode(num);
                    }
                });
                $('#myModal').modal('hide');

        });

    });

    $('#form1').submit(function() {
        if (parseInt($('#numr').val())<=1) {
            alert("Please Add At least One Items");
            return false;
        }
    });

    function cancel(num) {
        $('#tr_' + num).remove();
    }

    function barcode(num) {
        $('#barcode_' + num ).each(function() {
            $(this).rules("add",
                {
                    required: true,
                    messages: {
                        required: "Barcode is required"
                    }
                });
        });
    }


</script>