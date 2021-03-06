<?php

$page_privilege = 5;
hasAccess();

$PageTitle = "Template | Optima Inventory";
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
$conn = db_connection();

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
            <div class="col-md-5">
                <div class="main-card mb-3 card">
                    <div class="card-body">
                        <form action="<?=$path?>/index.php?report=size_wise_report" method="post">
                            <div class="form-row">
                                <div class="col-md-12">
                                    <?php
                                      $buyers ="SELECT  BuyerID,BuyerName
                                      FROM buyer WHERE Status = '1'";
                                      $buyers = mysqli_query($conn,$buyers);


                                      $poid   ="SELECT PONumber,POID FROM po WHERE Status ='1'";
                                      $poid   = mysqli_query($conn,$poid);


                                     ?>
                                    <div class="form-group">
                                        <label for="">Buyer</label>
                                        <select id="buyer" class="form-control form-control-sm" name="buyer" required>
                                          <option value="">Select Buyer</option>
                                          <?php foreach ($buyers as $buyer) {
                                            echo '<option value="'.$buyer['BuyerID'].'">'.$buyer['BuyerName'].'</option>';
                                          } ?>
                                        </select>
                                    </div>

                                    <div class="form-group">
                                        <label for="">PO</label>
                                        <select name="poid" id="po" class="form-control form-control-sm" required>
                                          <option value="">---</option>

                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="">Type</label>
                                        <select name="type" id="" class="form-control form-control-sm">
                                            <option value ="view">View</option>
                                            <option value ="download">Download</option>
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
        //get styles
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
      });
    </script>

<?php }
include_once "includes/footer.php";
?>
