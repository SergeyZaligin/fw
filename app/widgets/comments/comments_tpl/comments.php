<li>
    <div class="comment-content">
        <div class="comment-meta">
            <span><?=$item['comment_author']; ?></span>
            <span><?=$item['created']; ?></span>
            
        </div>
        <div class="comment-text">
            <p><?= nl2br($item['comment_text']); ?></p>
            <a href="#?<?= $item['comment_id']; ?>" id="create-user">Ответить</a>
        </div>
        
        <?php if(isset($item['childs'])): ?>
            <ul class="comment-child">
                <?= self::getMenuHtml($item['childs']);?>
            </ul>
        <?php endif; ?>
    </div>
</li>
<div id="dialog-form">
    dfdsfsdfdfsdfsd
</div>
<script>
    var dialog = $( "#dialog-form" ).dialog({
      autoOpen: false,
      height: 400,
      width: 350,
      modal: true,
      buttons: {
        Cancel: function() {
          dialog.dialog( "close" );
        }
      },
      close: function() {
        form[ 0 ].reset();
        allFields.removeClass( "ui-state-error" );
      }
    });
$( "#create-user" ).button().on( "click", function() {
      dialog.dialog( "open" );
    });
</script>
