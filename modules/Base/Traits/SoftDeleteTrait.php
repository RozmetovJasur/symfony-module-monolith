<?php
/**
 *
 * Created by PhpStorm.
 * User: Rozmetov Jasur ( @rozmetovjasur )
 * Date: 23.08.2022
 * Time: 23:12
 */

namespace Modules\Base\Traits;

use Doctrine\ORM\Mapping as ORM;
use JMS\Serializer\Annotation as Serializer;

trait SoftDeleteTrait
{
    /**
     * @var \DateTime
     * @ORM\Column(name="deleted_at", type="datetime", nullable=true)
     * @Serializer\Exclude()
     */
    protected ?\DateTime $deletedAt;

    /**
     * @return \DateTime|null
     */
    public function getDeletedAt(): ?\DateTime
    {
        return $this->deletedAt;
    }

    public function setDeletedAt(): self
    {
        $this->deletedAt = new \DateTime('now');
        return $this;
    }

    /**
     * @return bool
     */
    public function isDeleted(): bool
    {
        return null !== $this->deletedAt;
    }
}