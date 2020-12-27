<?php


namespace locvoitBundle\Controller;
use locvoitBundle\Entity\Client;
use locvoitBundle\Entity\Location;
use locvoitBundle\Entity\Voiture;
use locvoitBundle\Form\LocationForm;
use symfony\Component\HttpFondation\Response;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;


class LocationController extends Controller
{
    public function listAction()
    {
        $em = $this->container->get('doctrine')->getEntityManager();

        $Locations = $em->getRepository('locvoitBundle:Location')->findALL();
        return $this->render('@locvoit/Location/list.html.twig',
            array('locations' => $Locations
            ));
    }
    public function addAction(Request $request)
    {
        $Location= new Location();
        $form=$this->createForm(LocationForm::class, $Location);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid())
        {
            $client=new Client();
            $voiture=new Voiture();
            $em=$this->getDoctrine()->getManager();
            $client = $em->getRepository(Client::class)->find(2);
            $Location->setId($client);
            $voiture = $em->getRepository(Voiture::class)->find(224);
            $Location->setMat($voiture);
            $em->persist($Location);
            $em->flush();
            return $this->redirect($this->generateUrl("affichage_location"));
        }

        return $this->render('@locvoit/Location/add.html.twig', array(
            'Form'=>$form->createView()
        ));
    }
    public function deleteAction(Request $request ,$idl)
    {$em = $this->getDoctrine()->getManager();
        $location=$em->getRepository('locvoitBundle:Location')->find($idl);
        if ($location!==null)
        {
            $em->remove($location);
            $em->flush();
        }
        else
        {
            throw new NotFoundHttpException("location n'existe pas");
        }
        return $this->redirectToRoute("affichage_location");
    }
    public function rechercheAction(Request $request){
        $em = $this->container->get('doctrine')->getEntityManager();
        $locations=$em->getRepository('locvoitBundle:Location')->findALL();
        if ($request->getMethod("POST")){
            $motcle=$request->get('input_recherche');
            $query=$em->createQuery(
                "Select m FROM locvoitBundle:Location m WHERE m.idl LIKE '".$motcle."%'"
            );
            $locations=$query->getResult();

        }
        return $this->render('@locvoit/Location/rechercheLocation.html.twig',
            array('locations'=>$locations));
    }
    public function modAction(Request $request){
        $em = $this->container->get('doctrine')->getEntityManager();
        $locations=$em->getRepository('locvoitBundle:Location')->findALL();
        if ($request->getMethod("POST")){
            $motcle=$request->get('idl');
            $duree=$request->get('duree');
            $datedebut=$request->get('datedebut');
            $datefin=$request->get('datefin');
            $id=$request->get('client');
            $mat=$request->get('voiture');
            $query=$em->createQuery(
                "Update locvoitBundle:Location k Set k.duree= '$duree',
                 k.datedebut ='$datedebut',
                 k.datefin ='$datefin',
                 k.id ='$id',
                 k.mat ='$mat'
                  WHERE k.idl = '$motcle' "
            );
            $locations=$query->getResult();

        }
        return $this->render('@locvoit/Location/mod.html.twig',
            array('locations'=>$locations));
    }

}
