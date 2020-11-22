<?php

namespace App\Parse\Page;

use App\Dto\News;
use App\Parse\Page\BaseParsePage;
use Carbon\Carbon;
use QL\Dom\Elements;

class ParsePageSlider extends BaseParsePage
{
    public function parsePage(Elements $item, News $news, string $url)
    {
        if ($item->find('.article__header__title')->count()){
            $news->title = $item->find('.article__header__title')->text();
        } else {
            $news->title = $item->find('h1')->text();
        }

        if ($item->find('.article__text')->count()){
            $news->desc = $item->find('.article__text')->html();
            $news->shortDesc = mb_substr($item->find('.article__text')->text(), 0, 200, "UTF-8");
        } else {
            $news->desc = $item->find('.article__text__overview')->html();
            $news->shortDesc = mb_substr($item->find('.article__text__overview')->text(), 0, 200, "UTF-8");
        }

        if ($item->find('.article__main-image__link img')->count()){
            $news->fileId = $this->uploadImage($item->find('.article__main-image__link img'), $url)->id;
        } elseif ($item->find('.article__main-image img')->count()){
            $news->fileId = $this->uploadImage($item->find('.article__main-image img'), $url)->id;
        }
        return $news;
    }
}
