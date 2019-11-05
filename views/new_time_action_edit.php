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
            <form class="" method="post">

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


                    ?>
                    <tbody>
                        <tr>
                          <?php
                          $POID= '';
                          $POID = $_GET['POID'];
                          $event_id= '';
                          $event_id = $_GET['event_id'];

                          $sql = "SELECT * FROM `po_event` WHERE `event_id`='$event_id' ";
                          $event_list = mysqli_query($conn, $sql);
                          $event_list = mysqli_fetch_array($event_list);


                          $time_actions = "SELECT * FROM `po_time_action` WHERE `event_id`=$event_id AND `POID` = $POID";
                          $time_actions = mysqli_query($conn, $time_actions);
                          $time_actions = mysqli_fetch_array($time_actions);
                          ?>
                          <input type="hidden" name="POID" value="<?= $POID;?>">
                          <input type="hidden" name="event_id" value="<?= $event_id;?>">
                            <td>
                              <select name="event_id" disabled>
                                  <option value="<?= $event_list['event_id']; ?>"><?=  $event_list['event_name']; ?></option>
                              </select>
                            </td>
                            <td><input type="date" name="projected_date" id="" value="<?php echo $time_actions['projected_date']; ?>"></td>
                            <td><input type="date" name="implement_date" id="" value="<?php echo $time_actions['implement_date']; ?>"></td>
                            <td><input type="date" name="1st_revised_implement_date" id="" value="<?php echo $time_actions['1st_revised_implement_date']; ?>"></td>
                            <td><input type="date" name="2nd_revised_implement_date" id="" value="<?php echo $time_actions['2nd_revised_implement_date']; ?>"></td>
                            <td><input type="date" name="3rd_revised_implement_date" id="" value="<?php echo $time_actions['3rd_revised_implement_date']; ?>"></td>
                            <td><input type="date" name="4th_revised_implement_date" id="" value="<?php echo $time_actions['4th_revised_implement_date']; ?>"></td>
                            <td><input type="text" name="remarks" id="" value="<?php echo $time_actions['remarks']; ?>"></td>
                        </tr>
                        <tr>
                            <td>Special Note:</td>
                            <td colspan="7">
                                <textarea name="special_note" id="" style="width:100%;" rows="6"></textarea>
                            </td>
                        </tr>
                    </tbody>
                </table>
                <div class="container">
                    <br><br>
                    <div class="row">
                        <div class="col-md-12 text-center">
                            <button class="btn btn-primary" name="submit" type="submit">Save</button>
                        </div>
                    </div>
                </div>
            </div>

          </form>



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
