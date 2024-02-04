<?php 
class Tutorial {
    private $id;
    private $title;
    private $content;
    private $image;
    private $author;
    public $Active ;
    
    public function __construct($id=null, $title, $content, $image , $author =""  , $_Active = false) {
        $this->id = $id;
        $this->title = $title;
        $this->content = $content;
        $this->image = $image;
        $this->author = $author;
        $this->Active = $_Active;
    }
    public function getId() {
        return $this->id;
    }
    public function getTitle() {
        return $this->title;
    }
    public function getContent() {
        return $this->content;
    }
    public function getImage() {
        return $this->image;
    }
    public function getAuthor() {
        return $this->author;
    }
    public function setTitle($title){
        $this->title = $title;
    }
    public function setContent($content){
        $this->content = $content;
    }
    public function setImage($image){
        $this->image = $image;
    }
    public function setAuthor($author){
        $this->author = $author;
    }
}