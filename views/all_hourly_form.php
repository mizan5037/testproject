<?php
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
            <form class=""  method="post">
              <h5 class="card-title">Choose Date to View Hourly Productoion</h5>
              <div class="container">
                <div class="row justify-content-md-center">
                  <div class="col-md-5">
                    <div class="container">
                      <div class="row">
                        <div class="col-md-8 text-right">
                          <input type="date" class="form-control form-control-sm" name="date" value="<?=isset($_POST['hourlyDate']) && $_POST['date']!= '' ? $_POST['date'] : '' ?>">
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
              <tbody >
                  <?php
                    if(isset($_POST['hourlyDate']) && $_POST['date']!= ''){
                      $date = $_POST['date'];

                      $sql = "SELECT hp.*,hpd.* FROM hourly_production hp LEFT JOIN hourly_production_details hpd ON hp.HourlyProductionID = hpd.HourlyProductionID WHERE hp.Status = 1 AND hpd.status = 1 AND hp.Date='$date' ORDER BY hp.Date DESC";

                      $results = mysqli_query($conn, $sql);
                      $total_nine=0;
                      $total_ten=0;
                      $total_eleven=0;
                      $total_twelve=0;
                      $total_one=0;
                      $total_three=0;
                      $total_four=0;
                      $total_five=0;
                      $total_six=0;
                      $total_seven=0;
                      $total_eight=0;
                      foreach ($results as $result) {
                        $total_nine += $result['nine'];
                        $total_ten  += $result['ten'];
                        $total_eleven += $result['eleven'];
                        $total_eleven +=$result['eleven'];
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
                          <td><?= $result['FloorNO']; ?></td>
                          <td><?= $result['LineNo']; ?></td>
                          <td><?= $result['POID']; ?></td>
                          <td><?= $result['Color']; ?></td>
                          <td><?= $result['StyleID']; ?></td>
                          <td><?= $result['nine'];?></td>
                          <td><?= $result['ten'];?></td>
                          <td><?= $result['eleven'];?></td>
                          <td><?= $result['twelve']; ?></td>
                          <td><?= $result['one']; ?></td>
                          <td><?= $result['three']; ?></td>
                          <td><?= $result['four']; ?></td>
                          <td><?= $result['five'];?></td>
                          <td><?= $result['six']; ?></td>
                          <td><?= $result['seven'];?></td>
                          <td><?= $result['eight']; ?></td>
                          <td>
                            <form class="" method="post">
                                <input type="hidden" name="id" value="<?= $result['ID'] ?>">
                                <button class="btn btn-danger"type="submit" onclick="return confirm('Are You sure want to delete this item permanently?')" name="submit">Delete</button>
                            </form>
                          </td>
                        </tr>
                    <?php }?>
                        <tr>
                          <td colspan="6"><strong>Total</strong></td>
                          <td><?=$total_nine; ?></td>
                          <td><?=$total_ten; ?></td>
                          <td><?=$total_eleven; ?></td>
                          <td><?=$total_twelve; ?></td>
                          <td><?=$total_one; ?></td>
                          <td><?=$total_three; ?></td>
                          <td><?=$total_four; ?></td>
                          <td><?=$total_five; ?></td>
                          <td><?=$total_six; ?></td>
                          <td><?=$total_seven; ?></td>
                          <td><?=$total_eight; ?></td>
                          <td></td>
                        </tr>
                    <?php } ?>
              </tbody>
          </table>
        </div>
    </div>
</div>




<?php
function customPagefooter()
{
    ?>
    <script>
        // Add new row code

        $(document).ready(function() {
            var counter = 2;

            $("#addrow").on("click", function() {
                var newRow = $("<tr>");
                var cols = "";

                cols += '<th scope="row">' + counter + '</th>';
                cols += '<td><select name="line[]" class="po form-control form-control-sm" required><option></option><?php
                    $conn = db_connection();
                    $sql = "SELECT * FROM line WHERE status = 1";
                    $results = mysqli_query($conn, $sql);
                    while ($result = mysqli_fetch_assoc($results)) {
                        echo '<option value="' . $result['id'] . '">' . $result['line'] . '</option>';
                    }
                    ?></select></td>';
                cols += '<td><select name="po[]" class="po form-control form-control-sm" required><option></option>';
                <?php
                    $conn = db_connection();
                    $sql = "SELECT * FROM po WHERE status = 1";
                    $results = mysqli_query($conn, $sql);
                    while ($result = mysqli_fetch_assoc($results)) {
                        echo 'cols += \'<option value="' . $result['POID'] . '">' . $result['PONumber'] . '</option>\'; ';
                    }
                    ?>
                cols += '</select></td>';
                cols += '<td><select name="style[]" class="style  form-control form-control-sm" required><option></option>';
                <?php
                    $conn = db_connection();
                    $sql = "SELECT * FROM style WHERE status = 1";
                    $results = mysqli_query($conn, $sql);
                    while ($result = mysqli_fetch_assoc($results)) {
                        echo 'cols += \'<option value="' . $result['StyleID'] . '">' . $result['StyleNumber'] . '</option>\'; ';
                    }
                    ?>
                cols += '</select></td>';
                cols += '<td><select name="color[]" class="color form-control form-control-sm" required><option></option>';
                <?php
                    $conn = db_connection();
                    $sql = "SELECT * FROM color WHERE status = 1";
                    $results = mysqli_query($conn, $sql);
                    while ($result = mysqli_fetch_assoc($results)) {
                        echo 'cols += \'<option value="' . $result['id'] . '">' . $result['color'] . '</option>\'; ';
                    }
                    ?>
                cols += '</select></td>';
                cols += '<td><select name="hour[]" class="form-control form-control-sm" required><option >Choose Hour</option><option value="9">9</option><option value="10">10</option><option value="11">11</option><option value="12">12</option><option value="1">1</option><option value="3">3</option><option value="4">4</option><option value="5">5</option><option value="6">6</option><option value="7">7</option><option value=8>8</option></select></td>';
                cols += '<td><input placeholder="Quantity" name="quantity[]" type="number" class="form-control form-control-sm"></td>';
                cols += '<td><input type="button" class="ibtnDel btn btn-sm btn-danger "  value="Delete"></td>';
                newRow.append(cols);
                $("table.order-list").append(newRow);
                counter++;
            });



            $("table.order-list").on("click", ".ibtnDel", function(event) {
                $(this).closest("tr").remove();
                counter -= 1
            });


        });


        // Example starter JavaScript for disabling form submissions if there are invalid fields
        (function() {
            'use strict';
            window.addEventListener('load', function() {
                // Fetch all the forms we want to apply custom Bootstrap validation styles to
                var forms = document.getElementsByClassName('needs-validation');
                // Loop over them and prevent submission
                var validation = Array.prototype.filter.call(forms, function(form) {
                    form.addEventListener('submit', function(event) {
                        if (form.checkValidity() === false) {
                            event.preventDefault();
                            event.stopPropagation();
                        }
                        form.classList.add('was-validated');
                    }, false);
                });
            }, false);
        })();
    </script>
<?php }
include_once "includes/footer.php";
?>
