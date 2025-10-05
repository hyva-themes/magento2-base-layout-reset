# Hyvä Themes - Base Layout Reset Module

[![Hyvä Themes](https://hyva.io/media/wysiwyg/logo-compact.png)](https://hyva.io/)

## hyva-themes/magento2-base-layout-reset

Generates a version of the base layout XML of core Magento modules and core bundled extensions without block declarations.

This generated base layout is used instead of the original base layout for Hyvä based themes.

The purpose of this is to avoid having to load the original base layout, only to reset it again with the reset theme.
The generated reset base layout eliminates the need to have a reset theme.


## Installation

```sh
composer require hyva-themes/magento2-base-layout-reset
bin/magento module:enable Hyva_BaseLayoutReset
bin/magento setup:upgrade
```

After installation, the following steps need to be taken for existing Hyvä based themes so they no longer use the reset theme.

* Add `<update handle="default_hyva"/>` to `Magento_Theme/layout/default.xml`.
* Copy the `Magento_Theme/templates/root.phtml` file from the reset theme into the Hyvä theme.
* Remove `<parent>Hyva/reset</parent>` from `theme.xml`.
* Update the `theme` table so the `parent_id` column of the Hyvä theme is `null`.
* Clear the cache.

## License
Hyvä Themes - https://hyva.io

Copyright © Hyvä Themes B.V 2025-present. All rights reserved.

This product is licensed per Magento install. Please see [License File](LICENSE.md) for more information.

## Changelog
Please see [The Changelog](CHANGELOG.md).

[ico-compatibility]: https://img.shields.io/badge/magento-%202.4-brightgreen.svg?logo=magento&longCache=true&style=flat-square
