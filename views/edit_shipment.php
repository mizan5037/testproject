<?php

$PageTitle = "Shipment Form | Optima Inventory";
function customPageHeader()
{
    ?>
    <!--Arbitrary HTML Tags-->
<?php }
$conn = db_connection();
if (isset($_GET['id'])) {
    $id = $_GET['id'];

    $sql = "SELECT * FROM shipment_form where ShipmentFormID='$id'";
    $singple_shipment = mysqli_fetch_assoc(mysqli_query($conn, $sql));
} else {
    nowgo('/index.php?page=all_po');
}
include_once "controller/update_shipment_form.php";
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
                <div>Shipment Form
                    <div class="page-title-subheading">
                        Please use this form to Register Items
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
                        <label for="validationTooltip01">Date</label>
                        <input type="date" name="date" value="<?= $singple_shipment['date'] ?>"  class="form-control" id="validationTooltip01" placeholder="Style" required>
                    </div>
                </div>
                <div class="form-row">
                    <table class="mb-0 table table-bordered order-list" id="myTable">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>PO</th>
                                <th>Style</th>
                                <th>Color</th>
                                <th>Shipment</th>
                                <th>Sample</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <th scope="row">1</th>
                                <td>
                                <select name="po" class="po  form-control" required>
                                        <option></option>
                                        <?php
                                        $conn = db_connection();
                                        $sql = "SELECT * FROM po WHERE status = 1";
                                        $results = mysqli_query($conn, $sql);
                                        while ($result = mysqli_fetch_assoc($results)) {
                                            if ($result['POID']==$singple_shipment['POID']) {
                                                $selected = 'selected';
                                            }
                                            echo '<option selected=".$selected." value="' . $result['POID'] . '">' . $result['PONumber'] . '</option>';
                                        }
                                        ?>
                                    </select>
                                </td>
                                <td>
                                <select name="style" class="style  form-control" required>
                                        <option></option>
                                        <?php
                                        $conn = db_connection();
                                        $sql = "SELECT * FROM style WHERE status = 1";
                                        $results = mysqli_query($conn, $sql);
                                        while ($result = mysqli_fetch_assoc($results)) {
                                            if ($result['StyleID']==$singple_shipment['StyleID']) {
                                                $selected = 'selected';
                                            }
                                            echo '<option selected=".$selected." value="' . $result['StyleID'] . '">' . $result['StyleNumber'] . '</option>';
                                        }
                                        ?>
                                    </select>
                                </td>
                                <td>
                                <select name="color" class="color  form-control" required>
                                        <option></option>
                                        <?php
                                        $conn = db_connection();
                                        $sql = "SELECT * FROM color WHERE status = 1";
                                        $results = mysqli_query($conn, $sql);
                                        while ($result = mysqli_fetch_assoc($results)) {
                                            if ($result['id']==$singple_shipment['Color']) {
                                                $selected = 'selected';
                                            }
                                            echo '<option selected=".$selected." value="' . $result['id'] . '">' . $result['color'] . '</option>';
                                        }
                                        ?>
                                    </select>
                                </td>
                                <td>
                                    <input placeholder="Shipment" value="<?= $singple_shipment['Shipment'] ?>" type="text" name="receivefab" class="mb-2 form-control-sm form-control">
                                </td>
                                <td>
                                    <input placeholder="Sample" value="<?= $singple_shipment['Sample'] ?>" type="text" name="receiveroll" class="mb-2 form-control-sm form-control">
                                </td>
                                <td></td>
                            </tr>
                        </tbody>
                        
                    </table>
                </div>
                <br><br>
                <div class="container">
                    <div class="row">
                        <div class="col-md-12 text-right">
                            <button class="btn btn-primary" type="submit">UPDATE</button>
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
        $(document).ready(function() {
            var counter = 0;
            var limit = 100;

          

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