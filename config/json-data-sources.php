<?php
return [
    'providers'=>[
        "ProviderX"=> [
            "formatter"=> "/providerFormatters/ProviderXFormatter.json",
            "source"=> "/dataProviders/DataProviderX.json"
        ],
        "ProviderY"=> [
            "formatter"=> "/providerFormatters/ProviderYFormatter.json",
            "source"=> "/dataProviders/DataProviderY.json"
        ]
    ],
    'filters'=>[
        'status'=>[
            'filter'=>\App\Filters\EqualsFilter::class,
            'attribute'=>\App\Utils\ProductAttributesUtil::STATUS,
            'key'=>'status'
        ],
        'balanceMin'=>[
            'filter'=>\App\Filters\MoreThanFilter::class,
            'attribute'=>\App\Utils\ProductAttributesUtil::CURRENTPRICE,
            'key'=>'balanceMin'
        ],
        'balanceMax'=>[
            'filter'=>\App\Filters\LessThanFilter::class,
            'attribute'=>\App\Utils\ProductAttributesUtil::CURRENTPRICE,
            'key'=>'balanceMax'
        ],
        'currency'=>[
            'filter'=>\App\Filters\EqualsFilter::class,
            'attribute'=>\App\Utils\ProductAttributesUtil::CURRENCY,
            'key'=>'currency'
        ],
        'provider'=>[
            'filter'=>\App\Filters\ProviderFilter::class,
            'attribute'=>NULL,
            'key'=>'provider'
        ],
    ]

];
