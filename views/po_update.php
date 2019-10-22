<?php

$PageTitle = "ALL PO | Optima Inventory";
function customPageHeader()
{
    ?>
    <!--Arbitrary HTML Tags-->
<?php }
$conn = db_connection();
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
                    <?php

                    $sql = "SELECT * FROM po WHERE status = 1";
                    $po = mysqli_query($conn, $sql);

                    $count = 1;
                    while ($key = mysqli_fetch_assoc($po)) { 
                            $poid = $key['POID'];

                            $sql1 = "SELECT * FROM order_description WHERE POID = ".$poid." and status = 1 ";
                            
                            $style = mysqli_query($conn, $sql1);

                      ?>
                    <tr>
                        <th scope="row"><?php echo $count++; ?></th>
                        <td><?php echo $key['PONumber']; ?></td>
                        <td>

                            <?php 

                                    while ($st = mysqli_fetch_assoc($style)) { ?>

                                        


                                    <?php } ?>
                             

                        </td>
                        <td>
                            <a href="<?= $path ?>/index.php?page=po_update&POID=<?php echo $key['POID']; ?>" class="mb-2 mr-2 btn-transition btn btn-sm btn-outline-secondary">
                                Details
                            </a>
                            <a href="<?= $path ?>/index.php?page=new_time_action" class="mb-2 mr-2 btn-transition btn btn-sm btn-outline-secondary">
                                Time/Action Calender
                            </a>
                        </td>
                    </tr>
                <?php } ?>
                   
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