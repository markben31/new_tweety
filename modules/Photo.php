<?php

    class Photo {
        private $id;
        private $images;

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
    }
?>