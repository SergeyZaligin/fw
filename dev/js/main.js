(function (global) {
    'use strict';

    const FORM_SIGNUP_SELECTOR = '#signup-form';
    
    const DC_ACCORDION_SELECTOR = '.my-menu';
    
    const App = global.App;

    /*beginSignupFormHandler*/
    const FormHandler = App.FormHandler;
    const formHandler = new FormHandler(FORM_SIGNUP_SELECTOR);
    formHandler.addSubmitHandler();
    /*endSignupFormHandler*/

    /*beginLibsInit*/
    const LibsInit = App.LibsInit;
    const libsInit = new LibsInit;
    libsInit.initDcAccrodion(DC_ACCORDION_SELECTOR, {});
    libsInit.initJqueryValitation(FORM_SIGNUP_SELECTOR, {});
    /*endLibsInit*/
    
    //console.log(formHandler);

})(window);
