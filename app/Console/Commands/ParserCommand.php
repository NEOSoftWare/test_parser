<?php

namespace App\Console\Commands;

use App\Models\Category;
use App\Models\News;
use App\Parse\ParseFeedNews;
use App\Services\UploadImage;
use Illuminate\Console\Command;
use QL\Dom\Elements;
use QL\QueryList;

class ParserCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'parser:run';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Запуск парсера новостей';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle(ParseFeedNews $parseFeedNews)
    {
        $this->info('Start parse');
        $listNews = $parseFeedNews->parseHome(config('parser.url'));

        foreach ($listNews as $news) {
            $category = Category::firstOrCreate(['title' => $news->categoryName,]);

            News::updateOrCreate(
                [
                    'unique_recurse' => $news->uniqueRecurse,
                ],
                [
                    'title' => $news->title,
                    'short_desc' => $news->shortDesc,
                    'desc' => $news->desc,
                    'category_id' => $category->id,
                    'file_id' => $news->fileId,
                    'date' => $news->date,
                ]);
        }

        $this->info('Success');
    }
}
