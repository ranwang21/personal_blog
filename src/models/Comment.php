<?php


class Comment
{
    private $name;
    private $body;
    private $post_id;

    /**
     * Comment constructor.
     * @param $name
     * @param $body
     * @param $post_id
     */
    public function __construct($name, $body, $post_id)
    {
        $this->name = $name;
        $this->body = $body;
        $this->post_id = $post_id;
    }

    /**
     * @return mixed
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param mixed $name
     */
    public function setName($name)
    {
        $this->name = $name;
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
     * @return mixed
     */
    public function getPostId()
    {
        return $this->post_id;
    }

    /**
     * @param mixed $post_id
     */
    public function setPostId($post_id)
    {
        $this->post_id = $post_id;
    }

    /**
     * write out the object content
     * @return string
     */
    public function __toString()
    {
        return "Name: " . $this->name . "  " . "Body: " . $this->body . "  " . "post_id: " . $this->post_id;
    }


}