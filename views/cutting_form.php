<?php

$PageTitle = "Cutting Form | Optima Inventory";
function customPageHeader()
{
    ?>
    <!--Arbitrary HTML Tags-->
<?php }
include_once "controller/add_cutting_form.php";
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
                <div>Cutting Form
                    <div class="page-title-subheading">
                        Please use this form to add a new Item.
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="main-card mb-3 card">
        <div class="card-body">
            <form class="needs-validation" method="POST" novalidate>
                <div class="form-row">
                    <div class="col-md-4 mb-4">
                        <label for="validationTooltip01">Date</label>
                        <input type="date" class="form-control form-control-sm" name="date" id="validationTooltip01" placeholder="Date" required>
                    </div>
                </div>
                <div class="form-row">

                    <div class="col-md-4 mb-3">
                        <label for="validationTooltip01">Style</label>
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
                        <label for="validationTooltip02">Cutting no</label>
                        <input type="text" class="form-control" id="validationTooltip02" placeholder="Cutting no" name="cutting_no" required>
                    </div>
                    <div class="col-md-4 mb-3">
                        <label for="validationTooltipUsername">PO no</label>
                        <select name="po" class="po  form-control" required>
                            <option></option>
                            <?php
                            $conn = db_connection();
                            $sql = "SELECT * FROM po WHERE status = 1";
                            $results = mysqli_query($conn, $sql);
                            while ($result = mysqli_fetch_assoc($results)) {
                                echo '<option value="' . $result['POID'] . '">' . $result['PONumber'] . '</option>';
                            }
                            ?>
                        </select>
                    </div>
                </div>
                <div class="form-row">
                    <table class="mb-0 table table-bordered order-list">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Color</th>
                                <th>Size</th>
                                <th>Qty</th>
                                <th>Send to Sewing</th>
                                <th>Print & EMB Send</th>
                                <th>Print & EMB Receive</th>
                                <th>Remark</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <th scope="row">1</th>
                                <td>
                                    <select name="color[]" class="color mb-2 form-control-sm form-control" required>
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
                                </td>
                                <td>
                                    <select name="size[]" class="size mb-2 form-control-sm form-control" required>
                                        <option></option>
                                        <?php
                                        $conn = db_connection();
                                        $sql = "SELECT * FROM size WHERE status = 1";
                                        $results = mysqli_query($conn, $sql);
                                        while ($result = mysqli_fetch_assoc($results)) {
                                            echo '<option value="' . $result['id'] . '">' . $result['size'] . '</option>';
                                        }
                                        ?>
                                    </select>
                                </td>
                                <td>
                                    <input placeholder="Qty" name="qty[]" type="number" class="mb-2 form-control-sm form-control">
                                </td>
                                <td>
                                    <input placeholder="Sewing" name="sewing[]" type="number" class="mb-2 form-control-sm form-control">
                                </td>
                                <td>
                                    <input placeholder="Print & EMB Send" name="embsend[]" type="number" class="mb-2 form-control-sm form-control">
                                </td>
                                <td>
                                    <input placeholder="Print & EMB Receive" type="number" name="embreceive[]" class="mb-2 form-control-sm form-control">
                                </td>
                                <td>
                                    <input placeholder="Remark" type="text" name="remark[]" class="mb-2 form-control-sm form-control">
                                </td>
                                <td><a class="deleteRow"></a></td>
                            </tr>

                        </tbody>
                        <tfoot>
                            <tr>
                                <td colspan="7" class="text-center"><input type="button" class="btn btn-sm btn-success" id="addrow" value="Add Row" /><br></td>
                            </tr>
                        </tfoot>
                    </table>
                </div>
                <br>
                <div class="row">
                    <div class="col-md-12 text-right">
                        <button class="btn btn-primary" type="submit">Save</button>
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
            var counter = 2;

            $("#addrow").on("click", function() {
                var newRow = $("<tr>");
                var cols = "";

                cols += '<th scope="row">' + counter + '</th>';
                cols += '<td><select name="color[]" class="color mb-2 form-control-sm form-control" required><option></option>';
                <?php
                    $conn = db_connection();
                    $sql = "SELECT * FROM color WHERE status = 1";
                    $results = mysqli_query($conn, $sql);
                    while ($result = mysqli_fetch_assoc($results)) {
                        echo 'cols += \'<option value="' . $result['id'] . '">' . $result['color'] . '</option>\'; ';
                    }
                    ?>
                cols += '</select></td>';
                cols += '<td><select name="size[]" class="size mb-2 form-control-sm form-control" required><option></option>';
                <?php
                    $conn = db_connection();
                    $sql = "SELECT * FROM size WHERE status = 1";
                    $results = mysqli_query($conn, $sql);
                    while ($result = mysqli_fetch_assoc($results)) {
                        echo 'cols += \'<option value="' . $result['id'] . '">' . $result['size'] . '</option>\'; ';
                    }
                    ?>
                cols += '</select></td>';
                cols += '<td><input placeholder="Qty" type="number" name="qty[]" class="mb-2 form-control-sm form-control"></td>';
                cols += '<td><input placeholder="Sewing" type="number" name="sewing[]" class="mb-2 form-control-sm form-control"></td>';

                cols += '<td><input placeholder="Print & EMB Send" type="number" name="embsend[]" class="mb-2 form-control-sm form-control"></td>';
                cols += '<td><input placeholder="Print & EMB Receive" name="embreceive[]" type="number" class="mb-2 form-control-sm form-control"></td>';
                cols += '<td><input placeholder="Remark" name="remark[]" type="text" class="mb-2 form-control-sm form-control"></td>';
                cols += '<td><input type="button" class="ibtnDel btn btn-sm btn-danger "  value="Delete"></td>';
                newRow.append(cols);
                $("table.order-list").append(newRow);
                counter++;
            });



            $("table.order-list").on("click", ".ibtnDel", function(event) {
                $(this).closest("tr").remove();
                counter -= 1
            });


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