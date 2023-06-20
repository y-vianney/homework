<?php
    $text = "1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged.";
?>

<style>
    .collapse.in { display: none; }
</style>

<span class="text">
    <?php
        for ($i = 0; $i < 25; $i++)
        {
            echo $text[$i];
        }
    ?>
</span>
<span class="collapse" id="more">
    <?php
        for ($i = 25; $i < strlen($text); $i++)
        {
            echo $text[$i];
        }
    ?>
</span>
<span>
 <a href="#more" data-toggle="collapse">...
</span>