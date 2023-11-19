<?php

namespace App\Http\Controllers\Front;

use App\Models\Additional\Page;
use App\Models\Article\Article;
use App\Models\Catalog\Category;
use App\Models\Catalog\Product;
use App\Models\Slider\Slider;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\View\View;

class PagesController extends Controller
{
    public function index(): View
    {
        $articles = Article::latest()->take(3)->get();
        $slides = optional(Slider::find(1))->slides;
        $categories = Category::has('products')->where('is_published', 1)->inRandomOrder()->take(5)->get();
        $about = Page::where('slug', 'about')->first();
        $popular = Product::orderByDesc('views_count')->where('is_published', 1)->take(4)->get();
        $meta = Page::where('slug', 'about')->first();
        return \view('app.pages.home', compact('articles', 'slides', 'categories', 'about', 'popular', 'meta'));
    }

    public function show(Page $page): View
    {
        return \view('app.pages.default', compact('page'));
    }
}
