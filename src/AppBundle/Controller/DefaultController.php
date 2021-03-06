<?php

namespace AppBundle\Controller;

use AppBundle\Entity\ManifestoPoint;
use AppBundle\Entity\Member;
use AppBundle\Entity\Project;
use AppBundle\Repository\ManifestoPointRepository;
use AppBundle\Repository\MemberRepository;
use AppBundle\Repository\ProjectRepository;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class DefaultController extends Controller
{
    /**
     * @Route("/", name="homepage")
     * @Template()
     */
    public function indexAction(Request $request, $_locale)
    {
        $projectRepository = $this->getDoctrine()->getRepository(Project::SHORTCUT_CLASS_NAME);
        $memberRepository = $this->getDoctrine()->getRepository(Member::SHORTCUT_CLASS_NAME);
        $manifestoPointRepository = $this->getDoctrine()->getRepository(ManifestoPoint::SHORTCUT_CLASS_NAME);
        /** @var ProjectRepository $projectRepository */
        $projects = $projectRepository->getAllByLocaleOrderedByPosition($_locale);
        /** @var MemberRepository $memberRepository */
        $members = $memberRepository->getAllOrderedByPosition();
        /** @var ManifestoPointRepository $manifestoPointRepository */
        $manifestoPoints = $manifestoPointRepository->getAllByLocaleOrderedByPosition($_locale);

        return array(
            'manifestoPoints' => $manifestoPoints,
            'members' => $members,
            'projects' => $projects
        );
    }
}
