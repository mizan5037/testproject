<?php

$PageTitle = "All Master LC | Optima Inventory";
function customPageHeader()
{
    ?>
    <!--Arbitrary HTML Tags-->
<?php }
include_once "controller/all_master_lc.php";
include_once "includes/header.php";

?>

<div class="app-main__inner">
    <div class="app-page-title">
        <div class="page-title-wrapper">
            <div class="page-title-heading">
                <div class="page-title-icon">
                    <i class="pe-7s-news-paper icon-gradient bg-mean-fruit">
                    </i>
                </div>
                <div>ALL Master LC
                    <div class="page-title-subheading">
                        All the Master LC created Upto Now.
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="main-card mb-3 card">
        <div class="card-body">
            <h5 class="card-title">LC List</h5>
            <table class="mb-0 table table-striped table-hover">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Master LC Number</th>
                        <th>Buyer</th>
                        <th>Issue Date</th>
                        <th>Details</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $sql = "SELECT MasterLCID, MasterLCBuyer, MasterLCIssueDate, MasterLCNumber FROM masterlc WHERE status = 1";
                    $po = mysqli_query($conn, $sql);

                    $count = 1;
                    while ($key = mysqli_fetch_assoc($po)) {
                        ?>
                        <tr>
                            <th scope="row"><?= $count++ ?></th>
                            <td><?= $key['MasterLCNumber'] ?></td>
                            <td>
                                <a href="<?=$path?>/index.php?page=single_buyer&buyer_id=<?=$key['MasterLCBuyer']?>" target="_blank" class="mb-2 mr-2 btn-transition btn btn-sm btn-outline-success">
                                <?= searchForBuyer($key['MasterLCBuyer'], $buyerArr) ?>
                                </a></td>
                            <td><?= $key['MasterLCIssueDate'] ?></td>
                            <td>
                                <a href="<?=$path?>/index.php?page=single_masterlc&id=<?=$key['MasterLCID']?>" class="mb-2 mr-2 btn-transition btn btn-sm btn-outline-primary">
                                    Details
                                </a>
                            </td>
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