# bind-render

[![Release](https://img.shields.io/packagist/v/icanboogie/bind-render.svg)](https://packagist.org/packages/icanboogie/bind-render)
[![Code Quality](https://img.shields.io/scrutinizer/g/ICanBoogie/bind-render.svg)](https://scrutinizer-ci.com/g/ICanBoogie/bind-render)
[![Code Coverage](https://img.shields.io/coveralls/ICanBoogie/bind-render.svg)](https://coveralls.io/r/ICanBoogie/bind-render)
[![Packagist](https://img.shields.io/packagist/dt/icanboogie/bind-render.svg)](https://packagist.org/packages/icanboogie/bind-render)

The **icanboogie/bind-render** package binds [icanboogie/render][] to [ICanBoogie][], using its
autoconfig feature. It adds various getters and methods to the [Application][] instance and a
template resolver that uses the application paths to look for templates.

```php
<?php

/* @var ICanBoogie\Application $app */

$app->render($app->models['articles']->one);
```



#### Installation

```bash
composer require icanboogie/bind-render
```



## Enhanced template resolver

[ApplicationTemplateResolver][] extends the template resolver used by [icanboogie/render][]
and [icanboogie/view][] to search templates in the application paths (see [Multi-site support][]).
Also, the "//" prefix can be used to search for templates from these paths .e.g.
"//my/special/templates/_form".



## Defining engines using services

A compiler pass is used to build an array of extension/engine airs. Services tagged with
`render.extension` will be inspected. The pairs are set in the parameter
`render.engine_by_extension`.

The following example demonstrates how to define an engine for PHP templates and attach the
extensions `.php` and `.phtml`.

```yaml
services:
  ICanBoogie\Render\PHPEngine:
    tags:
    - { name: 'render.engine' }
    - { name: 'render.extension', extension: '.php' }
    - { name: 'render.extension', extension: '.phtml' }
```



----------



## Continuous Integration

The project is continuously tested by [GitHub actions](https://github.com/ICanBoogie/bind-render/actions).

[![Tests](https://github.com/ICanBoogie/bind-render/workflows/test/badge.svg?branch=master)](https://github.com/ICanBoogie/bind-render/actions?query=workflow%3Atest)
[![Static Analysis](https://github.com/ICanBoogie/bind-render/workflows/static-analysis/badge.svg?branch=master)](https://github.com/ICanBoogie/bind-render/actions?query=workflow%3Astatic-analysis)
[![Code Style](https://github.com/ICanBoogie/bind-render/workflows/code-style/badge.svg?branch=master)](https://github.com/ICanBoogie/bind-render/actions?query=workflow%3Acode-style)



## Code of Conduct

This project adheres to a [Contributor Code of Conduct](CODE_OF_CONDUCT.md). By participating in
this project and its community, you are expected to uphold this code.



## Contributing

Please see [CONTRIBUTING](CONTRIBUTING.md) for details.



## License

**icanboogie/bind-render** is released under the [BSD-3-Clause](LICENSE).



[ApplicationTemplateResolver]: lib/ApplicationTemplateResolver.php
[Application]:                 https://icanboogie.org/docs/4.0/the-application-class
[BasicTemplateResolver]:       https://icanboogie.org/api/render/0.6/class-ICanBoogie.Render.BasicTemplateResolver.html
[TemplateResolver\AlterEvent]: https://icanboogie.org/api/render/0.6/class-ICanBoogie.Render.TemplateResolver.AlterEvent.html
[icanboogie/module]:           https://github.com/ICanBoogie/Module
[icanboogie/render]:           https://github.com/ICanBoogie/Render
[icanboogie/view]:             https://github.com/ICanBoogie/View
[ICanBoogie]:                  https://github.com/ICanBoogie/ICanBoogie
[Multi-site support]:          https://github.com/ICanBoogie/ICanBoogie#multi-site-support
