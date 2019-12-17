<?php

$page_privilege = 3;
hasAccess();

$PageTitle = "New Style | Optima Inventory";
function customPageHeader()
{
    global $path;
    ?>
    <!--Arbitrary HTML Tags-->

<?php }
include_once "controller/new_style.php";
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
                <div>New Style
                    <div class="page-title-subheading">
                        Please use this form to add a new Style.
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="main-card mb-3 card">
        <div class="card-body">
            <h5 class="card-title">New Style</h5>
            <form class="needs-validation" method="post" enctype="multipart/form-data" novalidate>
                <div class="form-row">

                    <div class="col-md-6 mb-3">
                        <label for="stylenumber">Style Number</label>
                        <input type="text" class="form-control form-control-sm" name="stylenumber" id="stylenumber" placeholder="Style Number" required>
                    </div>
                    <!-- <div class="col-md-6 mb-3">
                        <label for="styledescription">Style Description</label>
                        <input type="text" class="form-control form-control-sm" name="styledescription" id="styledescription" placeholder="Description" required>
                    </div> -->
                </div>
                <!-- <div class="form-row">
                    <div class="col-md-4 mb-3">
                        <label for="fabricdetails">Fabric Details</label>
                        <input type="text" class="form-control form-control-sm" name="fabricdetails" id="fabricdetails" placeholder="Fabric Details" required>
                    </div>
                    <div class="col-md-4 mb-3">
                        <label for="protono">Proto No</label>
                        <input type="text" class="form-control form-control-sm" name="protono" id="protono" placeholder="Proto No" required>
                    </div>
                    <div class="col-md-4 mb-3">
                        <label for="wash">Wash</label>
                        <input type="text" class="form-control form-control-sm" name="wash" id="wash" placeholder="Wash" required>
                    </div>
                </div> -->
                <!-- <div class="form-row">

                    <div class="col-md-8">
                        <table class="mb-0 table table-bordered order-list2" id="myTable2" width="100%">
                            <thead>
                                <tr>
                                    <th colspan="4">TRIMS & ACCESSORIES</th>
                                </tr>
                                <tr>
                                    <th width="3%">#</th>
                                    <th width="40%">Name</th>
                                    <th width="40%">Description</th>
                                    <th width="17%">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <th scope="row">1</th>
                                    <td>
                                        <input placeholder="Name" type="text" name="trim_name[]" class="mb-2 form-control-sm form-control" required>
                                    </td>
                                    <td>
                                        <input placeholder="Description" type="text" name="trim_description[]" class="mb-2 form-control-sm form-control" required>
                                    </td>
                                    <td><a class="deleteRow"></a></td>
                                </tr>

                            </tbody>
                            <tfoot>
                                <tr>
                                    <td colspan="4" class="text-center"><input type="button" class="btn btn-sm btn-success" id="addrow2" value="Add Row" /><br></td>
                                </tr>
                                <tr>
                                    <td colspan="4"></td>
                                </tr>

                            </tfoot>
                        </table>
                    </div>
                    <div class="col-md-4">

                        <div class="row">
                            <div class="col-md-12">
                                <img src="<?= $path ?>/assets/images/noimg.png" id="image" class="img-fluid img-thumbnail rounded" alt="No Image">
                            </div>
                            <div class="col-md-12"><br></div>
                            <div class="col-md-4"><label for="img">Style Image:</label></div>
                            <div class="col-md-8"><input onchange="readURL(this);" type="file" name="img" class="form-control-file" id="img"></div>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <br>
                    </div>
                    <div class="col-md-12">
                        <table class="mb-0 table table-bordered order-list" id="myTable" width="100%">
                            <thead>
                                <tr>
                                    <th colspan="5">Item Requirments</th>
                                </tr>
                                <tr>
                                    <th width="3%">#</th>
                                    <th width="30%">Size</th>
                                    <th width="30%">Item</th>
                                    <th width="20%">Qty</th>
                                    <th width="17%">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <th scope="row">1</th>
                                    <td>
                                        <select name="size[]" class="item mb-2 form-control-sm form-control search_select" required>
                                            <option></option>
                                            <?php
                                            $conn = db_connection();
                                            $sql = "SELECT * FROM size WHERE status = 1";
                                            $results = mysqli_query($conn, $sql);
                                            while ($result = mysqli_fetch_assoc($results)) {
                                                echo '<option value="' . $result['id'] . '">' . $result['size'] . '</option>';
                                            }
                                            ?>
                                        </select>
                                    </td>
                                    <td>
                                        <select name="item[]" class="item mb-2 form-control-sm form-control search_select" required>
                                            <option></option>
                                            <?php
                                            $conn = db_connection();
                                            $sql = "SELECT * FROM item WHERE status = 1";
                                            $results = mysqli_query($conn, $sql);
                                            while ($result = mysqli_fetch_assoc($results)) {
                                                echo '<option value="' . $result['ItemID'] . '">' . $result['ItemName'] . '</option>';
                                            }
                                            ?>
                                        </select>
                                    </td>
                                    <td>
                                        <input placeholder="Qty" type="number" name="qty[]" class="mb-2 form-control-sm form-control" required>
                                    </td>
                                    <td><a class="deleteRow"></a></td>
                                </tr>

                            </tbody>
                            <tfoot>
                                <tr>
                                    <td colspan="7" class="text-center"><input type="button" class="btn btn-sm btn-success" id="addrow" value="Add Row" /><br></td>
                                </tr>
                                <tr>
                                    <td colspan="7" class="text-right"><span id="grandtotal"></span>

                                    </td>
                                </tr>
                            </tfoot>
                        </table>
                    </div>

                </div>
                <br><br> -->
                <div class="row">
                    <div class="col-md-6"><button class="btn btn-danger mr-auto" id="reset" type="reset">Reset</button></div>
                    <div class="col-md-6 text-right"><button class="btn btn-primary" name="submit" type="submit"><i class="metismenu-state-icon pe-7s-diskette"></i> &nbsp; Save </button></div>
                </div>
            </form>
        </div>
    </div>
