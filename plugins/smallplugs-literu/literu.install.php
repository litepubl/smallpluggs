<?php
/**
 * Lite Publisher
 * Copyright (C) 2010 - 2016 Vladimir Yushko http://litepublisher.com/ http://litepublisher.ru/
 * Licensed under the MIT (LICENSE.txt) license.
 *
 */

namespace litepubl\smallplugs;
use litepubl;

function literuInstall($self) {
  \tmenus::i()->oncontent = $self->onMenuContent;
\tbackuper::i()->onuploaded = $this->onuploaded;
    \tplugins::i()->add('smallplugs-enscroll');
    $plugindir = basename(dirname(__file__));
    \tthemeparser::i()->addtags("plugins/$plugindir/resource/theme.txt", false);
}

function literuUninstall($self) {
  \tmenus::i()->unbind($self);
  \tbackuper::i()->unbind($self);
    \tplugins::i()->delete('smallplugs-enscroll');
    $plugindir = basename(dirname(__file__));
    \tthemeparser::i()->removetags("plugins/$plugindir/resource/theme.txt", false);
}