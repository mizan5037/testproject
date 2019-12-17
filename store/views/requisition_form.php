<?php

$PageTitle = "New Requiestion/Delivery Form | Optima Inventory";
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
                    <i class="pe-7s-note icon-gradient bg-mean-fruit">
                    </i>
                </div>
                <div>New Requisition/Delivery Form
                    <div class="page-title-subheading">
                        Please use this form to add a new Requistion.
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="main-card mb-3 card">
        <div class="card-body">
            <h5 class="card-title">Requisition/Delivery Form</h5>
            <form class="needs-validation" novalidate>
                <div class="form-row">
                    <div class="col-md-4 mb-3">
                        <label for="validationTooltip01">Requisition No</label>
                        <input type="text" class="form-control" id="validationTooltip01" placeholder="Requisition No" required>
                        <div class="valid-tooltip">
                            Looks good!
                        </div>
                        <div class="invalid-tooltip">
                            Please Enter the LC Number.
                        </div>
                    </div>
                    <div class="col-md-4 mb-3">
                        <label for="validationTooltip02">Date of Requisition</label>
                        <input type="text" class="form-control" id="validationTooltip02" placeholder="Date of Requisition" required>
                        <div class="valid-tooltip">
                            Looks good!
                        </div>
                        <div class="invalid-tooltip">
                            Please Enter the LC Issue Date.
                        </div>
                    </div>
                    <div class="col-md-4 mb-3">
                        <label for="validationTooltip02">Date of Receipt</label>
                        <input type="text" class="form-control" id="validationTooltip02" placeholder="Date of Receipt" required>
                        <div class="valid-tooltip">
                            Looks good!
                        </div>
                        <div class="invalid-tooltip">
                            Please Enter the LC Issue Date.
                        </div>
                    </div>
                    <div class="col-md-4 mb-3">
                        <label for="validationTooltipUsername">Item Number</label>
                        <div class="input-group">
                            <input type="text" class="form-control" id="validationTooltipUsername" placeholder="Item Number" aria-describedby="validationTooltipUsernamePrepend" required>
                            <div class="valid-tooltip">
                                Looks good!
                            </div>
                            <div class="invalid-tooltip">
                                Please Enter the PI Number.
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 mb-3">
                        <label for="validationTooltipUsername">Quantity</label>
                        <div class="input-group">
                            <input type="text" class="form-control" id="validationTooltipUsername" placeholder="Quantity" aria-describedby="validationTooltipUsernamePrepend" required>
                            <div class="valid-tooltip">
                                Looks good!
                            </div>
                            <div class="invalid-tooltip">
                                Please Enter the PI Number.
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 mb-3">
                        <label for="validationTooltipUsername">Store Cart Number From</label>
                        <div class="input-group">
                            <input type="text" class="form-control" id="validationTooltipUsername" placeholder="Store Cart Number From" aria-describedby="validationTooltipUsernamePrepend" required>
                            <div class="valid-tooltip">
                                Looks good!
                            </div>
                            <div class="invalid-tooltip">
                                Please Enter the PI Number.
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 mb-3">
                        <label for="validationTooltipUsername">Store Cart Number To</label>
                        <div class="input-group">
                            <input type="text" class="form-control" id="validationTooltipUsername" placeholder="Store Cart Number To" aria-describedby="validationTooltipUsernamePrepend" required>
                            <div class="valid-tooltip">
                                Looks good!
                            </div>
                            <div class="invalid-tooltip">
                                Please Enter the PI Number.
                            </div>
                        </div>
                    </div>
                </div>
                <div class="form-row">
                    <div class="col-md-3 mb-2">
                        <label for="validationTooltip03">Requisition By</label>
                        <input type="text" class="form-control" id="validationTooltip03" placeholder="Requisition By" required>
                        <div class="invalid-tooltip">
                            Please provide a PO Number.
                        </div>
                    </div>
                    <div class="col-md-3 mb-2">
                        <label for="validationTooltip04">Approved By</label>
                        <input type="text" class="form-control" id="validationTooltip04" placeholder="Approved By" required>
                        <div class="invalid-tooltip">
                            Please provide a valid Color.
                        </div>
                    </div>
                    <div class="col-md-3 mb-2">
                        <label for="validationTooltip05">Delivered By</label>
                        <input type="text" class="form-control" id="validationTooltip05" placeholder="Delivered By" required>
                        <div class="invalid-tooltip">
                            Please provide a valid Quantity.
                        </div>
                    </div>
                    <div class="col-md-3 mb-2">
                        <label for="validationTooltip05">Received By</label>
                        <input type="text" class="form-control" id="validationTooltip05" placeholder="Received By" required>
                        <div class="invalid-tooltip">
                            Please provide a valid Quantity.
                        </div>
                    </div>
                </div>
                <div class="form-row">
                    <div class="col-md-3 mb-3">
                        <label for="validationTooltip03">Delivery Status</label>
                        <select class="form-control">
                          <option value="Requisitioned">Requisitioned</option>
                          <option value="Delivered">Delivered</option>
                        </select>
                    </div>
                    <div class="col-md-3 mb-3">
                        <label for="validationTooltip03">Store Cart Current Status</label>
                        <select class="form-control">
                          <option value="RM">Raw Material</option>
                          <option value="WIP">Work In Process</option>
                          <option value="FG">Finished Good</option>
                        </select>
                    </div>
                    <div class="col-md-3 mb-3">
                        <label for="validationTooltip04">Store Cart New Status</label>
                        <select class="form-control">
                          <option value="RM">Raw Material</option>
                          <option value="WIP">Work In Process</option>
                          <option value="FG">Finished Good</option>
                        </select>
                    </div>
                </div>
                <button class="btn btn-primary" type="submit">Add New Requisition</button>
                <button class="btn btn-primary" type="submit">Print Requisition Form</button>
                <button class="btn btn-primary" type="submit">Print Delivery Form</button>
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