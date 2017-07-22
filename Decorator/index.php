<?php

abstract class Component
{
    protected $data;
    protected $borderWidth;
    protected $borderStyle

    abstract public function getData();

    abstract public function getborderWidth();

    abstract public function getborderStyle();
}

class WindowComponent extends Component
{
    public function __construct()
    {
        $this->borderWidth = 1;
        $this->borderStyle = "solid";
        $this->data = "Window borderWidth : {$this->borderWidth} , borderStyle {$this->borderStyle} \n";
    }

    public function getData()
    {
        return $this->data;
    }

    public function getborderWidth()
    {
        return $this->borderWidth;
    }

    public function getborderStyle()
    {
        return $this->borderStyle;
    }
}

abstract class Decorator extends Component
{

}

class WindowDecorator1 extends Decorator
{
    public function __construct(Component $data)
    {
        $this->borderWidth = 1;
        $this->borderStyle = "doubel";
        $this->data = $data;
    }

    public function getData()
    {
        return $this->data->getData() . "Window Decorator 1 borderWidth : {$this->borderWidth} , borderStyle {$this->borderStyle} \n";
    }

    public function getborderWidth()
    {
        return $this->borderWidth;
    }

    public function getborderStyle()
    {
        return $this->borderStyle;
    }
}

class WindowDecorator2 extends Decorator
{
    public function __construct(Component $data)
    {
        $this->borderWidth = 2;
        $this->borderStyle = "dot";
        $this->data = $data;
    }

    public function getData()
    {
        return $this->data->getData() . "Window Decorator 2 borderWidth : {$this->borderWidth} , borderStyle {$this->borderStyle} \n";
    }

    public function getborderWidth()
    {
        return $this->borderWidth;
    }

    public function getborderStyle()
    {
        return $this->borderStyle;
    }
}

class MainWindow
{
    private $component;

    public function __construct()
    {
        $this->component = new WindowComponent();
        $this->component = $this->wrapComponent($this->component);

        echo $this->component->getData();
        echo "Main Window:\t\t\t";
        echo $this->component->getValue();
    }

    private function wrapComponent(Component $component)
    {
        $component1 = new WindowDecorator1($component);
        $component2 = new WindowDecorator2($component1);
        return $component2;
    }
}

$main = new MainWindow();