<?php

namespace Tim\BackendBundle\Admin;

use Sonata\UserBundle\Admin\Model\GroupAdmin as SonataGroupAdmin;

class BaseGroupAdmin extends SonataGroupAdmin
{
    protected $classnameLabel = 'group';
//    protected $baseRouteName = 'group';
//    protected $baseRoutePattern = 'group';
//    protected $translationDomain = 'TimBackendBundle';

}
