<?php

$page_privilege = 5;
hasAccess();

$PageTitle = "Lay Form | Optima Inventory";
function customPageHeader()
{
    ?>
    <!--Arbitrary HTML Tags-->
<?php }


include_once "controller/add_lay_description.php";
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
            <?php
            if (isset($_GET['lay_id'])) {
                $layid = $_GET['lay_id'];

                $conn = db_connection();

                $sql = "SELECT * FROM lay_form f LEFT JOIN buyer b on b.BuyerID=f.BuyerID LEFT JOIN style s on s.StyleID=f.StyleID LEFT JOIN po p ON p.POID=f.POID WHERE f.Status = 1 and LayFormID='$layid'";
                $single_lay = mysqli_fetch_assoc(mysqli_query($conn, $sql));

                ?>
                <div class="form-row">
                    <div class="col-md-3 mb-3">
                        <label for="validationTooltip01">Buyer Name</label>
                        <select name="buyer" class="buyer  form-control search_select" disabled>
                            <option value=""><?= $single_lay['BuyerName']; ?></option>
                        </select>
                    </div>
                    <div class="col-md-3 mb-3">
                        <label for="validationTooltip02">Style No</label>
                        <select name="style" class="  form-control search_select" disabled>
                            <option value=""><?= $single_lay['StyleNumber']; ?></option>
                        </select>
                    </div>
                    <div class="col-md-3 mb-3">
                        <label for="validationTooltipUsername">P.O. No</label>
                        <select name="po" class="po  form-control" disabled>
                            <option value=""><?= $single_lay['PONumber'] ?></option>
                        </select>
                    </div>
                    <div class="col-md-3 mb-3">
                        <label for="validationTooltipUsername">Cutting No</label>
                        <input type="text" class="form-control" name="cutting_no" value="<?= $single_lay['CuttingNo'] ?>" disabled>
                    </div>
                    <div class="col-md-3 mb-3">
                        <label for="validationTooltip01">Unit</label>
                        <input type="text" class="form-control" name="unit" value="<?= $single_lay['Unit'] ?>" disabled>
                    </div>
                    <div class="col-md-3 mb-3">
                        <label for="validationTooltip02">Date</label>
                        <input type="date" class="form-control" name="date" value="<?= $single_lay['Date'] ?>" disabled>
                    </div>

                    <div class="col-md-3 mb-3">
                        <label for="validationTooltipUsername">M/W</label>
                        <input type="text" class="form-control" name="mw" value="<?= $single_lay['MarkerWidth'] ?>" disabled>
                    </div>
                    <div class="col-md-3 mb-3">
                        <label for="validationTooltipUsername">Marker Length</label>
                        <input type="text" name="marker_length" class="form-control" value="<?= $single_lay['MarkerLength'] ?>" disabled>
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
                <form action="" method="POST">
                    <div class="row">
                        <div class="col-md-12" style="overflow-x: auto;">
                            <table class="order-list" id="myTable" width="100%">
                                <thead>
                                    <tr>
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
                                    </tr>
                                </thead>
                                <tbody>

                                    <tr>
                                        <td>
                                            <select name="color" class="color  form-control" required>
                                                <option></option>
                                                <?php
                                                    $conn = db_connection();
                                                    $sql = "SELECT * FROM color WHERE status = 1";
                                                    $results = mysqli_query($conn, $sql);
                                                    while ($result = mysqli_fetch_assoc($results)) {
                                                        echo '<option value="' . $result['id'] . '">' . $result['color'] . '</option>';
                                                    }
                                                    ?>
                                            </select>
                                        </td>
                                        <td>
                                            <input type="hidden" value="<?= $layid ?>" name="layid">
                                            <input placeholder="Lot No" type="text" name="lotno">
                                        </td>
                                        <td>
                                            <input placeholder="Sl. No" type="text" name="slno">
                                        </td>
                                        <td>
                                            <input placeholder="Roll No" name="rollno" type="text">
                                        </td>
                                        <td>
                                            <input placeholder="TTL Fabrics/yds" name="ttlfab" type="text">
                                        </td>
                                        <td>
                                            <input placeholder="Lay" name="lay" type="text">
                                        </td>
                                        <td>
                                            <input placeholder="Used Fabrics/yds" name="usedfab" type="text">
                                        </td>
                                        <td>
                                            <input placeholder="Remaining" name="ramaining" type="text">
                                        </td>
                                        <td>
                                            <input placeholder="Exxess/Short" name="exsshort" type="text">
                                        </td>
                                        <td>
                                            <input placeholder="Sticker" name="sticker" type="text">
                                        </td>
                                    </tr>

                                </tbody>
                            </table>
                        </div>
                    </div>
                    <br><br>
                    <div class="container">
                        <div class="row">
                            <div class="col-md-12 text-center">
                                <button class="btn btn-primary" name="new_lay" type="submit">Save</button>
                            </div>
                        </div>
                    </div>
                </form>
        </div>
    </div>
</div>
<?php
} else { }
?>






<?php
function customPagefooter()
{
    ?>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.7/js/select2.min.js"></script>

    <script type="text/javascript">
        $('.search_select').select2({
            placeholder: 'Select Your Option'
        });

        $("select").select2();
    </script>

<?php }
include_once "includes/footer.php";
?>