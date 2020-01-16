var config = {
    map: {
        '*': {
            'Magento_Checkout/template/form/element/email.html': 'Magento_Checkout/template/form/element/email.html',
           'myfile': 'Magento_Checkout/js/myfile',
            'slick': 'Magento_Checkout/js/slick.min'

        }
    },
    shim: {
        slick: {
            deps: ['jquery']
        }
    }
};