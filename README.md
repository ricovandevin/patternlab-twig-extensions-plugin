# PatternLab Twig Extension Plugin
Adds the ability to load custom Twig extensions into PatternLab.
## Installation
Add the plugin as a dependency using Composer.

`composer require ricovandevin/patternlab-twig-extensions-plugin`

Create a folder 'extensions' inside the '_twig-components' folder of your PatternLab source folder, e.g.

`mkdir src/_twig-components/extensions`

You can now place the source code of the Twig extensions you want to include in this folder. To manage them
with Composer and automatically place them in the right location use the composer/installers package

`composer require composer/installers`

and add this inside your composer.json

```
    "extra": {
        "installer-paths": {
            "src/_twig-components/extensions": [
                "VENDOR/PROJECT"
            ]
        }
    }
```