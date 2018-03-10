<?php

namespace Ecommerce\EcommerceBundle\Services;

class GetReference
{
    public function __construct($entityManager)
    {
        $this->em = $entityManager;
    }

    public function reference()
    {
        $reference = $this->em->getRepository('EcommerceBundle:Commandes')->findOneBy(array('valider' => 1), array('id' => 'DESC'), 1, 1);

        if (!$reference) {
            return 1;
        } else {
            return $reference->getReference() + 1;
        }
    }
}
