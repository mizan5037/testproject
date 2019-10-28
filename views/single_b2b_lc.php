<?php

$PageTitle = "B2B LC Details | Optima Inventory";
function customPageHeader()
{
    ?>
    <!-- Extra tags here -->
<?php }



function modal()
{
    $conn = db_connection();

    $sqlpo = "SELECT POID, PONumber FROM po WHERE status = 1";
    $resultpos = mysqli_query($conn, $sqlpo);
    $poArr = array();
    while ($resultpo = mysqli_fetch_assoc($resultpos)) {
        $poArr[] = $resultpo;
    }

    $sqlstyle = "SELECT StyleID, StyleNumber FROM style WHERE status = 1";
    $resultstyles = mysqli_query($conn, $sqlstyle);
    $styleArr = array();
    while ($resultstyle = mysqli_fetch_assoc($resultstyles)) {
        $styleArr[] = $resultstyle;
    }

    ?>
    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <form method="post">
                <div class="modal-content" style="width:190%; margin-left:-225px">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Item Requirments</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <table class="mb-0 table table-bordered order-list table-hover table-sm" id="myTable">
                            <thead>
                                <tr>
                                    <th width="5%">#</th>
                                    <th width="25%">P.O. No</th>
                                    <th width="25%">Style</th>
                                    <th width="10%">Qty</th>
                                    <th width="15%">Unit Name</th>
                                    <th width="10%">Unit Price</th>
                                    <th width="10%" title="Latest Shipment Date">L.S.D</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <th scope="row">1</th>
                                    <td>
                                        <select class="form-control form-control-sm" name="pono[]" required>
                                            <option></option>
                                            <?php
                                                foreach ($poArr as $key) {
                                                    echo '<option value="' . $key['POID'] . '">' . $key['PONumber'] . '</option>';
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
                                        <input placeholder="Qty" type="number" name="qty[]" class="mb-2 form-control-sm form-control" required>
                                    </td>
                                    <td>
                                        <input placeholder="U/Name" type="text" name="unitname[]" class="mb-2 form-control-sm form-control" required>
                                    </td>
                                    <td>
                                        <input placeholder="U/Price" type="number" name="price[]" class="mb-2 form-control-sm form-control" required>
                                    </td>
                                    <td>
                                        <input type="date" name="lsdate[]" class="mb-2 form-control-sm form-control" required>
                                    </td>
                                </tr>
                                <tr>
                                    <th scope="row">2</th>
                                    <td>
                                        <select class="form-control form-control-sm" name="pono[]">
                                            <option></option>
                                            <?php
                                                foreach ($poArr as $key) {
                                                    echo '<option value="' . $key['POID'] . '">' . $key['PONumber'] . '</option>';
                                                }
                                                ?>
                                        </select>
                                    </td>
                                    <td>
                                        <select class="form-control form-control-sm" name="style[]">
                                            <option></option>
                                            <?php
                                                foreach ($styleArr as $key) {
                                                    echo '<option value="' . $key['StyleID'] . '">' . $key['StyleNumber'] . '</option>';
                                                }
                                                ?>
                                        </select>
                                    </td>
                                    <td>
                                        <input placeholder="Qty" type="number" name="qty[]" class="mb-2 form-control-sm form-control">
                                    </td>
                                    <td>
                                        <input placeholder="U/Name" type="text" name="unitname[]" class="mb-2 form-control-sm form-control">
                                    </td>
                                    <td>
                                        <input placeholder="U/Price" type="number" name="price[]" class="mb-2 form-control-sm form-control">
                                    </td>
                                    <td>
                                        <input type="date" name="lsdate[]" class="mb-2 form-control-sm form-control">
                                    </td>
                                </tr>
                                <tr>
                                    <th scope="row">3</th>
                                    <td>
                                        <select class="form-control form-control-sm" name="pono[]">
                                            <option></option>
                                            <?php
                                                foreach ($poArr as $key) {
                                                    echo '<option value="' . $key['POID'] . '">' . $key['PONumber'] . '</option>';
                                                }
                                                ?>
                                        </select>
                                    </td>
                                    <td>
                                        <select class="form-control form-control-sm" name="style[]">
                                            <option></option>
                                            <?php
                                                foreach ($styleArr as $key) {
                                                    echo '<option value="' . $key['StyleID'] . '">' . $key['StyleNumber'] . '</option>';
                                                }
                                                ?>
                                        </select>
                                    </td>
                                    <td>
                                        <input placeholder="Qty" type="number" name="qty[]" class="mb-2 form-control-sm form-control">
                                    </td>
                                    <td>
                                        <input placeholder="U/Name" type="text" name="unitname[]" class="mb-2 form-control-sm form-control">
                                    </td>
                                    <td>
                                        <input placeholder="U/Price" type="number" name="price[]" class="mb-2 form-control-sm form-control">
                                    </td>
                                    <td>
                                        <input type="date" name="lsdate[]" class="mb-2 form-control-sm form-control">
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Save</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <!-- Modal End -->

<?php }


include_once "controller/single_b2b_lc.php";
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
                <div>B2B LC Details
                    <div class="page-title-subheading">
                        Single
                    </div>
                </div>
            </div>
            <div class="page-title-actions">
                <div class="d-inline-block dropdown">
                    <a href="<?= $path ?>/index.php?page=edit_b2b_lc&id=<?= $id ?>" aria-expanded="false" class="btn-shadow btn btn-info">
                        Edit
                    </a>
                </div>
            </div>
        </div>
    </div>

    <div class="main-card mb-3 card">
        <div class="card-body">
            <div class="row">
                <div class="col-md-6">
                    <table class="table table-bordered">
                        <tr>
                            <td width="40%">B2B LC Number:</td>
                            <td width="60%"><b><?= $blc['B2BLCNumber'] ?></b></td>
                        </tr>
                        <tr>
                            <td>B2B LC Issue Date:</td>
                            <td><b><?= $blc['Issuedate'] ?></b></td>
                        </tr>
                        <tr>
                            <td>Master LC No:</td>
                            <td><b> <a class="btn btn-sm btn-outline-success" target="_blank" href="<?=$path?>/index.php?page=single_masterlc&id=<?=$blc['MasterLCID']?>"><?= searchForVal($blc['MasterLCID'], $masterlcArr, 'MasterLCID', 'MasterLCNumber') ?></a> </b></td>
                        </tr>
                    </table>
                </div>
                <div class="col-md-6">
                    <table class="table table-bordered">
                        <tr>
                            <td>Supplier Name:</td>
                            <td><b><?= $blc['SupplierName'] ?></b></td>
                        </tr>
                        <tr>
                            <td>Contact Person:</td>
                            <td><b><?= $blc['ContactPerson'] ?></b></td>
                        </tr>
                        <tr>
                            <td>Contact Number:</td>
                            <td><b><?= $blc['ContactNumber'] ?></b></td>
                        </tr>
                    </table>
                </div>
                <div class="col-md-12">
                    <table class="table table-bordered">
                        <tr>
                            <td>Address:</td>
                        </tr>
                        <tr>
                            <td><b><?= nl2br($blc['SupplierAddress']) ?></b></td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <div class="main-card mb-3 card">
        <div class="card-body">
            <div class="row">
                <div class="col-md-6">
                    <h5 class="card-title">Order Description</h5>
                </div>
                <div class="col-md-6 text-right">
                    <!-- Button trigger modal -->
                    <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#exampleModal">
                        Add New Order
                    </button>
                </div>
            </div>
            <br>
            <div class="row">
                <div class="col-md-12">
                    <table class="table table-bordered table-hover text-center">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Item</th>
                                <th>P.O. No</th>
                                <th>Style No</th>
                                <th>Qty</th>
                                <th>Unit Price</th>
                                <th>Total Price</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <?php
                        $sql = "SELECT ID, ItemID, POID, StyleID, Qty, PricePerUnit, TotalPrice FROM b2b_item where Status = 1 AND B2BLCID ='$id'";

                        $mlc = mysqli_query($conn, $sql);
                        $count = 1;
                        while ($row = mysqli_fetch_assoc($mlc)) {
                            ?>
                            <tr>
                                <td><b><?= $count++ ?></b></td>
                                <td>
                                    <b>
                                        <a class="btn btn-sm btn-outline-success" target="_blank" href="<?= $path ?>/index.php?page=all_item">
                                            <?= searchForVal($row['ItemID'], $itemArr, 'ItemID', 'ItemName') ?>
                                        </a>
                                    </b>
                                </td>
                                <td>
                                    <b>
                                        <a class="btn btn-sm btn-outline-success" target="_blank" href="<?= $path ?>/index.php?page=po_single&poid=<?= $row['POID'] ?>">
                                            <?= searchForVal($row['POID'], $poArr, 'POID', 'PONumber') ?>
                                        </a>
                                    </b>
                                </td>
                                <td>
                                    <b>
                                        <a class="btn btn-sm btn-outline-success" target="_blank" href="<?= $path ?>/index.php?page=single_style&id=<?= $row['StyleID'] ?>">
                                            <?= searchForVal($row['StyleID'], $styleArr, 'StyleID', 'StyleNumber') ?>
                                        </a>
                                    </b>
                                </td>
                                <td><b><?= $row['Qty'] ?></b></td>
                                <td><b><?= $row['PricePerUnit'] ?></b></td>
                                <td><b><?= $row['TotalPrice'] ?></b></td>
                                <td>
                                    <a onclick="return confirm('Are You sure want to delete this item permanently?')" href="<?= $path ?>/index.php?page=single_b2b_lc&id=<?= $id ?>&delete=<?php echo $row['ID']; ?>" class="mb-2 mr-2 btn-transition btn-danger btn btn-sm btn-outline-secondary" id="details">
                                        <i class="fas fa-trash-alt" style="color: white;"></i>
                                    </a>
                                </td>
                            </tr>
                        <?php } ?>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>




<?php
function customPagefooter()
{
    global $path;
    ?>

    <script>
        // Get the modal
        var modal = document.getElementById("myModal");

        // Get the image and insert it inside the modal - use its "alt" text as a caption

        var modalImg = document.getElementById("img01");
        var captionText = document.getElementById("caption");

        function view(id) {
            var img = document.getElementById(id);
            modal.style.display = "block";
            modalImg.src = img.src;
            captionText.innerHTML = img.alt;
        }

        // Get the <span> element that closes the modal
        var span = document.getElementById("close");

        // When the user clicks on <span> (x), close the modal
        span.onclick = function() {
            modal.style.display = "none";
        }


        //Edit Details
        $(document).ready(function() {


            function edit_data(id, text, column_name) {

                $.ajax({
                    url: "<?php echo  $path; ?>/index.php?page=single_style",
                    method: "POST",
                    data: {
                        id: id,
                        text: text,
                        cname: column_name,
                        token: '<?= get_ses('token') ?>',
                        form: 'editDetails'
                    },
                    dataType: "text",
                    success: function(data) {

                        $('#notice').html('<div class="alert alert-success alert-dismissible fade show notification" role="alert">' + data + '<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');

                    }
                });
            }

            $(document).on('blur', '.StyleNumber', function() {
                if (confirm('Do you want to edit this?')) {
                    var id = $(this).attr("data-id1");
                    var text = $(this).text();
                    edit_data(id, text, "StyleNumber");
                } else {
                    location.reload();
                }
            });

            $(document).on('blur', '.StyleDescription', function() {
                if (confirm('Do you want to edit this?')) {
                    var id = $(this).attr("data-id1");
                    var text = $(this).text();
                    edit_data(id, text, "StyleDescription");
                } else {
                    location.reload();
                }
            });

            $(document).on('blur', '.StyleProto', function() {
                if (confirm('Do you want to edit this?')) {
                    var id = $(this).attr("data-id1");
                    var text = $(this).text();
                    edit_data(id, text, "StyleProto");
                } else {
                    location.reload();
                }
            });

            $(document).on('blur', '.StyleFabricDetails', function() {
                if (confirm('Do you want to edit this?')) {
                    var id = $(this).attr("data-id1");
                    var text = $(this).text();
                    edit_data(id, text, "StyleFabricDetails");
                } else {
                    location.reload();
                }
            });

            $(document).on('blur', '.StyleWash', function() {
                if (confirm('Do you want to edit this?')) {
                    var id = $(this).attr("data-id1");
                    var text = $(this).text();
                    edit_data(id, text, "StyleWash");
                } else {
                    location.reload();
                }
            });

        });
    </script>

<?php }
include_once "includes/footer.php";
?>