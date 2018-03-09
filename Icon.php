<?php

/**
 * @copyright Copyright &copy; Kartik Visweswaran, Krajee.com, 2014 - 2018
 * @package yii2-icons
 * @version 1.4.4
 */

namespace kartik\icons;

use Yii;
use yii\helpers\Html;
use yii\base\InvalidConfigException;
use yii\web\View;
use kartik\base\AssetBundle;

/**
 * Icon is a class for setting up icon frameworks to work with Yii in an easy way
 * To setup a global default icon framework, you can set the Yii param 'icon-framework'
 * to one of the following values in your config file:
 *
 * - 'bsg' for Bootstrap Glyphicons
 * - 'fa' for Font Awesome Icons
 * - 'fa5free' for Font Awesome 5 Free Icons
 * - 'fa5pro' for Font Awesome 5 Pro Icons
 * - 'el' for Elusive Font Icons
 * - 'typ' for Typicon Font Icons
 * - 'whhg' for Web Hosting Hub Glyphs Icons
 * - 'jui' for JQuery UI Icons
 * - 'uni' for Unicode Icons
 * - 'oct' for Github Octicons
 * - 'si' for Socicon Icons
 * - 'fi' for FlagIcon Icons
 * - 'oi' for Open Iconic Icons
 * - 'icf' for IcoFont Icons
 *
 * @author Kartik Visweswaran <kartikv2@gmail.com>
 */
class Icon
{
    /**
     * Icons Namespace
     */
    const NS = '\\kartik\\icons\\';
    /**
     * Exception message displayed when `icon-framework` has not been setup in Yii2 Params Configuration file.
     */
    const PARAM_NOT_SET = "The 'icon-framework' option has not been setup in Yii params. Check your configuration file.";
    /**
     * Exception message displayed when `icon-framework` has an invalid configuration in Yii2 Params Configuration file.
     */
    const PARAM_INVALID = "Invalid or non-recognized 'icon-framework' has been setup in Yii params. Check your configuration file.";
    /**
     * Exception message displayed when an invalid icon framework has been detected by the [[getFramework]] method.
     */
    const FRAMEWORK_INVALID = "Invalid or non-existing framework '{framework}' called in your {method}() method.";
    /**
     * Bootstrap Glyphicons
     */
    const BSG = 'bsg';
    /**
     * Font Awesome Icons
     */
    const FA = 'fa';
    /**
     * Font Awesome Icons
     */
    const FA5FREE = 'fa5free';
    /**
     * Font Awesome Icons
     */
    const FA5PRO = 'fa5pro';
    /**
     * Elusive Icons
     */
    const EL = 'el';
    /**
     * TypIcon Icons
     */
    const TYP = 'typ';
    /**
     * Web Hosting Hub Glyphs
     */
    const WHHG = 'whhg';
    /**
     * JQuery UI Icons
     */
    const JUI = 'jui';
    /**
     * Krajee Unicode Icons
     */
    const UNI = 'uni';
    /**
     * SocIcon Icons
     */
    const SI = 'si';
    /**
     * Github Octicons
     */
    const OCT = 'oct';
    /**
     * FlagIcon Icons
     */
    const FI = 'fi';
    /**
     * OpenIconic Icons
     */
    const OI = 'oi';
    /**
     * IcoFont Icons
     */
    const ICF = 'icf';
    /**
     * Icon framework configurations
     */
    private static $_frameworks = [
        self::BSG => ['prefix' => 'glyphicon glyphicon-', 'class' => '\\yii\\bootstrap\\BootstrapAsset'],
        self::FA => ['prefix' => 'fa fa-', 'class' => 'FontAwesomeAsset'],
        self::FA5FREE => ['prefix' => ' fa-', 'class' => 'FontAwesomeFreeAsset'],
        self::FA5PRO => ['prefix' => ' fa-', 'class' => 'FontAwesomeProAsset'],
        self::EL => ['prefix' => 'el el-', 'class' => 'ElusiveAsset'],
        self::TYP => ['prefix' => 'typcn typcn-', 'class' => 'TypiconsAsset'],
        self::WHHG => ['prefix' => 'icon-', 'class' => 'WhhgAsset'],
        self::JUI => ['prefix' => 'ui-icon ui-icon-', 'class' => 'JuiAsset'],
        self::UNI => ['prefix' => 'uni uni-', 'class' => 'UniAsset'],
        self::SI => ['prefix' => 'socicon socicon-', 'class' => 'SociconAsset'],
        self::OCT => ['prefix' => 'octicon octicon-', 'class' => 'OcticonsAsset'],
        self::FI => ['prefix' => 'flag-icon flag-icon-', 'class' => 'FlagIconAsset'],
        self::OI => ['prefix' => 'oi oi-', 'class' => 'OpenIconicAsset'],
        self::ICF => ['prefix' => 'icofont icofont-', 'class' => 'IcoFontAsset'],
    ];

    /**
     * Add a custom icon set to the icon frameworks
     *
     * @param string $key the key used to identify the icon set
     * @param array $config the icon configuration
     */
    public static function addFramework($key, $config)
    {
        self::$_frameworks[$key] = $config;
    }

