<?php

/**
 * @copyright Copyright &copy; Kartik Visweswaran, Krajee.com, 2014 - 2022
 * @package yii2-icons
 * @version 1.4.8
 */

namespace kartik\icons;

use kartik\base\Lib;
use Yii;
use yii\helpers\ArrayHelper;
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
 * - 'fa_' for Font Awesome Icons 
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
     * @var string Icons Namespace
     */
    const NS = '\\kartik\\icons\\';
    /**
     * @var string Exception message displayed when `icon-framework` has not been setup in Yii2 Params Configuration file.
     */
    const PARAM_NOT_SET = "The 'icon-framework' option has not been setup in Yii params. Check your configuration file.";
    /**
     * @var string Exception message displayed when `icon-framework` has an invalid configuration in Yii2 Params Configuration file.
     */
    const PARAM_INVALID = "Invalid or non-recognized 'icon-framework' has been setup in Yii params. Check your configuration file.";
    /**
     * @var string Exception message displayed when an invalid icon framework has been detected by the [[getFramework]] method.
     */
    const FRAMEWORK_INVALID = "Invalid or non-existing framework '{framework}' called in your {method}() method.";
    /**
     * @var string Bootstrap Glyphicons
     */
    const BSG = 'bsg';
    /**
     * @var string Font Awesome Icons Solid
     */
    const FA = 'fa';
    /**
     * @var string Font Awesome Icons Solid
     */
    const FAS = 'fas';
    /**
     * @var string Font Awesome Icons Regular
     */
    const FAR = 'far';
    /**
     * @var string Font Awesome Icons Brand
     */
    const FAB = 'fab';
    /**
     * @var string Font Awesome Icons Duotone
     */
    const FAD = 'faD';
    /**
     * @var string Font Awesome Icons Light
     */
    const FAL = 'fal';
    /**
     * @var string Elusive Icons
     */
    const EL = 'el';
    /**
     * @var string TypIcon Icons
     */
    const TYP = 'typ';
    /**
     * @var string Web Hosting Hub Glyphs
     */
    const WHHG = 'whhg';
    /**
     * @var string JQuery UI Icons
     */
    const JUI = 'jui';
    /**
     * @var string Krajee Unicode Icons
     */
    const UNI = 'uni';
    /**
     * @var string SocIcon Icons
     */
    const SI = 'si';
    /**
     * @var string Github Octicons
     */
    const OCT = 'oct';
    /**
     * @var string FlagIcon Icons
     */
    const FI = 'fi';
    /**
     * @var string OpenIconic Icons
     */
    const OI = 'oi';
    /**
     * @var string IcoFont Icons
     */
    const ICF = 'icf';
    /**
     * @var string Icon framework configurations
     */
    private static $_frameworks = [
        self::BSG => ['prefix' => 'glyphicon glyphicon-', 'class' => '\\yii\\bootstrap\\BootstrapAsset'],
        self::FA => ['prefix' => 'fa fa-', 'class' => 'FontAwesomeAsset'],
        self::FAS => ['prefix' => 'fas fa-', 'class' => 'FontAwesomeAsset'],
        self::FAR => ['prefix' => 'far fa-', 'class' => 'FontAwesomeAsset'],
        self::FAB => ['prefix' => 'fab fa-', 'class' => 'FontAwesomeAsset'],
        self::FAD => ['prefix' => 'fad fa-', 'class' => 'FontAwesomeAsset'],
        self::FAL => ['prefix' => 'fal fa-', 'class' => 'FontAwesomeAsset'],
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
     * @return string
     */
    protected static function getFramework($framework = null, $method = 'show')
    {
        $len = Lib::strlen($framework);
        if ($len > 0 && !in_array($framework, array_keys(self::$_frameworks))) {
            $replace = ['{framework}' => $framework, '{method}' => 'Icon::' . $method];
            throw new InvalidConfigException(Lib::strtr(self::FRAMEWORK_INVALID, $replace));
        }
        if ($len > 0) {
            return $framework;
        }
        if ($len === 0 && empty(Yii::$app->params['icon-framework'])) {
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
     * @return string the icon framework key
     * @throws InvalidConfigException
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
     * @throws InvalidConfigException
     */
    public static function map($view, $framework = null)
    {
        $key = static::getFramework($framework, 'map');
        $class = self::$_frameworks[$key]['class'];
        if (Lib::substr($class, 0, 1) != '\\') {
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
     * @param array $options the HTML attributes for the icon. The following special attributes are supported:
     * - `framework`: string, the icon framework name. If not passed will default to the `icon-framework` param set
     *     in Yii Configuration file. Will throw an InvalidConfigException if neither of the two is available.
     * - `space`: _boolean_, whether to place a space after the icon, defaults to true
     * - `tag`: _string_, the HTML tag to wrap the icon (defaults to `i`).
     * @param string $framework deprecated since v1.4.5 (use/see $options above)
     * @param bool $space deprecated since v1.4.5 (use/see $options above)
     * @param string $tag deprecated since v1.4.5 (use/see $options above)
     * @param string $fa5 deprecated since v1.4.5
     *
     * @return string the HTML formatted icon
     * @throws InvalidConfigException
     */
    public static function show($name, $options = [], $framework = null, $space = true, $tag = 'i', $fa5 = 'fas')
    {
        $framework = ArrayHelper::remove($options, 'framework', $framework);
        $space = ArrayHelper::remove($options, 'space', $space);
        $tag = ArrayHelper::remove($options, 'tag', $tag);
        $class = self::getFrameworkPrefix($framework) . $name;
        Html::addCssClass($options, $class);
        return Html::tag($tag, '', $options) . ($space ? ' ' : '');
    }

    /**
     * Displays an icon stack as supported by frameworks like Font Awesome
     *
     * @see http://fontawesome.io/examples/#stacked
     *
     * @param string $name1 the icon name in stack 1x
     * @param string $name2 the icon name in stack 2x
     * @param array $options the HTML attributes for the icon stack container. The following special attributes
     * are supported:
     * - `invert`: _bool_, whether to invert the order of stack 2x and 1x and place stack-1x before stack-2x.
     * Defaults to `false`.
     * - `tag`: _string_, the html tag to wrap the stack container (defaults to `span`).
     * - `prefix`: _string_, the CSS prefix string for the stack container (defaults to `fa-stack`).
     * - `space`: _boolean_, whether to place a space after the icon, defaults to true
     * @param array $options1 the HTML attributes for the icon in stack 1x. The following special attributes
     * are supported:
     * - `framework`: string, the icon framework name. If not passed will default to the `icon-framework` param set
     *     in Yii Configuration file. Will throw an InvalidConfigException if neither of the two is available.
     * - `space`: _boolean_, whether to place a space after the icon, defaults to `true`.
     * - `tag`: _string_, the HTML tag to wrap the icon (defaults to `i`).
     * @param array $options2 the HTML attributes for the icon in stack 2x. The following special attributes
     * are supported:
     * - `framework`: string, the icon framework name. If not passed will default to the `icon-framework` param set
     *     in Yii Configuration file. Will throw an InvalidConfigException if neither of the two is available.
     * - `space`: _boolean_, whether to place a space after the icon, defaults to `true`.
     * - `tag`: _string_, the HTML tag to wrap the icon (defaults to `i`).
     * @return string the html formatted icon
     * @throws InvalidConfigException
     */
    public static function showStack($name1, $name2, $options = [], $options1 = [], $options2 = []) {
        $invert = ArrayHelper::remove($options, 'invert', false);
        $space = ArrayHelper::remove($options, 'space', false);
        $prefix = ArrayHelper::remove($options, 'prefix', 'fa-stack');
        $tag = ArrayHelper::remove($options, 'tag', 'span');
        Html::addCssClass($options1, $prefix . '-1x');
        Html::addCssClass($options2, $prefix . '-2x');
        Html::addCssClass($options, $prefix);
        $icon1 = static::show($name1, $options1);
        $icon2 = static::show($name2, $options2);
        $icon = $invert ? $icon1 . "\n" . $icon2 : $icon2 . "\n" . $icon1;
        return Html::tag($tag, $icon, $options) . ($space ? ' ' : '');
    }

    /**
     * Displays an icon layer stack as supported by Font Awesome 5
     *
     * @see https://fontawesome.com/how-to-use/svg-with-js#layering
     *
     * @param array $items the icons to be displayed in the layer, each of which is an array consisting of following
     * configuration e.g. `['name'=>'play', 'framework' => Icon::FAS, 'options' => [], 'text' => NULL, 'tag' => NULL]`:
     * - `name`: _string_, the name for the icon; or layers-text for text or layers-counter for counter
     * - `text`: _string_, the text within the span container
     * - `framework`: string, the icon framework name to use for determining icon prefixes. If not set will default to
     *    `Icon::FAS`. Will throw an InvalidConfigException if the framework set is invalid.
     * - `tag`: _string_, the HTML tag for the icon, defaults to `i` for non-text layers and `span` for text layers
     * - `options`: _array_, the html attributes for the layer item container
     * @param array $options the html attributes for the layers main container. The following special attributes
     * are supported:
     * - `space`: _boolean_, whether to place a space after the icon, defaults to `true`.
     * - `tag`: _string_, the HTML tag to wrap the icon (defaults to `span`).
     *
     * @return string the html formatted icon
     * @throws InvalidConfigException
     */
    public static function showLayers($items = [], $options = [])
    {
        if (empty($items)) {
            return '';
        }
        $layers = '';
        foreach ($items as $item) {
            $name = ArrayHelper::getValue($item, 'name', '');
            $text = ArrayHelper::getValue($item, 'text', '');
            if (empty($name) && empty($text)) {
                continue;
            }
            $framework = ArrayHelper::remove($item, 'framework', Icon::FAS);
            $prefix = static::getFrameworkPrefix($framework);
            $itemTag = ArrayHelper::getValue($item, 'tag', empty($text) ? 'i' : 'span');
            $itemOptions = ArrayHelper::getValue($item, 'options', []);
            if (!empty($text) && !isset($itemOptions['class'])) {
                $itemOptions['class'] = 'fa-layers-text';
            }
            if (empty($text)) {
                Html::addCssClass($itemOptions, $prefix . $name);
            }
            $layers .= Html::tag($itemTag, $text, $itemOptions) . "\n";
        }
        $tag = ArrayHelper::remove($options, 'tag', 'span');
        $space = ArrayHelper::remove($options, 'space', true);
        Html::addCssClass($options, ['fa-layers', 'fa-fw']);
        return Html::tag($tag, $layers, $options) . ($space ? ' ' : '');
    }
}