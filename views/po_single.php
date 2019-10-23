<?php

$PageTitle = "Details PO | Optima Inventory";
function customPageHeader()
{
    ?>
    <!--Arbitrary HTML Tags-->
<?php }

$conn = db_connection();
if (isset($_GET['POID'])) {
    $POID = $_GET['POID'];

    $sql = "SELECT * FROM po where POID='$POID'";

    $single_po = mysqli_fetch_assoc(mysqli_query($conn, $sql));
    
} else {
    nowgo('/index.php?page=all_po');
}
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
            <h5 class="card-title">Order Description</h5>

            <div class="row">
                <div class="col-md-12">
                    <table class="table table-bordered table-hover text-center">
                        <thead>
                            <th>#</th>
                            <th>StyleID</th>
                            <th>Photo</th>
                            <th>Clr No</th>
                            <th>DZS</th>
                            <th>P/PACK</th>
                            <th>Units</th>
                            <th>Action</th>
                        </thead>
                        <tbody>
                            <?php
                            $sql = "SELECT o.*,s.StyleImage FROM order_description o LEFT JOIN style s on s.StyleID = O.StyleID where o.POID ='$POID'";

                            $order = mysqli_query($conn, $sql);
                            $count = 1;
                            while ($row = mysqli_fetch_assoc($order)) {
                              
                                ?>
                                <tr>
                                    <td><?= $count ?></td>
                                    <td><?= $row['StyleID'] ?></td>
                                    <td><img src="<?= $path . $uploadpath . $row['StyleImage'] ?>" height="50" ></td>
                                    <td><?= $row['Color'] ?></td>
                                    <td><?= $row['ClrNo'] ?></td>
                                    <td><?= $row['PPack'] ?></td>
                                    <td><?= $row['Units'] ?></td>
                                    <td><a onclick="return confirm('Are You sure want to delete this item permanently?')" href="<?= $path ?>/index.php?page=all_style&delete=<?php echo $row['StyleID']; ?>" class="mb-2 mr-2 btn-transition btn-danger btn btn-sm btn-outline-secondary" id="details">
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
            <h5 class="card-title">Pre Pack Assort</h5>
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
                            $sql = "SELECT * FROM prepack where POID ='$POID'";

                            $prepack = mysqli_query($conn, $sql);
                            $count = 1;
                            while ($row = mysqli_fetch_assoc($prepack)) {
                               
                                ?>
                                <tr>
                                    <td><?= $count ?></td>
                                    <td><?= $row['PrePackCode'] ?></td>
                                    <td><?= $row['PrePackSize'] ?></td>
                                    <td><?= $row['PrepackQty'] ?></td>                                    
                                    <td><a onclick="return confirm('Are You sure want to delete this item permanently?')" href="<?= $path ?>/index.php?page=all_style&delete=<?php echo $row['StyleID']; ?>" class="mb-2 mr-2 btn-transition btn-danger btn btn-sm btn-outline-secondary" id="details">
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