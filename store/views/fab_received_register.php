<?php

$page_privilege = 5;
hasAccess();

$PageTitle = "Fabic Received Register | Optima Inventory";
function customPageHeader()
{
    ?>
    <!--Arbitrary HTML Tags-->
<?php }
include_once "controller/fab_received_register.php";
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
                <div>Fabric Register Stock
                    <div class="page-title-subheading">
                        Fabric Register Stock Details
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="main-card mb-3 card">
        <div class="card-body">
            <!-- <h5 class="card-title">Card Title</h5> -->
            <table class="table table-bordered text-center table-striped table-hover">
                <thead>
                    <th>#</th>
                    <th>Buyer</th>
                    <th>PO</th>
                    <th>Style</th>
                    <th>Action</th>
                </thead>
                <tbody>
                    <?php
                    $count = 1;
                    while ($row = mysqli_fetch_assoc($query)) {
                        ?>
                        <tr>
                            <td><?= $count++ ?></td>
                            <td><?= $row['BuyerName'] ?></td>
                            <td><?= $row['PONumber'] ?></td>
                            <td><?= $row['StyleNumber'] ?></td>
                            <td> <a href="<?= $path ?>/index.php?page=single_fab_received&fabRecBuyer=<?= $row['Buyer'] ?>&fbRecPOID=<?= $row['POID'] ?>&fbRecStyle=<?= $row['StyleID'] ?>&fbRecColor=<?= $row['Color'] ?>" class="btn btn-sm btn-primary">Details</a> </td>
                        </tr>
                    <?php
                    }
                    while ($rowother = mysqli_fetch_assoc($queryother)) {
                        ?>
                        <tr>
                            <td><?= $count++ ?></td>
                            <td><?= $rowother['BuyerName'] ?></td>
                            <td></td>
                            <td style="text-transform:capitalize"><?= $rowother['ContrastPocket'] ?></td>
                            <td> <a href="<?= $path ?>/index.php?page=single_fab_received&fabRecOtherBuyerid=<?= $rowother['BuyerID']; ?>&ContrastPocket=<?=$rowother['ContrastPocket']?>" class="btn btn-sm btn-primary">Details</a> </td>
                        </tr>
                    <?php
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
    ?>

    <!-- Extra Script Here -->

<?php }
include_once "includes/footer.php";
?>