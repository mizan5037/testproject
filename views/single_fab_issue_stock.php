<?php

$PageTitle = "Fabric Stock Details | Optima Inventory";
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
include_once "controller/single_fab_issue_stock.php";
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
                <div>Fabric Deatils
                    <div class="page-title-subheading">
                        All Issued and issue info
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php
    if (isset($fab_issue)) {
        ?>
        <div class="main-card mb-3 card text-center">
            <div class="card-body">
                <h5 class="card-title">
                    Buyer:
                    <a class="btn btn-sm btn-outline-success" href="<?= $path ?>/index.php?page=single_buyer&buyer_id=<?= $buyer_id ?>" target="_blank">
                        <?= getname('buyer', 'BuyerName', 'BuyerID', $fab_issue['BuyerID']) ?>
                    </a>
                    &nbsp; &nbsp; &nbsp;
                    Style:
                    <a class="btn btn-sm btn-outline-success" href="<?= $path ?>/index.php?page=single_style&id=<?= $style ?>" target="_blank">
                        <?= getname('style', 'StyleNumber', 'StyleID', $fab_issue['StyleID']) ?>
                    </a>
                </h5>
            </div>
        </div>
        <?php
      }
        if (isset($fab_issue_other)) {
            ?>
            <div class="main-card mb-3 card text-center">
                <div class="card-body">
                    <h5 class="card-title">
                        Buyer:
                        <a class="btn btn-sm btn-outline-success" href="<?= $path ?>/index.php?page=single_buyer&buyer_id=<?= $buyer_id ?>" target="_blank">
                            <?= getname('buyer', 'BuyerName', 'BuyerID', $fab_issue_other['BuyerID']) ?>
                        </a>
                        &nbsp; &nbsp; &nbsp;
                        Style:
                        <a class="btn btn-sm btn-outline-success">
                            <?= $fab_issue_other['ContrastPocket'] ?>
                        </a>
                    </h5>

                </div>
            </div>
          <?php } ?>
        <div class="main-card mb-3 card">
            <div class="card-body">

                <table class="table table-bordered table-hover text-center">
                    <thead>
                        <tr>
                          <?php
                          if (isset($fab_issue_d)) {
                            echo "<th colspan='9'>Fabric Issued</th>";
                          ?>
                            <th><a type="button" class="btn btn-primary btn-sm" href="<?= $path ?>/index.php?page=fab_issue">Add New</a></th>
                          <?php
                          }
                          if(isset($fab_issue_other_d)){
                            echo "<th colspan='9'>Fabric Issued Other</th>";
                            print_r( $fab_issue_other_d);
                            ?>
                              <th class=""><a type="button" class="btn btn-primary btn-sm" href="<?= $path ?>/index.php?page=fab_issue_other">Add New</a></th>
                            <?php
                            }
                            ?>


                        </tr>
                        <tr>
                            <th>#</th>
                            <th>Particulars</th>
                            <th>Color</th>
                            <th>QTZ (DZ)</th>
                            <th>Consuption (yds)</th>
                            <th>RQD QTY (yds)</th>
                            <th>ISSUE QTY (yds)</th>
                            <th>Roll</th>
                            <th>Issue Date</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php

                          if (isset($fab_issue_d)) {

                            $count = 1;
                            while ($row = mysqli_fetch_assoc($fab_issue_d)) {
                                ?>
                            <tr>
                                <td><?= $count++ ?></td>
                                <td><?= $row['Particulars'] ?></td>
                                <td><?= getname('color', 'color', 'id', $row['Color']) ?></td>
                                <td><?= $row['Qtz'] ?></td>
                                <td><?= $row['Consumption'] ?></td>
                                <td><?= $row['RqdQty'] ?></td>
                                <td><?= $row['IssueQty'] ?></td>
                                <td><?= $row['Roll'] ?></td>
                                <td><?= date('j-M-Y', strtotime($row['timestamp'])) ?></td>
                                <td>
                                  <a href="<?=$path?>/index.php?page=update_fab_issue&fabissue_d_id=<?= $row['ID'] ?>&fabissueid=<?= $fab_issue['FabIssueID']?>" class="btn btn-sm btn-primary">Edit</a>


                                  <form class="" method="post">
                                      <input type="hidden" name="id" value="<?= $row['ID'] ?>">
                                      <button class="btn btn-danger"type="submit" onclick="return confirm('Are You sure want to delete this item permanently?')" name="submit"><i class="fas fa-trash-alt" style="color: white;"></i></button>
                                  </form>
                                </td>
                            </tr>
                        <?php
                            }
                          }
                          if(isset($fab_issue_other_d)){
                            $count = 1;
                            while ($row = mysqli_fetch_assoc($fab_issue_other_d)) {
                              ?>
                              <tr>
                                  <td><?= $count++ ?></td>
                                  <td><?= $row['Particulars'] ?></td>
                                  <td><?= getname('color', 'color', 'id', $row['Color']) ?></td>
                                  <td><?= $row['Qtz'] ?></td>
                                  <td><?= $row['Consumption'] ?></td>
                                  <td><?= $row['RqdQty'] ?></td>
                                  <td><?= $row['IssueQty'] ?></td>
                                  <td><?= $row['Roll'] ?></td>
                                  <td><?= date('j-M-Y', strtotime($row['timestamp'])) ?></td>
                                  <td>
                                    <a href="<?=$path?>/index.php?page=update_fab_issue&fabissue_other_d_id=<?=$row['ID'] ?>&fab_issue_other_id=<?=$fab_issue_other['ID']?>" class="btn btn-sm btn-primary">Edit</a>
                                    <form class="" method="post">
                                        <input type="hidden" name="id1" value="<?= $row['ID'] ?>">
                                        <button class="btn btn-danger"type="submit" onclick="return confirm('Are You sure want to delete this item permanently?')" name="submit1"><i class="fas fa-trash-alt" style="color: white;"></i></button>
                                    </form>
                                  </td>
                              </tr>
                              <?php
                          }}

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
