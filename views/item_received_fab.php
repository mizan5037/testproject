<?php

$PageTitle = "Fabric Received | Optima Inventory";
function customPageHeader()
{
    ?>
    <!--Arbitrary HTML Tags-->
<?php }
include_once "controller/add_item_received_fab.php";
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
                <div>Fabric Received (Style)
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
            <form class="needs-validation" method="POST" novalidate>
                <div class="form-row">
                    <table class="mb-0 table table-bordered order-list" id="myTable">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>PO</th>
                                <th>Style</th>
                                <th>Color</th>
                                <th>Shade</th>
                                <th>Shrinkage</th>
                                <th>Width</th>
                                <th>Received Yds</th>
                                <th>Received Roll</th>
                                <th>Shortage/Excess Yds</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <th scope="row">1</th>
                                <td>
                                    <select name="po[]" class="po form-control-sm" required>
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
                                </td>
                                <td>
                                    <select name="style[]" class="style form-control-sm" required>
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
                                </td>
                                <td>
                                    <select name="color[]" class="style form-control-sm" required>
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
                                    <select name="shade[]" class="form-control-sm">
                                        <option value="A">A</option>
                                        <option value="B">B</option>
                                        <option value="C">C</option>
                                        <option value="D">D</option>
                                        <option value="E">E</option>
                                        <option value="F">F</option>
                                        <option value="G">G</option>
                                        <option value="H">H</option>
                                    </select>
                                </td>
                                <td>
                                    <input placeholder="Shrinkage" type="text" name="shrinkage[]" class="form-control-sm form-control">
                                </td>
                                <td>
                                    <input placeholder="Width" type="number" name="width[]" class="form-control-sm form-control">
                                </td>
                                <td>
                                    <input placeholder="Received Yds" type="number" name="receivefab[]" class="form-control-sm form-control">
                                </td>
                                <td>
                                    <input placeholder="Received Roll" type="number" name="receiveroll[]" class="form-control-sm form-control">
                                </td>
                                <td>
                                    <input placeholder="Shortage/Excess Yds" type="number" name="sortexs[]" class="form-control-sm form-control">
                                </td>
                                <td></td>
                            </tr>
                        </tbody>
                        <tfoot>
                            <tr>
                                <td colspan="11" style="text-align:center">
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
                cols += '<td><select name="po[]" class="po form-control-sm" required><option></option>';
                <?php
                    $conn = db_connection();
                    $sql = "SELECT * FROM po WHERE status = 1";
                    $results = mysqli_query($conn, $sql);
                    while ($result = mysqli_fetch_assoc($results)) {
                        echo 'cols += \'<option value="' . $result['POID'] . '">' . $result['PONumber'] . '</option>\'; ';
                    }
                    ?>
                cols += '</select></td>';
                cols += '<td><select name="style[]" class="style form-control-sm" required><option></option>';
                <?php
                    $conn = db_connection();
                    $sql = "SELECT * FROM style WHERE status = 1";
                    $results = mysqli_query($conn, $sql);
                    while ($result = mysqli_fetch_assoc($results)) {
                        echo 'cols += \'<option value="' . $result['StyleID'] . '">' . $result['StyleNumber'] . '</option>\'; ';
                    }
                    ?>
                cols += '</select></td>';
                cols += '<td><select name="color[]" class="style form-control-sm" required> <option></option> <?php
                                        $conn = db_connection();
                                        $sql = "SELECT * FROM color WHERE status = 1";
                                        $results = mysqli_query($conn, $sql);
                                        while ($result = mysqli_fetch_assoc($results)) {
                                            echo '<option value="' . $result['id'] . '">' . $result['color'] . '</option>';
                                        }
                                        ?> </select></td>';
                cols += '<td><select name="shade[]" class="form-control-sm"> <option value="A">A</option> <option value="B">B</option> <option value="C">C</option> <option value="D">D</option> <option value="E">E</option> <option value="F">F</option> <option value="G">G</option> <option value="H">H</option> </select></td>';
                cols += '<td><input placeholder="Shrinkage" type="text" name="shrinkage[]" class="form-control-sm form-control"></td>';
                cols += '<td><input placeholder="Width" type="number" name="width[]" class="form-control-sm form-control"></td>';
                cols += '<td><input placeholder="Received Fabric Yds" type="number" name="receivefab[]" class="form-control-sm form-control"></td>';
                cols += '<td><input placeholder="Received Roll" type="number" name="receiveroll[]" class="form-control-sm form-control"></td>';
                cols += '<td><input placeholder="Shortage/Excess" type="number" name="sortexs[]" class="form-control-sm form-control"></td>';

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