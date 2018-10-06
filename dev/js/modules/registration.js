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
                //console.log(item.name + ' is ' + item.value);
            });
            console.log(data);
            $.ajax({
                url: "/user/signup",
                method: 'post',
                data: {
                    login: data.login,
                    password: data.password,
                    email: data.email,
                    role: data.role
                },
                success: function(res){
                    //districtSelect.html(res);
                    console.log(res);
                }
             });   
        });
        
    }
    
    
          
    
    App.FormHandler = FormHandler;
    global.App = App;
    
})(window);
