<?php

$PageTitle = "New Item | Optima Inventory";
function customPageHeader()
{
    ?>
    <!--Arbitrary HTML Tags-->
<?php }
  
    include_once "controller/update_item.php";
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
                <div>Update Item
                    <div class="page-title-subheading">
                        Please use this form to update Item.
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="main-card mb-3 card">
        <div class="card-body">
            <form class="needs-validation" method="POST"  novalidate>
                
                <table id="myTable" class="mb-0 table table-bordered order-list1" >
                    <thead>
                        <tr>
                            <td>#</td>
                            <td>Name</td>
                            <td>Specification</td>
                            <td>Measurement Unit</td>
                            <td></td>
                        </tr>
                    </thead>
                    <tbody>
                       <?php while($row = mysqli_fetch_assoc($item)) { ?>
                        <tr>
                            <td><?php echo $row['ItemID']; ?></td>
                            <td>
                                <input type="text" name="item_name" class="form-control"  id="validationTooltip01" value="<?php echo $row['ItemName']; ?>"  placeholder="Name" required>
                               
                            </td>
                            <td>
                                <input type="text" name="item_specification" class="form-control" value="<?php echo $row['ItemDescription']; ?>" id="validationTooltip02" placeholder="Specification" required>
                                
                            </td>
                              <td>
                               <input type="text" name="item_unit" value="<?php echo $row['ItemMeasurementUnit']; ?>" class="form-control" id="validationTooltipUsername" placeholder="Measurement Unit" required>
                               
                            </td>
                            <td><a class="deleteRow"></a>

                            </td>
                        </tr>
                    <?php } ?>
                    </tbody>
                    
                </table>
                <br>
                
                 <div class="text-center">
                    <button class="btn btn-primary" name="update" type="submit">Save</button>
                </div>
            </form>
        </div>
    </div>
</div>




<?php
function customPagefooter()
{
    ?>



<?php }
include_once "includes/footer.php";
?>