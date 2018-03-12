<?php
/**
 * Created by PhpStorm.
 * User: gde
 * Date: 12/03/2018
 * Time: 23:52
 */

namespace Tests\ObjectivePHP\Filter\Aggregate {


    use Codeception\Test\Unit;
    use ObjectivePHP\Filter\Aggregate\FiltersAggregate;
    use ObjectivePHP\Filter\Engine\FilteringEngine;
    use ObjectivePHP\Filter\FilteringLogicalMode;
    use ObjectivePHP\Filter\FilterInterface;
    use Tests\ObjectivePHP\Filter\Engine\FilteringEngineTest\FalseFilter;
    use Tests\ObjectivePHP\Filter\Engine\FilteringEngineTest\TrueFilter;

    class FiltesAggregateTest extends Unit
    {
        /**
         * @var \UnitTester
         */
        protected $tester;

        /**
         * @throws \Exception
         */
        public function testFilterRegistration()
        {
            $engine = new FilteringEngine();

            $engine->registerFilter($filter = $this->makeEmpty(FilterInterface::class, ['filter' => true]));

            $this->tester->assertSame($filter, current($engine)[0]);
        }

        /** @dataProvider dataProviderForFilteringTest */
        public function testFiltering($filters, $mode, $expected)
        {
            $aggregate = new FiltersAggregate();
            $aggregate->setLogicalMode($mode);
            $aggregate->registerFilter(...$filters);

            $this->tester->assertEquals($expected, $aggregate->filter());

        }


        public function dataProviderForFilteringTest()
        {
            return [
                [[new TrueFilter()], FilteringLogicalMode::ALL, true],
                [[new FalseFilter()], FilteringLogicalMode::ALL, false],
                [[new FalseFilter()], FilteringLogicalMode::NONE, true],
                [[new TrueFilter()], FilteringLogicalMode::NONE, false],
                [[new TrueFilter(), new TrueFilter(), new FalseFilter()], FilteringLogicalMode::ALL, false],
                [[new TrueFilter(), new TrueFilter(), new FalseFilter(), new FiltersAggregate(new TrueFilter())], FilteringLogicalMode::ANY, true],
            ];
        }
    }
}

namespace Tests\ObjectivePHP\Filter\Engine\FilteringEngineTest {

    use ObjectivePHP\Filter\FilterInterface;

    class TrueFilter implements FilterInterface
    {
        public function filter(...$value): bool
        {
            return true;
        }
    }

    class FalseFilter implements FilterInterface
    {
        public function filter(...$value): bool
        {
            return false;
        }
    }
}