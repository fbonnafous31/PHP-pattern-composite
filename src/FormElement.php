<?php

    namespace App;

    abstract class FormElement {

        protected $name;
        protected $title;
        protected $data;

        public function __construct(string $name, string $title) {
            $this->name = $name;
            $this->title = $title;
        }

        public function getName(): string {
            return $this->name;
        }

        public function setData($data): void {
            $this->data = $data;
        }

        public function getData() {
            return $this->data;
        }

        abstract public function render(): string;

    }

?>