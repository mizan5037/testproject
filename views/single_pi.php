<?php

$PageTitle = "Details PI | Optima Inventory";
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
$conn = db_connection();

if (isset($_GET['piid']) && $_GET['piid'] != '') {
    $piid = $_GET['piid'];
} else {
    nowgo('/index.php?page=all_pi');
}


include_once "controller/add_pidescription.php";


function modal()
{
    ?>
    <!-- Modal -->

    <!-- Modal End -->
    <!-- Modal -->
    <div class="modal fade" id="exampleModal1" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <form method="post">
                <div class="modal-content" style="width:180%; margin-left:-200px;">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">PI Description</h5>
                    </div>
                    <div class="modal-body">
                        <table class="mb-0 table table-bordered order-list2" id="myTable2" width="100%">
                            <thead>
                                <tr>
                                    <th width="20%">PO No</th>
                                    <th width="20%">Item</th>
                                    <th width="30%">Description</th>
                                    <th width="15%">Qty</th>
                                    <th width="15%">Price Per Unit</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>
                                        <select name="po" class="po mb-2 form-control-sm form-control" required>
                                            <option></option>
                                            <?php
                                                $conn = db_connection();
                                                $sql = "SELECT * FROM po WHERE status = 1";
                                                $results = mysqli_query($conn, $sql);
                                                while ($result = mysqli_fetch_assoc($results)) {
                                                    echo '<option value="' . $result['POID'] . '">' . $result['PONumber'] . '</option>';
                                                }
                                                ?>
                                        </select>
                                    </td>
                                    <td>

                                        <select name="item" class="item mb-2 form-control-sm form-control" required>
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

                                    </td>
                                    <td>
                                        <textarea placeholder="Description" name="description" type="text" class="mb-2 form-control-sm form-control"></textarea>
                                    </td>
                                    <td>
                                        <input placeholder="Qty" id="qty" name="qty" type="number" class="mb-2 form-control-sm form-control">
                                    </td>
                                    <td>
                                        <input id="ppu" name="ppu" type="number" class="mb-2 form-control-sm form-control">
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


    <!--  image modal end -->

<?php }

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
                <div>PI Details
                    <div class="page-title-subheading">
                        Single
                    </div>
                </div>
            </div>

            <div class="page-title-actions">
                <div class="d-inline-block dropdown">
                    <a href="<?= $path ?>/index.php?page=pi_edit&id=<?= $piid ?>" aria-expanded="false" class="btn-shadow btn btn-info">
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
                    <h5 class="card-title">PI</h5>
                </div>

            </div>
            <br>
            <div class="row">
                <div class="col-md-12">
                    <table class="table table-bordered table-hover text-center">
                        <thead>
                            <th>Reference Number</th>
                            <th>Issue Date</th>
                            <th>Supplier</th>

                        </thead>
                        <tbody>
                            <?php

                            $sql = "SELECT * FROM pi where PIID='$piid'";

                            $single_pi = mysqli_fetch_assoc(mysqli_query($conn, $sql));
                            ?>
                            <tr>
                                <td><?= $single_pi['RefNo'] ?></td>
                                <td><?= $single_pi['IssueDate'] ?></td>
                                <td><?= $single_pi['SupplierName'] ?></td>

                            </tr>

                        </tbody>
                    </table>
                </div>

            </div>
        </div>
    </div>
    <div class="main-card mb-3 card">
        <div class="card-body">
            <div class="row">
                <div class="col-md-6">
                    <h5 class="card-title">PI Description</h5>
                </div>
                <div class="col-md-6 text-right">
                    <!-- Button trigger modal -->
                    <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#exampleModal1">
                        Add PO
                    </button>
                </div>
            </div>
            <br>
            <div class="row">
                <div class="col-md-12">
                    <table class="table table-bordered table-hover text-center">
                        <thead>
                            <th>#</th>
                            <th>PO Number</th>
                            <th>Item</th>
                            <th>Description</th>
                            <th>Qty</th>
                            <th>Price Per Unit</th>
                            <th>Total Price</th>
                            <th>Action</th>
                        </thead>
                        <tbody>
                            <?php
                            $sql = "SELECT * FROM pi_description where PIID ='$piid' AND Status=1";

                            $all = mysqli_query($conn, $sql);
                            $count = 1;
                            while ($row = mysqli_fetch_assoc($all)) {

                                $sql = "SELECT PONumber FROM po where POID=" . $row['POID'];
                                $po_number = mysqli_fetch_assoc(mysqli_query($conn, $sql));
                                $sql = "SELECT ItemName FROM item where ItemID=" . $row['ItemID'];
                                $item_name = mysqli_fetch_assoc(mysqli_query($conn, $sql));



                                ?>
                                <tr>
                                    <td><?= $count ?></td>
                                    <td> <a class="btn btn-sm btn-outline-success" target="_blank" href="<?=$path?>/index.php?page=po_single&poid=<?=$row['POID']?>"> <?= $po_number['PONumber'] ?></a></td>
                                    <td> <a class="btn btn-sm btn-outline-success" href="<?=$path?>/index.php?page=all_item" target="_blank"><?= $item_name['ItemName'] ?></a> </td>
                                    <td><?= $row['Description'] ?></td>
                                    <td><?= $row['Qty'] ?></td>
                                    <td><?= $row['PricePerUnit'] ?></td>
                                    <td><?= $row['TotalPrice'] ?></td>
                                    <td><a onclick="return confirm('Are You sure want to delete this item permanently?')" href="<?= $path ?>/index.php?page=single_pi&piid=<?= $piid ?>&piddel=<?php echo $row['PIDescriptionID']; ?>" class="mb-2 mr-2 btn-transition btn-danger btn btn-sm btn-outline-secondary" id="details">
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
    </script>

<?php }
include_once "includes/footer.php";
?>