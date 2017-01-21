<?php

namespace Images\ImageBundle;

use Symfony\Component\HttpKernel\Bundle\Bundle;

class ImagesImageBundle extends Bundle
{
    public function getParent()
    {
        return 'FOSUserBundle';
    }
}
