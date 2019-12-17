<?php

$PageTitle = "New Master LC | Optima Inventory";
function customPageHeader()
{
    ?>
    <!-- Theme included stylesheets -->
    <link href="https://cdn.quilljs.com/1.3.6/quill.snow.css" rel="stylesheet">

    <!--Arbitrary HTML Tags-->
<?php }

include_once "controller/single_masterlc.php";
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
                <div>New Master LC
                    <div class="page-title-subheading">
                        Please use this form to add a new Master LC.
                    </div>
                </div>
            </div>

        </div>
    </div>
    <div class="main-card mb-3 card">
        <div class="card-body">
            <!-- <h5 class="card-title">LC</h5> -->
            <form class="needs-validation" id="form" method="post" novalidate>
                <div class="form-row">
                    <div class="col-md-4 mb-3">
                        <label>Master LC Number</label>
                        <input type="text" class="form-control form-control-sm" name="mlcnumber" value="<?= $mlc['MasterLCNumber'] ?>" required>
                    </div>
                    <div class="col-md-4 mb-3">
                        <label>Master LC Issue Date</label>
                        <input type="date" class="form-control form-control-sm" name="mlcissuedate" value="<?= $mlc['MasterLCIssueDate'] ?>" required>
                    </div>
                    <div class="col-md-4 mb-3">
                        <label>Master LC Expiry Date</label>
                        <input type="date" class="form-control form-control-sm" name="mlcexpirydate" value="<?= $mlc['MasterLCExpiryDate'] ?>" required>

                    </div>
                </div>
                <div class="form-row">
                    <div class="col-md-2 mb-3">
                        <label>Sender Bank</label>
                        <input type="text" class="form-control form-control-sm" name="sender_bank" value="<?= $mlc['MasterLCSenderBank'] ?>" required>
                    </div>
                    <div class="col-md-2 mb-3">
                        <label>Receiver Bank</label>
                        <input type="text" class="form-control form-control-sm" name="receiver_bank" value="<?= $mlc['MasterLCReceiverBank'] ?>" required>
                    </div>
                    <div class="col-md-4 mb-3">
                        <label>Buyer</label>
                        <select class="form-control form-control-sm" name="buyer" required>
                            <option></option>
                            <?php
                            $sql = "SELECT BuyerID, BuyerName FROM buyer WHERE Status = 1";
                            $results = mysqli_query($conn, $sql);
                            while ($result = mysqli_fetch_assoc($results)) {
                                if ($mlc['MasterLCBuyer'] === $result['BuyerID']) {
                                    $selected = ' selected ';
                                } else {
                                    $selected = '';
                                }
                                echo '<option ' . $selected . ' value="' . $result['BuyerID'] . '">' . $result['BuyerName'] . '</option>';
                            }
                            ?>
                        </select>
                    </div>
                    <div class="col-md-4 mb-3">
                        <label>LC Issued By</label>
                        <input type="text" class="form-control form-control-sm" name="lcissuedby" value="<?= $mlc['MasterLCIssuingCompany'] ?>" required>
                    </div>
                </div>
                <div class="form-row">
                    <div class="col-md-4 mb-3">
                        <label>Currency</label>
                        <input type="text" class="form-control form-control-sm" name="currency" value="<?= $mlc['MasterLCCurrency'] ?>" required>
                    </div>
                    <div class="col-md-4 mb-3">
                        <label>Amount</label>
                        <input type="number" class="form-control form-control-sm" name="amount" value="<?= $mlc['MasterLCAmount'] ?>" required>
                    </div>
                </div>
                <div class="form-row">
                    <div class="col-md-3 mb-3">
                        <label>Partial Shipment</label>
                        <select class="form-control form-control-sm" name="partialshipment" required>
                            <option <?= $mlc['MasterLCPartialShipment'] == 1 ? 'selected' : '' ?> value="1">Allowed</option>
                            <option <?= $mlc['MasterLCPartialShipment'] == 0 ? 'selected' : '' ?> value="0">Not Allowed</option>
                        </select>
                    </div>
                    <div class="col-md-3 mb-3">
                        <label>Transshipment</label>
                        <select class="form-control form-control-sm" name="transshipment" required>
                            <option <?= $mlc['MasterLCTranshipment'] == 1 ? 'selected' : '' ?> value="1">Allowed</option>
                            <option <?= $mlc['MasterLCTranshipment'] == 0 ? 'selected' : '' ?> value="0">Not Allowed</option>
                        </select>
                    </div>
                    <div class="col-md-3 mb-3">
                        <label>Port Of Loading</label>
                        <input type="text" class="form-control form-control-sm" name="portofloading" value="<?= $mlc['MasterLCPortOfLoading'] ?>" required>
                    </div>
                    <div class="col-md-3 mb-3">
                        <label>Port Of Discharge</label>
                        <input type="text" class="form-control form-control-sm" name="portofdischarge" value="<?= $mlc['MasterLCPortOfDischarge'] ?>" required>
                    </div>
                </div>
                <div class="form-row">
                    <div class="col-md-12">
                        Description:
                        <div id="editor"></div>
                        <textarea name="description" style="display:none" id="description"></textarea>
                    </div>
                    <div class="col-md-12" style="height: 100px;"></div>
                </div>
                <div class="row">
                    <div class="col-md-6"><button class="btn btn-danger mr-auto" id="reset" type="reset">Reset</button></div>
                    <div class="col-md-6 text-right"><button class="btn btn-primary" type="submit"><i class="metismenu-state-icon pe-7s-diskette"></i> &nbsp; Save </button></div>
                </div>

            </form>
        </div>
    </div>
</div>



<?php
function customPagefooter()
{
    global $styleArr;
    global $poArr;
    global $mlc;

    ?>
    <!-- Include the Quill library -->
    <script src="https://cdn.quilljs.com/1.3.6/quill.js"></script>

    <!-- Initialize Quill editor -->
    <script>
        $(document).ready(function() {
            $("#editor").find('div:first').html("<?= $mlc['Description'] ?>");
        });
        var quill = new Quill('#editor', {
            theme: 'snow'
        });

        $("#form").on("submit", function() {
            $("#description").val($("#editor").find('div:first').html());
            console.log($("#description").val())
        })
    </script>
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