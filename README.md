# bind-render

[![Release](https://img.shields.io/packagist/v/icanboogie/bind-render.svg)](https://packagist.org/packages/icanboogie/bind-render)
[![Build Status](https://img.shields.io/travis/ICanBoogie/bind-render/master.svg)](http://travis-ci.org/ICanBoogie/bind-render)
[![HHVM](https://img.shields.io/hhvm/icanboogie/bind-render.svg)](http://hhvm.h4cc.de/package/icanboogie/bind-render)
[![Code Quality](https://img.shields.io/scrutinizer/g/ICanBoogie/bind-render/master.svg)](https://scrutinizer-ci.com/g/ICanBoogie/bind-render)
[![Code Coverage](https://img.shields.io/coveralls/ICanBoogie/bind-render/master.svg)](https://coveralls.io/r/ICanBoogie/bind-render)
[![Packagist](https://img.shields.io/packagist/dt/icanboogie/bind-render.svg)](https://packagist.org/packages/icanboogie/bind-render)

The **icanboogie/bind-render** package binds [icanboogie/render][] to [ICanBoogie][], using its
autoconfig feature. It adds various getters and methods to the [Core][] instance and a template
resolver that uses the application paths to look for templates.

```php
<?php

$app = ICanBoogie\boot();

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





----------





## Requirements

The package requires PHP 5.4 or later.





## Installation

The recommended way to install this package is through [Composer](http://getcomposer.org/):

```
$ composer require icanboogie/bind-render
```





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

[![Build Status](https://img.shields.io/travis/ICanBoogie/bind-render/master.svg)](https://travis-ci.org/ICanBoogie/bind-render)
[![Code Coverage](https://img.shields.io/coveralls/ICanBoogie/bind-render/master.svg)](https://coveralls.io/r/ICanBoogie/bind-render)





## License

**icanboogie/bind-render** is licensed under the New BSD License - See the [LICENSE](LICENSE) file for details.





[documentation]:               http://api.icanboogie.org/bind-render/0.4/
[ApplicationTemplateResolver]: http://api.icanboogie.org/bind-render/0.4/class-ICanBoogie.Binding.Render.ApplicationTemplateResolver.html
[Core]:                        http://api.icanboogie.org/icanboogie/2.4/class-ICanBoogie.Core.html
[BasicTemplateResolver]:       http://api.icanboogie.org/render/0.5/class-ICanBoogie.Render.BasicTemplateResolver.html
[TemplateResolver\AlterEvent]: http://api.icanboogie.org/render/0.5/class-ICanBoogie.Render.TemplateResolver.AlterEvent.html
[icanboogie/module]:           https://github.com/ICanBoogie/Module
[icanboogie/render]:           https://github.com/ICanBoogie/Render
[icanboogie/view]:             https://github.com/ICanBoogie/View
[ICanBoogie]:                  https://github.com/ICanBoogie/ICanBoogie
