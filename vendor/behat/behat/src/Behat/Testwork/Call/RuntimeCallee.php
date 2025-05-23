<?php

/*
 * This file is part of the Behat Testwork.
 * (c) Konstantin Kudryashov <ever.zet@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Behat\Testwork\Call;

use Behat\Testwork\Call\Exception\BadCallbackException;
use ReflectionFunction;
use ReflectionFunctionAbstract;
use ReflectionMethod;

/**
 * Represents callee created and executed in the runtime.
 *
 * @author Konstantin Kudryashov <ever.zet@gmail.com>
 */
class RuntimeCallee implements Callee
{
    /**
     * @var callable|array{class-string, string}
     */
    private $callable;
    /**
     * @var string|null
     */
    private $description;
    /**
     * @var ReflectionFunctionAbstract
     */
    private $reflection;
    /**
     * @var string
     */
    private $path;

    /**
     * Initializes callee.
     */
    public function __construct(callable|array $callable, ?string $description = null)
    {
        if (is_array($callable)) {
            $this->reflection = new ReflectionMethod($callable[0], $callable[1]);
            $this->path = $callable[0] . '::' . $callable[1] . '()';
        } else {
            $this->reflection = new ReflectionFunction($callable);
            $this->path = $this->reflection->getFileName() . ':' . $this->reflection->getStartLine();
        }

        $this->callable = $callable;
        $this->description = $description;
    }

    /**
     * Returns callee description.
     *
     * @return string
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * Returns callee definition path.
     *
     * @return string
     */
    public function getPath()
    {
        return $this->path;
    }

    /**
     * Returns callable.
     *
     * @return callable|array{class-string, string}
     */
    public function getCallable()
    {
        return $this->callable;
    }

    /**
     * Returns callable reflection.
     *
     * @return ReflectionFunctionAbstract
     */
    public function getReflection()
    {
        return $this->reflection;
    }

    /**
     * Returns true if callee is a method, false otherwise.
     *
     * @return bool
     */
    public function isAMethod()
    {
        return $this->reflection instanceof ReflectionMethod;
    }

    /**
     * Returns true if callee is an instance (non-static) method, false otherwise.
     *
     * @return bool
     */
    public function isAnInstanceMethod()
    {
        return $this->reflection instanceof ReflectionMethod
            && !$this->reflection->isStatic();
    }

    /**
     * @param callable|array{class-string, string} $callable
     */
    protected function throwIfInstanceMethod(callable|array $callable, string $hookType): void
    {
        if ($this->isAnInstanceMethod()) {
            if (is_array($callable)) {
                $className = $callable[0];
                $methodName = $callable[1];
            } else {
                $reflection = new ReflectionMethod($callable);
                $className = $reflection->getDeclaringClass()->getShortName();
                $methodName = $reflection->getName();
            }

            throw new BadCallbackException(sprintf(
                '%s hook callback: %s::%s() must be a static method',
                $hookType,
                $className,
                $methodName
            ), $callable);
        }
    }
}
