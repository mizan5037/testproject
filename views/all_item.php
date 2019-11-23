<?php

$PageTitle = "All Item | Optima Inventory";
function customPageHeader()
{
    ?>
    <!--Arbitrary HTML Tags-->
<?php }
 
$conn = db_connection();
if (isset($_GET['delete'])) {
    $id = $_GET['delete'];
    $sql = "UPDATE item set status=0 where ItemID=" . $id;

    if (mysqli_query($conn, $sql)) {
        notice('success', 'Deleted Successfully');
        nowgo('/index.php?page=all_item');
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
                <div>ALL Item
                    <div class="page-title-subheading">
                        All the Item created Upto Now.
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="main-card mb-3 card">
        <div class="card-body">
            <h5 class="card-title">Item List</h5>
            <table style="width: 100%" class="mb-0 table table-striped table-hover">
                <thead>
                    <tr>
                        <th width="10%">#</th>
                        <th width="20%">Name</th>
                        <th width="15%">Measurement Unit</th>
                        <th width="45%">Specification</th>
                        <th width="10%">Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $paginate = paginate('item');
                    $add_sql = $paginate['sql'];
                    $page_no = $paginate['page_no'];
                    $total_pages = $paginate['total_pages'];
                    $sql = "SELECT * FROM item WHERE status = 1 " . $add_sql;
                    $item = mysqli_query($conn, $sql);

                    $count = ($page_no * 10) - 9;
                    while ($key = mysqli_fetch_assoc($item)) {


                        ?>

                        <tr>
                            <th scope="row"><?= $count++ ?></th>
                            <td><?php echo $key["ItemName"]; ?></td>
                            <td><?php echo $key["ItemMeasurementUnit"]; ?></td>
                            <td><?php echo $key["ItemDescription"]; ?></td>
                            <td style=" white-space: nowrap; ">
                                <a href="<?= $path ?>/index.php?page=update_item&item_id=<?php echo $key['ItemID']; ?>" class="mb-2 mr-2 btn-transition btn btn-sm btn-outline-secondary btn-primary" id="details">
                                    <i class="fas fa-edit" style="color: white;"></i>
                                </a>
                                /
                                <a onclick="return confirm('Are You sure want to delete this item permanently?')" href="<?= $path ?>/index.php?page=all_item&delete=<?php echo $key['ItemID']; ?>" class="mb-2 mr-2 btn-transition btn-danger btn btn-sm btn-outline-secondary" id="details">
                                    <i class="fas fa-trash-alt" style="color: white;"></i>
                                </a>
                            </td>
                        </tr>
                    <?php }  ?>
                </tbody>
            </table>
            <br>
            <div class="row">
                <div class="col-md-12">
                    <?php 
                    links($page_no, $total_pages);
                    ?>
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