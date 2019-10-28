<?php
if(isset($_GET['fab_rec_id']) && $_GET['fab_rec_id'] != ''){
    echo 'this is single stock fabric receive!!';
}elseif(isset($_GET['fab_rec_id_other']) && $_GET['fab_rec_id_other'] != ''){
    echo 'this is single stock fabric Other receive!!';
}else{
    nowgo('/index.php?page=fabric_stock');
}
