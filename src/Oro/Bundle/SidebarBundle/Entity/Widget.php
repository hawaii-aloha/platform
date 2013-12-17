<?php

namespace Oro\Bundle\SidebarBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Widget
 *
 * @ORM\Table(
 *      name="oro_sidebar_widget",
 *      indexes={
 *          @ORM\Index(name="sidebar_widgets_user_placement_idx", columns={"user_id", "placement"}),
 *          @ORM\Index(name="sidebar_widgets_position_idx", columns={"position"})
 *      }
 * )
 * @ORM\Entity(repositoryClass="Oro\Bundle\SidebarBundle\Entity\Repository\WidgetRepository")
 */
class Widget
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;

    /**
     * @var \Oro\Bundle\UserBundle\Entity\User $user
     *
     * @ORM\ManyToOne(targetEntity="Oro\Bundle\UserBundle\Entity\User")
     * @ORM\JoinColumn(name="user_id", referencedColumnName="id", nullable=false, onDelete="CASCADE")
     */
    protected $user;

    /**
     * @var string
     *
     * @ORM\Column(name="placement", type="string", nullable=false, length=50)
     */
    protected $placement;

    /**
     * @var integer
     *
     * @ORM\Column(name="position", nullable=false, type="smallint")
     */
    protected $position;

    /**
     * @var string
     *
     * @ORM\Column(name="title", type="string", nullable=false, length=255)
     */
    protected $title;

    /**
     * @var string
     *
     * @ORM\Column(name="icon", type="string", nullable=false, length=255)
     */
    protected $icon;

    /**
     * @var string
     *
     * @ORM\Column(name="module", type="string", nullable=false, length=255)
     */
    protected $module;

    /**
     * @var string
     *
     * @ORM\Column(name="settings", nullable=true, type="array")
     */
    protected $settings;

    /**
     * Get id
     *
     * @return integer 
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set title
     *
     * @param string $title
     * @return Widget
     */
    public function setTitle($title)
    {
        $this->title = $title;
    
        return $this;
    }

    /**
     * Get title
     *
     * @return string 
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * Set icon
     *
     * @param string $icon
     * @return Widget
     */
    public function setIcon($icon)
    {
        $this->icon = $icon;
    
        return $this;
    }

    /**
     * Get icon
     *
     * @return string 
     */
    public function getIcon()
    {
        return $this->icon;
    }

    /**
     * Set module
     *
     * @param string $module
     * @return Widget
     */
    public function setModule($module)
    {
        $this->module = $module;
    
        return $this;
    }

    /**
     * Get module
     *
     * @return string 
     */
    public function getModule()
    {
        return $this->module;
    }

    /**
     * Set position
     *
     * @param integer $position
     * @return Widget
     */
    public function setPosition($position)
    {
        $this->position = $position;
    
        return $this;
    }

    /**
     * Get position
     *
     * @return integer 
     */
    public function getPosition()
    {
        return $this->position;
    }

    /**
     * Set settings
     *
     * @param string $settings
     * @return Widget
     */
    public function setSettings($settings)
    {
        $this->settings = $settings;
    
        return $this;
    }

    /**
     * Get settings
     *
     * @return string 
     */
    public function getSettings()
    {
        return $this->settings;
    }

    /**
     * @return \Oro\Bundle\UserBundle\Entity\User
     */
    public function getUser()
    {
        return $this->user;
    }

    /**
     * @param \Oro\Bundle\UserBundle\Entity\User $user
     * @return Widget
     */
    public function setUser($user)
    {
        $this->user = $user;

        return $this;
    }

    /**
     * @return string
     */
    public function getPlacement()
    {
        return $this->placement;
    }

    /**
     * @param string $placement
     * @return Widget
     */
    public function setPlacement($placement)
    {
        $this->placement = $placement;

        return $this;
    }
}
