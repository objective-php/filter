<?php
/**
 * Created by PhpStorm.
 * User: gde
 * Date: 12/03/2018
 * Time: 23:12
 */

namespace ObjectivePHP\Filter\Engine;


use ObjectivePHP\Filter\Aggregate\FiltersAggregate;

/**
 * Class FilteringEngine
 * @package ObjectivePHP\Filter\Engine
 */
class FilteringEngine extends FiltersAggregate implements FilteringEngineInterface
{

    /**
     * @param array ...$value
     * @return bool
     */
    public function run(...$value): bool
    {
        return $this->filter(...$value);
    }

}