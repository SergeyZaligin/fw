(function(global){
    'use strict';
    
    const App = global.App || {};
    const $ = global.jQuery;
    
    function FormHandler(selector) {
        if (!selector) {
            throw new Error('No selector provided');
        }
        
        this.$formElement = $(selector);

        if (0 === this.$formElement.length) {
            throw new Error('Could not find element with selector: ' + selector);
        }
    }
    
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
    
    App.FormHandler = FormHandler;
    global.App = App;
    
})(window);

const signup = new App.FormHandler('#signup-form').addSubmitHandler();
signup.addSubmitHandler();