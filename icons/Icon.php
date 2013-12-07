<?php
namespace kartik\icons;
use Yii;
use yii\helpers\Html;
use yii\base\InvalidConfigException;

/**
 * Icon is a class for setting up icon frameworks to work with Yii in an easy way
 * You must set Yii param 'icon-framework' to one of the following in your config file:
 * - 'fa' for Font Awesome Icons
 * - 'el' for Elusive Font Icons
 * - 'typ' for Typicon Font Icons
 * - 'jui' for JQuery UI Icons
 * 
 * @author Kartik Visweswaran <kartikv2@gmail.com>
 */
class Icon 
{
	const FONTAWESOME = 'fa';
	const ELUSIVE = 'el';
	const TYPICON = 'typ';
	const JQUERYUI = 'jui';
	
	const PARAM_NOT_SET = "The 'icon-framework' option has not been setup in Yii params. Check your configuration file.";
	const PARAM_INVALID = "Invalid or non-recognized 'icon-framework' has been setup in Yii params. Check your configuration file.";
	
	static $frameworks = [
		static::FONTAWESOME => ['prefix' => 'fa fa-', 'class' => 'FontAwesomeAsset'],
		static::ELUSIVE => ['prefix' => 'el-', 'class' => 'ElusiveAsset'],
		static::TYPICON => ['prefix' => 'typcn typcn-', 'class' => 'TypiconsAsset'],
		static::JQUERYUI => ['prefix' => 'ui-icon ui-icon-', 'class' => '\\yii\\jui\\ThemeAsset'],
	];
	
	/**
	 * Returns the font framework setup from Yii parameters.
	 *
	 * @var string the framework to be used with the application
	 * @throws InvalidConfigException
	 */
	protected static function getFramework() {
		if (empty(Yii::$app->params['icon-framework'])) {
			throw new InvalidConfigException(static::PARAM_NOT_SET);
		}
		if (!in_array(Yii::$app->params['icon-framework'], static::$frameworks)) {
			throw new InvalidConfigException(static::PARAM_INVALID);
		}
		return Yii::$app->params['icon-framework'];
	}
	
	/**
	 * Sets the icon framework. Call this in your view layout file.
	 *
	 * @param object $view the view object to call the
	 */
	public static function framework($view)
	{
		$key = static::getFramework();
		$class = static::$frameworks[$key]['class'];
		$class::register($view);
	}

	/**
	 * Displays an icon based for a specific framework set in Yii Config Params.
	 *
	 * @param string $name the icon name
	 * @param string $tag the html tag to wrap the icon (defaults to 'i')
	 * @return string the html formatted icon
	 */	
	public static function render($name, $tag = 'i') {
		$key = static::getFramework();
		$class = static::$frameworks[$key]['prefix'] . $name;
		return Html::tag($tag, '', ['class' => $class]);
	}
}