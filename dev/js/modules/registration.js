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
     * Constructor handler form signup
     * 
     * @param {Object} selector
     * @returns {registrationL#1.FormHandler}
     */
    function FormHandler(selector) {
        if (!selector) {
            throw new Error('No selector provided');
        }
        
        this.$formElement = $(selector);
        

        
        if (0 === this.$formElement.length) {
            return false;
            //throw new Error('Could not find element with selector: ' + selector);
        }
        
        
    }
    
    FormHandler.prototype.validationSignupForm = function (selector, obj) {
        
        
           $(selector).validate(obj);
                
            
         
        // e.preventDefault();
            
     
         
    }
   
    App.FormHandler = FormHandler;
    global.App = App;
    
})(window);
