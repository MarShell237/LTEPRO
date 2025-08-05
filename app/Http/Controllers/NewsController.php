<?php
namespace App\Http\Controllers;

use App\Services\FootballApiService;
use Illuminate\Http\Request;

use App\Services\NewsApiService;

class NewsController extends Controller
{
    protected $newsApi;
    public function __construct(NewsApiService $newsApi) { $this->newsApi = $newsApi; }

    public function index() {
        $newsData = $this->newsApi->getSportsNews('football', 'fr');
        $news = [];
        if (isset($newsData['articles'])) {
            foreach ($newsData['articles'] as $item) {
                $news[] = [
                    'title' => $item['title'],
                    'image' => $item['urlToImage'],
                    'link' => $item['url'],
                    'published_at' => $item['publishedAt'],
                ];
            }
        }
        return view('news.index', compact('news'));
    }
}
