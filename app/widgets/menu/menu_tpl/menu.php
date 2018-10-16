<?php if (!$category['parent']) : ?>

<li class="parent-item">
    
    <?php else : ?>
    
<li class="child-item">
    
<?php endif; ?>
    
    <?php if (!$category['parent']) : ?>

    <a class="parent-link" href="/category/<?=$id;?>" title="<?=$category['title'];?>"><?=$category['title'];?></a>

    <?php else : ?>

    <a class="child-link" href="/category/<?= $id; ?>" title="<?= $category['title']; ?>"><?= $category['title']; ?></a>

    <?php endif; ?>    
        
    <?php if(isset($category['childs'])): ?>
        <ul class="child-list">
            <?= $this->getMenuHtml($category['childs']);?>
        </ul>
    <?php endif; ?>
</li>
