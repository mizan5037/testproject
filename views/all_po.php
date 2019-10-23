<?php

$PageTitle = "ALL PO | Optima Inventory";
function customPageHeader()
{
    ?>
    <!--Arbitrary HTML Tags-->
<?php }
$conn = db_connection();

if (isset($_GET['delete_po'])) {
    $delete_po = $_GET['delete_po'];

    $sql = "UPDATE po SET Status=0 where POID='$delete_po'";

    
    if (mysqli_query($conn, $sql)) {
		notice('danger', ' PO Deleted Successfully');
		
	} else {
		notice('error', $sql . "<br>" . mysqli_error($conn));
    }
    
}

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
                        <th>Action</th>
                       
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

                                        <ol>
                                            <li><?php echo $st['StyleID'] ?></li>
                                        </ol>


                                    <?php } ?>
                             

                        </td>
                        <td>
                            <a href="<?= $path ?>/index.php?page=po_single&POID=<?php echo $key['POID']; ?>" class="mb-2 mr-2 btn-transition btn btn-sm btn-outline-secondary">
                                Details
                            </a>
                            <a href="<?= $path ?>/index.php?page=new_time_action" class="mb-2 mr-2 btn-transition btn btn-sm btn-outline-secondary">
                                Time/Action Calender
                            </a>
                            <a href="<?= $path ?>/index.php?page=all_po&delete_po=<?php echo $key['POID']; ?>" class="mb-2 mr-2 btn-transition btn btn-sm btn-outline-danger">
                                DELETE
                            </a>
                            <a href="<?= $path ?>/index.php?page=po_edit&id=<?php echo $key['POID']; ?>" class="mb-2 mr-2 btn-transition btn btn-sm btn-outline-danger">
                                EDIT
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