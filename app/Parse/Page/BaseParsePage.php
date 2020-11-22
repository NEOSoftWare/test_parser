<?php

namespace App\Parse\Page;

use App\Parse\ParsePageContract;
use App\Services\UploadImage;
use QL\Dom\Elements;

abstract class BaseParsePage implements ParsePageContract
{
    /** @var UploadImage  */
    protected $uploadImage;

    public function __construct(UploadImage $uploadImage)
    {
        $this->uploadImage = $uploadImage;
    }

    protected function uploadImage(Elements $item, string $urlPage)
    {
        $imageUrl = $item->attr('src');

        if (strpos($imageUrl, '/') === 0) {
            $imageUrl =
                parse_url($urlPage, PHP_URL_SCHEME) . '://'
                . parse_url($urlPage, PHP_URL_HOST)
                . $imageUrl
            ;
        }

        return $this->uploadImage->uploadImageUrl($imageUrl);
    }
}
