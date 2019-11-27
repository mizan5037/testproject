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
include_once "controller/update_plan.php";
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
                        <input type="date" class="form-control form-control-sm" name="date" value="<?= $sngle_data['date'] ?>" id="" disabled>
                    </div>
                    <div class="col-md-3">
                        <label for="floor">Floor</label>
                        <select name="floor" id="" class="form-control form-control-sm" disabled>
                            <option value="<?= $sngle_data['floor'] ?>"><?= $floor_name['floor_name'] ?></option>
                        </select>
                    </div>
                    <div class="col-md-3">
                        <label for="line">Line</label>
                        <select name="line" id="" class="form-control form-control-sm" disabled>
                            <option value="<?= $sngle_data['line'] ?>"><?= $line_name['line'] ?></option>
                        </select>
                    </div>
                    <div class="col-md-3">
                        <label for="qty">Quantity</label>
                        <input type="number" name="qty" value="<?= $sngle_data['qty'] ?>" class="form-control form-control-sm">
                    </div>
                </div>
                <br>
                <div class="form-row justify-content-md-center">
                    <div class="col-md-1">
                        <input type="submit" value="Save" name="update_plan" class="btn btn-primary form-control form-control-sm">
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