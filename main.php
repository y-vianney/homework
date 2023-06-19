<?php
    $cnx = mysqli_connect("localhost", "root", "root", "bd_bois");
    
    $nb = mysqli_num_rows(mysqli_query($cnx, "SELECT * FROM client"));
?>