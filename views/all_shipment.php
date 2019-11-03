<?php

$PageTitle = "All Shipment | Optima Inventory";
function customPageHeader()
{
    ?>
    <!--Arbitrary HTML Tags-->
<?php }
$conn = db_connection();
// if (isset($_GET['delete'])) {
//     $id = $_GET['delete'];
//     $sql = "UPDATE style set status=0 where StyleID=" . $id;

//     if (mysqli_query($conn, $sql)) {
//         notice('success', 'Deleted Successfully');
//     } else {
//         notice('error', $sql . "<br>" . mysqli_error($conn));
//     }
// }
include_once "controller/update_shipment_form.php";
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
                <div>ALL Shipment
                    <div class="page-title-subheading">
                        All the Shipment created Upto Now.
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="main-card mb-3 card">
        <div class="card-body">
            <h5 class="card-title">Shipment List</h5>
            <table class="mb-0 table table-striped table-hover">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Shipment Date</th>
                        <th>PO NUMBER</th>
                        <th>Style Number</th>
                        <th>Color</th>
                        <th>Shipment</th>
                        <th>Sample</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $sql = "SELECT * FROM shipment_form f LEFT JOIN po p on p.POID=f.POID LEFT JOIN style s on s.StyleID=f.StyleID LEFT JOIN color c ON c.id=f.Color where f.Status=1";
                    $shipment = mysqli_query($conn, $sql);

                    $count = 1;
                    while ($row = mysqli_fetch_assoc($shipment)) {


                        ?>
                        <tr>
                            <th scope="row"><?= $count ?></th>
                            <td><?= $row['date'] ?></td>
                            <td><a class="btn btn-sm btn-outline-success" href="<?=$path?>/index.php?page=single_style&id=<?= $row['StyleID'] ?>" target="_blank"><?= $row['PONumber'] ?></a></td>
                            <td><a class="btn btn-sm btn-outline-success" href="<?=$path?>/index.php?page=single_style&id=<?= $row['StyleID'] ?>" target="_blank"><?= $row['StyleNumber'] ?></a></td>
                            <td><?= $row['color'] ?></td>
                            <td><?= $row['Shipment'] ?></td>
                            <td><?= $row['Sample'] ?></td>
                            <td>
                                <a href="<?= $path ?>/index.php?page=edit_shipment&id=<?= $row['ShipmentFormID'] ?>" class=" btn btn-sm btn-outline-primary">
                                <i class="fas fa-edit" ></i>
                                </a>
                                
                                <a onclick="return confirm('Are You sure want to delete this item permanently?')" href="<?= $path ?>/index.php?page=all_shipment&delete=<?php echo $row['ShipmentFormID']; ?>" class="mb-2 mr-2 btn-transition btn-danger btn btn-sm btn-outline-secondary" id="details">
                                    <i class="fas fa-trash-alt" style="color: white;"></i>
                                </a>
                            </td>
                        </tr>
                    <?php $count++; }  ?>
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