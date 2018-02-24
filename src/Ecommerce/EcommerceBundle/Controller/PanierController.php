<?php

namespace Ecommerce\EcommerceBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class PanierController extends Controller
{
    public function ajouterAction($id, Request $request)
    {
        $session = $request->getSession();

        if (!$session->has('panier')) {
            $session->set('panier', array());
        }

        $panier = $session->get('panier');

        if (array_key_exists($id, $panier)) {
            if ($request->query->get('qte') != null) {
                $panier[$id] = $request->query->get('qte');
            }
            $session->getFlashBag()->add('success', 'Quantite modifiee avec succes');
        } else {
            if ($request->query->get('qte') != null) {
                $panier[$id] = $request->query->get('qte');
            } else {
                $panier[$id] = 1;
            }

            $session->getFlashBag()->add('success', 'Article ajoute avec succes');
        }
        $session->set('panier', $panier);

        return $this->redirectToRoute('panier');
    }

    public function panierAction()
    {
        return $this->render('EcommerceBundle:Default/panier/layout:panier.html.twig');
    }

    public function livraisonAction()
    {
        return $this->render('EcommerceBundle:Default/panier/layout:livraison.html.twig');
    }

    public function validationAction()
    {
        return $this->render('EcommerceBundle:Default/panier/layout:validation.html.twig');
    }
}
