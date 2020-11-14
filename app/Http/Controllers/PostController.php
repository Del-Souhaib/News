<?php

namespace App\Http\Controllers;

use App\Http\Requests\PostRequest;
use App\Models\Category_visit;
use App\Models\Comment;
use App\Models\Nb_user;
use App\Models\Page_visit;
use App\Models\Post;
use App\Models\Post_visit;
use Illuminate\Support\Facades\File;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use function Sodium\compare;

class PostController extends Controller
{
    public function AdminPosts()
    {
        $posts = Post::orderBy('created_at','desc')->paginate(10);
        return view('Admins.Posts', compact('posts'));
    }

    public function addform()
    {
        return view('Admins.AddPost');
    }

    public function add(PostRequest $req)
    {
        $images = $req->file('images');

        if (isset($images)) {
            $id = Post::select('id')->orderBy('id', 'desc')->limit(1)->get();
            $imagesname = '';
            $count = 1;
            foreach ($images as $image) {
                $imagetype = explode('.', $image->getClientOriginalName());
                $imagename = ($id[0]->id + 1) . $count . '.' . end($imagetype);
                $imagesname .= $imagename . '|';
                $image->StoreAs('public/Pics/Posts', $imagename);
                $count++;
            }
        } else {
            $imagesname = null;
        }


        $types = '';
        foreach ($req->type as $type) {
            $types .= $type . '|';
        }
        Post::insert([
            'Title' => $req->title,
            'Type' => $types,
            'Text' => $req->text,
            'Pictures' => $imagesname,
            'created_at' => date('y-m-d h:i:s')

        ]);
        return redirect('/Admins/AddPost')->with('show', 'shoooooow');
    }

    public function delete($id)
    {
        Post::where('id', '=', $id)->delete();
        return redirect()->back();
    }

    public function updateform($id)
    {
        $post = Post::where('id', '=', $id)->first();
        $types = explode('|', $post->Type);
        $images = explode('|', $post->Pictures);
        return view('Admins/UpdatePost', compact(['post', 'types', 'images']));
    }

    public function update(PostRequest $req, $id)
    {
        $oldimages = Post::where('id', '=', $id)->select('Pictures')->get();
        $oldimages = $oldimages[0]['Pictures'];
        $oldimages = explode('|', $oldimages);
        foreach ($oldimages as $oldimage) {
            File::delete('storage/Pics/Posts/' . $oldimage);
        }


        $images = $req->file('images');
        if (isset($images)) {
            $imagesname = '';
            $count = 1;
            foreach ($images as $image) {
                $imagetype = explode('.', $image->getClientOriginalName());
                $imagename = $id . $count . '.' . end($imagetype);
                $imagesname .= $imagename . '|';
                $image->StoreAs('public/Pics/Posts', $imagename);
                $count++;
            }
        } else {
            $imagesname = null;
        }

        $types = '';
        foreach ($req->type as $type) {
            $types .= $type . '|';
        }
        Post::where('id', '=', $id)->update([
            'Title' => $req->title,
            'Type' => $types,
            'Text' => $req->text,
            'Pictures' => $imagesname,
            'updated_at' => date('y-m-d h:i:s')
        ]);
        return redirect()->back()->with('show', 'show');

    }

    /******Users*******/

    public function UserPosts()
    {
        Page_visit::insert([
            'page' => 'home',
            'created_at' => date('Y-m-d h:i:s')
        ]);
        $lastposts = Post::limit(8)->orderBy('created_at', 'desc')->get();
        $politicposts = Post::where('Type', 'like', '%politic%')->limit(8)->orderBy('created_at', 'desc')->get();
        $sportposts = Post::where('Type', 'like', '%sport%')->limit(8)->orderBy('created_at', 'desc')->get();
        $artposts = Post::where('Type', 'like', '%art%')->limit(8)->orderBy('created_at', 'desc')->get();

        return view('Users.Home', compact(['lastposts', 'politicposts', 'sportposts', 'artposts']));
    }

    public function UserPost($id)
    {
        $Post = Post::where('id', '=', $id)->with('comments')->get()->first();
        $comments = Comment::where('post_id', $id)->with('User')->orderBy('created_at', 'desc')->get()->all();
        $pics = explode('|', $Post->Pictures);
        $nbpics = count($pics) - 1;
        $type = $Post->Type;
        $type = explode('|', $type);

        unset($type[count($type) - 1]);
        if (count($type) > 2) {
            $related = Post::where([
                ['Type', 'like', '%' . $type[0] . '%'],
                ['id', '<>', $id]
            ])
                ->orWhere([
                    ['Type', 'like', '%' . $type[1] . '%'],
                    ['id', '<>', $id]
                ])
                ->orderBy('created_at', 'desc')->limit(7)->get();
        } else if (count($type) <= 1) {
            $related = Post::where([
                ['Type', 'like', '%' . $type[0] . '%'],
                ['id', '!=', $Post->id],

            ])
                ->orderBy('created_at', 'desc')->limit(7)->get();

        }
        Post_visit::insert([
            'post_type' =>  $Post->Type,
            'post_id'=>$Post->id,
            'created_at' => date('Y-m-d h:i:s')
        ]);
        return view('Users/Post', compact(['Post', 'pics', 'nbpics', 'related', 'comments']));
    }

    public function Categorynews($name)
    {
        if ($name == 'morocco') {
            $category = 'المغرب';
            $Posts = Post::where('Type', 'like', '%' . $name . '%')->get()->all();
        } else if ($name == 'world') {
            $category = 'العالم';
            $Posts = Post::where('Type', 'like', '%' . $name . '%')->get()->all();
        } else if ($name == 'politic') {
            $category = 'سياسة';
            $Posts = Post::where('Type', 'like', '%' . $name . '%')->get()->all();
        } else if ($name == 'tech') {
            $category = 'تقنية';
            $Posts = Post::where('Type', 'like', '%' . $name . '%')->get()->all();
        } else if ($name == 'sport') {
            $category = 'رياضة';
            $Posts = Post::where('Type', 'like', '%' . $name . '%')->get()->all();
        } else if ($name == 'art') {
            $category = 'فن';
            $Posts = Post::where('Type', 'like', '%' . $name . '%')->get()->all();
        } else if ($name == 'health') {
            $category = 'صحة';
            $Posts = Post::where('Type', 'like', '%' . $name . '%')->get()->all();
        } else if ($name == 'recentnews') {
            $category = 'اخر الاخبار';
            $Posts = Post::orderBy('created_at', 'desc')->get()->all();
        } else if ($name == 'mostviews') {
            $category = 'الاكتر مشاهدة';
            $Posts = Post::orderBy('created_at', 'desc')->get()->all();
        }
        Category_visit::insert([
            'category' =>  $category,
            'created_at' => date('Y-m-d h:i:s')
        ]);

        return view('Users/Category', compact(['Posts', 'category']));
    }
}
