<?php
/**
 * Lite Publisher
 * Copyright (C) 2010 - 2016 Vladimir Yushko http://litepublisher.com/ http://litepublisher.ru/
 * Licensed under the MIT (LICENSE.txt) license.
 *
 */

namespace litepubl\plugins\smallplugs_literu;

use litepubl\admin\posts\Editor;

class adminliteru extends  \litepubl\admin\Panel
{

    public function getcontent(): string
 {
        $plugin = literu::i();
        $args = $this->args;
        $args->category = Editor::getComboCategories([], $plugin->idfeature);
        $args->formtitle = $this->lang->options;
        return $this->admin->form('[combo=category]', $args);
    }

    public function processform() {
        $plugin = literu::i();
        $plugin->idfeature = (int)$_POST['category'];
        $plugin->save();
    }

}