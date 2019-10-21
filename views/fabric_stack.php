<?php

$PageTitle = "Fabic Stack | Optima Inventory";
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
                <div>Fabric Stack
                    <div class="page-title-subheading">
                        Fabric Stack Details
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="main-card mb-3 card">
        <div class="card-body">
            <!-- <h5 class="card-title">Card Title</h5> -->
            <table class="table bordered thead-dark table-striped table-hover">
                <thead>
                    <th>#</th>
                    <th>Buyer</th>
                    <th>Style</th>
                    <th>Color</th>
                    <th>Action</th>
                </thead>
                <tbody>
                    <tr>
                        <td>1</td>
                        <td>Jordache</td>
                        <td>251337</td>
                        <td>WHIT</td>
                        <td> <a href="#" class="btn btn-sm btn-primary">Details</a> </td>
                    </tr>
                    <tr>
                        <td>2</td>
                        <td>Jordache</td>
                        <td>251337</td>
                        <td>WHIT</td>
                        <td> <a href="#" class="btn btn-sm btn-primary">Details</a> </td>
                    </tr>
                    <tr>
                        <td>3</td>
                        <td>Jordache</td>
                        <td>251337</td>
                        <td>WHIT</td>
                        <td> <a href="#" class="btn btn-sm btn-primary">Details</a> </td>
                    </tr>

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