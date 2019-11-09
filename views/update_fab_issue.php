<?php

$PageTitle = "Fabric Issue | Optima Inventory";
function customPageHeader()
{
    ?>
    <!--Arbitrary HTML Tags-->
<?php }
include_once "controller/update_fab_issue.php";
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
                <div>Fabric Issue Update
                    <div class="page-title-subheading">
                        Fabric Issue Update
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="main-card mb-3 card">
        <div class="card-body">
            <!-- <h5 class="card-title">Card Title</h5> -->
            <div class="container">
                <form action="" class="needs-validation" method="POST" novalidate>
                    <div class="form-row">
                        <table id="myTable" class="order-list table table-hover table-bordered">
                            <thead>
                                <tr>
                                    <th>Particulars</th>
                                    <th>Color</th>
                                    <th>QTZ (DZ)</th>
                                    <th>Consuption (yds)</th>
                                    <th>RQD QTY (yds)</th>
                                    <th>ISSUE QTY (yds)</th>
                                    <th>Roll</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>
                                        <input type="hidden" name="fab_issue_des" value="<?php if(isset($fab_issue_des)){ echo $fab_issue_des;} else {echo "0";} ?>">
                                        <input type="hidden" name="fab_issue_other_des" value="<?php if(isset($fab_issue_other_des)){ echo $fab_issue_other_des;} else {echo "0";} ?>">

                                        <input class="mb-2 form-control-sm form-control" type="text" placeholder="Particulars" name="Particulars" value="<?= $fd_sql['Particulars']; ?>" />
                                    </td>
                                    <td>
                                        <select name="Color" class="style mb-2 form-control-sm form-control" required>
                                            <option value="<?= $fd_sql['Color']; ?>"><?= getname('color', 'color', 'id', $fd_sql['Color']) ?></option>
                                            <?php
                                            $conn = db_connection();
                                            $sql = "SELECT * FROM color WHERE status = 1";
                                            $results = mysqli_query($conn, $sql);
                                            while ($result = mysqli_fetch_assoc($results)) {
                                                echo '<option value="' . $result['id'] . '">' . $result['color'] . '</option>';
                                            }
                                            ?>
                                        </select>
                                    </td>
                                    <td>
                                        <input class="mb-2 form-control-sm form-control" type="number" placeholder="QTZ (DZ)" name="Qtz" value="<?= $fd_sql['Qtz'] ?>" />
                                    </td>
                                    <td>
                                        <input class="mb-2 form-control-sm form-control" type="number" placeholder="Consuption" name="Consumption" value="<?= $fd_sql['Consumption'] ?>" />
                                    </td>
                                    <td>
                                        <input class="mb-2 form-control-sm form-control" type="number" placeholder="RQD QTY" name="RqdQty" value="<?= $fd_sql['RqdQty'] ?>"/>
                                    </td>
                                    <td>
                                        <input class="mb-2 form-control-sm form-control" type="number" placeholder="ISSUE QTY" name="IssueQty" value="<?= $fd_sql['IssueQty'] ?>"/>
                                    </td>
                                    <td>
                                        <input class="mb-2 form-control-sm form-control" type="number" placeholder="Roll" name="Roll" value="<?= $fd_sql['Roll'] ?>" />
                                    </td>
                                </tr>
                            </tbody>

                        </table>
                    </div>
                    <div class="row">
                        <div class="col-md-12 text-right">
                            <button type="submit" class="btn btn-primary" name="Update">Update</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>




<?php
function customPagefooter(){
 }
include_once "includes/footer.php";
?>
