<?php
$PageTitle = "Time And Action Calender | Optima Inventory";
function customPageHeader()
{
    ?>
    <!--Arbitrary HTML Tags-->
<?php }
include_once "controller/time_action.php";
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
                <div>New Time And Action Calender
                    <div class="page-title-subheading">
                        New Time And Action Calender Entry
                    </div>
                </div>
            </div>
        </div>
    </div>
    <style>
        #datetable {
            font-size: 12px;
        }

        #datetable input {
            border: 1px solid #495057;
            font-size: 11px;
            width: 120px;
            margin: -5px;
        }
    </style>
    <div class="main-card mb-3 card">
        <div class="card-body">
            <!-- <h5 class="card-title">Card Title</h5> -->
            <div class="row" style="overflow-x: auto;">
                <table id="datetable" class="table-bordered table-hover table-sm">
                    <thead>
                        <th>Events</th>
                        <th>Projected Date</th>
                        <th>Implement Date</th>
                        <th>1st Revised<br>Implement Date</th>
                        <th>2nd Revised<br>Implement Date</th>
                        <th>3rd Revised<br>Implement Date</th>
                        <th>4th Revised<br>Implement Date</th>
                        <th>Remarks</th>
                    </thead>
                    <tbody>
                        <tr>
                            <td>Order Confirmation From Buyer</td>
                            <td><input type="date" name="" id=""></td>
                            <td><input type="date" name="" id=""></td>
                            <td><input type="date" name="" id=""></td>
                            <td><input type="date" name="" id=""></td>
                            <td><input type="date" name="" id=""></td>
                            <td><input type="date" name="" id=""></td>
                            <td><input type="text" name="" id=""></td>
                        </tr>
                        <tr>
                            <td>PO Sheet Received From Buyer</td>
                            <td><input type="date" name="" id=""></td>
                            <td><input type="date" name="" id=""></td>
                            <td><input type="date" name="" id=""></td>
                            <td><input type="date" name="" id=""></td>
                            <td><input type="date" name="" id=""></td>
                            <td><input type="date" name="" id=""></td>
                            <td><input type="text" name="" id=""></td>
                        </tr>
                        <tr>
                            <td>Fabric P/I Received From Buyer</td>
                            <td><input type="date" name="" id=""></td>
                            <td><input type="date" name="" id=""></td>
                            <td><input type="date" name="" id=""></td>
                            <td><input type="date" name="" id=""></td>
                            <td><input type="date" name="" id=""></td>
                            <td><input type="date" name="" id=""></td>
                            <td><input type="text" name="" id=""></td>
                        </tr>
                        <tr>
                            <td>Trims P/I Received From Buyer</td>
                            <td><input type="date" name="" id=""></td>
                            <td><input type="date" name="" id=""></td>
                            <td><input type="date" name="" id=""></td>
                            <td><input type="date" name="" id=""></td>
                            <td><input type="date" name="" id=""></td>
                            <td><input type="date" name="" id=""></td>
                            <td><input type="text" name="" id=""></td>
                        </tr>
                        <tr>
                            <td>Fabric & Trims L/C Open</td>
                            <td><input type="date" name="" id=""></td>
                            <td><input type="date" name="" id=""></td>
                            <td><input type="date" name="" id=""></td>
                            <td><input type="date" name="" id=""></td>
                            <td><input type="date" name="" id=""></td>
                            <td><input type="date" name="" id=""></td>
                            <td><input type="text" name="" id=""></td>
                        </tr>
                        <tr>
                            <td>Bulk Fabric sample Received From Buyer</td>
                            <td><input type="date" name="" id=""></td>
                            <td><input type="date" name="" id=""></td>
                            <td><input type="date" name="" id=""></td>
                            <td><input type="date" name="" id=""></td>
                            <td><input type="date" name="" id=""></td>
                            <td><input type="date" name="" id=""></td>
                            <td><input type="text" name="" id=""></td>
                        </tr>
                        <tr>
                            <td>Bulk Trims Sample Received From Buyer</td>
                            <td><input type="date" name="" id=""></td>
                            <td><input type="date" name="" id=""></td>
                            <td><input type="date" name="" id=""></td>
                            <td><input type="date" name="" id=""></td>
                            <td><input type="date" name="" id=""></td>
                            <td><input type="date" name="" id=""></td>
                            <td><input type="text" name="" id=""></td>
                        </tr>
                        <tr>
                            <td>Bulk Fabric Shipment</td>
                            <td><input type="date" name="" id=""></td>
                            <td><input type="date" name="" id=""></td>
                            <td><input type="date" name="" id=""></td>
                            <td><input type="date" name="" id=""></td>
                            <td><input type="date" name="" id=""></td>
                            <td><input type="date" name="" id=""></td>
                            <td><input type="text" name="" id=""></td>
                        </tr>
                        <tr>
                            <td>Bulk Trims Shipment</td>
                            <td><input type="date" name="" id=""></td>
                            <td><input type="date" name="" id=""></td>
                            <td><input type="date" name="" id=""></td>
                            <td><input type="date" name="" id=""></td>
                            <td><input type="date" name="" id=""></td>
                            <td><input type="date" name="" id=""></td>
                            <td><input type="text" name="" id=""></td>
                        </tr>
                        <tr>
                            <td>Bulk Fabric Doc's Received From buyer</td>
                            <td><input type="date" name="" id=""></td>
                            <td><input type="date" name="" id=""></td>
                            <td><input type="date" name="" id=""></td>
                            <td><input type="date" name="" id=""></td>
                            <td><input type="date" name="" id=""></td>
                            <td><input type="date" name="" id=""></td>
                            <td><input type="text" name="" id=""></td>
                        </tr>
                        <tr>
                            <td>Bulk Trims Doc's Received From Buyer</td>
                            <td><input type="date" name="" id=""></td>
                            <td><input type="date" name="" id=""></td>
                            <td><input type="date" name="" id=""></td>
                            <td><input type="date" name="" id=""></td>
                            <td><input type="date" name="" id=""></td>
                            <td><input type="date" name="" id=""></td>
                            <td><input type="text" name="" id=""></td>
                        </tr>
                        <tr>
                            <td>Embroidery Approval</td>
                            <td><input type="date" name="" id=""></td>
                            <td><input type="date" name="" id=""></td>
                            <td><input type="date" name="" id=""></td>
                            <td><input type="date" name="" id=""></td>
                            <td><input type="date" name="" id=""></td>
                            <td><input type="date" name="" id=""></td>
                            <td><input type="text" name="" id=""></td>
                        </tr>
                        <tr>
                            <td>Sewing Thread Approval</td>
                            <td><input type="date" name="" id=""></td>
                            <td><input type="date" name="" id=""></td>
                            <td><input type="date" name="" id=""></td>
                            <td><input type="date" name="" id=""></td>
                            <td><input type="date" name="" id=""></td>
                            <td><input type="date" name="" id=""></td>
                            <td><input type="text" name="" id=""></td>
                        </tr>
                        <tr>
                            <td rowspan="2">
                                <table style="border:none; width:100%; height:100%">
                                    <tr style="border:none; height:100%">
                                        <td style="border:none; width:50%">
                                            <b>PPS</b>
                                        </td>
                                        <td style="border:none; width:50%">
                                            <table style="border:none;">
                                                <tr style="border:none;">
                                                    <td style="border:1px solid black;"> <b> Submit</b></td>
                                                </tr>
                                                <tr style="border:none;">
                                                    <td style="border:1px solid black;"><b>Approval</b></td>
                                                </tr>
                                            </table>
                                        </td>
                                    </tr>
                                </table>

                            </td>
                            <td><input type="date" name="" id=""></td>
                            <td><input type="date" name="" id=""></td>
                            <td><input type="date" name="" id=""></td>
                            <td><input type="date" name="" id=""></td>
                            <td><input type="date" name="" id=""></td>
                            <td><input type="date" name="" id=""></td>
                            <td><input type="text" name="" id=""></td>
                        </tr>
                        <tr>
                            <td><input type="date" name="" id=""></td>
                            <td><input type="date" name="" id=""></td>
                            <td><input type="date" name="" id=""></td>
                            <td><input type="date" name="" id=""></td>
                            <td><input type="date" name="" id=""></td>
                            <td><input type="date" name="" id=""></td>
                            <td><input type="text" name="" id=""></td>
                        </tr>
                        <!-- Sewing -->
                        <tr>
                            <td>Sewing Thread In House</td>
                            <td><input type="date" name="" id=""></td>
                            <td><input type="date" name="" id=""></td>
                            <td><input type="date" name="" id=""></td>
                            <td><input type="date" name="" id=""></td>
                            <td><input type="date" name="" id=""></td>
                            <td><input type="date" name="" id=""></td>
                            <td><input type="text" name="" id=""></td>
                        </tr>
                        <tr>
                            <td>Main Label In House</td>
                            <td><input type="date" name="" id=""></td>
                            <td><input type="date" name="" id=""></td>
                            <td><input type="date" name="" id=""></td>
                            <td><input type="date" name="" id=""></td>
                            <td><input type="date" name="" id=""></td>
                            <td><input type="date" name="" id=""></td>
                            <td><input type="text" name="" id=""></td>
                        </tr>
                        <tr>
                            <td>Size Label In House</td>
                            <td><input type="date" name="" id=""></td>
                            <td><input type="date" name="" id=""></td>
                            <td><input type="date" name="" id=""></td>
                            <td><input type="date" name="" id=""></td>
                            <td><input type="date" name="" id=""></td>
                            <td><input type="date" name="" id=""></td>
                            <td><input type="text" name="" id=""></td>
                        </tr>
                        <tr>
                            <td>Care Label In House</td>
                            <td><input type="date" name="" id=""></td>
                            <td><input type="date" name="" id=""></td>
                            <td><input type="date" name="" id=""></td>
                            <td><input type="date" name="" id=""></td>
                            <td><input type="date" name="" id=""></td>
                            <td><input type="date" name="" id=""></td>
                            <td><input type="text" name="" id=""></td>
                        </tr>
                        <tr>
                            <td>Other Label In House</td>
                            <td><input type="date" name="" id=""></td>
                            <td><input type="date" name="" id=""></td>
                            <td><input type="date" name="" id=""></td>
                            <td><input type="date" name="" id=""></td>
                            <td><input type="date" name="" id=""></td>
                            <td><input type="date" name="" id=""></td>
                            <td><input type="text" name="" id=""></td>
                        </tr>
                        <tr>
                            <td>Interlining in House</td>
                            <td><input type="date" name="" id=""></td>
                            <td><input type="date" name="" id=""></td>
                            <td><input type="date" name="" id=""></td>
                            <td><input type="date" name="" id=""></td>
                            <td><input type="date" name="" id=""></td>
                            <td><input type="date" name="" id=""></td>
                            <td><input type="text" name="" id=""></td>
                        </tr>
                        <tr>
                            <td>Bulk Fabric In House</td>
                            <td><input type="date" name="" id=""></td>
                            <td><input type="date" name="" id=""></td>
                            <td><input type="date" name="" id=""></td>
                            <td><input type="date" name="" id=""></td>
                            <td><input type="date" name="" id=""></td>
                            <td><input type="date" name="" id=""></td>
                            <td><input type="text" name="" id=""></td>
                        </tr>
                        <tr>
                            <td>Bulk Trims In House</td>
                            <td><input type="date" name="" id=""></td>
                            <td><input type="date" name="" id=""></td>
                            <td><input type="date" name="" id=""></td>
                            <td><input type="date" name="" id=""></td>
                            <td><input type="date" name="" id=""></td>
                            <td><input type="date" name="" id=""></td>
                            <td><input type="text" name="" id=""></td>
                        </tr>
                        <tr>
                            <td>Hang Tag + Hologram Sticker In House</td>
                            <td><input type="date" name="" id=""></td>
                            <td><input type="date" name="" id=""></td>
                            <td><input type="date" name="" id=""></td>
                            <td><input type="date" name="" id=""></td>
                            <td><input type="date" name="" id=""></td>
                            <td><input type="date" name="" id=""></td>
                            <td><input type="text" name="" id=""></td>
                        </tr>
                        <tr>
                            <td>UPC Ticket In House</td>
                            <td><input type="date" name="" id=""></td>
                            <td><input type="date" name="" id=""></td>
                            <td><input type="date" name="" id=""></td>
                            <td><input type="date" name="" id=""></td>
                            <td><input type="date" name="" id=""></td>
                            <td><input type="date" name="" id=""></td>
                            <td><input type="text" name="" id=""></td>
                        </tr>
                        <tr>
                            <td rowspan="2">
                                <table style="border:none; width:100%; height:100%">
                                    <tr style="border:none; height:100%">
                                        <td style="border:none; width:50%">
                                            <b>Size Set</b>
                                        </td>
                                        <td style="border:none; width:50%">
                                            <table style="border:none;">
                                                <tr style="border:none;">
                                                    <td style="border:1px solid black;"> <b> Submit</b></td>
                                                </tr>
                                                <tr style="border:none;">
                                                    <td style="border:1px solid black;"><b>Approval</b></td>
                                                </tr>
                                            </table>
                                        </td>
                                    </tr>
                                </table>

                            </td>
                            <td><input type="date" name="" id=""></td>
                            <td><input type="date" name="" id=""></td>
                            <td><input type="date" name="" id=""></td>
                            <td><input type="date" name="" id=""></td>
                            <td><input type="date" name="" id=""></td>
                            <td><input type="date" name="" id=""></td>
                            <td><input type="text" name="" id=""></td>
                        </tr>
                        <tr>
                            <td><input type="date" name="" id=""></td>
                            <td><input type="date" name="" id=""></td>
                            <td><input type="date" name="" id=""></td>
                            <td><input type="date" name="" id=""></td>
                            <td><input type="date" name="" id=""></td>
                            <td><input type="date" name="" id=""></td>
                            <td><input type="text" name="" id=""></td>
                        </tr>
                        <!-- pp -->
                        <tr>
                            <td>PP Meeting</td>
                            <td><input type="date" name="" id=""></td>
                            <td><input type="date" name="" id=""></td>
                            <td><input type="date" name="" id=""></td>
                            <td><input type="date" name="" id=""></td>
                            <td><input type="date" name="" id=""></td>
                            <td><input type="date" name="" id=""></td>
                            <td><input type="text" name="" id=""></td>
                        </tr>
                        <tr>
                            <td>Production Pilot Run (PPR)</td>
                            <td><input type="date" name="" id=""></td>
                            <td><input type="date" name="" id=""></td>
                            <td><input type="date" name="" id=""></td>
                            <td><input type="date" name="" id=""></td>
                            <td><input type="date" name="" id=""></td>
                            <td><input type="date" name="" id=""></td>
                            <td><input type="text" name="" id=""></td>
                        </tr>
                        <tr>
                            <td>Cutting Start Date</td>
                            <td><input type="date" name="" id=""></td>
                            <td><input type="date" name="" id=""></td>
                            <td><input type="date" name="" id=""></td>
                            <td><input type="date" name="" id=""></td>
                            <td><input type="date" name="" id=""></td>
                            <td><input type="date" name="" id=""></td>
                            <td><input type="text" name="" id=""></td>
                        </tr>
                        <tr>
                            <td>Line Required</td>
                            <td><input type="date" name="" id=""></td>
                            <td><input type="date" name="" id=""></td>
                            <td><input type="date" name="" id=""></td>
                            <td><input type="date" name="" id=""></td>
                            <td><input type="date" name="" id=""></td>
                            <td><input type="date" name="" id=""></td>
                            <td><input type="text" name="" id=""></td>
                        </tr>
                        <tr>
                            <td>Days Required</td>
                            <td><input type="date" name="" id=""></td>
                            <td><input type="date" name="" id=""></td>
                            <td><input type="date" name="" id=""></td>
                            <td><input type="date" name="" id=""></td>
                            <td><input type="date" name="" id=""></td>
                            <td><input type="date" name="" id=""></td>
                            <td><input type="text" name="" id=""></td>
                        </tr>
                        <tr>
                            <td>Sewing Start Date</td>
                            <td><input type="date" name="" id=""></td>
                            <td><input type="date" name="" id=""></td>
                            <td><input type="date" name="" id=""></td>
                            <td><input type="date" name="" id=""></td>
                            <td><input type="date" name="" id=""></td>
                            <td><input type="date" name="" id=""></td>
                            <td><input type="text" name="" id=""></td>
                        </tr>
                        <tr>
                            <td>Sewing Complete Date</td>
                            <td><input type="date" name="" id=""></td>
                            <td><input type="date" name="" id=""></td>
                            <td><input type="date" name="" id=""></td>
                            <td><input type="date" name="" id=""></td>
                            <td><input type="date" name="" id=""></td>
                            <td><input type="date" name="" id=""></td>
                            <td><input type="text" name="" id=""></td>
                        </tr>
                        <tr>
                            <td>Finish Start Date</td>
                            <td><input type="date" name="" id=""></td>
                            <td><input type="date" name="" id=""></td>
                            <td><input type="date" name="" id=""></td>
                            <td><input type="date" name="" id=""></td>
                            <td><input type="date" name="" id=""></td>
                            <td><input type="date" name="" id=""></td>
                            <td><input type="text" name="" id=""></td>
                        </tr>
                        <tr>
                            <td>Pack Complete</td>
                            <td><input type="date" name="" id=""></td>
                            <td><input type="date" name="" id=""></td>
                            <td><input type="date" name="" id=""></td>
                            <td><input type="date" name="" id=""></td>
                            <td><input type="date" name="" id=""></td>
                            <td><input type="date" name="" id=""></td>
                            <td><input type="text" name="" id=""></td>
                        </tr>
                        <tr>
                            <td>Bulk Garments Final Inspection /Ex Factory</td>
                            <td><input type="date" name="" id=""></td>
                            <td><input type="date" name="" id=""></td>
                            <td><input type="date" name="" id=""></td>
                            <td><input type="date" name="" id=""></td>
                            <td><input type="date" name="" id=""></td>
                            <td><input type="date" name="" id=""></td>
                            <td><input type="text" name="" id=""></td>
                        </tr>
                        <tr>
                            <td>Bulk Garments Hand Over to Forwarder</td>
                            <td><input type="date" name="" id=""></td>
                            <td><input type="date" name="" id=""></td>
                            <td><input type="date" name="" id=""></td>
                            <td><input type="date" name="" id=""></td>
                            <td><input type="date" name="" id=""></td>
                            <td><input type="date" name="" id=""></td>
                            <td><input type="text" name="" id=""></td>
                        </tr>
                        <tr>
                            <td>Special Note:</td>
                            <td colspan="7">
                                <textarea name="" id="" style="width:100%;" rows="6"></textarea>
                            </td>
                        </tr>
                    </tbody>
                </table>
                <div class="container">
                    <br><br>
                    <div class="row">
                        <div class="col-md-12 text-center">
                            <button class="btn btn-primary" type="submit">Save</button>
                        </div>
                    </div>
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
