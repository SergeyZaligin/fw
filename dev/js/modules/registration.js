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
            //throw new Error('Could not find element with selector: ' + selector);
        }
        
        
    }
    
    /**
     * Handler submit event
     * 
     * @returns {undefined}
     */
    FormHandler.prototype.addSubmitHandler = function () {
        
        this.$formElement.on('submit', function (event) {
            
            event.preventDefault();
            const data = {};

            $(this).serializeArray().forEach(function (item) {
                data[item.name] = item.value;
                console.log(item.name + ' is ' + item.value);
            });
        
        });
        
    }
           const LibsInit = new App.LibsInit;
           if($('body').is('#signup-form')){
               LibsInit.initJqueryValitation('#signup-form', {success: "valid", errorClass: "invalid"});

                $("[name='login']").rules("add", {
                    required: true,
                    minlength: 10,
                    messages: {
                        required: "Обязательное поле"
                    }
                });
           }
          
    
    App.FormHandler = FormHandler;
    global.App = App;
    
})(window);

const FORM_SIGNUP_SELECTOR = '#signup-form';
const FormHandler = new App.FormHandler(FORM_SIGNUP_SELECTOR);
FormHandler.addSubmitHandler();