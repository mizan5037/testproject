<?php

$PageTitle = "User | Optima Inventory";
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
                <div><?php echo get_ses('user'); ?>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-6">
            <div class="main-card mb-3 card">
                <div class="card-body text-center">
                    <h5 class="card-title">Change Password</h5>
                    <h6 class="card-subtitle">If You Want to Change the Old Password</h6>
                    <br>
                    <form class="needs-validation" novalidate>
                        <div class="form-row">
                            <div class="col-md-12 mb-3">
                                <input type="password" class="form-control" id="validationTooltip01" placeholder="Old Password" required>
                                <div class="invalid-tooltip">
                                    Please Enter Old Password.
                                </div>
                            </div>
                            <div class="col-md-12 mb-3">
                                <input type="password" class="form-control" id="validationTooltip02" placeholder="New Password" required>
                                <div class="invalid-tooltip">
                                    Please Enter the New Password.
                                </div>
                            </div>
                            <div class="col-md-12 mb-3">
                                <div class="input-group">
                                    <input type="password" class="form-control" id="validationTooltipUsername" placeholder="Re-Enter New Password" required>
                                    <div class="invalid-tooltip">
                                        Please Re-Enter New Password.
                                    </div>
                                </div>
                            </div>
                        </div>
                        <button class="btn btn-primary" type="submit">Change Password</button>
                    </form>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="main-card mb-3 card">
                <div class="card-body text-center">
                    <h5 class="card-title">Add New User</h5>
                    <form class="needs-validation" novalidate>
                        <div class="form-row">
                            <div class="col-md-12 mb-3">
                                <input type="text" class="form-control" id="validationTooltip01" placeholder="Name" required>
                                <div class="invalid-tooltip">
                                    Please Enter Name.
                                </div>
                            </div>
                            <div class="col-md-12 mb-3">
                                <input type="text" class="form-control" id="validationTooltip02" placeholder="Email" required>
                                <div class="invalid-tooltip">
                                    Please Enter Email Address.
                                </div>
                            </div>
                            <div class="col-md-12 mb-3">
                                <select name="select" id="exampleSelect" class="form-control" required>
                                    <option value="">Choose Designation</option>
                                    <option value="">Super Admin</option>
                                    <option value="">Admin</option>
                                    <option value="">User</option>
                                </select>
                                <div class="invalid-tooltip">
                                    Please Enter Email Address.
                                </div>
                            </div>
                            <div class="col-md-12 mb-3">
                                <div class="input-group">
                                    <input type="password" class="form-control" id="validationTooltipUsername" placeholder="Re-Enter New Password" required>
                                    <div class="invalid-tooltip">
                                        Please Re-Enter New Password.
                                    </div>
                                </div>
                            </div>
                        </div>
                        <button class="btn btn-primary" type="submit">Add New User</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
        <div class="main-card mb-3 card">
        <div class="card-body">
            <h5 class="card-title">User List</h5>
            <table class="mb-0 table table-striped table-hover">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>User Name</th>
                        <th>Email</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <th scope="row">1</th>
                        <td>Mizan</td>
                        <td>mizan@example.com</td>
                        <td>
                            <button class="mb-2 mr-2 btn-transition btn btn-sm btn-outline-secondary">
                                Details
                            </button>
                            <button class="mb-2 mr-2 btn-transition btn btn-sm btn-outline-danger">
                                Ban
                            </button>
                        </td>
                    </tr>
                    <tr>
                        <th scope="row">2</th>
                        <td>Sumon</td>
                        <td>sumon@example.com</td>
                        <td>
                            <button class="mb-2 mr-2 btn-transition btn btn-sm btn-outline-secondary">
                                Details
                            </button>
                            <button class="mb-2 mr-2 btn-transition btn btn-sm btn-outline-success">
                                assign
                            </button>
                        </td>
                    </tr>
                    <tr>
                        <th scope="row">3</th>
                        <td>Shuvo</td>
                        <td>Shuvo@example.com</td>
                        <td>
                            <button class="mb-2 mr-2 btn-transition btn btn-sm btn-outline-secondary">
                                Details
                            </button>
                            <button class="mb-2 mr-2 btn-transition btn btn-sm btn-outline-danger">
                                Ban
                            </button>
                        </td>
                    </tr>
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