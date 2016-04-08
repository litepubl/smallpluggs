<?php
/**
 * Lite Publisher
 * Copyright (C) 2010 - 2016 Vladimir Yushko http://litepublisher.com/ http://litepublisher.ru/
 * Licensed under the MIT (LICENSE.txt) license.
 *
 */

namespace litepubl\plugins\smallplugs_literu;
use litepubl\tplugins;
use litepubl\tmenus;
use litepubl\tbackuper;
use litepubl\tthemeparser;

function literuInstall($self) {
    tmenus::i()->oncontent = $self->onMenuContent;
    tbackuper::i()->onuploaded = $self->onuploaded;
    tplugins::i()->add('smallplugs_enscroll');
    $plugindir = basename(dirname(__file__));
    tthemeparser::i()->addtags("plugins/$plugindir/resource/theme.txt", false);
}

function literuUninstall($self) {
    tmenus::i()->unbind($self);
    tbackuper::i()->unbind($self);
    tplugins::i()->delete('smallplugs_enscroll');
    $plugindir = basename(dirname(__file__));
    tthemeparser::i()->removetags("plugins/$plugindir/resource/theme.txt", false);
}