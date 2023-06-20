<?php
    $cnx = mysqli_connect("localhost", "root", "root", "bd_bois");
    
    $nb_clients = mysqli_num_rows(mysqli_query($cnx, "SELECT * FROM client"));
    $nb_produits = mysqli_num_rows(mysqli_query($cnx, "SELECT * FROM produit"));
    $nb_commandes = mysqli_num_rows(mysqli_query($cnx, "SELECT * FROM commande"));
?>