<?php

namespace App\Parse;

use App\Dto\News;

interface ParseFeedNewsContract
{
    /**
     * @param string $url
     *
     * @return News[]
     */
    public function parseHome(string $url);
}
