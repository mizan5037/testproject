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

                    <?php
                    $conn = db_connection();

                      $sql = "SELECT * FROM `po_event` ORDER BY event_id ASC";
                      $event_list = mysqli_query($conn, $sql);
                    ?>
                    <tbody>
                        <tr>
                            <td>
                              <select>
                                <?php foreach ($event_list as $event){ ?>


                                  <option value="<?= $event['event_id']; ?>"><?=  $event['event_name']; ?></option>

                                <?php } ?>
                              </select>
                            </td>
                            <td><input type="date" name="projected_date" id=""></td>
                            <td><input type="date" name="implement_date" id=""></td>
                            <td><input type="date" name="1st_revised_implement_date" id=""></td>
                            <td><input type="date" name="2nd_revised_implement_date" id=""></td>
                            <td><input type="date" name="3rd_revised_implement_date" id=""></td>
                            <td><input type="date" name="4th_revised_implement_date" id=""></td>
                            <td><input type="text" name="remarks" id=""></td>
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
