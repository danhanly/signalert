<?php

namespace Notifly;

use Notifly\Exception\NotiflyResolverException;
use Notifly\Type\NotiflyType;
use ReflectionClass;

class Resolver
{
    /**
     * The Internal Types are the string based types that are supported by Notifly out of the box
     *
     * @var array
     */
    protected $internalTypes = [
        'error',
        'info',
        'success',
    ];

    /**
     * Returns a class which matches the $type
     *
     * @param string $type
     * @return NotiflyType
     * @throws NotiflyResolverException
     */
    public function getClass($type)
    {
        $class = $this->typeAsClass($type);

        if ($class === false) {
            $internal = $this->typeAsInternal($type);

            if ($internal === false) {
                throw new NotiflyResolverException();
            }

            return new $internal();

        }

        return new $class();
    }

    /**
     * Attempts to return a class, under the assumption that $type is a class name
     *
     * @param string $type
     * @return NotiflyType
     */
    private function typeAsClass($type)
    {
        // @todo If this fails, how will the Project Owner know?
        try {
            // Create a reflection of the class.
            $reflect = new ReflectionClass($type);
            // Ensure the class implements the correct interface
            if ($reflect->implementsInterface('\Notifly\Type\NotiflyType')) {
                return $reflect->newInstance();
            }
        } catch (\ReflectionException $e) {
            return false;
        }

        return false;

    }

    /**
     * Attempts to return a class, under the assumption that $type is an internal type
     *
     * @param string $type
     * @return NotiflyType
     */
    private function typeAsInternal($type)
    {
        // If this is a known error internal type
        if (in_array($type, $this->internalTypes) === true) {
            // Convert to Class Name
            $className = ucfirst($type);
            $namespace = '\Notifly\Type\\';
            $assembled = $namespace . $className;

            // Initialise
            return new $assembled();
        }

        return false;
    }
}