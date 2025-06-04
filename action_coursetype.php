<?php
session_start();
error_reporting(0);
require_once '../config/config.php';
require_once '../config/helper.php';

// echo $_GET["submit"]; exit;

if (isset($_POST['submit'])) {
    
    $name = $db->real_escape_string($_POST['name']);
   
    // Insert into customers table
    // echo "INSERT INTO coursetype(`name`,`status`) VALUES ('$name','1')"; exit;
    $insert = $db->query("INSERT INTO coursetype(`name`,`status`) VALUES ('$name','1')");
    $last_id1=$db->insert_id;   

    $db->close();

    echo "<script>
            alert('Coursetype successfully saved!');
            window.location.href='../coursetype.php';
            </script>";    
} else if($_POST['update']){

    $id = $db->real_escape_string($_POST['id']);
    $name = $db->real_escape_string($_POST['name']);
   

    $update=$db->query("UPDATE `coursetype` SET `name`='$name' WHERE id='$id'");

    echo "<script>
            alert('Coursetype Updated saved!');
            window.location.href='../coursetype.php';
            </script>";   
}
             
 else if ($_GET['submit'] == 'Disable'){
        $id = $_REQUEST['id'];
        $db->query("UPDATE `coursetype` SET status='0' WHERE id='$id'");
        $_SESSION['errormsg'] = 'Disabled Sucessfully.';
        $_SESSION['errorValue'] = 'success';
        header("Location: ../coursetype.php");
 }
    
  else if ($_GET['submit'] == 'Enable'){
        $id = $_REQUEST['id'];
        $db->query("UPDATE `coursetype` SET status='1' WHERE id='$id'");
        $_SESSION['errormsg'] = 'Enabled sucessfully.';
        $_SESSION['errorValue'] = 'success';
        header("Location: ../coursetype.php");
    
}  else if ($_GET["submit"]=='Delete'){
        $id = $_REQUEST['id'];
        $db->query("DELETE FROM `coursetype` WHERE id='$id'");
        $_SESSION['errormsg'] = 'Deleted sucessfully.';
        $_SESSION['errorValue'] = 'success';
        header("Location: ../coursetype.php");
} else {
    echo "<script>
            alert('Failed!');
            window.location.href='../coursetype.php';
            </script>";    
}
?>
