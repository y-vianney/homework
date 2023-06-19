<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Enregistrement</title>
        <link rel="shortcut icon" href="./assets/favicon.ico" type="image/x-icon">
        <link rel="stylesheet" href="./assets/style.css">
        <style>
            .box
            {
                font-family:'Trebuchet MS', 'Lucida Sans Unicode', 'Lucida Grande', 'Lucida Sans', Arial, sans-serif;
                color: #444;
            }
            .back-link
            {
                text-decoration: none;
                color: #000;
                font-family:'Trebuchet MS', 'Lucida Sans Unicode', 'Lucida Grande', 'Lucida Sans', Arial, sans-serif;
                transition: all .3s ease-out;
            }
        </style>
    </head>
    <?php
        require_once('./main.php');

        $req = mysqli_query($cnx, "select * from type_client");
    ?>
    <body>
        <?php include_once('./public/header.php'); ?>
        <main>
            <div class="box">
                <a href='javascript:history.back(1);' class="back-link" style="color: #000">Clients </a>> Ajouter
                <form action="sub.php" method="post">
                    <div class="form-box">
                        <div class="field">
                            <div class="text-field">Code</div> <input type="text" name="mat" id="" required placeholder="Client N°">
                        </div>
                        <div class="field">
                            <div class="text-field">Nom</div> <input type="text" name="name" id="" required placeholder="Nom">
                        </div>
                        <div class="field">
                            <div class="text-field">Prénom(s)</div> <input type="text" name="pnom" id="" placeholder="Prénom.s">
                        </div>
                        <div class="field">
                            <div class="text-field">Contact</div> <input type="tel" name="tel" id="" placeholder="Numéro de téléphone">
                        </div>
                        <div class="field">
                            <div class="text-field">Type de client </div>
                            <select name="typcli" id="">
                                <option value="" disabled selected><span class="hint">Choisis une option</span></option>
                                <?php 
                                    while($res = mysqli_fetch_array($req)) {
                                        echo '<option value="' . $res[0] . '">' . $res[1] . '</option>"';
                                    } 
                                ?>
                            </select>
                            <span class="arrow">></span>
                        </div>
                    </div>
                    <div style="width: 100%; display: flex; justify-content: center">
                        <button type="submit" name="subBtn" style="font-size: 12px; border: none; padding: 12px 55px; background-color: #000; color: #fff; border-radius: 50px; font-weight: 700;">
                            Valider
                        </button>
                    </div>
                </form>
            </div>
        </main>
    </body>
</html>