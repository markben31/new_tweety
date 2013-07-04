<?php
    class ConnectionDAO {
        protected $host = "localhost";
        protected $username = "root";
        protected $password = "";
        protected $dbname = "tweetym";
        protected $dbcon = null;

        public function open() {
            try {
                $this->dbcon = new PDO("mysql:host=127.0.0.1;dbname=".$this->dbname, $this->username, $this->password);
            } catch (PDOException $e) {
                $e->getMessage();
            }
        }

        public function close() {
            try {
                $this->dbcon = null;
            } catch (PDOException $e) {
                $e->getMessage();
            }
        }
    }
?>