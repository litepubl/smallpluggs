<?php
/**
 * Lite Publisher
 * Copyright (C) 2010 - 2016 Vladimir Yushko http://litepublisher.com/ http://litepublisher.ru/
 * Licensed under the MIT (LICENSE.txt) license.
 *
 */

namespace litepubl\plugins\smallplugs_literu;
use litepubl\iadmin;
use litepubl\targs;
use litepubl\tposteditor;
use litepubl\admintheme;
use litepubl\tlocal;

class adminliteru implements iadmin {

    public function getcontent() {
        $plugin = literu::i();
        $args = new targs();
        $args->category = tposteditor::getcombocategories([], $plugin->idfeature);
        $args->formtitle = tlocal::i()->options;
        return admintheme::i()->form('[combo=category]', $args);
    }

    public function processform() {
        $plugin = literu::i();
        $plugin->idfeature = (int)$_POST['category'];
        $plugin->save();
    }

}