<?php


namespace locvoitBundle\Controller;

use locvoitBundle\Entity\Voiture;
use locvoitBundle\Form\VoitureForm;
use symfony\Component\HttpFondation\Response;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class VoitureController extends Controller
{
    public function listAction()
    {
        $em = $this->container->get('doctrine')->getEntityManager();
        $Voitures = $em->getRepository('locvoitBundle:Voiture')->findALL();
        return $this->render('@locvoit/Voiture/list.html.twig',
            array('voitures' => $Voitures
            ));
    }

    public function addAction(Request $request)
    {
        $Voiture = new Voiture();
        $form = $this->createForm(VoitureForm::class, $Voiture);
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($Voiture);
            $em->flush();
            return $this->redirect($this->generateUrl("affichage_voiture"));
        }

        return $this->render('@locvoit/Voiture/add.html.twig', array(
            'Form' => $form->createView()
        ));
    }
    public function deleteAction(Request $request ,$mat)
    {$em = $this->getDoctrine()->getManager();
        $voiture=$em->getRepository('locvoitBundle:Voiture')->find($mat);
        if ($voiture!==null)
        {
            $em->remove($voiture);
            $em->flush();
        }
        else
        {
            throw new NotFoundHttpException("matricule n'existe pas");
        }
        return $this->redirectToRoute("affichage_voiture");
    }
    public function rechercheAction(Request $request){
        $em = $this->container->get('doctrine')->getEntityManager();
        $voitures=$em->getRepository('locvoitBundle:Voiture')->findALL();
        if ($request->getMethod("POST")){
            $motcle=$request->get('input_recherche');
            $query=$em->createQuery(
                "Select m FROM locvoitBundle:Voiture m WHERE m.mat LIKE '".$motcle."%'"
            );
            $voitures=$query->getResult();

        }
        return $this->render('@locvoit/Voiture/rechercheVoiture.html.twig',
            array('voitures'=>$voitures));
    }
    public function modAction(Request $request){
        $em = $this->container->get('doctrine')->getEntityManager();
        $voitures=$em->getRepository('locvoitBundle:Voiture')->findALL();
        if ($request->getMethod("POST")){
            $motcle=$request->get('mat');
            $motclee=$request->get('disponiblite');
            $motcleee=$request->get('prix');
            $query=$em->createQuery(
                "Update locvoitBundle:Voiture m Set  m.disponiblite ='$motclee',
                 m.prix ='$motcleee'
                  WHERE m.mat ='$motcle' "
            );
            $voitures=$query->getResult();

        }
        return $this->render('@locvoit/Voiture/mod.html.twig',
            array('voitures'=>$voitures));
    }
}