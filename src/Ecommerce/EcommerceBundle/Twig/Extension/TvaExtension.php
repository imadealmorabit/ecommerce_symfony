<?php

namespace Ecommerce\EcommerceBundle\Ttc_twig;

use Ecommerce\EcommerceBundle\Entity\Produits;

class Ttc extends \Twig_Extension
{
    public function PrixTtc(Produits $produits)
  { 
    return $produits->getTva();
  }
  
  public function getFunctions()
  {
    return array(
      new \Twig_SimpleFunction('Ttc', array($this, 'PrixTtc')),
    );
  }

  // La méthode getName() identifie votre extension Twig, elle est obligatoire
  public function getName()
  {
    return 'Twig_ttc';
  }
}





namespace Ecommerce\EcommerceBundle\Twig\Extension;

class TvaExtension extends \Twig_Extension
{
    public function getFilters()
  {
    return array(
      new \Twig_SimpleFilter('tva', array($this, 'calculTva')),
    );
  }
  
  function calculTva($prixHT, $tva)
  { 
    return round($prixHT / $tva, 2) ;
  }
}

