(function(global){
    'use strict';
    
    /**
     * Object App
     * 
     * @type object |global.App|global.App
     */
    var App = global.App || {};
    
    /**
     * Object jQuery
     * 
     * @type global.jQuery
     */
    var $ = global.jQuery;
    
    /**
     * Constructor Libs init
     * 
     * @param {Object} selector
     * @returns {registrationL#1.FormHandler}
     */
    function LibsInit() {}
    
    /**
     * Init libs object and his settings
     * 
     * @returns {undefined}
     */
    LibsInit.prototype.initDcAccrodion = function (selector, obj) {
        
        $(selector).dcAccordion(obj);

    }
    
    LibsInit.prototype.initJqueryValitation = function (selector, obj) {

        $(selector).validate(obj);
        
//        const LibsInit = new App.LibsInit;
//    
// 
//        
//        LibsInit.initJqueryValitation('#signup-form', {success: "valid", errorClass: "invalid"});
//
//         $("[name='login']").rules("add", {
//             required: true,
//             minlength: 10,
//             messages: {
//                 required: "Обязательное поле"
//             }
//         });
    

    }
    
    App.LibsInit = LibsInit;
    global.App = App;
    
})(window);


