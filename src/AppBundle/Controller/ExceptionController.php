<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Debug\Exception\FlattenException;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpKernel\Log\DebugLoggerInterface;

/**
 * ExceptionController.
 */
class ExceptionController extends Controller
{
    /**
     * @Template()
     */
    public function showAction(FlattenException $exception, DebugLoggerInterface $logger = null)
    {
        return array(
            'exception' => $exception
        );
    }
}