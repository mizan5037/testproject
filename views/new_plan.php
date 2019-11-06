<?php

$PageTitle = "New Plan | Optima Inventory";
function customPageHeader()
{
    ?>
    <!--Arbitrary HTML Tags-->
<?php }

function modal()
{
    ?>
    <!--Modal Code if needed-->
<?php }

// keep the header always last.
include_once "controller/new_plan.php";
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
                <div>New Plan
                    <div class="page-title-subheading">
                        Add new plan here
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="main-card mb-3 card">
        <div class="card-body">
            <form method="post">
                <div class="form-row">
                    <div class="col-md-2">
                        <h4> Title: </h4>
                    </div>
                    <div class="col-md-10"> <input type="text" name="title" id="title" class="form-control"> </div>
                </div>
                <br>
                <div class="form-row">
                    <div class="col-md-4">
                        <label>P.O.</label>
                        <select name="po" id='po' class=" mb-2 form-control-sm form-control" required>
                            <option></option>
                            <?php
                            $conn = db_connection();
                            $sql = "SELECT POID, PONumber FROM po WHERE status = 1";
                            $results = mysqli_query($conn, $sql);
                            while ($result = mysqli_fetch_assoc($results)) {
                                echo '<option value="' . $result['POID'] . '">' . $result['PONumber'] . '</option>';
                            }
                            ?>
                        </select>
                    </div>
                    <div class="col-md-4">
                        <label>Style</label>
                        <select id="style" name="style" class=" mb-2 form-control-sm form-control" required>
                            <option></option>
                        </select>
                    </div>
                    <div class="col-md-4">
                        <label for="">Orderd Qty</label>
                        <input type="number" id="orderQty" class="form-control form-control-sm">
                    </div>
                </div>
                <br>
                <div class="form-row">
                    <table id="myTable" class="order-list table table-bordered">
                        <thead>
                            <tr>
                                <th>Date</th>
                                <th>Line</th>
                                <th>Qty</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>
                                    <input type="date" name="date[]" class="form-control form-control-sm" />
                                </td>
                                <td>
                                    <select name="line[]" class=" mb-2 form-control-sm form-control" required>
                                        <option></option>
                                        <?php
                                        $conn = db_connection();
                                        $sql = "SELECT * FROM line WHERE status = 1";
                                        $results = mysqli_query($conn, $sql);
                                        while ($result = mysqli_fetch_assoc($results)) {
                                            echo '<option value="' . $result['id'] . '">' . $result['line'] . '</option>';
                                        }
                                        ?>
                                    </select>
                                </td>
                                <td>
                                    <input type="number" name="qty[]" class="form-control form-control-sm" />
                                </td>
                                <td><a class="deleteRow"></a>

                                </td>
                            </tr>
                        </tbody>
                        <tfoot>
                            <tr>
                                <td colspan="5" style="text-align: left;">
                                    <input type="button" class="btn btn-sm btn-success" id="addrow" value="Add Row" />
                                </td>
                            </tr>
                            <tr>
                                <td colspan="2"></td>
                                <td colspan="2">Grand Total: <span id="grandtotal"></span>

                                </td>
                            </tr>
                        </tfoot>
                    </table>
                </div>
                <br>
                <div class="form-row">
                    <div class="col-md-12 text-center">
                        <input type="submit" class="btn btn-success" name="submit" value="Save">
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>




<?php
function customPagefooter()
{
    global $path;
    ?>

    <script>
        $(document).ready(function() {
            //get styles
            $("#po").change(function() {
                let poid = this.value;
                if (poid != '') {
                    $.ajax({
                        url: "<?= $path ?>/controller/api.php",
                        method: "POST",
                        data: {
                            po: poid,
                            form: 'get_style',
                            token: '<?= get_ses('token') ?>'
                        },
                        dataType: "text",
                        success: function(data) {
                            $("#style").html(data);
                        }
                    });
                } else {
                    $("#style").html("<option>---</option>");
                }

            });
            //get order qty
            $("#style").change(function() {
                let style = this.value;
                let po = $("#po").val();
                if (style != '') {
                    $.ajax({
                        url: "<?= $path ?>/controller/api.php",
                        method: "POST",
                        data: {
                            po: po,
                            style: style,
                            form: 'get_qty',
                            token: '<?= get_ses('token') ?>'
                        },
                        dataType: "text",
                        success: function(data) {
                            $("#orderQty").val(data);
                        }
                    });
                } else {
                    $("#orderQty").val(00);
                }

            });
        });




        $(document).ready(function() {
            var counter = 0;
            var limit = 200;

            $("#addrow").on("click", function() {

                counter = $('#myTable tr').length - 2;

                var newRow = $("<tr>");
                var cols = "";

                cols += '<td><input type="date" name="date[]" class="form-control form-control-sm" /></td>';
                cols += '<td><select name="line[]" class=" mb-2 form-control-sm form-control" required> <option></option> <?php
                                                                                                                                $conn = db_connection();
                                                                                                                                $sql = "SELECT * FROM line WHERE status = 1";
                                                                                                                                $results = mysqli_query($conn, $sql);
                                                                                                                                while ($result = mysqli_fetch_assoc($results)) {
                                                                                                                                    echo '<option value="' . $result['id'] . '">' . $result['line'] . '</option>';
                                                                                                                                }
                                                                                                                                ?> </select></td>';
                cols += '<td><input type="number" name="qty[]" class="form-control form-control-sm" /></td>';

                cols += '<td><input type="button" class="ibtnDel btn btn-danger btn-sm"  value="Delete"></td>';
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
            $("#grandtotal").text(grandTotal.toFixed(0));
        }
    </script>

<?php }
include_once "includes/footer.php";
?>