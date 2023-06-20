<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="shortcut icon" href="./assets/favicon.ico" type="image/x-icon">
        <title>Liste des clients</title>
        <link rel="stylesheet" href="./assets/style.css">
        <style>
            .update
            {
                color: #7e7c7c;
                cursor: pointer;
            }
            .update:hover
            {
                text-decoration: underline;
                color: #444;
            }
        </style>
    </head>
    <?php
        include_once('main.php');

        $max = 8;

        $nb = ceil($nb_clients / $max);
        $n = 1;
        $name = $_POST['name'];
        $pnom = $_POST['pnom'];
        $mat = $_POST['mat'];
        $tel = $_POST['tel'];
        $typcli = $_POST['typcli'];
        if ($_GET['btnPrevious']) $n = $_GET['btnPrevious'];
        if ($_GET['btnNext']) $n = $_GET['btnNext'];
        $offset = $max * $n - $max;
        $limit = $max;

        if (isset($_POST['subBtn']))
        {
            $req = "INSERT INTO client VALUES ('$mat', \"$name\", \"$pnom\", '$tel', $typcli)";
            $exRep = mysqli_query($cnx, $req);
        }
        else if (isset($_POST['btnUpdate']))
        {
            $req = "UPDATE client SET nom=\"$name\", prenom=\"$pnom\", contact=$tel, type_client=$typcli WHERE mat_cli='$mat'";
            $exRep = mysqli_query($cnx, $req);
        }
        else if (isset($_POST['btnDelete']))
        {
            $req = "DELETE FROM client WHERE mat_cli='$mat'";
            $exRep = mysqli_query($cnx, $req);
        }
    ?>
    <body>
        <?php include_once('./public/header.php') ?>
        <main>
            <div class="data-table">
                <div class="data-table-top">
                    <div class="title">Clients</div>
                    <button><a href="http://localhost:8888/tests/homework/add.php?what=client">Ajouter</a></button>
                </div>
                <table>
                    <tr>
                        <th>MATRICULE</th>
                        <th>NOM & PRENOM</th>
                        <th>CONTACT</th>
                        <th style="width: 150px"></th>
                    </tr>
                    <?php
                        $req = "SELECT * FROM client LIMIT $limit OFFSET $offset";
                        $result = mysqli_query($cnx, $req);
                        if (mysqli_num_rows($result) > 0) {
                            $rows = mysqli_fetch_all($result);
                        }
                    ?>
                    <?php foreach($rows as $row): ?>
                        <tr>
                            <td>
                                <?php echo $row[0]; ?>
                            </td>
                            <td>
                                <?php echo $row[2] . ' ' . $row[1]; ?>
                            </td>
                            <td>
                                <?php echo $row[3]; ?>
                            </td>
                            <td style="width: 150px">
                                <a href="http://localhost:8888/tests/homework/update.php?what=client<?php echo "&id=" . $row[0] . "&name=" . $row[1] . "&pname=" . $row[2] . "&num=" . $row[3] ?>">
                                    <span class="update">Modifier</span>
                                </a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </table>
                <form action="sub.php" method="get">
                    <div class="pagination">
                        <button type="submit" value="<?php echo $n - 1; ?>" <?php if ($n == 1) echo "disabled"?> name="btnPrevious"><</button> 
                            <?php
                                echo "Page $n";
                            ?>
                        <button type="submit" value="<?php echo $n + 1; ?>" <?php if ($n == $nb) echo "disabled"?> name="btnNext">></button>
                    </div>
                </form>
            </div>
        </main>
    </body>
</html>