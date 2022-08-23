<?php
/**
 *
 * Created by PhpStorm.
 * User: Rozmetov Jasur ( @rozmetovjasur )
 * Date: 21.08.2022
 * Time: 16:45
 */

namespace Modules\Product\Controller;

use FOS\RestBundle\Controller\Annotations as Rest;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class DefaultController extends AbstractController
{
    /**
     * @Rest\Get("/product/default/index")
     */
    public function index()
    {
        return $this->json(['index']);
    }
}