<?php

namespace Ecommerce\EcommerceBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Groupe
 *
 * @ORM\Table(name="groupe")
 * @ORM\Entity(repositoryClass="Ecommerce\EcommerceBundle\Repository\GroupeRepository")
 */
class Groupe
{
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
     * @ORM\Column(name="nom", type="string", length=255)
     */
    private $nom;

    /**
     * @var string
     *
     * @ORM\Column(name="code", type="string", length=255)
     */
    private $code;

    /**
     * @var string
     *
     * @ORM\Column(name="type_groupe", type="string", length=255)
     */
    private $typeGroupe;

    /**
     * @var string
     *
     * @ORM\Column(name="type_adhesion", type="array")
     */
    private $typeAdhesion;

    /**
     * @ORM\ManyToOne(targetEntity="Ecommerce\EcommerceBundle\Entity\Ports", cascade={"persist","remove"})
     */
    private $port;


    /**
     * Get id
     *
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set nom
     *
     * @param string $nom
     *
     * @return Groupe
     */
    public function setNom($nom)
    {
        $this->nom = $nom;

        return $this;
    }

    /**
     * Get nom
     *
     * @return string
     */
    public function getNom()
    {
        return $this->nom;
    }

    /**
     * Set code
     *
     * @param string $code
     *
     * @return Groupe
     */
    public function setCode($code)
    {
        $this->code = $code;

        return $this;
    }

    /**
     * Get code
     *
     * @return string
     */
    public function getCode()
    {
        return $this->code;
    }

    /**
     * Set typeGroupe
     *
     * @param string $typeGroupe
     *
     * @return Groupe
     */
    public function setTypeGroupe($typeGroupe)
    {
        $this->typeGroupe = $typeGroupe;

        return $this;
    }

    /**
     * Get typeGroupe
     *
     * @return string
     */
    public function getTypeGroupe()
    {
        return $this->typeGroupe;
    }

    

    /**
     * Set port
     *
     * @param \Ecommerce\EcommerceBundle\Entity\Ports $port
     *
     * @return Groupe
     */
    public function setPort(\Ecommerce\EcommerceBundle\Entity\Ports $port)
    {
        $this->port = $port;

        return $this;
    }

    /**
     * Get port
     *
     * @return \Ecommerce\EcommerceBundle\Entity\Ports
     */
    public function getPort()
    {
        return $this->port;
    }

    /**
     * Set typeAdhesion
     *
     * @param array $typeAdhesion
     *
     * @return Groupe
     */
    public function setTypeAdhesion($typeAdhesion)
    {
        $this->typeAdhesion = $typeAdhesion;

        return $this;
    }

    /**
     * Get typeAdhesion
     *
     * @return array
     */
    public function getTypeAdhesion()
    {
        return $this->typeAdhesion;
    }
}
