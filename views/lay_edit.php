<?php

$PageTitle = "Lay Form | Optima Inventory";
function customPageHeader()
{
    ?>
    <!--Arbitrary HTML Tags-->
<?php }
$conn = db_connection();
if (isset($_GET['layid']) && $_GET['layid'] !='') {
    $layid = $_GET['layid'];
    $sql = "SELECT * FROM lay_form f LEFT JOIN buyer b on b.BuyerID=f.BuyerID LEFT JOIN style s on s.StyleID=f.StyleID LEFT JOIN po p ON p.POID=f.POID WHERE f.Status = 1 and LayFormID=".$layid;
    $single_lay = mysqli_fetch_assoc(mysqli_query($conn, $sql));
}
include_once "controller/update_lay_form.php";
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
                <div>Lay Form
                    <div class="page-title-subheading">
                        Please use this form to add a new Lay.
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
                    <div class="col-md-3 mb-3">
                        <label for="validationTooltip01">Buyer Name</label>
                        <select name="buyer"  class="buyer  form-control" required>
                            <option></option>
                            <?php
                            $conn = db_connection();
                            $sql = "SELECT * FROM buyer WHERE status = 1";
                            $results = mysqli_query($conn, $sql);
                            while ($result = mysqli_fetch_assoc($results)) {
                                if ($result['BuyerID']==$single_lay['BuyerID']) {
                                    echo '<option selected value="' . $result['BuyerID'] . '">' . $result['BuyerName'] . '</option>';
                                }
                                echo '<option value="' . $result['BuyerID'] . '">' . $result['BuyerName'] . '</option>';
                                
                            }
                            ?>
                        </select>
                    </div>
                    <div class="col-md-3 mb-3">
                        <label for="validationTooltip02">Style No</label>
                        <select name="style" class="style  form-control" required>
                            <option></option>
                            <?php
                            $conn = db_connection();
                            $sql = "SELECT * FROM style WHERE status = 1";
                            $results = mysqli_query($conn, $sql);
                            while ($result = mysqli_fetch_assoc($results)) {
                                if ($result['StyleID']==$single_lay['StyleID']) {
                                    echo '<option selected  value="' . $result['StyleID'] . '">' . $result['StyleNumber'] . '</option>';
                                }
                                else
                                     echo '<option  value="' . $result['StyleID'] . '">' . $result['StyleNumber'] . '</option>';
                                
                            }
                            ?>
                        </select>
                    </div>
                    <div class="col-md-3 mb-3">
                        <label for="validationTooltipUsername">P.O. No</label>
                        <select name="po" class="po  form-control" required>
                            <option></option>
                            <?php
                            $conn = db_connection();
                            $sql = "SELECT * FROM po WHERE status = 1";
                            $results = mysqli_query($conn, $sql);
                            while ($result = mysqli_fetch_assoc($results)) {
                                if ($result['POID']==$single_lay['POID']) {
                                    echo '<option selected  value="' . $result['POID'] . '">' . $result['PONumber'] . '</option>';
                                }
                                echo '<option value="' . $result['POID'] . '">' . $result['PONumber'] . '</option>';
                            }
                            ?>
                        </select>
                    </div>
                    <div class="col-md-3 mb-3">
                        <label for="validationTooltipUsername">Cutting No</label>
                        <input type="text" class="form-control" value="<?= $single_lay['CuttingNo']?>" name="cutting_no" id="validationTooltipUsername" placeholder="Cutting No" required>
                    </div>
                </div>
                <div class="form-row">
                    <div class="col-md-3 mb-3">
                        <label for="validationTooltip01">Unit</label>
                        <input type="text"  value="<?= $single_lay['Unit']?>" class="form-control" name="unit" id="validationTooltip01" placeholder="Unit" required>
                    </div>
                    <div class="col-md-3 mb-3">
                        <label for="validationTooltip02">Date</label>
                        <input type="date"  value="<?= $single_lay['Date']?>" class="form-control" name="date" id="validationTooltip02" placeholder="Date" required>
                    </div>
                    <div class="col-md-2 mb-3">
                        <label for="validationTooltipUsername">Item</label>
                        <select name="item" class="item  form-control" required>
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
                    </div>
                    <div class="col-md-2 mb-3">
                        <label for="validationTooltipUsername">M/W</label>
                        <input type="text" value="<?= $single_lay['MarkerWidth']?>" class="form-control" id="validationTooltipUsername" name="mw" placeholder="M/W" required>
                    </div>
                    <div class="col-md-2 mb-3">
                        <label for="validationTooltipUsername">Marker Length</label>
                        <input type="text" name="marker_length" value="<?= $single_lay['MarkerLength']?>" class="form-control" id="validationTooltipUsername" placeholder="Marker Length" required>
                    </div>
                </div>
                <style>
                    #myTable {
                        font-size: 12px;
                        width: 100%;

                    }

                    #myTable tr,
                    th,
                    td {
                        border: 1px solid black;
                        max-width: 60px;
                    }

                    #myTable input,
                    textarea {
                        border: none;
                        padding: 2px;
                        width: 100%;
                    }

                    #addrow {
                        width: 80px !important;
                        margin: 10px;
                    }
                </style>
                <div class="row">
                    <div class="col-md-12" style="overflow-x: auto;">
                        <table class="order-list" id="myTable" width="100%">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Color</th>
                                    <th>Lot No</th>
                                    <th>Sl. NO</th>
                                    <th>Roll No</th>
                                    <th>TTL Fabrics/yds</th>
                                    <th>Lay</th>
                                    <th>Used Fabrics/yds</th>
                                    <th>Remaining</th>
                                    <th>Exxess/Short</th>
                                    <th>Sticker</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php 
                                    $sql = "SELECT * FROM lay_form_details where layFormID=$layid";
                                     $prepack = mysqli_query($conn, $sql);
                                     $count = 1;
                                while ($row = mysqli_fetch_assoc($prepack)) {

                                ?>
                                <tr>
                                    <th scope="row"><?= $count++ ?></th>
                                    <td>
                                        <select name="color" class="color  form-control" required>
                                            <option></option>
                                            <?php
                                            $conn = db_connection();
                                            $sql = "SELECT * FROM color WHERE status = 1";
                                            $results = mysqli_query($conn, $sql);
                                            while ($result = mysqli_fetch_assoc($results)) {
                                                if ($row['Color']==$result['id']) {
                                                    echo '<option selected value="' . $result['id'] . '">' . $result['color'] . '</option>';
                                                
                                                }
                                                else{
                                                    echo '<option value="' . $result['id'] . '">' . $result['color'] . '</option>';

                                                }
                                            }
                                            ?>
                                        </select>
                                    </td>
                                    <td>
                                        <input placeholder="Lot No" value="<?= $row['LotNo'] ?>" type="text" name="lotno">
                                    </td>
                                    <td>
                                        <input placeholder="Sl. No" type="text" value="<?= $row['SlNo'] ?>" name="slno">
                                    </td>
                                    <td>
                                        <input placeholder="Roll No" value="<?= $row['RollNo'] ?>" name="rollno" type="text">
                                    </td>
                                    <td>
                                        <input placeholder="TTL Fabrics/yds" value="<?= $row['TTLFabricsYds'] ?>" name="ttlfab" type="text">
                                    </td>
                                    <td>
                                        <input placeholder="Lay" value="<?= $row['Lay'] ?>" name="lay" type="text">
                                    </td>
                                    <td>
                                        <input placeholder="Used Fabrics/yds" value="<?= $row['UsedFabricYds'] ?>" name="usedfab" type="text">
                                    </td>
                                    <td>
                                        <input placeholder="Remaining" value="<?= $row['RemainingYds'] ?>" name="ramaining" type="text">
                                    </td>
                                    <td>
                                        <input placeholder="Exxess/Short" value="<?= $row['Shortage'] ?>" name="exsshort" type="text">
                                    </td>
                                    <td>
                                        <input placeholder="Sticker" value="<?= $row['Sticker'] ?>" name="sticker" type="text">
                                    </td>
                                    <td><a class="deleteRow"></a></td>
                                </tr>
                            <?php } ?>

                            </tbody>
                            <tfoot>
                                <tr>
                                    <td><br></td>
                                </tr>
                                <tr>
                                    <td></td>
                                    <th>Special Action: </th>
                                    <td colspan="12">
                                        <textarea name="specialaction" placeholder="Type Here . . ." id="" rows="3"><?=strip_tags(nl2br($single_lay['SpecialAction']))?></textarea>
                                    </td>
                                </tr>
                            </tfoot>
                        </table>
                    </div>
                </div>
                <br><br>
                <div class="container">
                    <div class="row">
                        <div class="col-md-12 text-center">
                            <button class="btn btn-primary" type="submit">Update</button>
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

                counter = $('#myTable tr').length - 2;

                var newRow = $("<tr>");
                var cols = "";

                cols += '<th>' + counter + '</th>';
                cols += '<td><select name="color[]" class="color mb-2 form-control-sm form-control" required><option></option>';
                <?php
                    $conn = db_connection();
                    $sql = "SELECT * FROM color WHERE status = 1";
                    $results = mysqli_query($conn, $sql);
                    while ($result = mysqli_fetch_assoc($results)) {
                        echo 'cols += \'<option value="' . $result['id'] . '">' . $result['color'] . '</option>\'; ';
                    }
                    ?>
                cols += '</select></td>';
                cols += '<td><input placeholder="Lot No" type="text" name="lotno[]"></td>';
                cols += '<td><input placeholder="Sl. No" type="text" name="slno[]"></td>';
                cols += '<td><input placeholder="Roll No" name="rollno[]" type="text"></td>';
                cols += '<td><input placeholder="TTL Fabrics/yds" name="ttlfab[]" type="text"></td>';
                cols += '<td><input placeholder="Lay" name="lay[]" type="text"></td>';
                cols += '<td><input placeholder="Used Fabrics/yds" name="usedfab[]" type="text"></td>';
                cols += '<td><input placeholder="Remaining" name="ramaining[]" type="text"></td>';
                cols += '<td><input placeholder="Exxess/Short" name="exsshort[]" type="text"></td>';
                cols += '<td><input placeholder="Sticker" name="sticker[]" type="text"></td>';

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