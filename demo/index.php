<?php
    $pager = include './init.php';
?>

<p>
友情链接:
<?php echo $pager->linksHtml();?>
<a href="exchange.php">申请链接交换</a>
</p>