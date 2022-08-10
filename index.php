<?php

use App\FieldSet;
use App\Form;
use App\FormElement;
use App\Input;

    require_once(__DIR__ . '/libraries/autoload.php');

    function getProductForm(): FormElement {    
        $form = new Form('product', "Add product", '/product/add');
        $form->add(new Input('name', "Name", 'text'));
        $form->add(new Input('description', "Description", 'text'));

        $picture = new FieldSet('photo', "Product Photo");
        $picture->add(new Input('caption', "Caption", 'text'));
        $picture->add(new Input('image', "Image", 'file'));
        $form->add($picture);

        return $form;
    }

    function loadProductData(FormElement $form){
        $data = [
            'name' => 'Apple Mac Book',
            'description' => 'A laptop',
            'photo' => [
                'caption' => 'Front photo',
                'image' => 'photo.png',
            ],
        ];
        $form->setData($data);
    }   
    
    function renderProduct(FormElement $form) {
        echo $form->render();
    }

    $form = getProductForm();
    loadProductData($form);
    renderProduct($form);

?>