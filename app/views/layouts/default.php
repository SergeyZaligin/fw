<?php require_once 'header.php';?>
    
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
                <?=$content; ?>
            </div>
        </main>
        <footer class="footer">
            <div class="container">
                footer
            </div>
        </footer>
    </div>
    
<?php require_once 'footer.php';?>
