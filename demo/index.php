<?php
    $pager = include './init.php';
?>

<p>
友情链接:
<?php echo $pager->linksHtml();?>

&nbsp;&nbsp;<a href="exchange.php" style="color:red;">申请链接交换</a>
</p>
