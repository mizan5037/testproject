<?php

$PageTitle = "Hourly Production Form | Optima Inventory";
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
                <div>Hourly Production Form
                    <div class="page-title-subheading">
                        Please use this form to add a new Item.
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="main-card mb-3 card">
        <div class="card-body">
            <form class="needs-validation" novalidate>
                <div class="form-row">
                    <div class="col-md-6 mb-3">
                        <label for="validationTooltip01">Date</label>
                        <input type="date" class="form-control" id="validationTooltip01" placeholder="Date" required>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="validationTooltip02">Floor no</label>
                        <input type="text" class="form-control" id="validationTooltip02" placeholder="Floor no" required>
                    </div>
                </div>
                <style>
                #mytable > tbody > tr > td{
                    padding: 0px;
                    margin: 0px;
                    margin-bottom: 0px!important;
                }
                #mytable > tbody > tr > td > input{
                    width: 100%;
                }

                #mytable > tbody > tr > td > input[type=text]{
                    width: 100px;
                }
                </style>
                <div class="form-row">
                    <table class="mb-0 table table-bordered table-hover order-list" id="mytable">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Line</th>
                                <th>PO</th>
                                <th>Style</th>
                                <th>Color</th>
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
                        <tbody>
                            <tr>
                                <th scope="row">1</th>
                                <td>
                                    <input placeholder="Line" type="text" class="form-control-sm form-control">
                                </td>
                                <td>
                                    <input placeholder="PO" type="text" class="form-control-sm form-control">
                                </td>
                                <td>
                                    <input placeholder="Style" type="text" class="form-control-sm form-control">
                                </td>
                                <td>
                                    <input placeholder="Color" type="text" class="form-control-sm form-control">
                                </td>
                                <td>
                                    <input placeholder="9" type="number" class="form-control-sm form-control">
                                </td>
                                <td>
                                    <input placeholder="10" type="number" class="form-control-sm form-control">
                                </td>
                                <td>
                                    <input placeholder="11" type="number" class="form-control-sm form-control">
                                </td>
                                <td>
                                    <input placeholder="12" type="number" class="form-control-sm form-control">
                                </td>
                                <td>
                                    <input placeholder="1" type="number" class="form-control-sm form-control">
                                </td>
                                <td>
                                    <input placeholder="3" type="number" class="form-control-sm form-control">
                                </td>
                                <td>
                                    <input placeholder="4" type="number" class="form-control-sm form-control">
                                </td>
                                <td>
                                    <input placeholder="5" type="number" class="form-control-sm form-control">
                                </td>
                                <td>
                                    <input placeholder="6" type="number" class="form-control-sm form-control">
                                </td>
                                <td>
                                    <input placeholder="7" type="number" class="form-control-sm form-control">
                                </td>
                                <td>
                                    <input placeholder="8" type="number" class="form-control-sm form-control">
                                </td>
                                <td><a class="deleteRow"></a></td>
                            </tr>

                        </tbody>
                        <tfoot>
                            <tr>
                                <td colspan="17" class="text-center"><input type="button" class="btn btn-sm btn-success" id="addrow" value="Add Row" /><br></td>
                            </tr>
                        </tfoot>
                    </table>
                </div>
                <br>
                <div class="row">
                    <div class="col-md-12 text-right">
                        <button class="btn btn-primary" type="submit">Save</button>
                    </div>
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
        // Add new row code

        $(document).ready(function() {
            var counter = 2;

            $("#addrow").on("click", function() {
                var newRow = $("<tr>");
                var cols = "";

                cols += '<th scope="row">' + counter + '</th>';
                cols += '<td><input placeholder="Line" type="text" class="form-control-sm form-control"></td>';
                cols += '<td><input placeholder="PO" type="text" class="form-control-sm form-control"></td>';
                cols += '<td><input placeholder="Style" type="text" class="form-control-sm form-control"></td>';
                cols += '<td><input placeholder="Color" type="text" class="form-control-sm form-control"></td>';
                cols += '<td><input placeholder="9" type="number" class="form-control-sm form-control"></td>';
                cols += '<td><input placeholder="10" type="number" class="form-control-sm form-control"></td>';
                cols += '<td><input placeholder="11" type="number" class="form-control-sm form-control"></td>';
                cols += '<td><input placeholder="12" type="number" class="form-control-sm form-control"></td>';
                cols += '<td><input placeholder="1" type="number" class="form-control-sm form-control"></td>';
                cols += '<td><input placeholder="3" type="number" class="form-control-sm form-control"></td>';
                cols += '<td><input placeholder="4" type="number" class="form-control-sm form-control"></td>';
                cols += '<td><input placeholder="5" type="number" class="form-control-sm form-control"></td>';
                cols += '<td><input placeholder="6" type="number" class="form-control-sm form-control"></td>';
                cols += '<td><input placeholder="7" type="number" class="form-control-sm form-control"></td>';
                cols += '<td><input placeholder="8" type="number" class="form-control-sm form-control"></td>';
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