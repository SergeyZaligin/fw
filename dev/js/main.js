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
