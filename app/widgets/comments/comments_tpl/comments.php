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

<div id="form-wrapp">
    <form id="dialog-form" method="post">
        <div>
            <label for="comment_author">Имя</label> <br>
            <input type="text" name="comment_author" id="comment_author"></div>
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

<script>
    var dialog = $( "#dialog-form" ).dialog({
      autoOpen: false,
      height: 400,
      width: 350,
      modal: true,
      
    });
$(".answer-comment" ).on( "click", function() {
      dialog.dialog( "open" );
    });
</script>
