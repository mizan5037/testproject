<?php

$page_privilege = 5;
hasAccess();

$PageTitle = "Item Received | Optima Inventory";
function customPageHeader()
{
    ?>
    <!--Arbitrary HTML Tags-->
<?php }
include_once "controller/add_item_received.php";
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
                <div>Item Received
                    <div class="page-title-subheading">
                        Please use this form to Register Items
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="main-card mb-3 card">
        <div class="card-body">
            <!-- <h5 class="card-title">PO</h5> -->
            <form class="needs-validation" method="POST" novalidate>
                <div class="form-row">
                    <table class="mb-0 table table-bordered order-list" id="myTable">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th width="15%">PO</th>
                                <th width="15%">Style</th>
                                <th width="15%">Color</th>
                                <th width="15%">Item</th>
                                <th width="8%">Size</th>
                                <th>Received Qty</th>
                                <th>Shortage/Excess</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <th scope="row">1</th>
                                <td>
                                    <select name="po[]" id="po" class="po mb-2 form-control-sm form-control search_select" required>
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
                                    <select name="style[]" id="style" class="style mb-2 form-control-sm form-control search_select" required>
                                        <option></option>
                                        <?php
                                        // $conn = db_connection();
                                        // $sql = "SELECT * FROM style WHERE status = 1";
                                        // $results = mysqli_query($conn, $sql);
                                        // while ($result = mysqli_fetch_assoc($results)) {
                                        //     echo '<option value="' . $result['StyleID'] . '">' . $result['StyleNumber'] . '</option>';
                                        // }
                                        ?>
                                    </select>
                                </td>
                                <td>
                                    <select name="color[]" id="color" class="color mb-2 form-control-sm form-control search_select" required>
                                        <option></option>
                                        <?php
                                        // $conn = db_connection();
                                        // $sql = "SELECT * FROM color WHERE status = 1";
                                        // $results = mysqli_query($conn, $sql);
                                        // while ($result = mysqli_fetch_assoc($results)) {
                                        //     echo '<option value="' . $result['id'] . '">' . $result['color'] . '</option>';
                                        // }
                                        ?>
                                    </select>
                                </td>
                                <td>
                                    <select name="item[]" class="item mb-2 form-control-sm form-control search_select" required>
                                        <option></option>
                                        <?php
                                        $conn = db_connection();
                                        $sql = "SELECT * FROM item WHERE status = 1";
                                        $results = mysqli_query($conn, $sql);
                                        while ($result = mysqli_fetch_assoc($results)) {
                                            echo '<option value="' . $result['ItemID'] . '">' . $result['ItemName'] . '</option>';
                                        }
                                        ?>
                                    </select>
                                </td>



                                <td>
                                    <select name="size[]" class="size mb-2 form-control-sm form-control " required>
                                        <option></option>
                                        <?php
                                        $conn = db_connection();
                                        $sql = "SELECT * FROM size WHERE status = 1";
                                        $results = mysqli_query($conn, $sql);
                                        while ($result = mysqli_fetch_assoc($results)) {
                                            echo '<option value="' . $result['id'] . '">' . $result['size'] . '</option>';
                                        }
                                        ?>
                                    </select>
                                </td>
                                <td>
                                    <input placeholder="Received" type="number" name="receiveroll[]" class="mb-2 form-control-sm form-control">
                                </td>
                                <td>
                                    <input placeholder="Shortage/Excess" type="number" name="sortexs[]" class="mb-2 form-control-sm form-control">
                                </td>
                                <td></td>
                            </tr>
                        </tbody>
                        <tfoot>
                            <tr>
                                <td colspan="9" style="text-align:center">
                                    <input type="button" id="addrow" class="btn btn-sm btn-success" value="Add Row" />
                                </td>
                            </tr>
                        </tfoot>
                    </table>
                </div>
                <br><br>
                <div class="container">
                    <div class="row">
                        <div class="col-md-12 text-right">
                            <button class="btn btn-primary" type="submit">Save</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>




