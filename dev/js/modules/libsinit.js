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

    };
    
    LibsInit.prototype.initJqueryUiDialog = function (selector, obj) {
        $(selector).dialog(obj);
    };
    
    App.LibsInit = LibsInit;
    global.App = App;
    
})(window);


