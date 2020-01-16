define(['jquery'], function($){
    "use strict";
    return function hello()
    {
        const someData = window.checkoutConfig.customerData.email;
       // const emailField =  document.getElementById('customer-email');
       if (someData === undefined){
           // $('#customer-email').removeAttr('disabled')
           $(document).ready(function () {
                const emailField =  document.getElementById('customer-email');
                 $('#customer-email').removeAttr('disabled')
               console.log(emailField)


           })
           $(window).load = function(){
               $('#customer-email').removeAttr('disabled')
               console.log('load')


           };

       }
       // document.onload = function(){
       //     emailField.removeAttribute('disabled')
       //
       // }
       //
       //
       //  $('#customer-email').ready(function () {
       //           console.log('someData')
       //      $('#customer-email').removeAttr('disabled')
       //
       //
       //     })

        // $(document).ready(function () {
        //     console.log(someData)
        //     $('uid').attr('disabled', 'disabled');
        //
        //
        //
        // });

    }
});