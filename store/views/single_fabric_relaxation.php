<?php

$PageTitle = "Details Fabric Relaxation | Optima Inventory";
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

if (isset($_GET['fabricid'])  && $_GET['fabricid'] != '') {
    $fabricid = $_GET['fabricid'];
} else {
    nowgo('/index.php?page=all_fabric_relaxation');
}

$conn = db_connection();

$sql = "SELECT f.*,s.StyleNumber,b.BuyerName,c.color FROM fab_relaxation f LEFT JOIN color c ON f.Color = c.id LEFT JOIN style s on s.StyleID=f.StyleID LEFT JOIN buyer b ON b.BuyerID=f.BuyerID WHERE f.Status = 1 and FabRelaxationID=".$fabricid;
$single_fabric = mysqli_fetch_assoc(mysqli_query($conn, $sql));

include_once "controller/add_fabric_description.php";
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
                <div>Fabric Relaxation Details
                    <div class="page-title-subheading">
                        Single
                    </div>
                </div>
            </div>

            <div class="page-title-actions">
                <div class="d-inline-block dropdown">
                    <a href="<?= $path ?>/index.php?page=fabric_relaxtion_edit&fabricid=<?= $fabricid ?>" aria-expanded="false" class="btn-shadow btn btn-info">
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
                        <th>Color</th>

                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td><?=$single_fabric['BuyerName']?></td>
                        <td><?=$single_fabric['StyleNumber']?></td>
                        <td><?=$single_fabric['color']?></td>
                    </tr>

                </tbody>
            </table>

        </div>
    </div>
    <div class="main-card mb-3 card">
        <div class="card-body">
            
            <div class="row">
                <div class="col-md-12">
                    <table class="table table-bordered table-hover text-center">
                        <thead>
                            <th>#</th>
                            <th>Date</th>
                            <th>Shade</th>
                            <th>Shrinkage%</th>
                            <th>ROLL NO</th>
                            <th>YDS</th>
                            <th>Shade</th>
                            <th>Shrinkage%</th>
                            <th>Roll No	</th>
                            <th>YDS</th>
                            <th>Total YDS</th>
                            <th>Fabric<br> Open <br> Time</th>
                            <th>Fabric<br> Lay <br> Date</th>
                            <th>Fabric<br> Lay <br> Time</th>
                            <th>Total<br> Hours </th>
                            <th>Remarks</th>
                            <th>Action</th>
                        </thead>
                        <tbody>
                            <?php

                            $sqlo = "SELECT * FROM fab_relaxation_description Where Status=1 and FabRelaxationID=".$fabricid;
                            $count = 1;
                            $order = mysqli_query($conn, $sqlo);

                            while ($rowo = mysqli_fetch_assoc($order)) {
                                ?>
                                <tr>
                                    <td><?= $count ?></td>
                                    <td><?= $rowo['Date'] ?></td>
                                    <td><?= $rowo['Shade'] ?></td>
                                    <td><?= $rowo['Shrinkage'] ?></td>
                                    <td><?= $rowo['RollNo'] ?></td>
                                    <td><?= $rowo['Yds'] ?></td>
                                    <td><?= $rowo['Shade2'] ?></td>
                                    <td><?= $rowo['Shrinkage2'] ?></td>
                                    <td><?= $rowo['RollNo2'] ?></td>
                                    <td><?= $rowo['Yds2'] ?></td>
                                    <td><?= $rowo['TotalYds'] ?></td>
                                    <td><?= $rowo['fabricOpenTime'] ?></td>
                                    <td><?= $rowo['FabricLayDate'] ?></td>
                                    <td><?= $rowo['FabricLayTime'] ?></td>
                                    <td><?= $rowo['TotalHours'] ?></td>
                                    <td><?= $rowo['Remarks'] ?></td>
                                    <td><a onclick="return confirm('Are You sure want to delete this item permanently?')" href="<?= $path ?>/index.php?page=single_fabric_relaxation&fabricid=<?= $fabricid ?>&fabid=<?php echo $rowo['ID']; ?>" class="mb-2 mr-2 btn-transition btn-danger btn btn-sm btn-outline-secondary" id="details">
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
