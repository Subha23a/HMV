<?php
session_start();
error_reporting(0);
require_once '../config/config.php';
require_once '../config/helper.php';

// echo $_GET["submit"]; exit;

if (isset($_POST['submit'])) {
    // Sanitize input
//     $date= $db->real_escape_string($_POST['date']);
    // $invoice= $db->real_escape_string($_POST['invoice']);
    $inst_code = $db->real_escape_string($_POST['inst_code']);
    $inst_name = $db->real_escape_string($_POST['inst_name']);
    $location = $db->real_escape_string($_POST['location']);
//     $status = $db->real_escape_string($_POST['status']);
//     $address = $db->real_escape_string($_POST['address']);
//     $month=date('M',strtotime($date));
//     $year=date('Y',strtotime($date));

    // Insert into customers table
    $insert = $db->query("INSERT INTO institute (`inst_code`,`inst_name`, `location`,`status`) 
    VALUES ('$inst_code','$inst_name','$location','1')");
    $last_id1=$db->insert_id;

    $db->close();

    echo "<script>
            alert('institude successfully saved!');
            window.location.href='../institude.php';
            </script>";    
} else if($_POST['update']){

    $id = $db->real_escape_string($_POST['id']);
    $inst_code = $db->real_escape_string($_POST['inst_code']);
    $inst_name = $db->real_escape_string($_POST['inst_name']);
    $location = $db->real_escape_string($_POST['location']);
//     $status = $db->real_escape_string($_POST['status']);
//     $address = $db->real_escape_string($_POST['address']);

    $update=$db->query("UPDATE `institute` SET `inst_code`='$inst_code',`inst_name`='$inst_name',`location`='$location',`status`='$status' WHERE id='$id'");

    echo "<script>
            alert('institude Updated saved!');
            window.location.href='../institude.php';
            </script>";   
}
             
 else if ($_GET['submit'] == 'Disable'){
        $id = $_REQUEST['id'];
        $db->query("UPDATE `institute` SET status='0' WHERE id='$id'");
        $_SESSION['errormsg'] = 'Disabled Sucessfully.';
        $_SESSION['errorValue'] = 'success';
        header("Location: ../institude.php");
 }
    
  else if ($_GET['submit'] == 'Enable'){
        $id = $_REQUEST['id'];
        $db->query("UPDATE `institute` SET status='1' WHERE id='$id'");
        $_SESSION['errormsg'] = 'Enabled sucessfully.';
        $_SESSION['errorValue'] = 'success';
        header("Location: ../institude.php");
    
}  else if ($_GET["submit"]=='Delete'){
        $id = $_REQUEST['id'];
        $db->query("DELETE FROM `institute` WHERE id='$id'");
        $_SESSION['errormsg'] = 'Deleted sucessfully.';
        $_SESSION['errorValue'] = 'success';
        header("Location: ../institude.php");
} else {
    echo "<script>
            alert('Failed!');
            window.location.href='../institude.php';
            </script>";    
}
?>
