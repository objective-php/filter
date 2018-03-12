<?php
/**
 * Created by PhpStorm.
 * User: gde
 * Date: 12/03/2018
 * Time: 23:18
 */

namespace ObjectivePHP\Filter\Aggregate;


use ObjectivePHP\Filter\FilterInterface;

interface FiltersAggregateInterface extends FilterInterface, \Iterator
{
    public function getLogicalMode();

    public function registerFilter(FilterInterface ...$filters);
}