<?php

$page_privilege = 5;
hasAccess();

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
                <div>Packing List
                    <div class="page-title-subheading">

                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="row justify-content-md-center">
        <div class="col-md-6">
            <div class="main-card mb-3 card">
                <div class="card-body">
                    <form action="<?= $path ?>/index.php?report=packing_list" method="post">
                        <div class="form-row">
                            <div class="col-md-12">
                                <label>P.O.</label>
                                <select name="po" id='po' class=" mb-2 form-control-sm form-control search_select" required>
                                    <option></option>
                                    <?php
                                    $conn = db_connection();
                                    $sql = "SELECT POID, PONumber FROM po WHERE status = 1";
                                    $results = mysqli_query($conn, $sql);
                                    while ($result = mysqli_fetch_assoc($results)) {
                                        echo '<option value="' . $result['POID'] . '">' . $result['PONumber'] . '</option>';
                                    }
                                    ?>
                                </select>
                            </div>
                            <div class="col-md-12">
                                <label for="">Type</label>
                                <select name="type" class="form-control form-control-sm">
                                    <option value="view">View</option>
                                    <option value="download">Download</option>
                                </select>
                            </div>
                        </div>

                        <br>
                        <div class="form-row">
                            <div class="col-md-12 text-center">
                                <input type="submit" class="btn btn-success" name="print" value="Print">
                            </div>
                        </div>
                    </form>
                </div>
            </div>

        </div>
    </div>
</div>




<?php
include_once "includes/footer.php";
?>