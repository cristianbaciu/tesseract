<?php
session_start();
if(session_destroy()) // Destroying All Sessions
{
header("Location: /foodster2/index.phpphp"); // Redirecting To Home Page
}
?>