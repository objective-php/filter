<?php
/**
 * Created by PhpStorm.
 * User: gde
 * Date: 06/12/2017
 * Time: 16:21
 */

namespace ObjectivePHP\Filter;


use ObjectivePHP\Filter\Engine\FilteringEngine;

interface FiltersProviderInterface
{

    public function getFilterEngine() : FilteringEngine;

}
