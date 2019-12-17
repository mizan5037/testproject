<?php

$page_privilege = 5;
hasAccess();

$PageTitle = "Hourly Production | Optima Inventory";
$conn = db_connection();
function customPageHeader()
{
    ?>
    <!--Arbitrary HTML Tags-->
<?php }
include_once "controller/update_hourly_form.php";
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
                <div>All Hourly
                    <div class="page-title-subheading">
                        This page showing All Hourly Details View
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="main-card mb-3 card">
        <div class="card-body text-center">
            <form class="" method="post">
                <h5 class="card-title">Choose Date to View Hourly Productoion</h5>
                <div class="container">
                    <div class="row justify-content-md-center">
                        <div class="col-md-10">
                            <div class="container">
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="row">
                                            <div class="col-md-3 text-right">From:</div>
                                            <div class="col-md-9"><input type="date" class="form-control form-control-sm" name="date" value="<?= isset($_POST['hourlyDate']) && $_POST['date'] != '' ? $_POST['date'] : '' ?>"></div>
                                        </div>
                                    </div>
                                    <div class="col-md-4 text-right">
                                        <div class="row">
                                            <div class="col-md-3 text-right">To:</div>
                                            <div class="col-md-9 text-left"><input type="date" class="form-control form-control-sm" name="todate" value="<?= isset($_POST['hourlyDate']) && $_POST['todate'] != '' ? $_POST['todate'] : '' ?>"></div>
                                        </div>
                                    </div>
                                    <div class="col-md-4 text-left">
                                        <button class="btn btn-primary btn-sm mb-1" name="hourlyDate">View Hourly</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>


            </form>
        </div>
    </div>
    <div class="main-card mb-3 card">
        <div class="card-body text-center">
            <table class="mb-0 table table-striped table-hover table-bordered">
                <thead>
                    <tr>
                        <th>Date</th>
                        <th>FloorNO</th>
                        <th>Line</th>
                        <th>Buyer/PO</th>
                        <th>Color</th>
                        <th>Style</th>
                        <th>9</th>
                        <th>10</th>
                        <th>11</th>
                        <th>12</th>
                        <th>1</th>
                        <th>3</th>
                        <th>4</th>
                        <th>5</th>
                        <th>6</th>
                        <th>7</th>
                        <th>8</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    if (isset($_POST['hourlyDate']) && $_POST['date'] != '') {
                        $date = $_POST['date'];
                        $todate = $_POST['todate'];

                        $sql_add = $todate != '' ? "hp.Date BETWEEN '$date' AND '$todate'" : "hp.Date = '$date'";

                        $sql = "SELECT hp.Date,f.floor_name,l.line,p.PONumber,s.StyleNumber,c.color,hpd.* FROM hourly_production hp LEFT JOIN hourly_production_details hpd ON hp.HourlyProductionID = hpd.HourlyProductionID LEFT JOIN po p ON hpd.POID = p.POID LEFT JOIN Floor f ON f.floor_id = hp.FloorNO LEFT JOIN line l ON l.id = hpd.LineNo LEFT JOIN style s ON s.StyleID = hpd.StyleID LEFT JOIN color c ON c.id=hpd.Color  WHERE hp.Status = 1 AND hpd.status = 1 AND f.status = 1 AND p.Status = 1 AND c.status = 1 AND s.Status = 1 AND $sql_add ORDER BY hp.Date DESC";
                        //echo $sql;

                        $results = mysqli_query($conn, $sql);
                        $total_nine = 0;
                        $total_ten = 0;
                        $total_eleven = 0;
                        $total_twelve = 0;
                        $total_one = 0;
                        $total_three = 0;
                        $total_four = 0;
                        $total_five = 0;
                        $total_six = 0;
                        $total_seven = 0;
                        $total_eight = 0;
                        foreach ($results as $result) {
                            $total_nine += $result['nine'];
                            $total_ten  += $result['ten'];
                            $total_eleven += $result['eleven'];
                            $total_eleven += $result['eleven'];
                            $total_twelve += $result['twelve'];
                            $total_one += $result['one'];
                            $total_three += $result['three'];
                            $total_four += $result['four'];
                            $total_five += $result['five'];
                            $total_six += $result['six'];
                            $total_seven += $result['seven'];
                            $total_eight +=  $result['eight'];
                            ?>
                            <tr>
                                <td><?= $result['Date']; ?></td>
                                <td><?= $result['floor_name']; ?></td>
                                <td><?= $result['line']; ?></td>
                                <td><?= $result['PONumber']; ?></td>
                                <td><?= $result['color']; ?></td>
                                <td><?= $result['StyleNumber']; ?></td>
                                <td><?= $result['nine']; ?></td>
                                <td><?= $result['ten']; ?></td>
                                <td><?= $result['eleven']; ?></td>
                                <td><?= $result['twelve']; ?></td>
                                <td><?= $result['one']; ?></td>
                                <td><?= $result['three']; ?></td>
                                <td><?= $result['four']; ?></td>
                                <td><?= $result['five']; ?></td>
                                <td><?= $result['six']; ?></td>
                                <td><?= $result['seven']; ?></td>
                                <td><?= $result['eight']; ?></td>
                                <td>
                                    <form class="" method="post">
                                        <input type="hidden" name="id" value="<?= $result['ID'] ?>">
                                        <button class="btn btn-danger" type="submit" onclick="return confirm('Are You sure want to delete this item permanently?')" name="submit">Delete</button>
                                    </form>
                                </td>
                            </tr>
                        <?php } ?>
                        <tr>
                            <td colspan="6"><strong>Total</strong></td>
                            <td><?= $total_nine; ?></td>
                            <td><?= $total_ten; ?></td>
                            <td><?= $total_eleven; ?></td>
                            <td><?= $total_twelve; ?></td>
                            <td><?= $total_one; ?></td>
                            <td><?= $total_three; ?></td>
                            <td><?= $total_four; ?></td>
                            <td><?= $total_five; ?></td>
                            <td><?= $total_six; ?></td>
                            <td><?= $total_seven; ?></td>
                            <td><?= $total_eight; ?></td>
                            <td></td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

<?php
include_once "includes/footer.php";
?>