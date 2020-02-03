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
                $.each(productsData, function (i, item) {
                    const basicElement = $('<li><div><p style="text-align:center;">'+ item.name +'</p><div style="display: flex;margin:0 auto;width: 50%;height: 200px;"><img src="'+ item.image.url +'" alt="some-good"></div><p style="text-align:center; margin-top:20px">Price:  '+ item.price.regularPrice.amount.value + item.price.regularPrice.amount.currency+'</p><div style="text-align: center;"><button>Buy This Peace Of Shit</button></div></div></li>'
                    );
                    $(element).append(basicElement);
                })
            });
            $(document).ready(function () {
                $(element).slick({
                    dots: true,
                    infinite: true,
                    speed: 300,
                    slidesToShow: 4,
                    slidesToScroll: 1,
                });
            });
        }
        callSlider()
    };
});
