<html>
<?php
function getAmount(){
  if(serviceType == 'paymentOnDemand'){
    $amount = 200;
  }
  if(serviceType == 'paymentAnnually'){
    $amount = 750;
  }
}

?>

</html>
