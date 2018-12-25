<?php
/**
 * @access protected
 * @author Judzhin Miles <info[woof-woof]msbios.com>
 */
namespace MSBios\Permissions\Acl\Controller;

use MSBios\Application\Controller\IndexController as DefaultIndexController;
use MSBios\Permissions\Acl\Resource\Resource;
use MSBios\Permissions\Acl\Role\Role;
use Zend\Permissions\Acl\Acl;
use Zend\View\Model\ModelInterface;

/**
 * Class IndexController
 * @package MSBios\Permissions\Acl\Controller
 */
class IndexController extends DefaultIndexController
{
    /**
     * @return ModelInterface|\Zend\View\Model\ViewModel
     */
    public function indexAction()
    {
        /** @var ModelInterface $viewModel */
        $viewModel = parent::indexAction();

        $acl = new Acl();

        $acl->addRole(new Role('guest'))
            ->addRole(new Role('member'))
            ->addRole(new Role('admin'));

        /** @var array $parents */
        $parents = ['guest', 'member', 'admin'];
        $acl->addRole(new Role('test'), $parents);

        $level1 = new Resource('Level 1');
        $level12 = new Resource('Level 1.2');
        $level121 = new Resource('Level 1.2.1');

        $acl
            ->addResource($level1)
            ->addResource(new Resource('Level 1.1'), $level1)
            ->addResource($level12, $level1)
            ->addResource($level121, $level12)
            ->addResource(new Resource('Level 1.2.2'), $level12)
            ->addResource(new Resource('Level 1.2.3'), $level12)
            ->addResource(new Resource('Level 1.3'), $level1)
            ->addResource(new Resource('Level 2'))
            ->addResource(new Resource('Level 3'));

        $acl->allow('test', $level1);
        $acl->deny('test', $level121);

        $viewModel->setVariable('acl', $acl);

        return $viewModel;
    }
}
