<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="shortcut icon" href="./assets/favicon.ico" type="image/x-icon">
        <title>Liste des produits</title>
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
            th,td
            {
                width: 200px;
            }
            th:nth-child(2), td:nth-child(2)
            {
                width: 350px;
            }
        </style>
    </head>
    <?php
        include_once('main.php');

        $max = 8;

        $nb = ceil($nb / $max);
        $n = 1;

        $lib = $_POST['label'];
        $prix = $_POST['price'];
        $mat = $_POST['mat'];
        $status = ($_POST['status'] == 'Completed') ? 0 : 1;

        if ($_GET['btnPrevious']) $n = $_GET['btnPrevious'];
        if ($_GET['btnNext']) $n = $_GET['btnNext'];
        $offset = $max * $n - $max;
        $limit = $max;

        if (isset($_POST['subBtn']))
        {
            $req = "INSERT INTO commande VALUES ('$mat', \"$lib\", $prix, $status)";
            $exRep = mysqli_query($cnx, $req);
        }
        else if (isset($_POST['btnUpdate']))
        {
            $req = "UPDATE commande SET libelle=\"$lib\", prix=$prix, statut=$status WHERE cmd_id='$mat'";
            $exRep = mysqli_query($cnx, $req);
        }
        else if (isset($_POST['btnDelete']))
        {
            $req = "DELETE FROM commande WHERE cmd_id='$mat'";
            $exRep = mysqli_query($cnx, $req);
        }
    ?>
    <body>
        <?php include_once('./public/header.php') ?>
        <main>
            <div class="data-table">
                <div class="data-table-top">
                    <div class="title">Commandes</div>
                    <button><a href="http://localhost:8888/tests/homework/add.php?what=command">Ajouter</a></button>
                </div>
                <table>
                    <tr>
                        <th>Code</th>
                        <th>Libellé</th>
                        <th>Montant</th>
                        <th>Statut</th>
                        <th style="width: 150px"></th>
                    </tr>
                    <?php
                        $req = "SELECT * FROM commande LIMIT $limit OFFSET $offset";
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
                                <?php echo $row[1]; ?>
                            </td>
                            <td>
                                <?php echo $row[2] . ' F'; ?>
                            </td>
                            <td>
                                <?php
                                    $isOk = ($row[3] == 0) ? 'Completed' : 'Pending';
                                    echo "<span style=\"font-style: italic; color: #7e7c7c;\">$isOk</span>"; 
                                ?>
                            </td>
                            <td style="width: 150px">
                                <a href="http://localhost:8888/tests/homework/update.php?what=command<?php echo "&id=" . $row[0] . "&lib=" . $row[1] . "&prix=" . $row[2] . "&status=" . $row[3] ?>">
                                    <span class="update">Modifier</span>
                                </a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </table>
                <form action="product.php" method="get">
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