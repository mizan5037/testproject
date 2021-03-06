<?php
include_once "controller/user.php";
$PageTitle = $row['Name'] . " | Optima Inventory";
function customPageHeader()
{
    ?>
    <!--Arbitrary HTML Tags-->
<?php }

include_once "includes/header.php";

?>

<div class="app-main__inner">
    <div class="app-page-title">
        <div class="page-title-wrapper">
            <div class="page-title-heading">
                <div class="page-title-icon">
                    <i class="pe-7s-id icon-gradient bg-mean-fruit">
                    </i>
                </div>
                <div><?= $row['Name'] ?>
                    <div class="page-title-subheading">
                        <?= get_designation($row['Designation']) ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row <?= $row['Designation'] == 1 ? '' : 'justify-content-center' ?>">
        <div class="col-md-6 ">
            <div class="main-card mb-3 card">
                <div class="card-body text-center">
                    <h5 class="card-title">Update Profile</h5>

                    <br>
                    <form class="needs-validation" novalidate method="post">
                        <div class="form-row">
                            <div class="col-md-12 mb-3">
                                <input type="text" class="form-control" placeholder="username" value="<?= $row['Name'] ?>" name="name" required>
                            </div>
                            <div class="col-md-12 mb-3">
                                <input type="text" class="form-control" name="email" value="<?= $row['email'] ?>" placeholder="Email" required>
                            </div>
                            <div class="col-md-12 mb-3">
                                <h6 class="card-subtitle">If You Want to Change the Old Password</h6>
                                <input type="password" class="form-control" name="old" placeholder="Old Password">
                                <div class="invalid-tooltip">
                                    Please Enter Old Password.
                                </div>
                            </div>
                            <div class="col-md-12 mb-3">
                                <input type="password" class="form-control" name="new" placeholder="New Password">
                                <div class="invalid-tooltip">
                                    Please Enter the New Password.
                                </div>
                            </div>
                            <div class="col-md-12 mb-3">
                                <div class="input-group">
                                    <input type="password" class="form-control" name="rnew" placeholder="Re-Enter New Password">
                                    <div class="invalid-tooltip">
                                        Please Re-Enter New Password.
                                    </div>
                                </div>
                            </div>
                        </div>
                        <input class="btn btn-primary" type="submit" name="update" value="Update">
                    </form>
                </div>
            </div>
        </div>
        <?php if ($row['Designation'] == 1) { ?>
            <div class="col-md-6">
                <div class="main-card mb-3 card">
                    <div class="card-body text-center">
                        <h5 class="card-title">Add New User</h5>
                        <form class="needs-validation" novalidate method="post">
                            <div class="form-row">
                                <div class="col-md-12 mb-3">
                                    <input type="text" class="form-control" placeholder="Name" name="name" required>
                                </div>
                                <div class="col-md-12 mb-3">
                                    <input type="text" class="form-control" placeholder="username" name="username" required>
                                </div>
                                <div class="col-md-12 mb-3">
                                    <input type="text" class="form-control" name="email" placeholder="Email" required>
                                </div>
                                <div class="col-md-12 mb-3">
                                    <select name="designation" class="form-control" required>
                                        <option>Choose Designation</option>
                                        <option value="1">Super Admin</option>
                                        <option value="2">Admin</option>
                                        <option value="3">Merchandising</option>
                                        <option value="4">Commercial</option>
                                        <option value="5">Production</option>
                                    </select>
                                </div>
                                <div class="col-md-12 mb-3">
                                    <div class="input-group">
                                        <input type="password" class="form-control" name="pass" placeholder="Enter New Password" required>
                                    </div>
                                </div>
                                <div class="col-md-12 mb-3">
                                    <div class="input-group">
                                        <input type="password" class="form-control" name="rpass" placeholder="Re-Enter New Password" required>
                                    </div>
                                </div>
                            </div>
                            <input class="btn btn-primary" type="submit" name="new_user" value="Add New User">
                        </form>
                    </div>
                </div>
            </div>
        <?php } ?>
    </div>
    <?php if ($row['Designation'] == 1 || $row['Designation'] == 2) { ?>
        <div class="row">
            <div class="col-md-12">
                <div class="main-card mb-3 card">
                    <div class="card-body">
                        <h5 class="card-title">User List</h5>
                        <table class="mb-0 table table-bordered table-striped table-hover">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Name</th>
                                    <th>User Name</th>
                                    <th>Email</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php while ($user = mysqli_fetch_assoc($all)) { ?>
                                    <tr>
                                        <th scope="row"><?= $user['UserID'] ?></th>
                                        <td><?= $user['Name'] ?> </td>
                                        <td><?= $user['Username'] ?> &nbsp; &nbsp; <?= $user['Status'] ? '' : '<span class="badge badge-danger">Banned User</span>' ?></td>
                                        <td><?= $user['email'] ?></td>
                                        <td>
                                            <a onclick="return confirm('Are You sure want to <?= $user['Status'] ? 'Ban' : 'Assign' ?> this user?')" href="<?= $path ?>/index.php?page=user&status=<?= $user['Status'] ?>&id=<?= $user['UserID'] ?>" class="mb-2 mr-2 btn-transition btn btn-sm btn-outline-<?= $user['Status'] ? 'danger' : 'success' ?>">
                                                <?= $user['Status'] ? 'Ban' : 'Assign' ?>
                                            </a>
                                        </td>
                                    </tr>
                                <?php } ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div class="col-md-12">
                <div class="main-card mb-3 card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6">
                                <h5 class="card-title">Data Base Backup</h5>
                            </div>
                            <div class="col-md-6 text-right">
                                <a class="btn btn-sm btn-outline-success" href="<?= $path ?>/index.php?page=db_backup">
                                    Take Backup
                                </a>
                            </div>
                        </div>
                        <br>

                        <table class="mb-0 table table-bordered table-striped table-hover">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Name</th>
                                    <th>Download</th>
                                    <?php if ($row['Designation'] == 1) { ?>
                                    <th>Delete</th>
                                    <?php } ?>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                    $count = 1;
                                    $log_directory = $_SERVER['DOCUMENT_ROOT'] . $path . '/db';

                                    $results_array = array();

                                    if (is_dir($log_directory)) {
                                        if ($handle = opendir($log_directory)) {
                                            //Notice the parentheses I added:
                                            while (($file = readdir($handle)) !== FALSE) {
                                                $results_array[] = $file;
                                            }
                                            closedir($handle);
                                        }
                                    }

                                    //Output findings
                                    foreach ($results_array as $value) {
                                        if ($value != 'index.html' && $value != '.' && $value != '..') {
                                            ?>
                                        <tr>
                                            <th scope="row"><?= $count++ ?></th>
                                            <td><?= $value ?> </td>
                                            <td>
                                                <a class="mb-2 mr-2 btn-transition btn btn-sm btn-outline-success" href="<?= $path . '/db/' . $value ?>">Download</a>
                                            </td>
                                            <?php if ($row['Designation'] == 1) { ?>
                                            <td>
                                                <a onclick="return confirm('Are You sure want to this backup?')" href="<?= $path ?>/index.php?page=delete_backup&name=<?= $value ?>" class="mb-2 mr-2 btn-transition btn btn-sm btn-outline-danger">
                                                    Delete
                                                </a>
                                            </td>
                                            <?php } ?>
                                        </tr>
                                <?php }
                                    } ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    <?php } ?>
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