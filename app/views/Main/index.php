<input type="submit" value="send" id="send" name="send" />

<?php if ($posts) : ?>

<?php foreach ($posts as $post) {?>
<h3><?=$post->title; ?></h3>
<?php } ?>

<?=$pagination; ?>
<?php else : ?>
<p>Empty!!!</p>
<?php endif; ?>

<?php new \app\widgets\menu\MenuCategory([
        'tpl' => WIDGETS . '/menu/my_menu.php',
        'container' => 'ul',
        'class' => 'my-menu',
        'table' => 'categories',
        'cache' => 60,
        'cacheKey' => 'menu_ul',
        ]); ?>

<script>
    $(document).ready(function(){
        $('#send').on('click', function () {
            $.ajax({
                url: 'main/test',
                type: 'post',
                data: {id: 2},
                success (res) {
                    console.log('success', res);
                },
                error () {
                    alert('Error');
                }
            });
        });
    });
    
</script>
