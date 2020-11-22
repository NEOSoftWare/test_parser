<?php

namespace App\Parse\Page;

use App\Dto\News;
use App\Parse\Page\BaseParsePage;
use QL\Dom\Elements;

class ParsePageSection extends BaseParsePage
{
    public function parsePage(Elements $item, News $news, string $url)
    {
        $news->title = $item->find('h2.article__title')->text();
        $news->desc = $item->find('.article__body')->html();
        $news->shortDesc = mb_substr($item->find('.article__body')->text(), 0, 200, "UTF-8");

        if ($item->find('.article__image--main img')->count()) {
            $news->fileId = $this->uploadImage($item->find('.article__image--main img'), $url)->id;
        }

        return $news;
    }
}
