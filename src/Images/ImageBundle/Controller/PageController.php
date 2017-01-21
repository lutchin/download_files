<?php

namespace Images\ImageBundle\Controller;

use Images\ImageBundle\Entity\User;
use Symfony\Component\HttpFoundation\Session\Session;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\File\File;
use Symfony\Component\HttpFoundation\Request;
use Images\ImageBundle\Entity\Upload;
use Images\ImageBundle\Form\UpdateType;
use Symfony\Component\HttpFoundation\Session\Storage\NativeSessionStorage;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;


class PageController extends Controller
{

    /**
     * @Route("/", name="_home_page")
     */
    public function indexAction(Request $request)
    {

        $upload = new Upload();
        $form = $this->createForm(UpdateType::class, $upload);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {

            /** @var Symfony\Component\HttpFoundation\File\UploadedFile $file */
            $file = $upload->getImageFile();

            // Generate a unique name for the file before saving it
            $fileName = $this->get('app.brochure_uploader')->upload($file);

            $upload->setImageFile($fileName);
            $user = $this->get('security.context')->getToken()->getUser();
            $userName = $user->getUserName();
            $upload->setUser( $userName );

           // ... persist the $product variable or any other work
            $em = $this->getDoctrine()->getManager();
            $em->persist($upload);
            $em->flush();


            return $this->redirect($this->generateUrl('_home_page'));
        }

        $file = $this->getDoctrine()
        ->getRepository('ImagesImageBundle:Upload')
        ->findAll();

        $files = array_reverse($file);


        return $this->render('ImagesImageBundle:Page:index.html.twig', array(
            'form' => $form->createView(),
            'files' => $files
        ));


    }


    /**
     * @Route("/{imageFile}", name="_file", requirements={"page": "\d+"})
     */
    public function fileAction($imageFile)
    {

        return $this->render('ImagesImageBundle:Page:file.html.twig', array(
            'file'      => $imageFile,
        ));
    }


}