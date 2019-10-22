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
  <span id="result"></span>
  <div class="main-card mb-3 card">
    <div class="card-body">

      <h5 class="card-title">Buyer Details</h5>
      <table style="width:100%" class="mb-0 table table-striped table-hover">
        <tr>
          <th width="50%">Buyer Name</th>
          <td class="name" data-id1="<?php echo $detail['BuyerID']; ?>" contenteditable><?php echo $detail['BuyerName']; ?></td>
        </tr>
        <tr>
          <th>Buyer Email</th>
          <td class="email" data-id2="<?php echo $detail['BuyerID']; ?>" contenteditable><?php echo $detail['BuyerEmail']; ?></td>

        </tr>
        <tr>
          <th>Buyer Phone </th>
          <td class="BuyerPhone" data-id3="<?php echo $detail['BuyerID']; ?>" contenteditable><?php echo $detail['BuyerPhone']; ?></td>

        </tr>
        <tr>
          <th>Buyer Address1 </th>
          <td class="BuyerAddress1" data-id4="<?php echo $detail['BuyerID']; ?>" contenteditable><?php echo $detail['BuyerAddress1']; ?></td>

        </tr>
        <tr>
          <th>Buyer Address2 </th>
          <td class="BuyerAddress2" data-id5="<?php echo $detail['BuyerID']; ?>" contenteditable><?php echo $detail['BuyerAddress2']; ?></td>

        </tr>
        <tr>
          <th>Buyer City </th>
          <td class="BuyerCity" data-id6="<?php echo $detail['BuyerID']; ?>" contenteditable><?php echo $detail['BuyerCity']; ?></td>

        </tr>
        <tr>
          <th>Buyer Country </th>
          <td class="BuyerCountry" data-id7="<?php echo $detail['BuyerID']; ?>" contenteditable><?php echo $detail['BuyerCountry']; ?></td>

        </tr>
        <tr>
          <th>Buying House Name </th>
          <td class="BuyerBuyingHouseName" data-id8="<?php echo $detail['BuyerID']; ?>" contenteditable><?php echo $detail['BuyerBuyingHouseName']; ?></td>

        </tr>
        <tr>
          <th>Buyer Contact Person </th>
          <td class="BuyerContactPerson" data-id9="<?php echo $detail['BuyerID']; ?>" contenteditable><?php echo $detail['BuyerContactPerson']; ?></td>

        </tr>

        <tr>
          <th>Contact Person Designation</th>
          <td class="ContactPersonDesignation" data-id10="<?php echo $detail['BuyerID']; ?>" contenteditable><?php echo $detail['ContactPersonDesignation']; ?></td>

        </tr>
        <tr>
          <th>Contact Person Phone</th>
          <td class="ContactPersonPhone" data-id11="<?php echo $detail['BuyerID']; ?>" contenteditable><?php echo $detail['ContactPersonPhone']; ?></td>

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
            buyer_name: text,
            text: column_name,
            token: '<?= get_ses('token') ?>'
          },
          dataType: "text",
          success: function(data) {

            $('#result').html("<div class='alert alert-success'>" + data + "</div>");
          }
        });
      }
      $(document).on('blur', '.name', function() {
        var id = $(this).attr("data-id1");
        var buyer_name = $(this).text();
        edit_data(id, buyer_name, "BuyerName");
      });

      $(document).on('blur', '.email', function() {
        var id = $(this).attr("data-id2");
        var buyer_name = $(this).text();
        edit_data(id, buyer_name, "BuyerEmail");
      });

      $(document).on('blur', '.BuyerPhone', function() {
        var id = $(this).attr("data-id3");
        var buyer_name = $(this).text();
        edit_data(id, buyer_name, "BuyerPhone");
      });

      $(document).on('blur', '.BuyerAddress1', function() {
        var id = $(this).attr("data-id4");
        var buyer_name = $(this).text();
        edit_data(id, buyer_name, "BuyerAddress1");
      });

      $(document).on('blur', '.BuyerAddress2', function() {
        var id = $(this).attr("data-id5");
        var buyer_name = $(this).text();
        edit_data(id, buyer_name, "BuyerAddress2");
      });

      $(document).on('blur', '.BuyerCity', function() {
        var id = $(this).attr("data-id6");
        var buyer_name = $(this).text();
        edit_data(id, buyer_name, "BuyerCity");
      });

      $(document).on('blur', '.BuyerCountry', function() {
        var id = $(this).attr("data-id7");
        var buyer_name = $(this).text();
        edit_data(id, buyer_name, "BuyerCountry");
      });

      $(document).on('blur', '.BuyerBuyingHouseName', function() {
        var id = $(this).attr("data-id8");
        var buyer_name = $(this).text();
        edit_data(id, buyer_name, "BuyerBuyingHouseName");
      });

      $(document).on('blur', '.BuyerContactPerson', function() {
        var id = $(this).attr("data-id9");
        var buyer_name = $(this).text();
        edit_data(id, buyer_name, "BuyerContactPerson");
      });

      $(document).on('blur', '.ContactPersonDesignation', function() {
        var id = $(this).attr("data-id10");
        var buyer_name = $(this).text();
        edit_data(id, buyer_name, "ContactPersonDesignation");
      });

      $(document).on('blur', '.ContactPersonPhone', function() {
        var id = $(this).attr("data-id11");
        var buyer_name = $(this).text();
        edit_data(id, buyer_name, "ContactPersonPhone");
      });
    });
  </script>

<?php }
include_once "includes/footer.php";
?>