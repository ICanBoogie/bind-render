# Migration

## v5.x to v6.x

### New features

- Services are now defined with container.
- Added DIC compiler pass.

### Backward Incompatible Changes

- Remove getters `$app->template_engines`, `$app->template_resolver`, and `$app->renderer`.
- Remove method `$app->render()`.

### Deprecated Features

N/A

### Other Changes

- Require PHP 8.1+
