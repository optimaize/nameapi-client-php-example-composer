<?php
/**
 * This demonstrates a call to the disposable email address detector.
 */

require '../vendor/autoload.php';
use org\nameapi\ontology\input\context\Context;
use org\nameapi\ontology\input\context\Priority;
use org\nameapi\client\services\ServiceFactory;

define('NAMEAPI_API_KEY', 'your-api-key'); //grab one from nameapi.org

//setup code:
$context = Context::builder()
    ->priority(Priority::REALTIME())
    ->build();
$serviceFactory = new ServiceFactory(NAMEAPI_API_KEY, $context);
$deaDetector = $serviceFactory->emailServices()->disposableEmailAddressDetector();

//the call:
$emailAddress = 'abcdefgh@10minutemail.com';
$result = $deaDetector->isDisposable($emailAddress);
if ($result->getDisposable()->isDisposable()) {
    echo "The address ".$emailAddress." is disposable!";
} else {
    echo "The address ".$emailAddress." looks fine.";
}

