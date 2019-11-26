<?php

$PageTitle = "Stationery Report | Optima Inventory";
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
                <div>Stationery Report Panel
                    <div class="page-title-subheading">
                        Generate Monthly Report
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
                        <form action="<?= $path ?>/index.php?report=stationery_report" method="post">
                            <div class="form-row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="">Month</label>
                                        <input type="month" class="form-control form-control-sm" name="month" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="">Item</label>
                                        <?php

                                        $sql = "SELECT Name,ID FROM stationary_item WHERE Status = '1'";
                                        $items = mysqli_query($conn, $sql);
                                        ?>
                                        <select name="item" class="form-control form-control-sm search_select" required>
                                            <option value=""></option>
                                            <?php
                                            foreach ($items as $item) {
                                                echo '<option value="' . $item['ID'] . '">' . $item['Name'] . '</option>';
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
    ?>

    <!-- Extra Script Here -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.7/js/select2.min.js"></script>

    <script type="text/javascript">
        $('.search_select').select2({
            placeholder: 'Choose Your Option'
        });
    </script>

<?php }
include_once "includes/footer.php";
?>