<?php
function customPagefooter()
{
    global $path;
    ?>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.7/js/select2.min.js"></script>

    <script type="text/javascript">
        $('.search_select').select2({
            placeholder: 'Select Option'
        });
    </script>
    <script>
        // po to style
        function getstyle(poid, styleid) {
            let poids = $(poid).val();
            if (poids != '') {
                $.ajax({
                    url: "<?= $path ?>/controller/api.php",
                    method: "POST",
                    data: {
                        po: poids,
                        form: 'get_style',
                        token: '<?= get_ses('token') ?>'
                    },
                    dataType: "text",
                    success: function(data) {
                        $(styleid).html(data);
                    }
                });
            } else {
                $(styleid).html("<option>---</option>");
            }
        }

        function getcolor(styleid, colorid) {
            let style_id = $(styleid).val();
            // console.log(style_id);
            // console.log(colorid);
            if (style_id != '') {
                $.ajax({
                    url: "<?= $path ?>/controller/api.php",
                    method: "POST",
                    data: {
                        style: style_id,
                        form: 'get_color',
                        token: '<?= get_ses('token') ?>'
                    },
                    dataType: "text",
                    success: function(data) {
                        $(colorid).html(data);
                        // console.log(data);
                    }
                });
            } else {
                $(colorid).html("<option>-----</option>");
            }
        }
        $(document).ready(function() {
            var counter = 0;
            var limit = 100;

            $("#addrow").on("click", function() {

                counter = $('#myTable tr').length - 1;

                var newRow = $("<tr>");
                var cols = "";

                cols += '<th>' + counter + '</th>';
                cols += '<td><select name="po[]" onchange="getstyle(\'#po' + counter + '\',\'#style' + counter + '\');" id="po' + counter + '" class="po mb-2 form-control-sm form-control search_select" required><option></option>';
                <?php
                    $conn = db_connection();
                    $sql = "SELECT * FROM po WHERE status = 1";
                    $results = mysqli_query($conn, $sql);
                    while ($result = mysqli_fetch_assoc($results)) {
                        echo 'cols += \'<option value="' . $result['POID'] . '">' . $result['PONumber'] . '</option>\'; ';
                    }
                    ?>
                cols += '</select></td>';
                cols += '<td><select name="style[]" onchange="getcolor(\'#style' + counter + '\',\'#color' + counter + '\');" id="style' + counter + '" class="style mb-2 form-control-sm form-control search_select" required><option></option>';

                cols += '</select></td>';
                cols += '<td><select name="color[]" id="color' + counter + '" class="color mb-2 form-control-sm form-control search_select" required><option></option>';

                cols += '</select></td>';
                cols += '<td><select name="item[]" class="item mb-2 form-control-sm form-control search_select" required><option></option>';
                <?php
                    $conn = db_connection();
                    $sql = "SELECT * FROM item WHERE status = 1";
                    $results = mysqli_query($conn, $sql);
                    while ($result = mysqli_fetch_assoc($results)) {
                        echo 'cols += \'<option value="' . $result['ItemID'] . '">' . $result['ItemName'] . '</option>\'; ';
                    }
                    ?>
                cols += '</select></td>';


                cols += '<td><select name="size[]" class="size mb-2 form-control-sm form-control" required><option></option>';
                <?php
                    $conn = db_connection();
                    $sql = "SELECT * FROM size WHERE status = 1";
                    $results = mysqli_query($conn, $sql);
                    while ($result = mysqli_fetch_assoc($results)) {
                        echo 'cols += \'<option value="' . $result['id'] . '">' . $result['size'] . '</option>\'; ';
                    }
                    ?>
                cols += '</select></td>';
                cols += '<td><input placeholder="Received" type="number" name="receiveroll[]" class="mb-2 form-control-sm form-control"></td>';
                cols += '<td><input placeholder="Shortage/Excess" type="number" name="sortexs[]" class="mb-2 form-control-sm form-control"></td>';

                cols += '<td><input type="button" class="ibtnDel btn btn-danger"  value="Delete"></td>';
                newRow.append(cols);
                if (counter >= limit) $('#addrow').attr('disabled', true).prop('value', "You've reached the limit");
                $("table.order-list").append(newRow);



                counter++;
                setTimeout(function() {
                    $('.search_select').select2();
                }, 100);




            });




            $("table.order-list").on("click", ".ibtnDel", function(event) {
                $(this).closest("tr").remove();
                calculateGrandTotal();

                counter -= 1
                $('#addrow').attr('disabled', false).prop('value', "Add Row");
            });

            // po to style
            $("#po").change(function() {
                let po = this.value;
                if (po != '') {
                    $.ajax({
                        url: "<?= $path ?>/controller/api.php",
                        method: "POST",
                        data: {
                            po: po,
                            form: 'get_style',
                            token: '<?= get_ses('token') ?>'
                        },
                        dataType: "text",
                        success: function(data) {
                            $("#style").html(data);
                        }
                    });
                } else {
                    $("#style").html("<option>-----</option>");
                }

            });
            // style to color
            $("#style").change(function() {
                let style = this.value;
                if (style != '') {
                    $.ajax({
                        url: "<?= $path ?>/controller/api.php",
                        method: "POST",
                        data: {
                            style: style,
                            form: 'get_color',
                            token: '<?= get_ses('token') ?>'
                        },
                        dataType: "text",
                        success: function(data) {
                            $("#color").html(data);
                        }
                    });
                } else {
                    $("#color").html("<option>-----</option>");
                }

            });


        });
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



        // Ajax PO to style and color
        // po
        $(document).ready(function() {

        });

        // Style
    </script>
<?php }
include_once "includes/footer.php";
?>