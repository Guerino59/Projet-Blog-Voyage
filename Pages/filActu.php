
<?php
session_start();

if(isset($_SESSION["flash"])): ?>

<p> <?php echo $_SESSION["flash"]?> </p>

<?php endif; 
?>
