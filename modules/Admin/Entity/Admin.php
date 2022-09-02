<?php
/**
 *
 * Created by PhpStorm.
 * User: Rozmetov Jasur ( @rozmetovjasur )
 * Date: 01.09.2022
 * Time: 09:54
 */

namespace Modules\Admin\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use Doctrine\ORM\Mapping as ORM;
use Gedmo\Mapping\Annotation as Gedmo;
use Gedmo\SoftDeleteable\Traits\SoftDeleteable;
use JMS\Serializer\Annotation as Serializer;
use Modules\Base\Traits\IdTrait;
use Modules\Base\Traits\TimestampTrait;
use Symfony\Component\Security\Core\User\PasswordAuthenticatedUserInterface;
use Symfony\Component\Security\Core\User\UserInterface;

/**
 * @ORM\Entity()
 * @ORM\Table(name="list", schema="admin")
 * @Gedmo\SoftDeleteable(timeAware=true, fieldName="deletedAt")
 * @ApiResource
 * @method string getUserIdentifier()
 */
class Admin implements UserInterface, PasswordAuthenticatedUserInterface
{
    use IdTrait;
    use TimestampTrait;
    use SoftDeleteable;

    /**
     * @var string
     * @ORM\Column(name="username", type="string", unique=true)
     */
    private string $username;

    /**
     * @var string
     * @ORM\Column(name="password", type="string")
     */
    private string $password;


    /**
     * @var string|null
     * @ORM\Column(name="email", type="string", nullable=true)
     */
    private ?string $email = null;

    /**
     * @var array|null
     * @ORM\Column(name="roles", type="simple_array", nullable=true)
     * @Serializer\Exclude()
     */
    private ?array $roles = [];

    /**
     * @var array
     * @ORM\Column(name="permissions", type="simple_array", nullable=true)
     * @Serializer\Exclude()
     */
    private ?array $permissions = [];

    /**
     * @var boolean
     * @ORM\Column(name="active", type="boolean", options={"default"=true})
     */
    private bool $active = false;

    /**
     * @var string
     * @Serializer\Exclude
     */
    private string $plainPassword;

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
     * @return string|null
     */
    public function getEmail(): ?string
    {
        return $this->email;
    }

    /**
     * @param string|null $email
     */
    public function setEmail(?string $email): void
    {
        $this->email = $email;
    }

    /**
     * @return array|null
     */
    public function getRoles(): ?array
    {
        return $this->roles;
    }

    /**
     * @param array|null $roles
     */
    public function setRoles(?array $roles): void
    {
        $this->roles = $roles;
    }

    /**
     * @return array|null
     */
    public function getPermissions(): ?array
    {
        return $this->permissions;
    }

    /**
     * @param array|null $permissions
     */
    public function setPermissions(?array $permissions): void
    {
        $this->permissions = $permissions;
    }

    /**
     * @return bool
     */
    public function isActive(): bool
    {
        return $this->active;
    }

    /**
     * @param bool $active
     */
    public function setActive(bool $active): void
    {
        $this->active = $active;
    }

    public function getSalt()
    {
        // TODO: Implement getSalt() method.
    }

    public function eraseCredentials()
    {
        // TODO: Implement eraseCredentials() method.
    }

    public function __call($name, $arguments)
    {
        // TODO: Implement @method string getUserIdentifier()
    }

    /**
     * @return string
     */
    public function getPlainPassword(): string
    {
        return $this->plainPassword;
    }

    /**
     * @param string $plainPassword
     */
    public function setPlainPassword(string $plainPassword): void
    {
        $this->plainPassword = $plainPassword;
    }
}