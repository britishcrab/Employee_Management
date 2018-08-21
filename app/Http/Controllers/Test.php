<?php
    class A
    {
        /**
         * @var PersonInterface
         */
        protected $person;
        protected $person2;

        /**
         * class A constructor.
         * @param PersonInterface $person
         */
        public function __construct(Chesha $person, PersonInterface $person2)
        {
            $this->person = $person;
            $this->person2 = $person2;
        }

        /**
         * 話す
         */
        public function say()
        {
            return $this->person->say().$this->person2->say();
        }
    }

    interface PersonInterface
    {
        public function say();
    }

    class Alice implements PersonInterface
    {
        public function say()
        {
            echo "アリスだよ～";
        }
    }
    // class Chesha implements PersonInterface
    class Chesha
    {
        public function say()
        {
            echo "猫だよ～";
        }
    }

    $alice = new Alice();
    $chesha = new Chesha();
    $classA = new A($chesha, $alice);

	echo $classA->say();
