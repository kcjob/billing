<<?php
require_once(__DIR__ .'/vendor/autoload.php');

use \Apps\BillingInformation;
use \Apps\AccessCSVData;
use \Apps\BillObject;
//use \Apps\EmailMessageDataObject;
use \Apps\MessageDataFromBillObject;
use \Apps\TemplateView;

use Monolog\Logger;
use Monolog\Handler\StreamHandler;

$csvDataArray = AccessCSVData::getCsvDataAsArray();
$arrayofbillObjects = BillObject::createBillObject($csvDataArray);
$arrayOfMsgDataObjects = MessageDataFromBillObject::getMessageData($arrayofbillObjects);
$template = new TemplateView();
$template -> generateView($arrayOfMsgDataObjects);

/* $loader = new Twig_Loader_Filesystem('Templates');
$twig = new Twig_Environment($loader, array('debug' => true));
$twig->addExtension(new Twig_Extension_Debug());
$template = $twig->load('messagebody.html.twig');

//----- split out each msg object
foreach($arrayOfMsgDataObjects as $msgDataObject){
//var_dump($dataObject->userName);
echo $template->render(array('dataObject'=>$msgDataObject));
}
*/
