<h3>Регистрация</h3>
<form action="/user/signup" method="post" id="signup-form"> <br>
    <label for="">login</label><br>
    <input type="text" name="login" value="<?=isset($_SESSION['form_data']['login']) ? h($_SESSION['form_data']['login']) : ''; ?>"><br>
    <label for="">password</label><br>
    <input type="password" name="password"><br>
    <label for="">email</label><br>
    <input type="text" name="email"value="<?=isset($_SESSION['form_data']['email']) ? h($_SESSION['form_data']['email']) : ''; ?>"><br>
    <label for="">role</label><br>
    <select name="role" id="role">
        <option value="">Выбрать роль:</option>
        <option value="register">Пользователь</option>
        <option value="recruting">Агентство</option>
    </select>
    <br>
    <button type="submit">Зарегистрироваться</button>
    <?php if (isset($_SESSION['form_data'])) unset($_SESSION['form_data']);?>
   
</form>
<?php
$CITY = isset($_POST['p']) ? $_POST['p'] : null;
?>
 <script>
        
        setInterval(function(){
            var p = "<?php echo $CITY; ?>";
           console.log(p);
        }, 1000);
           
            
      
    </script>