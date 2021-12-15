<?php
/**
 * PayPal Setting & API Credentials
 * Created by Raza Mehdi <srmk@outlook.com>.
 */

return [
    'client_id' => 'AaM6iox7sDAm8no3dJX8nrNAdXNwB5vCaCR9TRjPLr32wmzEtUs3iUyYT6pxqGYP8H8lkHcWFdYlcWzP',
	'secret' => 'EBcJbuXCMllPbh3sO3nfi_V2UAT_kPmhRPsvQrBgo_8f7ahCUBdC7eaRIylpkwAYq7219dFYDa-e4-qE',
    'settings' => array(
        'mode' => 'sandbox',
        'http.ConnectionTimeOut' => 1000,
        'log.LogEnabled' => true,
        'log.FileName' => storage_path() . '/logs/paypal.log',
        'log.LogLevel' => 'FINE'
    ),
];
