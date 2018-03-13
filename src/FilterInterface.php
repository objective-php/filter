<?php
/**
 * Created by PhpStorm.
 * User: gauthier
 * Date: 27/02/2018
 * Time: 15:54
 */

namespace ObjectivePHP\Filter;


interface FilterInterface
{
    public function filter(...$value) : bool;
}
