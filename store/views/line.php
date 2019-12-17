<?php

$page_privilege = 5;
hasAccess();

$PageTitle = "Line | Optima Inventory";
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
include_once "controller/line.php";
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
                <div>Line Details
                    <div class="page-title-subheading">
                        All active line info
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="main-card mb-3 card">
        <div class="card-body">
            <table class="table table-bordered table-hover text-center">
                <thead>
                    <tr>
                        <th colspan="5">Line List</th>
                    </tr>
                    <tr>
                        <th>#</th>
                        <th>Floor Name</th>
                        <th>Line Name</th>
                        <th>Status</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $sql = "SELECT l.*, f.floor_name FROM line l LEFT JOIN floor f ON f.floor_id = l.floor ORDER BY f.floor_name";
                    $result = mysqli_query($conn, $sql);
                    $count = 1;
                    while ($row = mysqli_fetch_assoc($result)) {
                        ?>
                        <tr>
                            <td><?= $count++ ?></td>
                            <td><?= $row['floor_name'] ?></td>
                            <td><?= $row['line'] ?></td>
                            <td><?= $row['status'] ? 'Active' : 'Closed' ?></td>
                            <td><a href="<?= $path ?>/index.php?page=line&id=<?= $row['id'] ?>&status=<?= $row['status'] ?>" class="btn btn-sm btn-<?= $row['status'] ? 'danger' : 'success' ?>"><?= $row['status'] ? 'Close It' : 'Activate' ?></a></td>
                        </tr>
                    <?php
                    }
                    ?>
                </tbody>
            </table>
        </div>
    </div>
    <div class="main-card mb-3 card">
        <div class="card-body">
            <h5 class="card-title">New Line</h5>
            <form action="" method="post">
                <div class="form-row text-right">
                    <div class="col-md-2">
                        <h4>Floor Name:</h4>
                    </div>
                    <div class="col-md-2">
                        <select name="floor" class="form-control" required>
                            <option value=""></option>
                            <?php
                            $conn = db_connection();
                            $sql = "SELECT * FROM floor WHERE status = 1";
                            $results = mysqli_query($conn, $sql);
                            while ($result = mysqli_fetch_assoc($results)) {
                                echo '<option value="' . $result['floor_id'] . '">' . $result['floor_name'] . '</option>';
                            }
                            ?>
                        </select>
                    </div>
                    <div class="col-md-2">
                        <h4>Line Name:</h4>
                    </div>
                    <div class="col-md-2"><input type="text" name="line" class="form-control" required></div>
                    <div class="col-md-2"><input type="submit" class="btn btn-sm btn-success form-control" value="Save"></div>
                </div>
            </form>
        </div>
    </div>
    <hr>
    <div class="main-card mb-3 card">
        <div class="card-body">
            <h5 class="card-title">New Floor</h5>
            <form action="" method="post">
                <div class="form-row">
                    <div class="col-md-2">
                        <h4>Floor Name:</h4>
                    </div>
                    <div class="col-md-2"><input type="text" name="floor" class="form-control" required></div>
                    <div class="col-md-2"><input type="submit" class="btn btn-sm btn-success form-control" value="Save"></div>
                </div>
            </form>
        </div>
    </div>
    <div class="main-card mb-3 card">
        <div class="card-body">
            <table class="table table-bordered table-hover text-center">
                <thead>
                    <tr>
                        <th colspan="5">Line List</th>
                    </tr>
                    <tr>
                        <th>#</th>
                        <th>Floor Name</th>
                        <th>Status</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $sql = "SELECT * FROM floor ORDER BY floor_name";
                    $result = mysqli_query($conn, $sql);
                    $count = 1;
                    while ($row = mysqli_fetch_assoc($result)) {
                        ?>
                        <tr>
                            <td><?= $count++ ?></td>
                            <td><?= $row['floor_name'] ?></td>
                            <td><?= $row['status'] ? 'Active' : 'Closed' ?></td>
                            <td><a href="<?= $path ?>/index.php?page=line&floor_id=<?= $row['floor_id'] ?>&status=<?= $row['status'] ?>" class="btn btn-sm btn-<?= $row['status'] ? 'danger' : 'success' ?>"><?= $row['status'] ? 'Close It' : 'Activate' ?></a></td>
                        </tr>
                    <?php
                    }
                    ?>
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