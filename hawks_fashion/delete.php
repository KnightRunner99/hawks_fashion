<?php
session_start();
include 'Functions/ezdubsdatabase.php';
include 'Functions/customer_db.php';
$id = $_SESSION['find_user'];
delete_customer($id);
header('location: Edit_Accounts.php');
 ?>
