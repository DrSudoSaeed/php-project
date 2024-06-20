<?php
require_once('config/loader.php');
// The developer of this project is Saeed.
// Copying is possible with reference to the source.
// Ways of communication with Saeed :
// email: drsudosaeed@gmail.com
// telegram: @iioove
// instagram: sudosaeed


if(session_destroy()){
    header("Location: ../index.php?logout=ok");
}

 

require_once "config/error.php";

