<h1 align="center">
    <a href="http://demos.krajee.com" title="Krajee Demos" target="_blank">
        <img src="http://kartik-v.github.io/bootstrap-fileinput-samples/samples/krajee-logo-b.png" alt="Krajee Logo"/>
    </a>
    <br>
    yii2-icons
    <hr>
    <a href="https://www.paypal.com/cgi-bin/webscr?cmd=_s-xclick&hosted_button_id=DTP3NZQ6G2AYU"
       title="Donate via Paypal" target="_blank">
        <img src="http://kartik-v.github.io/bootstrap-fileinput-samples/samples/donate.png" alt="Donate"/>
    </a>
</h1>

[![Latest Stable Version](https://poser.pugx.org/kartik-v/yii2-icons/v/stable)](https://packagist.org/packages/kartik-v/yii2-icons)
[![Latest Unstable Version](https://poser.pugx.org/kartik-v/yii2-icons/v/unstable)](https://packagist.org/packages/kartik-v/yii2-icons)
[![License](https://poser.pugx.org/kartik-v/yii2-icons/license)](https://packagist.org/packages/kartik-v/yii2-icons)
[![Total Downloads](https://poser.pugx.org/kartik-v/yii2-icons/downloads)](https://packagist.org/packages/kartik-v/yii2-icons)
[![Monthly Downloads](https://poser.pugx.org/kartik-v/yii2-icons/d/monthly)](https://packagist.org/packages/kartik-v/yii2-icons)
[![Daily Downloads](https://poser.pugx.org/kartik-v/yii2-icons/d/daily)](https://packagist.org/packages/kartik-v/yii2-icons)

This extension offers an easy method to setup various icon frameworks to work with Yii Framework 2.0. Most popular and free icon frameworks available are currently supported. This list may be extended in future based on demand and feedback.

1. [Bootstrap Glyphicons](http://getbootstrap.com/components/#glyphicons)
2. [Font Awesome](https://fontawesome.com/icons)
3. [Unicode Icons](http://demos.krajee.com/uni-icons/): A collection of unicode symbols made available as CSS icons by Krajee
4. [Elusive Icons](http://elusiveicons.com/icons/)
5. [Typicons](http://typicons.com/)
6. [Web Hosting Hub Glyphs](http://www.webhostinghub.com/glyphs/)
7. [JQuery UI Icons](http://api.jqueryui.com/theming/icons/)
8. [Socicon Icons](http://www.socicon.com/): Needs you to add attribution to the icon source.
9. [Octicons](https://octicons.github.com/): The Github icons collection.
10. [Flag-Icons](http://lipis.github.io/flag-icon-css/)
11. [Open Iconic Icons](https://useiconic.com/open#icons)
12. [IcoFont Icons](http://icofont.com/)

### Demo

You can see a [demonstration here](http://demos.krajee.com/icons) on usage of this extension with documentation and examples.

## Installation

The preferred way to install this extension is through [composer](http://getcomposer.org/download/).

> Note: Check the [composer.json](https://github.com/kartik-v/yii2-icons/blob/master/composer.json) for this extension's requirements and dependencies. 
Read this [web tip /wiki](http://webtips.krajee.com/setting-composer-minimum-stability-application/) on setting the `minimum-stability` settings for your application's composer.json.

Either run

```
$ php composer.phar require kartik-v/yii2-icons "@dev"
```

or add

```
"kartik-v/yii2-icons": "@dev"
```

to the `require` section of your `composer.json` file.

## Usage

### Global Setup

In case you wish to setup one Icon framework globally, set the parameter `icon-framework` in the `params` array of your Yii Configuration File.

```php
'params' => [
  'icon-framework' => \kartik\icons\Icon::FAS,  // Font Awesome Icon framework
]
```
To initialize the globally setup framework in your view, call this code in your view or view layout file.

```php
use kartik\icons\Icon;
Icon::map($this);  
```

### Per View Setup

You can also call each icon-framework individually in your view or view layout like below. Map any icon framework within each view as in the example below.

```php
use kartik\icons\Icon;
Icon::map($this, Icon::EL); // Maps the Elusive icon font framework
```

### Displaying Icons

After mapping your icon framework with one of the options above, you can display icons using `Icon::show` method. Icons can be displayed using one of the options below:

```php
use kartik\icons\Icon;

// Option 1: Uses the `icon-framework` setup in Yii config params. 
echo Icon::show('user'); 

// Option 2: Specific Icon Call in a view. Additional options can also be passed to style the icon.
echo Icon::show('user', ['class'=>'fa-2x', 'framework' => Icon::FAS]); 
```

> NOTE:
> The `kartik\icons\Icon::show` method outputs a HTML formatted text. So in order to display icons in Yii-2 components like Navbar or Nav, you must set `encodeLabels` to false. 

```php
$items = [
    ['label' => Icon::show('home') . 'Home', 'url' => ['/site/index']],
];

// Your other code

/* Note you must encodeLabels to false to display icons in labels */
echo \kartik\nav\NavX::widget([
    'items' => $items,
    'encodeLabels' => false
]);

// Your other code
```

### Displaying Stacked Icons

You can also display stacked icons for frameworks like Font Awesome, where this is supported. For example:

```php
use kartik\icons\Icon;
// fa-twitter on fa-square
 Icon::showStack('twitter', 'square', ['class'=>'fa-lg'], ['framework' => Icon::FAB], ['framework' => Icon::FAR])

// fa-flag on fa-circle
 Icon::showStack('flag', 'circle', ['class'=>'fa-lg'], ['class'=>'fa-inverse']);
```

### Add Custom Icons

You can add custom icon sets to the list of available frameworks.

```php
use kartik\icons\Icon;
// add framework
Icon::addFramework('custom', [
    'class' => '\common\icons\CustomIconAsset',
    'prefix' => 'custom-icon',
]);

// map to view file
Icon::map($this, 'custom');

// show the icon
echo Icon::show('menu',['framework' => 'custom']);
```

```php
namespace common\icons;
class CustomIconAsset extends \yii\web\AssetBundle
{
    public $sourcePath = '@common/icons/assets/custom';
    public $depends = array(
        'yii\web\YiiAsset',
        'yii\bootstrap4\BootstrapAsset'
    );
    public $css=[
        'css/animation.css',
        'css/custom-codes.css',
        'css/custom-embedded.css',
        'css/custom-ie7.css',
        'css/custom-ie7-codes.css',
        'css/custom.css',
    ];
}
```
The above asset bundle uses files genereted by http://fontello.com/.

## License

**yii2-icons** is released under the BSD-3-Clause License. See the bundled `LICENSE.md` for details.
