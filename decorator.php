<?php
interface Component{
    public function operation():string;
}

class AloneComponent implements Component{
    public function operation():string{
        return "Message: anything";
    }
}

class Decorator implements Component{
    protected $component;

    public function __construct(Component $component){

        $this->component = $component;
    }

    public function operation():string{

        return $this->component->operation();
    }
}

class Facebook extends Decorator{

    public function operation():string{
        return "Facebook(" . parent::operation() . ")<br>";
    }
}
class VKontakte extends Decorator{

    public function operation():string{
        return "VK(" . parent::operation() . ")<br>";
    }
}
class Twitter extends Decorator{

    public function operation():string{
        return "Twitter(" . parent::operation() . ")<br>";
    }
}

function clientCode(Component $component){
    echo "RESULT: " . $component->operation()."<br>";
}

$simple = new AloneComponent();
echo "Client: I've got a simple component:<br>";
clientCode($simple);
echo "\n\n";

$decorator1 = new Facebook($simple);
$decorator2 = new VKontakte($simple);
$decorator3 = new Twitter($simple);

clientCode($decorator1);
clientCode($decorator2);
clientCode($decorator3);
