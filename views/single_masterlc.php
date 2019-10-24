<?php

$PageTitle = "Style Details | Optima Inventory";
function customPageHeader()
{
    ?>
    <!-- Extra tags here -->
<?php }

function modal()
{
    ?>
    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <form method="post">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Item Requirments</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <table class="mb-0 table table-bordered order-list" id="myTable" width="100%">
                            <thead>
                                <tr>
                                    <th width="3%">#</th>
                                    <th width="30%">Size</th>
                                    <th width="30%">Item</th>
                                    <th width="20%">Qty</th>
                                </tr>
                            </thead>
                            <?php
                                $conn = db_connection();
                                $sql = "SELECT ItemID, ItemName FROM item WHERE status = 1";
                                $results = mysqli_query($conn, $sql);
                                $mlcArr = array();
                                while ($result = mysqli_fetch_assoc($results)) {
                                    $mlcArr[] = $result;
                                }
                                ?>
                            <tbody>
                                <tr>
                                    <th scope="row">1</th>
                                    <td>
                                        <input placeholder="Size" type="text" name="size[]" class="mb-2 form-control-sm form-control" required>
                                    </td>
                                    <td>
                                        <select name="item[]" class="item mb-2 form-control-sm form-control" required>
                                            <option></option>
                                            <?php
                                                foreach ($mlcArr as $key) {
                                                    echo '<option value="' . $key['ItemID'] . '">' . $key['ItemName'] . '</option>';
                                                }
                                                ?>
                                        </select>
                                    </td>
                                    <td>
                                        <input placeholder="Qty" type="number" name="qty[]" class="mb-2 form-control-sm form-control" required>
                                    </td>
                                </tr>
                                <tr>
                                    <th scope="row">2</th>
                                    <td>
                                        <input placeholder="Size" type="text" name="size[]" class="mb-2 form-control-sm form-control">
                                    </td>
                                    <td>
                                        <select name="item[]" class="item mb-2 form-control-sm form-control">
                                            <option></option>
                                            <?php
                                                foreach ($mlcArr as $key) {
                                                    echo '<option value="' . $key['ItemID'] . '">' . $key['ItemName'] . '</option>';
                                                }
                                                ?>
                                        </select>
                                    </td>
                                    <td>
                                        <input placeholder="Qty" type="number" name="qty[]" class="mb-2 form-control-sm form-control">
                                    </td>
                                </tr>
                                <tr>
                                    <th scope="row">3</th>
                                    <td>
                                        <input placeholder="Size" type="text" name="size[]" class="mb-2 form-control-sm form-control">
                                    </td>
                                    <td>
                                        <select name="item[]" class="item mb-2 form-control-sm form-control">
                                            <option></option>
                                            <?php
                                                foreach ($mlcArr as $key) {
                                                    echo '<option value="' . $key['ItemID'] . '">' . $key['ItemName'] . '</option>';
                                                }
                                                ?>
                                        </select>
                                    </td>
                                    <td>
                                        <input placeholder="Qty" type="number" name="qty[]" class="mb-2 form-control-sm form-control">
                                    </td>
                                </tr>
                                <tr>
                                    <th scope="row">4</th>
                                    <td>
                                        <input placeholder="Size" type="text" name="size[]" class="mb-2 form-control-sm form-control">
                                    </td>
                                    <td>
                                        <select name="item[]" class="item mb-2 form-control-sm form-control">
                                            <option></option>
                                            <?php
                                                foreach ($mlcArr as $key) {
                                                    echo '<option value="' . $key['ItemID'] . '">' . $key['ItemName'] . '</option>';
                                                }
                                                ?>
                                        </select>
                                    </td>
                                    <td>
                                        <input placeholder="Qty" type="number" name="qty[]" class="mb-2 form-control-sm form-control">
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


include_once "controller/single_masterlc.php";
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
                <div>Master LC Details
                    <div class="page-title-subheading">
                        Single
                    </div>
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
                            <td width="40%">Master LC Number:</td>
                            <td width="60%"><b><?= $mlc['MasterLCNumber'] ?></b></td>
                        </tr>
                        <tr>
                            <td>Master LC Issue Date:</td>
                            <td><b><?= $mlc['MasterLCIssueDate'] ?></b></td>
                        </tr>
                        <tr>
                            <td>Master LC Expiry Date:</td>
                            <td><b><?= $mlc['MasterLCExpiryDate'] ?></b></td>
                        </tr>
                        <tr>
                            <td>Sender Bank:</td>
                            <td><b><?= $mlc['MasterLCSenderBank'] ?></b></td>
                        </tr>
                        <tr>
                            <td>Receiver Bank:</td>
                            <td><b><?= $mlc['MasterLCReceiverBank'] ?></b></td>
                        </tr>
                        <tr>
                            <td>Buyer:</td>
                            <td><b><?= $mlc['MasterLCBuyer'] ?></b></td>
                        </tr>
                        <tr>
                            <td>LC Issued By:</td>
                            <td><b><?= $mlc['MasterLCIssuingCompany'] ?></b></td>
                        </tr>
                    </table>
                </div>
                <div class="col-md-6">
                    <table class="table table-bordered">
                        <tr>
                            <td width="40%">Currency:</td>
                            <td width="60%"><b><?= $mlc['MasterLCCurrency'] ?></b></td>
                        </tr>
                        <tr>
                            <td>Amount:</td>
                            <td><b><?= $mlc['MasterLCAmount'] ?></b></td>
                        </tr>
                        <tr>
                            <td>Partial Shipment:</td>
                            <td><b><?= $mlc['MasterLCPartialShipment'] ?></b></td>
                        </tr>
                        <tr>
                            <td>Transshipment:</td>
                            <td><b><?= $mlc['MasterLCTranshipment'] ?></b></td>
                        </tr>
                        <tr>
                            <td>Port Of Loading:</td>
                            <td><b><?= $mlc['MasterLCPortOfLoading'] ?></b></td>
                        </tr>
                        <tr>
                            <td>Port Of Discharge:</td>
                            <td><b><?= $mlc['MasterLCPortOfDischarge'] ?></b></td>
                        </tr>
                    </table>
                </div>
                <div class="col-md-12">
                    <table class="table table-bordered">
                        <tr>
                            <td width="100%">Description:</td>
                        </tr>
                        <tr>
                            <td width="100%"><b><?= $mlc['Description'] ?></b></td>
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
                    <h5 class="card-title">Orders</h5>
                </div>
                <div class="col-md-6 text-right">
                    <!-- Button trigger modal -->
                    <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#exampleModal1">
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
                                <th>P.O. No</th>
                                <th>Style No</th>
                                <th>Qty</th>
                                <th>Unit Price</th>
                                <th>L.S.D</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <?php
                        $sql = "SELECT ID, POID, StyleID, Qty, Unit, Price, LSDate FROM masterlc_description where Status = 1 AND MasterLCID ='$id'";

                        $mlc = mysqli_query($conn, $sql);
                        $count = 1;
                        while ($row = mysqli_fetch_assoc($mlc)) {
                            ?>
                            <tr>
                                <td><b><?= $count++ ?></b></td>
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
                                <td><b><?= $row['Qty'] . $row['Unit'] ?></b></td>
                                <td><b><?= $row['Price'] ?></b></td>
                                <td><b><?= $row['LSDate'] ?></b></td>
                                <td>
                                    <a onclick="return confirm('Are You sure want to delete this item permanently?')" href="<?= $path ?>/index.php?page=single_masterlc&id=<?= $id ?>&delete=<?php echo $row['ID']; ?>" class="mb-2 mr-2 btn-transition btn-danger btn btn-sm btn-outline-secondary" id="details">
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