<?php

$PageTitle = "ALL PO | Optima Inventory";
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
                <div>ALL PO
                    <div class="page-title-subheading">
                        All the PO created Upto Now.
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
                        <th>PO Number</th>
                        <th>Style</th>
                        <th>Details</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <th scope="row">1</th>
                        <td>PO001</td>
                        <td>Style 2</td>
                        <td>
                            <button class="mb-2 mr-2 btn-transition btn btn-sm btn-outline-secondary">
                                Details
                            </button>
                            <a href="<?= $path ?>/index.php?page=new_time_action" class="mb-2 mr-2 btn-transition btn btn-sm btn-outline-secondary">
                                Time/Action Calender
                            </a>
                        </td>
                    </tr>
                    <tr>
                        <th scope="row">2</th>
                        <td>PO002</td>
                        <td>Style 1</td>
                        <td>
                            <button class="mb-2 mr-2 btn-transition btn btn-sm btn-outline-secondary">
                                Details
                            </button>
                            <a href="<?= $path ?>/index.php?page=new_time_action" class="mb-2 mr-2 btn-transition btn btn-sm btn-outline-secondary">
                                Time/Action Calender
                            </a>
                        </td>
                    </tr>
                    <tr>
                        <th scope="row">3</th>
                        <td>PO003</td>
                        <td>Style 3</td>
                        <td>
                            <button class="mb-2 mr-2 btn-transition btn btn-sm btn-outline-secondary">
                                Details
                            </button>
                            <a href="<?= $path ?>/index.php?page=new_time_action" class="mb-2 mr-2 btn-transition btn btn-sm btn-outline-secondary">
                                Time/Action Calender
                            </a>
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