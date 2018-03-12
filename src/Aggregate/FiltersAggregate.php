<?php
/**
 * Created by PhpStorm.
 * User: gde
 * Date: 12/03/2018
 * Time: 23:32
 */

namespace ObjectivePHP\Filter\Aggregate;


use ObjectivePHP\Filter\FilteringLogicalMode;
use ObjectivePHP\Filter\FilterInterface;

class FiltersAggregate implements FiltersAggregateInterface
{

    /**
     * @var array
     */
    protected $filters = [];

    /**
     * @var string
     */
    protected $logicalMode = FilteringLogicalMode::ALL;

    /**
     * FiltersAggregate constructor.
     * @param array $filters
     */
    public function __construct(FilterInterface ...$filters)
    {
        $this->filters = $filters;
    }

    /**  */
    public function filter(...$value): bool
    {
        /** @var FilterInterface $filter */
        foreach($this as $filter)
        {
            $result = $filter->filter(...$value);

            switch(true) {

                case (!$result && $this->logicalMode == FilteringLogicalMode::ALL):
                    return false;

                case ($result && $this->logicalMode == FilteringLogicalMode::ANY):
                    return true;

                case ($result && $this->logicalMode == FilteringLogicalMode::NONE):
                    return false;
            }
        }

        return true;
    }

    /**
     * @return string
     */
    public function getLogicalMode()
    {
        return $this->logicalMode;
    }

    /**
     * @param FilterInterface[] ...$filters
     * @return $this
     */
    public function registerFilter(FilterInterface ...$filters)
    {
        $this->filters += $filters;

        return $this;
    }

    /**
     * @param string $logicalMode
     */
    public function setLogicalMode(string $logicalMode)
    {
        $this->logicalMode = $logicalMode;

        return $this;
    }

    public function current()
    {
        return current($this->filters);
    }

    public function next()
    {
        return next($this->filters);
    }

    public function key()
    {
        return key($this->filters);
    }

    public function valid()
    {
        return key($this->filters) !== null;
    }

    public function rewind()
    {
        reset($this->filters);
    }

}