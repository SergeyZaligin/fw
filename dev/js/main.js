(function (global) {
    'use strict';

    var loadDeferredStyles = function () {
        var addStylesNode = document.getElementById("deferred-styles");
        var replacement = document.createElement("div");
        replacement.innerHTML = addStylesNode.textContent;
        document.body.appendChild(replacement)
        addStylesNode.parentElement.removeChild(addStylesNode);
    };
    var raf = window.requestAnimationFrame || window.mozRequestAnimationFrame ||
            window.webkitRequestAnimationFrame || window.msRequestAnimationFrame;
    if (raf)
        raf(function () {
            window.setTimeout(loadDeferredStyles, 0);
        });
    else
        window.addEventListener('load', loadDeferredStyles);



    var FORM_SIGNUP_SELECTOR = '#signup-form';
    var DC_ACCORDION_SELECTOR = '.my-menu';

    var App = global.App;

    var $ = global.jQuery;

    console.log('App===>', App);

    function ajax($formData, method, url, $result) {
        var msg = $($formData).serialize();


        $.ajax({
            type: method,
            url: url,
            data: msg,
            //dataType: "json",
            success: function (res) {
                //console.log('data===>', res);
                $($result).html(res);
                //if ($("#results").val() == "SUCCESS VALIDATION") {
                //    addData();
                //}
                //console.log(data);
            },
            error: function (xhr, str) {
                alert("Возникла ошибка!");
            }
        });

    }


    /*beginSignupFormHandler*/
    var FormHandler = new App.FormHandler(FORM_SIGNUP_SELECTOR);

    FormHandler.validationSignupForm(FORM_SIGNUP_SELECTOR, {

        submitHandler: function (form) {
            console.log('FORM ===>', form);
            ajax('#signup-form', 'POST', '/user/signup', '#results');
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
            password: {
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
