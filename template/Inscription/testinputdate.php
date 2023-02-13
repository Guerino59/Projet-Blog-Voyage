<?php

if($_SERVER['REQUEST_METHOD']=='POST' && isset($_POST['sub']))
{
    var_dump($_POST);
}
?>
<form action="" method="post">
    <input type="date" name="date" id="date">
    <input type="submit" value="sub" name="sub">
</form>