<?php
/**
 *
 * Created by PhpStorm.
 * User: Rozmetov Jasur ( @rozmetovjasur )
 * Date: 06.09.2022
 * Time: 18:38
 */

namespace Modules\Product\Entity;

use Doctrine\ORM\Mapping as ORM;
use Gedmo\SoftDeleteable\Traits\SoftDeleteable;
use Modules\Base\Traits\IdTrait;
use Modules\Base\Traits\TimestampTrait;

/**
 * @ORM\Entity(repositoryClass="Modules\Product\Repository\ProductRepository")
 * @ORM\Table(name="list",schema="product")
 */
class Product
{
    use IdTrait;
    use TimestampTrait;
    use SoftDeleteable;

    /**
     * @var string
     * @ORM\Column(name="name", type="string")
     */
    private string $name;

    /**
     * @var array
     * @ORM\Column(name="price", type="json")
     */
    private array $price;

    /**
     * @var bool
     * @ORM\Column(name="is_active", type="boolean", options={"default"=true})
     */
    private bool $is_active = true;

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @param string $name
     */
    public function setName(string $name): void
    {
        $this->name = $name;
    }

    /**
     * @return array
     */
    public function getPrice(): array
    {
        return $this->price;
    }

    /**
     * @param array $price
     */
    public function setPrice(array $price): void
    {
        $this->price = $price;
    }

    /**
     * @return bool
     */
    public function isIsActive(): bool
    {
        return $this->is_active;
    }

    /**
     * @param bool $is_active
     */
    public function setIsActive(bool $is_active): void
    {
        $this->is_active = $is_active;
    }
}