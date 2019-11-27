<?php

$PageTitle = "Plan Details | Optima Inventory";
function customPageHeader()
{
    ?>
    <!--Arbitrary HTML Tags-->
<?php }

function modal()
{
    global $path;
    global $id;
    ?>
    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content" style="width:190%; margin-left:-225px">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">New Day</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="<?=$path?>/index.php?page=new_plan" method="post">
                        <table id="myTable" class="order-list table table-bordered">
                            <thead>
                                <tr>
                                    <th>Date</th>
                                    <th>Floor</th>
                                    <th>Line</th>
                                    <th>Qty</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>
                                        <input type="date" name="date[]" class="form-control form-control-sm" />
                                        <input type="hidden" name="id" value="<?=$id?>" />
                                    </td>
                                    <td>
                                        <select name="floor[]" onchange="getline('floor1','#line1');" id="floor1" class=" mb-2 form-control-sm form-control" required>
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
                        <div class="form-row">
                            <div class="col-md-12 text-center">
                                <input type="submit" name="submit" class="btn btn-sm btn-primary" value="Save">
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- Modal End -->
<?php }

// keep the header always last.
include_once "controller/single_plan.php";
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
                <div>Plan Details
                    <div class="page-title-subheading">
                        Updated Plan Details
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="main-card mb-3 card">
        <div class="card-body text-center">
            <h4> Title: <?= $row['title'] ?></h4>
            <h6>P.O Number:
                <a class="btn btn-sm btn-outline-success" href="<?= $path ?>/index.php?page=po_single&poid=<?= $row['poid'] ?>" target="_blank">
                    <?= $row['PONumber'] ?>
                </a> &nbsp;&nbsp;&nbsp; Style Number:
                <a class="btn btn-sm btn-outline-success" href="<?= $path ?>/index.php?page=po_single&poid=<?= $row['styleid'] ?>" target="_blank">
                    <?= $row['StyleNumber'] ?>
                </a>
            </h6>
        </div>
    </div>
    <div class="main-card mb-3 card">
        <div class="card-body text-center">

            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th colspan="4">
                            Plan Details
                        </th>
                        <th>
                            <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#exampleModal">
                                Add Day
                            </button>
                        </th>
                    </tr>
                    <tr>
                        <th>Date</th>
                        <th>Floor</th>
                        <th>Line</th>
                        <th>Qty</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $qty = 0;
                    while ($plan = mysqli_fetch_assoc($plan_details)) {
                        ?>
                        <tr>
                            <td><?= $plan['date'] ?></td>
                            <td><?= $plan['floor_name'] ?></td>
                            <td><?= $plan['line'] ?></td>
                            <td><?= $plan['qty'] ?></td>
                            <td>
                                <a href="<?= $path ?>/index.php?page=update_plan&id=<?= $plan['id'] ?>&plan_id=<?=$row['id'];?>" class="mb-2 mr-2 btn-transition btn btn-sm btn-outline-secondary btn-primary" id="details">
                                    <i class="fas fa-edit" style="color: white;"></i>
                                </a>
                                /
                                <a onclick="return confirm('Are You sure want to delete this item permanently?')" href="<?= $path ?>/index.php?page=single_plan&delete=<?= $plan['id'] ?>&id=<?= $id ?>" class="mb-2 mr-2 btn-transition btn-danger btn btn-sm btn-outline-secondary" id="details">
                                    <i class="fas fa-trash-alt" style="color: white;"></i>
                                </a>

                            </td>
                        </tr>
                    <?php
                        $qty += $plan['qty'];
                    }
                    ?>
                </tbody>
            </table>

        </div>
    </div>
</div>


<?php
function customPagefooter()
{
    global $path;
    global $row;
    global $qty;
    ?>

    <!-- Extra Script Here -->
    <script>
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
                cols += '<td><select name="floor[]" onchange="getline(\'floor' + counter + '\',\'#line' + counter + '\');" id="floor' + counter + '" class=" mb-2 form-control-sm form-control" required> <option></option> <?php
                                                                                                                                                                                                                                $conn = db_connection();
                                                                                                                                                                                                                                $sql = "SELECT * FROM floor WHERE status = 1";
                                                                                                                                                                                                                                $results = mysqli_query($conn, $sql);
                                                                                                                                                                                                                                while ($result = mysqli_fetch_assoc($results)) {
                                                                                                                                                                                                                                    echo '<option value="' . $result['floor_id'] . '">' . $result['floor_name'] . '</option>';
                                                                                                                                                                                                                                }
                                                                                                                                                                                                                                ?> </select></td>';
                cols += '<td><select id="line' + counter + '" name="line[]" class=" mb-2 form-control-sm form-control" required> <option></option></select></td>';
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
            var left = <?= $row['quantity'] - $qty ?>;
            $("table.order-list").find('input[name^="qty"]').each(function() {
                grandTotal += +$(this).val();
                left -= +grandTotal;
            });
            $("#grandtotal").text(grandTotal.toFixed(0));
            $("#left").text(left.toFixed(0));
        }
    </script>

<?php }
include_once "includes/footer.php";
?>