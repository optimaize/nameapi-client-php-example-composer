<?php
/**
 * This demonstrates a call to the ping service.
 */

require '../vendor/autoload.php';
use org\nameapi\client\services\Host;
use org\nameapi\ontology\input\context\Context;
use org\nameapi\ontology\input\context\Priority;
use org\nameapi\client\services\ServiceFactory;

define('NAMEAPI_API_KEY', 'your-api-key'); //grab one from nameapi.org

//setup code:
$context = Context::builder()
    ->priority(Priority::REALTIME())
    ->build();
$serviceFactory = new ServiceFactory(NAMEAPI_API_KEY, $context, Host::http('preview-api.nameapi.org'), '5.0');
$pingService = $serviceFactory->systemServices()->ping();

echo "The server says: " . $pingService->ping();

