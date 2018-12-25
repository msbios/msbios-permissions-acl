<?php
/**
 * @access protected
 * @author Judzhin Miles <info[woof-woof]msbios.com>
 */
namespace MSBios\Permissions\Acl\Resource;

use MSBios\Permissions\Acl\Exception\InvalidResourceException;
use Zend\Permissions\Acl\Resource\GenericResource;
use Zend\Permissions\Acl\Resource\ResourceInterface;

/**
 * Class Resource
 * @package MSBios\Permissions\Acl\Resource
 */
class Resource extends GenericResource implements HierarchicalResourceInterface
{
    /** @var ResourceInterface */
    protected $parent;

    /**
     * @inheritdoc
     *
     * @param string $resourceId
     * @param null $parent
     */
    public function __construct(string $resourceId, $parent = null)
    {
        parent::__construct($resourceId);

        if (! is_null($parent)) {
            $this->setParent($parent);
        }
    }

    /**
     * @return mixed|ResourceInterface
     */
    public function getParent()
    {
        return $this->parent;
    }

    /**
     * @param $parent
     * @return $this
     */
    public function setParent($parent)
    {
        if (! is_string($parent) && ! $parent instanceof ResourceInterface) {
            throw new InvalidResourceException($parent);
        }

        if (is_string($parent)) {
            $parent = new self($parent);
        }

        $this->parent = $parent;

        return $this;
    }
}
