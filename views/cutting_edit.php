<?php

$page_privilege = 5;
hasAccess();

$PageTitle = "Cutting Form | Optima Inventory";
function customPageHeader()
{
    ?>
    <!--Arbitrary HTML Tags-->
<?php }
$conn = db_connection();
if (isset($_GET['cuttingid'])  && $_GET['cuttingid'] != '') {
    $cuttingid = $_GET['cuttingid'];
    $sql = "SELECT c.*,s.StyleNumber,p.PONumber FROM cutting_form c LEFT JOIN style s on s.StyleID=c.StyleID LEFT JOIN po p ON c.POID = p.POID WHERE c.Status = 1 and CuttingFormID=" . $cuttingid;
    $single_cutting = mysqli_fetch_assoc(mysqli_query($conn, $sql));
} else {
    nowgo('/index.php?page=all_cutting');
}

include_once "controller/update_cutting_form.php";
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
                <div>Cutting Form
                    <div class="page-title-subheading">
                        Please use this form to add a new Item.
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
                      <label for="validationTooltip02">Date</label>
                      <input type="date" value="<?= $single_cutting['date'] ?>" class="form-control" id="validationTooltip02" name="date" required>
                  </div>
                  <div class="col-md-3 mb-3">
                      <label for="validationTooltip02">Cutting no</label>
                      <input type="text" value="<?= $single_cutting['CuttingNo'] ?>" class="form-control" id="validationTooltip02" placeholder="Cutting no" name="cutting_no" required>
                  </div>
                    <div class="col-md-3 mb-3">
                        <label for="validationTooltip01">Style</label>
                        <select name="style" class="style  form-control" required>
                            <option></option>
                            <?php
                            $conn = db_connection();
                            $sql = "SELECT * FROM style WHERE status = 1";
                            $results = mysqli_query($conn, $sql);
                            while ($result = mysqli_fetch_assoc($results)) {
                                if ($result['StyleID'] == $single_cutting['StyleID']) {
                                    echo '<option selected value="' . $result['StyleID'] . '">' . $result['StyleNumber'] . '</option>';
                                    # code...
                                } else {
                                    echo '<option  value="' . $result['StyleID'] . '">' . $result['StyleNumber'] . '</option>';
                                }
                            }
                            ?>
                        </select>
                    </div>
                    <div class="col-md-3 mb-3">
                        <label for="validationTooltipUsername">PO no</label>
                        <select name="po" class="po  form-control" required>
                            <option></option>
                            <?php
                            $conn = db_connection();
                            $sql = "SELECT * FROM po WHERE status = 1";
                            $results = mysqli_query($conn, $sql);
                            while ($result = mysqli_fetch_assoc($results)) {
                                if ($result['POID'] == $single_cutting['POID']) {
                                    echo '<option selected value="' . $result['POID'] . '">' . $result['PONumber'] . '</option>';
                                } else {
                                    echo '<option value="' . $result['POID'] . '">' . $result['PONumber'] . '</option>';
                                }
                            }
                            ?>
                        </select>
                    </div>
                </div>
                <div class="form-row">
                    <table class="mb-0 table table-bordered order-list">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Color</th>
                                <th>Size</th>
                                <th>Qty</th>
                                <th>Send to Sewing</th>
                                <th>Print & EMB Send</th>
                                <th>Print & EMB Receive</th>
                                <th>Remark</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php

                            $sqlo = "SELECT d.*,c.color,s.size FROM cutting_form_description d LEFT JOIN color c ON c.id=d.Color LEFT JOIN size s on s.id=d.Size WHERE c.Status=1 and CuttingFormID=" . $cuttingid;
                            $count = 1;
                            $cutting = mysqli_query($conn, $sqlo);

                            while ($rowo = mysqli_fetch_assoc($cutting)) {
                                ?>
                                <input type="hidden" name="catdeid[]" value="<?=$rowo['ID']?>">
                                <tr>
                                    <th scope="row">1</th>
                                    <td>
                                        <select name="color[]" class="color mb-2 form-control-sm form-control" required>
                                            <option></option>
                                            <?php
                                                $conn = db_connection();
                                                $sql = "SELECT * FROM color WHERE status = 1";
                                                $results = mysqli_query($conn, $sql);
                                                while ($result = mysqli_fetch_assoc($results)) {
                                                    if ($rowo['Color']==$result['id']) {
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
                                        <select name="size[]" class="size mb-2 form-control-sm form-control" required>
                                            <option></option>
                                            <?php
                                                $conn = db_connection();
                                                $sql = "SELECT * FROM size WHERE status = 1";
                                                $results = mysqli_query($conn, $sql);
                                                while ($result = mysqli_fetch_assoc($results)) {
                                                    if ($rowo['Size']==$result['id']) {
                                                        echo '<option selected value="' . $result['id'] . '">' . $result['size'] . '</option>';

                                                    }else{
                                                        echo '<option value="' . $result['id'] . '">' . $result['size'] . '</option>';
                                                    }

                                                }
                                                ?>
                                        </select>
                                    </td>
                                    <td>
                                        <input placeholder="Qty" value="<?=$rowo['Qty']?>" name="qty[]" type="number" class="mb-2 form-control-sm form-control">
                                    </td>
                                    <td>
                                        <input placeholder="Sewing" value="<?=$rowo['sewing']?>" name="sewing[]" type="number" class="mb-2 form-control-sm form-control">
                                    </td>
                                    <td>
                                        <input placeholder="Print & EMB Send" name="embsend[]" value="<?=$rowo['PrintEMBSent']?>" type="number" class="mb-2 form-control-sm form-control">
                                    </td>
                                    <td>
                                        <input placeholder="Print & EMB Receive" type="number" value="<?=$rowo['PrintEmbReceive']?>" name="embreceive[]" class="mb-2 form-control-sm form-control">
                                    </td>
                                    <td>
                                        <input placeholder="Remark" type="text" value="<?=$rowo['remark']?>" name="remark[]" class="mb-2 form-control-sm form-control">
                                    </td>
                                </tr>
                            <?php } ?>
                        </tbody>

                    </table>
                </div>
                <br>
                <div class="row">
                    <div class="col-md-12 text-right">
                        <button class="btn btn-primary" type="submit">UPDATE</button>
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
            var counter = 2;

            $("#addrow").on("click", function() {
                var newRow = $("<tr>");
                var cols = "";

                cols += '<th scope="row">' + counter + '</th>';
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
                cols += '<td><select name="size[]" class="size mb-2 form-control-sm form-control" required><option></option>';
                <?php
                    $conn = db_connection();
                    $sql = "SELECT * FROM size WHERE status = 1";
                    $results = mysqli_query($conn, $sql);
                    while ($result = mysqli_fetch_assoc($results)) {
                        echo 'cols += \'<option value="' . $result['id'] . '">' . $result['size'] . '</option>\'; ';
                    }
                    ?>
                cols += '</select></td>';
                cols += '<td><input placeholder="Qty" type="number" name="qty[]" class="mb-2 form-control-sm form-control"></td>';
                cols += '<td><input placeholder="Print & EMB Send" type="number" name="embsend[]" class="mb-2 form-control-sm form-control"></td>';
                cols += '<td><input placeholder="Print & EMB Receive" name="embreceive[]" type="number" class="mb-2 form-control-sm form-control"></td>';
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
