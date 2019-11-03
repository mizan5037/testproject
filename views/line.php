<?php

$PageTitle = "Line | Optima Inventory";
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
                <div>Line Details
                    <div class="page-title-subheading">
                        All active line info
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="main-card mb-3 card">
        <div class="card-body">
            <table class="table table-bordered table-hover text-center">
                <thead>
                    <tr>
                        <th colspan="5">Line List</th>
                    </tr>
                    <tr>
                        <th>#</th>
                        <th>Line Name</th>
                        <th>Status</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>1</td>
                        <td>1</td>
                        <td>1</td>
                        <td>1</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
    <div class="main-card mb-3 card">
        <div class="card-body">
            <h5 class="card-title">New Line</h5>
            <form action="" method="post">
                <div class="form-row">
                    <div class="col-md-2"><h3>Line Name:</h3></div>
                    <div class="col-md-8"><input type="text" name="line" class="form-control"></div>
                    <div class="col-md-2"><input type="submit" class="btn btn-sm btn-success form-control" value="Save"></div>
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