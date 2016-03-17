<?php
/**
 * Lite Publisher
 * Copyright (C) 2010 - 2016 Vladimir Yushko http://litepublisher.com/ http://litepublisher.ru/
 * Licensed under the MIT (LICENSE.txt) license.
 *
 */

class scrollcats extends tplugin {

  public static function i() {
    return getinstance(__class__);
  }

  public function install() {
    tplugins::i()->add('smallplugs-enscroll');
    $plugindir = basename(dirname(__file__));
    tthemeparser::i()->addtags("plugins/$plugindir/resource/theme.categories.txt", false);
  }

  public function uninstall() {
    $plugindir = basename(dirname(__file__));
    tthemeparser::i()->removetags("plugins/$plugindir/resource/theme.categories.txt", false);
  }

} //class