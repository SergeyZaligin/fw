<li>
    <a href="/category/<?=$id;?>" title="<?=$category['title'];?>"><?=$category['title'];?></a>
    <?php if(isset($category['childs'])): ?>
        <ul class="child-list">
            <?= $this->getMenuHtml($category['childs']);?>
        </ul>
    <?php endif; ?>
</li>