<?php

namespace Ecommerce\EcommerceBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class ProduitsController extends Controller
{
    public function indexAction()
    {
        return $this->render('EcommerceBundle:Default:index.html.twig');
    }
}