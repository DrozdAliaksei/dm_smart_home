<?php


namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="equipments")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\EquipmentRepository")
 */
class Equipment
{
    /**
     * @ORM\Column(type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     *
     * @ORM\OneToMany(targetEntity="AppBundle\Entity\InstallationScheme",mappedBy="equipment_id")
     */
    protected $id;

    /**
     * @ORM\Column(type="string", length=150)
     *
     * @var string $name
     */
    protected $name;

    /**
     * @ORM\Column(type="string", length=3000)
     *
     * @var string $description
     */
    protected $description;
//
//    /**
//     * @ORM\Column(type="boolean")
//     *
//     * @var string $status
//     */
//    protected $status;

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
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @param string $name
     */
    public function setName(string $name)
    {
        $this->name = $name;
    }

    /**
     * @return string
     */
    public function getDescription(): string
    {
        return $this->description;
    }

    /**
     * @param string $description
     */
    public function setDescription(string $description)
    {
        $this->description = $description;
    }

//    /**
//     * @return string
//     */
//    public function getStatus(): string
//    {
//        return $this->status;
//    }
//
//    /**
//     * @param string $status
//     */
//    public function setStatus(string $status)
//    {
//        $this->status = $status;
//    }
}
