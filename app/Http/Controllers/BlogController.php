<?php

namespace App\Http\Controllers;

use App\Models\Tag;
use App\Models\User;
use App\Models\Slide;
use App\Models\Article;
use App\Models\Category;
use Illuminate\Http\Request;

class BlogController extends Controller
{
   public function index(){
    return view('blog.index')->with([
        'title'         => 'Beranda',
        'slides'        => Slide::all(),
        'categories'    => Category::all(),
        'articles'      => Article::orderBy('created_at', 'desc')->paginate(4)->withQueryString(),
        'views'         => Article::orderBy('view', 'desc')->take(5)->get(),
        'label'         => 'Artikel Popular'
    ]);
   }    

   public function article(){
    $articles   = Article::latest();
    $filter     = '';
    $filter_name    = '';
    if (request('cari')) {
        $articles->where('judul','like','%'.request('cari').'%')
          ->orWhere('isi','like','%'.request('cari').'%');
        $filter = request('cari');
        $filter_name = 'Hasil Pencarian';
    }
    if (request('kategori')) {
        $category = Category::firstWhere('slug', request('kategori'));
        $articles->where('category_id', $category->id);
        $filter = $category->nama;
        $filter_name = 'Kategori';
    }
    if (request('tag')) {
        $tag = Tag::firstWhere('slug', request('tag'));
        $articles->whereHas('tags', function($query){
            $query->where('slug', request('tag'));
        });
        $filter = $tag->name;
        $filter_name = 'Tag';
    }
    return view('blog.artikel')->with([
        'title'         => 'Artikel',
        'categories'    => Category::all(),
        'articles'      => $articles->paginate(4)->withQueryString(),
        'filter'        => $filter,
        'filter_name'        => $filter_name,
        'views'         => Article::orderBy('view', 'desc')->take(5)->get(),
        'label'         => 'Artikel Popular'
    ]);
   }

   public function detail(Article $article){
    $article->increment('view');

    return view('blog.detail')->with([
        'title'         => 'Artikel Detail',
        'categories'    => Category::all(),
        'article'       => $article,
        'views'         => Article::latest()->take(5)->get(),
        'label'         => 'Artikel Terbaru'
    ]);
   }

   public function about(Article $article, User $user){
    return view('blog.tentang')->with([
        'title'     => 'Tentang',
        'categories'=> Category::all(),
        'users'     => User::where('id', 1)->get(),
        'views'     => Article::orderBy('view','desc')->take(5)->get(),
        'label'     => 'Artikel Popular'
    ]);
   }
}   
