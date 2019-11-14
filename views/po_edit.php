<?php
$PageTitle = " PO EDIT | Optima Inventory";
function customPageHeader()
{
    ?>
    <!--Arbitrary HTML Tags-->
<?php }
$conn = db_connection();
if (isset($_GET['id'])) {
    $id = $_GET['id'];

    $sql = "SELECT * FROM po where POID='$id'";
    $single_po = mysqli_fetch_assoc(mysqli_query($conn, $sql));
} else {
    nowgo('/index.php?page=all_po');
}
include_once "controller/po_update.php";
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
                <div>New PO Received
                    <div class="page-title-subheading">
                        Please use this form to add a new PO.
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="main-card mb-3 card">
        <div class="card-body">
            <h5 class="card-title">PO</h5>
            <form class="needs-validation" method="POST" novalidate>
                <div class="form-row">
                    <div class="col-md-3 mb-3">
                        <label >From</label>
                        <input type="text" name="from" value="<?= $single_po['POFrom'] ?>" class="form-control" id="validationTooltip01" placeholder="From" required>
                    </div>
                    <div class="col-md-3 mb-3">
                        <label >Date</label>
                        <input type="date" name="date" value="<?= $single_po['PODate'] ?>" class="form-control" id="validationTooltip01" required>
                    </div>
                    <div class="col-md-3 mb-3">
                        <label >PO Number</label>
                        <input type="text" name="po_number" value="<?= $single_po['PONumber'] ?>" class="form-control"  placeholder="PO Number" required>
                        <div class="invalid-tooltip">
                            Please provide a PO Number.
                        </div>
                    </div>
                    <div class="col-md-3 mb-3">
                        <label >Currency</label>
                        <input type="text" name="currency" value="<?= $single_po['POCurrency'] ?>" class="form-control"  placeholder="Currency" required>
                    </div>
                </div>
                <div class="form-row">
                    <div class="col-md-3 mb-3">
                        <label >CMP</label>
                        <input type="number"  id="cmp" name="cmp" onchange="totalcost()" onkeyup="totalcost()" value="<?= $single_po['POCMP'] ?>" class="form-control" id="validationTooltip01" placeholder="CMP" step="0.01" required>
                    </div>
                    <div class="col-md-3 mb-3">
                        <label >Wash Cost</label>
                        <input type="number" id="wash" name="wash_cost" onchange="totalcost()" onkeyup="totalcost()" value="<?= $single_po['POWASH'] ?>" class="form-control"  placeholder="Wash Cost" step="0.01" required>
                    </div>
                    <div class="col-md-3 mb-3">
                        <label >Hanger Cost</label>
                        <input type="number" id="hanger" name="hanger_cost" onchange="totalcost()" onkeyup="totalcost()" value="<?= $single_po['POHANGER'] ?>" class="form-control"  placeholder="Hanger Cost" step="0.01" required>
                    </div>
                    <div class="col-md-3 mb-3">
                        <label >CMP+W+Hanger</label>
                        <input type="number" name="cmp_w_wanger" value="<?= $single_po['POCMPWH'] ?>" class="form-control" id="total" placeholder="CMP+W+Hanger" step="0.01" required>
                    </div>
                </div>
                <div class="form-row">
                    <div class="col-md-3 mb-3">
                        <label >FOB</label>
                        <input type="number" name="fob" value="<?= $single_po['FOB'] ?>" class="form-control"  placeholder="FOB" step="0.01" required>
                    </div>
                    <div class="col-md-3 mb-3">
                        <label >Final Destination</label>
                        <input type="Text" name="final_destination" value="<?= $single_po['POFinalDestination'] ?>" class="form-control" id="validationTooltip01" placeholder="Final Destination">
                    </div>
                    <div class="col-md-6 mb-3">
                        <label >Special Instruction</label>
                        <textarea type="number" name="special_instruction" class="form-control"  placeholder="Special Instruction" rows="1"><?= $single_po['POSpecialInstruction'] ?></textarea>
                    </div>
                </div>
                <div class="form-row">
                    <div class="col-md-12">
                        <!-- top Table -->
                        <table class="mb-0 table table-bordered order-list1" id="myTable1" width="100%">
                            <thead>
                                <tr>
                                    <th colspan="7">Order Description</th>
                                </tr>
                                <tr>
                                    <th width="3%">#</th>
                                    <th width="20%">Style</th>
                                    <th width="20%">Color</th>
                                    <th width="15%">CLR No</th>
                                    <th width="12%">DZS</th>
                                    <th width="15%">P/Pack</th>
                                    <th width="115%">Units</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $sql = "SELECT * FROM order_description where POID=$id";
                                $order = mysqli_query($conn, $sql);
                                $counts = 1;
                                while ($row = mysqli_fetch_assoc($order)) {

                                    ?>
                                    <tr>
                                        <th scope="row">
                                            <?= $counts++ ?>
                                            <input type="hidden" value="<?= $row['OrderdescriptionID'] ?>" name="OrderdescriptionID[]">
                                        </th>
                                        <td>
                                            <select name="style[]" class="style mb-2 form-control-sm form-control" required>
                                                <?php

                                                    $sql = "SELECT * FROM style WHERE status = 1";
                                                    $results = mysqli_query($conn, $sql);
                                                    while ($result = mysqli_fetch_assoc($results)) {
                                                        if ($row['StyleID'] === $result['StyleID']) {
                                                            $selected = 'selected';
                                                        } else {
                                                            $selected = '';
                                                        }
                                                        echo '<option ' . $selected . ' value="' . $result['StyleID'] . '">' . $result['StyleNumber'] . '</option>';
                                                    }
                                                    ?>
                                            </select>
                                        </td>
                                        <td>
                                            <select name="color[]" class="style mb-2 form-control-sm form-control" required>
                                                <option></option>
                                                <?php
                                                    $conn = db_connection();
                                                    $sql = "SELECT * FROM color WHERE status = 1";
                                                    $results = mysqli_query($conn, $sql);
                                                    while ($result = mysqli_fetch_assoc($results)) {
                                                        $selected = $row['Color'] === $result['id'] ? 'selected' : '';

                                                        echo '<option ' . $selected . ' value="' . $result['id'] . '">' . $result['color'] . '</option>';
                                                    }
                                                    ?>
                                            </select>
                                        </td>
                                        <td>
                                            <input placeholder="CLR No" type="text" value="<?= $row['ClrNo'] ?>" name="clr_no[]" class="mb-2 form-control-sm form-control">
                                        </td>
                                        <td>
                                            <input placeholder="DZS" type="number" name="dzs[]" value="<?= $row['Dzs'] ?>" class="mb-2 form-control-sm form-control">
                                        </td>
                                        <td>
                                            <input placeholder="P/Pack" type="number" name="ppack[]" value="<?= $row['PPack'] ?>" class="mb-2 form-control-sm form-control">
                                        </td>
                                        <td>
                                            <input placeholder="Units" type="number" name="units[]" value="<?= $row['Units'] ?>" class="mb-2 form-control-sm form-control">
                                        </td>
                                    </tr>

                                <?php } ?>
                            </tbody>
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
                                    <th colspan="4">PRE-PACK ASSORT.</th>
                                </tr>
                                <tr>
                                    <th width="3%">#</th>
                                    <th width="40%">Size</th>
                                    <th width="30%">PrePack Code</th>
                                    <th width="27%">Qty</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $sql = "SELECT * FROM prepack where POID=$id";
                                $prepack = mysqli_query($conn, $sql);
                                $count = 1;
                                while ($row = mysqli_fetch_assoc($prepack)) {

                                    ?>
                                    <tr>
                                        <th scope="row">
                                            <?= $count++ ?>
                                            <input type="hidden" value="<?= $row['PrePackID'] ?>" name="PrePackID[]">
                                        </th>
                                        <td>
                                            <select name="size[]" class="style mb-2 form-control-sm form-control" required>
                                                <option></option>
                                                <?php
                                                    $conn = db_connection();
                                                    $sql = "SELECT * FROM size WHERE status = 1";
                                                    $results = mysqli_query($conn, $sql);
                                                    while ($result = mysqli_fetch_assoc($results)) {
                                                        $selected = $row['PrePackSize'] === $result['id'] ? 'selected' : '';
                                                        echo '<option ' . $selected . ' value="' . $result['id'] . '">' . $result['size'] . '</option>';
                                                    }
                                                    ?>
                                            </select>
                                        </td>
                                        <td>
                                            <input placeholder="PrePack Code" type="text" name="ppk[]" value="<?= $row['PrePackCode'] ?>" class="mb-2 form-control-sm form-control" required>
                                        </td>
                                        <td>
                                            <input placeholder="Qty" type="number" name="qty[]" value="<?= $row['PrepackQty'] ?>" class="mb-2 form-control-sm form-control">
                                        </td>
                                    </tr>

                                <?php } ?>

                            </tbody>
                        </table>
                    </div>
                </div>
                <br><br>
                <div class="text-center">
                    <button class="btn btn-primary" type="submit">UPDATE PO</button>
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
        function totalcost() {
            let cmp = $('#cmp').val();
            let wash = $('#wash').val();
            let hanger = $('#hanger').val();
            let total = (+cmp + +wash + +hanger).toFixed(2);
            $('#total').val(total);
        }
    </script>
<?php }
include_once "includes/footer.php";
?>