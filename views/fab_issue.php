<?php

$page_privilege = 5;
hasAccess();

$PageTitle = "Fabric Issue | Optima Inventory";
function customPageHeader()
{
    ?>
    <!--Arbitrary HTML Tags-->
<?php }
include_once "controller/add_fab_issue.php";
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
                <div>Fabric Issue
                    <div class="page-title-subheading">
                        Fabric Issue
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
                            <label for="validationTooltip02">Buyer Name</label>
                            <select name="buyer[]" class="buyer mb-2 form-control-sm form-control search_select" required>
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
                        <div class="col-md-4">
                            <label for="validationTooltip02">P.O. No</label>
                            <select name="po[]" class="po mb-2 form-control-sm form-control search_select" required>
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
                        <div class="col-md-4">
                            <label for="validationTooltip02">Style No</label>
                            <select name="style[]" class="style mb-2 form-control-sm form-control search_select" required>
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

                    </div>
                    <br>
                    <div class="form-row">
                        <table id="myTable" class="order-list table table-hover table-bordered">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Particulars</th>
                                    <th width="15%">Color</th>
                                    <th>QTZ (DZ)</th>
                                    <th>Consuption (yds)</th>
                                    <th>RQD QTY (yds)</th>
                                    <th>ISSUE QTY (yds)</th>
                                    <th>Roll</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <th>1</th>
                                    <td>
                                        <input class="mb-2 form-control-sm form-control" type="text" placeholder="Particulars" name="particulars[]" />
                                    </td>
                                    <td>
                                        <select name="color[]" class="style mb-2 form-control-sm form-control" required>
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
                                        <input class="mb-2 form-control-sm form-control" type="number" placeholder="QTZ (DZ)" name="qtz[]" />
                                    </td>
                                    <td>
                                        <input class="mb-2 form-control-sm form-control" type="number" placeholder="Consuption" name="consuption[]" />
                                    </td>
                                    <td>
                                        <input class="mb-2 form-control-sm form-control" type="number" placeholder="RQD QTY" name="rqd[]" />
                                    </td>
                                    <td>
                                        <input class="mb-2 form-control-sm form-control" type="number" placeholder="ISSUE QTY" name="issue[]" />
                                    </td>
                                    <td>
                                        <input class="mb-2 form-control-sm form-control" type="number" placeholder="Roll" name="remark[]" />
                                    </td>
                                    <td><a class="deleteRow"></a>

                                    </td>
                                </tr>
                            </tbody>
                            <tfoot>
                                <tr>
                                    <td colspan="9" style="text-align: left;">
                                        <input type="button" class="btn btn-success" id="addrow" value="Add Row" />
                                    </td>
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
                cols += '<td><input class="mb-2 form-control-sm form-control" type="text" placeholder="Particulars" name="particulars[]" /></td>';
                cols += '<td><select name="color[]" class="style mb-2 form-control-sm form-control search_select" required><option></option><?php
                                                                                                                                                $conn = db_connection();
                                                                                                                                                $sql = "SELECT * FROM color WHERE status = 1";
                                                                                                                                                $results = mysqli_query($conn, $sql);
                                                                                                                                                while ($result = mysqli_fetch_assoc($results)) {
                                                                                                                                                    echo '<option value="' . $result['id'] . '">' . $result['color'] . '</option>';
                                                                                                                                                }
                                                                                                                                                ?></select></td>';
                cols += '<td><input class="mb-2 form-control-sm form-control" type="number" placeholder="QTZ (DZ)" name="qtz[]"/></td>';
                cols += '<td><input class="mb-2 form-control-sm form-control" type="number" placeholder="Consuption" name="consuption[]"/></td>';
                cols += '<td><input class="mb-2 form-control-sm form-control" type="number" placeholder="RQD QTY" name="rqd[]"/></td>';
                cols += '<td><input class="mb-2 form-control-sm form-control" type="number" placeholder="ISSUE QTY" name="issue[]" /></td>';
                cols += '<td><input class="mb-2 form-control-sm form-control" type="number" placeholder="Roll" name="remark[]"/></td>';

                cols += '<td><input type="button" class="ibtnDel btn btn-danger"  value="Delete"></td>';
                newRow.append(cols);
                if (counter >= limit) $('#addrow').attr('disabled', true).prop('value', "You've reached the limit");
                $("table.order-list").append(newRow);
                counter++;
                setTimeout(function() {
                    $('.search_select').select2();
                }, 100);
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