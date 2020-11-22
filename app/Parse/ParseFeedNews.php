<?php

namespace App\Parse;

use App\Dto\News;
use App\Models\Category;
use App\Parse\Page\ParsePageSection;
use App\Parse\Page\ParsePageSlider;
use Carbon\Carbon;
use QL\Dom\Elements;
use QL\QueryList;

class ParseFeedNews
{
    protected $queryList;

    public function __construct(QueryList $queryList)
    {
        $this->queryList = $queryList;
    }

    /**
     * @return News[]
     */
    public function parseHome(string $url)
    {
        return $this
            ->queryList
            ->get($url)
            ->find('#js_news_feed_banner .js-news-feed-list a')
            ->map(
                function(Elements $item) {
                    $news = $this->parseFeedNews($item);
                    if (!empty($news)) {
                        return $news;
                    }
                }
            )
            ->filter()
            ->toArray()
            ;
    }

    protected function parseFeedNews(Elements $item)
    {
        $news = new News();
        $news->uniqueRecurse = $item->attr('data-modif');
        $news->title = $item->find('.news-feed__item__title')->text();
        $categoryRaw = $item->find('.news-feed__item__date-text')->text();

        if (preg_match('/(?<name>.*), (?<timeHour>.*):(?<timeMinute>.*)/iums', $categoryRaw, $row)) {
            $news->categoryName = $row['name'];
            $news->date = Carbon::now()->setTime($row['timeHour'], $row['timeMinute']);
        } else {
            return null;
        }

        return $this->parsePageNews($item->attr('href'), $news);
    }

    protected function parsePageNews(string $url, News $news)
    {
        $pageNews = $this
            ->queryList
            ->get($url);

        $urlPath = parse_url($url, PHP_URL_PATH);
        $urlPaths = explode('/', substr($urlPath, 1));

        $parserPathCss = [
            ParsePageSlider::class => '.js-rbcslider .rbcslider__slide:first-child',
        ];

        if (isset($urlPaths[1])) {
            $parserPathCss[ParsePageSection::class] = 'section[data-' . $urlPaths[0] . '=' . $urlPaths[1] . ']';
        }

        foreach ($parserPathCss as $class => $pathCss) {
            $item = $pageNews->find($pathCss);

            if ($item->count()) {

                return app($class)
                    ->parsePage($item, $news, $url);
            }
        }

        return null;
    }
}
