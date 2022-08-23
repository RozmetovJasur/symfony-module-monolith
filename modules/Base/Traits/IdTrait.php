<?php
/**
 *
 * Created by PhpStorm.
 * User: Rozmetov Jasur ( @rozmetovjasur )
 * Date: 21.08.2022
 * Time: 16:01
 */

namespace Modules\Base\Traits;

use Doctrine\ORM\Mapping as ORM;

trait IdTrait
{
    /**
     * @var ?int
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     * @ORM\Column(type="integer")
     */
    private ?int $id = null;

    /**
     * @return int|null
     */
    public function getId(): ?int
    {
        return $this->id;
    }
}