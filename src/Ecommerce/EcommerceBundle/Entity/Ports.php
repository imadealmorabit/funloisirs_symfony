<?php

namespace Ecommerce\EcommerceBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Ports
 *
 * @ORM\Table(name="ports")
 * @ORM\Entity(repositoryClass="Ecommerce\EcommerceBundle\Repository\PortsRepository")
 */
class Ports
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
     * @ORM\Column(name="type_envoi", type="text")
     */
    private $typeEnvoi;

    /**
     * @var float
     *
     * @ORM\Column(name="poid_min", type="float")
     */
    private $poidMin;

    /**
     * @var float
     *
     * @ORM\Column(name="poid_max", type="float")
     */
    private $poidMax;

    /**
     * @var float
     *
     * @ORM\Column(name="prix", type="float")
     */
    private $prix;


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
     * Set typeEnvoi
     *
     * @param string $typeEnvoi
     *
     * @return Ports
     */
    public function setTypeEnvoi($typeEnvoi)
    {
        $this->typeEnvoi = $typeEnvoi;

        return $this;
    }

    /**
     * Get typeEnvoi
     *
     * @return string
     */
    public function getTypeEnvoi()
    {
        return $this->typeEnvoi;
    }

    /**
     * Set poidMin
     *
     * @param float $poidMin
     *
     * @return Ports
     */
    public function setPoidMin($poidMin)
    {
        $this->poidMin = $poidMin;

        return $this;
    }

    /**
     * Get poidMin
     *
     * @return float
     */
    public function getPoidMin()
    {
        return $this->poidMin;
    }

    /**
     * Set poidMax
     *
     * @param float $poidMax
     *
     * @return Ports
     */
    public function setPoidMax($poidMax)
    {
        $this->poidMax = $poidMax;

        return $this;
    }

    /**
     * Get poidMax
     *
     * @return float
     */
    public function getPoidMax()
    {
        return $this->poidMax;
    }

    /**
     * Set prix
     *
     * @param float $prix
     *
     * @return Ports
     */
    public function setPrix($prix)
    {
        $this->prix = $prix;

        return $this;
    }

    /**
     * Get prix
     *
     * @return float
     */
    public function getPrix()
    {
        return $this->prix;
    }
}

