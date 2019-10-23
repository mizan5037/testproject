<?php

$PageTitle = "Details PO | Optima Inventory";
function customPageHeader()
{
    ?>
    <!--Arbitrary HTML Tags-->
<?php }

if (isset($_GET['poid'])) {
    $poid = $_GET['poid'];
} else {
    nowgo('/index.php?page=all_po');
}

include_once "controller/add_prepack.php";
include_once "controller/po_update.php";
include_once "controller/add_order_description.php";

function modal()
{
    ?>
    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <form method="post">
                <div class="modal-content" style="width:150%; margin-left:-20%">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Order Description</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <table class="mb-0 table table-bordered order-list" id="myTable" width="100%">
                            <thead>
                                <tr>
                                    <th width="20%">Style</th>
                                    <th width="20%">Color</th>
                                    <th width="15%">CLR No</th>
                                    <th width="15%">DZS</th>
                                    <th width="15%">P/Pack</th>
                                    <th width="15%">Units</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>
                                        <select name="style[]" class="style mb-2 form-control-sm form-control" required>
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
                                        <input placeholder="Color" type="text" name="color[]" class="mb-2 form-control-sm form-control" required>
                                    </td>
                                    <td>
                                        <input placeholder="CLR No" type="text" name="clr_no[]" class="mb-2 form-control-sm form-control" required>
                                    </td>
                                    <td>
                                        <input placeholder="DZS" type="number" name="dzs[]" class="mb-2 form-control-sm form-control">
                                    </td>
                                    <td>
                                        <input placeholder="P/Pack" type="number" name="ppack[]" class="mb-2 form-control-sm form-control">
                                    </td>
                                    <td>
                                        <input placeholder="Units" type="number" name="units[]" class="mb-2 form-control-sm form-control">
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Save</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <!-- Modal End -->
    <!-- Modal -->
    <div class="modal fade" id="exampleModal1" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <form method="post">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Pre Pack Assorts</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <table class="mb-0 table table-bordered order-list2" id="myTable2" width="100%">
                            <thead>
                                <tr>
                                    <th width="40%">Size</th>
                                    <th width="40%">PrePack Code</th>
                                    <th width="20%">Qty</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>
                                        <input placeholder="Size" type="text" name="size[]" class="mb-2 form-control-sm form-control" required>
                                    </td>
                                    <td>
                                        <input placeholder="PrePack Code" type="text" name="ppk[]" class="mb-2 form-control-sm form-control" required>
                                    </td>
                                    <td>
                                        <input placeholder="Qty" type="number" name="qty[]" class="mb-2 form-control-sm form-control">
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Save</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <!-- Modal End -->


<?php }

$sql = "SELECT * FROM po where POID='$poid'";

