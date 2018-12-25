<?php
/**
 * @access protected
 * @author Judzhin Miles <info[woof-woof]msbios.com>
 */
namespace MSBios\Permissions\Acl\Role;

use MSBios\Permissions\Acl\Exception\InvalidRoleException;
use Zend\Permissions\Acl\Role\GenericRole;
use Zend\Permissions\Acl\Role\RoleInterface;

/**
 * Class Role
 * @package MSBios\Permissions\Acl\Role
 */
class Role extends GenericRole implements HierarchicalRoleInterface
{
    /** @var RoleInterface */
    protected $parent;

    /**
     * @inheritdoc
     *
     * @param string $roleId
     * @param null $parent
     */
    public function __construct(string $roleId, $parent = null)
    {
        parent::__construct($roleId);

        if (! is_null($parent)) {
            $this->setParent($parent);
        }
    }

    /**
     * @inheritdoc
     *
     * @return mixed|RoleInterface
     */
    public function getParent()
    {
        return $this->parent;
    }

    /**
     * @inheritdoc
     *
     * @param $parent
     * @return $this
     */
    public function setParent($parent)
    {
        if (! is_string($parent) && ! $parent instanceof RoleInterface) {
            throw new InvalidRoleException($parent);
        }

        if (is_string($parent)) {
            $parent = new self($parent);
        }

        $this->parent = $parent;

        return $this;
    }
}
