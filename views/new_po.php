<?php

$PageTitle = "New PO Received | Optima Inventory";
function customPageHeader()
{
    ?>
    <!--Arbitrary HTML Tags-->
<?php }
include_once "controller/add_po.php";
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
                <div>New PO
                    <div class="page-title-subheading">
                        Please use this form to add a new PO.
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="main-card mb-3 card">
        <div class="card-body">
            <form class="needs-validation" method="POST" novalidate>
                <div class="form-row">
                    <div class="col-md-3 mb-3">
                        <label>From</label>
                        <input type="text" name="from" class="form-control" placeholder="From" required>
                    </div>
                    <div class="col-md-3 mb-3">
                        <label>Date</label>
                        <input type="date" name="date" class="form-control" required>
                    </div>
                    <div class="col-md-3 mb-3">
                        <label>PO Number</label>
                        <input type="text" name="po_number" class="form-control" placeholder="PO Number" required>
                        <div class="invalid-tooltip">
                            Please provide a PO Number.
                        </div>
                    </div>
                    <div class="col-md-3 mb-3">
                        <label>Currency</label>
                        <input type="text" name="currency" class="form-control" placeholder="Currency" required>
                    </div>
                </div>
                <div class="form-row">
                    <div class="col-md-3 mb-3">
                        <label>CMP</label>
                        <input type="number" name="cmp" class="form-control" placeholder="CMP" required>
                    </div>
                    <div class="col-md-3 mb-3">
                        <label>Wash Cost</label>
                        <input type="number" name="wash_cost" class="form-control" placeholder="Wash Cost" required>
                    </div>
                    <div class="col-md-3 mb-3">
                        <label>Hanger Cost</label>
                        <input type="number" name="hanger_cost" class="form-control" placeholder="Hanger Cost" required>
                    </div>
                    <div class="col-md-3 mb-3">
                        <label>CMP+W+Hanger</label>
                        <input type="number" name="cmp_w_wanger" class="form-control" placeholder="CMP+W+Hanger" required>
                    </div>
                </div>
                <div class="form-row">
                    <div class="col-md-3 mb-3">
                        <label>Final Destination</label>
                        <input type="Text" name="final_destination" class="form-control" placeholder="Final Destination" required>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label>Special Instruction</label>
                        <textarea type="number" name="special_instruction" class="form-control" placeholder="Special Instruction" required></textarea>
                    </div>
                    <div class="col-md-3 mb-3">
                        <label>Division</label>
                        <input type="Text" name="division" class="form-control" placeholder="Division" required>
                    </div>
                </div>
                <div class="form-row">
                    <div class="col-md-12">
                        <!-- top Table -->
                        <table class="mb-0 table table-bordered order-list1" id="myTable1" width="100%">
                            <thead>
                                <tr>
                                    <th colspan="8">Order Description</th>
                                </tr>
                                <tr>
                                    <th width="3%">#</th>
                                    <th width="20%">Style</th>
                                    <th width="20%">Color</th>
                                    <th width="15%">CLR No</th>
                                    <th width="7%">DZS</th>
                                    <th width="8%">P/Pack</th>
                                    <th width="10%">Units</th>
                                    <th width="17%">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <th scope="row">1</th>
                                    <td>
                                        <select name="style[]" class="style mb-2 form-control-sm form-control" required>
                                            <option></option>
                                            <?php
                                            $conn = db_connection();
                                            $sql = "SELECT * FROM style WHERE status = 1";
                                            $results = mysqli_query($conn, $sql);
                                            while ($result = mysqli_fetch_assoc($results)) {
                                                echo '<option value="' . $result['StyleID'] . '">' . $result['StyleNumber'] . '</option>';
                                            }
                                            ?>
                                        </select>
                                    </td>
                                    <td>
                                        <input placeholder="Color" type="text" name="color[]" class="mb-2 form-control-sm form-control" required>
                                    </td>
                                    <td>
                                        <input placeholder="CLR No" type="text" name="clr_no[]" class="mb-2 form-control-sm form-control" required>
                                    </td>
                                    <td>
                                        <input placeholder="DZS" type="number" name="dzs[]" class="mb-2 form-control-sm form-control">
                                    </td>
                                    <td>
                                        <input placeholder="P/Pack" type="number" name="ppack[]" class="mb-2 form-control-sm form-control">
                                    </td>
                                    <td>
                                        <input placeholder="Units" type="number" name="units[]" class="mb-2 form-control-sm form-control">
                                    </td>
                                    <td><a class="deleteRow"></a></td>
                                </tr>

                            </tbody>
                            <tfoot>
                                <tr>
                                    <td colspan="8" class="text-center"><input type="button" class="btn btn-sm btn-success" id="addrow1" value="Add Row" /><br></td>
                                </tr>
                                <tr>
                                    <td colspan="4" class="text-right">Total

                                    </td>
                                    <td class="text-center"><span id="totalDZS"></span>

                                    </td>
                                    <td class="text-center"><span id="totalPpack"></span>

                                    </td>
                                    <td class="text-center"><span id="totalUnits"></span>

                                    </td>
                                    <td class="text-right"></span>

                                    </td>
                                </tr>
                            </tfoot>
                        </table>
                    </div>
                </div>
                <br>
                <div class="form-row">
                    <div class="col-md-12">
                        <!-- bottom Table -->
                        <table class="mb-0 table table-bordered order-list" id="myTable" width="100%">
                            <thead>
                                <tr>
                                    <th colspan="5">PRE-PACK ASSORT.</th>
                                </tr>
                                <tr>
                                    <th width="3%">#</th>
                                    <th width="30%">Size</th>
                                    <th width="30%">PrePack Code</th>
                                    <th width="20%">Qty</th>
                                    <th width="17%">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <th scope="row">1</th>
                                    <td>
                                        <input placeholder="Size" type="text" name="size[]" class="mb-2 form-control-sm form-control" required>
                                    </td>
                                    <td>
                                        <input placeholder="PrePack Code" type="text" name="ppk[]" class="mb-2 form-control-sm form-control" required>
                                    </td>
                                    <td>
                                        <input placeholder="Qty" type="number" name="qty[]" class="mb-2 form-control-sm form-control">
                                    </td>
                                    <td><a class="deleteRow"></a></td>
                                </tr>

                            </tbody>
                            <tfoot>
                                <tr>
                                    <td colspan="5" class="text-center"><input type="button" class="btn btn-sm btn-success" id="addrow" value="Add Row" /><br></td>
                                </tr>
                                <tr>
                                    <td colspan="5" class="text-right"><span id="grandtotal"></span>

                                    </td>
                                </tr>
                            </tfoot>
                        </table>
                    </div>
                </div>
                <br><br>
                <div class="text-center">
                    <button class="btn btn-primary" type="submit">Save New PO</button>
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
        //table top 
        $(document).ready(function() {
            var counter1 = 0;
            var limit1 = 100;

            $("#addrow1").on("click", function() {
                //alert('clicked');

                counter1 = $('#myTable1 tr').length - 3;
                console.log(counter1);

                var newRow1 = $("<tr>");
                var cols1 = "";

                cols1 += '<th scope="row">' + counter1 + '</th>';
                cols1 += '<td><select name="style[]" class="style mb-2 form-control-sm form-control" required><option></option>';
                <?php
                    $conn = db_connection();
                    $sql = "SELECT * FROM style WHERE status = 1";
                    $results = mysqli_query($conn, $sql);
                    while ($result = mysqli_fetch_assoc($results)) {
                        echo 'cols1 += \'<option value="' . $result['StyleID'] . '">' . $result['StyleNumber'] . '</option>\'; ';
                    }
                    ?>
                cols1 += '</select></td>';
                cols1 += '<td><input type="text" placeholder="Color" class="mb-2 form-control-sm form-control" name="color[]" required/></td>';
                cols1 += '<td><input type="text" placeholder="CLR No" class="mb-2 form-control-sm form-control" name="clrno[]" required/></td>';
                cols1 += '<td><input type="number" placeholder="DZS" class="mb-2 form-control-sm form-control" name="dzs[]"/></td>';
                cols1 += '<td><input type="number" placeholder="P/Pack" class="mb-2 form-control-sm form-control" name="ppack[]"/></td>';
                cols1 += '<td><input type="number" placeholder="Units" class="mb-2 form-control-sm form-control" name="units[]"/></td>';

                cols1 += '<td><input type="button" class="ibtnDel1 btn btn-sm btn-warning"  value="Delete"></td>';
                newRow1.append(cols1);
                if (counter1 >= limit1) $('#addrow1').attr('disabled', true).prop('value', "You've reached the limit");
                $("table.order-list1").append(newRow1);
                counter1++;
            });

            $("table.order-list1").on("change", 'input[name^="dzs"]', function(event) {
                calculateDZSTotal();
            });
            $("table.order-list1").on("change", 'input[name^="ppack"]', function(event) {
                calculatePPackTotal();
            });
            $("table.order-list1").on("change", 'input[name^="units"]', function(event) {
                calculateUnitsTotal();
            });


            $("table.order-list1").on("click", ".ibtnDel1", function(event) {
                $(this).closest("tr").remove();
                calculateDZSTotal();
                calculatePPackTotal();
                calculateUnitsTotal();

                counter1 -= 1
                $('#addrow1').attr('disabled', false).prop('value', "Add Row");
            });


        });


        function calculateDZSTotal() {
            var grandDZS = 0;
            $("table.order-list1").find('input[name^="dzs"]').each(function() {
                grandDZS += +$(this).val();
            });
            $("#totalDZS").text(grandDZS.toFixed(0));
        }

        function calculatePPackTotal() {
            var grandPPack = 0;
            $("table.order-list1").find('input[name^="ppack"]').each(function() {
                grandPPack += +$(this).val();
            });
            $("#totalPpack").text(grandPPack.toFixed(0));
        }

        function calculateUnitsTotal() {
            var grandUnits = 0;
            $("table.order-list1").find('input[name^="units"]').each(function() {
                grandUnits += +$(this).val();
            });
            $("#totalUnits").text(grandUnits.toFixed(0));
        }


        //table bottom 
        $(document).ready(function() {
            var counter = 0;
            var limit = 100;

            $("#addrow").on("click", function() {

                counter = $('#myTable tr').length - 3;

                var newRow = $("<tr>");
                var cols = "";

                cols += '<th scope="row">' + counter + '</th>';
                cols += '<td><input type="text" placeholder="Size" class="mb-2 form-control-sm form-control" name="size' + counter + '" required/></td>';
                cols += '<td><input type="text" placeholder="PrePack Code" class="mb-2 form-control-sm form-control" name="color' + counter + '" required/></td>';
                cols += '<td><input type="number" placeholder="Qty" class="mb-2 form-control-sm form-control" name="qty' + counter + '"/></td>';

                cols += '<td><input type="button" class="ibtnDel btn btn-sm btn-warning"  value="Delete"></td>';
                newRow.append(cols);
                if (counter >= limit) $('#addrow').attr('disabled', true).prop('value', "You've reached the limit");
                $("table.order-list").append(newRow);
                counter++;
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