<?php
/**
 *
 * Created by PhpStorm.
 * User: Rozmetov Jasur ( @rozmetovjasur )
 * Date: 15.08.2022
 * Time: 23:21
 */

namespace Modules\User\Entity;

use ApiPlatform\Core\Annotation\ApiProperty;
use Gedmo\Mapping\Annotation as Gedmo;
use JMS\Serializer\Annotation as Serializer;
use Modules\Base\Traits\IdTrait;
use ApiPlatform\Core\Annotation\ApiResource;
use Doctrine\ORM\Mapping as ORM;
use Modules\Base\Traits\SoftDeleteTrait;
use Modules\Base\Traits\TimestampTrait;
use Symfony\Component\Security\Core\User\PasswordAuthenticatedUserInterface;

/**
 * @ORM\Table(name="list", schema="users")
 * @ORM\Entity()
 * @Gedmo\SoftDeleteable(timeAware=true, fieldName="deletedAt")
 * @ApiResource
 */
class User implements PasswordAuthenticatedUserInterface
{

    use IdTrait;
    use TimestampTrait;
    use SoftDeleteTrait;

    /**
     * @var string
     * @ORM\Column(name="username", type="string", nullable=false)
     */
    private string $username;

    /**
     * @var string
     * @ORM\Column(name="password", type="string", nullable=false)
     */
    private string $password;

    /**
     * @var string
     * @ORM\Column(name="first_name", type="string", nullable=false)
     */
    private string $firstName;

    /**
     * @var bool
     * @ORM\Column(name="is_active", type="boolean", nullable=false)
     */
    private bool $isActive;


    /**
     * @return string
     */
    public function getUsername(): string
    {
        return $this->username;
    }

    /**
     * @param string $username
     */
    public function setUsername(string $username): void
    {
        $this->username = $username;
    }

    /**
     * @return string
     */
    public function getPassword(): string
    {
        return $this->password;
    }

    /**
     * @param string $password
     */
    public function setPassword(string $password): void
    {
        $this->password = $password;
    }

    /**
     * @return bool
     */
    public function isActive(): bool
    {
        return $this->isActive;
    }

    /**
     * @param bool $isActive
     */
    public function setIsActive(bool $isActive): void
    {
        $this->isActive = $isActive;
    }

    /**
     * @return string
     */
    public function getFirstName(): string
    {
        return $this->firstName;
    }

    /**
     * @param string $firstName
     */
    public function setFirstName(string $firstName): void
    {
        $this->firstName = $firstName;
    }


    /**
     * @return string|null
     */
    public function getPlainPassword(): ?string
    {
        return $this->plainPassword;
    }

    /**
     * @param string|null $plainPassword
     */
    public function setPlainPassword(?string $plainPassword): void
    {
        $this->plainPassword = $plainPassword;
    }
}