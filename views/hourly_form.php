<?php

$PageTitle = "Hourly Production Form | Optima Inventory";
function customPageHeader()
{
    ?>
    <!--Arbitrary HTML Tags-->
<?php }
include_once "controller/add_hourly_form.php";
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
            <form class="needs-validation" method="POST"novalidate>
                <div class="form-row">
                    <div class="col-md-4 mb-3">
                        <label for="validationTooltip01">Date</label>
                        <input type="date" class="form-control" name="date" id="validationTooltip01" placeholder="Date" required>
                    </div>
                    <div class="col-md-4 mb-3">
                        <label for="validationTooltip02">Floor no</label>
                        <input type="text" name="floorno" class="form-control" id="validationTooltip02" placeholder="Floor no" required>
                    </div>

                </div>
                <style>
                    #mytable>tbody>tr>td {
                        padding: 0px;
                        margin: 0px;
                        margin-bottom: 0px !important;
                    }

                    #mytable>tbody>tr>td>input {
                        width: 100%;
                    }

                    #mytable>tbody>tr>td>input[type=text] {
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
                                <th>Hour</th>
                                <th>Quantity</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <th scope="row">1</th>
                                <td>
                                    <select name="line[]" class="po  form-control" required>
                                        <option></option>
                                        <?php
                                        $conn = db_connection();
                                        $sql = "SELECT * FROM line WHERE status = 1";
                                        $results = mysqli_query($conn, $sql);
                                        while ($result = mysqli_fetch_assoc($results)) {
                                            echo '<option value="' . $result['id'] . '">' . $result['line'] . '</option>';
                                        }
                                        ?>
                                    </select>
                                </td>
                                <td>
                                    <select name="po[]" class="po  form-control" required>
                                        <option></option>
                                        <?php
                                        $conn = db_connection();
                                        $sql = "SELECT * FROM po WHERE status = 1";
                                        $results = mysqli_query($conn, $sql);
                                        while ($result = mysqli_fetch_assoc($results)) {
                                            echo '<option value="' . $result['POID'] . '">' . $result['PONumber'] . '</option>';
                                        }
                                        ?>
                                    </select>
                                </td>
                                <td>
                                    <select name="style[]" class="style  form-control" required>
                                        <option></option>
                                        <?php
                                        $conn = db_connection();
                                        $sql = "SELECT * FROM style WHERE status = 1";
                                        $results = mysqli_query($conn, $sql);
                                        while ($result = mysqli_fetch_assoc($results)) {
                                            echo '<option value="' . $result['StyleID'] . '">' . $result['StyleNumber'] . '</option>';
                                        }
                                        ?>
                                    </select>
                                </td>
                                <td>
                                    <select name="color[]" class="color  form-control" required>
                                        <option></option>
                                        <?php
                                        $conn = db_connection();
                                        $sql = "SELECT * FROM color WHERE status = 1";
                                        $results = mysqli_query($conn, $sql);
                                        while ($result = mysqli_fetch_assoc($results)) {
                                            echo '<option value="' . $result['id'] . '">' . $result['color'] . '</option>';
                                        }
                                        ?>
                                    </select>
                                </td>
                                <td>
                                    <select name="hour[]" class="form-control" required>
                                        <option >Choose Hour</option>
                                        <option value="9">9</option>
                                        <option value="10">10</option>
                                        <option value="11">11</option>
                                        <option value="12">12</option>
                                        <option value="1">1</option>
                                        <option value="3">3</option>
                                        <option value="4">4</option>
                                        <option value="5">5</option>
                                        <option value="6">6</option>
                                        <option value="7">7</option>
                                        <option value=8>8</option>
                                    </select>
                                </td>
                                <td><input placeholder="Quantity" name="quantity[]" type="number" class="form-control"></td>
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
                cols += '<td><select name="line[]" class="po form-control" required><option></option><?php
                    $conn = db_connection();
                    $sql = "SELECT * FROM line WHERE status = 1";
                    $results = mysqli_query($conn, $sql);
                    while ($result = mysqli_fetch_assoc($results)) {
                        echo '<option value="' . $result['id'] . '">' . $result['line'] . '</option>';
                    }
                    ?></select></td>';
                cols += '<td><select name="po[]" class="po form-control" required><option></option>';
                <?php
                    $conn = db_connection();
                    $sql = "SELECT * FROM po WHERE status = 1";
                    $results = mysqli_query($conn, $sql);
                    while ($result = mysqli_fetch_assoc($results)) {
                        echo 'cols += \'<option value="' . $result['POID'] . '">' . $result['PONumber'] . '</option>\'; ';
                    }
                    ?>
                cols += '</select></td>';
                cols += '<td><select name="style[]" class="style  form-control" required><option></option>';
                <?php
                    $conn = db_connection();
                    $sql = "SELECT * FROM style WHERE status = 1";
                    $results = mysqli_query($conn, $sql);
                    while ($result = mysqli_fetch_assoc($results)) {
                        echo 'cols += \'<option value="' . $result['StyleID'] . '">' . $result['StyleNumber'] . '</option>\'; ';
                    }
                    ?>
                cols += '</select></td>';
                cols += '<td><select name="color[]" class="color form-control" required><option></option>';
                <?php
                    $conn = db_connection();
                    $sql = "SELECT * FROM color WHERE status = 1";
                    $results = mysqli_query($conn, $sql);
                    while ($result = mysqli_fetch_assoc($results)) {
                        echo 'cols += \'<option value="' . $result['id'] . '">' . $result['color'] . '</option>\'; ';
                    }
                    ?>
                cols += '</select></td>';
                cols += '<td><select name="hour[]" class="form-control" required><option >Choose Hour</option><option value="9">9</option><option value="10">10</option><option value="11">11</option><option value="12">12</option><option value="1">1</option><option value="3">3</option><option value="4">4</option><option value="5">5</option><option value="6">6</option><option value="7">7</option><option value=8>8</option></select></td>';
                cols += '<td><input placeholder="Quantity" name="quantity[]" type="number" class="form-control"></td>';
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
