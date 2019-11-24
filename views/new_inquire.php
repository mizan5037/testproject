<?php

$page_privilege = 3;
hasAccess();

$PageTitle = "New Inquire | Optima Inventory";
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

function modal()
{
    ?>
    <!-- The Modal -->
    <div id="myModal" class="modal1">
        <span class="close" id="close">&times;</span>
        <img class="modal-content1" class="img-fluid img-thumbnail rounded" id="img01">
        <div id="caption"></div>
    </div>

    <!--  image modal end -->
<?php
}
include_once "controller/new_inquire.php";
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
                <div>New Inquire
                    <div class="page-title-subheading">
                        Inquire
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="main-card mb-3 card">
        <div class="card-body">
            <h5 class="card-title">Search New Inquire</h5>
            <form method="post">
                <div class="form-row">
                    <div class="col-md-4 mb-3">
                        <input type="text" class="form-control form-control-sm" name="style" id="validationTooltip01" placeholder="Style Number">
                    </div>
                    <div class="col-md-4 mb-3">
                        <input type="submit" class="btn btn-sm btn-success">
                    </div>
                </div>
            </form>
        </div>
    </div>
    <?php

    if (isset($row)) {
        if ($row) {
            while ($result = mysqli_fetch_assoc($row)) {
                ?>
                <div class="main-card mb-3 card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6">
                                <table class="table table-bordered">
                                    <tr>
                                        <td width="25%">Style No:</td>
                                        <td> <b><?= $result['StyleNumber'] ?></b> </td>
                                    </tr>
                                    <tr>
                                        <td width="25%">Wash:</td>
                                        <td> <b><?= $result['StyleWash'] ?></b> </td>
                                    </tr>
                                    <tr>
                                        <td>Description:</td>
                                        <td> <b><?= $result['StyleDescription'] ?></b></td>
                                    </tr>
                                    <tr>
                                        <td>Proto:</td>
                                        <td> <b><?= $result['StyleProto'] ?></b></td>
                                    </tr>
                                    <tr>
                                        <td>DIV No: </td>
                                        <td><b><?= !getDivision($result['StyleID']) ? 'No Related PO Found' : getDivision($result['StyleID']) ?></b></td>
                                    </tr>
                                    <tr>
                                        <td>Price: </td>
                                        <td><b><?= !getPrice($result['StyleID']) ? 'No Related LC Found' : getPrice($result['StyleID']) ?></b> </td>
                                    </tr>
                                </table>
                            </div>
                            <div class="col-md-6">
                                <img style="max-height:265px;" onclick="view('<?= $result['StyleImage'] ?>');" id="<?= $result['StyleImage'] ?>" src="<?= $path . $uploadpath . $result['StyleImage'] ?>" class="img-fluid img-thumbnail rounded" alt="Style No: <?= $result['StyleNumber'] ?>">
                            </div>
                        </div>
                    </div>
                </div>
    <?php
            }
        } else {
            echo 'No Data Found';
        }
    }

    ?>

</div>




<?php
function customPagefooter()
{
    ?>

    <!-- Extra Script Here -->
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