<?php
$conn = db_connection();
$PageTitle = "New B2B LC | Optima Inventory";

function customPageHeader()
{
    ?>
    <!--Arbitrary HTML Tags-->
<?php }
include_once "controller/new_b2b_lc.php";
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
                <div>New B2B LC
                    <div class="page-title-subheading">
                        Please use this form to add a new B2B LC.
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="main-card mb-3 card">
        <div class="card-body">
            <form class="needs-validation" method="post" novalidate>
                <div class="form-row">
                    <div class="col-md-3 mb-3">
                        <label>Master LC Number</label>
                        <select name="masterlcid" class="item mb-2 form-control-sm form-control" required>
                            <option></option>
                            <?php
                            $sql = "SELECT MasterLCID, MasterLCNumber FROM masterlc WHERE status = 1";
                            $results = mysqli_query($conn, $sql);
                            while ($result = mysqli_fetch_assoc($results)) {
                                echo '<option value="' . $result['MasterLCID'] . '">' . $result['MasterLCNumber'] . '</option>';
                            }
                            ?>
                        </select>
                    </div>
                    <div class="col-md-3 mb-3">
                        <label>B2B LC Number</label>
                        <input type="test" name="b2blcnumber" class="form-control form-control-sm" placeholder="B2B LC Number" required>
                    </div>
                    <div class="col-md-3 mb-3">
                        <label>Supplier Name</label>
                        <input type="text" name="suppliername" class="form-control form-control-sm" placeholder="Supplier Name" required>
                    </div>
                    <div class="col-md-3 mb-3">
                      <label>Issue Date</label>
                      <input type="date" name="issuedate" class="form-control form-control-sm" placeholder="Supplier" required>
                    </div>
                    <div class="col-md-3 mb-3">
                        <label>Supplier Contact Person</label>
                        <input type="text" name="contactperson" class="form-control form-control-sm" placeholder="Supplier Contact Person" required>
                    </div>
                    <div class="col-md-3 mb-3">
                        <label>Supplier Contact Number</label>
                        <input type="text" name="contactnumber" class="form-control form-control-sm" placeholder="Supplier Contact Number" required>
                    </div>
                    <div class="col-md-3 mb-3">
                        <label>Supplier Address</label>
                        <textarea name="address" class="form-control form-control-sm" placeholder="Supplier Address" required></textarea>
                    </div>
                    <div class="col-md-3 mb-3">
                        <label>Maturity Date</label>
                        <input type="date" name="maturitydate" class="form-control form-control-sm" placeholder="Supplier" required>
                    </div>
                </div>
                <div class="form-row">
                    <table class="mb-0 table table-bordered order-list">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Item</th>
                                <th>Style</th>
                                <th>PO</th>
                                <th>Qty</th>
                                <th>Price Per Unit</th>
                                <th>Total Price</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <th scope="row">1</th>
                                <td>
                                    <select class="form-control form-control-sm" name="item[]" required>
                                        <option></option>
                                        <?php
                                        foreach ($itemArr as $key) {
                                            echo '<option value="' . $key['ItemID'] . '">' . $key['ItemName'] . '</option>';
                                        }
                                        ?>
                                    </select>
                                </td>
                                <td>
                                    <select class="form-control form-control-sm" name="style[]" required>
                                        <option></option>
                                        <?php
                                        foreach ($styleArr as $key) {
                                            echo '<option value="' . $key['StyleID'] . '">' . $key['StyleNumber'] . '</option>';
                                        }
                                        ?>
                                    </select>
                                </td>
                                <td>
                                    <select class="form-control form-control-sm" name="po[]" required>
                                        <option></option>
                                        <?php
                                        foreach ($poArr as $key) {
                                            echo '<option value="' . $key['POID'] . '">' . $key['PONumber'] . '</option>';
                                        }
                                        ?>
                                    </select>
                                </td>
                                <td>
                                    <input placeholder="Qty" name="qty[]" type="number" class="mb-2 form-control-sm form-control" required>
                                </td>
                                <td>
                                    <input placeholder="Price Per Unit" name="ppu[]" type="number" class="mb-2 form-control-sm form-control" required>
                                </td>
                                <td>
                                    <input placeholder="Total Price" name="tp[]" type="number" class="mb-2 form-control-sm form-control" required>
                                </td>
                                <td><a class="deleteRow"></a></td>
                            </tr>

                        </tbody>
                        <tfoot>
                            <tr>
                                <td colspan="8" class="text-center"><input type="button" class="btn btn-sm btn-success" id="addrow" value="Add Row" /><br></td>
                            </tr>
                        </tfoot>
                    </table>
                </div>
                <br><br>
                <div class="container">
                    <div class="row">
                        <div class="col-md-12 text-right">
                            <button class="btn btn-primary" type="submit">Save</button>
                        </div>
                    </div>
                </div>

            </form>
        </div>
    </div>
</div>




<?php
function customPagefooter()
{
    global $styleArr;
    global $itemArr;
    global $poArr;
    ?>
    <script>
        // Add new row code

        $(document).ready(function() {
            var counter = 2;

            $("#addrow").on("click", function() {
                var newRow = $("<tr>");
                var cols = "";

                cols += '<th scope="row">' + counter + '</th>';
                cols += '<td><select class="form-control form-control-sm" name="item[]" required> <option></option>  <?php foreach ($itemArr as $key) { echo '<option value="' . $key['ItemID'] . '">' . $key['ItemName'] . '</option>'; } ?></select></td>';
                cols += '<td><select class="form-control form-control-sm" name="style[]" required> <option></option> <?php foreach ($styleArr as $key) { echo '<option value="' . $key['StyleID'] . '">' . $key['StyleNumber'] . '</option>'; } ?> </select></td>';
                cols += '<td><select class="form-control form-control-sm" name="po[]" required> <option></option>  <?php foreach ($poArr as $key) { echo '<option value="' . $key['POID'] . '">' . $key['PONumber'] . '</option>';  }  ?> </select></td>';
                cols += '<td><input placeholder="Qty" name="qty[]" type="number" class="mb-2 form-control-sm form-control" required></td>';
                cols += '<td><input placeholder="Price Per Unit" name="ppu[]" type="number" class="mb-2 form-control-sm form-control" required></td>';
                cols += '<td><input placeholder="Total Price" name="tp[]" type="number" class="mb-2 form-control-sm form-control" required></td>';


                cols += '<td><input type="button" class="ibtnDel btn btn-sm btn-danger "  value="Delete"></td>';
                newRow.append(cols);
                $("table.order-list").append(newRow);
                counter++;
            });



            $("table.order-list").on("click", ".ibtnDel", function(event) {
                $(this).closest("tr").remove();
                counter -= 1
            });


        });



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
