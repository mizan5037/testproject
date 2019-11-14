<?php
//Main Page

require_once 'config.php';
require_once 'lib/session.php';
require_once 'lib/database.php';
require_once 'lib/functions.php';
require_once 'lib/vendor/autoload.php';
$conn = db_connection();

$logo = $path . '/assets/images/risal.png';

$mpdf = new \Mpdf\Mpdf(['format' => 'A4-L']);
$mpdf->setAutoTopMargin = 'stretch';

$logo = $path . '/assets/images/risal.png';

//
//
// $cutiting_size = "SELECT distinct s.size FROM cutting_form_description cd LEFT JOIN Size s ON s.id = cd.Size";
// $cutiting_size = mysqli_query($conn, $cutiting_size);
//
// $cutting_color = "SELECT DISTINCT c.color FROM cutting_form_description cd LEFT JOIN color c ON cd.Color = c.id WHERE cd.Status = '1' AND c.status = '1'";
// $cutting_color = mysqli_query($conn, $cutting_color);

// print_r($cutiting_size);
// $sized = sizeof($cutiting_size);


$html = '<table style="text-transform: uppercase; border: 1px solid black;border-collapse: collapse; text-align:center;" width="100%" >
    <tr>
      <th >Rishal Group</th>
    </tr>
    <tr>
      <th>';


        $cutiting_size = "SELECT s.id, s.size FROM prepack p LEFT JOIN size s ON s.id = p.PrePackSize WHERE p.POID = '1'";
        $cutiting_size = mysqli_query($conn, $cutiting_size);

        $cutting_color = "SELECT DISTINCT c.color, cd.Color FROM cutting_form cf LEFT JOIN cutting_form_description cd ON cf.CuttingFormID = cd.CuttingFormID LEFT JOIN color c ON cd.Color = c.id WHERE cd.Status = '1' AND c.status = '1' AND cf.POID = '1'";
        $cutting_color = mysqli_query($conn, $cutting_color);



        $order = "SELECT od.StyleID, od.color, od.units FROM order_description od WHERE od.POID = 1";
        $order = mysqli_query($conn, $order);

        $html .= '<table style="text-transform: uppercase; border: 1px solid black;text-align:center;" width="100%" border="1">';
          foreach ($cutting_color as $key => $color){
            $color_id = $color['Color'];
          $html .= '<tr>
                    <th>'.$color['color'].'</th>
                    <th>
                        <table style="text-transform: uppercase; border: 1px solid black; text-align:center;" border="1">
                          <tr>
                            <th>Description</th>';
                    $total = array();
                    foreach ($cutiting_size as $key => $size) {
                      $size_id = $size['id'];

                      $sql = "SELECT SUM(Qty) as Total FROM cutting_form_description WHERE Size = '$size_id' AND Color = '$color_id'";

                      $total[] = mysqli_fetch_assoc(mysqli_query($conn, $sql));
                      $html .='<th>'.$size['size'].'</th>';
                    }
                    $html .= '</tr>
                        <tr>
                      <th>Qty</th>';

                    foreach ($order as  $qty) {
                      $html .=  '<th>'.$qty['units'].'</th>';
                      $qty_total[] = $qty['units'];
                    }
                    // print_r($qty_total);
                    $html .='</tr>
                    <tr>
                    <th>CUTTING</th>';

                    foreach ($total as  $value) {
                      $html .='<th>'.$value['Total'].'</th>';
                      $cuting_total[] = $value['Total'];
                    }
                    // print_r($cuting_total);
                       $html .='</tr>
                     <tr>
                     <th>EXss</th>';

                    foreach ($cuting_total as  $key =>$value) {
                      $value = $qty_total[$key]-$cuting_total[$key];
                        $html .='<th>'.$value.'</th>';
                    }
                    $html .='</tr>;


              </table>
            </th>

          </tr>
          </tr>';
          $qty_total = null;
          $cuting_total =null;

        }
        $html .= '</table>

      </th>
    </tr>
  </table>';
$mpdf->WriteHTML($html);

$mpdf->Output();
?>
