<?php

namespace Ecommerce\EcommerceBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Ecommerce\EcommerceBundle\Entity\Produits;
use Ecommerce\EcommerceBundle\Form\RechercheType;

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
        $em = $this->getDoctrine()->getManager();
        $produits = $em->getRepository('EcommerceBundle:Produits')->findAll();

        return $this->render('EcommerceBundle:Default:produits/layout/produits.html.twig', array('produits' => $produits));
    }

    public function presentationAction($id)
    {
        $em = $this->getDoctrine()->getManager();
        $produit = $em->getRepository('EcommerceBundle:Produits')->find($id);

        return $this->render('EcommerceBundle:Default:produits/layout/presentation.html.twig', array('produit' => $produit));
    }

    public function rechercheAction()
    {
        $form = $this->createForm(RechercheType::class, new Produits());

        return $this->render('EcommerceBundle:Default/recherche/modulesUsed:recherche.html.twig',
         array('form' => $form->createView()));
    }

    public function rechercheTraitementAction(Request $request)
    {
        $form = $this->createForm(RechercheType::class, new Produits());
        if ($request->isMethod('POST') && $form->handleRequest($request)->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $produits = $em->getRepository('EcommerceBundle:Produits')->recherche($form['nom']->getData());
            //var_dump($produits);
            //die();
        } else {
            throw $this->createNotFoundException("la page n'existe pas. ");
        }

        return $this->render('EcommerceBundle:Default/produits/layout:presentation_recherche.html.twig',
          array('produits' => $produits));
    }
}
