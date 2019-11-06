<?php

$PageTitle = "All Plan | Optima Inventory";
function customPageHeader()
{
    ?>
    <!--Arbitrary HTML Tags-->
<?php }

function modal()
{
    ?>
    <!--Modal Code if needed-->
<?php }

// keep the header always last.
include_once "includes/header.php";
$conn = db_connection();
?>

<div class="app-main__inner">
    <div class="app-page-title">
        <div class="page-title-wrapper">
            <div class="page-title-heading">
                <div class="page-title-icon">
                    <i class="pe-7s-note icon-gradient bg-mean-fruit">
                    </i>
                </div>
                <div>All Plan List
                    <div class="page-title-subheading">
                        All the plans created erlier.
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="main-card mb-3 card">
        <div class="card-body">
            <table class="table table-hover table-bordered">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Title</th>
                        <th>PO</th>
                        <th>Style</th>
                        <th>Details</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $sql = "SELECT p.id, p.title, p.poid, p.styleid, o.PONumber, s.StyleNumber FROM plan p LEFT JOIN po o ON o.POID = p.poid LEFT JOIN style s ON s.StyleID = p.styleid WHERE p.status = 1";
                    $result = mysqli_query($conn, $sql);
                    $count = 1;
                    while ($row = mysqli_fetch_assoc($result)) {
                        ?>
                        <tr>
                            <td><?= $count++ ?></td>
                            <td><?= $row['title'] ?></td>
                            <td>
                                <a class="btn btn-sm btn-outline-success" href="<?= $path ?>/index.php?page=po_single&poid=<?= $row['poid'] ?>" target="_blank">
                                    <?= $row['PONumber'] ?>
                                </a>
                            </td>
                            <td>
                                <a class="btn btn-sm btn-outline-success" href="<?= $path ?>/index.php?page=po_single&poid=<?= $row['styleid'] ?>" target="_blank">
                                    <?= $row['StyleNumber'] ?>
                                </a>
                            </td>
                            <td>
                                <a class="btn btn-sm btn-success" href="<?= $path ?>/index.php?page=single_plan&id=<?= $row['id'] ?>">
                                    Details
                                </a>
                            </td>
                        </tr>
                    <?php
                    }
                    ?>
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