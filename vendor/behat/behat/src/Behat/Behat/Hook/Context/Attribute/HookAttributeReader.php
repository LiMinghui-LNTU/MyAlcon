<?php

/*
 * This file is part of the Behat.
 * (c) Konstantin Kudryashov <ever.zet@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Behat\Behat\Hook\Context\Attribute;

use Behat\Behat\Context\Annotation\DocBlockHelper;
use Behat\Behat\Context\Attribute\AttributeReader;
use Behat\Hook\AfterFeature;
use Behat\Hook\AfterScenario;
use Behat\Hook\AfterStep;
use Behat\Hook\AfterSuite;
use Behat\Hook\BeforeFeature;
use Behat\Hook\BeforeScenario;
use Behat\Hook\BeforeStep;
use Behat\Hook\BeforeSuite;
use Behat\Hook\Hook;
use ReflectionAttribute;
use ReflectionMethod;

final class HookAttributeReader implements AttributeReader
{
    /**
     * @var string[]
     */
    private const KNOWN_ATTRIBUTES = [
        AfterFeature::class => 'Behat\Behat\Hook\Call\AfterFeature',
        AfterScenario::class => 'Behat\Behat\Hook\Call\AfterScenario',
        AfterStep::class => 'Behat\Behat\Hook\Call\AfterStep',
        BeforeFeature::class => 'Behat\Behat\Hook\Call\BeforeFeature',
        BeforeScenario::class => 'Behat\Behat\Hook\Call\BeforeScenario',
        BeforeStep::class => 'Behat\Behat\Hook\Call\BeforeStep',
        BeforeSuite::class => 'Behat\Testwork\Hook\Call\BeforeSuite',
        AfterSuite::class => 'Behat\Testwork\Hook\Call\AfterSuite',
    ];

    /**
     * @var DocBlockHelper
     */
    private $docBlockHelper;

    /**
     * Initializes reader.
     */
    public function __construct(DocBlockHelper $docBlockHelper)
    {
        $this->docBlockHelper = $docBlockHelper;
    }

    public function readCallees(string $contextClass, ReflectionMethod $method)
    {
        $attributes = $method->getAttributes(Hook::class, ReflectionAttribute::IS_INSTANCEOF);

        $callees = [];
        foreach ($attributes as $attribute) {
            $class = self::KNOWN_ATTRIBUTES[$attribute->getName()];
            $callable = [$contextClass, $method->getName()];
            $description = null;
            if ($docBlock = $method->getDocComment()) {
                $description = $this->docBlockHelper->extractDescription($docBlock);
            }

            $callees[] = new $class($attribute->newInstance()->getFilterString(), $callable, $description);
        }

        return $callees;
    }
}
