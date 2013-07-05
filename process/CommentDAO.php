<?php
    include_once '../dao/ConnectionDAO.php';
    class CommentDAO extends ConnectionDAO{

        //newComments

        function new_comment($id){

            $this->openConn();

            try {
                $stmt = $this->dbcon->prepare("SELECT p.images, a.firstName, a.lastName, op.post_contents FROM comments AS op, photos AS p, microtweets AS m, accounts AS a  WHERE m.id = op.id AND p.email = a.emailaddress AND op.email = p.email AND op.id = ? AND op.status = 1 ORDER BY op.p_id ASC;");
                $stmt->bindParam(1, $id);
                $stmt->execute();

                $comments = "";

                while($row = $stmt->fetch()){
                    $comments .= "<tr >";
                    $comments .= "<td>";
                    $comments .= "<div align='left' style='height: auto;' class='div_view_tweet' id='div_all_comments'>";
                    $comments .= "<img src='php_func/" . $row[0] ."' width=30px' height='30px'/>";
                    $comments .= "<a style='cursor: pointer; color: rgb(200,200,200);'>" . ucwords(strtolower( $row[1])) . ' ' . ucwords(strtolower( $row[2])) ."</a>";
                    $comments .= " <span style=' margin-left: 3px; color: rgb(100,200,100);' align='left' name='view_txt_content'>" . ucfirst(strtolower( $row[3])) ."</span>";
                    $comments .= "</div>";
                    $comments .= "</td>";
                    $comments .= "</tr>";
                }

                return $comments;

                $this->closeConn();
            } catch(Exception $e){
                $e->getMessage();
            }
        }

        function updateComment() {
            $this->open();
            try{
                $stmt = $this->dbcon->prepare("UPDATE comments SET status = 0 WHERE status = 1");
                $stmt->execute();

                $this->close();
            }catch (Exception $e){
                $e->getMessage();
            }
        }

        //View all comments
        function viewComments($id){
            $this->open();

            $res = array();
            $stmt = $this->dbcon->prepare("SELECT p.images, a.firstName, a.lastName, op.post_contents
                                           FROM comments AS op, photos AS p, microtweets AS m, accounts AS a
                                           WHERE m.id = op.id
                                           AND p.email = a.emailaddress
                                           AND op.email = p.email
                                           AND op.id = ?
                                           AND op.status = 0
                                           ORDER BY op.p_id ASC;");
            $stmt->bindParam(1, $id);
            $stmt->execute();

            $i = 0;
            while($row = $stmt->fetch()) {
                $arr = array();
                $arr['images'] = $row[0];
                $arr['firstName'] = $row[1];
                $arr['lastName'] = $row[2];
                $arr['comments'] = $row[3];

                $res[$i] = $arr;
                $i++;
            }

            return json_encode($res);

            $this->close();

        }

        //View my comments
        function viewmyComments($id){
            $this->open();

            $res = array();
            $stmt = $this->dbcon->prepare("SELECT p.images, a.firstName, a.lastName, op.post_contents
                                           FROM comments AS op, photos AS p, microtweets AS m, accounts AS a
                                           WHERE m.id = op.id
                                           AND p.email = a.emailaddress
                                           AND op.email = p.email
                                           AND op.id = ?
                                           AND op.status = 0
                                           ORDER BY op.p_id ASC;");
            $stmt->bindParam(1, $id);
            $stmt->execute();

            $i = 0;
            while($row = $stmt->fetch()) {
                $arr = array();
                $arr['images'] = $row[0];
                $arr['firstName'] = $row[1];
                $arr['lastName'] = $row[2];
                $arr['comments'] = $row[3];

                $res[$i] = $arr;
                $i++;
            }

            return json_encode($res);

            $this->close();

        }

        //View all comments
        function getNewComments(){
            $this->open();

            $res = array();
            $stmt = $this->dbcon->prepare("SELECT p.images, a.firstName, a.lastName, op.post_contents, op.id
                                           FROM comments AS op, photos AS p, microtweets AS m, accounts AS a
                                           WHERE m.id = op.id
                                           AND p.email = a.emailaddress
                                           AND op.email = p.email
                                           AND op.status = 1
                                           ORDER BY op.p_id ASC;");
            $stmt->execute();

            $i = 0;
            while($row = $stmt->fetch()) {
                $arr = array();
                $arr['images'] = $row[0];
                $arr['firstName'] = $row[1];
                $arr['lastName'] = $row[2];
                $arr['comments'] = $row[3];
                $arr['post_id'] = $row[4];

                $res[$i] = $arr;
                $i++;
            }

            return json_encode($res);

            $this->close();

        }

        //add comments
        function addNewComments($m_id, $content, $emailadd){

            $this->open();

            $stmt = $this->dbcon->prepare("INSERT INTO comments VALUES(null,?,?,?,1);");
            $stmt->bindParam(1, $m_id);
            $stmt->bindParam(2, $content);
            $stmt->bindParam(3, $emailadd);
            $stmt->execute();

            $this->close();

        }

        /*$this->open();

           $stmt = $this->dbcon->prepare("SELECT p.images, a.firstName, a.lastName, op.post_contents
                                              FROM comments AS op, photos AS p, microtweets AS m, accounts AS a
                                              WHERE m.id = op.id
                                              AND p.email = a.emailaddress
                                              AND op.email = p.email
                                              AND op.id = ?
                                              AND op.status = 1
                                              ORDER BY op.p_id ASC;");
           $stmt->bindParam(1, $id);
           $stmt->execute();

           $comments = "";

           while($row = $stmt->fetch()){
               $comments .= "<tr >";
               $comments .= "<td>";
               $comments .= "<div align='justify' style='margin-left: 4px; margin-top: 0px; padding-right: 3px; width: 461px; font-size: 80%; height: auto; margin-bottom: 0px; padding-top: 2px; padding-bottom: 3px; border-bottom: solid 1px rgba(100,100,100,.50); ' class='div_view_tweet' id='div_all_comments'>";
               $comments .= "<img src='php_func/" . $row[0] ."' style='width:30px; height:30px;'/>";
               $comments .= "<a style='cursor: pointer; font-size: 90%; color: rgb(200,200,200);'>" . ucwords(strtolower( $row[1])) . ' ' . ucwords(strtolower( $row[2])) ."</a> :";
               $comments .= " <span style='margin-left: 3px; color: rgb(100,250,100);' align='left' name='view_txt_content'>" . nl2br(htmlentities($row[3])) ."</span>";
               $comments .= "</div>";
               $comments .= "</td>";
               $comments .= "</tr>";
           }

           return $comments;

           $this->close();*/
    }