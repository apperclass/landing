<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class NotLocalizedController extends Controller
{
    /**
     * Senza path perché definita in routing.yml
     */
    public function homepageNotLocalizedAction(Request $request)
    {
        return $this->redirect($this->generateUrl('homepage', array('_locale' => $request->getPreferredLanguage(array_keys($this->container->getParameter('interface_translation_locales'))))), 301);
    }
}
