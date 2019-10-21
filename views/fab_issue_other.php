<?php

$PageTitle = "Fabric Issue | Optima Inventory";
function customPageHeader()
{
    ?>
    <!--Arbitrary HTML Tags-->
<?php }
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
                <div>Fabric Issue (Contrast / Pocketing)
                    <div class="page-title-subheading">
                        Fabric Issue
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="main-card mb-3 card">
        <div class="card-body">
            <!-- <h5 class="card-title">Card Title</h5> -->
            <div class="container">
                <form action="" class="needs-validation" novalidate>
                    <div class="form-row">
                        <div class="col-md-4">
                            <label for="validationTooltip02">Buyer Name</label>
                            <input type="text" class="form-control" id="validationTooltip02" placeholder="Buyer Name" required>
                        </div>
                        <div class="col-md-4">
                            <label for="validationTooltip02">Contrast/Pocketing</label>
                            <input type="text" class="form-control" id="validationTooltip02" placeholder="Contrast/Pocketing" required>
                        </div>
                        <!-- <div class="col-md-4">
                            <label for="validationTooltip02">P.O. No</label>
                            <input type="text" class="form-control" id="validationTooltip02" placeholder="P.O. No" required>
                        </div> -->
                    </div>
                    <br>
                    <div class="form-row">
                        <table id="myTable" class="order-list table table-hover table-bordered">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Particulars</th>
                                    <th>Color</th>
                                    <th>QTZ (DZ)</th>
                                    <th>Consuption (yds)</th>
                                    <th>RQD QTY (yds)</th>
                                    <th>ISSUE QTY (yds)</th>
                                    <th>Remark</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <th>1</th>
                                    <td>
                                        <input class="mb-2 form-control-sm form-control" type="text" placeholder="Particulars" name="particulars" />
                                    </td>
                                    <td>
                                        <input class="mb-2 form-control-sm form-control" type="text" placeholder="Color" name="color" />
                                    </td>
                                    <td>
                                        <input class="mb-2 form-control-sm form-control" type="text" placeholder="QTZ (DZ)" name="qtz" />
                                    </td>
                                    <td>
                                        <input class="mb-2 form-control-sm form-control" type="text" placeholder="Consuption" name="consuption" />
                                    </td>
                                    <td>
                                        <input class="mb-2 form-control-sm form-control" type="text" placeholder="RQD QTY" name="rqd" />
                                    </td>
                                    <td>
                                        <input class="mb-2 form-control-sm form-control" type="text" placeholder="ISSUE QTY" name="issue" />
                                    </td>
                                    <td>
                                        <input class="mb-2 form-control-sm form-control" type="text" placeholder="Remark" name="remark" />
                                    </td>
                                    <td><a class="deleteRow"></a>

                                    </td>
                                </tr>
                            </tbody>
                            <tfoot>
                                <tr>
                                    <td colspan="9" style="text-align: left;">
                                        <input type="button" class="btn btn-success" id="addrow" value="Add Row" />
                                    </td>
                                </tr>
                            </tfoot>
                        </table>
                    </div>
                    <div class="row">
                        <div class="col-md-12 text-right">
                            <button type="submit" class="btn btn-primary">Issue</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>




<?php
function customPagefooter()
{
    ?>

    <script>
        $(document).ready(function() {
            var counter = 0;
            var limit = 100;

            $("#addrow").on("click", function() {

                counter = $('#myTable tr').length - 1;

                var newRow = $("<tr>");
                var cols = "";

                cols += '<th>' + counter + '</th>';
                cols += '<td><input class="mb-2 form-control-sm form-control" type="text" placeholder="Particulars" name="particulars" /></td>';
                cols += '<td><input class="mb-2 form-control-sm form-control" type="text" placeholder="Color" name="color"/></td>';
                cols += '<td><input class="mb-2 form-control-sm form-control" type="text" placeholder="QTZ (DZ)" name="qtz"/></td>';
                cols += '<td><input class="mb-2 form-control-sm form-control" type="text" placeholder="Consuption" name="consuption"/></td>';
                cols += '<td><input class="mb-2 form-control-sm form-control" type="text" placeholder="RQD QTY" name="rqd"/></td>';
                cols += '<td><input class="mb-2 form-control-sm form-control" type="text" placeholder="ISSUE QTY" name="issue" /></td>';
                cols += '<td><input class="mb-2 form-control-sm form-control" type="text" placeholder="Remark" name="remark"/></td>';

                cols += '<td><input type="button" class="ibtnDel btn btn-danger"  value="Delete"></td>';
                newRow.append(cols);
                if (counter >= limit) $('#addrow').attr('disabled', true).prop('value', "You've reached the limit");
                $("table.order-list").append(newRow);
                counter++;
            });

            $("table.order-list").on("change", 'input[name^="price"]', function(event) {
                calculateRow($(this).closest("tr"));
                calculateGrandTotal();
            });


            $("table.order-list").on("click", ".ibtnDel", function(event) {
                $(this).closest("tr").remove();
                calculateGrandTotal();

                counter -= 1
                $('#addrow').attr('disabled', false).prop('value', "Add Row");
            });


        });



        function calculateRow(row) {
            var price = +row.find('input[name^="price"]').val();

        }

        function calculateGrandTotal() {
            var grandTotal = 0;
            $("table.order-list").find('input[name^="price"]').each(function() {
                grandTotal += +$(this).val();
            });
            $("#grandtotal").text(grandTotal.toFixed(2));
        }
    </script>
    <script>
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