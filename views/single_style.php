<?php

$PageTitle = "New Inquire | Optima Inventory";
function customPageHeader()
{
    ?>
    <!--Arbitrary HTML Tags-->
<?php }

function modal()
{
    ?>
    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    ...
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary">Save changes</button>
                </div>
            </div>
        </div>
    </div>
    <!-- Modal End -->
<?php }

$conn = db_connection();
if (isset($_GET['delete'])) {
    $itemid = $_GET['delete'];
    $sql = "UPDATE itemrequirment set Status = 0 where ItemRequirmentID=" . $itemid;

    if (mysqli_query($conn, $sql)) {
        notice('success', 'Deleted Successfully');
    } else {
        notice('error', $sql . "<br>" . mysqli_error($conn));
    }
}
if (isset($_GET['id'])) {
    $id = $_GET['id'];

    $sql = "SELECT * FROM style where StyleID='$id'";

    $item = mysqli_fetch_assoc(mysqli_query($conn, $sql));
} else {
    nowgo('/index.php?page=all_style');
}
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
                <div>Style Details
                    <div class="page-title-subheading">
                        Single
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="main-card mb-3 card">
        <div class="card-body">
            <h5 class="card-title">Style No: <?= $item['StyleNumber'] ?></h5>
            <div class="row">
                <div class="col-md-6">
                    <ul>
                        <li>Description: <b><?= $item['StyleDescription'] ?></b></li>
                        <li>Proto: <b><?= $item['StyleProto'] ?></b></li>
                        <li>DIV No: <b><?= $item['StyleDivitionNo'] ?></b></li>
                        <li>Price: <b><?= $item['StyleCurency'] ?><?= $item['StylePrice'] ?></b> </li>
                        <li>Wash: <b><?= $item['StyleWash'] ?></b> </li>
                    </ul>
                </div>
                <div class="col-md-6">
                    <img src="<?= $path . $uploadpath . $item['StyleImage'] ?>" class="img-fluid img-thumbnail rounded" alt="No Image">
                </div>
            </div>
        </div>
    </div>
    <div class="main-card mb-3 card">
        <div class="card-body">
            <h5 class="card-title">TRIMS & ACCESSORIES</h5>
            <div class="row">
                <div class="col-md-12">
                    <table class="table table-bordered table-hover text-center">
                        <?php
                        $sql = "SELECT TrimsAccessName, TrimsAccessDescription FROM trimsaccess where TrimsAccessStyleID ='$id'";

                        $item = mysqli_query($conn, $sql);
                        while ($row = mysqli_fetch_assoc($item)) {
                            ?>
                            <tr>
                                <td><b><?= $row['TrimsAccessName'] ?></b></td>
                                <td><b><?= $row['TrimsAccessDescription'] ?></b></td>
                            </tr>
                        <?php } ?>
                    </table>
                </div>

            </div>
        </div>
    </div>
    <div class="main-card mb-3 card">
        <div class="card-body">
            <div class="container">
                <div class="row">
                    <div class="col-md-6">
                        <h5 class="card-title">Item Requirments</h5>
                    </div>
                    <div class="col-md-6">
                        <!-- Button trigger modal -->
                        <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#exampleModal">
                            Add New item
                        </button>
                    </div>
                </div>
            </div>
            <br>
            <div class="row">
                <div class="col-md-12">
                    <table class="table table-bordered table-hover text-center">
                        <thead>
                            <th>#</th>
                            <th>Name</th>
                            <th>Description</th>
                            <th>Size</th>
                            <th>Qty</th>
                            <th>Action</th>
                        </thead>
                        <tbody>
                            <?php
                            $sql = "SELECT ItemRequirmentID, ItemRequirmentItemID, ItemRequirmentSize, ItemRequirmentQty FROM itemrequirment WHERE status = 1 AND ItemRequirmentStyleID ='$id'";

                            $item = mysqli_query($conn, $sql);
                            $count = 1;
                            while ($row = mysqli_fetch_assoc($item)) {
                                $itemsql = "SELECT ItemName, ItemMeasurementUnit, ItemDescription FROM item WHERE ItemID = " . $row['ItemRequirmentItemID'];
                                $itemrow = mysqli_fetch_assoc(mysqli_query($conn, $itemsql));
                                ?>
                                <tr>
                                    <td><?= $count ?></td>
                                    <td><?= $itemrow['ItemName'] ?></td>
                                    <td><?= $itemrow['ItemDescription'] ?></td>
                                    <td><?= $row['ItemRequirmentSize'] ?></td>
                                    <td><?= $row['ItemRequirmentQty'] . " " . $itemrow['ItemMeasurementUnit'] ?></td>
                                    <td><a onclick="return confirm('Are You sure want to delete this item permanently?')" href="<?= $path ?>/index.php?page=single_style&id=<?= $id ?>&delete=<?php echo $row['ItemRequirmentID']; ?>" class="mb-2 mr-2 btn-transition btn-danger btn btn-sm btn-outline-secondary" id="details">
                                            <i class="fas fa-trash-alt" style="color: white;"></i>
                                        </a>
                                    </td>
                                </tr>
                            <?php $count++;
                            } ?>
                        </tbody>
                    </table>
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

<?php }
include_once "includes/footer.php";
?>