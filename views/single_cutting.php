<?php

$PageTitle = " Cutting Details | Optima Inventory";
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

if (isset($_GET['cuttingid'])  && $_GET['cuttingid'] != '') {
    $cuttingid = $_GET['cuttingid'];
} else {
    nowgo('/index.php?page=all_cutting');
}

$conn = db_connection();

function modal()
{
    ?>
    <?php
    $conn = db_connection();
    $sql = "SELECT * FROM color WHERE status = 1";
    $results = mysqli_query($conn, $sql);
    while ($result = mysqli_fetch_assoc($results)) {
        echo '<option value="' . $result['id'] . '">' . $result['color'] . '</option>';
    }
    ?>
<?php }

$sql = "SELECT c.*,s.StyleNumber,p.PONumber FROM cutting_form c LEFT JOIN style s on s.StyleID=c.StyleID LEFT JOIN po p ON c.POID = p.POID WHERE c.Status = 1 and CuttingFormID=".$cuttingid;
$single_cutting = mysqli_fetch_assoc(mysqli_query($conn, $sql));

include_once "controller/add_cutting_description.php";
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
                <div>Cutting Details
                    <div class="page-title-subheading">
                        Single
                    </div>
                </div>
            </div>

            <div class="page-title-actions">
                <div class="d-inline-block dropdown">
                    <a href="<?= $path ?>/index.php?page=cutting_edit&cuttingid=<?= $cuttingid ?>" aria-expanded="false" class="btn-shadow btn btn-info">
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
                        <th>Date</th>
                        <th>Cutting No.</th>
                        <th>Style Number</th>
                        <th>PO NO.</th>

                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td><?=$single_cutting['date']?></td>
                        <td><?=$single_cutting['CuttingNo']?></td>
                        <td><?=$single_cutting['StyleNumber']?></td>
                        <td><?=$single_cutting['PONumber']?></td>
                    </tr>

                </tbody>
            </table>

        </div>
    </div>
    <div class="main-card mb-3 card">
        <div class="card-body">
            <div class="row">
                <div class="col-md-6">
                    <h5 class="card-title">Cuttign Description</h5>
                </div>
                <div class="col-md-6 text-right">
                    <!-- Button trigger modal -->
                    <a class="btn btn-primary"href="<?= $path ?>/index.php?page=add_new_cutting_form&&cutting_id=<?= $single_cutting['CuttingFormID']; ?>">Add Cutting Description</a>                        
                </div>
            </div>
            <br>
            <div class="row">
                <div class="col-md-12">
                    <table class="table table-bordered table-hover text-center">
                        <thead>
                            <th>#</th>
                            <th>Color</th>
                            <th>Size</th>
                            <th>Qty</th>
                            <th>Print & EMB Send</th>
                            <th>Print & EMB Receive	</th>
                            <th>Remark</th>
                            <th>Action</th>
                        </thead>
                        <tbody>
                            <?php

                            $sqlo = "SELECT d.*,c.color,s.size FROM cutting_form_description d LEFT JOIN color c ON c.id=d.Color LEFT JOIN size s on s.id=d.Size WHERE c.Status=1
                            and CuttingFormID=".$cuttingid;
                            $count = 1;
                            $cutting = mysqli_query($conn, $sqlo);

                            while ($rowo = mysqli_fetch_assoc($cutting)) {
                                ?>
                                <tr>
                                    <td><?= $count ?></td>
                                    <td><?= $rowo['color'] ?></td>
                                    <td><?= $rowo['size'] ?></td>
                                    <td><?= $rowo['Qty'] ?></td>
                                    <td><?= $rowo['PrintEMBSent'] ?></td>
                                    <td><?= $rowo['PrintEmbReceive'] ?></td>
                                    <td><?= $rowo['remark'] ?></td>
                                    <td><a onclick="return confirm('Are You sure want to delete this item permanently?')" href="<?= $path ?>/index.php?page=single_cutting&cuttingid=<?= $cuttingid ?>&cutid=<?php echo $rowo['ID']; ?>" class="mb-2 mr-2 btn-transition btn-danger btn btn-sm btn-outline-secondary" id="details">
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
