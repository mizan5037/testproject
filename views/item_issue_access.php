<?php

$page_privilege = 5;
hasAccess();

$PageTitle = "Item Issue | Optima Inventory";
function customPageHeader()
{
    ?>
    <!--Arbitrary HTML Tags-->
<?php }
include_once "controller/add_item_issue_access.php";
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
                <div>Item Issue
                    <div class="page-title-subheading">
                        Item Issue
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="main-card mb-3 card">
        <div class="card-body">
            <!-- <h5 class="card-title">Card Title</h5> -->
            <div class="container">
                <form action="" class="needs-validation" method="POST" novalidate>
                    <div class="form-row">
                        <div class="col-md-4">
                            <label for="validationTooltip02">Cutting No</label>
                            <input type="text" class="mb-2 form-control-sm form-control" id="validationTooltip02" name="cutting_no" laceholder="Cutting No" required>
                        </div>
                        <div class="col-md-4">
                            <label for="validationTooltip02">Style No</label>

                            <select name="style" class="style mb-2 form-control-sm form-control" required>
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
                        <div class="col-md-4">
                            <label for="validationTooltip02">P.O. No</label>
                            <select name="po" class="po mb-2 form-control-sm form-control" required>
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
                    <br>
                    <div class="form-row">
                        <table id="myTable" class="order-list table table-hover table-bordered">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th width="20%">Item</th>
                                    <th width="20%">Color</th>
                                    <th width="10%">Size</th>
                                    <th>QTY</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <th>1</th>
                                    <td>
                                        <select name="item[]" class="item mb-2 form-control-sm form-control search_select" required>
                                            <option></option>
                                            <?php
                                            $conn = db_connection();
                                            $sql = "SELECT * FROM item WHERE status = 1";
                                            $results = mysqli_query($conn, $sql);
                                            while ($result = mysqli_fetch_assoc($results)) {
                                                echo '<option value="' . $result['ItemID'] . '">' . $result['ItemName'] . '</option>';
                                            }
                                            ?>
                                        </select>
                                    </td>
                                    <td>
                                        <select name="color[]" class="color mb-2 form-control-sm form-control search_select" required>
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
                                        <select name="size[]" class="size mb-2 form-control-sm form-control search_select" required>
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
                                        <input class="mb-2 form-control-sm form-control" type="number" placeholder="QTY" name="qty[]" />
                                    </td>
                                    <td><a class="deleteRow"></a>

                                    </td>
                                </tr>
                            </tbody>
                            <tfoot>
                                <tr>
                                    <td colspan="6" style="text-align: center;">
                                        <input type="button" class="btn btn-success" id="addrow" value="Add Row" />
                                    </td>
                                </tr>
                                <tr>
                                    <td colspan="5" style="text-align: right;">
                                        <span id="grandtotal"></span>
                                    </td>
                                    <td></td>
                                </tr>
                            </tfoot>
                        </table>
                    </div>
                    <div class="row">
                        <div class="col-md-12 text-right">
                            <button type="submit" class="btn btn-primary">Issue</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>




<?php
function customPagefooter()
{
    ?>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.7/js/select2.min.js"></script>

    <script type="text/javascript">
        $('.search_select').select2({
            placeholder: 'Select Card Numbers'
        });

        $("select").select2();
    </script>

    <script>
        $(document).ready(function() {
            var counter = 0;
            var limit = 100;

            $("#addrow").on("click", function() {

                counter = $('#myTable tr').length - 1;

                var newRow = $("<tr>");
                var cols = "";

                cols += '<th>' + counter + '</th>';
                cols += '<td><select name="item[]" class="item mb-2 form-control-sm form-control search_select" required><option></option>';
                <?php
                    $conn = db_connection();
                    $sql = "SELECT * FROM item WHERE status = 1";
                    $results = mysqli_query($conn, $sql);
                    while ($result = mysqli_fetch_assoc($results)) {
                        echo 'cols += \'<option value="' . $result['ItemID'] . '">' . $result['ItemName'] . '</option>\'; ';
                    }
                    ?>
                cols += '</select></td>';
                cols += '<td><select name="color[]" class="color mb-2 form-control-sm form-control search_select" required><option></option>';
                <?php
                    $conn = db_connection();
                    $sql = "SELECT * FROM color WHERE status = 1";
                    $results = mysqli_query($conn, $sql);
                    while ($result = mysqli_fetch_assoc($results)) {
                        echo 'cols += \'<option value="' . $result['id'] . '">' . $result['color'] . '</option>\'; ';
                    }
                    ?>
                cols += '</select></td>';
                cols += '<td><select name="size[]" class="size mb-2 form-control-sm form-control search_select" required><option></option>';
                <?php
                    $conn = db_connection();
                    $sql = "SELECT * FROM size WHERE status = 1";
                    $results = mysqli_query($conn, $sql);
                    while ($result = mysqli_fetch_assoc($results)) {
                        echo 'cols += \'<option value="' . $result['id'] . '">' . $result['size'] . '</option>\'; ';
                    }
                    ?>
                cols += '</select></td>';
                cols += '<td><input class="mb-2 form-control-sm form-control" type="number" placeholder="QTY" name="qty[]" /></td>';

                cols += '<td><input type="button" class="ibtnDel btn btn-danger"  value="Delete"></td>';
                newRow.append(cols);
                if (counter >= limit) $('#addrow').attr('disabled', true).prop('value', "You've reached the limit");
                $("table.order-list").append(newRow);
                counter++;
                setTimeout(function() {
                    $('.search_select').select2();
                }, 100);
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