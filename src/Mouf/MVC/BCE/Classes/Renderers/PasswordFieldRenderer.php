<?php
namespace Mouf\MVC\BCE\Classes\Renderers;

use Mouf\MVC\BCE\Classes\Descriptors\FieldDescriptorInstance;
use Mouf\Html\Widgets\Form\TextField;
use Mouf\Html\Widgets\Form\PasswordField;
use Mouf\MVC\BCE\Classes\ValidationHandlers\BCEValidationUtils;

/**
 * Base class for rendering simple text fields
 * @Component
 */
class PasswordFieldRenderer extends BaseFieldRenderer implements SingleFieldRendererInterface, ViewFieldRendererInterface {
	
	/**
	 * Autocomplete the field in the form.
	 * 
	 * @Property
	 * @var boolean
	 */
	public $autocomplete = false;
	
	/**
	 * (non-PHPdoc)
	 * @see FieldRendererInterface::render()
	 */
	public function renderEdit($descriptorInstance){
		/* @var $descriptorInstance FieldDescriptorInstance */
		$fieldName = $descriptorInstance->getFieldName();
		$value = $descriptorInstance->getFieldValue();

		$textField = new PasswordField($descriptorInstance->fieldDescriptor->getFieldLabel(), $descriptorInstance->getFieldName(), $descriptorInstance->getFieldValue());
		if($descriptorInstance->getValidator()) {
			$textField->setInputClasses($descriptorInstance->getValidator());
		}
		$textField->getInput()->setId($descriptorInstance->getFieldName());
		$textField->getInput()->setReadonly((!$descriptorInstance->fieldDescriptor->canEdit()) ? "readonly" : null);
		if(isset($descriptorInstance->attributes['styles'])) {
			$textField->getInput()->setStyles($descriptorInstance->attributes['styles']);
		}

		$textField->getInput()->setAutocomplete($this->autocomplete ? "autocomplete='on'" : "autocomplete='off'");
		
		$textField->setHelpText($descriptorInstance->fieldDescriptor->getDescription());
		
		$textField->setRequired(BCEValidationUtils::hasRequiredValidator($descriptorInstance->fieldDescriptor->getValidators()));
		
		ob_start();
		$textField->toHtml();
		return ob_get_clean();
		
		return "<input ".$descriptorInstance->printAttributes()." type='password' ".($this->autocomplete ? "autocomplete='on'" : "autocomplete='off'")." value='' name='".$fieldName."' id='".$fieldName."'/>";
	}
	
	/**
	 * (non-PHPdoc)
	 * @see FieldRendererInterface::getJS()
	 */
	public function getJSEdit($descriptor, $bean, $id){
		/* @var $descriptorInstance FieldDescriptorInstance */
		return array();
	}
	
	public function renderView($descriptorInstance){
			/* @var $descriptorInstance FieldDescriptorInstance */
		return false;
	}
	
	public function getJSView($descriptor, $bean, $id){
			/* @var $descriptorInstance FieldDescriptorInstance */
		return array();
	}
	
}