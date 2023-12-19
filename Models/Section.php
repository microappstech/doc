<?php 
class Section 
{
    public $Id;
    public $Title;
    public $Description;
    public $Content;
    public $TutorialId;
    public function __construct($id, $title, $description, $content, $tutorialId)
    {
        $this->Id = $id;
        $this->Title = $title;
        $this->Description = $description;
        $this->Content = $content;
        $this->TutorialId = $tutorialId;
    }

}