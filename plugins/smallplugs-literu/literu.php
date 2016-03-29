<?php
/**
 * Lite Publisher
 * Copyright (C) 2010 - 2016 Vladimir Yushko http://litepublisher.com/ http://litepublisher.ru/
 * Licensed under the MIT (LICENSE.txt) license.
 *
 */

namespace litepubl\smallplugs;
use litepubl;

class literu extends \tplugin {

  public function onMenuContent($menu, &$content) {
    $content = \ttheme::i()->parse($content);
  }

public function onuploaded() {
$links = \tlinkswidget::i();
foreach ($links->items as $id => $item) {
if (\strbegin($item['url'], 'https://github.com/litepubl/cms/archive/')) {
$links->items[$id]['url'] = sprintf('https://github.com/litepubl/cms/archive/v%s.zip', litepublisher::$options->version);
$links->save();
return;
}
}
}
  
}//class