$single_po = mysqli_fetch_assoc(mysqli_query($conn, $sql));
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
                <div>PO Details
                    <div class="page-title-subheading">
                        Single
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="main-card mb-3 card">
        <div class="card-body">
            <h5 class="card-title">PO No: <?= $single_po['PONumber'] ?></h5>
            <div class="row">
                <div class="col-md-6">
                    <ul>
                        <li>PO From: <b><?= $single_po['POFrom'] ?></b></li>
                        <li>PO Date: <b><?= $single_po['PODate'] ?></b></li>
                        <li>Currency: <b><?= $single_po['POCurrency'] ?></b></li>
                        <li>CMP: <b><?= $single_po['POCMP'] ?></b> </li>
                    </ul>
                </div>
                <div class="col-md-6">
                    <ul>
                        <li>Wash Cost: <b><?= $single_po['POWASH'] ?></b></li>
                        <li>Hanger Cost: <b><?= $single_po['POHANGER'] ?></b></li>
                        <li>CMP-W-Wanger: <b><?= $single_po['POCMPWH'] ?></b> </li>
                        <li>Final Destination: <b><?= $single_po['POFinalDestination'] ?></b> </li>
                        <li>Special Instruction : <b><?= $single_po['POSpecialInstruction'] ?></b> </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <div class="main-card mb-3 card">
        <div class="card-body">
            <div class="row">
                <div class="col-md-6">
                    <h5 class="card-title">Order Description</h5>
                </div>
                <div class="col-md-6 text-right">
                    <!-- Button trigger modal -->
                    <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#exampleModal">
                        Add Order
                    </button>
                </div>
            </div>
            <br>
            <div class="row">
                <div class="col-md-12">
                    <table class="table table-bordered table-hover text-center">
                        <thead>
                            <th>#</th>
                            <th>Style Number</th>
                            <th>Photo</th>
                            <th>Clr No</th>
                            <th>DZS</th>
                            <th>P/PACK</th>
                            <th>Units</th>
                            <th>Action</th>
                        </thead>
                        <tbody>
                            <?php
                            $sql = "SELECT o.*,s.StyleImage,s.StyleNumber FROM order_description o LEFT JOIN style s on s.StyleID = O.StyleID where o.POID ='$poid' AND o.Status=1";

                            $order = mysqli_query($conn, $sql);
                            $count = 1;
                            while ($row = mysqli_fetch_assoc($order)) {

                                ?>
                                <tr>
                                    <td><?= $count ?></td>
                                    <td><?= $row['StyleNumber'] ?></td>
                                    <td><img src="<?= $path . $uploadpath . $row['StyleImage'] ?>" height="50"></td>
                                    <td><?= $row['Color'] ?></td>
                                    <td><?= $row['ClrNo'] ?></td>
                                    <td><?= $row['PPack'] ?></td>
                                    <td><?= $row['Units'] ?></td>
                                    <td><a onclick="return confirm('Are You sure want to delete this item permanently?')" href="<?= $path ?>/index.php?page=po_single&poid=<?= $poid ?>&orde=<?php echo $row['OrderdescriptionID']; ?>" class="mb-2 mr-2 btn-transition btn-danger btn btn-sm btn-outline-secondary" id="details">
                                            <i class="fas fa-trash-alt" style="color: white;"></i>
                                        </a>


                                    </td>
                                </tr>
                            <?php $count++;
                            } ?>
                        </tbody>
                    </table>
                </div>

            </div>

        </div>
    </div>
    <div class="main-card mb-3 card">
        <div class="card-body">
            <div class="row">
                <div class="col-md-6">
                    <h5 class="card-title">PRE PACK ASSORT</h5>
                </div>
                <div class="col-md-6 text-right">
                    <!-- Button trigger modal -->
                    <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#exampleModal1">
                        Add PRE PACK
                    </button>
                </div>
            </div>
            <br>
            <div class="row">
                <div class="col-md-12">
                    <table class="table table-bordered table-hover text-center">
                        <thead>
                            <th>#</th>
                            <th>PrePackCode</th>
                            <th>Pre-Pack-Size</th>
                            <th>Pre-Pack-Qty</th>
                            <th>Action</th>
                        </thead>
                        <tbody>
                            <?php
                            $sql = "SELECT * FROM prepack where status=1 AND POID ='$poid'";

                            $prepack = mysqli_query($conn, $sql);
                            $count = 1;
                            while ($row = mysqli_fetch_assoc($prepack)) {

                                ?>
                                <tr>
                                    <td><?= $count ?></td>
                                    <td><?= $row['PrePackCode'] ?></td>
                                    <td><?= $row['PrePackSize'] ?></td>
                                    <td><?= $row['PrepackQty'] ?></td>
                                    <td><a onclick="return confirm('Are You sure want to delete this item permanently?')" href="<?= $path ?>/index.php?page=po_single&poid=<?= $poid ?>&preid=<?php echo $row['PrePackID']; ?>" class="mb-2 mr-2 btn-transition btn-danger btn btn-sm btn-outline-secondary" id="details">
                                            <i class="fas fa-trash-alt" style="color: white;"></i>
                                        </a>

                                    </td>
                                </tr>
                            <?php $count++;
                            } ?>
                        </tbody>
                    </table>
                </div>

            </div>
        </div>
    </div>
</div>




<?php
function customPagefooter()
{
    ?>

    <!-- Extra Script Here -->

<?php }
include_once "includes/footer.php";
?>