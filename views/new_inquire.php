<?php

$PageTitle = "New Inquire | Optima Inventory";
function customPageHeader()
{
    ?>
    <!--Arbitrary HTML Tags-->
<?php }
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
                <div>New Inquire
                    <div class="page-title-subheading">
                        Inquire
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="main-card mb-3 card">
        <div class="card-body">
            <h5 class="card-title">Search New Inquire</h5>
            <form action="" method="post">
                <div class="form-row">
                    <div class="col-md-4 mb-3">
                        <input type="text" class="form-control form-control-sm " id="validationTooltip01" placeholder="Style Number" value="23 5317 P8 JLI">
                    </div>
                    <div class="col-md-4 mb-3">
                        <input type="submit" class="btn btn-sm btn-success">
                    </div>
                </div>
            </form>
        </div>
    </div>
    <div class="main-card mb-3 card">
        <div class="card-body">
            <h5 class="card-title">Style No: 23 5317 P8 JLI</h5>
            <div class="row">
                <div class="col-md-6">
                    <ol>
                        <li>Wash: <b>Mild Enzyme Wash</b> </li>
                        <li>Description: <b>LRG PLAID YD WVN-P8</b></li>
                        <li>Proto: <b>YM-03832</b></li>
                        <li>DIV No: <b>Bangladesh</b></li>
                        <li>Price: <b>USD 5.42</b> </li>
                    </ol>
                </div>
                <div class="col-md-6">
                    <img src="<?= $path ?>/assets/images/noimg.png" class="img-fluid img-thumbnail rounded" alt="No Image">
                </div>
            </div>
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