<?php
namespace Apps;
use  Apps\EmailMessageDataObject;
use Apps\ConfigEmail;

class EmailMessageGenerator
{
  static function createEmail(array $arrayofbillObjects){
    $emailParams = parse_ini_file("config/config.ini");
    //----- split out each msg object
    foreach($arrayofbillObjects as $msgDataObject){
      $app = new TemplateView();
      $msg = $app->generateView($msgDataObject);

        // Create the Transport
      $transport = (new \Swift_SmtpTransport('outgoing.ccny.cuny.edu', 587, 'tls'))
          -> setUsername($emailParams['userName'])
          -> setPassword($emailParams['userPassword']);
      $mailer = new \Swift_Mailer($transport);

        // create and register logger
        //    $logger = new Swift_Plugins_Loggers_EchoLogger();
      $sentEmaillogger = new \Swift_Plugins_Loggers_ArrayLogger();
      $mailer->registerPlugin(new \Swift_Plugins_LoggerPlugin($sentEmaillogger));

        // Create a message
      $message = (new \Swift_Message('Core Facilities Equipment Billings'))
          -> setFrom($emailParams['fromName'])
          -> setTo($emailParams['sentTo']) //($msgDataObject->userEmailAddress);
          -> setContentType("text/html")
          -> setBody($msg);

      if(!empty($msgDataObject->attachmentArray)){
        foreach($msgDataObject->attachmentArray as $document){
          $attachment = \Swift_Attachment::fromPath('data/' . $document);
          $message -> attach($attachment);
        }
      }
        // Send the message
      $mailer->send($message, $failures);
        // output log
      file_put_contents('data/sentEmails.log', $sentEmaillogger->dump());
    } //foreach
  }
}
