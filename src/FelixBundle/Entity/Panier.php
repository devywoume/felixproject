<?php

namespace FelixBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Panier
 *
 * @ORM\Table(name="panier")
 * @ORM\Entity(repositoryClass="FelixBundle\Repository\PanierRepository")
 */
class Panier
{
    /**
     * @ORM\ManyToMany(targetEntity="Lignepanier", inversedBy="Panier",cascade={"persist","remove"})
     *
     */
    private $lignespanier;

    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="firstname", type="string", length=255)
     */
    private $firstname;

    /**
     * @var string
     *
     * @ORM\Column(name="lastname", type="string", length=255)
     */
    private $lastname;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="datecommande", type="datetimetz")
     */
    private $datecommande;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->lignespanier = new \Doctrine\Common\Collections\ArrayCollection();
    }

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
     * Set firstname
     *
     * @param string $firstname
     *
     * @return Panier
     */
    public function setFirstname($firstname)
    {
        $this->firstname = $firstname;

        return $this;
    }

    /**
     * Get firstname
     *
     * @return string
     */
    public function getFirstname()
    {
        return $this->firstname;
    }

    /**
     * Set lastname
     *
     * @param string $lastname
     *
     * @return Panier
     */
    public function setLastname($lastname)
    {
        $this->lastname = $lastname;

        return $this;
    }

    /**
     * Get lastname
     *
     * @return string
     */
    public function getLastname()
    {
        return $this->lastname;
    }

    /**
     * Set datecommande
     *
     * @param \DateTime $datecommande
     *
     * @return Panier
     */
    public function setDatecommande($datecommande)
    {
        $this->datecommande = $datecommande;

        return $this;
    }

    /**
     * Get datecommande
     *
     * @return \DateTime
     */
    public function getDatecommande()
    {
        return $this->datecommande;
    }

    /**
     * Add lignespanier
     *
     * @param \FelixBundle\Entity\Lignepanier $lignespanier
     *
     * @return Panier
     */
    public function addLignespanier(\FelixBundle\Entity\Lignepanier $lignespanier)
    {
        $this->lignespanier[] = $lignespanier;

        return $this;
    }

    /**
     * Remove lignespanier
     *
     * @param \FelixBundle\Entity\Lignepanier $lignespanier
     */
    public function removeLignespanier(\FelixBundle\Entity\Lignepanier $lignespanier)
    {
        $this->lignespanier->removeElement($lignespanier);
    }

    /**
     * Get lignespanier
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getLignespanier()
    {
        return $this->lignespanier;
    }
}
