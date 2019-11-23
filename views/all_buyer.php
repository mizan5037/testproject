<?php

$PageTitle = "ALL Buyer | Optima Inventory";
function customPageHeader()
{
    ?>
    <!--Arbitrary HTML Tags-->
<?php }
include_once "includes/header.php";
$conn = db_connection();

?>

<div class="app-main__inner">
    <div class="app-page-title">
        <span id="result"></span>
        <div class="page-title-wrapper">
            <div class="page-title-heading">
                <div class="page-title-icon">
                    <i class="pe-7s-news-paper icon-gradient bg-mean-fruit">
                    </i>
                </div>
                <div>ALL Buyer
                    <div class="page-title-subheading">
                        All the Buyer Upto Now.
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="main-card mb-3 card">
        <div class="card-body">
            <h5 class="card-title">Buyer List</h5>
            <table class="mb-0 table table-striped table-hover table-bordered">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Details</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $paginate = paginate('buyer');
                    $add_sql = $paginate['sql'];
                    $page_no = $paginate['page_no'];
                    $total_pages = $paginate['total_pages'];
                    $sql = "SELECT * FROM buyer WHERE status = 1" . $add_sql;
                    $buyer = mysqli_query($conn, $sql);

                    $count = ($page_no * 10) - 9;
                    while ($key = mysqli_fetch_assoc($buyer)) {


                        ?>
                        <tr>
                            <th scope="row"><?php echo $count++; ?></th>
                            <td><?php echo $key['BuyerName'] ?></td>
                            <td><?php echo $key['BuyerEmail'] ?></td>

                            <td>
                                <a class="mb-2 mr-2 btn-transition btn btn-sm btn-outline-secondary" href="<?= $path ?>/index.php?page=single_buyer&buyer_id=<?php echo $key['BuyerID']; ?>">

                                    Details
                                </a>

                                <button type="button" name="delete_btn" data-id13="<?php echo $key['BuyerID']; ?>" class="mb-2 mr-2 btn-transition btn btn-sm btn-danger btn_delete">x</button>
                            </td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
            <br><br>
            <div class="row">
                <div class="col-md-12">
                    <?php
                    links($page_no, $total_pages);
                    ?>
                </div>
            </div>
        </div>
    </div>
</div>




<?php
function customPagefooter()
{
    global $path;
    ?>

    <script>
        $(document).ready(function() {

            $(document).on('click', '.btn_delete', function() {
                var id = $(this).data("id13");

                if (confirm("Are you sure you want to delete this Buyer?")) {
                    $.ajax({
                        url: "<?php echo $path; ?>/controller/buyer_delete.php",
                        method: "POST",
                        data: {
                            id: id,
                            token: '<?= get_ses('token') ?>'
                        },
                        dataType: "text",
                        success: function(data) {
                            $('#result').html("<div class='alert alert-danger'>" + data + "</div>");
                            location.reload(true);


                        }
                    });
                }
            });


        });
    </script>

<?php }
include_once "includes/footer.php";
?>