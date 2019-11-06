<?php
$PageTitle = "Time And Action Calender | Optima Inventory";
$conn = db_connection();
if (isset($_GET['POID']) && $_GET['POID']!='' ) {
  $POID = $_GET['POID'];
}
else {
  nowgo('/index.php?page=all_po');
}
$events_time = "SELECT p.*,e.* FROM po_event e LEFT JOIN po_time_action p ON p.event_id = e.event_id WHERE p.POID = '$POID' order by e.event_id ASC";
$events_time = mysqli_query($conn, $events_time);
$time_action_value = array();
while($value = mysqli_fetch_assoc($events_time)) {
  $time_action_value[] = $value;
}

// data from event list
$event_list = "SELECT e.* FROM po_event e  order by e.event_id ASC";
$event_list = mysqli_query($conn, $event_list);

$sqlcol = "SELECT * FROM po_time_action";
$col = mysqli_fetch_assoc(mysqli_query($conn,$sqlcol));
$colname = array_keys($col);

$newArrVal = array();
for ($i=0; $i < count($colname); $i++) {
  $newArrVal[$colname[$i]] = '';
}

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
                        <th>Action</th>
                    </thead>
                    <tbody>
                      <?php
                        foreach ($event_list as $events_time_action) {
                          $keys = array_search($events_time_action['event_id'], array_column($time_action_value, 'event_id'));
                          if($keys || $keys === 0){
                              $value = $time_action_value[$keys];
                          }else {
                              $value = $newArrVal;
                        }
                        ?>
                        <tr>
                            <td><?= $events_time_action['event_name'] ?></td>
                            <td><input type="date" name="" id="" value="<?php echo $value['projected_date']; ?>" disabled></td>
                            <td><input type="date" name="" id="" value="<?php echo $value['implement_date']; ?>" disabled></td>
                            <td><input type="date" name="" id="" value="<?php echo $value['1st_revised_implement_date']; ?>" disabled></td>
                            <td><input type="date" name="" id="" value="<?php echo $value['2nd_revised_implement_date']; ?>" disabled></td>
                            <td><input type="date" name="" id="" value="<?php echo $value['3rd_revised_implement_date']; ?>" disabled></td>
                            <td><input type="date" name="" id="" value="<?php echo $value['4th_revised_implement_date']; ?>" disabled></td>
                            <td><input type="text" name="" id="" value="<?php echo $value['remarks']; ?>" disabled></td>
                            <td> <a href="<?= $path ?>/index.php?page=new_time_action_edit&event_id=<?php echo $events_time_action['event_id']; ?>&POID=<?php echo $POID; ?>" class="mb-2 mr-2 btn-transition btn btn-sm btn-outline-secondary">
                                <i class="fas fa-edit"></i>
                            </a></td>
                        </tr>
                        <?php } ?>
                        <tr>
                          <form method="post">
                            <?php
                              $special_note = "SELECT `special_note` FROM `po` WHERE `POID`='$POID'";
                              $special_note = mysqli_query($conn, $special_note);
                              $special_note = mysqli_fetch_assoc($special_note);
                            ?>
                              <td>Special Note:</td>
                              <td colspan="6">
                                  <input type="hidden" name="POID_sn" value="<?=$POID ?>">
                                  <textarea name="special_note" id="" style="width:100%;" rows="6"><?php echo $special_note['special_note']; ?></textarea>
                              </td>
                              <td colspan="2" class="text-center">
                                <button type="submit" class="btn btn-secondary" name="save_note">Save Note</button>
                              </td>
                          </form>
                        </tr>
                    </tbody>
                </table>
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
