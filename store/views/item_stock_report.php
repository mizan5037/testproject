<?php

$page_privilege = 5;
hasAccess();

$PageTitle = "Item Stock Report | Optima Inventory";
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
                        <form action="<?= $path ?>/index.php?report=item_stock_report" method="post">
                            <div class="form-row">
                                <div class="col-md-12">


                                    <div class="form-group">
                                        <label for="">Buyer</label>
                                        <select name="buyer" id="buyer" class="style mb-2 form-control-sm form-control" required>
                                            <option value="">Select Buyer</option>
                                            <?php
                                            $conn    = db_connection();
                                            $sql     = "SELECT * FROM buyer WHERE status = 1";
                                            $results = mysqli_query($conn, $sql);
                                            while ($result = mysqli_fetch_assoc($results)) {
                                                echo '<option value="' . $result['BuyerID'] . '">' . $result['BuyerName'] . '</option>';
                                            }
                                            ?>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="">PO</label>
                                        <select name="po" id="po" class="style mb-2 form-control-sm form-control" required>
                                            <option value=""></option>
                                            <?php
                                                $conn = db_connection();
                                                $sql = "SELECT * FROM po WHERE status = 1";
                                                $results = mysqli_query($conn, $sql);
                                                while ($result = mysqli_fetch_assoc($results)) {
                                                    echo '<option value="' . $result['POID'] . '">' . $result['PONumber'] . '</option>';
                                                }
                                                ?>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="">Style</label>
                                        <select name="style" id="style" class="style mb-2 form-control-sm form-control" required>
                                            <option value=""></option>
                                            <?php
                                                $conn = db_connection();
                                                $sql = "SELECT * FROM style WHERE status = 1";
                                                $results = mysqli_query($conn, $sql);
                                                while ($result = mysqli_fetch_assoc($results)) {
                                                    echo '<option value="' . $result['StyleID'] . '">' . $result['StyleNumber'] . '</option>';
                                                }
                                                ?>
                                        </select>
                                    </div>
                                    <div class="form-group">

                                        <label for="">Colour</label>
                                        <select name="color" id="color" class="color mb-2 form-control-sm form-control" required>
                                        <?php
                                                $conn = db_connection();
                                                $sql = "SELECT * FROM color WHERE status = 1";
                                                $results = mysqli_query($conn, $sql);
                                                while ($result = mysqli_fetch_assoc($results)) {
                                                    echo '<option value="' . $result['id'] . '">' . $result['color'] . '</option>';
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
   

<?php }
include_once "includes/footer.php";
?>