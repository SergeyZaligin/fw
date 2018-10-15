<li>
    <h4><?=$item['comment_author']; ?></h4>
    <p><?=$item['comment_text']; ?></p>
    <?php if(isset($item['childs'])): ?>
        <ul>
            <?= self::getMenuHtml($item['childs']);?>
        </ul>
    <?php endif; ?>
</li>

