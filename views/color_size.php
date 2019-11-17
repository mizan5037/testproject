<?php

$PageTitle = "Fabric Color | Optima Inventory";
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
include_once "controller/color_size.php";
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
                <div>Color & Size
                    <div class="page-title-subheading">
                        Color & Size Description
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <div class="main-card mb-3 card">
                    <div class="card-body">
                        <h5 class="card-title">Add New Color</h5>
                        <div class="container">
                            <form method="post">
                                <div class="form-row">
                                    <div class="col-md-8 mb-3">
                                        <input type="text" name="color" class="form-control" placeholder="Color Name" required>
                                    </div>
                                    <div class="col-md-4 mb-3">
                                        <input type="submit" name="submit" class="form-control btn btn-success" value="Save" required>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="main-card mb-3 card">
                    <div class="card-body">
                        <h5 class="card-title">All Colors</h5>
                        <table class="table table-sm table-bordered text-center">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Name</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $count = 1;
                                while ($row = mysqli_fetch_assoc($colorresult)) {
                                    ?>
                                    <tr>
                                        <td><?= $count++ ?></td>
                                        <td><?= $row['color'] ?></td>
                                        <td><a onclick="return confirm('Are You sure want to delete this item permanently?')" href="<?= $path ?>/index.php?page=color_size&color_delete=<?= $row['id'] ?>" class="mb-2 mr-2 btn-transition btn-danger btn btn-sm btn-outline-secondary" id="details">
                                                <i class="fas fa-trash-alt" style="color: white;"></i>
                                            </a>
                                        </td>
                                    </tr>
                                <?php } ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="main-card mb-3 card">
                    <div class="card-body">
                        <h5 class="card-title">Add New Size</h5>
                        <div class="container">
                            <form method="post">
                                <div class="form-row">
                                    <div class="col-md-8 mb-3">
                                        <input type="text" name="size" class="form-control" placeholder="Size Name" required>
                                    </div>
                                    <div class="col-md-4 mb-3">
                                        <input type="submit" name="submit" class="form-control btn btn-success" value="Save" required>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="main-card mb-3 card">
                    <div class="card-body">
                        <h5 class="card-title">All Sizes</h5>
                        <table class="table table-sm table-bordered text-center">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Name</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $count = 1;
                                while ($row = mysqli_fetch_assoc($sizeresult)) {
                                    ?>
                                    <tr>
                                        <td><?= $count++ ?></td>
                                        <td><?= $row['size'] ?></td>
                                        <td><a onclick="return confirm('Are You sure want to delete this item permanently?')" href="<?= $path ?>/index.php?page=color_size&size_delete=<?= $row['id'] ?>" class="mb-2 mr-2 btn-transition btn-danger btn btn-sm btn-outline-secondary" id="details">
                                                <i class="fas fa-trash-alt" style="color: white;"></i>
                                            </a>
                                        </td>
                                    </tr>
                                <?php } ?>
                            </tbody>
                        </table>
                    </div>
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