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
                Content here
            </div>
        </div>
    <?php }
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
                Content here
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