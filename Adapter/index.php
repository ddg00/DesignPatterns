<?php

interface IFormatRobotWithPilot
{
    public function addPilot($pilot);
    public function move();
}

interface IFormatSiRobot
{
    public function rejectHuman();
    public function fly();
}

class SiRobot implements IFormatSiRobot
{
    public function rejectHuman()
    {
        echo "Hate Human \n";
    }

    public function fly()
    {
        echo "fly to cordinate " . rand(-10, 10) . "," . rand(-10, 10) . "\n";
    }
}

class SiRobotAdapter implements IFormatRobotWithPilot
{
    private $robot;

    public function __construct(IFormatSiRobot $robot)
    {
        $this->robot = $robot;
    }

    public function addPilot($pilot) {
        echo "add $pilot as pilot \n";
        $this->robot->rejectHuman();
        echo "kill $pilot \n"
    }

    public function move()
    {
        $this->robot->fly();
    }
}

class UncontrolRobot
{
    private $robot;
    private $robotAdapter;

    public function __construct()
    {
        echo "--Turn On Robot--";
        $this->robot = new SiRobot();
        $this->robotAdapter = new SiRobotAdapter($this->robot);
        $this->robotAdapter->addPilot("Jhon Doe");
        $this->robotAdapter->move();
    }
}

$Berserker = new UncontrolRobot();