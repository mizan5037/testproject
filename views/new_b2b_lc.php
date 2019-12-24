<?php

$page_privilege = 4;
hasAccess();

$conn = db_connection();
$PageTitle = "New B2B LC | Optima Inventory";

function customPageHeader()
{
    ?>
    <!--Arbitrary HTML Tags-->
<?php }
include_once "controller/new_b2b_lc.php";
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
                <div>New B2B LC
                    <div class="page-title-subheading">
                        Please use this form to add a new B2B LC.
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="main-card mb-3 card">
        <div class="card-body">
            <form class="needs-validation" method="post" novalidate>
                <div class="form-row">
                    <div class="col-md-3 mb-3">
                        <label>Master LC Number</label>
                        <select name="masterlcid" class="item mb-2 form-control-sm form-control" required>
                            <option></option>
                            <?php
                            $sql = "SELECT MasterLCID, MasterLCNumber FROM masterlc WHERE status = 1";
                            $results = mysqli_query($conn, $sql);
                            while ($result = mysqli_fetch_assoc($results)) {
                                echo '<option value="' . $result['MasterLCID'] . '">' . $result['MasterLCNumber'] . '</option>';
                            }
                            ?>
                        </select>
                    </div>
                    <div class="col-md-3 mb-3">
                        <label>B2B LC Number</label>
                        <input type="test" name="b2blcnumber" class="form-control form-control-sm" placeholder="B2B LC Number" required>
                    </div>
                    <div class="col-md-3 mb-3">
                        <label>Supplier Name</label>
                        <input type="text" name="suppliername" class="form-control form-control-sm" placeholder="Supplier Name" required>
                    </div>
                    <div class="col-md-3 mb-3">
                        <label>Issue Date</label>
                        <input type="date" name="issuedate" class="form-control form-control-sm" placeholder="Supplier" required>
                    </div>
                    <div class="col-md-3 mb-3">
                        <label>Supplier Contact Person</label>
                        <input type="text" name="contactperson" class="form-control form-control-sm" placeholder="Supplier Contact Person" required>
                    </div>
                    <div class="col-md-3 mb-3">
                        <label>Supplier Contact Number</label>
                        <input type="text" name="contactnumber" class="form-control form-control-sm" placeholder="Supplier Contact Number" required>
                    </div>
                    <div class="col-md-3 mb-3">
                        <label>Supplier Address</label>
                        <textarea name="address" class="form-control form-control-sm" placeholder="Supplier Address" required></textarea>
                    </div>
                    <div class="col-md-3 mb-3">
                        <label>Maturity Date</label>
                        <input type="date" name="maturitydate" class="form-control form-control-sm" placeholder="Supplier" required>
                    </div>
                </div>
                <div class="form-row">
                    <table class="mb-0 table table-bordered order-list">
                        <thead>
                            <tr>
                                <th width="1%">#</th>
                                <th width="20%">PO</th>
                                <th width="25%">Style</th>
                                <th width="15%">Item</th>
                                <th width="15%">Qty(DZS)</th>
                                <th width="15%">Price Per Unit</th>
                                <th width="9%"></th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <th scope="row">1</th>
                                <td>
                                    <select class="form-control form-control-sm" id="po"name="po[]" required>
                                        <option></option>
                                        <?php
                                        foreach ($poArr as $key) {
                                            echo '<option value="' . $key['POID'] . '">' . $key['PONumber'] . '</option>';
                                        }
                                        ?>
                                    </select>
                                </td>
                                <td>
                                    <select name="style" id="style" class="style mb-2 form-control-sm form-control" required>
                                        <option value=""></option>

                                      </select>
                                </td>
                                <td>
                                    <select class="form-control form-control-sm" name="item[]" required>
                                        <option></option>
                                        <?php
                                        foreach ($itemArr as $key) {
                                            echo '<option value="' . $key['ItemID'] . '">' . $key['ItemName'] . '</option>';
                                        }
                                        ?>
                                    </select>
                                </td>

                                <td>
                                    <input placeholder="Qty" id="qty" name="qty[]" min="1" type="number" class="mb-2 form-control-sm form-control" required>
                                </td>
                                <td>
                                    <input placeholder="Price Per Unit" id="unitprice" min="0.01" name="ppu[]" type="number" class="mb-2 form-control-sm form-control" step="0.01" required>
                                </td>

                                <td><a class="deleteRow"></a></td>
                            </tr>

                        </tbody>
                        <tfoot>
                            <tr>
                                <td colspan="8" class="text-center"><input type="button" class="btn btn-sm btn-success" id="addrow" value="Add Row" /><br></td>
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
    global $styleArr;
    global $itemArr;
    global $poArr;

    global $path;
    ?>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.7/js/select2.min.js"></script>

    <script type="text/javascript">
        $('.search_select').select2({
            placeholder: 'Select Your Option'
        });

        $("select").select2();
    </script>
    <script>
        // Add new row code

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


        function getqty(poo,style,qtyid,unitpriceid) {
          
            let poos = $(poo).val();
            let styles = $(style).val();

            console.log(poos);
            console.log(styles);

            console.log(qtyid);
            console.log(unitpriceid);
          

            if (styles != '') {
                    $.ajax({
                        url: "<?= $path ?>/controller/api.php",
                        method: "POST",
                        data: {
                            
                            styles: styles,
                            form: 'style_qtys',
                            token: '<?= get_ses('token') ?>'
                        },
                        dataType: "text",
                        success: function(data) {
                            $(qtyid).val(data);

                        }
                    });
                } else {
                    $(qtyid).val(00);
                }

                if (poos != '') {
                    $.ajax({
                        url: "<?= $path ?>/controller/api.php",
                        method: "POST",
                        data: {
                            
                            poos: poos,
                            form: 'fob_unit_prices',
                            token: '<?= get_ses('token') ?>'
                        },
                        dataType: "text",
                        success: function(data) {
                            $(unitpriceid).val(data);
                           

                        }
                    });
                } else {
                    $(unitpriceid).val(00);
                }

           
        }




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

        $("#style").change(function() {
                let style = this.value;
                let po = $("#po").val();
                if (style != '') {
                    $.ajax({
                        url: "<?= $path ?>/controller/api.php",
                        method: "POST",
                        data: {
                            
                            style: style,
                            form: 'style_qty',
                            token: '<?= get_ses('token') ?>'
                        },
                        dataType: "text",
                        success: function(data) {
                            $("#qty").val(data);
                        }
                    });
                } else {
                    $("#qty").val(00);
                }

                if (po != '') {
                    $.ajax({
                        url: "<?= $path ?>/controller/api.php",
                        method: "POST",
                        data: {
                            
                            po: po,
                            form: 'fob_unit_price',
                            token: '<?= get_ses('token') ?>'
                        },
                        dataType: "text",
                        success: function(data) {
                            $("#unitprice").val(data);
                        }
                    });
                } else {
                    $("#unitprice").val(00);
                }

            });

        $(document).ready(function() {
            var counter = 2;

            $("#addrow").on("click", function() {
                var newRow = $("<tr>");
                var cols = "";

                cols += '<th scope="row">' + counter + '</th>';
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
                cols += '<td><select name="style[]" onchange="getqty(\'#po' + counter + '\',\'#style' + counter + '\',\'#qty' + counter + '\',\'#unitprice' + counter + '\');"   id="style' + counter + '" class="style mb-2 form-control-sm form-control search_select" required><option></option>';
                cols += '</select></td>';
                  
                cols += '<td><select class="form-control form-control-sm search_select" name="item[]" required> <option></option>  <?php foreach ($itemArr as $key) {
                             echo '<option value="' . $key['ItemID'] . '">' . $key['ItemName'] . '</option>';
                         } ?></select></td>';


                cols += '<td><input placeholder="Qty" id="qty' + counter + '"  name="qty[]" min="1" type="number" class="mb-2 form-control-sm form-control" required></td>';
                cols += '<td><input placeholder="Price Per Unit" id="unitprice' + counter + '" name="ppu[]" min="0.01" type="number" class="mb-2 form-control-sm form-control" step="0.01" required></td>';

                cols += '<td><input type="button" class="ibtnDel btn btn-sm btn-danger "  value="Delete"></td>';
                newRow.append(cols);
                $("table.order-list").append(newRow);
                counter++;
                setTimeout(function() {
                    $('.search_select').select2();
                }, 100);
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