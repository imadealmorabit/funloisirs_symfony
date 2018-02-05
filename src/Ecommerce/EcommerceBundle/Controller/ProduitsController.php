<?php

namespace Ecommerce\EcommerceBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class ProduitsController extends Controller
{
	public function categorieAction($categorie)
    {
        $em = $this->getDoctrine()->getManager();
        $produits = $em->getRepository('EcommerceBundle:Produits')->byCategorie($categorie);
        
        return $this->render('EcommerceBundle:Default:produits/layout/produits.html.twig', array('produits' => $produits));
    }
    
    public function produitsAction()
    {
        return $this->render('EcommerceBundle:Default/produits/layout:produits.html.twig');
    }

    public function presentationAction()
    {
        return $this->render('EcommerceBundle:Default/produits/layout:presentation.html.twig');
    }
}