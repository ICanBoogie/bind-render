# Render bindings for ICanBoogie

[![Release](https://img.shields.io/github/release/ICanBoogie/bind-render.svg)](https://github.com/ICanBoogie/bind-render/releases)
[![Build Status](https://img.shields.io/travis/ICanBoogie/bind-render/master.svg)](http://travis-ci.org/ICanBoogie/bind-render)
[![HHVM](https://img.shields.io/hhvm/icanboogie/bind-render.svg)](http://hhvm.h4cc.de/package/icanboogie/bind-render)
[![Code Quality](https://img.shields.io/scrutinizer/g/ICanBoogie/bind-render/master.svg)](https://scrutinizer-ci.com/g/ICanBoogie/bind-render)
[![Code Coverage](https://img.shields.io/coveralls/ICanBoogie/bind-render/master.svg)](https://coveralls.io/r/ICanBoogie/bind-render)
[![Packagist](https://img.shields.io/packagist/dt/icanboogie/bind-render.svg)](https://packagist.org/packages/icanboogie/bind-render)

The **icanboogie/bind-render** package binds [icanboogie/render][] to [ICanBoogie][], using its
autoconfig feature. It adds various getters to the [Core][] instance and a template
resolver that uses the application paths to look for templates.

```php
<?php

$app = ICanBoogie\boot();

echo get_class($app->template_engines);  // ICanBoogie\Render\EngineCollection
echo get_class($app->template_resolver); // ICanBoogie\Binding\Render\ApplicationTemplateResolver
echo get_class($app->renderer);          // ICanBoogie\Render\Renderer
```

The shared [BasicTemplateResolver][] instance is replaced by an [ApplicationTemplateResolver][]
instance during the `TemplateResolver::alter` event of class [TemplateResolver\AlterEvent].





## Enhanced template resolver

ICanBoogie extends the template resolver used by [icanboogie/render][] and [icanboogie/view][]
to search templates in the application paths (see [Multi-site support](https://github.com/ICanBoogie/ICanBoogie#multi-site-support)).
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

The package is documented as part of the [ICanBoogie](http://icanboogie.org/) framework
[documentation](http://icanboogie.org/docs/). You can generate the documentation for the package
and its dependencies with the `make doc` command. The documentation is generated in the `docs`
directory. [ApiGen](http://apigen.org/) is required. You can later clean the directory with
the `make clean` command.





## Testing

The test suite is ran with the `make test` command. [Composer](http://getcomposer.org/) is
automatically installed as well as all dependencies required to run the suite. You can later
clean the directory with the `make clean` command.

The package is continuously tested by [Travis CI](http://about.travis-ci.org/).

[![Build Status](https://img.shields.io/travis/ICanBoogie/bind-render/master.svg)](https://travis-ci.org/ICanBoogie/bind-render)
[![Code Coverage](https://img.shields.io/coveralls/ICanBoogie/bind-render/master.svg)](https://coveralls.io/r/ICanBoogie/bind-render)





## License

ICanBoogie/bind-render is licensed under the New BSD License - See the [LICENSE](LICENSE) file for details.





[icanboogie/module]: https://github.com/ICanBoogie/Module
[icanboogie/render]: https://github.com/ICanBoogie/Render
[icanboogie/view]: https://github.com/ICanBoogie/View
[ICanBoogie]: https://github.com/ICanBoogie/ICanBoogie
[ApplicationTemplateResolver]: http://icanboogie.org/docs/class-ICanBoogie.Binding.Render.ApplicationTemplateResolver.html
[Core]: http://icanboogie.org/docs/class-ICanBoogie.Core.html
[BasicTemplateResolver]: http://icanboogie.org/docs/class-ICanBoogie.Render.BasicTemplateResolver.html
[TemplateResolver\AlterEvent]: http://icanboogie.org/docs/class-ICanBoogie.Render.TemplateResolver.AlterEvent.html
