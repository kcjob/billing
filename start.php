<<?php
require_once(__DIR__ .'/vendor/autoload.php');

use \Apps\BillingInformation;
use \Apps\AccessCSVData;
use \Apps\BillObject;
use \Apps\MessageDataFromBillObject;
use \Apps\TemplateView;

use Monolog\Logger;
use Monolog\Handler\StreamHandler;

$csvDataArray = AccessCSVData::getCsvDataAsArray();
$arrayofbillObjects = BillObject::createBillObject($csvDataArray);
$arrayOfMsgDataObjects = MessageDataFromBillObject::getMessageData($arrayofbillObjects);
$template = new TemplateView();
$template -> generateView($arrayOfMsgDataObjects);

