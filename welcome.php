<?php 
session_start (); 
if (! $_SESSION ['logueado']) { 
 header ( "location: login.html" ); 
 exit (); 
} else { 
 echo "<br>"; 
 echo 'Bienvenido, ' . $_SESSION ['username']; 
 echo '<br>'; 
 echo 'Horario de Conexion:' . $_SESSION ['time']; 
 echo '<br>'; 
 echo '<a href="logout.php">Logout</a>'; 
 } 
?> 
