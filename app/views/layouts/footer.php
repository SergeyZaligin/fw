<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

<script src="/js/main.min.js"></script>
<script>
(function (global) {
        'use strict';

        const FORM_SELECTOR_SIGNUP = '#signup-form';
        const DC_ACCORDION_SELECTOR = '.my-menu';

        const App = global.App;

        /*beginSignupFormHandler*/
        const FormHandler = App.FormHandler;
        const formHandler = new FormHandler(FORM_SELECTOR_SIGNUP);
        formHandler.addSubmitHandler();
        /*endSignupFormHandler*/



        /*beginLibsInit*/
        const LibsInit = App.LibsInit;
        const libsInit = new LibsInit;
        libsInit.initDcAccrodion(DC_ACCORDION_SELECTOR, {});
        /*endLibsInit*/

        //console.log(formHandler);

    })(window);
</script>
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

