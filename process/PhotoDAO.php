<?php

    include_once '../dao/ConnectionDAO.php';
    include '../modules/Photo.php';

    class PhotoDAO extends ConnectionDAO{

        /*View and Save photos*/

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

        //view images
        function viewImg($email){

            $this->open();

            $stmt = $this->dbcon->prepare("SELECT p.id, p.images, a.firstName, a.lastName
                                           FROM photos AS p, accounts AS a
                                           WHERE p.email = a.emailaddress
                                           AND p.email ='" . $email ."';");
            $stmt->execute();

            while($row = $stmt->fetch()){
                // echo "$row[1]";
                echo "<div class='edit_image'>";
                echo "<img class='img-polaroid' src='php_func/" .$row[1] ."' style='width:180px; height:180px;' />";
                echo "<input type='hidden' id='prof_pic_name' value='". $row[1]."'>";
                echo "<input type='hidden' id='account_name' value='". $row[2]." ". $row[3]."'>";
                echo "<div class='edit_image_link'>";
                echo "<div>";
                echo "<a style='font-size: 100%; color: rgba(0,180,220,50);' href='#myModal' data-toggle='modal'>Change Photo</a>";
                echo "</div>";

                echo "</div>";
                echo "</div>";
                $_SESSION['prof_pic'] = "<img src='php_func/" .$row[1] ."' style='width:30px; height: 30px; ' />";
            }

            $this->close();
        }

    }

?>