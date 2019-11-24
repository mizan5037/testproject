<?php

$page_privilege = 4;
hasAccess();

$PageTitle = "All B2B LC | Optima Inventory";
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
                <div>ALL B2B LC
                    <div class="page-title-subheading">
                        All the B2B LC created Upto Now.
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="main-card mb-3 card">
        <div class="card-body">
            <h5 class="card-title">LC List</h5>
            <table class="mb-0 table table-striped table-hover table-bordered">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>B2B LC Number</th>
                        <th>Supplier Name</th>
                        <th>Issue Date</th>
                        <th>Maturity Date</th>
                        <th>Details</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $conn = db_connection();
                    $paginate = paginate('b2blc');
                    $add_sql = $paginate['sql'];
                    $page_no = $paginate['page_no'];
                    $total_pages = $paginate['total_pages'];
                    $sql = "SELECT B2BLCNumber, Maturitydate, SupplierName, Issuedate, B2BLCID FROM b2blc WHERE Status = 1" . $add_sql;
                    $buyer = mysqli_query($conn, $sql);

                    $count = ($page_no * 10) - 9;
                    while ($key = mysqli_fetch_assoc($buyer)) {


                        ?>
                        <tr>
                            <th scope="row"><?= $count++ ?></th>
                            <td><?= $key['B2BLCNumber'] ?></td>
                            <td><?= $key['SupplierName'] ?></td>
                            <td><?= $key['Issuedate'] ?></td>
                            <td><?= $key['Maturitydate'] ?></td>
                            <td>
                                <a href="<?= $path ?>/index.php?page=single_b2b_lc&id=<?= $key['B2BLCID'] ?>" class="mb-2 mr-2 btn-transition btn btn-sm btn-outline-secondary">
                                    Details
                                </a>
                            </td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
            <br><br>
            <div class="row">
                <div class="col-md-12">
                    <?php
                    links($page_no, $total_pages);
                    ?>
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