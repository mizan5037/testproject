<?php

$PageTitle = "New Item | Optima Inventory";
function customPageHeader()
{
    ?>
    <!--Arbitrary HTML Tags-->
<?php }
include_once "controller/new_item.php";
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
                <div>New Item
                    <div class="page-title-subheading">
                        Please use this form to add a new Item.
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
                        <tr>
                            <td>1</td>
                            <td>
                                <input type="text" name="item_name[]" class="mb-2 form-control-sm form-control"  id="validationTooltip01" placeholder="Name" required>
                               
                            </td>
                            <td>
                                <input type="text" name="item_specification[]" class="mb-2 form-control-sm form-control" id="validationTooltip02" placeholder="Specification" required>
                                
                            </td>
                              <td>
                               <input type="text" name="item_unit[]" class="mb-2 form-control-sm form-control" id="validationTooltipUsername" placeholder="Measurement Unit" required>
                               
                            </td>
                            <td><a class="deleteRow"></a>

                            </td>
                        </tr>
                    </tbody>
                    <tfoot>
                        <tr>
                            
                         <td colspan="5" class="text-center"><input type="button" class="btn btn-sm btn-success" id="addrow" value="Add Row" /><br></td>

                        </tr>
                       
                    </tfoot>
                </table>
                <br>
                
                 <div class="text-center">
                    <button class="btn btn-primary" type="submit">Save</button>
                </div>
            </form>
        </div>
    </div>
</div>




<?php
function customPagefooter()
{
    ?>
    <script>
         $(document).ready(function() {
            var counter1 = 0;
            var limit1 = 100;

            $("#addrow").on("click", function() {
                //alert('clicked');

                counter1 = $('#myTable tr').length - 1;
                

                var newRow1 = $("<tr>");
                var cols1 = "";

                cols1 += '<th scope="row">' + counter1 + '</th>';
                cols1 += '<td><input type="text" placeholder="Name" class="mb-2 form-control-sm form-control" name="item_name[]" required/></td>';
                cols1 += '<td><input type="text" placeholder="Specification" class="mb-2 form-control-sm form-control" name="item_specification[]" required/></td>';
                cols1 += '<td><input type="text" placeholder="Unit" class="mb-2 form-control-sm form-control" name="item_unit[]" required/></td>';
               

                cols1 += '<td><input type="button" class="ibtnDel1 btn btn-sm btn-warning"  value="Delete"></td>';
                newRow1.append(cols1);
                if (counter1 >= limit1) $('#addrow1').attr('disabled', true).prop('value', "You've reached the limit");
                $("table.order-list1").append(newRow1);
                counter1++;


            });

            $("table.order-list1").on("change", 'input[name^="dzs"]', function(event) {
                calculateDZSTotal();
            });
            $("table.order-list1").on("change", 'input[name^="ppack"]', function(event) {
                calculatePPackTotal();
            });
            $("table.order-list1").on("change", 'input[name^="units"]', function(event) {
                calculateUnitsTotal();
            });


            $("table.order-list1").on("click", ".ibtnDel1", function(event) {
                $(this).closest("tr").remove();
                calculateDZSTotal();
                calculatePPackTotal();
                calculateUnitsTotal();

                counter1 -= 1
                $('#addrow1').attr('disabled', false).prop('value', "Add Row");
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