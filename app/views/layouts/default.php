<!DOCTYPE html>
<html lang="ru">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link rel="stylesheet" href="/css/main.min.css"/>
  <?=$this->getMeta(); ?>
</head>
<body>
    
    <div class="wrapper">
        <header class="header">
            <div class="container">
                    <nav>
        <ul>
            <li>
                <a href="/user/signup">Signup</a>
            </li>
            <li>
                <a href="/user/login">Login</a>
            </li>
            <li>
                <a href="/user/logout">Logout</a>
            </li>
        </ul>
    </nav>
            </div>
        </header>
        <main class="main">
            <div class="container">
                   <style>
        .errors-validate {
            color: red;
        }
        .success-validate{
            color: green;
        }
    </style>
    <h3>Default</h3>
    <?=$content; ?>
    
    <?php if (isset($_SESSION['validate_errors'])): ?>
    <div class="errors-validate">
        <?=$_SESSION['validate_errors']; unset($_SESSION['validate_errors']); ?>
    </div>
    <?php  elseif (isset($_SESSION['validate_success'])) : ?>
    <div class="success-validate"><?=$_SESSION['validate_success']; unset($_SESSION['validate_success']); ?></div>
    <?php endif; ?>
    
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <?php 
        foreach ($scripts as $script) {
            echo $script;
        }
    ?>
            </div>
        </main>
        <footer class="footer">
            <div class="container">
                footer
            </div>
        </footer>
    </div>
    
</body>
</html>
