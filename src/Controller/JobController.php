<?php
namespace App\Controller;

use App\Entity\Category;
use App\Entity\Job;
use DateTime;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Doctrine\ORM\Tools\Pagination\Paginator;

class JobController extends AbstractController
{
    public function index()
    {
		return $this->render('job/index.html.twig');	
    }
	
	public function home(){
		return $this->render('job/home.html.twig');
	}
	
	public function profile(EntityManagerInterface $em){
		$jobs = $em->getRepository(Job::class)->findAll();

        return $this->render('job/profils.html.twig', [
            'jobs' => $jobs,
        ]);
	}	
	
	public function register(){
		 return $this->render('job/registration.html.twig');
	}	
	
    public function show(EntityManagerInterface $em, int $id, string $company, string $location, string $position) : Response
    {
        // dans un projet réel, il sera nécessaire de faire une requête permettant de vérifier que tous les éléments
        // correspondent à une offre d'emploi valide
        $job = $em->getRepository(Job::class)->find($id);
        if (null === $job) {
            throw new NotFoundHttpException();
        }

        $currentDate = new DateTime();		
      
        return $this->render('job/show.html.twig', [
            'job' => $job,
        ]);
    }
}
