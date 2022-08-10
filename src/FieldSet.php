<?php

    namespace App;

    /**
     * Concrete composite
     */

    class FieldSet extends FieldComposite {
        public function render(): string {
            $output = parent::render();

            return "<fieldset><legend>{$this->title}</legend>\n$output</fieldset>\n";
        }
    }

?>