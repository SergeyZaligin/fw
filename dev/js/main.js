(global => {
    'use strict';
    
    /*beginConstants*/
    const FORM_SIGNUP_SELECTOR = '#signup-form';
    const ACCORDION_SELECTOR = '.category-list';
    const JQUERY_UI_DIALOG_SELECTOR = '#form-wrapp';
    /*endConstants*/

    /*beginGlobals*/
    const App = global.App;
    /*endGlobals*/

    console.log('App===>', App);

    /*beginCommonFunction*/
    const loadDeferredStyles = function () {
        const addStylesNode = document.getElementById("deferred-styles");
        const replacement = document.createElement("div");
        replacement.innerHTML = addStylesNode.textContent;
        document.body.appendChild(replacement)
        addStylesNode.parentElement.removeChild(addStylesNode);
    };
    const raf = window.requestAnimationFrame || window.mozRequestAnimationFrame ||
            window.webkitRequestAnimationFrame || window.msRequestAnimationFrame;
    if (raf){
        raf(function () {
            window.setTimeout(loadDeferredStyles, 0);
        });
    } else {
        window.addEventListener('load', loadDeferredStyles);
    }
        
    
        

//    function ajax($formData, method, url, $result) {
//        
//        var msg = $($formData).serialize();
//
//        $.ajax({
//            type: method,
//            url: url,
//            data: msg,
//            success: function (res) {
//                
//                $($result).html(res);
//                //if ($("#results").val() == "SUCCESS VALIDATION") {
//                //    addData();
//                //}
//                //console.log(data);
//            },
//            error: function (xhr, str) {
//                alert("Возникла ошибка!");
//            }
//        });
//
//    }
    /*endCommonFunction*/

    /*beginSignupFormHandler*/
    
    /*endSignupFormHandler*/


    /*beginLibsInit*/
    const LibsInit = new App.LibsInit();
   
    /*endLibsInit*/
    
    const categoryList = document.querySelector('.category-nav .category-list');
    const parentItems = document.querySelectorAll('.category-nav .category-list .parent-item');
    
    parentItems.addEventListener('click', function (e) {
        e.preventDefault();
    });
    
    

})(window);
