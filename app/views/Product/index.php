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

<button class="comment-open-btn">Добавить отзыв:</button>
<div id="form-wrapp">
    <form class="form" method="post">
        <div>
            <label for="comment_author">Имя</label> <br>
            <input type="text" name="comment_author" id="comment_author">
        </div>
        <div>
            <label for="comment_text"></label><br>
            <input type="text" name="comment_text" id="comment_text">
        </div>
        <input type="hidden" name="parent" value="0">
        <div>
            <input type="submit" name="submit" value="Отправить сообщение">
        </div>
    </form>
</div>