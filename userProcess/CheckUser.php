<?php
require "../PDOPHP/connectDB.php";
class CheckUser extends DBh
{
    public $timeDifferenceGlobal;
    public function checkUandE($u, $e)
    {
        $state = true;
        $query = "SELECT * FROM  `customer` WHERE `UserName`=? AND `Email`=?";

        $statement = $this->connect()->prepare($query);
        $statement->execute([$u, $e]);
        $rowCount = count($statement->fetchAll());
        if ($rowCount == 1) {
            $state = true;
        } else {
            $statement = null;
            $state = false;
        }
        return $state;
    }
    public function checkPandE($p, $e)
    {
        $state = true;
        //$query = "SELECT `Password` FROM  `customer` WHERE `Email`=?";
        $query = "SELECT verify_code_customer.verify_Code FROM customer 
        INNER JOIN verify_code_customer
        ON verify_code_customer.customer_CustomerID = customer.CustomerID
        WHERE customer.Email =?";
        $statement1 = $this->connect()->prepare($query);
        $statement1->execute([$e]);

        if ($statement1->rowCount() == 1) {
            $hashedPassword = $statement1->fetchAll(PDO::FETCH_ASSOC);

            $checkPassword = password_verify($p, $hashedPassword[0]["verify_Code"]);

            if ($checkPassword == false) {
                $state = false;
                echo "Wrong Password";
            } else {
                $state = true;
            }
        } else {
            $state = false;
        }
        return $state;
    }
    public function signUpUsers($fn, $ln, $un, $pwd, $em)
    {
        $query = "INSERT INTO customer (`FName`,`LName`,`UserName`,`Password`,`Email`) 
                  VALUES(?,?,?,?,?)";
        $statement1 = $this->connect()->prepare($query);
        $statement1->execute([$fn, $ln, $un, $pwd, $em]);
    }
    public function getUserDetails($pwd, $em)
    {
    }
    public function signInUsers($pwd, $em)
    {
        $state = true;
        $query = "SELECT `Password` FROM customer WHERE `Email`=?";
        $statement1 = $this->connect()->prepare($query);
        $statement1->execute([$em]);
        if ($statement1->rowCount() == 1) {
            $hashedPassword = $statement1->fetchAll(PDO::FETCH_ASSOC);
            $checkPassword = password_verify($pwd, $hashedPassword[0]["Password"]);

            if ($checkPassword == false) {
                $state = false;
                echo "Wrong Password";
            } else {
                $state = true;
            }
        } else {
            $state = false;
        }
        return $state;
    }
    public function checkEmail($e)
    {
        $state = true;
        $query = "SELECT * FROM  `customer` WHERE `Email`=?";

        $statement = $this->connect()->prepare($query);
        $statement->execute([$e]);
        $rowCount = count($statement->fetchAll());
        if ($rowCount == 1) {
            $state = true;
        } else {
            $statement = null;
            $state = false;
        }
        return $state;
    }
    public  function updatePasswordForVerification($e, $p, $currentDnT)
    {
        $hashPassword = password_hash($p, PASSWORD_DEFAULT);
        $state = true;
        $queryCheck = "SELECT * FROM verify_code_customer
        INNER JOIN customer
        ON customer.CustomerID = verify_code_customer.customer_CustomerID
        WHERE customer.Email = ?";
        $statementCheck = $this->connect()->prepare($queryCheck);
        $statementCheckResult = $statementCheck->execute([$e]);
        $statementCheckFetchedResult = $statementCheck->fetchAll();
        $lastAttemptTime = strtotime($statementCheckFetchedResult[0][2]);
        $strtocurrentDnT = strtotime($currentDnT);
        $timeDifference =$strtocurrentDnT -$lastAttemptTime ;
        $this->timeDifferenceGlobal = $timeDifference;
        if ($timeDifference >= 300) {


            $statementCheckResultRowCount = count($statementCheckFetchedResult);
            if ($statementCheckResultRowCount == 1) {
                $query = "UPDATE `customer`
            INNER JOIN `verify_code_customer`
            ON verify_code_customer.customer_CustomerID = customer.CustomerID
            SET verify_code_customer.verify_Code =?,attempted_Time=?
            WHERE customer.Email =?";
                $statement = $this->connect()->prepare($query);
                $statementResult = $statement->execute([$hashPassword, $currentDnT, $e]);
            } else {
                $userIDquery = "SELECT * FROM `customer`  WHERE `Email`=?";
                $getUserIDStatement = $this->connect()->prepare($userIDquery);
                $getUserIDStatement->execute([$e]);
                $fetchedResults = $getUserIDStatement->fetchAll();
                $getUserRowCount = count($fetchedResults);
                if ($getUserRowCount == 1) {
                    $cusIDGet = $fetchedResults;
                    $cusID =  $cusIDGet[0][4];
                    $insertVerifyRowQuery = "INSERT INTO `verify_code_customer`(`verify_Code`,`customer_CustomerID`,`attempted_Time`)
                VALUES(?,?);";
                    $insertVerifyStatement = $this->connect()->prepare($insertVerifyRowQuery);
                    $statementResult =   $insertVerifyStatement->execute([$hashPassword, $cusID, $currentDnT]);
                }
            }

            if ($statementResult) {
                $state = true;
            } else {
                $state = false;
            }
            return $state;
        } else {

            $state = false;
            return $state;
        }
    }
    public function reCreatePassword($e, $p)
    {
        $hashPassword = password_hash($p, PASSWORD_DEFAULT);
        $state = true;
        $query = "UPDATE `customer` SET `Password`=? WHERE `Email`=?";
        $statement = $this->connect()->prepare($query);
        $statementResult = $statement->execute([$hashPassword, $e]);
        if ($statementResult) {
            $state = true;
        } else {
            $state = false;
        }
        return $state;
    }
    public function getUpdatedPassword($e)
    {
        $state = true;

        $query = "SELECT verify_code_customer.verify_Code FROM customer 
        INNER JOIN verify_code_customer
        ON verify_code_customer.customer_CustomerID = customer.CustomerID
        WHERE customer.Email = ?";
        $statement = $this->connect()->prepare($query);
        $statement->execute([$e]);
    }
}
