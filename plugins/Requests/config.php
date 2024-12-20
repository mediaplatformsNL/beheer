<?php

return [
    'name' => 'Aanvragen',
    'menu' => [
        'index' => [
            'route' => 'requests.index',
            'icon' => 'ki-outline ki-text-align-left',
            'name' => 'Aanvragen',
            'subitems' => [
                'index' => [
                    'route' => 'requests.index',
                    'name' => 'Alle aanvragen',
                ],
                'create' => [
                    'route' => 'requests.create',
                    'name' => 'Nieuwe aanvraag',
                ],
                'manual' => [
                    'route' => 'requests.manual',
                    'name' => 'Uitleg',
                ],
            ],
        ],
    ],
    'settings' => [
        'request_number' => [
            'label' => 'Vervolgnummer voor aanvragen',
            'type' => 'number',
        ],
    ],
    'has_api' => true,
    'api_key' => '0pdTK99UvaGrGnXI28yLIjjSBllUAp0sLnCtsBxehBxs6PKjrO0oDAiI50L8',
];