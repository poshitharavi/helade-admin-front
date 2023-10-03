<?php
session_start();

if (!($_SESSION['heladeAdminUserId'])) {
    header("Location:../view/sign-in.php");
}