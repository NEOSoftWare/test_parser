<?php

namespace App\Services;

use App\Models\File;
use GuzzleHttp\Client;
use Illuminate\Support\Facades\Storage;

class UploadImage
{
    /** @var Client */
    protected $client;

    protected $storage;

    public function __construct(Client $client)
    {
        $this->client = $client;
    }

    /**
     * @param string $url
     *
     * @return File
     * @throws \Throwable
     */
    public function uploadImageUrl(string $url)
    {
        $response = $response = $this->client->get($url);
        $content = $response->getBody()->getContents();
        $fileName = md5($content) . '.' . pathinfo($url, PATHINFO_EXTENSION);

        Storage::put($fileName, $content);

        try {
            $file = new File();
            $file->size = $response->getBody()->getSize();
            $file->name = pathinfo($url, PATHINFO_BASENAME);
            $file->ext = pathinfo($url, PATHINFO_EXTENSION);
            $file->url = Storage::url($fileName);

            $file->saveOrFail();
        } catch (\Throwable $exception) {
            Storage::delete($fileName);

            throw $exception;
        }

        return $file;
    }
}
