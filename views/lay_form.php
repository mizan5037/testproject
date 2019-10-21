<?php

$PageTitle = "Lay Form | Optima Inventory";
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
                <div>Lay Form
                    <div class="page-title-subheading">
                        Please use this form to add a new Lay.
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
                    <div class="col-md-3 mb-3">
                        <label for="validationTooltip01">Buyer Name</label>
                        <input type="text" class="form-control" id="validationTooltip01" placeholder="Buyer Name" required>
                    </div>
                    <div class="col-md-3 mb-3">
                        <label for="validationTooltip02">Style No</label>
                        <input type="text" class="form-control" id="validationTooltip02" placeholder="Style No" required>
                    </div>
                    <div class="col-md-3 mb-3">
                        <label for="validationTooltipUsername">P.O. No</label>
                        <input type="text" class="form-control" id="validationTooltipUsername" placeholder="P.O. No" required>
                    </div>
                    <div class="col-md-3 mb-3">
                        <label for="validationTooltipUsername">Cutting No</label>
                        <input type="text" class="form-control" id="validationTooltipUsername" placeholder="Cutting No" required>
                    </div>
                </div>
                <div class="form-row">
                    <div class="col-md-3 mb-3">
                        <label for="validationTooltip01">Unit</label>
                        <input type="text" class="form-control" id="validationTooltip01" placeholder="Unit" required>
                    </div>
                    <div class="col-md-3 mb-3">
                        <label for="validationTooltip02">Date</label>
                        <input type="date" class="form-control" id="validationTooltip02" placeholder="Date" required>
                    </div>
                    <div class="col-md-2 mb-3">
                        <label for="validationTooltipUsername">Item</label>
                        <input type="text" class="form-control" id="validationTooltipUsername" placeholder="Item" required>
                    </div>
                    <div class="col-md-2 mb-3">
                        <label for="validationTooltipUsername">M/W</label>
                        <input type="text" class="form-control" id="validationTooltipUsername" placeholder="Cutting No" required>
                    </div>
                    <div class="col-md-2 mb-3">
                        <label for="validationTooltipUsername">Marker Length</label>
                        <input type="text" class="form-control" id="validationTooltipUsername" placeholder="Cutting No" required>
                    </div>
                </div>
                <style>
                    #myTable {
                        font-size: 12px;
                        width: 100%;

                    }

                    #myTable tr,
                    th,
                    td {
                        border: 1px solid black;
                        max-width: 60px;
                    }

                    #myTable input, textarea {
                        border: none;
                        padding: 2px;
                        width: 100%;
                    }

                    #addrow{
                        width: 80px!important;
                        margin: 10px;
                    }
                </style>
                <div class="row">
                    <div class="col-md-12" style="overflow-x: auto;">
                        <table class="order-list" id="myTable" width="100%">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Color</th>
                                    <th>Lot No</th>
                                    <th>Sl. NO</th>
                                    <th>Roll No</th>
                                    <th>TTL Fabrics/yds</th>
                                    <th>Lay</th>
                                    <th>Used Fabrics/yds</th>
                                    <th>Remaining</th>
                                    <th>Exxess/Short</th>
                                    <th>Sticker</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <th scope="row">1</th>
                                    <td>
                                        <input placeholder="Color" type="text" name="color">
                                    </td>
                                    <td>
                                        <input placeholder="Lot No" type="text" name="lotno">
                                    </td>
                                    <td>
                                        <input placeholder="Sl. No" type="text" name="slno">
                                    </td>
                                    <td>
                                        <input placeholder="Roll No" name="rollno" type="text">
                                    </td>
                                    <td>
                                        <input placeholder="TTL Fabrics/yds" name="ttlfab" type="text">
                                    </td>
                                    <td>
                                        <input placeholder="Lay" name="lay" type="text">
                                    </td>
                                    <td>
                                        <input placeholder="Used Fabrics/yds" name="usedfab" type="text">
                                    </td>
                                    <td>
                                        <input placeholder="Remaining" name="ramaining" type="text">
                                    </td>
                                    <td>
                                        <input placeholder="Exxess/Short" name="exsshort" type="text">
                                    </td>
                                    <td>
                                        <input placeholder="Sticker" name="sticker" type="text">
                                    </td>
                                    <td><a class="deleteRow"></a></td>
                                </tr>

                            </tbody>
                            <tfoot>
                                <tr>
                                    <td colspan="13" class="text-center"><input type="button" class="btn btn-sm btn-success" id="addrow" value="Add Row" /><br></td>
                                </tr>
                                <tr><td></td>
                                    <th>Special Action: </th>
                                    <td colspan="12">
                                        <textarea name="" placeholder="Type Here . . ." id="" rows="3"></textarea>
                                    </td>
                                </tr>
                            </tfoot>
                        </table>
                    </div>
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

                counter = $('#myTable tr').length - 2;

                var newRow = $("<tr>");
                var cols = "";

                cols += '<th>' + counter + '</th>';
                cols += '<td><input placeholder="Color" type="text" name="color"></td>';
                cols += '<td><input placeholder="Lot No" type="text" name="lotno"></td>';
                cols += '<td><input placeholder="Sl. No" type="text" name="slno"></td>';
                cols += '<td><input placeholder="Roll No" name="rollno" type="text"></td>';
                cols += '<td><input placeholder="TTL Fabrics/yds" name="ttlfab" type="text"></td>';
                cols += '<td><input placeholder="Lay" name="lay" type="text"></td>';
                cols += '<td><input placeholder="Used Fabrics/yds" name="usedfab" type="text"></td>';
                cols += '<td><input placeholder="Remaining" name="ramaining" type="text"></td>';
                cols += '<td><input placeholder="Exxess/Short" name="exsshort" type="text"></td>';
                cols += '<td><input placeholder="Sticker" name="sticker" type="text"></td>';

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