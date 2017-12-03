<?php
namespace Apps;
/**
* Create message data
*
*/
class MessageDataFromBillObject{

  static function getMessageData($arrayOfBillObjects){
    $emailMsgArray = [];
      foreach ($arrayOfBillObjects as $billObject) {
        $userName = $billObject -> userName;
        $emailData = new EmailMessageDataObject($billObject); // create a new object

        if (!array_key_exists($userName, $emailMsgArray)){
          $emailMsgArray[$userName] = $emailData;
          array_push($emailMsgArray[$userName] -> dataArray, $emailData -> serviceInfo);
          array_push($emailMsgArray[$userName] -> attachmentArray, $emailData -> fileName);
       } else {
          array_push($emailMsgArray[$userName] -> dataArray, $emailData -> serviceInfo);
          array_push($emailMsgArray[$userName] -> attachmentArray, $emailData -> fileName);
      }
    }
    return $emailMsgArray;
  }
}
