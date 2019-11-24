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
                        <form action="<?=$path?>/index.php?report=fab_relaxation_report" method="post">
                            <div class="form-row">
                                <div class="col-md-12">
                                    <?php
                                      $fab_relaxation_buyer ="SELECT DISTINCT b.BuyerID,b.BuyerName
                                      FROM fab_relaxation f
                                      LEFT JOIN buyer b ON f.BuyerID = b.BuyerID
                                      WHERE f.Status='1' AND b.Status = '1'";
                                      $fab_relaxation_buyer = mysqli_query($conn,$fab_relaxation_buyer);

                                      $fab_relaxation_color ="SELECT DISTINCT c.id,c.color
                                      FROM fab_relaxation f
                                      LEFT JOIN color c ON f.Color=c.id
                                      WHERE f.Status='1' AND c.status = '1'";
                                      $fab_relaxation_color = mysqli_query($conn,$fab_relaxation_color);

                                      $fab_relaxation_style ="SELECT DISTINCT s.StyleID,s.StyleNumber
                                      FROM fab_relaxation f
                                      LEFT JOIN style s ON f.StyleID = s.StyleID
                                      WHERE f.Status='1' AND s.Status ='1'";
                                      $fab_relaxation_style = mysqli_query($conn,$fab_relaxation_style);


                                     ?>
                                    <div class="form-group">
                                        <label for="">Buyer</label>
                                        <select id="buyer" class="form-control form-control-sm" name="buyer" required>
                                          <option value="">Select Buyer</option>
                                          <?php foreach ($fab_relaxation_buyer as $buyer) {
                                            echo "<option value=".$buyer['BuyerID'].">".$buyer['BuyerName']."</option>";
                                          } ?>
                                        </select>
                                    </div>

                                    <div class="form-group">
                                        <label for="">Style</label>
                                        <select name="style" id="style" class="form-control form-control-sm" required>

                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="">Color</label>
                                        <select name="color" id="color" class="form-control form-control-sm" required>
                                          <option value="">Select Colour</option>

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
                        form: 'get_buyer_fab',
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
        //  style to colour
        $("#style").change(function() {
            let style_id = this.value;
            if (style_id != '') {
                $.ajax({
                    url: "<?= $path ?>/controller/api.php",
                    method: "POST",
                    data: {
                        style_id: style_id,
                        form: 'get_style_color_fab',
                        token: '<?= get_ses('token') ?>'
                    },
                    dataType: "text",
                    success: function(data) {
                        $("#color").html(data);
                    }
                });
            } else {
                $("#color").html("<option>-----</option>");
            }

        });
      });
    </script>

<?php }
include_once "includes/footer.php";
?>
