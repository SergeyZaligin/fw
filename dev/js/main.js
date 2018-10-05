(function (global) {
    'use strict';

    const FORM_SELECTOR_SIGNUP = '#signup-form' || '';

    const App = global.App;
    const FormHandler = App.FormHandler;

    const formHandler = new FormHandler(FORM_SELECTOR_SIGNUP);
    formHandler.addSubmitHandler();

    //console.log(formHandler);

})(window);
$(document).ready(function(){
  $(".my-menu").dcAccordion();
});