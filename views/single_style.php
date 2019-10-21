<?php

$PageTitle = "New Inquire | Optima Inventory";
function customPageHeader()
{
    ?>
    <!--Arbitrary HTML Tags-->
<?php }

$conn = db_connection();
if (isset($_GET['id'])) {
    $id = $_GET['id'];

    $sql = "SELECT * FROM style where StyleID='$id'";;

    $item = mysqli_fetch_assoc(mysqli_query($conn, $sql));
}else{
    nowgo('/index.php?page=all_style');
}
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
            <h5 class="card-title">Style No: <?=$item['StyleNumber']?></h5>
            <div class="row">
                <div class="col-md-6">
                    <ul>
                        <li>Description: <b><?=$item['StyleDescription']?></b></li>
                        <li>Proto: <b><?=$item['StyleProto']?></b></li>
                        <li>DIV No: <b><?=$item['StyleDivitionNo']?></b></li>
                        <li>Price: <b><?=$item['StyleCurency']?><?=$item['StylePrice']?></b> </li>
                        <li>Wash: <b><?=$item['StyleWash']?></b> </li>
                    </ul>
                </div>
                <div class="col-md-6">
                    <img src="<?= $path ?><?=$item['StyleImage']?>" class="img-fluid img-thumbnail rounded" alt="No Image">
                </div>
            </div>
        </div>
    </div>
    <div class="main-card mb-3 card">
        <div class="card-body">
            <h5 class="card-title">TRIMS & ACCESSORIES</h5>
            <div class="row">
                <div class="col-md-12">
                    <table class="table table-bordered text-center">
                        <?php
                        $sql = "SELECT TrimsAccessName, TrimsAccessDescription FROM trimsaccess where TrimsAccessStyleID ='$id'";;

                        $item = mysqli_query($conn, $sql);
                        while($row = mysqli_fetch_assoc($item)) {
                        ?>
                        <tr>
                            <td><b><?=$row['TrimsAccessName']?></b></td>
                            <td><b><?=$row['TrimsAccessDescription']?></b></td>
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
    ?>

    <!-- Extra Script Here -->

<?php }
include_once "includes/footer.php";
?>