<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
  </head>
  <body>

    <style>
        body {
            text-align: center;
        }


        .h1 {
            text-transform: uppercase;
            font-size: 24px;
        }

        .h3 {
            font-size: 14px;
        }
    </style>
    <table style='border: 1px solid black; border-collapse: collapse;' width="100%" >
      <tr>
        <th>
          <table style="" width="100%">
            <tr>
              <th align="right"></th>
              <th align="center">
                  <h1 style="line-height:.1;font-size:15px;">RISHAL GROUP OF INDUSTRIES</h1>
                  <p style="line-height:.1; font-size:10px;">PLOT#M-4/2, SECTION#14,MIRPUR, DHAKA-1216</p>
                  <p style="text-transform: uppercase; color:white; line-height:.1; font-size:15px;"><strong style="background-color:black; font-size:12px;">SIZE WISE CUTTING REPORT</strong></p>
              </th>
              <th></th>
            </tr>
            <?php
              $po_number = "SELECT po.PONumber,po.POID FROM po WHERE po.POID = '$poid' ";
              $po_number = mysqli_fetch_assoc(mysqli_query($conn,$po_number));
              $buyer = "SELECT BuyerName FROM buyer WHERE Status = 1 AND BuyerID = '$buyer'";
              $buyer = mysqli_fetch_assoc(mysqli_query($conn,$buyer));

            ?>
            <tr>
              <th>PO: <?php echo $po_number['PONumber'] ?></th>
              <th></th>
              <th>DATE: <?php echo date('d-M-Y'); ?></th>
            </tr>
            <tr>
              <th colspan="3">BUYER: <?php echo $buyer['BuyerName'] ?></th>
            </tr>
          </table>
        </th>
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

              $prepack_table = "SELECT p.PrePackSize ,p.PrepackQty FROM prepack p WHERE p.POID = $poid";
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
          <table width="100%" >
            <?php
            foreach ($cutting_color as $key => $color) {
                $color_id = $color['Color']; ?>
            <tr>
              <th style='border: 1px solid black;'><?= $color['color']; ?></th>
              <th >
                <table style='border: 1px solid black; border-collapse: collapse;' width="100%" >
                    <?php
                      echo "<tr style='border: 1px solid black; border-collapse: collapse;' >";
                echo "<th style='border: 1px solid black; border-collapse: collapse;'>Description</th>";
                $total = array();
                foreach ($cutiting_size as $key => $size) {
                    $size_id = $size['id'];

                    $sql = "SELECT SUM(Qty) as Total FROM cutting_form_description WHERE Size = '$size_id' AND Color = '$color_id'";

                    $total[] = mysqli_fetch_assoc(mysqli_query($conn, $sql));
                    echo "<th style='border: 1px solid black; border-collapse: collapse;'>".$size['size']."--<small>[".$size['PrePackCode']."]</small></th>";
                }
                echo "<th style='border: 1px solid black; border-collapse: collapse;' >Total</th>";

                echo "</tr>";
                // Quantity
                echo "<tr style='border: 1px solid black; border-collapse: collapse;'>";
                echo "<th style='border: 1px solid black; border-collapse: collapse;'>Order Qty</th>";
                if ($check) {
                    foreach ($order as  $qty) {
                        echo "<th style='border: 1px solid black; border-collapse: collapse;'>".$qty['units']."</th>";
                        $qty_total[] = $qty['units'];
                    }
                } else {
                    foreach ($order as  $qty) {
                        echo "<th style='border: 1px solid black; border-collapse: collapse;'>".$qty."</th>";
                        $qty_total[] = $qty;
                    }
                }

                echo "<th style='border: 1px solid black; border-collapse: collapse;'>".array_sum($qty_total)."</th>";

                // print_r($qty_total);
                echo "</tr>";
                // Cutting
                echo "<tr style='border: 1px solid black; border-collapse: collapse;'>";
                echo "<th style='border: 1px solid black; border-collapse: collapse;'>CUTTING</th>";

                foreach ($total as  $value) {
                    echo "<th style='border: 1px solid black; border-collapse: collapse;'>".$value['Total']."</th>";
                    $cuting_total[] = $value['Total'];
                }
                echo "<th style='border: 1px solid black; border-collapse: collapse;'>".array_sum($cuting_total)."</th>";
                // print_r($cuting_total);
                echo "</tr>";
                // exss
                echo "<tr style='border: 1px solid black; border-collapse: collapse;'>";
                echo "<th style='border: 1px solid black; border-collapse: collapse;'>EXss</th>";
                foreach ($cuting_total as  $key =>$value) {
                    $value = $cuting_total[$key]-$qty_total[$key];
                    $total_exss[] = $value;
                    echo "<th style='border: 1px solid black; border-collapse: collapse;'>".$value."</th>";
                }
                echo "<th style='border: 1px solid black; border-collapse: collapse;'>".array_sum($total_exss)."</th>";

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
  </body>
</html>
