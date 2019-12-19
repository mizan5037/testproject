<?php

$PageTitle = "Fabric Received | Optima Inventory";
function customPageHeader()
{
    ?>
    <!--Arbitrary HTML Tags-->
<?php }
include_once "controller/update_fab_receive.php";
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
                <div>Fabric Received Update
                    <div class="page-title-subheading">
                        Fabric Received Update
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="main-card mb-3 card">
        <div class="card-body">
            <!-- <h5 class="card-title">Card Title</h5> -->
            <?php if (isset($fab_all)) { ?>
                <div class="container">
                    <form class="needs-validation" method="POST" novalidate>
                        <div class="container">
                            <div class="row">
                                <div class="col-md-12">
                                    <table class="mb-0 table table-bordered order-list" id="myTable" width="100%">
                                        <thead>
                                            <tr width="100%">
                                                <th width="5%">#</th>
                                                <th width="15%">Buyer</th>
                                                <th width="10%">PO</th>
                                                <th width="10%">Style</th>
                                                <th width="10%">Color</th>
                                                <th width="15%">Width</th>
                                                <th width="15%">Received Yds</th>
                                                <th width="10%">Received Roll</th>
                                                <th width="10%">Shortage/Excess Yds</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <th scope="row">1</th>
                                                <td>
                                                    <select name="buyer" class="po form-control-sm search_select" disabled>
                                                        <option value="<?= $fab_all['buyer'] ?>"><?= getname('buyer', 'BuyerName', 'BuyerID', $fab_all['Buyer']) ?></option>

                                                    </select>
                                                </td>
                                                <td>
                                                    <select name="po" class="po form-control-sm search_select" disabled>
                                                        <option value="<?= $fab_all['POID'] ?>"><?= getname('po', 'PONumber', 'POID', $fab_all['POID']) ?></option>

                                                    </select>
                                                </td>
                                                <td>
                                                    <select name="style" class="style form-control-sm search_select" disabled>
                                                        <option value="<?= $fab_all['StyleID'] ?>"><?= getname('style', 'StyleNumber', 'StyleID', $fab_all['StyleID']) ?></option>

                                                    </select>
                                                </td>
                                                <td>
                                                    <select name="color" class="style form-control-sm search_select" disabled>
                                                        <option value="<?= $fab_all['Color'] ?>"><?= getname('color', 'color', 'id', $fab_all['Color']) ?></option>

                                                    </select>
                                                </td>
                                                <td>
                                                    <input placeholder="Width" type="number" name="width" class="form-control-sm form-control" step="0.01" value="<?= $fab_all['Width'] ?>">
                                                </td>
                                                <td>
                                                    <input placeholder="Received Yds" type="number" name="receivefab" class="form-control-sm form-control" step="0.01" value="<?= $fab_all['ReceivedFab'] ?>">
                                                </td>
                                                <td>
                                                    <input placeholder="Received Roll" type="number" name="receiveroll" class="form-control-sm form-control" value="<?= $fab_all['ReceivedRoll'] ?>">
                                                </td>
                                                <td>
                                                    <input placeholder="Shortage/Excess Yds" type="number" name="sortexs" class="form-control-sm form-control" value="<?= $fab_all['Shortage'] ?>">
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                        <br><br>
                        <div class="container">
                            <div class="row">
                                <div class="col-md-12 text-right">
                                    <button class="btn btn-primary" type="submit" name="fabRc">Update</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            <?php } ?>


            <?php if (isset($fab_other_all)) { ?>
                <div class="container">
                    <form class="needs-validation" method="POST" novalidate>
                        <div class="form-row">
                            <table class="mb-0 table table-bordered order-list" id="myTable">
                                <thead>
                                    <tr>
                                        <th width="5%">#</th>
                                        <th width="20%">Contrast / Pocketing</th>
                                        <th width="15%">Color</th>
                                        <th width="10%">Width</th>
                                        <th width="10%">Received Fabric</th>
                                        <th width="10%">Received Roll</th>
                                        <th width="10%">Shortage / Excess</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <th scope="row">1</th>
                                        <td>
                                            <select name="type" id="" class="mb-2 form-control-sm search_select" disabled>
                                                <option value="<?= $fab_other_all['ContrastPocket'] ?>"><?= $fab_other_all['ContrastPocket'] ?></option>
                                            </select>
                                        </td>
                                        <td>
                                            <select name="color" class="buyer mb-2 form-control-sm search_select" disabled>
                                                <option value="<?= $fab_other_all['Color'] ?>"><?= getname('color', 'color', 'id', $fab_other_all['Color']) ?></option>
                                            </select>
                                        </td>
                                        <td>
                                            <input placeholder="Width" type="number" name="width" class="form-control-sm form-control" step="0.01" value="<?= $fab_other_all['Width'] ?>">
                                        </td>
                                        <td>
                                            <input placeholder="Received Fabric" type="number" name="receivefab" class="mb-2 form-control-sm form-control" value="<?= $fab_other_all['ReceivedFab'] ?>">
                                        </td>
                                        <td>
                                            <input placeholder="Received Roll" type="number" name="receiveroll" class="mb-2 form-control-sm form-control" value="<?= $fab_other_all['ReceivedRoll'] ?>">
                                        </td>
                                        <td>
                                            <input placeholder="Shortage/Excess" type="number" name="sortexs" class="mb-2 form-control-sm form-control" value="<?= $fab_other_all['Shortage'] ?>">
                                        </td>

                                    </tr>
                                </tbody>

                            </table>
                        </div>
                        <br><br>
                        <div class="container">
                            <div class="row">
                                <div class="col-md-12 text-right">
                                    <button class="btn btn-primary" type="submit" name="fabRcOther">Update</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            <?php } ?>

        </div>
    </div>
</div>




<?php
function customPagefooter()
{ }
include_once "includes/footer.php";
?>