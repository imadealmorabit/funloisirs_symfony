<?php

namespace Ecommerce\EcommerceBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Ecommerce\EcommerceBundle\Entity\UtilisateursAdresses;
use Ecommerce\EcommerceBundle\Form\UtilisateursAdressesType;

class PanierController extends Controller
{
    public function menuAction(Request $request)
    {
        $session = $request->getSession();

        if (!$session->has('panier')) {
            $articles = 0;
        } else {
            $articles = count($session->get('panier'));
        }

        return $this->render('EcommerceBundle:Default/panier/modulesUsed:panier.html.twig',
                array('articles' => $articles));
    }

    public function supprimerAction($id, Request $request)
    {
        $session = $request->getSession();
        $panier = $session->get('panier');
        if (array_key_exists($id, $panier)) {
            unset($panier[$id]);
            $session->set('panier', $panier);
            $session->getFlashBag()->add('success', 'Carte supprimee avec succes');
        }

        return $this->redirectToRoute('panier');
    }

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

            $session->getFlashBag()->add('success', 'Carte ajoutee avec succes');
        }
        $session->set('panier', $panier);

        return $this->redirectToRoute('panier');
    }

    public function panierAction(Request $request)
    {
        $session = $request->getSession();

        if (!$session->has('panier')) {
            $session->set('panier', array());
        }

        $em = $this->getDoctrine()->getManager();
        $produits = $em->getRepository('EcommerceBundle:Produits')->findArray(array_keys($session->get('panier')));

        return $this->render('EcommerceBundle:Default/panier/layout:panier.html.twig',
                array('produits' => $produits, 'panier' => $session->get('panier')));
    }

    public function adresseSuppressionAction($id)
    {
        $em = $this->getDoctrine()->getManager();
        $entity = $em->getRepository('EcommerceBundle:UtilisateursAdresses')->find($id);

        if ($this->getUser() != $entity->getUtilisateur() || !$entity) {
            return $this->redirect($this->generateUrl('livraison'));
        }

        $em->remove($entity);
        $em->flush();

        return $this->redirect($this->generateUrl('livraison'));
    }

    public function livraisonAction(Request $request)
    {
        $utilisateur = $this->getUser();
        //var_dump($utilisateur);
        //die();
        $entity = new UtilisateursAdresses();
        $form = $this->createForm(UtilisateursAdressesType::class, $entity);

        if ($request->isMethod('POST')) {
            $form->handleRequest($request);
            if ($form->isValid()) {
                $em = $this->getDoctrine()->getManager();
                $entity->setUtilisateur($utilisateur);
                $em->persist($entity);
                $em->flush();

                return $this->redirect($this->generateUrl('livraison'));
            }
        }

        return $this->render('EcommerceBundle:Default/panier/layout:livraison.html.twig', array('utilisateur' => $utilisateur, 'form' => $form->createView()));
    }

    public function validationAction()
    {
        return $this->render('EcommerceBundle:Default/panier/layout:validation.html.twig');
    }
}
