<?php

    class Request extends Dbh{
        public function getRequestInfo(){
            $stmt = $this->connect()->prepare('SELECT * FROM requestdirectory');

            if(!$stmt->execute(array())) {
                $stmt = null;
                header("location: requestdiretory.php?error=stmtfailed");
                exit();
            }
    
            if($stmt->rowCount() == 0) {
                $stmt = null;
                header("location: requestdiretory.php?error=profilenotfound");
                exit();
            }
    
            $requestData = $stmt->fetchAll(PDO::FETCH_ASSOC);
    
            return $requestData;
        }

       
    }