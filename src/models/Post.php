<?php

class post{
    private $title;
    private $date;
    private $body;

    /**
     * post constructor.
     * @param $title
     * @param $date
     * @param $body
     */
    public function __construct($title, $date, $body)
    {
        $this->title = $title;
        $this->date = $date;
        $this->body = $body;
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
     * echo out the object to test
     */
    public function __toString()
    {
        return "Title: " . $this->title . "  " . "Date: " . $this->date . "  " . "Body: " . $this->body;
    }


}
