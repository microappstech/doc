<?php 
$hostName = $_SERVER['HTTP_HOST'];
function IsDevelopement()
{
    global $hostName; 
    return strpos($hostName, 'localhost') !== false;}