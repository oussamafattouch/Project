<?php


namespace locvoitBundle\Controller;
 use locvoitBundle\Entity\Manager;
 use locvoitBundle\Form\ManagerForm;
 use symfony\Component\HttpFondation\Response;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
 use Symfony\Component\HttpFoundation\Request;
 use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

 class ManagerController extends Controller
{
    public function listAction()
    {
        $em = $this->container->get('doctrine')->getEntityManager();
        $Managers = $em->getRepository('locvoitBundle:Manager')->findALL();
        return $this->render('@locvoit/Manager/list.html.twig',
            array('managers' => $Managers
            ));
    }

     public function addAction(Request $request)
     {
         $Manager = new Manager();
         $form = $this->createForm(ManagerForm::class, $Manager);
         $form->handleRequest($request);
         if ($form->isSubmitted() && $form->isValid()) {
             $em = $this->getDoctrine()->getManager();
             $em->persist($Manager);
             $em->flush();
             return $this->redirect($this->generateUrl("affichage_manager"));
         }

         return $this->render('@locvoit/Manager/add.html.twig', array(
             'Form' => $form->createView()
         ));
     }
     public function deleteAction(Request $request ,$idm)
     {$em = $this->getDoctrine()->getManager();
         $manager=$em->getRepository('locvoitBundle:Manager')->find($idm);
         if ($manager!==null)
         {
             $em->remove($manager);
             $em->flush();
         }
         else
         {
             throw new NotFoundHttpException("manager n'existe pas");
         }
         return $this->redirectToRoute("affichage_manager");
     }
     public function rechercheAction(Request $request){
         $em = $this->container->get('doctrine')->getEntityManager();
         $managers=$em->getRepository('locvoitBundle:Manager')->findALL();
         if ($request->getMethod("POST")){
             $motcle=$request->get('input_recherche');
             $query=$em->createQuery(
                 "Select m FROM locvoitBundle:Manager m WHERE m.idm LIKE '".$motcle."%'"
             );
             $managers=$query->getResult();

         }
         return $this->render('@locvoit/Manager/rechercheManager.html.twig',
             array('managers'=>$managers));
     }
     public function modAction(Request $request){
         $em = $this->container->get('doctrine')->getEntityManager();
         $managers=$em->getRepository('locvoitBundle:Manager')->findALL();
         if ($request->getMethod("POST")){
             $motcle=$request->get('idm');
             $motclee=$request->get('Nom');
             $mot=$request->get('Prenom');

             $query=$em->createQuery(
                 "Update locvoitBundle:Manager k Set k.Nom= '$motclee',
                  k.Prenom ='$mot'
                  WHERE k.idm = '$motcle' "
             );
             $managers=$query->getResult();

         }
         return $this->render('@locvoit/Manager/mod.html.twig',
             array('managers'=>$managers));
     }

 }