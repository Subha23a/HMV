<?php
session_start();
require_once '../config/config.php';
require_once '../config/helper.php';
$action = $_REQUEST['submit'];
switch ($action) {
    case 'add':
        $name = mysqli_real_escape_string($db, $_POST['name']);
        $vehno = mysqli_real_escape_string($db, $_POST['vehno']);


        $db->query("INSERT INTO `vehicle1`(`name`, `vehno`,`status`) VALUES ('$name','$vehno','1')");
        $lid = $db->insert_id;

        $_SESSION['e_msg'] = 'Added successfully.';
        $_SESSION['e_value'] = 'success';
        header("Location: ../vehicle.php");
        break;
    case 'update':
        $id = mysqli_real_escape_string($db, $_POST['id']);
        $name = mysqli_real_escape_string($db, $_POST['name']);
        $vehno = mysqli_real_escape_string($db, $_POST['vehno']);
        
        $db->query("UPDATE `vehicle1` SET name='$name',vehno='$vehno' WHERE id='$id'");
        $lid = $db->insert_id;

        $_SESSION['e_msg'] = 'Updated successfully.';
        $_SESSION['e_value'] = 'success';
        header("Location: ../vehicle.php");
        break;
    case 'Disable':
        $id = $_REQUEST['id'];
        $db->query("UPDATE `vehicle1` SET status='0' WHERE id='$id'");
        $_SESSION['errormsg'] = 'Disabled Sucessfully.';
        $_SESSION['errorValue'] = 'success';
        header("Location: ../vehicle.php");
    break;
    case 'Enable':
        $id = $_REQUEST['id'];
        $db->query("UPDATE `vehicle1` SET status='1' WHERE id='$id'");
        $_SESSION['errormsg'] = 'Enabled sucessfully.';
        $_SESSION['errorValue'] = 'success';
        header("Location: ../vehicle.php");
    break;
    case 'Delete':
        $id = $_REQUEST['id'];
        $db->query("DELETE FROM `vehicle1` WHERE id='$id'");
        $_SESSION['errormsg'] = 'Deleted sucessfully.';
        $_SESSION['errorValue'] = 'success';
        header("Location: ../vehicle.php");
        break;
    default:
        $_SESSION['errormsg'] = 'Invalid page access.';
        $_SESSION['errorValue'] = 'warning';
        header("Location: ../404.php");
}
?>