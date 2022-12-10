<?php

/**
 * @ORM\Table(name=forum_category)
 */
class CategoryEntity
{
    /**
     * @var int $id
     * @ORM\Id
     * @ORM\Column(name=id)
     */
    protected $id;

    /**
     * @var int $forum_id
     * @ORM\Column(name=forum_id)
     */
    protected $forum_id;

    /**
     * @var string $name
     * @ORM\Column(name=forum_id)
     */
    protected $name;

    /**
     * @var string $slug
     * @ORM\Column(name=slug)
     */
    protected $slug;

    /**
     * @var string $description
     * @ORM\Column(name=description)
     */
    protected $description;

    /**
     * @var string $position
     * @ORM\Column(name=position)
     */
    protected $position;

    /**
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param int $id
     * @return CategoryEntity
     */
    public function setId($id)
    {
        $this->id = $id;
        return $this;
    }

    /**
     * @return int
     */
    public function getForumId()
    {
        return $this->forum_id;
    }

    /**
     * @param int $forum_id
     * @return CategoryEntity
     */
    public function setForumId($forum_id)
    {
        $this->forum_id = $forum_id;
        return $this;
    }

    /**
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param string $name
     * @return CategoryEntity
     */
    public function setName($name)
    {
        $this->name = $name;
        return $this;
    }

    /**
     * @return string
     */
    public function getSlug()
    {
        return $this->slug;
    }

    /**
     * @param string $slug
     * @return CategoryEntity
     */
    public function setSlug($slug)
    {
        $this->slug = $slug;
        return $this;
    }

    /**
     * @return string
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * @param string $description
     * @return CategoryEntity
     */
    public function setDescription($description)
    {
        $this->description = $description;
        return $this;
    }

    /**
     * @return string
     */
    public function getPosition()
    {
        return $this->position;
    }

    /**
     * @param string $position
     * @return CategoryEntity
     */
    public function setPosition($position)
    {
        $this->position = $position;
        return $this;
    }

}