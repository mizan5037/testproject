<?php

$PageTitle = "Item Stock | Optima Inventory";
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
include_once "controller/single_item_stock.php";
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
                <div>Item Register
                    <div class="page-title-subheading">
                        As per Buyer, Style, PO, Color
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="main-card mb-3 card">
        <div class="card-body text-center">
            <h6>
                Buyer :
                <a class="btn btn-sm btn-outline-success" href="<?= $path ?>/index.php?page=single_buyer&buyer_id=<?= $rowttl['BuyerID'] ?>" target="_blank"><?= $rowttl['BuyerName'] ?></a>
                &nbsp; &nbsp;
                Style :
                <a class="btn btn-sm btn-outline-success" href="<?= $path ?>/index.php?page=single_style&id=<?= $rowttl['StyleID'] ?>" target="_blank"><?= $rowttl['StyleNumber'] ?></a>
                &nbsp; &nbsp;
                P.O. :
                <a class="btn btn-sm btn-outline-success" href="<?= $path ?>/index.php?page=po_single&poid=<?= $rowttl['POID'] ?>" target="_blank"><?= $rowttl['PONumber'] ?></a>
                &nbsp; &nbsp;
                Color : <?= $rowttl['color'] ?>
            </h6>
        </div>
    </div>
    <div class="main-card mb-3 card">
        <div class="card-body text-center">
            <table class="table table-bordered text-center">
                <thead>
                    <tr>
                        <th colspan="6">Item Received</th>
                    </tr>
                    <tr>
                        <th>#</th>
                        <th>Item</th>
                        <th>Size</th>
                        <th>Received</th>
                        <th>Shortage/Excess</th>
                        <th>Receive Date</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $count = 1;
                    while ($row = mysqli_fetch_assoc($query)) {
                        ?>
                        <tr>
                            <td><?=$count++?></td>
                            <td><?=$row['ItemName']?></td>
                            <td><?=$row['size']?></td>
                            <td><?=$row['Received'].' '.$row['ItemMeasurementUnit']?></td>
                            <td><?=$row['Shortage']?></td>
                            <td><?=date('j-M-Y', strtotime($row['TimeStamp']))?></td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </div>
    <div class="main-card mb-3 card">
        <div class="card-body text-center">
            <table class="table table-bordered text-center">
                <thead>
                    <tr>
                        <th colspan="6">Item Issued</th>
                    </tr>
                    <tr>
                        <th>#</th>
                        <th>Cutting Number</th>
                        <th>Item</th>
                        <th>Size</th>
                        <th>Issued</th>
                        <th>Issued Date</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $count = 1;
                    while ($row = mysqli_fetch_assoc($queryissue)) {
                        ?>
                        <tr>
                            <td><?=$count++?></td>
                            <td><?=$row['CuttingNumber']?></td>
                            <td><?=$row['ItemName']?></td>
                            <td><?=$row['size']?></td>
                            <td><?=$row['Qty'].' '.$row['ItemMeasurementUnit']?></td>
                            <td><?=date('j-M-Y', strtotime($row['timestamp']))?></td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
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