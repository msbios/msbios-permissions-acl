<?php
/**
 * @access protected
 * @author Judzhin Miles <info[woof-woof]msbios.com>
 */
namespace MSBios\Permissions\Acl\Resource;

use Zend\Permissions\Acl\Resource\ResourceInterface;

/**
 * Interface HierarchicalResourceInterface
 * @package MSBios\Permissions\Acl\Resource
 */
interface HierarchicalResourceInterface extends ResourceInterface
{
    /**
     * @return mixed|ResourceInterface
     */
    public function getParent();
}
