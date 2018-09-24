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
                header
            </div>
        </header>
        <main class="main">
            <div class="container">
                <h3>Admin layout</h3>
                <?=$content; ?>
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


