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
        <div class="main-card mb-3 card text-center">
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
            </div>
        </div>
        <div class="main-card mb-3 card">
            <div class="card-body">
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
                            $count   = 1;
                            $recFab  = 0;
                            $recRoll = 0;
                            $issueFab  = 0;
                            $issueRoll = 0;
                            while ($row = mysqli_fetch_assoc($hasstyle)) {
                                $recFab  += $row['ReceivedFab'];
                                $recRoll += $row['ReceivedRoll'];
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
        <?php if ($hasstyleissue->num_rows != 0) { ?>
            <div class="main-card mb-3 card">
                <div class="card-body">
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
                                <th>Roll</th>
                                <th>Issue Date</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                                    $count     = 1;

                                    while ($row = mysqli_fetch_assoc($hasstyleissue)) {
                                        $issueFab  += $row['IssueQty'];
                                        $issueRoll += $row['Roll'];
                                        ?>
                                <tr>
                                    <td><?= $count++ ?></td>
                                    <td><?= $row['Particulars'] ?></td>
                                    <td><?= $row['Qtz'] ?></td>
                                    <td><?= $row['Consumption'] ?></td>
                                    <td><?= $row['RqdQty'] ?></td>
                                    <td><?= $row['IssueQty'] ?></td>
                                    <td><?= $row['Roll'] ?></td>
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
        <div class="main-card mb-3 card">
            <div class="card-body">
                <table class="table table-bordered table-hover text-center">
                    <thead>
                        <tr>
                            <th colspan="8">Remaining YDS And Roll</th>
                        </tr>
                        <tr>
                            <th>Description</th>
                            <th>Yds</th>
                            <th>Roll</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>Received</td>
                            <td><?= $recFab ?></td>
                            <td><?= $recRoll ?></td>
                        </tr>
                        <tr>
                            <td>Isssued</td>
                            <td><?= $issueFab ?></td>
                            <td><?= $issueRoll ?></td>
                        </tr>
                    </tbody>
                    <tfoot>
                        <th>Reaming</th>
                        <th><?= $recFab - $issueFab ?></th>
                        <th><?= $recRoll - $issueRoll ?></th>
                    </tfoot>
                </table>
            </div>
        </div>
    <?php }
    if (isset($hascon)) {
        ?>
        <div class="main-card mb-3 card">
            <div class="card-body">
                <h5 class="card-title text-center">
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
            </div>
        </div>
        <div class="main-card mb-3 card">
            <div class="card-body">
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
                            $recFab = 0;
                            $recRoll = 0;
                            $issueFab  = 0;
                            $issueRoll = 0;
                            while ($row = mysqli_fetch_assoc($hascon)) {
                                $recFab += $row['ReceivedFab'];
                                $recRoll += $row['ReceivedRoll'];
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
        <?php if ($hasconissue->num_rows != 0) { ?>
            <div class="main-card mb-3 card">
                <div class="card-body">
                    <table class="table table-bordered table-hover text-center">
                        <thead>
                            <tr>
                                <th colspan="8">Fabric Issued</th>
                            </tr>
                            <tr>
                                <th>#</th>
                                <th>Particulars</th>
                                <th>Qtz</th>
                                <th>Consumption</th>
                                <th>Rqd Yds</th>
                                <th>Issued Yds</th>
                                <th>Roll</th>
                                <th>Issue Date</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                                    $count     = 1;
                                    while ($row = mysqli_fetch_assoc($hasconissue)) {
                                        $issueFab  += $row['RqdQty'];
                                        $issueRoll += $row['Roll'];
                                        ?>
                                <tr>
                                    <td><?= $count++ ?></td>
                                    <td><?= $row['Particulars'] ?></td>
                                    <td><?= $row['Qtz'] ?></td>
                                    <td><?= $row['Consumption'] ?></td>
                                    <td><?= $row['RqdQty'] ?></td>
                                    <td><?= $row['IssueQty'] ?></td>
                                    <td><?= $row['Roll'] ?></td>
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
        <div class="main-card mb-3 card">
            <div class="card-body">
                <table class="table table-bordered table-hover text-center">
                    <thead>
                        <tr>
                            <th colspan="8">Reaming YDS And Roll</th>
                        </tr>
                        <tr>
                            <th>Description</th>
                            <th>Yds</th>
                            <th>Roll</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>Received</td>
                            <td><?= $recFab ?></td>
                            <td><?= $recRoll ?></td>
                        </tr>
                        <tr>
                            <td>Isssued</td>
                            <td><?= $issueFab ?></td>
                            <td><?= $issueRoll ?></td>
                        </tr>
                    </tbody>
                    <tfoot>
                        <th>Reaming</th>
                        <th><?= $recFab - $issueFab ?></th>
                        <th><?= $recRoll - $issueRoll ?></th>
                    </tfoot>
                </table>
            </div>
        </div>
</div>
<?php } ?>


<?php
function customPagefooter()
{
    ?>

    <!-- Extra Script Here -->

<?php }
include_once "includes/footer.php";
?>