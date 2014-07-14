yii2-icons
==========

This extension offers an easy method to setup various icon frameworks to work with Yii Framework 2.0. Most popular and free icon frameworks available are currently supported. This list may be extended in future based on demand and feedback.

1. [Bootstrap Glyphicons](http://getbootstrap.com/components/#glyphicons)
1. [Font Awesome](http://fortawesome.github.io/Font-Awesome/)
2. [Elusive Icons](http://shoestrap.org/downloads/elusive-icons-webfont/)
3. [Typicons](http://typicons.com/)
4. [Web Hosting Hub Glyphs](http://www.webhostinghub.com/glyphs/)
5. [JQuery UI Icons](http://api.jqueryui.com/theming/icons/)
6. [Unicode Icons](http://demos.krajee.com/uni-icons/) A collection of unicode symbols made available as CSS icons by Krajee

> NOTE: This extension depends on the [kartik-v/yii2-widgets](https://github.com/kartik-v/yii2-widgets) extension which in turn depends on the
[yiisoft/yii2-bootstrap](https://github.com/yiisoft/yii2/tree/master/extensions/bootstrap) extension. It also depends on the 
[yiisoft/yii2-jui](https://github.com/yiisoft/yii2/tree/master/extensions/jui) extension. Check the 
[composer.json](https://github.com/kartik-v/yii2-icons/blob/master/composer.json) for this extension's requirements and dependencies. 
Note: Yii 2 framework is still in active development, and until a fully stable Yii2 release, your core yii2-bootstrap or yii2-jui packages 
(and its dependencies) may be updated when you install or update this extension. You may need to lock your composer package versions for your 
specific app, and test for extension break if you do not wish to auto update dependencies.

### Demo
You can see a [demonstration here](http://demos.krajee.com/icons) on usage of this extension with documentation and examples.

## Installation

The preferred way to install this extension is through [composer](http://getcomposer.org/download/).

> Note: You must set the `minimum-stability` to `dev` in the **composer.json** file in your application root folder before installation of this extension.

Either run

```
$ php composer.phar require kartik-v/yii2-icons "dev-master"
```

or add

```
"kartik-v/yii2-icons": "dev-master"
```

to the ```require``` section of your `composer.json` file.

## Usage

### Global Setup

In case you wish to setup one Icon framework globally, set the parameter `icon-framework` in the `params` array of your Yii Configuration File.

```php
'params' => [
  'icon-framework' => 'fa',  // Font Awesome Icon framework
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
echo Icon::show('user', ['class'=>'fa-2x'], Icon::FA); 
```

> NOTE:
> The `kartik\icons\Icon::show` method outputs a HTML formatted text. So in order to display icons in Yii-2 components like Navbar or Nav, you must set `encodeLabels` to false. 

```php
$items = [
    ['label' => Icon::show('home') . 'Home', 'url' => ['/site/index']],
];

// Your other code

/* Note you must encodeLabels to false to display icons in labels */
echo \yii\bootstrap\Nav::widget([
    'items' => $items,
    'encodeLabels' => false
]);

// Your other code
```

## License

**yii2-icons** is released under the BSD 3-Clause License. See the bundled `LICENSE.md` for details.
