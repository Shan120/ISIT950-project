<?php

use PHPUnit/Framework/TestCase;

class userTest extends TestCase
{
    use vehassitancemsdb;

    require '/admin/login.php';

    /**
     * @loginSuccessful
     */
    public function LoginTrue()
    {
        $credential = [
            'username' => 'robert',
            'password' => 'Robert@1'
        ];
         $this->post('login',$credential)->assertRedirect('/');
    }

    /**
     * @loginfail
     */
    public function LoginFalse()
    {
      $credential = [
          'username' => 'robert',
          'password' => 'incorrectpass'
        ];

    $response = $this->post('login',$credential);

    $response->assertSessionHasErrors('errors');
    }
}


class paymentAmount extends TestCase
{

  /**
  * @paymentCalculate
  */
  public function paymentAmountCalculate()
  {
    require 'payment.php';

    $serviceType = new Amount();
    $serviceType->serviceType = 'paymentOnDemand';
    $expectedAmount = 200;
    $correctAmmount = $serviceType->getAmount();

    $this->assertEquals($expectedAmount, $correctAmmount);
  }
}


class requestCount extends TestCase
{

  /**
  * @requestCount
  */
  public function requestCount()
  {
    use vehassitancemsdb;

    $sql="SELECT * from  Bookings";
    $query = $dbh -> prepare($sql);
    $query->execute();
    $results=$query->fetchAll(PDO::FETCH_OBJ);

    $expectedNumber = 9;
    $correctNumber = rowCount();

    $this->assertEquals($expectedNumber, $correctNumber);
  }
}


class motoristCount extends TestCase
{

  /**
  * @motoristCount
  */
  public function motoristCount()
  {
    use vehassitancemsdb;

    $sql="SELECT * from  Motorists";
    $query = $dbh -> prepare($sql);
    $query->execute();
    $results=$query->fetchAll(PDO::FETCH_OBJ);

    $expectedNumber = 5;
    $correctNumber = rowCount();

    $this->assertEquals($expectedNumber, $correctNumber);
  }
}


class professionalCount extends TestCase
{

  /**
  * @professionalCount
  */
  public function professionalCount()
  {
    use vehassitancemsdb;

    $sql="SELECT * from Professionals";
    $query = $dbh -> prepare($sql);
    $query->execute();
    $results=$query->fetchAll(PDO::FETCH_OBJ);

    $expectedNumber = 5;
    $correctNumber = rowCount();

    $this->assertEquals($expectedNumber, $correctNumber);
  }
}
?>
