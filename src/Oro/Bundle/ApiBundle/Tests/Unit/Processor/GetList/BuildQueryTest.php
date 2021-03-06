<?php

namespace Oro\Bundle\ApiBundle\Tests\Unit\Processor\GetList;

use Doctrine\Common\Collections\Expr\Comparison;
use Doctrine\ORM\QueryBuilder;

use Oro\Bundle\ApiBundle\Collection\Criteria;
use Oro\Bundle\ApiBundle\Processor\GetList\BuildQuery;

class BuildQueryTest extends GetListProcessorOrmRelatedTestCase
{
    /** @var BuildQuery */
    protected $processor;

    protected function setUp()
    {
        parent::setUp();

        $this->processor = new BuildQuery($this->doctrineHelper);
    }

    public function testProcessOnExistingQuery()
    {
        $qb = $this->getQueryBuilderMock();

        $this->context->setQuery($qb);
        $this->processor->process($this->context);

        $this->assertSame($qb, $this->context->getQuery());
    }

    public function testProcessForNotManageableEntity()
    {
        $className = 'Test\Class';

        $this->notManageableClassNames = [$className];

        $this->context->setClassName($className);
        $this->processor->process($this->context);

        $this->assertNull($this->context->getQuery());
    }

    public function testProcess()
    {
        $className = 'Oro\Bundle\ApiBundle\Tests\Unit\Fixtures\Entity\User';

        $resolver = $this->getMockBuilder('Oro\Bundle\EntityBundle\ORM\EntityClassResolver')
            ->disableOriginalConstructor()
            ->getMock();
        $criteria = new Criteria($resolver);
        $criteria->andWhere(new Comparison('name', '=', 'test'));

        $this->context->setClassName($className);
        $this->context->setCriteria($criteria);
        $this->processor->process($this->context);

        $this->assertTrue($this->context->hasQuery());
        /** @var QueryBuilder $query */
        $query = $this->context->getQuery();
        $this->assertEquals(
            sprintf('SELECT e FROM %s e WHERE e.name = :name', $className),
            $query->getDQL()
        );
        $parameter = $query->getParameters()->first();
        $this->assertEquals('name', $parameter->getName());
        $this->assertEquals('test', $parameter->getValue());
    }
}
