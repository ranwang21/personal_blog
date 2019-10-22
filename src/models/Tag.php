<?php


class Tag
{
    private $name;
    private $post_id;

    /**
     * Tag constructor.
     * @param $name
     * @param $post_id
     */
    public function __construct($name, $post_id = null)
    {
        $this->name = $name;
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
     * @return null
     */
    public function getPostId()
    {
        return $this->post_id;
    }

    /**
     * @param null $post_id
     */
    public function setPostId($post_id)
    {
        $this->post_id = $post_id;
    }


}