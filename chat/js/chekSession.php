<?php
session_start();
if (isset($_SESSION['unique_id'])) {
    echo "true";
}else{
    echo "false";
}
