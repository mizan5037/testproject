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

                    $sql = "SELECT hp.*,hpd.* FROM hourly_production hp LEFT JOIN hourly_production_details hpd ON hp.HourlyProductionID = hpd.HourlyProductionID WHERE hp.Status = 1 AND hpd.status = 1 ORDER BY hp.Date DESC";

                    $results = mysqli_query($conn, $sql);

                    foreach ($results as $result) {
                  ?>
                  <tr>
                    <td><?= $result['Date'] ?></td>
                    <td><?= $result['FloorNO'] ?></td>
                    <td><?= $result['LineNo'] ?></td>
                    <td><?= $result['POID'] ?></td>
                    <td><?= $result['Color'] ?></td>
                    <td><?= $result['StyleID'] ?></td>
                    <td><?= $result['nine'] ?></td>
                    <td><?= $result['ten'] ?></td>
                    <td><?= $result['eleven'] ?></td>
                    <td><?= $result['twelve'] ?></td>
                    <td><?= $result['one'] ?></td>
                    <td><?= $result['three'] ?></td>
                    <td><?= $result['four'] ?></td>
                    <td><?= $result['five'] ?></td>
                    <td><?= $result['six'] ?></td>
                    <td><?= $result['seven'] ?></td>
                    <td><?= $result['eight'] ?></td>
                    <td>
                      <form class="" method="post">
                          <input type="hidden" name="id" value="<?= $result['ID'] ?>">
                          <button class="btn btn-danger"type="submit" onclick="return confirm('Are You sure want to delete this item permanently?')" name="submit">Delete</button>
                      </form>
                    </td>

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
