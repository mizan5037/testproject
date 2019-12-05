<?php

$page_privilege = 5;
hasAccess();

$PageTitle = "B2B Lc Report | Optima Inventory";
$conn = db_connection();

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
                <div>Report Panel
                    <div class="page-title-subheading">
                        Generate Report
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="row justify-content-md-center">
            <div class="col-md-8">
                <div class="main-card mb-3 card">
                    <div class="card-body">
                        <form action="<?= $path ?>/index.php?report=b2blc_report_single" method="post">
                            <div class="form-row">
                                <div class="col-md-12">

                                    <div class="form-group">
                                        <label for="">B2B Lc Number</label>
                                        <select name="b2blc" id="" class="style mb-2 form-control-sm form-control search_select" required>
                                            <option></option>
                                            <?php
                                            $sql = "SELECT b.B2BLCID,b.B2BLCNumber FROM b2blc b WHERE b.Status = '1'";
                                            $results = mysqli_query($conn, $sql);
                                            while ($result = mysqli_fetch_assoc($results)) {
                                                echo '<option value="' . $result['B2BLCID'] . '">' . $result['B2BLCNumber'] . '</option>';
                                            }
                                            ?>
                                        </select>
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
    global $path;
    ?>

    <!-- Extra Script Here -->

    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.7/js/select2.min.js"></script>

    <script type="text/javascript">
        $('.search_select').select2({
            placeholder: 'Select Your Option'
        });
    </script>
<?php
}
include_once "includes/footer.php";
?>