(function(global) {
    'use strict';

    var FORM_SIGNUP_SELECTOR = '#signup-form';
    var DC_ACCORDION_SELECTOR = '.my-menu';
    
    var App = global.App;
    console.log('App===>', App);
    
    
    function ajax() { //Ajax отправка формы
        var msg = $("#signup-form").serialize();
        
        $.ajax({
            type: "POST",
            url: "/user/signup",
            data: msg,
            success: function (data) {
            //$("#results").html(data);
            //if ($("#results").val() == "SUCCESS VALIDATION") {
            //    addData();
            //}
                console.log(data);
            },
            error: function (xhr, str) {
                alert("Возникла ошибка!");
            }
        });
    }
    
    
    /*beginSignupFormHandler*/
    var FormHandler = new App.FormHandler(FORM_SIGNUP_SELECTOR);
    
    
    
    
    
        FormHandler.validationSignupForm(FORM_SIGNUP_SELECTOR, {
//        submitHandler: function(e) {
//            e.preventDefault();
//            const data = {};
//
//                $(this).serializeArray().forEach(function (item) {
//                    data[item.name] = item.value;
//                    //console.log(item.name + ' is ' + item.value);
//                });
//                console.log(data);
//                $.ajax({
//                    url: "/user/signup",
//                    method: 'post',
//                    data: {
//                        login: data.login,
//                        password: data.password,
//                        email: data.email,
//                        role: data.role
//                    },
//                    success: function(res){
//                        //districtSelect.html(res);
//                        console.log(res);
//                    }
//                 });  
//            //$(e).submit();
//          },
        submitHandler: function(form) {
            ajax();
        },
        rules: {
            login: {
                required: true,
                minlength: 3
            },
            email: {
                required: true
            },
            password: {
                required: true,
                minlength: 6
            }
        },
        messages: {
            login: {
                required: "Поле 'Логин' обязательно к заполнению",
                minlength: "Введите не менее 3-х символов в поле 'Логин'"
            },
            email: {
                required: "Поле 'Email' обязательно к заполнению",
                email: "Необходим формат адреса email" 
            },
            password:{
                required: "Поле 'Пароль' обязательно к заполнению",
                minlength: "Введите не менее 6 символов в поле 'Пароль'"
            }
        }
    
    });

    /*endSignupFormHandler*/

    /*beginLibsInit*/
    var LibsInit = new App.LibsInit();
    LibsInit.initDcAccrodion(DC_ACCORDION_SELECTOR, {});
    /*endLibsInit*/
    

})(window);
