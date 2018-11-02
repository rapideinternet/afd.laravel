<?php

return [
    /*
    |--------------------------------------------------------------------------
    | AFD Package settings
    |--------------------------------------------------------------------------
    */

    'message_implementations' => [
        \SIVI\LaravelAFD\Models\Messages\ContractMessage::class
    ],

    'entity_implementations' => [
        //
    ],

    'connectors' => [
        'time' => [
            'host' => 'https://www.abzportal.nl/ace/sts-ws/stsPort',
            'wsdl_storage_path' => storage_path('afd'),
            'certificate_path' => config_path('abz_certificate.pem'),
            'certificate_passphrase' => null,
        ],
    ],


];
