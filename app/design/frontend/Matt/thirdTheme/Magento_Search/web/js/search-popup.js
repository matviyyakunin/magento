define([
    'jquery',
    'Magento_Ui/js/modal/modal'
], function($, modal) {
return function (config, element) {
    console.log(config);
    console.log(element);
    let options = {
        type: 'popup',
        responsive: true,
        modalClass: 'search-modal-popup',
        buttons: [{
            class: 'close-search-popup',
            click: function() {
                this.closeModal();
            }
        }],
        opened: function() {
            $('#search').focus();
        }
    };
    let popup = modal(options, $('#search-block'));
    popup.openModal();

    $(element).on('click', function() {
         popup.openModal();
    });
    };
});