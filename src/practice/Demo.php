<?php
    class Demo {
        public function sum($a, $b) {
            return $a + $b;
        }

        public function substract($a, $b) {
            return $a - $b; 
        }
    }
    
    class Animal {
        public function sayHello() {
        }
    }

    class Dog extends Animal {
        public function sayHello() {
            echo "Wong!";
        }
    }

    class Cat extends Animal {
        public function sayHello() {
            echo "Miu~!";
        }
    }

    $animals[] = new Dog();
    $animals[] = new Cat();

    function greeting($anim) {
        $anim->current()->sayHello();
        return true;
    }

    $iter = new ArrayIterator($animals);
    
    iterator_apply($iter, 'greeting', array($iter));


    class DemoSubject implements SplSubject {
        private $observers, $value;

        public function __construct() {
            $this->observers = array();
        }

        public function attach(SplObserver $observer) {
            $this->observers[] = $observer;
        }

        public function detach(SplObserver $observer) {
            if ($idx = array_search($observer, $this->observers, true)) {
                unset($this->observers[$idx]);
            }
        }

        public function notify() {
            foreach($this->observers as $observer) {
                $observer->update($this); 
            }
        }
        public function setValue($value) {
            $this->value = $value;
            $this->notify();
        }

        public function getValue() {
            return $this->value;
        }
    }

    class DemoObserver implements SplObserver {
        public function update(SplSubject $subject) {
            echo 'The new value is ' . $subject->getValue(); 
        }
    }

    $subject = new DemoSubject();
    $observer = new DemoObserver();
    $subject->attach($observer);
    $subject->setValue(5);

?>

