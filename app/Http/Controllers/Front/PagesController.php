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
        $categories = Category::has('products')->inRandomOrder()->take(5)->get();
        $about = Page::where('slug', 'about')->first();
        $popular = Product::orderByDesc('views_count')->take(4)->get();
        return \view('app.pages.home', compact('articles', 'slides', 'categories', 'about', 'popular'));
    }

    public function show(Page $page): View
    {
        return \view('app.pages.default', compact('page'));
    }
}