    /**
     * Returns the key for css framework set (or parses framework setup in Yii parameters)
     *
     * @var string $framework the framework to be used with the application
     * @var string $method the method in the Icon class (defaults to `show`)
     * @returns string the icon framework key
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
     * Returns the prefix for the css framework set (or parses framework setup in Yii parameters)
     *
     * @var string the framework to be used with the application
     * @var string $method the method in the Icon class (defaults to `show`)
     * @returns string the icon framework key
     */
    public static function getFrameworkPrefix($framework = null, $method = 'show')
    {
        $key = static::getFramework($framework, $method);
        return self::$_frameworks[$key]['prefix'];
    }

    /**
     * Maps the icon framework to the current view. Call this in your view or layout file.
     *
     * @param View $view the view object
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
        /**
         * @var AssetBundle $class
         */
        $class::register($view);
    }

    /**
     * Displays an icon for a specific framework.
     *
     * @param string $name the icon name
     * @param array $options the HTML attributes for the icon
     * @param string $framework the icon framework name. If not passed will default to the `icon-framework` param set
     *     in Yii Configuration file. Will throw an InvalidConfigException if neither of the two is available.
     * @param boolean $space whether to place a space after the icon, defaults to true
     * @param string $tag the HTML tag to wrap the icon (defaults to `i`).
     * @param string $fa5 the base class for FontAwesome5 (fas, far, fal or fab, defaults to fas).
     *
     * @return string the HTML formatted icon
     */
    public static function show($name, $options = [], $framework = null, $space = true, $tag = 'i', $fa5 = 'fas')
    {
        $tag = $tag === null ? 'i' : $tag;
        $class = (substr(static::getFramework($framework), 0,
                3) == 'fa5' ? $fa5 : '') . self::getFrameworkPrefix($framework) . $name;
        Html::addCssClass($options, $class);
        return Html::tag($tag, '', $options) . ($space ? ' ' : '');
    }

    /**
     * Displays an icon stack as supported by frameworks like Font Awesome
     *
     * @see http://fontawesome.io/examples/#stacked
     *
     * @param string $name2 the icon name in stack 2x
     * @param string $name1 the icon name in stack 1x
     * @param array $options the HTML attributes for the icon stack container
     * @param array $options2 the HTML attributes for the icon in stack 1x
     * @param array $options1 the HTML attributes for the icon in stack 2x
     * @param boolean $invert whether to invert the order of stack 2x and 1x and place stack-1x before stack-2x.
     * Defaults to `false`.
     * @param string $framework the icon framework name. If not passed will default to the `icon-framework` param set
     * in Yii Configuration file. Will throw an InvalidConfigException if neither of the two is available.
     * @param boolean $space whether to place a space after the icon, defaults to `true`.
     * @param string $tag the html tag to wrap the icon (defaults to 'i').
     * @param string $stackTag the html tag to wrap the stack container (defaults to `span`).
     * @param string $stackPrefix the CSS prefix string for the stack container (defaults to `fa-stack`).
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
        Html::addCssClass($options1, $stackPrefix . '-1x');
        Html::addCssClass($options2, $stackPrefix . '-2x');
        Html::addCssClass($options, $stackPrefix);
        $icon1 = static::show($name1, $options1, $framework, $space, $tag);
        $icon2 = static::show($name2, $options2, $framework, $space, $tag);
        $icon = $invert ? $icon1 . "\n" . $icon2 : $icon2 . "\n" . $icon1;
        return Html::tag($stackTag, $icon, $options) . ($space ? ' ' : '');
    }

    /**
     * Displays an icon layer stack as supported by Font Awesome 5
     *
     * @see https://fontawesome.com/how-to-use/svg-with-js#layering
     *
     * @param array $items the icons to be displayed in the layer, each of which is array
     * `['name'=>'play', 'style'=>'fas', 'options' => [], 'text' => NULL, 'tag' => NULL]`:
     * - `name`: _string_, the name for the icon; or layers-text for text or layers-counter for counter
     * - `options`: _array_, the html attributes configuration for the icon in the layer
     * - `text`: _string_, the text within the span container
     * - `tag`: _string_, the HTML tag for the icon, default `i` for non-text layers and `span` for text layers
     * @param array $options the html options for the layers container
     * @param boolean $space whether to place a space after the icon, defaults to `true`.
     * @param string $tag the html tag to wrap the layers (defaults to 'span').
     *
     * @return string the html formatted icon
     */
    public static function showLayers($items = [], $options = [], $space = true, $tag = 'span')
    {
        if (empty($items)) {
            return '';
        }
        $layers = '';
        foreach ($items as $item) {
            if (!array_key_exists('name', $item) || empty($item['name'])) {
                continue; //Nothing to display
            }
            $itemTag = array_key_exists('tag', $item) ? $item['tag'] : (array_key_exists('text',
                $item) && !empty($item['text']) ? 'span' : 'i');
            $style = array_key_exists('style', $item) ? $item['style'] : 'fas'; //fas works always with FREE
            $class = $style . ' fa-' . $item['name'];
            $itemOptions = array_key_exists('options', $item) ? $item['options'] : [];
            Html::addCssClass($itemOptions, $class);
            $layers .= Html::tag($itemTag, '', $itemOptions) . "\n";
        }
        Html::addCssClass($options, ['fa-layers', 'fa-fw']);
        return Html::tag($tag, $layers, $options) . ($space ? ' ' : '');
    }
}