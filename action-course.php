<?php
session_start();
error_reporting(0);
require_once '../config/config.php';
require_once '../config/helper.php';

// echo $_GET["submit"]; exit;

// echo $_POST['submit'];
// echo 'hii';
// echo $_POST['update']; exit;

if (isset($_POST['submit'])) {
    // Sanitize input
//     $date= $db->real_escape_string($_POST['date']);
    // $invoice= $db->real_escape_string($_POST['invoice']);
    $cou_type = $db->real_escape_string($_POST['cou_type']);
    $fee = $db->real_escape_string($_POST['fee']);
    $duration = $db->real_escape_string($_POST['duration']);
    $doc= $db->real_escape_string($_POST['doc']);
//     $address = $db->real_escape_string($_POST['address']);
//     $month=date('M',strtotime($date));
//     $year=date('Y',strtotime($date));

    // Insert into customers table
    $insert = $db->query("INSERT INTO course (`cou_type`,`fee`, `duration`,`doc`,`status`) 
    VALUES ('$cou_type','$fee','$duration','$doc','1')");
    $last_id1=$db->insert_id;

    $db->close();

    echo "<script>
            alert('Course successfully saved!');
            window.location.href='../course.php';
            </script>";    
} else if($_POST['update']){

    $id = $db->real_escape_string($_POST['id']);
    $cou_type = $db->real_escape_string($_POST['cou_type']);
    $fee = $db->real_escape_string($_POST['fee']);
    $duration = $db->real_escape_string($_POST['duration']);
    $doc= $db->real_escape_string($_POST['doc']);
//     $status = $db->real_escape_string($_POST['status']);
//     $address = $db->real_escape_string($_POST['address']);

// echo "UPDATE `course` SET `cou_type`='$cou_type',`fee`='$fee',`duration`='$duration',`doc`='$doc' WHERE id='$id'"; exit;
    $update=$db->query("UPDATE `course` SET `cou_type`='$cou_type',`fee`='$fee',`duration`='$duration',`doc`='$doc' WHERE id='$id'");

    echo "<script>
            alert('Course Updated saved!');
            window.location.href='../course.php';
            </script>";   
}
             
 else if ($_GET['submit'] == 'Disable'){
        $id = $_REQUEST['id'];
        $db->query("UPDATE `course` SET status='0' WHERE id='$id'");
        $_SESSION['errormsg'] = 'Disabled Sucessfully.';
        $_SESSION['errorValue'] = 'success';
        header("Location: ../course.php");
 }
    
  else if ($_GET['submit'] == 'Enable'){
        $id = $_REQUEST['id'];
        $db->query("UPDATE `course` SET status='1' WHERE id='$id'");
        $_SESSION['errormsg'] = 'Enabled sucessfully.';
        $_SESSION['errorValue'] = 'success';
        header("Location: ../course.php");
    
}  else if ($_GET["submit"]=='Delete'){
        $id = $_REQUEST['id'];
        $db->query("DELETE FROM `course` WHERE id='$id'");
        $_SESSION['errormsg'] = 'Deleted sucessfully.';
        $_SESSION['errorValue'] = 'success';
        header("Location: ../course.php");
} else {
    echo "<script>
            alert('Failed!');
            window.location.href='../course.php';
            </script>";    
}
?>
