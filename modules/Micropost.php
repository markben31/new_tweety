<?php
    class Micropost {
        private $id;
        private $lastName;
        private $firstName;
        private $address;
        private $contactNum;
        private $gender;
        private $age;
        private $username;
        private $emailaddress;
        private $images;
        private $contents;

        public function setAddress($address)
        {
            $this->address = $address;
        }

        public function getAddress()
        {
            return $this->address;
        }

        public function setAge($age)
        {
            $this->age = $age;
        }

        public function getAge()
        {
            return $this->age;
        }

        public function setContactNum($contactNum)
        {
            $this->contactNum = $contactNum;
        }

        public function getContactNum()
        {
            return $this->contactNum;
        }

        public function setContents($contents)
        {
            $this->contents = $contents;
        }

        public function getContents()
        {
            return $this->contents;
        }

        public function setEmailaddress($emailaddress)
        {
            $this->emailaddress = $emailaddress;
        }

        public function getEmailaddress()
        {
            return $this->emailaddress;
        }

        public function setFirstName($firstName)
        {
            $this->firstName = $firstName;
        }

        public function getFirstName()
        {
            return $this->firstName;
        }

        public function setGender($gender)
        {
            $this->gender = $gender;
        }

        public function getGender()
        {
            return $this->gender;
        }

        public function setId($id)
        {
            $this->id = $id;
        }

        public function getId()
        {
            return $this->id;
        }

        public function setImages($images)
        {
            $this->images = $images;
        }

        public function getImages()
        {
            return $this->images;
        }

        public function setLastName($lastName)
        {
            $this->lastName = $lastName;
        }

        public function getLastName()
        {
            return $this->lastName;
        }

        public function setUsername($username)
        {
            $this->username = $username;
        }

        public function getUsername()
        {
            return $this->username;
        }

    }
?>