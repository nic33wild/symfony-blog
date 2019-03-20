<?php

namespace App\Twig;

use Twig\Extension\AbstractExtension;
use Twig\TwigFilter;

class AppExtension extends AbstractExtension
{
    
    public function getFilters()
    {
             return [ 
                 new TwigFilter('sort_pers', [$this, 'sort_pers']),
                ];
    }

    public function sort_pers($array) {
        rsort($array);      
        return $array;
    }

}
