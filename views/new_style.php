<?php

$PageTitle = "New Style | Optima Inventory";
function customPageHeader()
{
    ?>
    <!--Arbitrary HTML Tags-->
<?php }
include_once "includes/header.php";

?>

<div class="app-main__inner">
    <div class="app-page-title">
        <div class="page-title-wrapper">
            <div class="page-title-heading">
                <div class="page-title-icon">
                    <i class="pe-7s-note icon-gradient bg-mean-fruit">
                    </i>
                </div>
                <div>New Style
                    <div class="page-title-subheading">
                        Please use this form to add a new Style.
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="main-card mb-3 card">
        <div class="card-body">
            <h5 class="card-title">New Style</h5>
            <form class="needs-validation" novalidate>
                <div class="form-row">

                    <div class="col-md-6 mb-3">
                        <label for="validationTooltip02">Style Number</label>
                        <input type="text" class="form-control form-control-sm " id="validationTooltip02" placeholder="Style Number" required>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="validationTooltip03">Style Description</label>
                        <input type="text" class="form-control form-control-sm " id="validationTooltip03" placeholder="Description" required>
                        <div class="invalid-tooltip">
                            Please provide a Buyer name.
                        </div>
                    </div>
                </div>
                <div class="form-row">
                    <div class="col-md-4 mb-3">
                        <label for="validationTooltip01">Fabric Details</label>
                        <input type="text" class="form-control form-control-sm " id="validationTooltip01" placeholder="Fabric Details" required>
                        <div class="valid-tooltip">
                            Looks good!
                        </div>
                        <div class="invalid-tooltip">
                            Please Enter the LC Number.
                        </div>
                    </div>
                    <div class="col-md-4 mb-3">
                        <label for="validationTooltip03">Proto No</label>
                        <input type="text" class="form-control form-control-sm " id="validationTooltip03" placeholder="Proto No" required>
                        <div class="invalid-tooltip">
                            Please provide a Buyer name.
                        </div>
                    </div>
                    <div class="col-md-4 mb-3">
                        <label for="validationTooltip03">Wash</label>
                        <input type="text" class="form-control form-control-sm " id="validationTooltip03" placeholder="Wash" required>
                        <div class="invalid-tooltip">
                            Please provide a Buyer name.
                        </div>
                    </div>
                </div>
                <div class="form-row">

                    <div class="col-md-8">
                        <!-- Right Table -->
                        <table class="mb-0 table table-bordered order-list2" id="myTable2" width="100%">
                            <thead>
                                <tr>
                                    <th colspan="4">TRIMS & ACCESSORIES</th>
                                </tr>
                                <tr>
                                    <th width="3%">#</th>
                                    <th width="40%">Name</th>
                                    <th width="40%">Description</th>
                                    <th width="17%">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <th scope="row">1</th>
                                    <td>
                                        <input placeholder="Name" type="text" name="name" class="mb-2 form-control-sm form-control" required>
                                    </td>
                                    <td>
                                        <input placeholder="Description" type="text" name="description" class="mb-2 form-control-sm form-control" required>
                                    </td>
                                    <td><a class="deleteRow"></a></td>
                                </tr>

                            </tbody>
                            <tfoot>
                                <tr>
                                    <td colspan="4" class="text-center"><input type="button" class="btn btn-sm btn-success" id="addrow2" value="Add Row" /><br></td>
                                </tr>
                                <tr>
                                    <td colspan="4"></td>
                                </tr>

                            </tfoot>
                        </table>
                    </div>
                    <div class="col-md-4">

                        <div class="row">
                            <div class="col-md-12">
                                <img src="<?= $path ?>/assets/images/noimg.png" class="img-fluid img-thumbnail rounded" alt="No Image">
                            </div>
                            <div class="col-md-12"><br></div>
                            <div class="col-md-4"><label for="img">Style Image:</label></div>
                            <div class="col-md-8"><input type="file" name="img" class="form-control-file" id="img"></div>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <br>
                    </div>
                    <div class="col-md-12">
                        <!-- Left Table -->
                        <table class="mb-0 table table-bordered order-list" id="myTable" width="100%">
                            <thead>
                                <tr>
                                    <th colspan="5">Item Requirments</th>
                                </tr>
                                <tr>
                                    <th width="3%">#</th>
                                    <th width="30%">Size</th>
                                    <th width="30%">Item</th>
                                    <th width="20%">Qty</th>
                                    <th width="17%">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <th scope="row">1</th>
                                    <td>
                                        <input placeholder="Size" type="text" name="size" class="mb-2 form-control-sm form-control" required>
                                    </td>
                                    <td>
                                        <input placeholder="Item" type="text" name="item" class="mb-2 form-control-sm form-control" required>
                                    </td>
                                    <td>
                                        <input placeholder="Qty" type="number" name="qty" class="mb-2 form-control-sm form-control">
                                    </td>
                                    <td><a class="deleteRow"></a></td>
                                </tr>

                            </tbody>
                            <tfoot>
                                <tr>
                                    <td colspan="7" class="text-center"><input type="button" class="btn btn-sm btn-success" id="addrow" value="Add Row" /><br></td>
                                </tr>
                                <tr>
                                    <td colspan="7" class="text-right"><span id="grandtotal"></span>

                                    </td>
                                </tr>
                            </tfoot>
                        </table>
                    </div>

                </div>
                <br><br>
                <div class="row">
                    <div class="col-md-6"><button class="btn btn-danger mr-auto" id="reset" type="reset">Reset</button></div>
                    <div class="col-md-6 text-right"><button class="btn btn-primary" type="submit"><i class="metismenu-state-icon pe-7s-diskette"></i> &nbsp; Save </button></div>
                </div>
            </form>
        </div>
    </div>