</div>




<?php
function customPagefooter()
{
    global $path;
    ?>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.7/js/select2.min.js"></script>

    <script type="text/javascript">
        $('.search_select').select2({
            placeholder: 'Select Your Option'
        });

        $("select").select2();
    </script>

    <script>
        // Image Load
        function readURL(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();

                reader.onload = function(e) {
                    $('#image')
                        .attr('src', e.target.result)
                        .width()
                        .height();
                };

                reader.readAsDataURL(input.files[0]);
            }
        }

        //table Items 
        $(document).ready(function() {
            var counter = 0;
            var limit = 100;

            $("#addrow").on("focus", function() {

                counter = $('#myTable tr').length - 2;

                var newRow = $("<tr>");
                var cols = "";

                cols += '<th scope="row">' + counter + '</th>';
                cols += '<td><select name="size[]" class="item mb-2 form-control-sm form-control search_select" required><option></option>';
                <?php
                    $conn = db_connection();
                    $sql = "SELECT * FROM size WHERE status = 1";
                    $results = mysqli_query($conn, $sql);
                    while ($result = mysqli_fetch_assoc($results)) {
                        echo 'cols += \'<option value="' . $result['id'] . '">' . $result['size'] . '</option>\'; ';
                    }
                    ?>
                cols += '</select></td>';
                cols += '<td><select name="item[]" class="item mb-2 form-control-sm form-control search_select" required><option></option>';
                <?php
                    $conn = db_connection();
                    $sql = "SELECT * FROM item WHERE status = 1";
                    $results = mysqli_query($conn, $sql);
                    while ($result = mysqli_fetch_assoc($results)) {
                        echo 'cols += \'<option value="' . $result['ItemID'] . '">' . $result['ItemName'] . '</option>\'; ';
                    }
                    ?>
                cols += '</select></td>';
                cols += '<td><input type="number" placeholder="Qty" class="mb-2 form-control-sm form-control" name="qty[]" required/></td>';

                cols += '<td><input type="button" class="ibtnDel btn btn-sm btn-warning"  value="Delete"></td>';
                newRow.append(cols);
                if (counter >= limit) $('#addrow').attr('disabled', true).prop('value', "You've reached the limit");
                $("table.order-list").append(newRow);
                counter++;
                setTimeout(function() {
                    $('.search_select').select2();
                }, 100);
            });

            $("table.order-list").on("change", 'input[name^="qty"]', function(event) {
                calculateRow($(this).closest("tr"));
                calculateGrandTotal();
            });


            $("table.order-list").on("click", ".ibtnDel", function(event) {
                $(this).closest("tr").remove();
                calculateGrandTotal();

                counter -= 1
                $('#addrow').attr('disabled', false).prop('value', "Add Row");
            });


        });



        function calculateRow(row) {
            var price = +row.find('input[name^="qty"]').val();

        }

        function calculateGrandTotal() {
            var grandTotal = 0;
            $("table.order-list").find('input[name^="qty"]').each(function() {
                grandTotal += +$(this).val();
            });
            $("#grandtotal").text('Total Qty: ' + grandTotal.toFixed(0));
        }

        $("#reset").on("click", function() {
            $("#grandtotal").text('');
        });


        //table left ends
        //table right
        $(document).ready(function() {
            var counter2 = 0;
            var limit2 = 100;

            $("#addrow2").on("click", function() {

                counter2 = $('#myTable2 tr').length - 2;

                var newRow2 = $("<tr>");
                var cols2 = "";

                cols2 += '<th scope="row">' + counter2 + '</th>';
                cols2 += '<td><input type="text" placeholder="Name" class="mb-2 form-control-sm form-control" name="trim_name[]" required/></td>';
                cols2 += '<td><input type="text" placeholder="Description" class="mb-2 form-control-sm form-control" name="trim_description[]"/></td>';

                cols2 += '<td><input type="button" class="ibtnDel2 btn btn-sm btn-warning"  value="Delete"></td>';
                newRow2.append(cols2);
                if (counter2 >= limit2) $('#addrow2').attr('disabled', true).prop('value', "You've reached the limit");
                $("table.order-list2").append(newRow2);
                counter2++;
            });

            $("table.order-list2").on("click", ".ibtnDel2", function(event) {
                $(this).closest("tr").remove();

                counter2 -= 1
                $('#addrow2').attr('disabled', false).prop('value', "Add Row");
            });



        });

        // table right ends

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