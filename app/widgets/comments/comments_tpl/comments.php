<li>
    <div class="comment-content">
        <div class="comment-meta">
            <span><?=$item['comment_author']; ?></span>
            <span><?=$item['created']; ?></span>
            
        </div>
        <div class="comment-text">
            <p><?= nl2br($item['comment_text']); ?></p>
            <a href="#?<?= $item['comment_id']; ?>" class="answer-comment">Ответить</a>
        </div>
        
        <?php if(isset($item['childs'])): ?>
            <ul class="comment-child">
                <?= self::getMenuHtml($item['childs']);?>
            </ul>
        <?php endif; ?>
    </div>
</li>
