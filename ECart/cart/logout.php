<?php
session_start();
session_cache_limiter('private');
$cache_limiter = session_cache_limiter();
 //remove all the variables in the session 
 session_unset(); 
 
 // destroy the session 
 session_destroy();  
 echo "
<script>
window.location='index.php'
</script>
";
?>

