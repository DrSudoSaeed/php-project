<?php
require_once('config/loader.php');



if(session_destroy()){
    header("Location: /pubg/admin/login/index.php");
}