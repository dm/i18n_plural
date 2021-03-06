<?php
/**
 * @package    Plurals
 * @category   Unit tests
 * @author     Korney Czukowski
 * @copyright  (c) 2012 Korney Czukowski
 * @license    MIT License
 */
namespace I18n;

abstract class Testcase extends \Kohana_Unittest_Testcase
{
	protected $object;
	protected static $initial_lang;

	public static function setUpBeforeClass()
	{
		self::$initial_lang = \I18n::lang();
	}

	public static function tearDownAfterClass()
	{
		\I18n::lang(self::$initial_lang);
	}

	public function setup_object()
	{
		$class = new \ReflectionClass($this->class_name());
		$this->object = $class->newInstanceArgs($this->_object_constructor_arguments());		
	}

	public function class_name()
	{
		return preg_replace('#Test$#', '', get_class($this));
	}

	protected function _object_constructor_arguments()
	{
		return array();
	}
}