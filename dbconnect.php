<?php
if(!mysql_connect("beirens.ddns.net","cs50belgium","Azerty"))
{
     die('oops connection problem ! --> '.mysql_error());
}
if(!mysql_select_db("cs50belgium"))
{
     die('oops database selection problem ! --> '.mysql_error());
}
?>