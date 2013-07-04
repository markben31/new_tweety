<?php
    include_once '../dao/ConnectionDAO.php';
    include '../modules/User.php';

    class UserDAO extends ConnectionDAO{

        //User login
        function user_login($email, $pass){

            $this->open();

            try {
                $stmt = $this->dbcon->prepare("SELECT a.id, p.images, a.firstName, a.lastName, a.username, a.emailaddress, a.password, a.status
                                               FROM accounts AS a, photos AS p
                                               WHERE a.emailaddress = p.email
                                               AND a.emailaddress=?
                                               AND a.password=? ");
                $stmt->bindParam(1, $email);
                $stmt->bindParam(2, $pass);
                $stmt->execute();

                $row = $stmt->fetch();

                if($row[0] == "" || $row[0] == null || $row[5] != $email || $row[6] != $pass){
                    return false;
                }else{
                    $stmt = $this->dbcon->prepare("UPDATE accounts SET status=1 WHERE emailaddress=?;");
                    $stmt->bindParam(1,$email);
                    $stmt->execute();

                    $this->close();
                    return true;
                }
            } catch (PDOException $e) {
                $e->getMessage();
            }

        }

        //User log out
        function user_logout($email){
            $this->open();

            if(isset($_SESSION['emailadd']) && isset($_SESSION['password'])){

                $stmt = $this->dbcon->prepare("UPDATE accounts SET status=0 WHERE emailaddress=?;");
                $stmt->bindParam(1,$email);
                $stmt->execute();
                $this->close();

                session_unset();
                session_destroy();
                header("Location: ../index.php");
            }

        }

        /*User Accounts*/
        function newAccount($info){
            $this->open();


            $lastName = $info->getLastname();
            $firstName = $info->getFirstName();
            $address = $info->getAddress();
            $contact = $info->getContactNum();
            $gender = $info->getGender();
            $age = $info->getAge();
            $username = $info->getUsername();
            $email = $info->getEmailaddress();
            $pass = $info->getPassword();

            $stmt = $this->dbcon->prepare("INSERT INTO accounts VALUES(0,?,?,?,?,?,?,?,?,?,0);");
            $stmt->bindParam(1, $lastName);
            $stmt->bindParam(2, $firstName);
            $stmt->bindParam(3, $address);
            $stmt->bindParam(4, $contact);
            $stmt->bindParam(5, $gender);
            $stmt->bindParam(6, $age);
            $stmt->bindParam(7, $username);
            $stmt->bindParam(8, $email);
            $stmt->bindParam(9, $pass);
            $stmt->execute();

            $fileName ="uploaded_images/aboutus.png";
            $this->saveImage($fileName,$email);

            $this->close();
        }

        function viewUserInfo($email){
            $this->open();

            $stmt = $this->dbcon->prepare("SELECT a.lastName, a.firstName, a.address, a.contactNum, a.gender, a.age, a.username, p.images
                                           FROM accounts AS a, photos AS p
                                           WHERE p.email = a.emailaddress
                                           AND a.emailaddress = ?;");
            $stmt->bindParam(1, $email);
            $stmt->execute();

            $row = $stmt->fetch();

            $info = new User();
            $info->setLastName($row[0]);
            $info->setFirstName($row[1]);
            $info->setAddress($row[2]);
            $info->setContactNum($row[3]);
            $info->setGender($row[4]);
            $info->setAge($row[5]);
            $info->setUsername($row[6]);
            $info->setImage($row[7]);

            $this->close();

            return $info;

        }

        /*Edit User Account*/
        function retrieve_accounts($email){

            $this->openConn();

            $stmt = $this->dbcon->prepare("SELECT a.id, a.lastName, a.firstName, a.address, a.contactNum, a.username, a.emailaddress
                                           FROM accounts AS a, photos AS p
                                           WHERE emailaddress=?;");
            $stmt->bindParam(1,$email);
            $stmt->execute();

            $record = $stmt->fetch();

            $list = array("user_id"=>$record[0], "edit_lastName"=>ucwords(strtolower($record[1])), "edit_firstName"=>ucwords(strtolower($record[2])), "edit_address"=>ucwords(strtolower($record[3])), "edit_contact"=>$record[4], "edit_username"=>$record[5], "edit_emailaddress"=>$record[6]);

            // echo $list;

            $json_string = json_encode($list);
            echo $json_string;

            $this->closeConn();
        }

        //Search all user
        function searchUser($lastname){

            $this->openConn();

            $stmt = $this->dbcon->prepare("SELECT a.id, a.firstName, a.lastName, a.address, a.contactNum, a.gender, a.age, a.username, a.emailaddress
                                           FROM accounts AS a
                                           WHERE a.lastName LIKE'" . $lastname ."%';");
            $stmt->execute();

            $searched = false;

            while($row = $stmt->fetch()){
                $ctr=0;
                while($ctr<2){
                    if($row[$ctr] != "" || $row[$ctr] != ""){
                        $searched = true;
                    }
                    $ctr++;
                }

                if($searched){

                    $info = new User();
                    $info->setId($row[0]);
                    $info->setFirstName($row[1]);
                    $info->setLastName($row[2]);
                    $info->setAddress($row[3]);
                    $info->setContactNum($row[4]);
                    $info->setGender($row[5]);
                    $info->setAge($row[6]);
                    $info->setUsername($row[7]);
                    $info->setEmailaddress($row[8]);

                    $this->close();
                    return $info;
                }

            }
            if(!$searched){

                $err = "Error msg";
                return $err;
            }

            $this->closeConn();

        }

        /*Saving Edited User Info*/
        /*function edit_prof_save($edit_lastName, $edit_firstName, $edit_address, $edit_contact, $email){

            $this->openConn();

            $stmt = $this->dbcon->prepare("UPDATE accounts
                                           SET lastName=?, firstName=?, address=?, contactNum=?
                                           WHERE emailaddress= '" . $email ."';");
            $stmt->bindParam(1, $edit_lastName);
            $stmt->bindParam(2, $edit_firstName);
            $stmt->bindParam(3, $edit_address);
            $stmt->bindParam(4, $edit_contact);
            $stmt->execute();

            $this->closeConn();
        }

        function edit_email_save($edit_username, $edit_email, $emailadd){

            $this->openConn();

            $stmt = $this->dbcon->prepare("UPDATE accounts AS a
                                           SET a.username=?, a.emailaddress=?
                                           WHERE emailaddress= '" . $emailadd ."';");
            $stmt->bindParam(1, $edit_username);
            $stmt->bindParam(2, $edit_email);
            $stmt->execute();

            $this->closeConn();
        }

        function edit_pass_info_save($edit_new_pass, $email){

            $this->openConn();

            $stmt = $this->dbcon->prepare("UPDATE accounts AS a
                                           SET a.password=?
                                           WHERE emailaddress= '" . $email ."';");
            $stmt->bindParam(1, $edit_new_pass);
            $stmt->execute();

            $this->closeConn();
        }*/
        function saveImage($filename, $email){
            try{
                $this->open();

                $sql2 = "";

                $sql = "SELECT id FROM photos WHERE email = ?";
                $stmt = $this->dbcon->prepare($sql);
                $stmt->bindParam(1, $email);
                $stmt->execute();

                if($stmt->fetch()){
                    $sql2 = "UPDATE photos SET images = ? WHERE email = ?";
                }else{
                    $sql2 = "INSERT INTO photos VALUES (null, ?,?)";
                }


                $stmt = $this->dbcon->prepare($sql2);
                $stmt->bindParam(1,$filename);
                $stmt->bindParam(2, $email);
                $stmt->execute();

                $this->close();

            }catch(Exception $e){
                $e->getMessage("Error in uploading!");
            }
        }


    }