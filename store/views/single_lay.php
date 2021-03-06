<?php

$PageTitle = "Lay Details | Optima Inventory";
function customPageHeader()
{
    ?>
    <style>
        img {
            cursor: pointer;
            transition: 0.3s;
        }

        img:hover {
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

if (isset($_GET['layid'])  && $_GET['layid'] != '') {
    $layid = $_GET['layid'];
} else {
    nowgo('/index.php?page=all_lay');
}

$conn = db_connection();

function modal()
{
    ?>
    <!-- Modal -->

    <!--  image modal end -->

<?php }

$sql = "SELECT * FROM lay_form f LEFT JOIN buyer b on b.BuyerID=f.BuyerID LEFT JOIN style s on s.StyleID=f.StyleID LEFT JOIN po p ON p.POID=f.POID WHERE f.Status = 1 and LayFormID=" . $layid;
$single_lay = mysqli_fetch_assoc(mysqli_query($conn, $sql));

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
                <div>Lay Details
                    <div class="page-title-subheading">
                        Single
                    </div>
                </div>
            </div>

            <div class="page-title-actions">
                <div class="d-inline-block dropdown">
                    <a href="<?= $path ?>/index.php?page=lay_edit&layid=<?= $layid ?>" aria-expanded="false" class="btn-shadow btn btn-info">
                        Edit
                    </a>
                </div>
            </div>
        </div>
    </div>

    <div class="main-card mb-3 card">
        <div class="card-body">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>Buyer Name</th>
                        <th>Style No.</th>
                        <th>PO NO.</th>
                        <th>Cutting NO.</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td><?= $single_lay['BuyerName'] ?></td>
                        <td><?= $single_lay['StyleNumber'] ?></td>
                        <td><?= $single_lay['PONumber'] ?></td>
                        <td><?= $single_lay['CuttingNo'] ?></td>
                    </tr>

                </tbody>
            </table>
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>Unit.</th>
                        <th>Date</th>
                        <th>M/W</th>
                        <th>Marker Length</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td><?= $single_lay['Unit'] ?></td>
                        <td><?= $single_lay['Date'] ?></td>
                        <td><?= $single_lay['MarkerWidth'] ?></td>
                        <td><?= $single_lay['MarkerLength'] ?></td>
                    </tr>

                </tbody>
            </table>
        </div>
    </div>
    <div class="main-card mb-3 card">
        <div class="card-body">
            <div class="row">
                <div class="col-md-6">
                    <h5 class="card-title">Lay Description</h5>
                </div>
                <div class="col-md-6 text-right">
                    <a href="<?= $path ?>/index.php?page=add_new_lay&lay_id=<?=$layid?>" class="btn btn-primary"> Add Lay</a>

                </div>
            </div>
            <br>
            <div class="row">
                <div class="col-md-12">
                    <table class="table table-bordered table-hover text-center">
                        <thead>
                            <th>#</th>
                            <th>Color</th>
                            <th>LOTNO</th>
                            <th>SL.NO.</th>
                            <th>ROLL NO</th>
                            <th>TTL Fabrics/yds</th>
                            <th>Lay</th>
                            <th>Used Fabrics/yds</th>
                            <th>Remaining</th>
                            <th>Exxess/Short</th>
                            <th>Sticker</th>
                            <th>Action</th>
                        </thead>
                        <tbody>
                            <?php

                            $sqlo = "SELECT f.*,c.color FROM lay_form_details f LEFT JOIN color c ON c.id = f.Color where f.layFormID ='$layid' AND f.Status=1";
                            $count = 1;
                            $order = mysqli_query($conn, $sqlo);

                            while ($rowo = mysqli_fetch_assoc($order)) {
                                ?>
                                <tr>
                                    <td><?= $count ?></td>
                                    <td><?= $rowo['color'] ?></td>
                                    <td><?= $rowo['LotNo'] ?></td>
                                    <td><?= $rowo['SlNo'] ?></td>
                                    <td><?= $rowo['RollNo'] ?></td>
                                    <td><?= $rowo['TTLFabricsYds'] ?></td>
                                    <td><?= $rowo['Lay'] ?></td>
                                    <td><?= $rowo['UsedFabricYds'] ?></td>
                                    <td><?= $rowo['RemainingYds'] ?></td>
                                    <td><?= $rowo['Shortage'] ?></td>
                                    <td><?= $rowo['Sticker'] ?></td>
                                    <td><a onclick="return confirm('Are You sure want to delete this item permanently?')" href="<?= $path ?>/index.php?page=single_lay&layid=<?= $layid ?>&layde=<?php echo $rowo['ID']; ?>" class="mb-2 mr-2 btn-transition btn-danger btn btn-sm btn-outline-secondary" id="details">
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

            <div class="row">

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
        var span = document.getElementById("myModal");

        // When the user clicks on <span> (x), close the modal
        span.onclick = function() {
            modal.style.display = "none";
        }
    </script>

<?php }
include_once "includes/footer.php";
?>