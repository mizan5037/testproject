<?php

$PageTitle = "Plan Details | Optima Inventory";
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
                        <th>Date</th>
                        <th>Floor</th>
                        <th>Line</th>
                        <th>Qty</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    while ($plan = mysqli_fetch_assoc($plan_details)) {
                        ?>
                        <tr>
                            <td><?= $plan['date'] ?></td>
                            <td><?= $plan['floor_name'] ?></td>
                            <td><?= $plan['line'] ?></td>
                            <td><?= $plan['qty'] ?></td>
                            <td>
                                <a href="<?= $path ?>/index.php?page=update_plan&id=<?= $plan['id'] ?>" class="mb-2 mr-2 btn-transition btn btn-sm btn-outline-secondary btn-primary" id="details">
                                    <i class="fas fa-edit" style="color: white;"></i>
                                </a>
                                /
                                <a onclick="return confirm('Are You sure want to delete this item permanently?')" href="<?= $path ?>/index.php?page=single_plan&delete=<?= $plan['id'] ?>&id=<?=$id?>" class="mb-2 mr-2 btn-transition btn-danger btn btn-sm btn-outline-secondary" id="details">
                                    <i class="fas fa-trash-alt" style="color: white;"></i>
                                </a>
                                
                            </td>
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