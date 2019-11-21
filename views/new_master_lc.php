<?php

$PageTitle = "New Master LC | Optima Inventory";
function customPageHeader()
{
    ?>
    <!-- Theme included stylesheets -->
    <link href="https://cdn.quilljs.com/1.3.6/quill.snow.css" rel="stylesheet">

    <!--Arbitrary HTML Tags-->
<?php }

include_once "controller/new_master_lc.php";
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
                <div>New Master LC
                    <div class="page-title-subheading">
                        Please use this form to add a new Master LC.
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="main-card mb-3 card">
        <div class="card-body">
            <!-- <h5 class="card-title">LC</h5> -->
            <form class="needs-validation" id="form" method="post" novalidate>
                <div class="form-row">
                    <div class="col-md-4 mb-3">
                        <label>Master LC Number</label>
                        <input type="text" class="form-control form-control-sm" name="mlcnumber" placeholder="Master LC Number" required>
                    </div>
                    <div class="col-md-4 mb-3">
                        <label>Master LC Issue Date</label>
                        <input type="date" class="form-control form-control-sm" name="mlcissuedate" placeholder="Master LC Issue Date" required>
                    </div>
                    <div class="col-md-4 mb-3">
                        <label>Master LC Expiry Date</label>
                        <input type="date" class="form-control form-control-sm" name="mlcexpirydate" placeholder="Master LC Expiry Date" required>

                    </div>
                </div>
                <div class="form-row">
                    <div class="col-md-2 mb-3">
                        <label>Sender Bank</label>
                        <input type="text" class="form-control form-control-sm" name="sender_bank" placeholder="Sender Bank" required>
                    </div>
                    <div class="col-md-2 mb-3">
                        <label>Receiver Bank</label>
                        <input type="text" class="form-control form-control-sm" name="receiver_bank" placeholder="Receiver Bank" required>
                    </div>
                    <div class="col-md-4 mb-3">
                        <label>Buyer</label>
                        <select class="form-control form-control-sm search_select" name="buyer" required>
                            <option></option>
                            <?php
                            $sql = "SELECT BuyerID, BuyerName FROM buyer WHERE Status = 1";
                            $results = mysqli_query($conn, $sql);
                            while ($result = mysqli_fetch_assoc($results)) {
                                echo '<option value="' . $result['BuyerID'] . '">' . $result['BuyerName'] . '</option>';
                            }
                            ?>
                        </select>
                    </div>
                    <div class="col-md-4 mb-3">
                        <label>LC Issued By</label>
                        <input type="text" class="form-control form-control-sm" name="lcissuedby" placeholder="LC Issued By" required>
                    </div>
                </div>
                <div class="form-row">
                    <div class="col-md-4 mb-3">
                        <label>Currency</label>
                        <input type="text" class="form-control form-control-sm" id="currency" name="currency" placeholder="Currency" required>
                    </div>
                    <div class="col-md-4 mb-3">
                        <label>Amount</label>
                        <input type="number" class="form-control form-control-sm" name="amount" placeholder="Amount" step="0.01" required>
                    </div>
                </div>
                <div class="form-row">
                    <div class="col-md-3 mb-3">
                        <label>Partial Shipment</label>
                        <select class="form-control form-control-sm" name="partialshipment" required>
                            <option></option>
                            <option value="1">Allowed</option>
                            <option value="0">Not Allowed</option>
                        </select>
                    </div>
                    <div class="col-md-3 mb-3">
                        <label>Transshipment</label>
                        <select class="form-control form-control-sm" name="transshipment" required>
                            <option></option>
                            <option value="1">Allowed</option>
                            <option value="0">Not Allowed</option>
                        </select>
                    </div>
                    <div class="col-md-3 mb-3">
                        <label>Port Of Loading</label>
                        <input type="text" class="form-control form-control-sm" name="portofloading" placeholder="Port Of Loading" required>
                    </div>
                    <div class="col-md-3 mb-3">
                        <label>Port Of Discharge</label>
                        <input type="text" class="form-control form-control-sm" name="portofdischarge" placeholder="Port Of Discharge" required>
                    </div>
                </div>
                <div class="form-row">
                    <div class="col-md-12">
                        Description:
                        <div id="editor"></div>
                        <textarea name="description" style="display:none" id="description"></textarea>
                    </div>
                    <div class="col-md-12" style="height: 100px;"></div>
                </div>
                <div class="form-row" style="overflow-x: auto; white-space: nowrap;">
                    <table class="mb-0 table table-bordered order-list table-hover table-sm" id="myTable" width="100%">
                        <thead>
                            <tr>
                                <th width="3%">#</th>
                                <th width="20%">P.O. No</th>
                                <th width="20%">Style</th>
                                <th width="10%">Qty</th>
                                <th width="10%">Unit Name</th>
                                <th width="12%">Unit Price</th>
                                <th width="7%" title="Latest Shipment Date">L.S.D</th>
                                <th width="18%">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <th scope="row">1</th>
                                <td>
                                    <select class="form-control form-control-sm search_select" id="po" name="pono[]" required>
                                        <option>Select PO</option>
                                        <?php
                                        foreach ($poArr as $key) {
                                            echo '<option value="' . $key['POID'] . '">' . $key['PONumber'] . '</option>';
                                        }
                                        ?>
                                    </select>
                                </td>
                                <td>
                                    <select class="form-control form-control-sm search_select" id="style" name="style[]" required>
                                        <option></option>
                                       
                                    </select>
                                </td>
                                <td>
                                    <input placeholder="Qty" type="number" name="qty[]" class="mb-2 form-control-sm form-control" required>
                                </td>
                                <td>
                                    <input placeholder="U/Name" type="text" name="unitname[]" class="mb-2 form-control-sm form-control" required>
                                </td>
                                <td>
                                    <input placeholder="U/Price" type="number" name="price[]" class="mb-2 form-control-sm form-control" step="0.01" required>
                                </td>
                                <td>
                                    <input type="date" name="lsdate[]" class="mb-2 form-control-sm form-control" required>
                                </td>
                                <td><a class="deleteRow btn btn-sm btn-warning disabled">First Row</a></td>
                            </tr>

                        </tbody>
                        <tfoot>
                            <tr>
                                <td colspan="8" class="text-center"><input type="button" class="btn btn-sm btn-success" id="addrow" value="Add Row" /><br></td>
                            </tr>
                            <tr class="bg-success">
                                <td colspan="4" class="text-right"><span id="grandtotalqty"></span>

                                </td>
                                <td colspan="2" class="text-right"><span id="grandtotal"></span>

                                </td>
                                <td colspan="2" class="text-right">
                                </td>
                            </tr>
                        </tfoot>
                    </table>
                </div>
                <br><br>
                <div class="row">
                    <div class="col-md-6"><button class="btn btn-danger mr-auto" id="reset" type="reset">Reset</button></div>
                    <div class="col-md-6 text-right"><button class="btn btn-primary" type="submit"><i class="metismenu-state-icon pe-7s-diskette"></i> &nbsp; Save </button></div>
                </div>

            </form>
        </div>
    </div>
