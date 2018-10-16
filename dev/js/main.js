(function (global) {
    'use strict';

    

    /*beginConstants*/
    var FORM_SIGNUP_SELECTOR = '#signup-form';
    var DC_ACCORDION_SELECTOR = '.my-menu';
    var JQUERY_UI_DIALOG_SELECTOR = '#form-wrapp';
    /*endConstants*/

    /*beginGlobals*/
    var App = global.App;
    /*endGlobals*/

    console.log('App===>', App);

    /*beginCommonFunction*/
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

    function ajax($formData, method, url, $result) {
        
        var msg = $($formData).serialize();

        $.ajax({
            type: method,
            url: url,
            data: msg,
            success: function (res) {
                
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
    /*endCommonFunction*/

    /*beginSignupFormHandler*/
    
    /*endSignupFormHandler*/


    /*beginLibsInit*/
    var LibsInit = new App.LibsInit();
   
    /*endLibsInit*/



})(window);
