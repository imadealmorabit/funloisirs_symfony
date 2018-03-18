<?php

namespace Ecommerce\EcommerceBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Ecommerce\EcommerceBundle\Entity\Groupe;
use Ecommerce\EcommerceBundle\Form\GroupeType;

class CartesController extends Controller
{
    public function ajouterCarteAction($id, Request $request)
    {
        $session = $request->getSession();

        if (!$session->has('carte')) {
            $session->set('carte', array());
        }

        $carte = $session->get('carte');

    
            if (($request->query->get('qte') != null) && ($request->query->get('typeCart') != null)){
                $carte['qte'] = $request->query->get('qte');
                $carte['type_carte'] = $request->query->get('typeCart');
                $carte['groupe_id'] = $id;
                $session->getFlashBag()->add('success', 'Carte ajoutee avec succes');
            }
           
         else 

            $session->getFlashBag()->add('success', 'Veuillez saisir les parametres');
        
        $session->set('carte', $carte);

        return $this->render('EcommerceBundle:Default/cartes/layout:ajout_cartes.html.twig',
         array('carte' => $carte));
        
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
