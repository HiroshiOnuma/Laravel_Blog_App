<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\User;
use App\Http\Requests\StorePostRequest;
use Illuminate\Support\Facades\Auth;

class BlogController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    //
    public function __construct()
    {
        $this->middleware(function ($request, $next) {
            // dd($request->route()->parameter('id'));
            // dd(Auth::id());

            $id = $request->route()->parameter('id'); //postのid取得
            if (!is_null($id)) { // null判定
                $post = Post::find($id);

                if(is_null($post)) {
                    abort(404);
                }
                $postUserId = $post->user->id;

                $userId = Auth::id();
                if ($postUserId !== $userId) { // 同じでなかったら
                    abort(404); // 404画面表示
                }
            }

            return $next($request);
        });
    }
    //

    public function index(Request $request)
    {
        // $posts =  Post::select('id', 'title', 'content', 'created_at')->get();

        // ページネーション対応
        // $posts =  Post::select('id', 'title', 'content', 'created_at')->paginate(15);

        // $posts = $query->select('id', 'title', 'content', 'created_at')
        //     ->orderBy('created_at', 'desc')
        //     ->paginate(15);
        // return view('blogs.index', compact('posts'));

        // 検索対応
        $search = $request->search;
        $query = Post::search($search);
        // ログインユーザーの情報のみ参照する処理
        $posts = $query->whereUserId(Auth::id())
            ->select('id', 'user_id', 'title', 'content', 'created_at')->orderBy('created_at', 'desc')
            ->paginate(15);

        return view('blogs.index', compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('blogs.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StorePostRequest $request)
    {
        // dd($request, $request->title);
        $post = Post::create([
            'user_id' => Auth::id(),
            'title' => $request->title,
            'content' => $request->content,
        ]);
        return to_route('blogs.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $post = Post::find($id);

        return view('blogs.show', compact('post'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

        $post = Post::find($id);

        return view('blogs.edit', compact('post'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(StorePostRequest $request, $id)
    {
        $post = Post::find($id);

        $post->title = $request->title;
        $post->content = $request->content;

        $post->save();
        return to_route('blogs.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $post = Post::find($id);

        $post->delete();
        return to_route('blogs.index');
    }
}
