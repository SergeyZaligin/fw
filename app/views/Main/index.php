
<?php if ($posts) : ?>

<?php foreach ($posts as $post) {?>
<h3><?=$post->title; ?></h3>
<?php } ?>

<?=$pagination; ?>
<?php else : ?>
<p>Empty!!!</p>
<?php endif; ?>


