<?php

$page_privilege = 5;
hasAccess();

$PageTitle = "Fabic Stock | Optima Inventory";
function customPageHeader()
{
    ?>
    <!--Arbitrary HTML Tags-->
<?php }
include_once "controller/fabric_stock.php";
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
                <div>Fabric Stock
                    <div class="page-title-subheading">
                        Fabric Stock Details
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
                    <th>Style</th>
                    <th>Color</th>
                    <th>Action</th>
                </thead>
                <tbody>
                    <?php
                    $count = 1;
                    while ($row = mysqli_fetch_assoc($query)) {
                        ?>
                        <tr>
                            <td><?= $count++ ?></td>
                            <td> <a class="btn btn-sm btn-outline-success" href="<?=$path?>/index.php?page=single_buyer&buyer_id=<?= $row['BuyerID'] ?>" target="_blank"><?= $row['BuyerName'] ?></a> </td>
                            <td> <a class="btn btn-sm btn-outline-success" href="<?=$path?>/index.php?page=single_style&id=<?= $row['StyleID'] ?>" target="_blank"><?= $row['StyleNumber'] ?></a> </td>
                            <td><?= $row['color'] ?></td>
                            <td> <a href="<?=$path?>/index.php?page=single_fab_stock&fab_rec_id=<?= $row['BuyerID'] ?>&color=<?= $row['Color'] ?>&style=<?= $row['StyleID'] ?>" class="btn btn-sm btn-primary">Details</a> </td>
                        </tr>
                    <?php
                    }
                    while ($rowother = mysqli_fetch_assoc($queryother)) {
                        ?>
                        <tr>
                            <td><?= $count++ ?></td>
                            <td> <a class="btn btn-sm btn-outline-success" href="<?=$path?>/index.php?page=single_buyer&buyer_id=<?= $rowother['BuyerID'] ?>" target="_blank"><?= $rowother['BuyerName'] ?></a> </td>
                            <td style="text-transform:capitalize"><?= $rowother['ContrastPocket'] ?></td>
                            <td><?= $rowother['color'] ?></td>
                            <td> <a href="<?=$path?>/index.php?page=single_fab_stock&fab_rec_id_other=<?= $rowother['BuyerID'] ?>&conpoc=<?= $rowother['ContrastPocket'] ?>&color=<?= $rowother['Color'] ?>" class="btn btn-sm btn-primary">Details</a> </td>
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