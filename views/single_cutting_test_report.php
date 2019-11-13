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
                <tr>
                  <th>
                    <?php
                    $cutiting_size = "SELECT distinct s.size, cd.Size FROM cutting_form_description cd LEFT JOIN Size s ON s.id = cd.Size";
                    $cutiting_size = mysqli_query($conn, $cutiting_size);

                    $cutting_color = "SELECT DISTINCT c.color, cd.Color FROM cutting_form_description cd LEFT JOIN color c ON cd.Color = c.id WHERE cd.Status = '1' AND c.status = '1'";
                    $cutting_color = mysqli_query($conn, $cutting_color);

                        // code...

                     ?>
                    <table style="text-transform: uppercase; border: 1px solid black;text-align:center;" width="100%" border="1">
                      <?php
                      foreach ($cutting_color as $key => $color) { $color_id = $color['Color'];?>
                      <tr>
                        <th><?= $color['color'];?></th>
                        <th>
                          <table style="text-transform: uppercase; border: 1px solid black; text-align:center;" border="1">
                            <tr>
                              <th>Description</th>
                              <?php
                                foreach ($cutiting_size as $key => $size) {
                                  $size_id = $size['Size'];
                                  $sql = "SELECT SUM(Qty) as Total FROM cutting_form_description WHERE Size = '$size_id' AND Color = '$color_id'";
                                  $total = mysqli_fetch_assoc(mysqli_query($conn, $sql));
                                  echo "<th>".$size['size']."</th>";


                                }

                               ?>
                             </tr>
                             <tr>
                               <?php

                               foreach ($total as  $value) {
                                 echo "<th>Qty</th>";
                                 echo "<th>".$value."</th>";
                               }
                                ?>
                             </tr>
                            <tr>
                              <th></th>
                            </tr>
                          </table>
                        </th>

                      </tr>
                        <?php } ?>
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
