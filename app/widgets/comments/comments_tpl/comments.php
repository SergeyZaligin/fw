<li>
    <div class="comment-content">
        <div class="comment-meta">
            <span><?=$item['comment_author']; ?></span>
            <span><?=$item['created']; ?></span>
            
        </div>
        <div class="comment-text">
            <p><?= $item['comment_text']; ?></p>
            <a href="#?<?= $item['comment_id']; ?>">Ответить</a>
        </div>
        
        <?php if(isset($item['childs'])): ?>
            <ul>
                <?= self::getMenuHtml($item['childs']);?>
            </ul>
        <?php endif; ?>
    </div>
</li>

