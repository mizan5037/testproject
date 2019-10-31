<?php

$PageTitle = "Fabric Relaxation Form | Optima Inventory";
function customPageHeader()
{
    ?>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.3.0/css/datepicker.css" rel="stylesheet" type="text/css" />

<?php }
include_once "controller/add_fab_relaxation.php";
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
                <div>Fabric Relaxation Form
                    <div class="page-title-subheading">
                        Please use this form to add a Fabric Relaxation Form.
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="main-card mb-3 card">
        <div class="card-body">
            <!-- <h5 class="card-title">PO</h5> -->
            <form class="needs-validation" method="POST" novalidate>
                <div class="form-row">
                    <div class="col-md-4 mb-3">
                        <label for="validationTooltip01">Buyer Name</label>
                        <select name="buyer" class="buyer  form-control" required>
                            <option></option>
                            <?php
                            $conn = db_connection();
                            $sql = "SELECT * FROM buyer WHERE status = 1";
                            $results = mysqli_query($conn, $sql);
                            while ($result = mysqli_fetch_assoc($results)) {
                                echo '<option value="' . $result['BuyerID'] . '">' . $result['BuyerName'] . '</option>';
                            }
                            ?>
                        </select>
                    </div>
                    <div class="col-md-4 mb-3">
                        <label for="validationTooltip02">Style No</label>
                        <select name="style" class="style  form-control" required>
                            <option></option>
                            <?php
                            $conn = db_connection();
                            $sql = "SELECT * FROM style WHERE status = 1";
                            $results = mysqli_query($conn, $sql);
                            while ($result = mysqli_fetch_assoc($results)) {
                                echo '<option value="' . $result['StyleID'] . '">' . $result['StyleNumber'] . '</option>';
                            }
                            ?>
                        </select>
                    </div>
                    <div class="col-md-4 mb-3">
                        <label for="validationTooltipUsername">Color</label>
                        <select name="color" class="color  form-control" required>
                            <option></option>
                            <?php
                            $conn = db_connection();
                            $sql = "SELECT * FROM color WHERE status = 1";
                            $results = mysqli_query($conn, $sql);
                            while ($result = mysqli_fetch_assoc($results)) {
                                echo '<option value="' . $result['id'] . '">' . $result['color'] . '</option>';
                            }
                            ?>
                        </select>
                    </div>
                </div>
                <style>
                    #myTable {
                        font-size: 12px;
                        width: 100%;

                    }

                    #myTable tr,
                    #myTable th,
                    #myTable td {
                        border: 1px solid black;
                        max-width: 60px;
                    }

                    #myTable input,
                    textarea {
                        border: none;
                        padding: 2px;
                        width: 100%;
                    }

                    #addrow {
                        width: 80px !important;
                        margin: 10px;
                    }
                </style>
                <div class="row">
                    <div class="col-md-12" style="overflow-x: auto;">
                        <table class="order-list" id="myTable" width="100%">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Date</th>
                                    <th>Shade</th>
                                    <th>Shrinkage%</th>
                                    <th>Roll No</th>
                                    <th>YDS</th>
                                    <th>Shade</th>
                                    <th>Shrinkage%</th>
                                    <th>Roll No</th>
                                    <th>YDS</th>
                                    <th>Total YDS</th>
                                    <th>Fabric Open Time</th>
                                    <th>Fabric Lay Date</th>
                                    <th>Fabric Lay Time</th>
                                    <th>Total Hours</th>
                                    <th>Remarks</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <th scope="row">1</th>
                                    <td>
                                        <input   type="date" name="date[]" >
                                    </td>
                                    <td>
                                        <input placeholder="Shade" type="text" name="shade[]">
                                    </td>
                                    <td>
                                        <input placeholder="Shrinkage%" type="text" name="shrinkage[]">
                                    </td>
                                    <td>
                                        <input placeholder="Roll No" name="rollno[]" type="text">
                                    </td>
                                    <td>
                                        <input placeholder="Yds" name="yds[]" type="text">
                                    </td>
                                    <td>
                                        <input placeholder="Shade" type="text" name="shade2[]">
                                    </td>
                                    <td>
                                        <input placeholder="Shrinkage%" type="text" name="shrinkage2[]">
                                    </td>
                                    <td>
                                        <input placeholder="Roll No" name="rollno2[]" type="text">
                                    </td>
                                    <td>
                                        <input placeholder="Yds" name="yds2[]" type="text">
                                    </td>
                                    <td>
                                        <input placeholder="Total Yds" name="ttlyds[]" type="text">
                                    </td>
                                    <td>
                                        <input placeholder="FOT" name="fot[]" type="text">
                                    </td>
                                    <td>
                                        <input placeholder="FLD" name="fld[]" type="date">
                                    </td>
                                    <td>
                                        <input placeholder="FLT" name="flt[]" type="text">
                                    </td>
                                    <td>
                                        <input placeholder="TTL HRS" name="ttlhrs[]" type="text">
                                    </td>
                                    <td>
                                        <input placeholder="Remark" name="remark[]" type="text">
                                    </td>
                                    <td><a class="deleteRow"></a></td>
                                </tr>

                            </tbody>
                            <tfoot>
                                <tr>
                                    <td colspan="17" class="text-center"><input type="button" class="btn btn-sm btn-success" id="addrow" value="Add Row" /><br></td>
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
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.3.0/js/bootstrap-datepicker.js"></script>
    <script>
        $(function() {
            $('body').on('focus', ".datepicker", function() {
                $(this).datepicker({
                    dateFormat: 'yy-mm-dd'
                });
            });
        });

        $(document).ready(function() {
            var counter = 0;
            var limit = 100;

            $("#addrow").on("click", function() {

                counter = $('#myTable tr').length - 1;

                var newRow = $("<tr>");
                var cols = "";

                cols += '<th>' + counter + '</th>';
                cols += '<td><input    type="text" name="date[]"></td>';
                cols += '<td><input placeholder="Shade" type="text" name="shade[]"></td>';
                cols += '<td><input placeholder="Shrinkage%" type="text" name="shrinkage[]"></td>';
                cols += '<td><input placeholder="Roll No" name="rollno[]" type="text"></td>';
                cols += '<td><input placeholder="Yds" name="yds[]" type="text"></td>';
                cols += '<td><input placeholder="Shade" type="text" name="shade2[]"></td>';
                cols += '<td><input placeholder="Shrinkage%" type="text" name="shrinkage2[]"></td>';
                cols += '<td><input placeholder="Roll No" name="rollno2[]" type="text"></td>';
                cols += '<td><input placeholder="Yds" name="yds2[]" type="text"></td>';
                cols += '<td><input placeholder="Total Yds" name="ttlyds[]" type="text"></td>';
                cols += '<td><input placeholder="FOT" name="fot[]" type="text"></td>';
                cols += '<td><input placeholder="FLD" name="fld[]"  type="date"></td>';
                cols += '<td><input placeholder="FLT" name="flt[]" type="text"></td>';
                cols += '<td><input placeholder="TTL HRS" name="ttlhrs[]" type="text"></td>';
                cols += '<td><input placeholder="Remark" name="remark[]" type="text"></td>';

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