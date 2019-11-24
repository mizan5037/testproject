<?php

$PageTitle = "Finishing Report | Optima Inventory";
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
                <div>Finishing Report Panel
                    <div class="page-title-subheading">
                        Generate Daily Report
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="row justify-content-md-center">
            <div class="col-md-5">
                <div class="main-card mb-3 card">
                    <div class="card-body">
                        <form action="<?= $path ?>/index.php?report=finishing_report" method="post">
                            <div class="form-row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="">Date</label>
                                        <input type="date" class="form-control form-control-sm" name="date" id="" required>
                                    </div>

                                    <div class="form-group">
                                        <label for="">Type</label>
                                        <select name="type" id="" class="form-control form-control-sm">
                                            <option value="view">View</option>
                                            <option value="download">Download</option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <button class="btn btn-sm btn-success" type="submit">Get Report</button>
                                    </div>
                                </div>
                            </div>
                        </form>
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