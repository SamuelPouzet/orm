<?php

/**
 * @ORM\Table(name=forum)
 */
class ForumEntity
{
    /**
     * @var int $id
     * @ORM\Id
     * @ORM\Column(name=id)
     */
    protected $id;

    /**
     * @var string $name
     * @ORM\Column(name=name)
     */
    protected $name;

    /**
     * @var string $slug
     * @ORM\Column(name=slug)
     */
    protected $slug;

    /**
     * @var string $favicon
     * @ORM\Column(name=favicon)
     */
    protected $favicon;

    /**
     * @var string $description
     * @ORM\Column(name=description)
     */
    protected $description;

    /**
     * @var string $image
     * @ORM\Column(name=image)
     */
    protected $image;

    /**
     * @var int $owner_id
     * @ORM\Column(name=owner_id)
     */
    protected $owner_id;

    /**
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param int $id
     * @return ForumEntity
     */
    public function setId($id)
    {
        $this->id = $id;
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
     * @return ForumEntity
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
     * @return ForumEntity
     */
    public function setSlug($slug)
    {
        $this->slug = $slug;
        return $this;
    }

    /**
     * @return string
     */
    public function getFavicon()
    {
        return $this->favicon;
    }

    /**
     * @param string $favicon
     * @return ForumEntity
     */
    public function setFavicon($favicon)
    {
        $this->favicon = $favicon;
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
     * @return ForumEntity
     */
    public function setDescription($description)
    {
        $this->description = $description;
        return $this;
    }

    /**
     * @return string
     */
    public function getImage()
    {
        return $this->image;
    }

    /**
     * @param string $image
     * @return ForumEntity
     */
    public function setImage($image)
    {
        $this->image = $image;
        return $this;
    }

    /**
     * @return int
     */
    public function getOwnerId()
    {
        return $this->owner_id;
    }

    /**
     * @param int $owner_id
     * @return ForumEntity
     */
    public function setOwnerId($owner_id)
    {
        $this->owner_id = $owner_id;
        return $this;
    }

}