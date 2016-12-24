<?php session_start();

 if(isset($_SESSION['login_user']))
{
include('header.php');
?>
<div class="content">
    <div class="welcome">
        <h4>Welcome to Admin Panel</h4>
    </div>
</div>
<?php
include('footer.php');
?><?php 
}
else
{
header('Location:index.php');		
}


?>

