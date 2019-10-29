<?php

$PageTitle = "Fabric Color | Optima Inventory";
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
include_once "controller/color_fab.php";
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
                <div>Fabric Color
                    <div class="page-title-subheading">
                        Fabric Color Description
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <div class="main-card mb-3 card">
                    <div class="card-body">
                        <h5 class="card-title">Add New Color</h5>
                        <div class="container">
                            <form method="post">
                                <div class="form-row">
                                    <div class="col-md-8 mb-3">
                                        <input type="text" name="color" class="form-control" placeholder="Color Name" required>
                                    </div>
                                    <div class="col-md-4 mb-3">
                                        <input type="submit" name="submit" class="form-control btn btn-success" value="Save" required>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="main-card mb-3 card">
                    <div class="card-body">
                        <h5 class="card-title">All Colors</h5>
                        Content here
                    </div>
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