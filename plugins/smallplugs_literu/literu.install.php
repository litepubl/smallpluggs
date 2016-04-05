<?php
/**
 * Lite Publisher
 * Copyright (C) 2010 - 2016 Vladimir Yushko http://litepublisher.com/ http://litepublisher.ru/
 * Licensed under the MIT (LICENSE.txt) license.
 *
 */

namespace litepubl\plugins\smallplugs_literu;

function literuInstall($self) {
  litepubl\tmenus::i()->oncontent = $self->onMenuContent;
litepubl\tbackuper::i()->onuploaded = $this->onuploaded;
    litepubl\tplugins::i()->add('smallplugs-enscroll');
    $plugindir = basename(dirname(__file__));
    litepubl\tthemeparser::i()->addtags("plugins/$plugindir/resource/theme.txt", false);
}

function literuUninstall($self) {
  litepubl\tmenus::i()->unbind($self);
  litepubl\tbackuper::i()->unbind($self);
    litepubl\tplugins::i()->delete('smallplugs-enscroll');
    $plugindir = basename(dirname(__file__));
    litepubl\tthemeparser::i()->removetags("plugins/$plugindir/resource/theme.txt", false);
}