<?php

namespace Ecommerce\EcommerceBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Ecommerce\EcommerceBundle\Entity\Produits;
use Ecommerce\EcommerceBundle\Form\ProduitsType;
use Ecommerce\EcommerceBundle\Form\RechercheType;
use Symfony\Component\HttpFoundation\Request;

class ProduitsController extends Controller
{
    public function produitsAction(Request $request)
    {
        $session = $request->getSession();
        $em = $this->getDoctrine()->getManager();
        if($session->has('panier'))
            
            $panier = $session->get('panier');
        else
            
            $panier = false;
            
        $produits = $em->getRepository('EcommerceBundle:Produits')->findWithMedia();
        return $this->render('EcommerceBundle:Default/produits/layout:produits.html.twig', 
                array('produits' => $produits, 'panier' => $panier));
    }
    
    
    public function presentationAction($id, Request $request)
    {
        $session = $request->getSession();
         $em = $this->getDoctrine()->getManager();
        $produit = $em->getRepository('EcommerceBundle:Produits')->find($id);
        
         if($session->has('panier'))
            
            $panier = $session->get('panier');
        else
            
            $panier = false;
        
        if(!$produit) throw $this->createNotFoundException("la page n'existe pas. "); 
        
        return $this->render('EcommerceBundle:Default/produits/layout:presentation.html.twig', 
                array('produit' => $produit, 'panier' => $panier));
    }
     public function categorieAction($categorie)
    {
        //var_dump($categorie);
        $em = $this->getDoctrine()->getManager();
        $produits = $em->getRepository('EcommerceBundle:Produits')->findByCategorie($categorie);
        
        $categorie = $em->getRepository('EcommerceBundle:Categories')->find($categorie);
        if(!$categorie) throw $this->createNotFoundException("la page n'existe pas. "); 
        
        return $this->render('EcommerceBundle:Default/produits/layout:produits.html.twig', 
                array('produits' => $produits));
    }
    
    
    
    public function rechercheAction()
    {
         $form = $this->createForm(ProduitsType::class, new Produits());
         return $this->render('EcommerceBundle:Default/recherche/modulesUsed:recherche.html.twig', 
         array('form' => $form->createView()));   
    }

    public function rechercheTraitementAction(Request $request)
    {
        $form = $this->createForm(ProduitsType::class, new Produits());
        if ($request->isMethod('POST') && $form->handleRequest($request)->isValid())
        {
         $em = $this->getDoctrine()->getManager();
        $produits = $em->getRepository('EcommerceBundle:Produits')->recherche($form['nom']->getData());
         }
 else {
       throw $this->createNotFoundException("la page n'existe pas. "); 
 }
         
        return $this->render('EcommerceBundle:Default/produits/layout:produits.html.twig', 
          array('produits' => $produits));
       
    }
    
}
