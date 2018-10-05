<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

<script src="/js/main.min.js"></script>

<script></script>

<?php 
    foreach ($scripts as $script) {
        echo $script;
    }
?>

<?php if (isset($_SESSION['validate_errors'])): ?>
    <div class="errors-validate">
        <?=$_SESSION['validate_errors']; unset($_SESSION['validate_errors']); ?>
    </div>
    <?php  elseif (isset($_SESSION['validate_success'])) : ?>
    <div class="success-validate"><?=$_SESSION['validate_success']; unset($_SESSION['validate_success']); ?></div>
<?php endif; ?>
    
</body>
</html>

