<?php

$PageTitle = "All Style | Optima Inventory";
function customPageHeader()
{
    ?>
    <!--Arbitrary HTML Tags-->
<?php }
include_once "includes/header.php";

?>

<div class="app-main__inner">
    <div class="app-page-title">
        <div class="page-title-wrapper">
            <div class="page-title-heading">
                <div class="page-title-icon">
                    <i class="pe-7s-news-paper icon-gradient bg-mean-fruit">
                    </i>
                </div>
                <div>ALL Style
                    <div class="page-title-subheading">
                        All the Item created Upto Now.
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="main-card mb-3 card">
        <div class="card-body">
            <h5 class="card-title">Style List</h5>
            <table class="mb-0 table table-striped table-hover">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Name</th>
                        <th>Description</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $conn = db_connection();
                    $sql = "SELECT StyleNumber, StyleDescription, StyleID FROM style WHERE status = 1";
                    $item = mysqli_query($conn, $sql);

                    $count = 1;
                    while ($row = mysqli_fetch_assoc($item)) {


                        ?>
                        <tr>
                            <th scope="row"><?= $count ?></th>
                            <td><?= $row['StyleNumber'] ?></td>
                            <td><?= $row['StyleDescription'] ?></td>
                            <td>
                                <a href="<?= $path ?>/index.php?page=single_style&id=<?= $row['StyleID'] ?>" class="mb-2 mr-2 btn-transition btn btn-sm btn-outline-secondary">
                                    Details
                                </a>
                            </td>
                        </tr>
                    <?php }  ?>
                </tbody>
            </table>
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