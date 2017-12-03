<?php
namespace Apps;
/**
* Create Bill Information Object
*
*/
class BillObject {

  static function createBillObject($csvDataArray){
    foreach($csvDataArray as $userDataArray){
      if($userDataArray[2]){
        $billObject = new billingInformation($userDataArray); // create a new object
        $billObjectsArray[] = $billObject;
      }
    }
    return $billObjectsArray;
  }
}
