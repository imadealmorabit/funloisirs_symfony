<?php

namespace Ecommerce\EcommerceBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Participations
 *
 * @ORM\Table(name="participations")
 * @ORM\Entity(repositoryClass="Ecommerce\EcommerceBundle\Repository\ParticipationsRepository")
 */
class Participations
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
     * @ORM\Column(name="ce", type="text")
     */
    private $ce;

    /**
     * @var float
     *
     * @ORM\Column(name="participation", type="float")
     */
    private $participation;

    /**
     * @var int
     *
     * @ORM\Column(name="qte_max_pers", type="integer")
     */
    private $qteMaxPers;


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
     * Set ce
     *
     * @param string $ce
     *
     * @return Participations
     */
    public function setCe($ce)
    {
        $this->ce = $ce;

        return $this;
    }

    /**
     * Get ce
     *
     * @return string
     */
    public function getCe()
    {
        return $this->ce;
    }

    /**
     * Set participation
     *
     * @param float $participation
     *
     * @return Participations
     */
    public function setParticipation($participation)
    {
        $this->participation = $participation;

        return $this;
    }

    /**
     * Get participation
     *
     * @return float
     */
    public function getParticipation()
    {
        return $this->participation;
    }

    /**
     * Set qteMaxPers
     *
     * @param integer $qteMaxPers
     *
     * @return Participations
     */
    public function setQteMaxPers($qteMaxPers)
    {
        $this->qteMaxPers = $qteMaxPers;

        return $this;
    }

    /**
     * Get qteMaxPers
     *
     * @return int
     */
    public function getQteMaxPers()
    {
        return $this->qteMaxPers;
    }
}

