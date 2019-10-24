<?php

$PageTitle = "New PI | Optima Inventory";
function customPageHeader()
{
    ?>
    <!--Arbitrary HTML Tags-->
<?php }
$conn = db_connection();
if (isset($_GET['id'])) {
    $id = $_GET['id'];

    $sql = "SELECT * FROM pi where PIID='$id' and Status=1";
    $single_pi = mysqli_fetch_assoc(mysqli_query($conn, $sql));
} else {
    nowgo('/index.php?page=all_pi');
}
include_once "controller/pi_update.php";
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
                <div>New PI
                    <div class="page-title-subheading">
                        Please use this form to add a new PI.
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="main-card mb-3 card">
        <div class="card-body">
            <!-- <h5 class="card-title">PO</h5> -->
            <form class="needs-validation" method="POST" novalidate>
                <div class="form-row">
                    <div class="col-md-4 mb-3">
                        <label for="validationTooltip01">REF NO</label>
                        <input type="text" class="form-control" value="<?= $single_pi['RefNo'] ?>" name="refno" id="validationTooltip01" placeholder="REF NO" required>
                    </div>
                    <div class="col-md-4 mb-3">
                        <label for="validationTooltip02">Issue Date</label>
                        <input type="date" class="form-control" value="<?= $single_pi['IssueDate'] ?>" name="date" id="validationTooltip02" placeholder="Issue Date" required>
                    </div>
                    <div class="col-md-4 mb-3">
                        <label for="validationTooltipUsername">Supplier</label>
                        <input type="text" class="form-control" value="<?= $single_pi['SupplierName'] ?>" name="supplier" id="validationTooltipUsername" placeholder="Supplier" aria-describedby="validationTooltipUsernamePrepend" required>
                    </div>
                </div>
                <div class="form-row">
                    <table class="mb-0 table table-bordered order-list" id="myTable">
                        <thead>
                            <tr>
                                <th width="5%">#</th>
                                <th width="10%">PO No</th>
                                <th width="10%">Item</th>
                                <th width="30%">Description</th>
                                <th width="10%">Qty</th>
                                <th width="10%">Price Per Unit</th>
                                <th width="10%">Total Price</th>
                                <th width="15%"></th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $sql = "SELECT * FROM pi_description where PIID=$id and Status=1";
                            $all = mysqli_query($conn, $sql);
                            $counts = 1;
                            while ($row = mysqli_fetch_assoc($all)) {

                                ?>
                                <tr>
                                    <th scope="row"><?= $counts++ ?></th>
                                    <td>
                                        <select name="po[]" class="po mb-2 form-control-sm form-control" required>
                                            <?php

                                                $sql = "SELECT * FROM po WHERE status = 1";
                                                $results = mysqli_query($conn, $sql);
                                                while ($result = mysqli_fetch_assoc($results)) {
                                                    if ($row['POID'] == $result['POID']) {
                                                        $selected = 'selected';
                                                    }
                                                    echo '<option  selected=".$selected."  value="' . $result['POID'] . '">' . $result['PONumber'] . '</option>';
                                                }
                                                ?>
                                        </select>

                                    </td>
                                    <td>
                                        <select name="item[]" class="item mb-2 form-control-sm form-control" required>
                                            <?php

                                                $sql = "SELECT * FROM item WHERE status = 1";
                                                $results = mysqli_query($conn, $sql);
                                                while ($result = mysqli_fetch_assoc($results)) {
                                                    if ($row['ItemID'] == $result['ItemID']) {
                                                        $selected = 'selected';
                                                    }
                                                    echo '<option  selected=".$selected."  value="' . $result['ItemID'] . '">' . $result['ItemName'] . '</option>';
                                                }
                                                ?>
                                        </select>

                                    </td>
                                    <td>
                                        <textarea placeholder="Description" name="description" type="text"  class="mb-2 form-control-sm form-control"><?= $row['Description']?></textarea>
                                    </td>
                                    <td>
                                        <input placeholder="Qty" id="qty" value="<?= $row['Qty']?>" name="qty" type="text" class="mb-2 form-control-sm form-control">
                                    </td>
                                    <td>
                                        <input placeholder="Price Per Unit" id="ppu" name="ppu" value="<?= $row['PricePerUnit']?>" type="text" class="mb-2 form-control-sm form-control">
                                    </td>
                                    <td>
                                        <input placeholder="Total Price" id="totalprice" name="totalprice" value="<?= $row['TotalPrice']?>" type="text" class="mb-2 form-control-sm form-control">
                                    </td>
                                    <td><a class="deleteRow"></a></td>
                                </tr>
                            <?php } ?>

                        </tbody>
                       
                    </table>
                </div>
                <br><br>
                <div class="container">
                    <div class="row">
                        <div class="col-md-12 text-center">
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
    ?>
    <script>
        // Add new row code

        $(document).ready(function() {
            var counter = 0;
            var limit = 100;

            $("#addrow").on("click", function() {

                counter = $('#myTable tr').length - 1;

                var newRow = $("<tr>");
                var cols = "";

                cols += '<th>' + counter + '</th>';

                cols += '<td><select name="po[]" class="po mb-2 form-control-sm form-control" required><option></option>';
                <?php
                    $conn = db_connection();
                    $sql = "SELECT * FROM po WHERE status = 1";
                    $results = mysqli_query($conn, $sql);
                    while ($result = mysqli_fetch_assoc($results)) {
                        echo 'cols += \'<option value="' . $result['POID'] . '">' . $result['PONumber'] . '</option>\'; ';
                    }
                    ?>
                cols += '</select></td>';
                cols += '<td><select name="item[]" class="item mb-2 form-control-sm form-control" required><option></option>';
                <?php
                    $conn = db_connection();
                    $sql = "SELECT * FROM item WHERE status = 1";
                    $results = mysqli_query($conn, $sql);
                    while ($result = mysqli_fetch_assoc($results)) {
                        echo 'cols += \'<option value="' . $result['ItemID'] . '">' . $result['ItemName'] . '</option>\'; ';
                    }
                    ?>
                cols += '</select></td>';
                cols += '<td><textarea placeholder="Description" name="description' + counter + '" type="text" class="mb-2 form-control-sm form-control"></textarea></td>';
                cols += '<td><input placeholder="Qty" name="qty' + counter + '" type="text" class="mb-2 form-control-sm form-control"></td>';
                cols += '<td><input placeholder="Price Per Unit" name="ppu' + counter + '" type="text" class="mb-2 form-control-sm form-control"></td>';
                cols += '<td><input placeholder="Total Price" name="totalprice' + counter + '" type="text" class="mb-2 form-control-sm form-control"></td>';

                cols += '<td><input type="button" class="ibtnDel btn btn-danger"  value="Delete"></td>';
                newRow.append(cols);
                if (counter >= limit) $('#addrow').attr('disabled', true).prop('value', "You've reached the limit");
                $("table.order-list").append(newRow);
                counter++;
            });

            $("table.order-list").on("change", 'input[name^="price"]', function(event) {
                calculateRow($(this).closest("tr"));
                calculateGrandTotal();
            });


            $("table.order-list").on("click", ".ibtnDel", function(event) {
                $(this).closest("tr").remove();
                calculateGrandTotal();

                counter -= 1
                $('#addrow').attr('disabled', false).prop('value', "Add Row");
            });

            var theResult = $("#qty").value + $("#ppu").value;
            $('#totalprice').text(theResult);


        });



        function calculateRow(row) {
            var price = +row.find('input[name^="price"]').val();

        }

        function calculateGrandTotal() {
            var grandTotal = 0;
            $("table.order-list").find('input[name^="price"]').each(function() {
                grandTotal += +$(this).val();
            });
            $("#grandtotal").text(grandTotal.toFixed(2));
        }


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