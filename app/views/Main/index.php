<?php debug($breadcrumbs->breadcrumbs);?>
<hr>
<?php if ($products ) : ?>
<?php debug($products);?>
<?php foreach ($products  as $product) {?>
<h3><a href="#"><?=$product->title; ?></a></h3>
<?php } ?>

<?=$pagination; ?>
<?php else : ?>
<p>Empty!!!</p>
<?php endif; ?>


