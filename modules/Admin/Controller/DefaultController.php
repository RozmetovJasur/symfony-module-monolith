<?php
/**
 *
 * Created by PhpStorm.
 * User: Rozmetov Jasur ( @rozmetovjasur )
 * Date: 08.09.2022
 * Time: 11:35
 */

namespace Modules\Admin\Controller;

use FOS\RestBundle\Controller\Annotations as Rest;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class DefaultController extends AbstractController
{
    /**
     * @Rest\Route("admin", name="admin_home")
     */
    public function index()
    {
        return $this->render('admin/index.html.twig');
    }
}