# bind-render

[![Release](https://img.shields.io/packagist/v/icanboogie/bind-render.svg)](https://packagist.org/packages/icanboogie/bind-render)
[![Build Status](https://img.shields.io/travis/ICanBoogie/bind-render.svg)](http://travis-ci.org/ICanBoogie/bind-render)
[![Code Quality](https://img.shields.io/scrutinizer/g/ICanBoogie/bind-render.svg)](https://scrutinizer-ci.com/g/ICanBoogie/bind-render)
[![Code Coverage](https://img.shields.io/coveralls/ICanBoogie/bind-render.svg)](https://coveralls.io/r/ICanBoogie/bind-render)
[![Packagist](https://img.shields.io/packagist/dt/icanboogie/bind-render.svg)](https://packagist.org/packages/icanboogie/bind-render)

The **icanboogie/bind-render** package binds [icanboogie/render][] to [ICanBoogie][], using its
autoconfig feature. It adds various getters and methods to the [Application][] instance and a
template resolver that uses the application paths to look for templates.

```php
<?php

/* @var ICanBoogie\Application $app */

echo get_class($app->template_engines);  // ICanBoogie\Render\EngineCollection
echo get_class($app->template_resolver); // ICanBoogie\Binding\Render\ApplicationTemplateResolver
echo get_class($app->renderer);          // ICanBoogie\Render\Renderer

$app->render($app->models['articles']->one);
```

The shared [BasicTemplateResolver][] instance is replaced by an [ApplicationTemplateResolver][]
instance during the `TemplateResolver::alter` event of class [TemplateResolver\AlterEvent].





## Enhanced template resolver

[ApplicationTemplateResolver][] extends the template resolver used by [icanboogie/render][]
and [icanboogie/view][] to search templates in the application paths (see [Multi-site support](https://github.com/ICanBoogie/ICanBoogie#multi-site-support)).
Also, the "//" prefix can be used to search for templates from these paths .e.g.
"//my/special/templates/_form".





## Defining engines using `render` config fragments

The preferred method to define render engines is using `render` config fragments, because they
can be synthesised and cached.

The following example demonstrates how to define and engine for the `.phtml` templates:

```php
<?php

// config/render.php

namespace ICanBoogie\Binding\Render;

use ICanBoogie\Render\PHPEngine;

return [

	RenderConfig::ENGINES => [

		'.phtml' => PHPEngine::class

	]

];
```





----------





## Requirements

The package requires PHP 5.6 or later.





## Installation

The recommended way to install this package is through [Composer](http://getcomposer.org/):

	$ composer require icanboogie/bind-render





### Cloning the repository

The package is [available on GitHub](https://github.com/ICanBoogie/bind-render), its repository can be
cloned with the following command line:

	$ git clone https://github.com/ICanBoogie/bind-render.git





## Documentation

The package is documented as part of the [ICanBoogie][] framework
[documentation][]. You can generate the documentation for the package and its dependencies with
the `make doc` command. The documentation is generated in the `build/docs` directory.
[ApiGen](http://apigen.org/) is required. The directory can later be cleaned with
the `make clean` command.





## Testing

The test suite is ran with the `make test` command. [PHPUnit](https://phpunit.de/) and [Composer](http://getcomposer.org/) need to be globally available to run the suite. The command installs dependencies as required. The `make test-coverage` command runs test suite and also creates an HTML coverage report in "build/coverage". The directory can later be cleaned with the `make clean` command.

The package is continuously tested by [Travis CI](http://about.travis-ci.org/).

[![Build Status](https://img.shields.io/travis/ICanBoogie/bind-render.svg)](https://travis-ci.org/ICanBoogie/bind-render)
[![Code Coverage](https://img.shields.io/coveralls/ICanBoogie/bind-render.svg)](https://coveralls.io/r/ICanBoogie/bind-render)





## License

**icanboogie/bind-render** is licensed under the New BSD License - See the [LICENSE](LICENSE) file for details.





[documentation]:               https://icanboogie.org/api/bind-render/0.6/
[ApplicationTemplateResolver]: https://icanboogie.org/api/bind-render/0.6/class-ICanBoogie.Binding.Render.ApplicationTemplateResolver.html
[Application]:                 https://icanboogie.org/docs/4.0/the-application-class
[BasicTemplateResolver]:       https://icanboogie.org/api/render/0.6/class-ICanBoogie.Render.BasicTemplateResolver.html
[TemplateResolver\AlterEvent]: https://icanboogie.org/api/render/0.6/class-ICanBoogie.Render.TemplateResolver.AlterEvent.html
[icanboogie/module]:           https://github.com/ICanBoogie/Module
[icanboogie/render]:           https://github.com/ICanBoogie/Render
[icanboogie/view]:             https://github.com/ICanBoogie/View
[ICanBoogie]:                  https://github.com/ICanBoogie/ICanBoogie
