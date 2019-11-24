<?php

$page_privilege = 4;
hasAccess();

$PageTitle = "All PO Given | Optima Inventory";
function customPageHeader()
{
    ?>
    <!--Arbitrary HTML Tags-->
<?php }
$conn = db_connection();
if (isset($_GET['delete_pi'])) {
    $id = $_GET['delete_pi'];
    $sql = "UPDATE pi SET Status = 0 where PIID=" . $id;
    if (mysqli_query($conn, $sql)) {
        notice('danger', 'PI Deleted  Successfully');
    } else {
        notice('error', $sql . "<br>" . mysqli_error($conn));
    }
}

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
                <div>ALL PI
                    <div class="page-title-subheading">
                        All the PI Given created Upto Now.
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="main-card mb-3 card">
        <div class="card-body">
            <h5 class="card-title">PI List</h5>
            <table class="mb-0 table table-striped table-hover">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Reference No.</th>
                        <th>Issue Date</th>
                        <th>Details</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $paginate = paginate('pi');
                    $add_sql = $paginate['sql'];
                    $page_no = $paginate['page_no'];
                    $total_pages = $paginate['total_pages'];
                    $sql = "SELECT * FROM pi WHERE status = 1" . $add_sql;
                    $pi = mysqli_query($conn, $sql);

                    $count = ($page_no * 10) - 9;
                    while ($key = mysqli_fetch_assoc($pi)) {

                        ?>
                        <tr>
                            <th scope="row"><?= $count++ ?></th>
                            <th scope="row"><?= $key['RefNo']  ?></th>
                            <td><?= $key['IssueDate']  ?></td>
                            <td>
                                <a href="<?= $path ?>/index.php?page=single_pi&piid=<?php echo $key['PIID']; ?>" class="mb-2 mr-2 btn-transition btn btn-sm btn-outline-secondary">
                                    Details
                                </a>
                                <a href="<?= $path ?>/index.php?page=all_pi&delete_pi=<?php echo $key['PIID']; ?>" class="mb-2 mr-2 btn-transition btn btn-sm btn-outline-danger">
                                    DELETE
                                </a>
                                <a href="<?= $path ?>/index.php?page=pi_edit&id=<?php echo $key['PIID']; ?>" class="mb-2 mr-2 btn-transition btn btn-sm btn-outline-primary">
                                    EDIT
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