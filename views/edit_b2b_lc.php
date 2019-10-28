<?php

$PageTitle = "Edit B2B LC | Optima Inventory";
function customPageHeader()
{
    ?>
    <!-- Theme included stylesheets -->
    <link href="https://cdn.quilljs.com/1.3.6/quill.snow.css" rel="stylesheet">

    <!--Arbitrary HTML Tags-->
<?php }

include_once "controller/single_b2b_lc.php";
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
                <div>Edit B2B LC
                    <div class="page-title-subheading">
                        Please use this form to Edit a new B2B LC.
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
                        <label>B2B LC Number:</label>
                        <input type="text" class="form-control form-control-sm" name="blcnumber" value="<?= $blc['B2BLCNumber'] ?>" required>
                    </div>
                    <div class="col-md-4 mb-3">
                        <label>B2B LC Issue Date:</label>
                        <input type="date" class="form-control form-control-sm" name="blcissuedate" value="<?= $blc['Issuedate'] ?>" required>
                    </div>
                    <div class="col-md-4 mb-3">
                        <label>Master LC No:</label>
                        <select class="form-control form-control-sm" name="masterlc" required>
                            <option></option>
                            <?php
                            $sql = "SELECT MasterLCID, MasterLCNumber FROM masterlc WHERE Status = 1";
                            $results = mysqli_query($conn, $sql);
                            while ($result = mysqli_fetch_assoc($results)) {
                                if ($blc['MasterLCID'] === $result['MasterLCID']) {
                                    $selected = ' selected ';
                                } else {
                                    $selected = '';
                                }
                                echo '<option ' . $selected . ' value="' . $result['MasterLCID'] . '">' . $result['MasterLCNumber'] . '</option>';
                            }
                            ?>
                        </select>

                    </div>
                </div>
                <div class="form-row">
                    <div class="col-md-4 mb-3">
                        <label>Supplier Name:</label>
                        <input type="text" class="form-control form-control-sm" name="supplier" value="<?= $blc['SupplierName'] ?>" required>
                    </div>
                    <div class="col-md-4 mb-3">
                        <label>Contact Person:</label>
                        <input type="text" class="form-control form-control-sm" name="person" value="<?= $blc['ContactPerson'] ?>" required>
                    </div>
                    <div class="col-md-4 mb-3">
                        <label>Contact Number:</label>
                        <input type="text" class="form-control form-control-sm" name="number" value="<?= $blc['ContactNumber'] ?>" required>
                    </div>
                </div>
                <div class="form-row">
                    <div class="col-md-12">
                        Address:
                        <div id="editor"></div>
                        <textarea name="address" style="width:100%; height:150px;" id="description"><?= $blc['SupplierAddress'] ?></textarea>
                    </div>
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
    global $blc;

    ?>
    <!-- Include the Quill library -->
    <script src="https://cdn.quilljs.com/1.3.6/quill.js"></script>

    <!-- Initialize Quill editor -->
    <script>
        $(document).ready(function() {
            $("#editor").find('div:first').html("<?= $blc['Description'] ?>");
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