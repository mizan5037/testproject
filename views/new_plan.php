<?php

$PageTitle = "New Plan | Optima Inventory";
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
include_once "controller/new_plan.php";
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
                <div>New Plan
                    <div class="page-title-subheading">
                        Add new plan here
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="main-card mb-3 card">
        <div class="card-body">
            <form>
                <div class="form-row">
                    <div class="col-md-2">
                        <h4> Title: </h4>
                    </div>
                    <div class="col-md-10"> <input type="text" name="title" id="title" class="form-control"> </div>
                </div>
                <br>
                <div class="form-row">
                    <div class="col-md-4">
                        <label for="buyer">Buyer</label>
                        <input type="text" name="buyer" id="buyer" class="form-control form-control-sm">
                    </div>
                    <div class="col-md-4">
                        <label for="buyer">Style</label>
                        <input type="text" name="buyer" id="buyer" class="form-control form-control-sm">
                    </div>
                    <div class="col-md-4">
                        <label for="buyer">P.O.</label>
                        <input type="text" name="buyer" id="buyer" class="form-control form-control-sm">
                    </div>
                </div>
                <br>
                <div class="form-row">
                    <div class="col-md-12 text-center">
                        <input type="submit" class="btn btn-sm btn-success" name="submit" value="Next">
                    </div>
                </div>
            </form>
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