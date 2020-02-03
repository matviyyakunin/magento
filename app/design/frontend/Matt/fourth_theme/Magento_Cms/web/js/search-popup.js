
define([
    'jquery',
    'Magento_Ui/js/modal/modal',
    'Magento_Customer/js/customer-data'
], function($, modal,customerData) {
return function (config, element) {
    let options = {
        type: 'popup',
        closeText:'some text for closing button',
        responsive: true,
        title:'Homepage popup window in my  exercise',
        modalClass: 'search-modal-popup',
        buttons: [{
            text:'Submit this form ',
            class: 'close-search-popup',
            click: function() {
                const value = $('#custom-input')[0].value; // getting information from input
                function validateEmail(email) { //function for  checking  values from input and returning true or false
                    const re = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
                    return re.test(String(email).toLowerCase());
                }
                let checkResult = validateEmail(value);// variable for result  containing of validateEmail function
                 if(checkResult){// condition to allow close modal window and save data either localStorage or cookies
                    this.closeModal();
                    localStorage.setItem('email',`${value}`);
                }
                 else{
                 }
            }
        }],

        opened: function() {
            $('#search').focus();
        }
    };

    let popup = modal(options, $('#search-block'));
    let closeButton = $('.action-close');
    $(closeButton).click(()=>{
            localStorage.setItem('email', 'customer doesnt want to ')
    })
    console.log(closeButton)
    $(element).ready(function() {

        function getCustomerInfo () { //getting customer data from section customer
            let customer = customerData.get('customer');
            return customer();
        }
        const customerName = getCustomerInfo();
        const customerFullName  = customerName.fullname;// variable with customer full name
            function callPopup() {
                if (customerFullName === undefined){ //if i can't find customer full name I open modal window
                    popup.openModal();
                    console.log(customerFullName);// debugging hint

                }
                else{
                    console.log('no customer') // debugging hint
                }

            }
            callPopup()

    });
    };
});