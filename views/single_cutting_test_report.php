<?php

$PageTitle = " Cutting Details | Optima Inventory";



$conn = db_connection();


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
                <div>Cutting Details
                    <div class="page-title-subheading">
                        Single
                    </div>
                </div>
            </div>

            <div class="page-title-actions">
                <div class="d-inline-block dropdown">
                    <a href="<?= $path ?>/index.php?page=cutting_edit&cuttingid=<?= $cuttingid ?>" aria-expanded="false" class="btn-shadow btn btn-info">
                        Edit
                    </a>
                </div>
            </div>
        </div>
    </div>

    <div class="main-card mb-3 card">
        <div class="card-body">
              <table style="text-transform: uppercase; border: 1px solid black;border-collapse: collapse; text-align:center;" width="100%" >
                <tr>
                  <th >Rishal Group</th>
                </tr>
                <?php


                 ?>
                <tr>
                  <th></th>
                </tr>
                <tr>
                  <th>
                    <?php
                    $cutiting_size = "SELECT s.id, s.size,p.PrePackCode FROM prepack p LEFT JOIN size s ON s.id = p.PrePackSize WHERE p.POID = '$poid'";
                    $cutiting_size = mysqli_query($conn, $cutiting_size);

                    $cutting_color = "SELECT DISTINCT c.color, cd.Color FROM cutting_form cf LEFT JOIN cutting_form_description cd ON cf.CuttingFormID = cd.CuttingFormID LEFT JOIN color c ON cd.Color = c.id WHERE cd.Status = '1' AND c.status = '1' AND cf.POID = '$poid'";
                    $cutting_color = mysqli_query($conn, $cutting_color);
                    // ORDER REPORT


                    // count ORDER
                    $count_order = "SELECT PrePackCode FROM prepack WHERE POID = $poid GROUP BY PrePackCode";
                    $count_order = mysqli_num_rows(mysqli_query($conn, $count_order));

                    $prepack_count = "SELECT COUNT(PrePackCode) as total FROM prepack WHERE POID = $poid";
                    $prepack_count = mysqli_fetch_assoc(mysqli_query($conn, $prepack_count));

                    if ($prepack_count['total'] == $count_order) {
                        $order = "SELECT od.StyleID, od.color, od.units FROM order_description od WHERE od.POID = '$poid'";
                        $order = mysqli_query($conn, $order);
                        $check = true;
                    } else {
                        $total_units = "SELECT od.Units FROM order_description od WHERE POID = $poid";
                        $total_units = mysqli_fetch_assoc(mysqli_query($conn, $total_units));

                        $check = false;

                        $prepack_table = "SELECT p.PrePackSize ,p.PrepackQty,p.PrePackCode FROM prepack p WHERE p.POID = $poid";
                        $prepack_table = mysqli_query($conn, $prepack_table);

                        $total = 0;
                        foreach ($prepack_table as $key => $value) {
                            $total += $value['PrepackQty'];
                        }

                        function order_qty($total, $qty, $unit)
                        {
                            return ($unit*$qty)/$total;
                        }

                        $total_units = $total_units['Units'];
                        foreach ($prepack_table as $key => $value) {
                            $qty = $value['PrepackQty'];
                            $order[] = order_qty($total, $qty, $total_units);
                        }
                    }

                    //

                     ?>
                    <table style="text-transform: uppercase; border: 1px solid black;text-align:center;" width="100%" border="1">
                      <?php
                      foreach ($cutting_color as $key => $color) {
                          $color_id = $color['Color']; ?>
                      <tr>
                        <th><?= $color['color']; ?></th>
                        <th>
                          <table style="text-transform: uppercase; border: 1px solid black; text-align:center; " border="1" width="100%">
                              <?php
                                echo "<tr>";
                          echo "<th>Description</th>";
                          $total = array();
                          foreach ($cutiting_size as $key => $size) {
                              $size_id = $size['id'];

                              $sql = "SELECT SUM(Qty) as Total FROM cutting_form_description WHERE Size = '$size_id' AND Color = '$color_id'";

                              $total[] = mysqli_fetch_assoc(mysqli_query($conn, $sql));
                              echo "<th>".$size['size']."--<small>[".$size['PrePackCode']."]</small></th>";
                          }
                          echo "<th>Total</th>";

                          echo "</tr>";
                          // Quantity
                          echo "<tr>";
                          echo "<th>Order Qty</th>";
                          if ($check) {
                              foreach ($order as  $qty) {
                                  echo "<th>".$qty['units']."</th>";
                                  $qty_total[] = $qty['units'];
                              }
                          } else {
                              foreach ($order as  $qty) {
                                  echo "<th>".$qty."</th>";
                                  $qty_total[] = $qty;
                              }
                          }

                          echo "<th>".array_sum($qty_total)."</th>";

                          // print_r($qty_total);
                          echo "</tr>";
                          // Cutting
                          echo "<tr>";
                          echo "<th>CUTTING</th>";

                          foreach ($total as  $value) {
                              echo "<th>".$value['Total']."</th>";
                              $cuting_total[] = $value['Total'];
                          }
                          echo "<th>".array_sum($cuting_total)."</th>";
                          // print_r($cuting_total);
                          echo "</tr>";
                          // exss
                          echo "<tr>";
                          echo "<th>EXss</th>";
                          foreach ($cuting_total as  $key =>$value) {
                              $value = $cuting_total[$key]-$qty_total[$key];
                              $total_exss[] = $value;
                              echo "<th>".$value."</th>";
                          }
                          echo "<th>".array_sum($total_exss)."</th>";

                          echo "</tr>"; ?>
                          </table>
                        </th>
                      </tr>
                        <tr>
                          <td><br></td>
                        </tr>
                      <?php
                          $qty_total = null;
                          $cuting_total =null;
                      } ?>
                    </table>
                  </th>
                </tr>
              </table>
        </div>
    </div>
</div>

<?php
include_once "includes/footer.php";
?>
