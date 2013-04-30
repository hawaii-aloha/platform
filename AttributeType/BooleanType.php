<?php
namespace Oro\Bundle\FlexibleEntityBundle\AttributeType;

use Oro\Bundle\FlexibleEntityBundle\AttributeType\AbstractAttributeType;

/**
 * Boolean attribute type for Yes/No interaction
 *
 * @author    Romain Monceau <romain@akeneo.com>
 * @copyright 2012 Akeneo SAS (http://www.akeneo.com)
 * @license   http://opensource.org/licenses/MIT MIT
 *
 */
class BooleanType extends AbstractAttributeType
{

    /**
     * constructor
     */
    public function __construct()
    {
        $this->backendType = self::BACKEND_TYPE_INTEGER;
        $this->formType    = 'option';
    }

    /**
     * {@inheritdoc}
     */
    public function getName()
    {
        return 'oro_flexibleentity_boolean';
    }
}
