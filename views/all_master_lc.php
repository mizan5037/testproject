<?php

$PageTitle = "All Master LC | Optima Inventory";
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
                    <i class="pe-7s-news-paper icon-gradient bg-mean-fruit">
                    </i>
                </div>
                <div>ALL Master LC
                    <div class="page-title-subheading">
                        All the Master LC created Upto Now.
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="main-card mb-3 card">
        <div class="card-body">
            <h5 class="card-title">LC List</h5>
            <table class="mb-0 table table-striped table-hover">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Master LC Number</th>
                        <th>Issue Date</th>
                        <th>Details</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <th scope="row">1</th>
                        <td>LC001</td>
                        <td>05-06-2019</td>
                        <td>
                            <button class="mb-2 mr-2 btn-transition btn btn-sm btn-outline-secondary">
                                Details
                            </button>
                        </td>
                    </tr>
                    <tr>
                        <th scope="row">2</th>
                        <td>LC002</td>
                        <td>06-04-2019</td>
                        <td>
                            <button class="mb-2 mr-2 btn-transition btn btn-sm btn-outline-secondary">
                                Details
                            </button>
                        </td>
                    </tr>
                    <tr>
                        <th scope="row">3</th>
                        <td>LC003</td>
                        <td>08-09-2019</td>
                        <td>
                            <button class="mb-2 mr-2 btn-transition btn btn-sm btn-outline-secondary">
                                Details
                            </button>
                        </td>
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