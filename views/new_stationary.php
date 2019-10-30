<?php

$PageTitle = "New Item | Optima Inventory";
function customPageHeader()
{
    ?>
    <!--Arbitrary HTML Tags-->
<?php }
include_once "controller/add_new_stationary.php";
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
                <div>Stationary Items
                    <div class="page-title-subheading">
                        Please use this form to add a new Item.
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="main-card mb-3 card">
        <div class="card-body">
            <form class="needs-validation" method="POST" novalidate>
                <div class="form-row">
                    <div class="col-md-4 mb-3">
                        <label>Name</label>
                        <input type="text" class="form-control form-control-sm" placeholder="Name" name="item_name" required>
                    </div>
                    <div class="col-md-4 mb-3">
                        <label>Specification</label>
                        <input type="text" class="form-control form-control-sm" placeholder="Specification" name="specification" required>
                    </div>
                    <div class="col-md-4 mb-3">
                        <label>Measurement Unit</label>
                        <input type="text" class="form-control form-control-sm" name="unit" placeholder="Measurement Unit" required>
                    </div>
                </div>
                <div class="container">
                    <div class="row">
                        <div class="col-md-12 text-center">
                            <button class="btn btn-primary" type="submit">Save Item</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <div class="main-card mb-3 card">
        <div class="card-body">
            <h5 class="card-title">Stationary List</h5>
            <table class="table table-bordered table-hover text-center">
                <thead>
                    <th>#</th>
                    <th>Name</th>
                    <th>Specification</th>
                    <th>Measurement Unit</th>
                    <th>Action</th>
                </thead>
                <tbody>
                    <?php
                    $count = 1;
                    while ($row = mysqli_fetch_assoc($result)) {

                        ?>
                        <tr>
                            <td><?= $count++ ?></td>
                            <td><?= $row['Name'] ?></td>
                            <td><?= $row['Description'] ?></td>
                            <td><?= $row['MeasurmentUnit'] ?></td>
                            <td>
                                <a href="<?= $path ?>/index.php?page=stationary_item&id=<?= $row['ID'] ?>" class="mb-2 btn-success btn btn-sm" >
                                    Details
                                </a>
                                <?php if($row['ItemID'] == null){ ?>
                                /
                                <a onclick="return confirm('Are You sure want to delete this item permanently?')" href="<?= $path ?>/index.php?page=new_stationary&delete=<?= $row['ID'] ?>" class="mb-2 btn-danger btn btn-sm" id="details">
                                    <i class="fas fa-trash-alt" style="color: white;"></i>
                                </a>
                                <?php } ?>
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
    <script>
        // Example starter JavaScript for disabling form submissions if there are invalid fields
        (function() {
            'use strict';
            window.addEventListener('load', function() {
                // Fetch all the forms we want to apply custom Bootstrap validation styles to
                var forms = document.getElementsByClassName('needs-validation');
                // Loop over them and prevent submission
                var validation = Array.prototype.filter.call(forms, function(form) {
                    form.addEventListener('submit', function(event) {
                        if (form.checkValidity() === false) {
                            event.preventDefault();
                            event.stopPropagation();
                        }
                        form.classList.add('was-validated');
                    }, false);
                });
            }, false);
        })();
    </script>
<?php }
include_once "includes/footer.php";
?>