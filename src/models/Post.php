<?php

class post{
    private $title;
    private $date;
    private $body;
    private $tag_id;

    /**
     * post constructor.
     * @param $title
     * @param $date
     * @param $body
     */
    public function __construct($title, $date, $body, $tag_id = null)
    {
        $this->title = $title;
        $this->date = $date;
        $this->body = $body;
        $this->tag_id = $tag_id;
    }

    /**
     * @return mixed
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * @param mixed $title
     */
    public function setTitle($title)
    {
        $this->title = $title;
    }

    /**
     * @return mixed
     */
    public function getDate()
    {
        return $this->date;
    }

    /**
     * @param mixed $date
     */
    public function setDate($date)
    {
        $this->date = $date;
    }

    /**
     * @return mixed
     */
    public function getBody()
    {
        return $this->body;
    }

    /**
     * @param mixed $body
     */
    public function setBody($body)
    {
        $this->body = $body;
    }

    /**
     * @return null
     */
    public function getTagId()
    {
        return $this->tag_id;
    }

    /**
     * @param null $tag_id
     */
    public function setTagId($tag_id)
    {
        $this->tag_id = $tag_id;
    }

    /**
     * echo out the object to test
     */
    public function __toString()
    {
        return "Title: " . $this->title . "  " . "Date: " . $this->date . "  " . "Body: " . $this->body;
    }


}
