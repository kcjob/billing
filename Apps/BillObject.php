<?php
namespace Apps;
/**
* Create Billing Object from Billing Details
*
*/
class BillObject {
  static function createBillObject($csvDataArray){
    foreach($csvDataArray as $userDataArray){
      if($userDataArray[2]){
        $billObject = new billingDetails($userDataArray);
        $billObjectsArray[] = $billObject;
      }
    }
    return $billObjectsArray;
  }
}
