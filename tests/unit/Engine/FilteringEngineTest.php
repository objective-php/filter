<?php

namespace Tests\ObjectivePHP\Filter\Engine {

    use Codeception\Test\Unit;
    use ObjectivePHP\Filter\Aggregate\FiltersAggregate;
    use ObjectivePHP\Filter\Engine\FilteringEngine;
    use ObjectivePHP\Filter\FilteringLogicalMode;
    use Tests\ObjectivePHP\Filter\Engine\FilteringEngineTest\FalseFilter;
    use Tests\ObjectivePHP\Filter\Engine\FilteringEngineTest\TrueFilter;

    class FilteringEngineTest extends Unit
    {
        /**
         * @var \UnitTester
         */
        protected $tester;

        protected function _before()
        {
        }

        protected function _after()
        {
        }

    }
}

