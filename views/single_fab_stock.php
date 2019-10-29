<?php

$PageTitle = "Fabric Stock Details | Optima Inventory";
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
include_once "controller/single_fab_stock.php";
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
                <div>Fabric Register
                    <div class="page-title-subheading">
                        All receive and issue info
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php
    if (isset($hasstyle)) {
        ?>
        <div class="main-card mb-3 card">
            <div class="card-body">
                <h5 class="card-title">
                    Buyer:
                    <a class="btn btn-sm btn-outline-success" href="<?= $path ?>/index.php?page=single_buyer&buyer_id=<?= $buyer_id ?>" target="_blank">
                        <?= getname('buyer', 'BuyerName', 'BuyerID', $buyer_id) ?>
                    </a>
                    &nbsp; &nbsp; &nbsp;
                    Style:
                    <a class="btn btn-sm btn-outline-success" href="<?= $path ?>/index.php?page=single_style&id=<?= $style ?>" target="_blank">
                        <?= getname('style', 'StyleNumber', 'StyleID', $style) ?>
                    </a>
                    &nbsp; &nbsp; &nbsp;
                    Color: <?= getname('color', 'color', 'id', $color) ?>
                </h5>
                <table class="table table-bordered table-hover text-center">
                    <thead>
                        <tr>
                            <th colspan="8">Fabric Received</th>
                        </tr>
                        <tr>
                            <th>#</th>
                            <th>Shade</th>
                            <th>Width</th>
                            <th>Shrinkage</th>
                            <th>Received Yds</th>
                            <th>Received Roll</th>
                            <th>Shortage</th>
                            <th>Receive Date</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            $count = 1;
                            while ($row = mysqli_fetch_assoc($hasstyle)) {
                                ?>
                            <tr>
                                <td><?= $count++ ?></td>
                                <td><?= $row['Shade'] ?></td>
                                <td><?= $row['Width'] ?></td>
                                <td><?= $row['Shrinkage'] ?></td>
                                <td><?= $row['ReceivedFab'] ?></td>
                                <td><?= $row['ReceivedRoll'] ?></td>
                                <td><?= $row['Shortage'] ?></td>
                                <td><?= date('j-M-Y', strtotime($row['timestamp'])) ?></td>
                            </tr>
                        <?php
                            }
                            ?>

                    </tbody>
                </table>
                <table class="table table-bordered table-hover text-center">
                    <thead>
                        <tr>
                            <th colspan="8">Fabric Issued</th>
                        </tr>
                        <tr>
                            <th>#</th>
                            <th>Particulars</th>
                            <th>QTZ (DZ)</th>
                            <th>Consuption (Yds)</th>
                            <th>RQD QTY (Yds)</th>
                            <th>ISSUE QTY (Yds)</th>
                            <th>Remark</th>
                            <th>Issue Date</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            $count = 1;
                            while ($row = mysqli_fetch_assoc($hasstyleissue)) {
                                ?>
                            <tr>
                                <td><?= $count++ ?></td>
                                <td><?= $row['Shade'] ?></td>
                                <td><?= $row['Width'] ?></td>
                                <td><?= $row['Shrinkage'] ?></td>
                                <td><?= $row['ReceivedFab'] ?></td>
                                <td><?= $row['ReceivedRoll'] ?></td>
                                <td><?= $row['Shortage'] ?></td>
                                <td><?= date('j-M-Y', strtotime($row['timestamp'])) ?></td>
                            </tr>
                        <?php
                            }
                            ?>

                    </tbody>
                </table>
            </div>
        </div>
    <?php }
    if (isset($hascon)) {
        ?>
        <div class="main-card mb-3 card">
            <div class="card-body">
                <h5 class="card-title">
                    Buyer:
                    <a class="btn btn-sm btn-outline-success" href="<?= $path ?>/index.php?page=single_buyer&buyer_id=<?= $buyer_id ?>" target="_blank">
                        <?= getname('buyer', 'BuyerName', 'BuyerID', $buyer_id) ?>
                    </a>
                    &nbsp; &nbsp; &nbsp;
                    Type:
                    <?= $conpoc ?>
                    &nbsp; &nbsp; &nbsp;
                    Color: <?= getname('color', 'color', 'id', $color) ?>
                </h5>
                <table class="table table-bordered table-hover text-center">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Shade</th>
                            <th>Width</th>
                            <th>Shrinkage</th>
                            <th>Received Yds</th>
                            <th>Received Roll</th>
                            <th>Shortage</th>
                            <th>Receive Date</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            $count = 1;
                            while ($row = mysqli_fetch_assoc($hascon)) {
                                ?>
                            <tr>
                                <td><?= $count++ ?></td>
                                <td><?= $row['Shade'] ?></td>
                                <td><?= $row['Width'] ?></td>
                                <td><?= $row['Shrinkage'] ?></td>
                                <td><?= $row['ReceivedFab'] ?></td>
                                <td><?= $row['ReceivedRoll'] ?></td>
                                <td><?= $row['Shortage'] ?></td>
                                <td><?= date('j-M-Y', strtotime($row['timestamp'])) ?></td>
                            </tr>
                        <?php
                            }
                            ?>

                    </tbody>
                </table>
            </div>
        </div>
    <?php } ?>
</div>

<?php
function customPagefooter()
{
    ?>

    <!-- Extra Script Here -->

<?php }
include_once "includes/footer.php";
?>