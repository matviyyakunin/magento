//
// define([
//     'jquery',
//     'Magento_Ui/js/modal/modal'
// ], function($, modal) {
// return function (config, element) {
//     let options = {
//         type: 'popup',
//         responsive: true,
//         modalClass: 'search-modal-popup',
//         buttons: [{
//             class: 'close-search-popup',
//             click: function() {
//                 const value = $('#custom-input')[0].value; // getting information from input
//                 function validateEmail(email) { //function for  checking  values from input and returning true or false
//                     const re = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
//                     return re.test(String(email).toLowerCase());
//                 }
//                 let checkResult = validateEmail(value);// variable for result  containing of validateEmail function
//                  if(checkResult){// condition to allow close modal window and save data either localStorage or cookies
//                     this.closeModal();
//                     localStorage.setItem('email',`${value}`);
//                 }
//                  else{
//                  }
//             }
//         }],
//
//         opened: function() {
//             $('#search').focus();
//         }
//     };
//     let popup = modal(options, $('#search-block'));
//
//     popup.openModal();
//     $(element).on('click', function() {
//          popup.openModal();
//     });
//     };
// });