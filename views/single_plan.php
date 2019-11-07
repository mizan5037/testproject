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