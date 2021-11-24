<?php

namespace App\Controller;

use App\Entity\LoteryRegistration;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class LoteryContollerController extends AbstractController
{
    #[Route('/', name: 'lotery_contoller')]
    public function index(): Response
    {
       return $this->render('lotery_contoller/index.html.twig', [
        'controller_name' => 'LoteryContollerController',
       ]);
    }

    #[Route('/taisykles', name: 'lotery_rules')]
    public function rules(): Response
    {
        return $this->render('lotery_contoller/rules.html.twig', [
            'controller_name' => 'LoteryContollerController',
        ]);
    }

    #[Route('/laimetojai', name: 'lotery_winers')]
    public function winners(): Response
    {
        return $this->render('lotery_contoller/winers.html.twig', [
            'controller_name' => 'LoteryContollerController',
        ]);
    }

    #[Route('/register', name: 'lotery_register')]
    public function register(Request $request)
    {
        if ($request->isMethod('POST')){

            if ($this->checkExists($request->request->get('checknr')) == true){
                return $this->render('lotery_contoller/index.html.twig', [
                    'result' => 'exists',
                ]);
            }else{
                $entityManager = $this->getDoctrine()->getManager();

                $ticket = new LoteryRegistration();
                $ticket->setName($request->request->get('name'));
                $ticket->setEmail($request->request->get('email'));
                $ticket->setPhone($request->request->get('tel'));
                $ticket->setCheckNr($request->request->get('checknr'));

                if ($request->request->get('newsletter') == null) {
                    $ticket->setNewsletter(false);
                }else {
                    $ticket->setNewsletter($request->request->get('newsletter'));
                }

                $ticket->setGameName("Christmas Game 2021");
                $ticket->setDateAdd();

                $entityManager->persist($ticket);
                $entityManager->flush($ticket);

                return $this->render('lotery_contoller/index.html.twig', [
                    'result' => 'added',
                    'name' => $request->request->get('name'),
                ]);
            }

        }else {
        return $this->render('lotery_contoller/index.html.twig', [
            'result' => 'not',
        ]);
    }

    }

    public function checkExists($checkNo) {
        $exists = $this->getDoctrine()
            ->getRepository(LoteryRegistration::class)
            ->findOneBy(array('check_nr' => $checkNo));
        if ($exists !== null){
            return true;
        }else {
            return false;
        }
    }

}
