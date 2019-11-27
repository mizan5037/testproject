<?php

$page_privilege = 5;
hasAccess();

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
                        <select name="po" id='po' class=" mb-2 form-control-sm form-control search_select" required>
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
                        <input type="number" id="orderQty" class="form-control form-control-sm" disabled>
                    </div>
                </div>
                <br>
                <div class="form-row">
                    <table id="myTable" class="order-list table table-bordered">
                        <thead>
                            <tr>
                                <th width="10%">Date</th>
                                <th width="20%">Floor</th>
                                <th width="20%">Line</th>
                                <th width="20%">Qty</th>
                                <th width="10%">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>
                                    <input type="date" name="date[]" class="form-control form-control-sm" />
                                </td>
                                <td>
                                    <select name="floor[]" onchange="getline('floor1','#line1');" id="floor1" class=" mb-2 form-control-sm form-control search_select" required>
                                        <option></option>
                                        <?php
                                        $conn = db_connection();
                                        $sql = "SELECT * FROM floor WHERE status = 1";
                                        $results = mysqli_query($conn, $sql);
                                        while ($result = mysqli_fetch_assoc($results)) {
                                            echo '<option value="' . $result['floor_id'] . '">' . $result['floor_name'] . '</option>';
                                        }
                                        ?>
                                    </select>
                                </td>
                                <td>
                                    <select name="line[]" id="line1" class=" mb-2 form-control-sm form-control" required>
                                        <option></option>
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
                                <td>Left: <span id="left"></span>
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
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.7/js/select2.min.js"></script>

    <script type="text/javascript">
        $('.search_select').select2({
            placeholder: 'Select Card Numbers'
        });

        $("select").select2();
    </script>
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

        //get Line
        function getline(floorid, lineid) {
            let floor = document.getElementById(floorid).value;
            if (floor != '') {
                $.ajax({
                    url: "<?= $path ?>/controller/api.php",
                    method: "POST",
                    data: {
                        floor: floor,
                        form: 'get_line',
                        token: '<?= get_ses('token') ?>'
                    },
                    dataType: "text",
                    success: function(data) {
                        $(lineid).html(data);
                    }
                });
            } else {
                $(lineid).html("<option>---</option>");
            }
        }


        $(document).ready(function() {
            var counter = 0;
            var limit = 200;

            $("#addrow").on("click", function() {

                counter = $('#myTable tr').length - 2;

                var newRow = $("<tr>");
                var cols = "";

                cols += '<td><input type="date" name="date[]" class="form-control form-control-sm" /></td>';
                cols += '<td><select name="floor[]" onchange="getline(\'floor' + counter + '\',\'#line' + counter + '\');" id="floor' + counter + '" class=" mb-2 form-control-sm form-control search_select" required> <option></option> <?php
                                                                                                                                                                                                                                                $conn = db_connection();
                                                                                                                                                                                                                                                $sql = "SELECT * FROM floor WHERE status = 1";
                                                                                                                                                                                                                                                $results = mysqli_query($conn, $sql);
                                                                                                                                                                                                                                                while ($result = mysqli_fetch_assoc($results)) {
                                                                                                                                                                                                                                                    echo '<option value="' . $result['floor_id'] . '">' . $result['floor_name'] . '</option>';
                                                                                                                                                                                                                                                }
                                                                                                                                                                                                                                                ?> </select></td>';
                cols += '<td><select id="line' + counter + '" name="line[]" class=" mb-2 form-control-sm form-control search_select" required> <option></option></select></td>';
                cols += '<td><input type="number" name="qty[]" class="form-control form-control-sm" /></td>';

                cols += '<td><input type="button" class="ibtnDel btn btn-danger btn-sm"  value="Delete"></td>';
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
            var left = $('#orderQty').val();
            $("table.order-list").find('input[name^="qty"]').each(function() {
                grandTotal += +$(this).val();

            });
            left = left - grandTotal;
            $("#grandtotal").text(grandTotal.toFixed(0));
            $("#left").text(left.toFixed(0));
        }
    </script>

<?php }
include_once "includes/footer.php";
?>