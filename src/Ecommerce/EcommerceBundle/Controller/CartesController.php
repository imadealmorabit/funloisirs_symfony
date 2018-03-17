<?php

namespace Ecommerce\EcommerceBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Ecommerce\EcommerceBundle\Entity\Groupe;
use Ecommerce\EcommerceBundle\Form\GroupeType;

class CartesController extends Controller
{
    public function cartesAction()
    {
        return $this->render('EcommerceBundle:Default/cartes/layout:cartes.html.twig');
    }

    public function presentationAction($id, Request $request)
    {
        $session = $request->getSession();
        $em = $this->getDoctrine()->getManager();
        $produit = $em->getRepository('EcommerceBundle:Produits')->find($id);

        if ($session->has('panier')) {
            $panier = $session->get('panier');
        }

        $panier = false;

        if (!$produit) {
            throw $this->createNotFoundException("la page n'existe pas. ");
        }

        return $this->render('EcommerceBundle:Default/produits/layout:presentation.html.twig',
                array('produit' => $produit, 'panier' => $panier));
    }

    public function membreAction()
    {
        $form = $this->createForm(GroupeType::class, new Groupe());

        return $this->render('EcommerceBundle:Default/membre/modulesUsed:membre.html.twig',
         array('form' => $form->createView()));
    }

    public function membreTraitementAction(Request $request)
    {
        $form = $this->createForm(GroupeType::class, new Groupe());
        if ($request->isMethod('POST') && $form->handleRequest($request)->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $groupe = $em->getRepository('EcommerceBundle:Groupe')->findOneBy(array('code' => $form['code']->getData()));
            //var_dump($groupe);
            //die();
        }
        if ($groupe == null) {
            throw $this->createNotFoundException('Code invalide. ');
        }

        return $this->render('EcommerceBundle:Default/cartes/layout:cartes.html.twig', array('groupe' => $groupe));
    }
}
