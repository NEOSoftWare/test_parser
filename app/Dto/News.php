<?php

namespace App\Dto;

class News
{
    /** @var string */
    public $uniqueRecurse;

    /** @var string */
    public $title;

    /** @var string */
    public $shortDesc;

    /** @var string */
    public $desc;

    /** @var string */
    public $date;

    /** @var string|null */
    public $categoryName;

    /** @var int|null */
    public $fileId;
}