</div>




<?php
function customPagefooter()
{
    ?>
    <script>
        // Example starter JavaScript for disabling form submissions if there are invalid fields


        //table Items 
        $(document).ready(function() {
            var counter = 0;
            var limit = 100;

            $("#addrow").on("click", function() {

                counter = $('#myTable tr').length - 2;

                var newRow = $("<tr>");
                var cols = "";

                cols += '<th scope="row">' + counter + '</th>';
                cols += '<td><input type="text" placeholder="Size" class="mb-2 form-control-sm form-control" name="size' + counter + '" required/></td>';
                cols += '<td><input type="text" placeholder="Item" class="mb-2 form-control-sm form-control" name="style' + counter + '" required/></td>';
                cols += '<td><input type="number" placeholder="Qty" class="mb-2 form-control-sm form-control" name="qty' + counter + '"/></td>';

                cols += '<td><input type="button" class="ibtnDel btn btn-sm btn-warning"  value="Delete"></td>';
                newRow.append(cols);
                if (counter >= limit) $('#addrow').attr('disabled', true).prop('value', "You've reached the limit");
                $("table.order-list").append(newRow);
                counter++;
            });

            $("table.order-list").on("change", 'input[name^="qty"]', function(event) {
                calculateRow($(this).closest("tr"));
                calculateGrandTotal();
            });


            $("table.order-list").on("click", ".ibtnDel", function(event) {
                $(this).closest("tr").remove();
                calculateGrandTotal();

                counter -= 1
                $('#addrow').attr('disabled', false).prop('value', "Add Row");
            });


        });



        function calculateRow(row) {
            var price = +row.find('input[name^="qty"]').val();

        }

        function calculateGrandTotal() {
            var grandTotal = 0;
            $("table.order-list").find('input[name^="qty"]').each(function() {
                grandTotal += +$(this).val();
            });
            $("#grandtotal").text('Total Qty: ' + grandTotal.toFixed(0));
        }

        $("#reset").on("click", function() {
            $("#grandtotal").text('');
        });


        //table left ends
        //table right
        $(document).ready(function() {
            var counter2 = 0;
            var limit2 = 100;

            $("#addrow2").on("click", function() {

                counter2 = $('#myTable2 tr').length - 2;

                var newRow2 = $("<tr>");
                var cols2 = "";

                cols2 += '<th scope="row">' + counter2 + '</th>';
                cols2 += '<td><input type="text" placeholder="Name" class="mb-2 form-control-sm form-control" name="name' + counter2 + '" required/></td>';
                cols2 += '<td><input type="number" placeholder="Description" class="mb-2 form-control-sm form-control" name="description' + counter2 + '"/></td>';

                cols2 += '<td><input type="button" class="ibtnDel2 btn btn-sm btn-warning"  value="Delete"></td>';
                newRow2.append(cols2);
                if (counter2 >= limit2) $('#addrow2').attr('disabled', true).prop('value', "You've reached the limit");
                $("table.order-list2").append(newRow2);
                counter2++;
            });

            $("table.order-list2").on("click", ".ibtnDel2", function(event) {
                $(this).closest("tr").remove();

                counter2 -= 1
                $('#addrow2').attr('disabled', false).prop('value', "Add Row");
            });



        });

        // table right ends

        (function() {
            'use strict';
            window.addEventListener('load', function() {
                // Fetch all the forms we want to apply custom Bootstrap validation styles to
                var forms = document.getElementsByClassName('needs-validation');
                // Loop over them and prevent submission
                var validation = Array.prototype.filter.call(forms, function(form) {
                    form.addEventListener('submit', function(event) {
                        if (form.checkValidity() === false) {
                            event.preventDefault();
                            event.stopPropagation();
                        }
                        form.classList.add('was-validated');
                    }, false);
                });
            }, false);
        })();
    </script>
<?php }
include_once "includes/footer.php";
?>