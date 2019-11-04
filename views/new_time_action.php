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


            <?php
              $conn = db_connection();
              $POID = $_GET['POID'];

             ?>
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
                        <th>Action</th>
                    </thead>
                    <tbody>
                      <?php
                        $events_time_actions = "SELECT p.*,e.* FROM po_event e LEFT JOIN po_time_action p ON p.event_id = e.event_id order by e.event_id ASC";
                        $events_time_actions = mysqli_query($conn, $events_time_actions);
                        foreach ($events_time_actions as $key => $events_time_action) {

                      ?>
                        <tr>
                            <td><?php echo $key.'.'.$events_time_action['event_name'] ?></td>
                            <td><input type="date" name="" id="" value="<?php echo $events_time_action['projected_date']; ?>" disabled></td>
                            <td><input type="date" name="" id="" value="<?php echo $events_time_action['implement_date']; ?>" disabled></td>
                            <td><input type="date" name="" id="" value="<?php echo $events_time_action['1st_revised_implement_date']; ?>" disabled></td>
                            <td><input type="date" name="" id="" value="<?php echo $events_time_action['2nd_revised_implement_date']; ?>" disabled></td>
                            <td><input type="date" name="" id="" value="<?php echo $events_time_action['3rd_revised_implement_date']; ?>" disabled></td>
                            <td><input type="date" name="" id="" value="<?php echo $events_time_action['4th_revised_implement_date']; ?>" disabled></td>
                            <td><input type="text" name="" id="" value="<?php echo $events_time_action['remarks']; ?>" disabled></td>
                            <td> <a href="<?= $path ?>/index.php?page=new_time_action_edit&event_id=<?php echo $events_time_action['event_id']; ?>&POID=<?php echo $POID; ?>" class="mb-2 mr-2 btn-transition btn btn-sm btn-outline-secondary">
                                Edit
                            </a></td>
                        </tr>
                      <?php } ?>

                        <tr>
                          <?php
                            $time_actions = "SELECT * FROM `po_time_action` WHERE `POID` = $POID and `event_id` = 39";
                            $data = mysqli_query($conn, $time_actions);
                            $data = mysqli_fetch_array($data);
                          ?>
                            <td>Special Note:</td>
                            <td colspan="7">
                                <textarea name="" id="" style="width:100%;" rows="6" disabled><?php echo $data; ?></textarea>
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
