<?php

namespace Ecommerce\EcommerceBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Ecommerce\EcommerceBundle\Entity\Produits;
use Ecommerce\EcommerceBundle\Entity\Categories;
use Ecommerce\EcommerceBundle\Form\RechercheType;

class ProduitsController extends Controller
{
    public function produitsAction(Request $request, Categories $categorie = null)
    {
        $session = $request->getSession();
        $em = $this->getDoctrine()->getManager();

        if ($categorie != null) {
            $produits = $em->getRepository('EcommerceBundle:Produits')->byCategorie($categorie);
        } else {
            $produits = $em->getRepository('EcommerceBundle:Produits')->findBy(array('disponible' => 1));
        }

        if ($session->has('panier')) {
            $panier = $session->get('panier');
        } else {
            $panier = false;
        }

        return $this->render('EcommerceBundle:Default/produits/layout:produits.html.twig',
                array('produits' => $produits, 'panier' => $panier));
    }

    public function presentationAction($id, Request $request)
    {
        $session = $request->getSession();
        $em = $this->getDoctrine()->getManager();
        $produit = $em->getRepository('EcommerceBundle:Produits')->find($id);

        if ($session->has('panier')) {
            $panier = $session->get('panier');
        } else {
            $panier = false;
        }

        if (!$produit) {
            throw $this->createNotFoundException("la page n'existe pas. ");
        }

        return $this->render('EcommerceBundle:Default/produits/layout:presentation.html.twig',
                array('produit' => $produit, 'panier' => $panier));
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
