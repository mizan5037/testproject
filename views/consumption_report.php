<?php

$PageTitle = "Consumption Report | Optima Inventory";
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
                        <form action="<?= $path ?>/index.php?report=consumption_report" method="post">
                            <div class="form-row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="">Date</label>
                                        <input type="date" class="form-control form-control-sm" name="date" id="" required>
                                    </div>

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

                                      </select>
                                    </div>
                                    <div class="form-group">
                                      <label for="">Style</label>
                                      <select name="style" id="style" class="style mb-2 form-control-sm form-control" required>
                                        <option value=""></option>

                                      </select>
                                    </div>


                                    <div class="form-group">
                                        <label for="">Type</label>
                                        <select name="name" id="" class="form-control form-control-sm">
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
    <script type="text/javascript">
    $(document).ready(function() {
        //get buyer to PO
        $("#buyer").change(function() {
            let buyer_id = this.value;
            if (buyer_id != '') {
                $.ajax({
                    url: "<?= $path ?>/controller/api.php",
                    method: "POST",
                    data: {
                        buyer_id: buyer_id,
                        form: 'get_po_size_wise',
                        token: '<?= get_ses('token') ?>'
                    },
                    dataType: "text",
                    success: function(data) {
                        $("#po").html(data);
                    }
                });
            } else {
                $("#po").html("<option>-----</option>");
            }

        });
        // po to style
        $("#po").change(function() {
            let po = this.value;
            if (po != '') {
                $.ajax({
                    url: "<?= $path ?>/controller/api.php",
                    method: "POST",
                    data: {
                        po: po,
                        form: 'get_style',
                        token: '<?= get_ses('token') ?>'
                    },
                    dataType: "text",
                    success: function(data) {
                        $("#style").html(data);
                    }
                });
            } else {
                $("#style").html("<option>-----</option>");
            }

        });
      });
    </script>

<?php }
include_once "includes/footer.php";
?>
