<?php if ($product) : ?>
    <nav>
        <?=$breadcrumbs->breadcrumbs;?>
    </nav>
    <h1><?=$product->title; ?></h1>
    <hr>
    <p>Отзывы к товару (0):</p>
    <?php if ($commentsHTML) : ?>
    <ul>
        <?=$commentsHTML; ?>
    </ul>
    <?php endif; ?>
<?php endif; ?>