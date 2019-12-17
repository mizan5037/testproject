<?php

$page_privilege = 5;
hasAccess();

$PageTitle = "All Lay | Optima Inventory";
function customPageHeader()
{
    ?>
    <!--Arbitrary HTML Tags-->
<?php }
$conn = db_connection();

if (isset($_GET['delete']) && $_GET['delete'] !='') {
    $delete = $_GET['delete']; 
    $sql = "UPDATE lay_form SET Status=0 Where LayFormID=".$delete;

    if (mysqli_query($conn, $sql)) {
        notice('success', 'Lay Deleted Successfully');
        nowgo('/index.php?page=all_lay');
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
                <div>Lay List
                    <div class="page-title-subheading">
                        All the Lay created Upto Now.
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="main-card mb-3 card">
        <div class="card-body">
            <h5 class="card-title">All Lay</h5>
            <table class="mb-0 table table-striped table-hover">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Date</th>
                        <th>Buyer Name</th>
                        <th>PO NUMBER</th>
                        <th>Style Number</th>
                        <th>Cutting Number</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $sql = "SELECT * FROM lay_form f LEFT JOIN buyer b on b.BuyerID=f.BuyerID LEFT JOIN style s on s.StyleID=f.StyleID LEFT JOIN po p ON p.POID=f.POID WHERE f.Status = 1";
                    $lay = mysqli_query($conn, $sql);

                    $count = 1;
                    while ($row = mysqli_fetch_assoc($lay)) {


                        ?>
                        <tr>
                            <th scope="row"><?= $count ?></th>
                            <td><?= $row['Date'] ?></td>
                            <td><?= $row['BuyerName'] ?></td>
                            <td><a class="btn btn-sm btn-outline-success" href="<?= $path ?>/index.php?page=po_single&poid=<?= $row['POID'] ?>" target="_blank"><?= $row['PONumber'] ?></a></td>
                            <td><a class="btn btn-sm btn-outline-success" href="<?= $path ?>/index.php?page=single_style&id=<?= $row['StyleID'] ?>" target="_blank"><?= $row['StyleNumber'] ?></a></td>
                            <td><?= $row['CuttingNo'] ?></td>
                            <td>
                                <a href="<?= $path ?>/index.php?page=single_lay&layid=<?php echo $row['LayFormID']; ?>" class="mb-2 mr-2 btn-transition btn btn-sm btn-outline-secondary">
                                    Details
                                </a>
                               
                                <a onclick="return confirm('Are You sure want to delete this item permanently?')" href="<?= $path ?>/index.php?page=all_lay&delete=<?php echo $row['LayFormID']; ?>" class="mb-2 mr-2 btn-transition btn-danger btn btn-sm btn-outline-secondary" id="details">
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