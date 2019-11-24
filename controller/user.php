<?php
$conn = db_connection();
$user_id = get_ses('user_id');
$sqls = "SELECT * FROM users WHERE UserID = $user_id";
$row = mysqli_fetch_assoc(mysqli_query($conn, $sqls));

$sqla = "SELECT * FROM users";
$all = mysqli_query($conn, $sqla);


//update user info
if (isset($_POST['update'])) {
    $name  = mysqli_real_escape_string($conn, $_POST['name']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $pass  = '';
    if (isset($_POST['old']) && $_POST['new'] == $_POST['rnew'] && md5($_POST['old']) == $row['Pass']) {
        $pass = md5($_POST['new']);
    } elseif (isset($_POST['old']) && $_POST['new'] != $_POST['rnew']) {
        notice('error', 'Both Password not matched!');
        nowgo('/index.php?page=user');
    } elseif (isset($_POST['old']) && $_POST['new'] == $_POST['rnew'] && $_POST['old'] != $row['Pass']) {
        notice('error', 'Old Password not matched!');
        nowgo('/index.php?page=user');
    }

    if ($pass == '') {
        $sql = "UPDATE users SET Name='$name', email='$email' WHERE UserID = $user_id";
    } else {
        $sql = "UPDATE users SET Name='$name', email='$email',Pass='$pass' WHERE UserID = $user_id";
    }

    if (mysqli_query($conn, $sql)) {
        notice('success', 'User Data Updated Successfully!');
    } else {
        notice('error', $sql . "<br>" . mysqli_error($conn));
    }
    nowgo('/index.php?page=user');
}


//Add new User
if(isset($_POST['new_user'])){
    $name  = mysqli_real_escape_string($conn, $_POST['name']);
    $username  = mysqli_real_escape_string($conn, $_POST['username']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $designation = mysqli_real_escape_string($conn, $_POST['designation']);
    $pass = mysqli_real_escape_string($conn, $_POST['pass']);
    $rpass = mysqli_real_escape_string($conn, $_POST['rpass']);

    if($pass == $rpass){
        $pass = md5($pass);
        $sql = "INSERT INTO users(Name, Username, email, Designation, Pass, AddedBy) VALUES ('$name','$username','$email','$designation','$pass','$user_id')";
        if (mysqli_query($conn, $sql)) {
            notice('success', 'User Added Successfully!');
        } else {
            notice('error', $sql . "<br>" . mysqli_error($conn));
        }
        nowgo('/index.php?page=user');
    }
}


//User status change
if(isset($_GET['status']) && $_GET['status'] != '' && isset($_GET['id']) && $_GET['id'] != ''){
    $id = mysqli_real_escape_string($conn, $_GET['id']);
    $status = mysqli_real_escape_string($conn, $_GET['status']) ? '0' : '1';

    $sqlu = "UPDATE users SET Status=$status WHERE UserID = $id";
    if (mysqli_query($conn, $sqlu)) {
        $status = $status ? 'Assigned' : 'Banned';
        notice('success', "User $status Successfully!");
    } else {
        notice('error', $sql . "<br>" . mysqli_error($conn));
    }
    nowgo('/index.php?page=user');

}
