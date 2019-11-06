<?php

$PageTitle = "All Fabric Relaxation | Optima Inventory";
function customPageHeader()
{
    ?>
    <!--Arbitrary HTML Tags-->
<?php }
$conn = db_connection();

if (isset($_GET['delete']) && $_GET['delete'] !='') {
    $delete = $_GET['delete'];
    $sql = "UPDATE fab_relaxation SET Status=0 Where FabRelaxationID=".$delete;

    if (mysqli_query($conn, $sql)) {
        notice('success', 'Fabric Relaxation Deleted Successfully');
        nowgo('/index.php?page=all_fabric_relaxation');
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
                <div> Fabric Relaxation List
                    <div class="page-title-subheading">
                        All the Lay created Upto Now.
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="main-card mb-3 card">
        <div class="card-body">
            <h5 class="card-title">All Fabric Relaxation</h5>
            <table class="mb-0 table table-striped table-hover">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Buyer Name</th>
                        <th>Style Number</th>
                        <th>Color</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $sql = "SELECT f.*,s.StyleNumber,b.BuyerName,c.color FROM fab_relaxation f LEFT JOIN color c ON f.Color = c.id LEFT JOIN style s on s.StyleID=f.StyleID LEFT JOIN buyer b ON b.BuyerID=f.BuyerID WHERE f.Status = 1";
                    $fabric = mysqli_query($conn, $sql);

                    $count = 1;
                    while ($row = mysqli_fetch_assoc($fabric)) {


                        ?>
                        <tr>
                            <th scope="row"><?= $count ?></th>
                            <td><a class="btn btn-sm btn-outline-success" href="<?= $path ?>/index.php?page=single_buyer&buyer_id=<?= $row['BuyerID'] ?>" target="_blank"><?= $row['BuyerName'] ?></a></td>
                            <td><a class="btn btn-sm btn-outline-success" href="<?= $path ?>/index.php?page=single_style&id=<?= $row['StyleID'] ?>" target="_blank"><?= $row['StyleNumber'] ?></a></td>
                            <td><?= $row['color'] ?></td>
                            <td>
                                <a href="<?= $path ?>/index.php?page=single_fabric_relaxation&fabricid=<?php echo $row['FabRelaxationID']; ?>" class="mb-2 mr-2 btn-transition btn btn-sm btn-outline-secondary">
                                    Details
                                </a>
                                <a onclick="return confirm('Are You sure want to delete this item permanently?')" href="<?= $path ?>/index.php?page=all_fabric_relaxation&delete=<?php echo $row['FabRelaxationID']; ?>" class="mb-2 mr-2 btn-transition btn-danger btn btn-sm btn-outline-secondary" id="details">
                                    <i class="fas fa-trash-alt" style="color: white;"></i>
                                </a>
                            </td>
                        </tr>
                    <?php $count++;
                    }  ?>
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
