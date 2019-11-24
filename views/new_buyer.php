<?php

$page_privilege = 3;
hasAccess();

$PageTitle = "New Buyer | Optima Inventory";
function customPageHeader()
{
    ?>
    <!--Arbitrary HTML Tags-->
<?php }
include_once "controller/new_buyer.php";
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
                <div>New Buyer
                    <div class="page-title-subheading">
                        Please use this form to add a new Buyer.
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
                        <label for="validationTooltip01">Name</label>
                        <input type="text" class="form-control" id="validationTooltip01" placeholder="Name" name="buyer_name" required>
                    </div>
                    <div class="col-md-4 mb-3">
                        <label for="validationTooltip02">Email</label>
                        <input type="email" name="email" class="form-control" id="validationTooltip02" placeholder="Email" required>
                    </div>
                    <div class="col-md-4 mb-3">
                        <label for="validationTooltipUsername">Phone Number</label>
                        <div class="input-group">
                            <input type="text" name="buyer_phone" class="form-control" id="validationTooltipUsername" placeholder="Phone Number" aria-describedby="validationTooltipUsernamePrepend" required>
                        </div>
                    </div>
                </div>
                <div class="form-row">
                    <div class="col-md-6 mb-3">
                        <label for="validationTooltip03">Address Line 1</label>
                        <input type="text" name="first_address" class="form-control" id="validationTooltip03" placeholder="Address Line 1" required>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="validationTooltip03">Address Line 2</label>
                        <input type="text" name="second_address" class="form-control" id="validationTooltip03" placeholder="Address Line 2" required>
                    </div>
                </div>

                <div class="form-row">
                    <div class="col-md-4 mb-3">
                        <label for="validationTooltip03">City</label>
                        <input type="text" name="city" class="form-control" id="validationTooltip03" placeholder="City" required>
                    </div>
                    <div class="col-md-4 mb-3">
                        <label for="validationTooltip03">Country</label>
                        <input type="text" name="country" class="form-control" id="validationTooltip03" placeholder="Country" required>
                    </div>
                    <div class="col-md-4 mb-3">
                        <label for="validationTooltip03">Buying House Name</label>
                        <input type="text" name="bying_house" class="form-control" id="validationTooltip03" placeholder="Buying House Name" required>
                    </div>
                </div>
                <div class="form-row">
                    <div class="col-md-4 mb-3">
                        <label for="validationTooltip03">Contact Person Name</label>
                        <input type="text" name="contact_person_name" class="form-control" id="validationTooltip03" placeholder="Contact Person Name" required>
                    </div>
                    <div class="col-md-4 mb-3">
                        <label for="validationTooltip03">Contact Person Designation</label>
                        <input type="text" name="contact_person_designation" class="form-control" id="validationTooltip03" placeholder="Contact Person Designation" required>
                    </div>
                    <div class="col-md-4 mb-3">
                        <label for="validationTooltip03">Contact Person Phone</label>
                        <input type="text" name="contact_person_phone" class="form-control" id="validationTooltip03" placeholder="Contact Person Phone" required>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12 text-right">
                        <button class="btn btn-primary" type="submit">Save</button>
                    </div>
                </div>

            </form>
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