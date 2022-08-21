<?php
/**
 *
 * Created by PhpStorm.
 * User: Rozmetov Jasur ( @rozmetovjasur )
 * Date: 15.08.2022
 * Time: 22:46
 */

namespace Modules\User\Controller;

use FOS\RestBundle\Controller\Annotations as Rest;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class DefaultController extends AbstractController
{
    /**
     * @Rest\Get("/modules/default/index")
     */
    public function index()
    {
        return $this->json(['index']);
    }
}