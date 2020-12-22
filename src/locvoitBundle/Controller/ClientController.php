<?php


namespace locvoitBundle\Controller;
use locvoitBundle\Entity\Client;
use locvoitBundle\Form\ClientForm;
use symfony\Component\HttpFondation\Response;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class ClientController extends Controller
{
    public function listAction()
    {
        $em = $this->container->get('doctrine')->getEntityManager();
        $Clients = $em->getRepository('locvoitBundle:Client')->findALL();
        return $this->render('@locvoit/Client/list.html.twig',
            array('clients' => $Clients
            ));
    }
    public function addAction(Request $request)
    {   $Client= new Client();
    $form=$this->createForm(ClientForm::class, $Client);
    $form->handleRequest($request);
    if ($form->isSubmitted() && $form->isValid())
        {
            $em=$this->getDoctrine()->getManager();
            $em->persist($Client);
            $em->flush();
            return $this->redirect($this->generateUrl("affichage_client"));
        }

        return $this->render('@locvoit/Client/add.html.twig', array(
            'Form'=>$form->createView()
        ));
    }
    public function deleteAction(Request $request ,$id)
    {$em = $this->getDoctrine()->getManager();
    $client=$em->getRepository('locvoitBundle:Client')->find($id);
    if ($client!==null)
    {
        $em->remove($client);
        $em->flush();
    }
    else
    {
        throw new NotFoundHttpException("id n'existe pas");
    }
        return $this->redirectToRoute("affichage_client");
    }
    public function rechercheAction(Request $request){
        $em = $this->container->get('doctrine')->getEntityManager();
        $clients=$em->getRepository('locvoitBundle:Client')->findALL();
        if ($request->getMethod("POST")){
            $motcle=$request->get('input_recherche');
            $query=$em->createQuery(
                "Select m FROM locvoitBundle:Client m WHERE m.id LIKE '".$motcle."%'"
            );
            $clients=$query->getResult();

        }
        return $this->render('@locvoit/Client/rechercheClient.html.twig',
        array('clients'=>$clients));
    }
}
