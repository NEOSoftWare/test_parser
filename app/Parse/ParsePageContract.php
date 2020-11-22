<?php

namespace App\Parse;

use App\Dto\News;
use QL\Dom\Elements;

interface ParsePageContract
{
    public function parsePage(Elements $item, News $news, string $url);
}
