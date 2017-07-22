<?php
interface Factory
{
    public function makeAaaBattery();
    public function makeAaBattery();
    public function makeABattery();
}

interface Battery
{
    public function getType();
}

/* Concrete implementations of the factory and car */

class BatteryFactory implements Factory
{
    public function makeAaaBattery()
    {
        return new Aaa();
    }

    public function makeAaBattery()
    {
        return new Aa();
    }

    public function makeABattery()
    {
        return new A();
    }
}

class Aaa implements Battery
{
    public function getType()
    {
        return 'AAA Type';
    }
}

class Aa implements Battery
{
    public function getType()
    {
        return 'AA Type';
    }
}

class A implements Battery
{
    public function getType()
    {
        return 'A Type';
    }
}

$factory = new BatteryFactory();
$AaaBattery = $factory->makeAaaBattery();
$AaBattery = $factory->makeAaBattery();
$ABattery = $factory->makeABattery();
print $AaaBattery->getType();
print $AaBattery->getType();
print $ABattery->getType();
