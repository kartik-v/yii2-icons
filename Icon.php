<?php

/**
 * @copyright Copyright &copy; Kartik Visweswaran, Krajee.com, 2014 - 2015
 * @package yii2-icons
 * @version 1.4.0
 */

namespace kartik\icons;

use Yii;
use yii\helpers\Html;
use yii\base\InvalidConfigException;

/**
 * Icon is a class for setting up icon frameworks to work with Yii in an easy way
 * To setup a global default icon framework, you can set the Yii param 'icon-framework'
 * to one of the following values in your config file:
 * - 'bsg' for Bootstrap Glyphicons
 * - 'fa' for Font Awesome Icons
 * - 'el' for Elusive Font Icons
 * - 'typ' for Typicon Font Icons
 * - 'whhg' for Web Hosting Hub Glyphs Icons
 * - 'jui' for JQuery UI Icons
 * - 'uni' for Unicode Icons
 * - 'oct' for Github Octicons
 * - 'si' for Socicon Icons
 * - 'fi' for FlagIcon Icons
 *
 * @author Kartik Visweswaran <kartikv2@gmail.com>
 */
class Icon
{

    const NS = '\\kartik\\icons\\';
    const PARAM_NOT_SET = "The 'icon-framework' option has not been setup in Yii params. Check your configuration file.";
    const PARAM_INVALID = "Invalid or non-recognized 'icon-framework' has been setup in Yii params. Check your configuration file.";
    const FRAMEWORK_INVALID = "Invalid or non-existing framework '{framework}' called in your {method}() method.";

    /**
     * Icon framework constants
     */
    const BSG = 'bsg';
    const FA = 'fa';
    const EL = 'el';
    const TYP = 'typ';
    const WHHG = 'whhg';
    const JUI = 'jui';
    const UNI = 'uni';
    const SI = 'si';
    const OCT = 'oct';
    const FI = 'fi';

    /**
     * Icon framework configurations
     */
    private static $_frameworks = [
        self::BSG => ['prefix' => 'glyphicon glyphicon-', 'class' => '\\yii\\bootstrap\\BootstrapAsset'],
        self::FA => ['prefix' => 'fa fa-', 'class' => 'FontAwesomeAsset'],
        self::EL => ['prefix' => 'el-icon-', 'class' => 'ElusiveAsset'],
        self::TYP => ['prefix' => 'typcn typcn-', 'class' => 'TypiconsAsset'],
        self::WHHG => ['prefix' => 'icon-', 'class' => 'WhhgAsset'],
        self::JUI => ['prefix' => 'ui-icon ui-icon-', 'class' => 'JuiAsset'],
        self::UNI => ['prefix' => 'uni uni-', 'class' => 'UniAsset'],
        self::SI => ['prefix' => 'socicon socicon-', 'class' => 'SociconAsset'],
        self::OCT => ['prefix' => 'octicon octicon-', 'class' => 'OcticonsAsset'],
        self::FI => ['prefix' => 'flag-icon flag-icon-', 'class' => 'FlagIconAsset'],
    ];

    /**
     * Returns the font framework setup from Yii parameters.
     *
     * @var string the framework to be used with the application
     * @throws InvalidConfigException
     */
    protected static function getFramework($framework = null, $method = 'show')
    {
        if (strlen($framework) > 0 && !in_array($framework, array_keys(self::$_frameworks))) {
            $replace = ['{framework}' => $framework, '{method}' => 'Icon::' . $method];
            throw new InvalidConfigException(strtr(self::FRAMEWORK_INVALID, $replace));
        }
        if (strlen($framework) > 0) {
            return $framework;
        }
        if (strlen($framework) == 0 && empty(Yii::$app->params['icon-framework'])) {
            throw new InvalidConfigException(self::PARAM_NOT_SET);
        }
        if (!in_array(Yii::$app->params['icon-framework'], array_keys(self::$_frameworks))) {
            throw new InvalidConfigException(self::PARAM_INVALID);
        }
        return Yii::$app->params['icon-framework'];
    }

    /**
     * Maps the icon framework to the current view. Call this in your view or layout file.
     *
     * @param object $view the view object
     * @param string $framework the name of the framework, if not passed it will default to
     * the Yii config param 'icon-framework'
     */
    public static function map($view, $framework = null)
    {
        $key = static::getFramework($framework, 'map');
        $class = self::$_frameworks[$key]['class'];
        if (substr($class, 0, 1) != '\\') {
            $class = self::NS . $class;
        }

        $class::register($view);
    }

    /**
     * Displays an icon for a specific framework.
     *
     * @param string  $name the icon name
     * @param array   $options the HTML attributes for the icon
     * @param string  $framework the icon framework name. If not passed will default to the
     * `icon-framework` param set in Yii Configuration file. Will throw an InvalidConfigException
     * if neither of the two is available.
     * @param boolean $space whether to place a space after the icon, defaults to true
     * @param string  $tag the HTML tag to wrap the icon (defaults to `i`)
     *
     * @return string the HTML formatted icon
     */
    public static function show($name, $options = [], $framework = null, $space = true, $tag = 'i')
    {
        $key = static::getFramework($framework);
        $class = self::$_frameworks[$key]['prefix'] . $name;
        Html::addCssClass($options, $class);
        return Html::tag($tag, '', $options) . ($space ? ' ' : '');
    }

    /**
     * Displays an icon stack as supported by frameworks like Font Awesome
     *
     * @see http://fontawesome.io/examples/#stacked
     *
     * @param string  $name2 the icon name in stack 2x
     * @param string  $name1 the icon name in stack 1x
     * @param array   $options the HTML attributes for the icon stack container
     * @param array   $options2 the HTML attributes for the icon in stack 1x
     * @param array   $options1 the HTML attributes for the icon in stack 2x
     * @param boolean $invert whether to invert the order of stack 2x and 1x and place stack-1x
     * before stack-2x. Defaults to `false`.
     * @param string  $framework the icon framework name. If not passed will default to the
     * `icon-framework` param set in Yii Configuration file. Will throw an InvalidConfigException
     * if neither of the two is available.
     * @param boolean $space whether to place a space after the icon, defaults to true
     * @param string  $tag the html tag to wrap the icon (defaults to 'i')
     * @param string  $stackTag the html tag to wrap the stack container (defaults to `span`)
     * @param string  $stackPrefix the CSS prefix string for the stack container (defaults to `fa-stack`)
     *
     * @return string the html formatted icon
     */
    public static function showStack(
        $name1,
        $name2,
        $options = [],
        $options1 = [],
        $options2 = [],
        $invert = false,
        $framework = null,
        $space = true,
        $tag = 'i',
        $stackTag = 'span',
        $stackPrefix = 'fa-stack'
    ) {
        $key = static::getFramework($framework);
        Html::addCssClass($options1, $stackPrefix . '-1x');
        Html::addCssClass($options2, $stackPrefix . '-2x');
        Html::addCssClass($options, $stackPrefix);
        $icon1 = static::show($name1, $options1, $framework, $space, $tag);
        $icon2 = static::show($name2, $options2, $framework, $space, $tag);
        $icon = $invert ? $icon1 . "\n" . $icon2 : $icon2 . "\n" . $icon1;
        return Html::tag($stackTag, $icon, $options) . ($space ? ' ' : '');
    }

}