</div>



<?php
function customPagefooter()
{
    global $styleArr;
    global $poArr;
    global $path;

    ?>
    <!-- Include the Quill library -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.7/js/select2.min.js"></script>

    <script type="text/javascript">
        $('.search_select').select2({
            placeholder: 'Select Card Numbers'
        });

        $("select").select2();
    </script>
    <script src="https://cdn.quilljs.com/1.3.6/quill.js"></script>

    <!-- Initialize Quill editor -->
    <script>
        var quill = new Quill('#editor', {
            theme: 'snow'
        });

        $("#form").on("submit", function() {
            $("#description").val($("#editor").find('div:first').html());
            console.log($("#description").val())
        })
    </script>
    <script>
        // Example starter JavaScript for disabling form submissions if there are invalid fields

        $(document).ready(function() {
            var counter = 0;
            var limit = 100;

            $("#addrow").on("click", function() {

                counter = $('#myTable tr').length - 2;

                var newRow = $("<tr>");
                var cols = "";

                cols += '<th scope="row">' + counter + '</th>';
                cols += '<td><select class="form-control form-control-sm search_select" id="po" name="pono[]" required> <option></option> <?php foreach ($poArr as $key) {
                                                                                                                                            echo '<option value="' . $key['POID'] . '">' . $key['PONumber'] . '</option>';
                                                                                                                                        } ?> </select></td>';
                cols += '<td><select class="form-control form-control-sm search_select" id="style" name="style[]" required> <option></option>  </select></td>';
                cols += '<td><input type="number" placeholder="Qty" class="mb-2 form-control-sm form-control" name="qty[]"/></td>';
                cols += '<td><input type="text" placeholder="U/Name" class="mb-2 form-control-sm form-control" name="unitname[]"/></td>';
                cols += '<td><input placeholder="U/Price" type="number" class="mb-2 form-control-sm form-control" name="price[]"/></td>';
                cols += '<td><input type="date" class="mb-2 form-control-sm form-control" name="lsdate[]"/></td>';

                cols += '<td><input type="button" class="ibtnDel btn btn-sm btn-warning"  value="Delete"></td>';
                newRow.append(cols);
                if (counter >= limit) $('#addrow').attr('disabled', true).prop('value', "You've reached the limit");
                $("table.order-list").append(newRow);
                counter++;
                setTimeout(function() {
                    $('.search_select').select2();
                }, 100);
            });

            $("table.order-list").on("change", 'input[name^="qty"]', function(event) {
                calculateRowqty($(this).closest("tr"));
                calculateGrandTotalqty();
            });

            $("table.order-list").on("change", 'input[name^="price"]', function(event) {
                calculateRow($(this).closest("tr"));
                calculateGrandTotal();
            });


            $("table.order-list").on("click", ".ibtnDel", function(event) {
                $(this).closest("tr").remove();
                calculateGrandTotalqty();
                calculateGrandTotal();

                counter -= 1
                $('#addrow').attr('disabled', false).prop('value', "Add Row");
            });

            //get styles
            $("#po").change(function() {
                let poid = this.value;
                if (poid != '') {
                    $.ajax({
                        url: "<?= $path ?>/controller/api.php",
                        method: "POST",
                        data: {
                            po: poid,
                            form: 'get_style',
                            token: '<?= get_ses('token') ?>'
                        },
                        dataType: "text",
                        success: function(data) {
                            $("#style").html(data);
                        }
                    });
                } else {
                    $("#style").html("<option>---</option>");
                }

            });


        });



        function calculateRowqty(row) {
            var qty = +row.find('input[name^="qty"]').val();

        }

        function calculateRow(row) {
            var price = +row.find('input[name^="price"]').val();

        }

        function calculateGrandTotalqty() {
            var grandTotalqty = 0;
            $("table.order-list").find('input[name^="qty"]').each(function() {
                grandTotalqty += +$(this).val();
            });
            $("#grandtotalqty").text('Total Qty: ' + grandTotalqty.toFixed(0));
        }

        function calculateGrandTotal() {
            var grandTotal = 0;
            $("table.order-list").find('input[name^="price"]').each(function() {
                grandTotal += +$(this).val();
            });
            $("#grandtotal").text('Grand Total: ' + $("#currency").val() + " " + grandTotal.toFixed(0));
        }

        $("#reset").on("click", function() {
            $("#grandtotalqty").text('');
            $("#grandtotal").text('');
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