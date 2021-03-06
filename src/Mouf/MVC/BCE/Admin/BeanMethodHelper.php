<?php
namespace Mouf\MVC\BCE\Admin;
/**
 * These classes are simple stringifyed representations of the BCE elements.
 * 
 * It has no other use than providing autocompletion, in building the objects 
 * that will be used by the administration interface of BCE.
 * 
 * @author Kevin
 *
 */
class BeanMethodHelper {
	
	public $name;
	public $dbType;
	public $phpType;

	/**
	 * @var ForeignKeyDataBean
	 */
	public $fkData;
}