<?php

namespace PatternLab\TwigExtensionsLoader;

use \PatternLab\Config;
use \Symfony\Component\Finder\Finder;

class PatternLabListener extends \PatternLab\Listener {

  /**
   * PatternLabListener constructor.
   */
  public function __construct() {
    $this->addListener("twigPatternLoader.customize", "addExtensions");
  }

  /**
   * Add the extensions to the appropriate instance
   */
  public function addExtensions() {
    $instance = TwigUtil::getInstance();
    $filterDir = Config::getOption("sourceDir").DIRECTORY_SEPARATOR."_twig-components/extensions";

    if (is_dir($filterDir)) {
      $finder = new Finder();
      $finder->files()->name("*.php")->in($filterDir);
      $finder->sortByName();
      foreach ($finder as $file) {
        $class = $file->getBasename('.php');
        $instance->addExtension(new $class());
      }
      TwigUtil::setInstance($instance);
    }
  }

}
