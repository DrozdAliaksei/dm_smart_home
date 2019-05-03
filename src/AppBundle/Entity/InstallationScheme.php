<?php


namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="installation_scheme")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\InstallationSchemeRepository")
 */
class InstallationScheme
{
    /**
     * @ORM\Column(type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;

    /**
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\Room")
     * @ORM\JoinColumn(name="room_id",referencedColumnName="id",onDelete="CASCADE")
     *
     * @var string $room_id
     */
    protected $room_id;

    /**
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\Equipment")
     * @ORM\JoinColumn(name="equipment_id",referencedColumnName="id",onDelete="CASCADE")
     *
     * @var string $equipment_id
     */
    protected $equipment_id;

    /**
     * @ORM\Column(type="string",length=150)
     *
     * @var string $displayable_name
     */
    protected $displayable_name;

    /**
     * @ORM\Column(type="boolean")
     *
     * @var string $status
     */
    protected $status;

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @return string
     */
    public function getRoomId(): string
    {
        return $this->room_id;
    }

    /**
     * @param string $room_id
     */
    public function setRoomId(string $room_id)
    {
        $this->room_id = $room_id;
    }

    /**
     * @return string
     */
    public function getEquipmentId(): string
    {
        return $this->equipment_id;
    }

    /**
     * @param string $equipment_id
     */
    public function setEquipmentId(string $equipment_id)
    {
        $this->equipment_id = $equipment_id;
    }

    /**
     * @return string
     */
    public function getDispayableName(): string
    {
        return $this->displayable_name;
    }

    /**
     * @param string $dispayable_name
     */
    public function setDispayableName(string $dispayable_name)
    {
        $this->dispayable_name = $dispayable_name;
    }

    /**
     * @return string
     */
    public function getStatus(): string
    {
        return $this->status;
    }

    /**
     * @param string $status
     */
    public function setStatus(string $status)
    {
        $this->status = $status;
    }
}
