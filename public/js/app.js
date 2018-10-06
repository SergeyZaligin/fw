(function(global) {
    'use strict';

    var FORM_SIGNUP_SELECTOR = '#signup-form';
    
    var DC_ACCORDION_SELECTOR = '.my-menu';
    
    var App = global.App;

    /*beginSignupFormHandler*/
    var FormHandler = new App.FormHandler(FORM_SIGNUP_SELECTOR);
    FormHandler.addSubmitHandler();
    /*endSignupFormHandler*/

    /*beginLibsInit*/
    var LibsInit = new App.LibsInit;
    LibsInit.initDcAccrodion(DC_ACCORDION_SELECTOR, {});
    //libsInit.initJqueryValitation(FORM_SIGNUP_SELECTOR, {});
    /*endLibsInit*/
    
    //console.log(formHandler);

})(window);