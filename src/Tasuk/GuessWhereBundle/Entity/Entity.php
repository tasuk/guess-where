<?php

namespace Tasuk\GuessWhereBundle\Entity;

use Doctrine\Common\Collections\ArrayCollection;

class Entity
{
    public function __call($name, $args)
    {
        foreach (array("get", "set", "add", "remove") as $action) {
            if ($property = $this->prependedBy($name, $action)) {
                return $this->$action($property, $args);
            }
        }
        throw new \Exception("xoxoxo");
    }

    protected function prependedBy($haystack, $needle)
    {
        $len = strlen($needle);
        if ($needle === substr($haystack, 0, $len)) {
            return substr($haystack, $len);
        }
        return false;
    }

    protected function get($property)
    {
        $lower = lcfirst($property);
        return $this->$lower;
    }

    protected function set($property, $args)
    {
        $value = $args[0];

        if (! array_key_exists(1, $args)) {
            $otherClass = __NAMESPACE__ . '\\' . $property;
            if ($value instanceof $otherClass) {
                $otherProp = preg_replace("/.*\\\\/", "", get_class($this));
                if (property_exists($otherClass, lcfirst($otherProp . "s"))) {
                    $method = "add{$otherProp}";
                    $value->$method($this, true);
                }
            }
        }

        $lower = lcfirst($property);
        $this->$lower = $value;
        return $this;
    }

    protected function add($property, $args)
    {
        $object = $args[0];
        $collection = lcfirst("{$property}s");
        if ($this->$collection instanceof ArrayCollection) {
            $this->{$collection}[] = $object;

            if (! array_key_exists(1, $args)) {
                $class = preg_replace("/.*\\\\/", "", get_class($this));
                $method = "set" . $class;
                $object->$method($this, true);
            }

            return $this;
        }
        throw \Exception('addsplosion');
    }

    protected function remove($property, $args)
    {
        $object = $args[0];
        $collection = lcfirst("{$property}s");
        if ($this->$collection instanceof ArrayCollection) {
            $this->$collection->removeElement($object);
            return $this;
        }
        throw \Exception('addsplosion');
    }
}
