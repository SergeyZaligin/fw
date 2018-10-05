(function(global){
    'use strict';
    
    /**
     * Object App
     * 
     * @type object |global.App|global.App
     */
    const App = global.App || {};
    
    /**
     * Object jQuery
     * 
     * @type global.jQuery
     */
    const $ = global.jQuery;
    
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
        
    }
    
    App.LibsInit = LibsInit;
    global.App = App;
    
})(window);


