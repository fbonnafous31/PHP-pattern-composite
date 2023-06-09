<?php

    namespace App;

    abstract class FieldComposite extends FormElement {

        protected $fields = [];

        /**
         *   Methods for adding / removing sub-objects
        */
        public function add(FormElement $field): void {
            $name = $field->getName();
            $this->fields[$name] = $field;
        }

        public function remove(FormElement $component): void {
            $this->fields = array_filter($this->fields, function ($child) use ($component) {
                return $child != $component;
            });
        }

        /**
         *  Leaf methods 
         */
        public function setData($data): void {
            foreach ($this->fields as $name => $field) {
                if (isset($data[$name])) {
                    $this->setData($data[$name]);
                }
            }
        }

        public function getData(): array {
            $data = [];
            foreach ($this->fields as $name => $field) {
                $data[$name] = $field->getData();
            }

            return $data;
        }

        public function render(): string {
            $output = "";

            foreach ($this->fields as $name => $field) {
                $output .= $field->render();
            }
            return $output;
        }

    }

?>