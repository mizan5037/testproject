<?php

$PageTitle = "Fabric Received Details | Optima Inventory";
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
include_once "controller/single_fab_received.php";
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
                <div>Fabric Deatils
                    <div class="page-title-subheading">
                        All Received and info
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php
    if (isset($fab_Recd)) {
        ?>
        <div class="main-card mb-3 card text-center">
            <div class="card-body">
                <h5 class="card-title">
                    Buyer:
                    <a class="btn btn-sm btn-outline-success" href="<?= $path ?>/index.php?page=single_buyer&buyer_id=<?= getname('buyer', 'BuyerID', 'BuyerID',  $fabRecBuyer) ?>" target="_blank">
                        <?= getname('buyer', 'BuyerName', 'BuyerID',  $fabRecBuyer) ?>
                    </a>
                    &nbsp; &nbsp; &nbsp;
                    Style:
                    <a class="btn btn-sm btn-outline-success" href="<?= $path ?>/index.php?page=single_style&id=<?= getname('style', 'StyleID', 'StyleID', $fbRecStyle) ?>" target="_blank">
                        <?= getname('style', 'StyleNumber', 'StyleID', $fbRecStyle) ?>
                    </a>
                </h5>
            </div>
        </div>
    <?php
    }
    if (isset($fab_Rec_other)) {
        ?>
        <div class="main-card mb-3 card text-center">
            <div class="card-body">
                <h5 class="card-title">
                    Buyer:
                    <a class="btn btn-sm btn-outline-success" href="<?= $path ?>/index.php?page=single_buyer&buyer_id=<?= getname('buyer', 'BuyerID', 'BuyerID', $BuyerID) ?>" target="_blank">
                        <?= getname('buyer', 'BuyerName', 'BuyerID', $BuyerID) ?>
                    </a>
                    &nbsp; &nbsp; &nbsp;
                    Style:
                    <a class="btn btn-sm btn-outline-success">
                        <?= $ContrastPocket ?>
                    </a>
                </h5>

            </div>
        </div>
    <?php } ?>
    <div class="main-card mb-3 card">
        <div class="card-body">

            <table class="table table-bordered table-hover text-center">
                <thead>
                    <tr>
                        <?php
                        if (isset($fab_Rec)) {
                            echo "<th colspan='12'>Fabric Recevied</th>";
                        }
                        if (isset($fab_Rec_other)) {
                            echo "<th colspan='12'>Fabric Recevied Other</th>";
                        }
                        ?>
                    </tr>
                    <tr>
                        <th>#</th>
                        <th>Color</th>
                        <th>Width</th>
                        <th>Received Fab</th>
                        <th>Received Roll</th>
                        <th>Shortage</th>
                        <th>Received Date</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php

                    if (isset($fab_Recd)) {
                        $count = 1;

                        while ($fab_Rec = mysqli_fetch_assoc($fab_Recd)) {


                            ?>
                            <tr>
                                <td><?= $count++ ?></td>
                                <td><?= getname('color', 'color', 'id', $fab_Rec['Color']) ?></td>
                                <td><?= $fab_Rec['Width'] ?></td>
                                <td><?= $fab_Rec['ReceivedFab'] ?></td>
                                <td><?= $fab_Rec['ReceivedRoll'] ?></td>
                                <td><?= $fab_Rec['Shortage'] ?></td>
                                <td><?= date('j-M-Y', strtotime($fab_Rec['timestamp'])) ?></td>
                                <td>
                                    <a href="<?= $path ?>/index.php?page=update_fab_receive&fab_Rec_id=<?= $fab_Rec['FabReceiveID'] ?>&buyer_id=<?= $fabRecBuyer ?>" class="btn btn-sm btn-primary">Edit</a>


                                    <form method="post">
                                        <input type="hidden" name="FabReceiveID" value="<?= $fab_Rec['FabReceiveID'] ?>">
                                        <button class="btn btn-danger" type="submit" onclick="return confirm('Are You sure want to delete this item permanently?')" name="fabRecDel"><i class="fas fa-trash-alt" style="color: white;"></i></button>
                                    </form>
                                </td>
                            </tr>
                        <?php
                            }
                        }
                        if (isset($fab_Rec_all)) {
                            $count = 1;
                            while ($fab_Rec_other = mysqli_fetch_assoc($fab_Rec_all)) {
                                ?>
                            <tr>
                                <td><?= $count++ ?></td>
                                <td><?= getname('color', 'color', 'id', $fab_Rec_other['Color']) ?></td>
                                <td><?= $fab_Rec_other['Width'] ?></td>
                                <td><?= $fab_Rec_other['ReceivedFab'] ?></td>
                                <td><?= $fab_Rec_other['ReceivedRoll'] ?></td>
                                <td><?= $fab_Rec_other['Shortage'] ?></td>
                                <td><?= date('j-M-Y', strtotime($fab_Rec_other['timestamp'])) ?></td>
                                <td>
                                    <a href="<?= $path ?>/index.php?page=update_fab_receive&fab_Rec_other_id=<?= $fab_Rec_other['id'] ?>" class="btn btn-sm btn-primary">Edit</a>
                                    <form class="" method="post">
                                        <input type="hidden" name="fabRcvOtherID" value="<?= $fab_Rec_other['id'] ?>">
                                        <button class="btn btn-danger" type="submit" onclick="return confirm('Are You sure want to delete this item permanently?')" name="fabRcvDel"><i class="fas fa-trash-alt" style="color: white;"></i></button>
                                    </form>
                                </td>
                            </tr>
                    <?php
                        }
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