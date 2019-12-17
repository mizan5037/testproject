<?php

$PageTitle = "Stationary | Optima Inventory";
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

if (isset($_GET['id']) && $_GET['id'] != '') {
    $id = $_GET['id'];
} else {
    nowgo('/index.php?page=new_stationary');
}

$conn = db_connection();
$sql = 'SELECT Name, MeasurmentUnit FROM stationary_item WHERE ID = ' . $id;
$item = mysqli_fetch_assoc(mysqli_query($conn, $sql));

$sqlr = "SELECT * FROM stationary_receive WHERE ItemID = " . $id;
$itemr = mysqli_query($conn, $sqlr);

$sqli = "SELECT * FROM stationary_issue WHERE ItemID = " . $id;
$itemi = mysqli_query($conn, $sqli);

if ($item == null) {
    nowgo('/index.php?page=new_stationary');
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
                <div><?= $item['Name'] ?> Details
                    <div class="page-title-subheading">
                        Stationary Items Details
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="main-card mb-3 card">
        <div class="card-body">
            <table class="table table-bordered text-center">
                <thead>
                    <tr>
                        <th colspan="7">Received</th>
                    </tr>
                    <tr>
                        <th>#</th>
                        <th>Supplier Name</th>
                        <th>Challan No</th>
                        <th>Received Qty</th>
                        <th>Shortage/Excess</th>
                        <th>Receive Date</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $count = 1;
                    while ($row = mysqli_fetch_assoc($itemr)) {
                        ?>
                        <tr>
                            <td><?= $count++ ?></td>
                            <td><?= $row['SupplierName'] ?></td>
                            <td><?= $row['ChallanNo'] ?></td>
                            <td><?= $row['ReceivedQty'] . ' ' . $item['MeasurmentUnit'] ?></td>
                            <td><?= $row['Shortage'] ?></td>
                            <td><?= date('j-M-Y', strtotime($row['timestamp'])) ?></td>
                        </tr>
                    <?php
                    } ?>

                </tbody>
            </table>
        </div>
    </div>
    <div class="main-card mb-3 card">
        <div class="card-body">
            <table class="table table-bordered text-center">
                <thead>
                    <tr>
                        <th colspan="7">Issued</th>
                    </tr>
                    <tr>
                        <th>#</th>
                        <th>Unit Name</th>
                        <th>Issued By</th>
                        <th>Issue Qty</th>
                        <th>Remark</th>
                        <th>Issue Date</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $count = 1;
                    while ($row = mysqli_fetch_assoc($itemi)) {
                        ?>
                        <tr>
                            <td><?= $count++ ?></td>
                            <td><?= $row['UnitName'] ?></td>
                            <td><?= $row['IssueBy'] ?></td>
                            <td><?= $row['Qty'] . ' ' . $item['MeasurmentUnit'] ?></td>
                            <td><?= $row['Remark'] ?></td>
                            <td><?= date('j-M-Y', strtotime($row['timestamp'])) ?></td>
                        </tr>
                    <?php
                    } ?>

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