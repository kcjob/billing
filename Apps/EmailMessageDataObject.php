<?php
namespace Apps;
use Apps\EmailMessageData;
/**
* EmailMessageData Object
*
*/
class EmailMessageDataObject{
	public function __construct($billInfo){
    $this -> dataArray = $dataArray = [];
    $this -> attachmentArray = $attachmentArray = [];
    $this -> userName = $billInfo -> userName;
    $this -> userEmailAddress = $billInfo -> userEmail;
    $this -> fileName = $billInfo -> fileName;

    $this -> serviceInfo =  [
        'service' => $billInfo -> service,
        'startTime' => $billInfo -> startTime,
				'endTime' => $billInfo -> endTime,
				'serviceHours' => $billInfo -> serviceHours,
        'notes' => $billInfo -> notes
        ];
  }
}
