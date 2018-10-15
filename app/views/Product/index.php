<?php if ($product) : ?>
    <nav>
        <?=$breadcrumbs->breadcrumbs;?>
    </nav>
    <h1><?=$product->title; ?></h1>
    <hr>
    <p>Отзывы к товару(0):</p>
    <?php if ($comments) : ?>
        <?php foreach ($comments as $comment) : ?>
            <h4><?=h($comment['comment_author']); ?></h4>
            <p><?=$comment['comment_text']; ?></p>
        <?php endforeach; ?>
    <?php endif; ?>
<?php endif; ?>