<?php
    include_once '../dao/ConnectionDAO.php';
    include '../modules/Micropost.php';

    class MicropostDAO extends ConnectionDAO {

        //View all post
        function viewtweets($email){

            $this->open();
            $res = array();
            $stmt = $this->dbcon->prepare("SELECT a.id, m.id,  p.images, a.firstName, a.lastName, a.username, m.contents, m.emailadd
                                           FROM accounts AS a, photos AS p, microtweets AS m, following AS f
                                           WHERE f.to = a.emailaddress
                                           AND f.to = m.emailadd
                                           AND f.to = p.email
                                           AND f.from = ?
                                           ORDER BY m.id DESC;");
            $stmt->bindParam(1, $email);
            $stmt->execute();

            $i = 0;
            while($row = $stmt->fetch()) {
                $arr = array();
                $arr['id'] = $row[0];
                $arr['post_id'] = $row[1];
                $arr['images'] = $row[2];
                $arr['firstName'] = $row[3];
                $arr['lastName'] = $row[4];
                $arr['username'] = $row[5];
                $arr['contents'] = $row[6];
                $arr['emailadd'] = $row[7];

                $res[$i] = $arr;
                $i++;
            }

            return json_encode($res);

            $this->close();

        }

        //View all post
        function viewmytweets($email){

            $this->open();
            $res = array();
            $stmt = $this->dbcon->prepare("SELECT a.id, m.id,  p.images, a.firstName, a.lastName, a.username, m.contents, m.emailadd
                                           FROM accounts AS a, photos AS p, microtweets AS m, following AS f
                                           WHERE f.to = a.emailaddress
                                           AND f.to = m.emailadd
                                           AND f.to = p.email
                                           AND f.from != ?
                                           ORDER BY m.id DESC;");
            $stmt->bindParam(1, $email);
            $stmt->execute();

            $i = 0;
            while($row = $stmt->fetch()) {
                $arr = array();
                $arr['id'] = $row[0];
                $arr['post_id'] = $row[1];
                $arr['images'] = $row[2];
                $arr['firstName'] = $row[3];
                $arr['lastName'] = $row[4];
                $arr['username'] = $row[5];
                $arr['contents'] = $row[6];
                $arr['emailadd'] = $row[7];

                $res[$i] = $arr;
                $i++;
            }

            return json_encode($res);

            $this->close();

        }
    }
?>