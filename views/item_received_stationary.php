<?php

$PageTitle = "Item Received | Optima Inventory";
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
                <div>Item Received
                    <div class="page-title-subheading">
                        Please use this form to Register Items
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="main-card mb-3 card">
        <div class="card-body">
            <!-- <h5 class="card-title">PO</h5> -->
            <form class="needs-validation" novalidate>
                <div class="form-row">
                    <table class="mb-0 table table-bordered order-list" id="myTable">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Item Name</th>
                                <th>Supplier Name</th>
                                <th>Challan No</th>
                                <th>Received Qty</th>
                                <th>Shortage/Excess</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <th scope="row">1</th>
                                <td>
                                    <input placeholder="Item Name" type="text" name="suppliername" class="mb-2 form-control-sm form-control">
                                </td>
                                <td>
                                    <input placeholder="Supplier Name" type="text" name="suppliername" class="mb-2 form-control-sm form-control">
                                </td>
                                <td>
                                    <input placeholder="Challan No" type="text" name="color" class="mb-2 form-control-sm form-control">
                                </td>
                                <td>
                                    <input placeholder="Received Qty" type="text" name="receiveqty" class="mb-2 form-control-sm form-control">
                                </td>
                                <td>
                                    <input placeholder="Shortage/Excess" type="text" name="sortexs" class="mb-2 form-control-sm form-control">
                                </td>
                                <td></td>
                            </tr>
                        </tbody>
                        <tfoot>
                            <tr>
                                <td colspan="7" style="text-align:center">
                                    <input type="button" id="addrow" class="btn btn-sm btn-success" value="Add Row" />
                                </td>
                            </tr>
                        </tfoot>
                    </table>
                </div>
                <br><br>
                <div class="container">
                    <div class="row">
                        <div class="col-md-12 text-right">
                            <button class="btn btn-primary" type="submit">Save</button>
                        </div>
                    </div>
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
        $(document).ready(function() {
            var counter = 0;
            var limit = 100;

            $("#addrow").on("click", function() {

                counter = $('#myTable tr').length - 1;

                var newRow = $("<tr>");
                var cols = "";

                cols += '<th>' + counter + '</th>';
                cols += '<td><input placeholder="Item Name"  name="style' + counter + '" type="text" class="mb-2 form-control-sm form-control"></td>';
                cols += '<td><input placeholder="Supplier Name"  name="style' + counter + '" type="text" class="mb-2 form-control-sm form-control"></td>';
                cols += '<td><input placeholder="Challan No" type="text" name="color' + counter + '" class="mb-2 form-control-sm form-control"></td>';
                cols += '<td><input placeholder="Received Qty" type="text" name="receivefab' + counter + '" class="mb-2 form-control-sm form-control"></td>';
                cols += '<td><input placeholder="Shortage/Excess" type="text" name="sortexs' + counter + '" class="mb-2 form-control-sm form-control"></td>';

                cols += '<td><input type="button" class="ibtnDel btn btn-danger"  value="Delete"></td>';
                newRow.append(cols);
                if (counter >= limit) $('#addrow').attr('disabled', true).prop('value', "You've reached the limit");
                $("table.order-list").append(newRow);
                counter++;
            });

            $("table.order-list").on("change", 'input[name^="price"]', function(event) {
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
            var price = +row.find('input[name^="price"]').val();

        }

        function calculateGrandTotal() {
            var grandTotal = 0;
            $("table.order-list").find('input[name^="price"]').each(function() {
                grandTotal += +$(this).val();
            });
            $("#grandtotal").text(grandTotal.toFixed(2));
        }
    </script>
    <script>
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