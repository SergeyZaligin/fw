(function(global) {
    'use strict';

    var FORM_SIGNUP_SELECTOR = '#signup-form';
    
    var DC_ACCORDION_SELECTOR = '.my-menu';
    
    var App = global.App;

    /*beginSignupFormHandler*/
    var FormHandler = new App.FormHandler(FORM_SIGNUP_SELECTOR);
    
//        FormHandler.validationSignupForm(FORM_SIGNUP_SELECTOR, {
//        rules: {
//            login: {
//                required: true,
//                minlength: 3
//            },
//            email: {
//                required: true
//            },
//            password: {
//                required: true,
//                minlength: 6
//            }
//        },
//        messages: {
//            login: {
//                required: "Поле 'Логин' обязательно к заполнению",
//                minlength: "Введите не менее 3-х символов в поле 'Логин'"
//            },
//            email: {
//                required: "Поле 'Email' обязательно к заполнению",
//                email: "Необходим формат адреса email" 
//            },
//            password:{
//                required: "Поле 'Пароль' обязательно к заполнению",
//                minlength: "Введите не менее 6 символов в поле 'Пароль'"
//            }
//        }
//    
//    });
    
    /*endSignupFormHandler*/

    /*beginLibsInit*/
    var LibsInit = new App.LibsInit();
    LibsInit.initDcAccrodion(DC_ACCORDION_SELECTOR, {});
    
   
    /*endLibsInit*/
    
    //console.log(formHandler);

})(window);