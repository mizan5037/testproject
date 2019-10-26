<?php

$PageTitle = "ALL Buyer | Optima Inventory";
function customPageHeader()
{
  ?>
  <!--Arbitrary HTML Tags-->
<?php }
$conn = db_connection();
include_once "includes/header.php";


if (isset($_GET['buyer_id'])) {
  $id = $_GET['buyer_id'];

  $sql = "SELECT * FROM buyer where BuyerID='$id'";
  $result = mysqli_query($conn, $sql);
  if ($result) {
    $detail = mysqli_fetch_assoc($result);
  } else {
    notice('error', $sql . "<br>" . mysqli_error($conn));
  }
}

?>

<div class="app-main__inner">
  <div class="app-page-title">
    <div class="page-title-wrapper">
      <div class="page-title-heading">
        <div class="page-title-icon">
          <i class="pe-7s-note icon-gradient bg-mean-fruit">
          </i>
        </div>
        <div>Buyer Details
          <div class="page-title-subheading">
            Single
          </div>
        </div>
      </div>
    </div>
  </div>

  <div class="main-card mb-3 card">
    <div class="card-body">
      <table style="width:100%" class="mb-0 table table-striped table-bordered table-hover">
        <tr>
          <th width="30%">Buyer Name</th>
          <td class="name" data-id1="<?php echo $detail['BuyerID']; ?>" contenteditable><?php echo $detail['BuyerName']; ?></td>
        </tr>
        <tr>
          <th>Buyer Email</th>
          <td class="email" data-id1="<?php echo $detail['BuyerID']; ?>" contenteditable><?php echo $detail['BuyerEmail']; ?></td>

        </tr>
        <tr>
          <th>Buyer Phone </th>
          <td class="BuyerPhone" data-id1="<?php echo $detail['BuyerID']; ?>" contenteditable><?php echo $detail['BuyerPhone']; ?></td>

        </tr>
        <tr>
          <th>Buyer Address1 </th>
          <td class="BuyerAddress1" data-id1="<?php echo $detail['BuyerID']; ?>" contenteditable><?php echo $detail['BuyerAddress1']; ?></td>

        </tr>
        <tr>
          <th>Buyer Address2 </th>
          <td class="BuyerAddress2" data-id1="<?php echo $detail['BuyerID']; ?>" contenteditable><?php echo $detail['BuyerAddress2']; ?></td>

        </tr>
        <tr>
          <th>Buyer City </th>
          <td class="BuyerCity" data-id1="<?php echo $detail['BuyerID']; ?>" contenteditable><?php echo $detail['BuyerCity']; ?></td>

        </tr>
        <tr>
          <th>Buyer Country </th>
          <td class="BuyerCountry" data-id1="<?php echo $detail['BuyerID']; ?>" contenteditable><?php echo $detail['BuyerCountry']; ?></td>

        </tr>
        <tr>
          <th>Buying House Name </th>
          <td class="BuyerBuyingHouseName" data-id1="<?php echo $detail['BuyerID']; ?>" contenteditable><?php echo $detail['BuyerBuyingHouseName']; ?></td>

        </tr>
        <tr>
          <th>Buyer Contact Person </th>
          <td class="BuyerContactPerson" data-id1="<?php echo $detail['BuyerID']; ?>" contenteditable><?php echo $detail['BuyerContactPerson']; ?></td>

        </tr>

        <tr>
          <th>Contact Person Designation</th>
          <td class="ContactPersonDesignation" data-id1="<?php echo $detail['BuyerID']; ?>" contenteditable><?php echo $detail['ContactPersonDesignation']; ?></td>

        </tr>
        <tr>
          <th>Contact Person Phone</th>
          <td class="ContactPersonPhone" data-id1="<?php echo $detail['BuyerID']; ?>" contenteditable><?php echo $detail['ContactPersonPhone']; ?></td>

        </tr>

      </table>
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
      function edit_data(id, text, column_name) {
        $.ajax({
          url: "<?php echo  $path; ?>/controller/buyer_edit.php",
          method: "POST",
          data: {
            id: id,
            text: text,
            cname: column_name,
            token: '<?= get_ses('token') ?>'
          },
          dataType: "text",
          success: function(data) {

            $('#notice').html('<div class="alert alert-success alert-dismissible fade show notification" role="alert">' + data + '<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
          }
        });
      }

      $(document).on('blur', '.name', function() {
        var id = $(this).attr("data-id1");
        var text = $(this).text();
        edit_data(id, text, "BuyerName");
      });

      $(document).on('blur', '.email', function() {
        var id = $(this).attr("data-id1");
        var text = $(this).text();
        edit_data(id, text, "BuyerEmail");
      });

      $(document).on('blur', '.BuyerPhone', function() {
        var id = $(this).attr("data-id1");
        var text = $(this).text();
        edit_data(id, text, "BuyerPhone");
      });

      $(document).on('blur', '.BuyerAddress1', function() {
        var id = $(this).attr("data-id1");
        var text = $(this).text();
        edit_data(id, text, "BuyerAddress1");
      });

      $(document).on('blur', '.BuyerAddress2', function() {
        var id = $(this).attr("data-id1");
        var text = $(this).text();
        edit_data(id, text, "BuyerAddress2");
      });

      $(document).on('blur', '.BuyerCity', function() {
        var id = $(this).attr("data-id1");
        var text = $(this).text();
        edit_data(id, text, "BuyerCity");
      });

      $(document).on('blur', '.BuyerCountry', function() {
        var id = $(this).attr("data-id1");
        var text = $(this).text();
        edit_data(id, text, "BuyerCountry");
      });

      $(document).on('blur', '.BuyerBuyingHouseName', function() {
        var id = $(this).attr("data-id1");
        var text = $(this).text();
        edit_data(id, text, "BuyerBuyingHouseName");
      });

      $(document).on('blur', '.BuyerContactPerson', function() {
        var id = $(this).attr("data-id1");
        var text = $(this).text();
        edit_data(id, text, "BuyerContactPerson");
      });

      $(document).on('blur', '.ContactPersonDesignation', function() {
        var id = $(this).attr("data-id1");
        var text = $(this).text();
        edit_data(id, text, "ContactPersonDesignation");
      });

      $(document).on('blur', '.ContactPersonPhone', function() {
        var id = $(this).attr("data-id1");
        var text = $(this).text();
        edit_data(id, text, "ContactPersonPhone");
      });

    });

  </script>

<?php }
include_once "includes/footer.php";
?>