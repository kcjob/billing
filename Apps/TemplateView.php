<?php
namespace Apps;

class TemplateView {
    private $twig;

    public function __construct()
    {
      $loader = new \Twig_Loader_Filesystem('Templates');
      $this->twig = new \Twig_Environment($loader, array('debug' => true));
      return  $this-> twig;
    }
    public function generateView($templateData)
    {
      //----- split out each msg object
      foreach($templateData as $msgDataObject){
        echo $this->twig->render('messagebody.html.twig', array( 'dataObject'=>$msgDataObject));
        //return $this->twig->render('messagebody.html.twig', rray( 'dataObject'=>$msgDataObject));
      }
    }
}
