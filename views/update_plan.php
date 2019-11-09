<?php

$PageTitle = "Update Plan | Optima Inventory";
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
                <div>Update Plan
                    <div class="page-title-subheading">
                        Update plan
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="main-card mb-3 card">
        <div class="card-body">
            <form action="" method="post">
                <div class="form-row">
                    <div class="col-md-3">
                        <label for="date">Date</label>
                        <input type="date" class="form-control form-control-sm" name="date" id="">
                    </div>
                    <div class="col-md-3">
                        <label for="floor">Floor</label>
                        <select name="" id="" class="form-control form-control-sm">
                            <option value="">floor</option>
                        </select>
                    </div>
                    <div class="col-md-3">
                        <label for="line">Line</label>
                        <select name="" id="" class="form-control form-control-sm">
                            <option value="">line</option>
                        </select>
                    </div>
                    <div class="col-md-3">
                        <label for="qty">Quantity</label>
                        <input type="number" class="form-control form-control-sm">
                    </div>
                </div>
                <br>
                <div class="form-row justify-content-md-center">
                    <div class="col-md-1">
                        <input type="submit" value="Save"  class="btn btn-primary form-control form-control-sm">
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