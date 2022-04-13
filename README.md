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
can be synthesized and cached.

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



## Continuous Integration

The project is continuously tested by [GitHub actions](https://github.com/ICanBoogie/HTTP/actions).

[![Tests](https://github.com/ICanBoogie/bind-render/workflows/test/badge.svg?branch=master)](https://github.com/ICanBoogie/HTTP/actions?query=workflow%3Atest)
[![Static Analysis](https://github.com/ICanBoogie/bind-render/workflows/static-analysis/badge.svg?branch=master)](https://github.com/ICanBoogie/HTTP/actions?query=workflow%3Astatic-analysis)
[![Code Style](https://github.com/ICanBoogie/bind-render/workflows/code-style/badge.svg?branch=master)](https://github.com/ICanBoogie/HTTP/actions?query=workflow%3Acode-style)



## License

**icanboogie/bind-render** is released under the [BSD-3-Clause](LICENSE).



[documentation]:               https://icanboogie.org/api/bind-render/0.6/
[ApplicationTemplateResolver]: https://icanboogie.org/api/bind-render/0.6/class-ICanBoogie.Binding.Render.ApplicationTemplateResolver.html
[Application]:                 https://icanboogie.org/docs/4.0/the-application-class
[BasicTemplateResolver]:       https://icanboogie.org/api/render/0.6/class-ICanBoogie.Render.BasicTemplateResolver.html
[TemplateResolver\AlterEvent]: https://icanboogie.org/api/render/0.6/class-ICanBoogie.Render.TemplateResolver.AlterEvent.html
[icanboogie/module]:           https://github.com/ICanBoogie/Module
[icanboogie/render]:           https://github.com/ICanBoogie/Render
[icanboogie/view]:             https://github.com/ICanBoogie/View
[ICanBoogie]:                  https://github.com/ICanBoogie/ICanBoogie
