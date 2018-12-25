<?php
/**
 * @access protected
 * @author Judzhin Miles <info[woof-woof]msbios.com>
 */
namespace MSBios\Permissions\Acl\Role;

use Zend\Permissions\Acl\Role\RoleInterface;

/**
 * Interface HierarchicalRoleInterface
 * @package MSBios\Permissions\Acl\Role
 */
interface HierarchicalRoleInterface extends RoleInterface
{
    /**
     * @return mixed|RoleInterface
     */
    public function getParent();
}
