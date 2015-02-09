<?php

namespace User\View\Helper;

//use Zend\View\Helper\AbstractHelper;
use Zend\Form\View\Helper\AbstractHelper;
use Zend\Form\Form;

class RenderForm extends AbstractHelper {

    public function __invoke(Form $form) {
        $this->validTagAttributes = array_merge(
            $this->validTagAttributes, array(
                "ng-show" => true,
                "ng-animate" => true,
                "class" => true
            )
        );
        $html = '';
        if ($form->getMessages()) {
            foreach ($form->getElements() as $element) {
                foreach ($element->getMessages() as $msg) {
                    $html .= '<div class="alert alert-danger alert-dismissable">'
                        . '<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>';
                    $html .= "<b>[{$element->getLabel()}]</b> " . $msg;
                    $html .= '</div>';
                }
            }
        }
        $html .= $this->render($form);
        return $html;
    }

    public function renderElement(\Zend\Form\Element $element) {
        $html = '<div ';
        $attributes = (array) $element->getOption('wrapper-attributes');

        $attributes['class'] = (isset($attributes['class']) ? $attributes['class'] :'')  . ' form-group';
        $html .= $this->createAttributesString($attributes);


        $html .='>';
        $html .= '<label for="' . $element->getName() . '" class="control-label">'
            . $element->getLabel()
            . '</label>';
        $html.= $this->getView()->formElement($element);
        if ($element->getOption('append')) {
            $html.= $element->getOption('append');
        }
        $html .= '</div>';
        return $html;
    }

    public function render($elements) {
        $html = '';
        foreach ($elements as $element) {
            if ($element instanceof \Zend\Form\Fieldset) {
                $html.= '<fieldset>';
                if ($element->getLabel() != '') {
                    $html.= '<legend>' . $element->getLabel() . '</legend>';
                }
                if ($element->getMessages()) {
                    foreach ($element->getElements() as $elementfs) {
                        foreach ($elementfs->getMessages() as $msg) {
                            $html .= '<div class="alert alert-danger alert-dismissable">'
                                . '<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>';
                            $html .= "<b>[{$elementfs->getLabel()}]</b> " . $msg;
                            $html .= '</div>';
                        }
                    }
                }

                if ($element instanceof \Zend\Form\Element\Collection && $element->shouldCreateTemplate()) {
                    $html.= "<fieldset>" .
                        $this->render($element) .
                        "</fieldset>";

                    $escapeHtmlAttribHelper = $this->getView()->plugin('escapehtmlattr');
                    if ($element->getTemplateElement() instanceof \Zend\Form\Fieldset) {
                        $templateMarkup = $this->render($element->getTemplateElement());
                    } else {
                        $templateMarkup = $this->renderElement($element->getTemplateElement());
                    }
                    $template = "<fieldset>" .
                        $templateMarkup
                        . "</fieldset>"
                    ;
                    $html .= sprintf(
                        '<span class="template" data-template="%s"></span>', $escapeHtmlAttribHelper($template)
                    );
                    if (!is_null($element->getOption('add_button'))) {
                        $buttonRender = $this->getView()->plugin('formButton');
                        $botao = $element->getOption('add_button');
                        if (!$botao instanceof \Zend\Form\Element\Button) {
                            $factory = new \Zend\Form\Factory();
                            $botao = $factory->createElement($botao);
                        }
                        $html .= '<div class="col-sm-2"></div><div class="col-sm-3">';
                        $html .= $buttonRender($botao);
                        $html .= '</div>';
                    }
                    if (!is_null($element->getOption('remove_button'))) {
                        $buttonRender = $this->getView()->plugin('formButton');
                        $botao = $element->getOption('remove_button');
                        if (!$botao instanceof \Zend\Form\Element\Button) {
                            $factory = new \Zend\Form\Factory();
                            $botao = $factory->createElement($botao);
                        }
                        $html .= '<div class="col-sm-3">';
                        $html .= $buttonRender($botao);
                        $html .= '</div>';
                    }
                } else {
                    $html.= $this->render($element);
                }
                $html.= '</fieldset>';
            } else {
                $html.= $this->renderElement($element);
            }
        }
        return $html;
    }

}