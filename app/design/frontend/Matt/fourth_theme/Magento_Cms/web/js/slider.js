define(['ko'
    ,
    'jquery',
    'slick',
], function (ko, $) {
    return function (config, element) {

        const settings = {
            "async": true,
            "crossDomain": true,
            "url": "https://local.domain.com/graphql",
            "method": "POST",
            "headers": {
                "content-type": "application/json"
            },
            "data": "{\"query\":\" {\\n  products(\\n    search: \\\"Yoga pants\\\"\\n    pageSize: 15\\n  )\\n  {\\n    total_count\\n    items {\\n      image {\\n        label\\n        url\\n      }\\n      name\\n      sku\\n      price {\\n        regularPrice {\\n          amount {\\n            value\\n            currency\\n          }\\n        }\\n      }\\n    }\\n    page_info {\\n      page_size\\n      current_page\\n    }\\n  }\\n}\\n\"}"
        };
        async function callSlider() {
            await $.ajax(settings).done(function (response) {
                const productsData = response.data.products.items;
                console.log(productsData);
                $.each(productsData, function (i, item) {
                    const basicElement = $('<li><div class="' +
                        '"><p>' + item.name + '</p><div class="product-image" >some image</div><p>' + item.price.regularPrice.amount.value +  '</p><button>Buy This Peace Of Shit</button></div></li>'
                    );
                    $(element).append(basicElement);
                })
            });
            $(document).ready(function () {
                $(element).slick({
                    dots: true,
                    infinite: true,
                    speed: 300,
                    slidesToShow: 5,
                    slidesToScroll: 1,
                });
            });
        }
        callSlider()
    };
});
