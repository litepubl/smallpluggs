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

protected function create() {
parent::create();
$this->data['idfeature'] = 0;
}

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

public function getfeature() {
if ($idcat = $this->idfeature) {
$filename = 'literu.feature.' . $idcat;
if ($result = \litepublisher::$urlmap->cache->get($filename)) {
return $result;
} else {
$result = $this->getFeatureContent($idcat);
\litepublisher::$urlmap->cache->set($filename, $result);
return $result;
}
}

return '';
}

protected function getFeatureContent($idcat) {
$cats = \tcategories::i();
   $items = $cats->get_sorted_posts($idcat, 0, false);
    if (count($items)) {
        $theme = ttheme::i();
    return $theme->getpostswidgetcontent($items, 0, $theme->templates['custom']['literufeature']) .
$theme->templates['custom']['literufeaturies'];
  }

return '';  
}
  
}//class