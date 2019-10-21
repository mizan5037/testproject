<?php

$PageTitle = "New Master LC | Optima Inventory";
function customPageHeader()
{
    ?>
    <!-- Theme included stylesheets -->
    <link href="https://cdn.quilljs.com/1.3.6/quill.snow.css" rel="stylesheet">

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
                <div>New Master LC
                    <div class="page-title-subheading">
                        Please use this form to add a new Master LC.
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="main-card mb-3 card">
        <div class="card-body">
            <!-- <h5 class="card-title">LC</h5> -->
            <form class="needs-validation" id="form" novalidate>
                <div class="form-row">
                    <div class="col-md-4 mb-3">
                        <label for="validationTooltip01">Master LC Number</label>
                        <input type="text" class="form-control form-control-sm " id="validationTooltip01" placeholder="Master LC Number" required>
                        <div class="valid-tooltip">
                            Looks good!
                        </div>
                        <div class="invalid-tooltip">
                            Please Enter the LC Number.
                        </div>
                    </div>
                    <div class="col-md-4 mb-3">
                        <label for="validationTooltip02">Master LC Issue Date</label>
                        <input type="date" class="form-control form-control-sm " id="validationTooltip02" placeholder="Master LC Issue Date" required>
                        <div class="valid-tooltip">
                            Looks good!
                        </div>
                        <div class="invalid-tooltip">
                            Please Enter the LC Issue Date.
                        </div>
                    </div>
                    <div class="col-md-4 mb-3">
                        <label for="validationTooltip02">Master LC Expiry Date</label>
                        <input type="date" class="form-control form-control-sm " id="validationTooltip02" placeholder="Master LC Expiry Date" required>

                    </div>
                </div>
                <div class="form-row">
                    <div class="col-md-2 mb-3">
                        <label for="validationTooltip03">Sender Bank</label>
                        <input type="text" class="form-control form-control-sm " id="validationTooltip03" placeholder="Sender Bank" required>
                    </div>
                    <div class="col-md-2 mb-3">
                        <label for="validationTooltip03">Receiver Bank</label>
                        <input type="text" class="form-control form-control-sm " id="validationTooltip03" placeholder="Receiver Bank" required>
                    </div>
                    <div class="col-md-4 mb-3">
                        <label for="validationTooltip03">Buyer Name</label>
                        <input type="text" class="form-control form-control-sm " id="validationTooltip03" placeholder="Buyer" required>
                        <div class="invalid-tooltip">
                            Please provide a Buyer name.
                        </div>
                    </div>
                    <div class="col-md-4 mb-3">
                        <label for="validationTooltip03">LC Issued By</label>
                        <input type="text" class="form-control form-control-sm " id="validationTooltip03" placeholder="LC Issued By" required>
                        <div class="invalid-tooltip">
                            Please provide a Buyer name.
                        </div>
                    </div>
                </div>
                <div class="form-row">
                    <!-- <div class="col-md-4 mb-3">
                        <label for="validationTooltip03">MUR No</label>
                        <input type="text" class="form-control form-control-sm " id="validationTooltip03" placeholder="MUR No" required>
                    </div> -->
                    <div class="col-md-4 mb-3">
                        <label for="currency">Currency</label>
                        <input type="text" class="form-control form-control-sm " id="currency" placeholder="Currency" required>
                    </div>
                    <div class="col-md-4 mb-3">
                        <label for="validationTooltip02">Amount</label>
                        <input type="number" class="form-control form-control-sm " id="validationTooltip02" placeholder="Amount" required>
                    </div>
                </div>
                <div class="form-row">
                    <div class="col-md-3 mb-3">
                        <label for="validationTooltip03">Partial Shipment</label>
                        <select class="form-control form-control-sm " name="" id="">
                            <!-- <option value=""></option> -->
                            <option value="">Allowed</option>
                            <option value="">Not Allowed</option>
                        </select>
                    </div>
                    <div class="col-md-3 mb-3">
                        <label for="validationTooltip03">Transshipment</label>
                        <select class="form-control form-control-sm " name="" id="">
                            <!-- <option value=""></option> -->
                            <option value="">Allowed</option>
                            <option value="">Not Allowed</option>
                        </select>
                    </div>
                    <div class="col-md-3 mb-3">
                        <label for="validationTooltip02">Port Of Loading</label>
                        <input type="number" class="form-control form-control-sm " id="validationTooltip02" placeholder="Port Of Loading" required>
                    </div>
                    <div class="col-md-3 mb-3">
                        <label for="validationTooltip02">Port Of Discharge</label>
                        <input type="number" class="form-control form-control-sm " id="validationTooltip02" placeholder="Port Of Discharge" required>
                    </div>
                </div>
                <div class="form-row">
                    <div class="col-md-12">
                        Description:
                        <div id="editor"></div>
                        <textarea name="description" style="display:none" id="description"></textarea>
                    </div>
                    <div class="col-md-12" style="height: 100px;"></div>
                </div>
                <div class="form-row" style="overflow-x: auto; white-space: nowrap;">
                    <table class="mb-0 table table-bordered order-list table-hover table-sm" id="myTable" width="100%">
                        <thead>
                            <tr>
                                <th width="3%">#</th>
                                <th width="20%">P.O. No</th>
                                <th width="20%">Style</th>
                                <th width="10%">Qty</th>
                                <th width="10%">Unit Name</th>
                                <th width="12%">Unit Price</th>
                                <th width="7%" title="Latest Shipment Date">L.S.D</th>
                                <th width="18%">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <th scope="row">1</th>
                                <td>
                                    <input placeholder="P.O. No" type="text" name="pono" class="mb-2 form-control-sm form-control" required>
                                </td>
                                <td>
                                    <input placeholder="Style" type="text" name="style" class="mb-2 form-control-sm form-control" required>
                                </td>
                                <td>
                                    <input placeholder="Qty" type="number" name="qty" class="mb-2 form-control-sm form-control" required>
                                </td>
                                <td>
                                    <input placeholder="U/Name" type="text" name="unitname" class="mb-2 form-control-sm form-control" required>
                                </td>
                                <td>
                                    <input placeholder="U/Price" type="number" name="price" class="mb-2 form-control-sm form-control" required>
                                </td>
                                <td>
                                    <input type="date" name="lsdate" class="mb-2 form-control-sm form-control">
                                </td>
                                <td><a class="deleteRow btn btn-sm btn-warning disabled">First Row</a></td>
                            </tr>

                        </tbody>
                        <tfoot>
                            <tr>
                                <td colspan="8" class="text-center"><input type="button" class="btn btn-sm btn-success" id="addrow" value="Add Row" /><br></td>
                            </tr>
                            <tr class="bg-success">
                                <td colspan="4" class="text-right"><span id="grandtotalqty"></span>

                                </td>
                                <td colspan="2" class="text-right"><span id="grandtotal"></span>

                                </td>
                                <td colspan="2" class="text-right">
                                </td>
                            </tr>
                        </tfoot>
                    </table>
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
    <!-- Include the Quill library -->
    <script src="https://cdn.quilljs.com/1.3.6/quill.js"></script>

    <!-- Initialize Quill editor -->
    <script>
        var quill = new Quill('#editor', {
            theme: 'snow'
        });

        $("#form").on("submit", function() {
            $("#description").val($("#editor").find('div:first').html());
            console.log($("#description").val())
        })
    </script>
    <script>
        // Example starter JavaScript for disabling form submissions if there are invalid fields

        $(document).ready(function() {
            var counter = 0;
            var limit = 100;

            $("#addrow").on("click", function() {

                counter = $('#myTable tr').length - 2;

                var newRow = $("<tr>");
                var cols = "";

                cols += '<th scope="row">' + counter + '</th>';
                cols += '<td><input type="text" class="mb-2 form-control-sm form-control"  placeholder="P.O. No" type="text" name="pono' + counter + '" required/></td>';
                cols += '<td><input type="text" placeholder="Style" class="mb-2 form-control-sm form-control" name="style' + counter + '" required/></td>';
                cols += '<td><input type="number" placeholder="Qty" class="mb-2 form-control-sm form-control" name="qty' + counter + '"/></td>';
                cols += '<td><input type="text" placeholder="U/Name" class="mb-2 form-control-sm form-control" name="unitname' + counter + '"/></td>';
                cols += '<td><input placeholder="U/Price" type="number" class="mb-2 form-control-sm form-control" name="price' + counter + '"/></td>';
                cols += '<td><input type="date" class="mb-2 form-control-sm form-control" name="lsdate' + counter + '"/></td>';

                cols += '<td><input type="button" class="ibtnDel btn btn-sm btn-warning"  value="Delete"></td>';
                newRow.append(cols);
                if (counter >= limit) $('#addrow').attr('disabled', true).prop('value', "You've reached the limit");
                $("table.order-list").append(newRow);
                counter++;
            });

            $("table.order-list").on("change", 'input[name^="qty"]', function(event) {
                calculateRowqty($(this).closest("tr"));
                calculateGrandTotalqty();
            });

            $("table.order-list").on("change", 'input[name^="price"]', function(event) {
                calculateRow($(this).closest("tr"));
                calculateGrandTotal();
            });


            $("table.order-list").on("click", ".ibtnDel", function(event) {
                $(this).closest("tr").remove();
                calculateGrandTotalqty();
                calculateGrandTotal();

                counter -= 1
                $('#addrow').attr('disabled', false).prop('value', "Add Row");
            });


        });



        function calculateRowqty(row) {
            var qty = +row.find('input[name^="qty"]').val();

        }

        function calculateRow(row) {
            var price = +row.find('input[name^="price"]').val();

        }

        function calculateGrandTotalqty() {
            var grandTotalqty = 0;
            $("table.order-list").find('input[name^="qty"]').each(function() {
                grandTotalqty += +$(this).val();
            });
            $("#grandtotalqty").text('Total Qty: ' + grandTotalqty.toFixed(0));
        }

        function calculateGrandTotal() {
            var grandTotal = 0;
            $("table.order-list").find('input[name^="price"]').each(function() {
                grandTotal += +$(this).val();
            });
            $("#grandtotal").text('Grand Total: ' + $("#currency").val() + " " + grandTotal.toFixed(0));
        }

        $("#reset").on("click", function() {
            $("#grandtotalqty").text('');
            $("#grandtotal").text('');
        });


        // Example starter JavaScript for disabling form submissions if there are invalid fields
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