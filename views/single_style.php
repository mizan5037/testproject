<?php

$PageTitle = "Style Details | Optima Inventory";
function customPageHeader()
{
    ?>
    <style>
        #myImg {
            cursor: pointer;
            transition: 0.3s;
        }

        #myImg:hover {
            opacity: 0.7;
        }

        /* The Modal (background) */
        .modal1 {
            display: none;
            /* Hidden by default */
            position: fixed;
            /* Stay in place */
            z-index: 99999;
            /* Sit on top */
            padding-top: 100px;
            /* Location of the box */
            left: 0;
            top: 0;
            width: 103%;
            /* Full width */
            height: 100%;
            /* Full height */
            overflow-x: scroll;
            /* Enable scroll if needed */
            background-color: rgb(0, 0, 0);
            /* Fallback color */
            background-color: rgba(0, 0, 0, 0.9);
            /* Black w/ opacity */
        }

        /* Modal Content (image) */
        .modal-content1 {
            margin: auto;
            display: block;
            width: 80%;
            max-width: 700px;
        }

        /* Caption of Modal Image */
        #caption {
            margin: auto;
            display: block;
            width: 80%;
            max-width: 700px;
            text-align: center;
            color: #ccc;
            padding: 10px 0;
            height: 150px;
        }

        /* Add Animation */
        .modal-content1,
        #caption {
            -webkit-animation-name: zoom;
            -webkit-animation-duration: 0.6s;
            animation-name: zoom;
            animation-duration: 0.6s;
        }

        @-webkit-keyframes zoom {
            from {
                -webkit-transform: scale(0)
            }

            to {
                -webkit-transform: scale(1)
            }
        }

        @keyframes zoom {
            from {
                transform: scale(0)
            }

            to {
                transform: scale(1)
            }
        }

        /* The Close Button */
        .close {
            position: absolute;
            top: 15px;
            right: 45px;
            color: #f1f1f1;
            font-size: 40px;
            font-weight: bold;
            transition: 0.3s;
        }

        .close:hover,
        .close:focus {
            color: #bbb;
            text-decoration: none;
            cursor: pointer;
        }

        /* 100% Image Width on Smaller Screens */
        @media only screen and (max-width: 700px) {
            .modal-content1 {
                width: 100%;
            }
        }
    </style>
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
                                $itemArr = array();
                                while ($result = mysqli_fetch_assoc($results)) {
                                    $itemArr[] = $result;
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
                                                foreach ($itemArr as $key) {
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
                                                foreach ($itemArr as $key) {
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
                                                foreach ($itemArr as $key) {
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
                                                foreach ($itemArr as $key) {
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
    <!-- Modal -->
    <div class="modal fade" id="exampleModal1" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <form method="post">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">TRIMS & ACCESSORIES</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <table class="mb-0 table table-bordered order-list2" id="myTable2" width="100%">
                            <thead>
                                <tr>
                                    <th width="3%">#</th>
                                    <th width="40%">Name</th>
                                    <th width="40%">Description</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <th scope="row">1</th>
                                    <td>
                                        <input placeholder="Name" type="text" name="trim_name[]" class="mb-2 form-control-sm form-control" required>
                                    </td>
                                    <td>
                                        <input placeholder="Description" type="text" name="trim_description[]" class="mb-2 form-control-sm form-control" required>
                                    </td>
                                </tr>
                                <tr>
                                    <th scope="row">2</th>
                                    <td>
                                        <input placeholder="Name" type="text" name="trim_name[]" class="mb-2 form-control-sm form-control">
                                    </td>
                                    <td>
                                        <input placeholder="Description" type="text" name="trim_description[]" class="mb-2 form-control-sm form-control">
                                    </td>
                                </tr>
                                <tr>
                                    <th scope="row">3</th>
                                    <td>
                                        <input placeholder="Name" type="text" name="trim_name[]" class="mb-2 form-control-sm form-control">
                                    </td>
                                    <td>
                                        <input placeholder="Description" type="text" name="trim_description[]" class="mb-2 form-control-sm form-control">
                                    </td>
                                </tr>
                                <tr>
                                    <th scope="row">4</th>
                                    <td>
                                        <input placeholder="Name" type="text" name="trim_name[]" class="mb-2 form-control-sm form-control">
                                    </td>
                                    <td>
                                        <input placeholder="Description" type="text" name="trim_description[]" class="mb-2 form-control-sm form-control">
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

    <!-- The Modal -->
    <div id="myModal" class="modal1">
        <span class="close" id="close">&times;</span>
        <img class="modal-content1" class="img-fluid img-thumbnail rounded" id="img01">
        <div id="caption"></div>
    </div>

    <!--  image modal end -->
<?php }


include_once "controller/single_style.php";
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
                <div>Style Details
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
                            <td width="25%">Style No:</td>
                            <td width="75%" class="StyleNumber" data-id1="<?= $item['StyleID']; ?>" contenteditable><b><?= $item['StyleNumber'] ?></b></td>
                        </tr>
                        <tr>
                            <td>Description:</td>
                            <td class="StyleDescription" data-id1="<?= $item['StyleID']; ?>" contenteditable><b><?= $item['StyleDescription'] ?></b></td>
                        </tr>
                        <tr>
                            <td>Proto:</td>
                            <td class="StyleProto" data-id1="<?= $item['StyleID']; ?>" contenteditable><b><?= $item['StyleProto'] ?></b></td>
                        </tr>
                        <tr>
                            <td>DIV No:</td>
                            <td><b><?php echo $item['StyleDivitionNo'] ? $item['StyleDivitionNo'] : "No LC Found"; ?></b></td>
                        </tr>
                        <tr>
                            <td>Price:</td>
                            <td><b><?php echo ($item['StylePrice']) ? $item['StyleCurency'] . $item['StylePrice'] : "No LC Found"; ?></b></td>
                        </tr>
                        <tr>
                            <td>Fabric Details:</td>
                            <td class="StyleFabricDetails" data-id1="<?= $item['StyleID']; ?>" contenteditable><b><?= $item['StyleFabricDetails'] ?></b></td>
                        </tr>
                        <tr>
                            <td>Wash:</td>
                            <td class="StyleWash" data-id1="<?= $item['StyleID']; ?>" contenteditable><b><?= $item['StyleWash'] ?></b></td>
                        </tr>
                    </table>
                </div>
                <div class="col-md-6">
                    <img style="max-height:265px;" onclick="view('myImg');" id="myImg" src="<?= $path . $uploadpath . $item['StyleImage'] ?>" class="img-fluid img-thumbnail rounded" alt="Style No: <?= $item['StyleNumber'] ?>">
                </div>
            </div>
        </div>
    </div>
    <div class="main-card mb-3 card">
        <div class="card-body">
            <div class="row">
                <div class="col-md-6">
                    <h5 class="card-title">TRIMS & ACCESSORIES</h5>
                </div>
                <div class="col-md-6 text-right">
                    <!-- Button trigger modal -->
                    <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#exampleModal1">
                        Add TRIMS & ACCES
                    </button>
                </div>
            </div>
            <br>
            <div class="row">
                <div class="col-md-12">
                    <table class="table table-bordered table-hover text-center">
                        <?php
                        $sql = "SELECT TrimsAccessID, TrimsAccessName, TrimsAccessDescription FROM trimsaccess where Status = 1 AND TrimsAccessStyleID ='$id'";

                        $item = mysqli_query($conn, $sql);
                        while ($row = mysqli_fetch_assoc($item)) {
                            ?>
                            <tr>
                                <td><b><?= $row['TrimsAccessName'] ?></b></td>
                                <td><b><?= $row['TrimsAccessDescription'] ?></b></td>
                                <td>
                                    <a onclick="return confirm('Are You sure want to delete this item permanently?')" href="<?= $path ?>/index.php?page=single_style&id=<?= $id ?>&deletet=<?php echo $row['TrimsAccessID']; ?>" class="mb-2 mr-2 btn-transition btn-danger btn btn-sm btn-outline-secondary" id="details">
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
    <div class="main-card mb-3 card">
        <div class="card-body">
            <div class="container">
                <div class="row">
                    <div class="col-md-6">
                        <h5 class="card-title">Item Requirments</h5>
                    </div>
                    <div class="col-md-6 text-right">
                        <!-- Button trigger modal -->
                        <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#exampleModal">
                            Add Item Req
                        </button>
                    </div>
                </div>
            </div>
            <br>
            <div class="row">
                <div class="col-md-12">
                    <table class="table table-bordered table-hover text-center">
                        <thead>
                            <th>#</th>
                            <th>Name</th>
                            <th>Description</th>
                            <th>Size</th>
                            <th>Qty</th>
                            <th>Action</th>
                        </thead>
                        <tbody>
                            <?php
                            $sql = "SELECT ItemRequirmentID, ItemRequirmentItemID, ItemRequirmentSize, ItemRequirmentQty FROM itemrequirment WHERE status = 1 AND ItemRequirmentStyleID ='$id'";

                            $item = mysqli_query($conn, $sql);
                            $count = 1;
                            while ($row = mysqli_fetch_assoc($item)) {
                                $itemsql = "SELECT ItemName, ItemMeasurementUnit, ItemDescription FROM item WHERE ItemID = " . $row['ItemRequirmentItemID'];
                                $itemrow = mysqli_fetch_assoc(mysqli_query($conn, $itemsql));
                                ?>
                                <tr>
                                    <td><?= $count ?></td>
                                    <td><?= $itemrow['ItemName'] ?></td>
                                    <td><?= $itemrow['ItemDescription'] ?></td>
                                    <td><?= $row['ItemRequirmentSize'] ?></td>
                                    <td><?= $row['ItemRequirmentQty'] . " " . $itemrow['ItemMeasurementUnit'] ?></td>
                                    <td><a onclick="return confirm('Are You sure want to delete this item permanently?')" href="<?= $path ?>/index.php?page=single_style&id=<?= $id ?>&delete=<?php echo $row['ItemRequirmentID']; ?>" class="mb-2 mr-2 btn-transition btn-danger btn btn-sm btn-outline-secondary" id="details">
                                            <i class="fas fa-trash-alt" style="color: white;"></i>
                                        </a>
                                    </td>
                                </tr>
                            <?php $count++;
                            } ?>
                        </tbody>
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
                var id = $(this).attr("data-id1");
                var text = $(this).text();
                edit_data(id, text, "StyleNumber");
            });

            $(document).on('blur', '.StyleDescription', function() {
                var id = $(this).attr("data-id1");
                var text = $(this).text();
                edit_data(id, text, "StyleDescription");
            });

            $(document).on('blur', '.StyleProto', function() {
                var id = $(this).attr("data-id1");
                var text = $(this).text();
                edit_data(id, text, "StyleProto");
            });

            $(document).on('blur', '.StyleFabricDetails', function() {
                var id = $(this).attr("data-id1");
                var text = $(this).text();
                edit_data(id, text, "StyleFabricDetails");
            });

            $(document).on('blur', '.StyleWash', function() {
                var id = $(this).attr("data-id1");
                var text = $(this).text();
                edit_data(id, text, "StyleWash");
            });

        });
    </script>

<?php }
include_once "includes/footer.php";
?>