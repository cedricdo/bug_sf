<?php

namespace App\Controller;

use App\Form\CertificationType;
use App\Repository\CertificationRepository;
use Doctrine\ORM\EntityManagerInterface;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class DummyController extends Controller
{
    /**
     * @Route(name="dummy_dummy", path="/")
     */
    public function dummy(Request $request, CertificationRepository $repository, EntityManagerInterface $em)
    {
        $certification = $repository->find(103);
        $form = $this->createForm(CertificationType::class, $certification);
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $em->persist($certification);
            $em->flush();
            return $this->redirectToRoute('dummy_dummy');
        }
        return $this->render('bug.html.twig', ['form' => $form->createView()]);
    }
}
