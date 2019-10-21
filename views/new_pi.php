<?php

$PageTitle = "New PI | Optima Inventory";
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
                <div>New PI
                    <div class="page-title-subheading">
                        Please use this form to add a new PI.
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
                    <div class="col-md-4 mb-3">
                        <label for="validationTooltip01">REF NO</label>
                        <input type="text" class="form-control" id="validationTooltip01" placeholder="REF NO" required>
                    </div>
                    <div class="col-md-4 mb-3">
                        <label for="validationTooltip02">Issue Date</label>
                        <input type="date" class="form-control" id="validationTooltip02" placeholder="Issue Date" required>
                    </div>
                    <div class="col-md-4 mb-3">
                        <label for="validationTooltipUsername">Supplier</label>
                        <input type="text" class="form-control" id="validationTooltipUsername" placeholder="Supplier" aria-describedby="validationTooltipUsernamePrepend" required>
                    </div>
                </div>
                <div class="form-row">
                    <table class="mb-0 table table-bordered order-list" id="myTable">
                        <thead>
                            <tr>
                                <th width="5%">#</th>
                                <th width="10%">PO No</th>
                                <th width="10%">Item</th>
                                <th width="30%">Description</th>
                                <th width="10%">Qty</th>
                                <th width="10%">Price Per Unit</th>
                                <th width="10%">Total Price</th>
                                <th width="15%"></th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <th scope="row">1</th>
                                <td>
                                    <input placeholder="PO No" type="text" name="pono" class="mb-2 form-control-sm form-control">
                                </td>
                                <td>
                                    <input placeholder="Item" type="text" name="item" class="mb-2 form-control-sm form-control">
                                </td>
                                <td>
                                    <textarea placeholder="Description" name="description" type="text" class="mb-2 form-control-sm form-control"></textarea>
                                </td>
                                <td>
                                    <input placeholder="Qty" name="qty" type="text" class="mb-2 form-control-sm form-control">
                                </td>
                                <td>
                                    <input placeholder="Price Per Unit" name="ppu" type="text" class="mb-2 form-control-sm form-control">
                                </td>
                                <td>
                                    <input placeholder="Total Price" name="totalprice" type="text" class="mb-2 form-control-sm form-control">
                                </td>
                                <td><a class="deleteRow"></a></td>
                            </tr>

                        </tbody>
                        <tfoot>
                            <tr>
                                <td colspan="8" class="text-center"><input type="button" class="btn btn-sm btn-success" id="addrow" value="Add Row" /><br></td>
                            </tr>
                        </tfoot>
                    </table>
                </div>
                <br><br>
                <div class="container">
                    <div class="row">
                        <div class="col-md-12 text-center">
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
        // Add new row code

        $(document).ready(function() {
            var counter = 0;
            var limit = 100;

            $("#addrow").on("click", function() {

                counter = $('#myTable tr').length - 1;

                var newRow = $("<tr>");
                var cols = "";

                cols += '<th>' + counter + '</th>';
                cols += '<td><input placeholder="PO No" type="text" name="pono' + counter + '" class="mb-2 form-control-sm form-control"></td>';
                cols += '<td><input placeholder="Item" type="text" name="item' + counter + '" class="mb-2 form-control-sm form-control"></td>';
                cols += '<td><textarea placeholder="Description" name="description' + counter + '" type="text" class="mb-2 form-control-sm form-control"></textarea></td>';
                cols += '<td><input placeholder="Qty" name="qty' + counter + '" type="text" class="mb-2 form-control-sm form-control"></td>';
                cols += '<td><input placeholder="Price Per Unit" name="ppu' + counter + '" type="text" class="mb-2 form-control-sm form-control"></td>';
                cols += '<td><input placeholder="Total Price" name="totalprice' + counter + '" type="text" class="mb-2 form-control-sm form-control"></td>';

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