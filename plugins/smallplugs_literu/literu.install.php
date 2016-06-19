<?php
/**
 * Lite Publisher
 * Copyright (C) 2010 - 2016 Vladimir Yushko http://litepublisher.com/ http://litepublisher.ru/
 * Licensed under the MIT (LICENSE.txt) license.
 *
 */

namespace litepubl\plugins\smallplugs_literu;

use litepubl\core\Plugins;
use litepubl\pages\Menus;
use litepubl\utils\Bbackuper;
use litepubl\view\Parser;
use litepubl\view\AutoVars;

function literuInstall($self) {
    Menus::i()->oncontent = $self->onMenuContent;
    Backuper::i()->onuploaded = $self->onuploaded;
    Plugins::i()->add('smallplugs_enscroll');
    $plugindir = basename(dirname(__file__));
    Parser::i()->addTags("plugins/$plugindir/resource/theme.txt", false);
AutoVars::i()->add('literu', get_class($self));
}

function literuUninstall($self) {
    Menus::i()->unbind($self);
    Backuper::i()->unbind($self);
    Plugins::i()->delete('smallplugs_enscroll');
    $plugindir = basename(dirname(__file__));
    Parser::i()->removetags("plugins/$plugindir/resource/theme.txt", false);
AutoVars::i()->delete('literu');
}