# Repository structure #
Repository structure is very close to real Yii application.

```
app
  commands
  components
  config
    main.php
    routes.php
    test.php — configuration used to run unit tests
  controllers
  extensions
    yiiext — extensions
      components - component sets that are hard to place to another namespace
      behaviors - behavior extensions
        model - model behaviors includig AR ones
      renderers - custom View renderers
      widgets - widgets
      zii - extensions for zii
  models
  runtime
  tests — test sets
    fixtures — data used to initialize DB prior to unit testing
    functional — functional tests
    report
    sql — SQL dumps used for testing extensions
    unit — unit tests
    rununit.bat — can be used to run all unit tests under Windows
    bootstrap.php
    WebTestCase.php
    readme_ru.txt — readme on how to configure unit tests
    phpunit.xml
  views
framework
www
```

# Extension naming convention #
All extension classes are named as EMyExtensionClass.

# Releases #
  * Each release is being packed into zip without tests but with html documentation inluded.
  * Release should pass all its unit tests.
  * Release should contain up to date readme\_ru.html, readme\_en.html and changelog.txt.

# Testing #
  * Readme is here: /app/tests/readme\_ru.txt.

# Conding standards #
  * Encoding: UTF-8 w/o BOM.
  * Indentation: tabs.
  * In widgets properties are used instead of get-set methods. And vice-versa in other extensions.
  * DIRECTORY\_SEPARATOR is not used if it's not about exploding existing path into segments.
  * if, while, foreach should include braces: foreach($x as $y){

# namespaces #
All extensions are located in /extensions/yiiext directory. There are more directories inside:
  * components (component sets that are hard to place to another namespace)
  * behaviors (behavior extensions)
  * behaviors/model (model behaviors includig AR ones)
  * renderers (custom View renderers)
  * widgets (widgets)
  * zii (extensions for zii)

Every extension should use separate directory. Directory name started with lowecase letter and should determine what is the extension for. Extension class name should start with **E**. Then class name and suffix like Behavior, Widget etc. For example, ETaggableBehavior is being placed under /extensions/yiiext/behaviors/model/taggable/.

There should be views directory in widget directory. Default widget views are placed there. Also widget should define view property, that contains default widget view name(without extension). In extension view should be used as follows:
```
$this->render($this->view,$params);
```