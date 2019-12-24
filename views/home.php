<?php

$PageTitle = "Dashboard | Optima Inventory";

function customPageHeader()
{
?>
    <!--Arbitrary HTML Tags-->
    <meta http-equiv="refresh" content="900"/>
<?php }
include_once "controller/home.php";
include_once "includes/header.php";

?>

<div class="app-main__inner">
    <div class="app-page-title">
        <div class="page-title-wrapper">
            <div class="page-title-heading">
                <div class="page-title-icon">
                    <i class="pe-7s-note2 icon-gradient bg-mean-fruit">
                    </i>
                </div>
                <div>Optima Inventory Dashboard
                    <div class="page-title-subheading">Welcome to the new Dashboard
                    </div>
                </div>
            </div>
            <div class="page-title-actions">

                <!-- <div class="d-inline-block dropdown">
                    <button type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="btn-shadow dropdown-toggle btn btn-info">
                        <span class="btn-icon-wrapper pr-2 opacity-7">
                            <i class="fa fa-business-time fa-w-20"></i>
                        </span>
                        Buttons
                    </button>
                    <div tabindex="-1" role="menu" aria-hidden="true" class="dropdown-menu dropdown-menu-right">
                        <ul class="nav flex-column">
                            <li class="nav-item">
                                <a href="javascript:void(0);" class="nav-link">
                                    <i class="nav-link-icon lnr-inbox"></i>
                                    <span>
                                        Inbox
                                    </span>
                                    <div class="ml-auto badge badge-pill badge-secondary">86</div>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="javascript:void(0);" class="nav-link">
                                    <i class="nav-link-icon lnr-book"></i>
                                    <span>
                                        Book
                                    </span>
                                    <div class="ml-auto badge badge-pill badge-danger">5</div>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="javascript:void(0);" class="nav-link">
                                    <i class="nav-link-icon lnr-picture"></i>
                                    <span>
                                        Picture
                                    </span>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a disabled href="javascript:void(0);" class="nav-link disabled">
                                    <i class="nav-link-icon lnr-file-empty"></i>
                                    <span>
                                        File Disabled
                                    </span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </div> -->
            </div>
        </div>
    </div>


    <div class="row">
        <div class="col-md-6 col-xl-4">
            <div class="card mb-3 widget-content">
                <div class="widget-content-outer">
                    <div class="widget-content-wrapper">
                        <div class="widget-content-left">
                            <div class="widget-heading">Total Buyer</div>
                            <div class="widget-subheading">Upto Now</div>
                        </div>
                        <div class="widget-content-right">
                            <div class="widget-numbers text-success"><?= getcount('buyer', 'BuyerID') ?></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-6 col-xl-4">
            <div class="card mb-3 widget-content">
                <div class="widget-content-outer">
                    <div class="widget-content-wrapper">
                        <div class="widget-content-left">
                            <div class="widget-heading">Total PO</div>
                            <div class="widget-subheading">Upto Now</div>
                        </div>
                        <div class="widget-content-right">
                            <div class="widget-numbers text-warning"><?= getcount('po', 'POID') ?></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-6 col-xl-4">
            <div class="card mb-3 widget-content">
                <div class="widget-content-outer">
                    <div class="widget-content-wrapper">
                        <div class="widget-content-left">
                            <div class="widget-heading">Total Style</div>
                            <div class="widget-subheading">Upto Now</div>
                        </div>
                        <div class="widget-content-right">
                            <div class="widget-numbers text-danger"><?= getcount('style', 'StyleID') ?></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-6 col-xl-4">
            <div class="card mb-3 widget-content">
                <div class="widget-content-outer">
                    <div class="widget-content-wrapper">
                        <div class="widget-content-left">
                            <div class="widget-heading">Total Back To Back LC</div>
                            <div class="widget-subheading">Upto Now</div>
                        </div>
                        <div class="widget-content-right">
                            <div class="widget-numbers text-danger"><?= getcount('b2blc', 'B2BLCID') ?></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-6 col-xl-4">
            <div class="card mb-3 widget-content">
                <div class="widget-content-outer">
                    <div class="widget-content-wrapper">
                        <div class="widget-content-left">
                            <div class="widget-heading">Total Sewing Line</div>
                            <div class="widget-subheading">Working Now</div>
                        </div>
                        <div class="widget-content-right">
                            <div class="widget-numbers text-success"><?= getcount('line', 'id') ?></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-6 col-xl-4">
            <div class="card mb-3 widget-content">
                <div class="widget-content-outer">
                    <div class="widget-content-wrapper">
                        <div class="widget-content-left">
                            <div class="widget-heading">Total Master LC</div>
                            <div class="widget-subheading">Upto Now</div>
                        </div>
                        <div class="widget-content-right">
                            <div class="widget-numbers text-warning"><?= getcount('masterlc', 'MasterLCID') ?></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php

    while ($floorn = mysqli_fetch_assoc($floors)) {
        $floor =  $floorn['floor_name'];
        $floor_id = $floorn['floor'];

        // $line_sql = "SELECT l.line, pd.qty, hd.LineNo, hd.nine, hd.ten, hd.eleven, hd.twelve, hd.one, hd.three, hd.four, hd.five, hd.six, hd.seven, hd.eight FROM plan_details pd LEFT JOIN line l on l.id = pd.line, hourly_production h LEFT JOIN hourly_production_details hd ON h.HourlyProductionID = hd.HourlyProductionID WHERE pd.floor = '2' AND h.FloorNO = pd.floor AND hd.LineNo = l.id AND hd.status = 1";
        $line_sql = "SELECT p.qty, l.line, p.line as line_id FROM plan_details p LEFT JOIN line l ON l.id = p.line WHERE p.floor = $floor_id AND l.status = 1";

        $lines = mysqli_query($conn, $line_sql);

    ?>
        <div class="row">
            <?php
            while ($linen = mysqli_fetch_assoc($lines)) {
                $line = $linen['line'];
                $line_id = $linen['line_id'];
                $target_qty = $linen['qty'];
                $pro_qty = 0;

                $hourly_sql = "SELECT hd.* FROM hourly_production h LEFT JOIN hourly_production_details hd ON hd.HourlyProductionID = h.HourlyProductionID WHERE hd.LineNo = $line_id AND h.FloorNO = $floor_id AND h.Date = '$today'";
                
                $hourly_pro = mysqli_fetch_assoc(mysqli_query($conn, $hourly_sql));

                if($hourly_pro){
                    $pro_qty = $hourly_pro['nine'] + $hourly_pro['ten'] + $hourly_pro['eleven'] + $hourly_pro['twelve'] + $hourly_pro['one'] + $hourly_pro['three'] + $hourly_pro['four'] + $hourly_pro['five'] + $hourly_pro['six'] + $hourly_pro['seven'] + $hourly_pro['eight'];
                }
                
                $done = round(($pro_qty * 100) / $target_qty);

                
                if($done >= 50 && $done <= 79){
                    $progress = 'warning';
                }elseif($done >= 80){
                    $progress = 'success';
                }else{
                    $progress = 'danger';
                }

            ?>
                <div class="col-md-6 col-lg-6">
                    <div class="card-shadow-danger mb-3 widget-chart widget-chart2 text-left card">
                        <div class="widget-content">
                            <div class="widget-content-outer">
                                <div class="widget-content-left fsize-1">
                                    <h3><?= $floor ?> Floor | Line <?=$line?></h3>
                                </div>
                                <div class="widget-content-wrapper">
                                    <div class="widget-content-left pr-2 fsize-1">
                                        <div class="widget-numbers mt-0 fsize-3 text-<?=$progress?>"><?=$done?>%</div>
                                    </div>
                                    <div class="widget-content-right w-100">
                                        <div class="progress-bar-xs progress">
                                            <div class="progress-bar bg-<?=$progress?>" role="progressbar" aria-valuenow="<?=$done?>" aria-valuemin="0" aria-valuemax="100" style="width: <?=$done?>%;"></div>
                                        </div>
                                    </div>
                                </div>
                                <div class="widget-content-left fsize-1">
                                    <h4>Target: <?=$target_qty?></h4>
                                    <h4>Production: <?=$pro_qty?></h4>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            <?php } ?>
        </div>

    <?php } ?>
    <!-- <div class="col-md-6 col-lg-3">
            <div class="card-shadow-success mb-3 widget-chart widget-chart2 text-left card">
                <div class="widget-content">
                    <div class="widget-content-outer">
                        <div class="widget-content-wrapper">
                            <div class="widget-content-left pr-2 fsize-1">
                                <div class="widget-numbers mt-0 fsize-3 text-success">54%</div>
                            </div>
                            <div class="widget-content-right w-100">
                                <div class="progress-bar-xs progress">
                                    <div class="progress-bar bg-success" role="progressbar" aria-valuenow="54" aria-valuemin="0" aria-valuemax="100" style="width: 54%;"></div>
                                </div>
                            </div>
                        </div>
                        <div class="widget-content-left fsize-1">
                            <div class="text-muted opacity-6">Expenses Target</div>
                        </div>
                    </div>
                </div>
            </div>
        </div> -->
    <!-- <div class="col-md-6 col-lg-3">
            <div class="card-shadow-warning mb-3 widget-chart widget-chart2 text-left card">
                <div class="widget-content">
                    <div class="widget-content-outer">
                        <div class="widget-content-wrapper">
                            <div class="widget-content-left pr-2 fsize-1">
                                <div class="widget-numbers mt-0 fsize-3 text-warning">32%</div>
                            </div>
                            <div class="widget-content-right w-100">
                                <div class="progress-bar-xs progress">
                                    <div class="progress-bar bg-warning" role="progressbar" aria-valuenow="32" aria-valuemin="0" aria-valuemax="100" style="width: 32%;"></div>
                                </div>
                            </div>
                        </div>
                        <div class="widget-content-left fsize-1">
                            <div class="text-muted opacity-6">Spendings Target</div>
                        </div>
                    </div>
                </div>
            </div>
        </div> -->
    <!-- <div class="col-md-6 col-lg-3">
            <div class="card-shadow-info mb-3 widget-chart widget-chart2 text-left card">
                <div class="widget-content">
                    <div class="widget-content-outer">
                        <div class="widget-content-wrapper">
                            <div class="widget-content-left pr-2 fsize-1">
                                <div class="widget-numbers mt-0 fsize-3 text-info">89%</div>
                            </div>
                            <div class="widget-content-right w-100">
                                <div class="progress-bar-xs progress">
                                    <div class="progress-bar bg-info" role="progressbar" aria-valuenow="89" aria-valuemin="0" aria-valuemax="100" style="width: 89%;"></div>
                                </div>
                            </div>
                        </div>
                        <div class="widget-content-left fsize-1">
                            <div class="text-muted opacity-6">Totals Target</div>
                        </div>
                    </div>
                </div>
            </div>
        </div> -->

</div>
<?php

function customPagefooter()
{
?>
    <!--Scripts here-->
<?php }
include_once "includes/footer.php";
?>