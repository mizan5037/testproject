<?php
$sapi_type = php_sapi_name();
if (substr($sapi_type, 0, 3) == 'cgi') {
    header("Status: 404 Not Found");
} else {
    header("HTTP/1.1 404 Not Found");
}

$PageTitle = "404 Error | Optima Inventory";
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
                    <i class="pe-7s-tools icon-gradient bg-mean-fruit">
                    </i>
                </div>
                <div>404
                    <div class="page-title-subheading">
                        Page Not Found
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="main-card mb-3 card text-center">
        <div class="card-body">
            <h1>404</h1>
            Ops! Your Requested Page is Not Available Right Now.
            <br>
            Please try another page.
            <br><br><br>
            <a href="#" onclick="window.history.back()" class="btn btn-sm btn-primary">You Can Go Back</a>
        </div>
    </div>
</div>




<?php
function customPagefooter()
{
    ?>

    <!-- Extra Script Here -->

<?php }
include_once "includes/footer.php";
?>