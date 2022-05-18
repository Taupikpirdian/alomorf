<?php

namespace App\Http\Controllers;

use Auth;
use App\Slider;
use App\Event;
use App\NewFeed;
use Illuminate\Http\Request;
use App\Story;
use App\StoryRating;
use App\CategoryNewsFeed;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;
use App\Language;
use App\Category;
use App\User;
use App\CompetitionParticipant;
use App\UserProfile;
use App\PartStory;
use App\PartStoryStatus;
use App\ContentWritingProgram;
use App\WritingProgramParticipant;
use App\Comment;
use App\ContentInkubasi;
use App\InkubatorParticipant;
use App\PartWritingProgram;
use App\ProgramNovel;
use App\ProgramNovelComment;
use App\Mentor;
use App\ChatInkubasi;
use App\Message;
use App\Conversation;
use Image;
use File;
use DB;
use Illuminate\Support\Facades\Crypt;

class HomeController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $user = Auth::user();
      $story = Story::orderBy('stories.created_at', 'desc')->limit(10)->get();
      $popular_stories = Story::orderBy('rating', 'desc')->orderBy('viewer', 'desc')->limit(10)->get();
      $list_categories = Category::orderBy('created_at', 'desc')->get();
      
      $categories = Category::orderByRaw("RAND()")
      ->rightJoin('stories', 'stories.id_category', '=', 'categories.id_category')
      ->selectRaw('categories.id_category, categories.name, count(stories.id_category) as storyCount')
      ->groupBy('categories.id_category', 'categories.name')
      ->limit(5)
      ->get();

      foreach ($categories as $key => $category) {
        $category->stories = Story::where('id_category', $category->id_category)->limit(10)->get();
      }
      
      $sliders = Slider::orderBy('sliders.order', 'asc')
      ->join('users', 'users.id', '=', 'sliders.id_users')
      ->select('sliders.id','sliders.judul','sliders.deskripsi','sliders.order','sliders.foto','users.name')
      ->get();

      $newfeed = NewFeed::orderBy('new_feeds.published_at', 'desc')->where('id_status_new_feed', 1)->limit(2)->get();
      $story_recomands = Story::orderBy('stories.updated_at', 'desc')->where('status_recommendation', 1)->limit(6)->get();
      $events = Event::orderBy('created_at', 'desc')->get();
      
      // foreach ($story_recomands as $key => $story_recomand) {
      //       echo "<pre>";
      //       print_r($story_recomand->commentLimits);
      //       echo "</pre>";
      //       exit();
      //   }

      // echo "<pre>";
      // print_r($story_recomands->);
      // echo "</pre>";
      // exit();

      // Count Part
      // $countParts = DB::table('part_stories')
      // ->orderBy('stories.created_at', 'desc')
      // ->leftjoin('stories', 'stories.id_story', '=', 'part_stories.id_story')
      // ->select(
      //     'part_stories.id_story', 
      //     DB::raw('COUNT(part_stories.id_story) as jumlah_part'))
      // ->groupBy('part_stories.id_story')
      // ->get();

      // Comment

      $comments = Comment::orderBy('comments.created_at', 'desc')->paginate(3);
      $comment_populers = Comment::orderBy('comments.created_at', 'desc')->get();
      return view('welcome',compact('comment_populers', 'comments', 'countParts', 'events', 'story_recomands', 'newfeed', 'story', 'popular_stories', 'sliders', 'categories', 'categories_name'), array('list_categories' => $list_categories, 'user' => $user));
    }

    
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function errors()
    {
        return view('404');
    }

    public function detail($id_story)
    {
      $user = Auth::user();
      $story = Story::where('stories.id_story', $id_story)->first();
      $partstory = PartStory::where(['part_stories.id_story' => $story->id_story, 'id_part_story_status' => 1])
                              ->first();
      $popular_stories = Story::orderBy('stories.viewer', 'desc')
                      ->leftJoin('users', 'users.id', '=', 'stories.id_user')
                      ->leftJoin('categories', 'categories.id_category', '=', 'stories.id_category')
                      ->select( 
                                'users.name as nama_user',
                                'users.id',
                                'stories.title',
                                'stories.description',
                                'stories.id_story',
                                'stories.cover_photo',
                                'stories.viewer',
                                'categories.name as nama_category',
                                'categories.id_category'
                              )
                      ->limit(10)
                      ->get();

      $sliders = Slider::orderBy('sliders.order', 'asc')
      ->join('users', 'users.id', '=', 'sliders.id_users')
      ->select('sliders.id','sliders.judul','sliders.deskripsi','sliders.order','sliders.foto','users.name')
      ->get();

      $comments = Comment::orderBy('comments.created_at', 'desc')->where('comments.story_id', $id_story)->paginate(5);
      if(Auth::user()){
        $rating = StoryRating::where('story_ratings.id_user', Auth::user()->id)
        ->where('story_ratings.id_story', $story->id_story)
        ->first();
      }else{
        $rating = StoryRating::where('story_ratings.id_story', $story->id_story)->get();
        $rating_avg = StoryRating::where('story_ratings.id_story', $story->id_story)
        ->avg('rating');
        $rating->rating = round($rating_avg); 
      }
      return view('book-detail',compact('rating', 'comments', 'popular_stories', 'sliders'), array('partstory'=>$partstory, 'story'=>$story, 'user' => $user));
    }

    public function viewStory(Request $request)
    {
      $id_part_story = $request['id_part_story'];
      $id_story = $request['id_story'];

      $story = Story::where('stories.id_story', $id_story)->firstOrFail();
      $story->viewer = $story->viewer + 1;
      $story->save();

      return Redirect('book-read/'.$id_part_story);
    }

    public function searchStory(Request $request)
    {
      $user = Auth::user();
      $search = $request->get('search');
      $stories = Story::orderBy('stories.created_at', 'desc')->where('title','LIKE','%'.$search.'%')->paginate(12);
      $sliders = Slider::orderBy('sliders.order', 'asc')
      ->join('users', 'users.id', '=', 'sliders.id_users')
      ->select('sliders.id','sliders.judul','sliders.deskripsi','sliders.order','sliders.foto','users.name')
      ->get();
      $comments = Comment::orderBy('comments.created_at', 'desc')->get();
      return view('welcome-search',compact('comments', 'stories', 'sliders', 'search'), array('user' => $user));
    }

    public function searchStoryTrash(Request $request)
    {
      
      // if(empty($request['id_category'])):
      //   $arr = [['stories.title', 'LIKE', '%'.$request['title'].'%']];
      // else:
      //   $arr = [['stories.id_category', '=', $request['id_category']], ['stories.title', 'LIKE', '%'.$request['title'].'%']];
      // endif;
      
      $user = Auth::user();
      $search = $request->get('search');

      // $story = Story::where($arr)
      //                 ->orderBy('stories.created_at', 'desc')
      //                 ->leftJoin('users', 'users.id', '=', 'stories.id_user')
      //                 ->leftJoin('categories', 'categories.id_category', '=', 'stories.id_category')
      //                 ->select( 
      //                           'users.name as nama_user',
      //                           'users.id',
      //                           'stories.title',
      //                           'stories.description',
      //                           'stories.id_story',
      //                           'stories.cover_photo',
      //                           'stories.viewer',
      //                           'categories.name as nama_category',
      //                           'categories.id_category'
      //                         )
      //                 ->get();

      $story = Story::orderBy('stories.created_at', 'desc')
                      ->leftJoin('users', 'users.id', '=', 'stories.id_user')
                      ->leftJoin('categories', 'categories.id_category', '=', 'stories.id_category')
                      ->select( 
                                'users.name as nama_user',
                                'users.id',
                                'stories.title',
                                'stories.description',
                                'stories.id_story',
                                'stories.cover_photo',
                                'stories.viewer',
                                'categories.name as nama_category',
                                'categories.id_category'
                              )
                      ->where('title','LIKE','%'.$search.'%')
                      ->get();

      $popular_stories = Story::orderBy('stories.viewer', 'desc')
                      ->leftJoin('users', 'users.id', '=', 'stories.id_user')
                      ->leftJoin('categories', 'categories.id_category', '=', 'stories.id_category')
                      ->select( 
                                'users.name as nama_user',
                                'users.id',
                                'stories.title',
                                'stories.description',
                                'stories.id_story',
                                'stories.cover_photo',
                                'stories.viewer',
                                'categories.name as nama_category',
                                'categories.id_category'
                              )
                      ->limit(10)
                      ->get();

      // $list_categories = Category::all();
      $list_categories = Category::pluck('name', 'id_category')->prepend('ALL GENRE', '0');
      
      $categories = Category::
                    orderByRaw("RAND()")
                    ->rightJoin('stories', 'stories.id_category', '=', 'categories.id_category')
                    ->selectRaw('categories.id_category, categories.name, count(stories.id_category) as storyCount')
                    ->groupBy('categories.id_category', 'categories.name')
                    // ->where('id_category', '>=', 1)
                    ->get();

      $sliders = Slider::orderBy('sliders.order', 'asc')
                  ->join('users', 'users.id', '=', 'sliders.id_users')
                  ->select('sliders.id','sliders.judul','sliders.deskripsi','sliders.order','sliders.foto','users.name')
                  ->get();

      $story_recomands = Story::orderBy('stories.updated_at', 'desc')
              ->where('status_recommendation', 1)
              ->limit(6)
              ->get();

      return view('welcome',compact('story_recomands', 'story', 'categories', 'popular_stories', 'sliders'), array('list_categories' => $list_categories, 'user' => $user));
    }

     public function read($id_part_story)
     {
      $user = Auth::user();
      $story = PartStory::where('id_part_story', $id_part_story)->first();

      $part_stories = PartStory::where(['part_stories.id_story' => $story->id_story, 'id_part_story_status' => 1])
      ->select(
                'part_stories.id_story', 
                'part_stories.id_part_story', 
                'part_stories.title' 
              )
      ->get();
      $comments = Comment::orderBy('comments.created_at', 'desc')->where('comments.part_story_id', $id_part_story)->paginate(5);
      return view('book-read', compact('comments', 'story'), array('part_stories'=>$part_stories, 'user' => $user));
    }

    public function profil($id)
    {
      $user = Auth::user();
      $user_writing = WritingProgramParticipant::where('user_id', $id)->first();
      $user_inkubasi = InkubatorParticipant::where('user_id', $id)->first();

      $users = User::where('users.id', $id)
                      ->leftJoin('user_profiles', 'user_profiles.id_user', '=', 'users.id')
                      ->first();
      // echo "<pre>";
      // print_r($users->userProfil);
      // echo "</pre>";
      // exit();

      $own_stories = Story::where('id_user', $id)
                      ->leftJoin('users', 'users.id', '=', 'stories.id_user')
                      ->leftJoin('categories', 'categories.id_category', '=', 'stories.id_category')
                      ->select( 
                                'users.name as nama_user',
                                // 'users.id',
                                'stories.title',
                                'stories.description',
                                'stories.id_story',
                                'stories.cover_photo',
                                'stories.viewer',
                                'categories.name as nama_category',
                                'categories.id_category'
                              )
                      ->orderBy('stories.created_at', 'desc')
                      ->get();

      return view('profil',compact('user_writing', 'user_inkubasi', 'own_stories'), array('users'=>$users, 'user' => $user));
    }

    public function challengesatu()
    {
        return view('challenge-satu');
    }

    public function news()
    {
      $user = Auth::user();
      $kreators = NewFeed::where('id_status_new_feed', 1)->orderBy('new_feeds.published_at', 'desc')->where('id_category_news_feed', 1)->limit(4)->get();
      $karyas = NewFeed::where('id_status_new_feed', 1)->orderBy('new_feeds.published_at', 'desc')->where('id_category_news_feed', 2)->limit(4)->get();
      $communitas = NewFeed::where('id_status_new_feed', 1)->orderBy('new_feeds.published_at', 'desc')->where('id_category_news_feed', 3)->limit(4)->get();
      $tips_and_tricks = NewFeed::where('id_status_new_feed', 1)->orderBy('new_feeds.published_at', 'desc')->where('id_category_news_feed', 4)->limit(4)->get();
      $newsfeeds = NewFeed::where('id_status_new_feed', 1)->orderBy('new_feeds.published_at', 'desc')->where('id_category_news_feed', 5)->limit(4)->get();
      $sliders = Slider::orderBy('sliders.order', 'asc')->get();
      $story_recomands = Story::orderBy('stories.updated_at', 'desc')->where('status_recommendation', 1)->limit(6)->get();
      $comments = Comment::orderBy('comments.created_at', 'desc')->get();
      $newsfeed_categories = CategoryNewsFeed::orderBy('created_at', 'desc')->get();

      return view('news-feed', compact('newsfeed_categories', 'comments', 'tips_and_tricks', 'communitas', 'karyas', 'kreators', 'newsfeeds', 'sliders', 'story_recomands'), array('user' => $user));
    }    

    public function newsDetail($id)
    {
      $user = Auth::user();
      $story = Story::orderBy('stories.created_at', 'desc')->limit(3)
                      ->leftJoin('users', 'users.id', '=', 'stories.id_user')
                      ->get();
      
      $newfeed = NewFeed::where(['id_status_new_feed' => 1, 'id_category_news_feed' => $id])
                      ->orderBy('new_feeds.published_at', 'desc')
                      ->leftJoin('users', 'users.id', '=', 'new_feeds.user_id')
                      ->select( 
                                'new_feeds.title',
                                'new_feeds.text',
                                'new_feeds.id as id_new_feeds',
                                'new_feeds.photo',
                                'new_feeds.created_at',
                                'new_feeds.published_at',
                                'users.name'
                              )
                      ->paginate(10);

      $popular_stories = Story::orderBy('stories.created_at', 'desc')
                      ->leftJoin('users', 'users.id', '=', 'stories.id_user')
                      ->leftJoin('categories', 'categories.id_category', '=', 'stories.id_category')
                      ->select( 
                                'users.name as nama_user',
                                'users.id',
                                'stories.title',
                                'stories.description',
                                'stories.id_story',
                                'stories.cover_photo',
                                'stories.viewer',
                                'categories.name as nama_category',
                                'categories.id_category'
                              )
                      ->limit(10)
                      ->get();

      return view('news-feed-detail', compact('popular_stories'), array('story'=>$story, 'newfeed'=>$newfeed, 'user' => $user));
    }

    public function createStory()
    {
        $user = Auth::user();
        $category = Category::pluck('name', 'id_category');
        $language = Language::pluck('name', 'id_language');

        return view('create.create',array('category' => $category, 'language' => $language, 'user' => $user));
    }
    public function storeStory(Request $request)
    {
        $user = Auth::user();
        // store
        $story = new Story;
        $story ->title                   = Input::get('title');
        $story ->description             = Input::get('description');
        $story ->id_language             = Input::get('id_language');
        $story ->id_category             = Input::get('id_category');
        $story ->status_recommendation   = 0;
        $story ->id_user                 = Auth::user()->id;
         // addfoto
        $img = $request->file('file');
        if($img){
          $imageName = time().'.'.$img->getClientOriginalExtension();
          //thumbs
          $destinationPath = public_path('images/story/thumbs');
          if(!File::exists($destinationPath)){
              if(File::makeDirectory($destinationPath,0777,true)){
                  throw new \Exception("Unable to upload to invoices directory make sure it is read / writable.");  
              }
          }
          $image = Image::make($img->getRealPath());
          // $image->fit(200, 200);
          $image->resize(132, 187);
          $image->save($destinationPath.'/'.$imageName);
          //original
          $destinationPath = public_path('images/story');
          $img = Image::make($img)->encode('jpg', 50);
          $img->save($destinationPath.'/'.$imageName);
          //save data image to db
          $story->cover_photo = $imageName;
        }
        $story->save();

        $request->session()->flash('alert-success', 'Profil mahasiswa berhasil di perbaharui!');  
        return Redirect('create/create-satu/'.$user->id);
    }
    
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function view($id)
    {
      $user = Auth::user();
      $userprofile = UserProfile::where('users.id', $id)
                      ->leftJoin('users', 'users.id', '=', 'user_profiles.id_user')
                      ->first();
      return view('create.view',array('userprofile'=>$userprofile, 'user' => $user));
    }

    public function addView($id)
    {
      $user = Auth::user();
      return view('create.add',array('user' => $user));
    }

    public function updateView(Request $request, $id)
    {
        $user = User::where('id', $id)->firstOrFail(); 
        $user ->name        = Input::get('name');
        $user ->save();

        $userprofile = UserProfile::where('id_user' ,$id)->firstOrFail(); 
        $userprofile ->tempat_lahir   = Input::get('tempat_lahir');
        $userprofile ->tanggal_lahir  = Input::get('tanggal_lahir');
        $userprofile ->sekolah        = Input::get('sekolah');
        $userprofile ->kota           = Input::get('kota');
        $userprofile ->nomor_hp       = Input::get('nomor_hp');
        $userprofile ->alamat         = Input::get('alamat');
        $userprofile ->deskripsi      = Input::get('deskripsi');
        // $userprofile ->save();

        //validasi jika ada photo
        if ($request->file('foto_profile')) {
          // addfoto
          $img = $request->file('foto_profile');
          $imageName = time().'.'.$img->getClientOriginalExtension();

          //thumbs
          $destinationPath = public_path('images/foto_profile/thumbs');
          if(!File::exists($destinationPath)){
              if(File::makeDirectory($destinationPath,0777,true)){
                  throw new \Exception("Unable to upload to invoices directory make sure it is read / writable.");  
              }
          }
            $image = Image::make($img->getRealPath());
            $image->fit(200, 200);
            $image->save($destinationPath.'/'.$imageName);

          //original
          $destinationPath = public_path('images/foto_profile');
          if(!File::exists($destinationPath)){
              if(File::makeDirectory($destinationPath,0777,true)){
                  throw new \Exception("Unable to upload to invoices directory make sure it is read / writable.");  
              }
          }
            $img = Image::make($img)->encode('jpg', 50);
            $img->save($destinationPath.'/'.$imageName);
          //save data image to db
          $userprofile->foto_profile = $imageName;
        }
        $userprofile->save();

        return Redirect::action('HomeController@profil', compact('user', 'userprofile'))->with('flash-success','The user has been added.');
    }

    public function createView(Request $request, $id)
    {
        $user = User::where('id', $id)->firstOrFail(); 
        $user ->name        = Input::get('name');
        $user ->save();

        $userprofile = new UserProfile;
        $userprofile ->id_user        = $id;
        $userprofile ->tempat_lahir   = Input::get('tempat_lahir');
        $userprofile ->tanggal_lahir  = Input::get('tanggal_lahir');
        $userprofile ->sekolah        = Input::get('sekolah');
        $userprofile ->kota           = Input::get('kota');
        $userprofile ->nomor_hp       = Input::get('nomor_hp');
        $userprofile ->alamat         = Input::get('alamat');
        $userprofile ->deskripsi      = Input::get('deskripsi');
        // $userprofile ->save();

        //validasi jika ada photo
        if ($request->file('foto_profile')) {
          // addfoto
          $img = $request->file('foto_profile');
          $imageName = time().'.'.$img->getClientOriginalExtension();

          //thumbs
          $destinationPath = public_path('images/foto_profile/thumbs');
          if(!File::exists($destinationPath)){
              if(File::makeDirectory($destinationPath,0777,true)){
                  throw new \Exception("Unable to upload to invoices directory make sure it is read / writable.");  
              }
          }
            $image = Image::make($img->getRealPath());
            $image->fit(200, 200);
            $image->save($destinationPath.'/'.$imageName);

          //original
          $destinationPath = public_path('images/foto_profile');
          if(!File::exists($destinationPath)){
              if(File::makeDirectory($destinationPath,0777,true)){
                  throw new \Exception("Unable to upload to invoices directory make sure it is read / writable.");  
              }
          }
            $img = Image::make($img)->encode('jpg', 50);
            $img->save($destinationPath.'/'.$imageName);
          //save data image to db
          $userprofile->foto_profile = $imageName;
        }
        $userprofile->save();

        return Redirect::action('HomeController@profil', compact('user', 'userprofile'))->with('flash-success','The user has been added.');
    }

    public function createsatu($id)
    {
      $user = Auth::user();
      $story = Story::where('users.id', $id)
                ->leftJoin('users', 'users.id', '=', 'stories.id_user')
                ->leftJoin('categories', 'categories.id_category', '=', 'stories.id_category')
                ->select( 
                'users.name as nama_user',
                'users.id',
                'stories.title',
                'stories.description',
                'stories.id_story',
                'stories.cover_photo',
                'stories.viewer',
                'categories.name as nama_category'
                )
                ->orderBy('stories.created_at', 'desc')
                ->get();

      $count = Story::leftJoin('users', 'users.id', '=', 'stories.id_user')
      ->where('users.id', $id)
      ->count();
      // jika user login tidak sama dengan id dashboard book, maka redirect ke home
      if($user->id == $id){
        return view('create.create-satu',compact('count'), array('story'=>$story, 'user' => $user));
      }else{
        return redirect()->intended('/');
      }

    }

    public function challenge()
    {
        return view('challenge');
    }

    public function bookId($id_story)
    {
      $user = Auth::user();
      $category=Category::pluck('name', 'id_category');
      $category->prepend('Pilih Kategori', '');
      $story = Story::where('stories.id_story', $id_story)->first();
      $part_stories = PartStory::where('id_story',$story->id_story)
      ->leftJoin('part_story_statuses', 'part_story_statuses.id', '=', 'part_stories.id_part_story_status')
      ->get();
      $language = Language::pluck('name','id_language');
      $language->prepend('Pilih Bahasa', '');

      return view('book-id',compact('category', 'language'), array('part_stories'=>$part_stories, 'story'=>$story, 'user' => $user));
    }

    public function destroyPartStory($id_part_story)
    {
        $partstory = PartStory::where('id_part_story', $id_part_story)->firstOrFail();
        $partstory->delete();
        return Redirect('book-id/'.$partstory->id_story);
    }

    public function showPartStory($id_part_story)
    {
        $user = Auth::user();
        $partstory = PartStory::where('id_part_story', $id_part_story)
                      ->leftJoin('stories', 'stories.id_story', '=', 'part_stories.id_story')
                      ->select(
                               'stories.id_story', 
                               'stories.cover_photo', 
                               'stories.title as title_stories',
                               'stories.viewer as viewer',
                               'part_stories.title as title_part_stories', 
                               'part_stories.story' 
                              )
                      ->first();
        $part_stories = PartStory::where(['part_stories.id_story' => $partstory->id_story, 'id_part_story_status' => 1])
                        ->select(
                                 'part_stories.id_story', 
                                 'part_stories.id_part_story', 
                                 'part_stories.title' 
                                )
                        ->get();   
        
        return view('part-story-read', compact('partstory', 'part_stories'),array('user' => $user));
    }

    public function chapterEdit($id_part_story)
    {
      $user = Auth::user();
      $partstory = PartStory::where('id_part_story', $id_part_story)->first();
      
      $today_now = date('Y-m-d'); 
      $part_story_status = PartStoryStatus::pluck('name', 'id');
      
      return view('create.chapter_edit', compact('partstory', 'part_story_status', 'today_now'),array('user' => $user));
    }

    public function chapterUpdate(Request $request, $id_story)
    {
      // print_r($request->all());
      // exit();
      $partstory = PartStory::where('id_part_story', $id_story)->firstOrFail();
      $partstory ->id_story             = Input::get('id_story');
      $partstory ->title                = Input::get('title');
      $partstory ->story                = Input::get('description');
      $partstory ->tanggal_terbit       = Input::get('tanggal_terbit');
      $partstory ->id_part_story_status = Input::get('id_part_story_status');
      $partstory ->save();

      return Redirect('book-read/'.$id_story);
    }
    
    public function Chapter($id_story)
    {
      $user = Auth::user();
      $today_now = date('Y-m-d'); 
      $part_story_status = PartStoryStatus::pluck('name', 'id');
      $story = Story::where('stories.id_story', $id_story)
      ->leftJoin('part_stories', 'part_stories.id_story', '=', 'stories.id_story')
      ->select(
               // 'part_stories.id_story',
                'stories.id_story'
              )
      ->first();

      return view('create.chapter',array('today_now' => $today_now, 'part_story_status' => $part_story_status, 'story' => $story,'user' => $user));
    }

    public function newsfeeds($id)
    {
        $user = Auth::user();
        $newfeed = NewFeed::where('id', $id)->firstOrFail();   

      return view('book-feeds',array('newfeed' => $newfeed, 'user' => $user));
    }
  
    public function chapterStore(Request $request, $id_story)
    {

      $partstory = new PartStory;
      $partstory ->id_story             = Input::get('id_story');
      $partstory ->title                = Input::get('title');
      $partstory ->story                = Input::get('description');
      $partstory ->tanggal_terbit       = Input::get('tanggal_terbit');
      $partstory ->id_part_story_status = Input::get('id');
      $partstory ->save();

      return Redirect('book-id/'.$partstory->id_story);
    }
    
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function app($id)
    {
      $user = Auth::user();

      $story_rights = Story::orderBy('stories.created_at', 'desc')->limit(3)
      // ->leftJoin('users', 'users.id', '=', 'stories.id_user')
      ->leftJoin('categories', 'categories.id_category', '=', 'stories.id_category')
      ->select( 
                // 'users.name as nama_user',
                // 'users.id',
                'stories.title',
                'stories.description',
                'stories.id_story',
                'stories.cover_photo',
                'stories.viewer',
                'categories.name as nama_category',
                'categories.id_category'
              )
      ->get();

      return view('layouts.app',array('story_rights'=>$story_rights, 'story'=>$story, 'user' => $user));
    }

  public function searchCategories(Request $request, $id_category)
  {
    $search = $request->get('search');
    $list_categories = Category::orderBy('created_at', 'desc')->get();
    $stories = Story::where('id_category', $id_category)->get();
    $sliders = Slider::orderBy('sliders.order', 'asc')->get();
    $category = Category::where('id_category', $id_category)->first();
    $comments = Comment::orderBy('comments.created_at', 'desc')->get();
    return view('welcome-filter', compact('comments', 'stories','sliders', 'search', 'list_categories', 'category'));
  }


  public function allEvent()
  {
    $sliders = Slider::orderBy('sliders.order', 'asc')
    ->join('users', 'users.id', '=', 'sliders.id_users')
    ->select('sliders.id','sliders.judul','sliders.deskripsi','sliders.order','sliders.foto','users.name')
    ->get();

    $events = Event::orderBy('created_at', 'desc')->paginate(8);
    return view('all-event',compact('sliders', 'events'));
  }

  public function detailEvent($id)
  {
    if(Auth::user()){
      $user_login = Auth::user()->id;
      $user = User::where('id', $user_login)->firstOrFail();
    }
    $comments = Comment::orderBy('comments.created_at', 'desc')->paginate(1);
    $sliders = Slider::orderBy('sliders.order', 'asc')
      ->join('users', 'users.id', '=', 'sliders.id_users')
      ->select('sliders.id','sliders.judul','sliders.deskripsi','sliders.order','sliders.foto','users.name')
      ->get();
    // echo "<pre>";
    // print_r($user->userProfil);
    // echo "</pre>";
    // exit();
    $event = Event::where('id', $id)->firstOrFail();
    $competition_participants = CompetitionParticipant::where('event_id', $id)->where('verified', 1)->paginate(25);
    return view('detail-event', compact('comments', 'user', 'event', 'competition_participants', 'sliders'));
  }

  public function formCompetition(Request $request)
  {
    $form = new CompetitionParticipant;
    $form ->user_id        	  = Input::get('user_id');
    $form ->event_id        	= Input::get('event_id');
    $form ->book_id        	  = Input::get('book_id');
    $arr_link = explode("/",$form->book_id);
    // cek datanya sudah ada atau belum
    $competitions = CompetitionParticipant::orderBy('created_at', 'desc')->get();
    foreach ($competitions as $key => $competition) {
        if( ($competition->user_id == Auth::user()->id) && ($competition->event_id == Input::get('event_id') ) && ($competition->book_id == $arr_link[4]) ){
          return Redirect::back()->withErrors(['Buku sudah terdaftar', 'The Message']);
        }
    }
    // echo "<pre>";
    // print_r($form);
    // print_r (explode("/",$form->book_id));
    // $arr_link = explode("/",$form->book_id);
    // echo count($arr_link);
    if(count($arr_link) == 5){
      if(is_numeric($arr_link[4])){
        // echo "betul";
        $story = Story::where('id_user', Auth::user()->id)->where('id_story', $arr_link[4])->first();
        print_r($story);
        if($story){
          $form ->book_id        	  = $arr_link[4];
          $form ->verified        	= 1;
          $form ->save();  
          return Redirect::action('HomeController@detailEvent', ['id' => $form ->event_id])->with('flash-success','Selamat !!! kamu berhasil mendaftar.');
        }
      }
    }
    // echo "</pre>";
    // exit();
    return Redirect::action('HomeController@detailEvent', ['id' => $form ->event_id])->with('flash-error','Link yang anda masukan tidak sesuai');
  }

  public function formComment(Request $request)
  {
    $form_comment = new Comment;
    $form_comment ->user_id        	  = Auth::user()->id;
    $form_comment ->story_id        	= Input::get('id_story');
    $form_comment ->text        	    = Input::get('text');
    $form_comment ->save();
    return Redirect::action('HomeController@index')->with('flash-success','Anda berhasil berkomentar');
  }

  public function formCommentStoryHome(Request $request)
  {
    $form_comment = new Comment;
    $form_comment ->user_id        	  = Auth::user()->id;
    $form_comment ->story_id        	= Input::get('id_story');
    $form_comment ->text        	    = Input::get('text');
    $form_comment ->save();
    return Redirect::back()->withErrors(['Komentar berhasil', 'The Message']);
  }

  public function formCommentPartStory(Request $request)
  {
    $form_comment = new Comment;
    $form_comment ->user_id        	  = Auth::user()->id;
    $form_comment ->part_story_id    	= Input::get('id_part_story');
    $form_comment ->text        	    = Input::get('text');
    $form_comment ->save();
    return Redirect::back()->withErrors(['Komentar berhasil', 'The Message']);
  }

  public function formCommentWritingProgram(Request $request)
  {
    $form_comment = new Comment;
    $form_comment ->user_id        	  = Auth::user()->id;
    $form_comment ->part_comments    	= 1;
    $form_comment ->text        	    = Input::get('text');
    $form_comment ->save();
    return Redirect::back()->withErrors(['Komentar berhasil', 'The Message']);
  }

  public function formCommentProgramNovel(Request $request)
  {
    $form_comment = new ProgramNovelComment;
    $form_comment ->user_id        	  = Auth::user()->id;
    $form_comment ->program_id      	= Input::get('program_id');

    if(Input::get('reply_program_id')){
      $form_comment ->reply_program_id 	= Input::get('reply_program_id');
    }

    $form_comment ->type_id          	= 3;
    $form_comment ->text        	    = Input::get('text');
    $form_comment ->save();
    return Redirect::back()->withErrors(['Komentar berhasil', 'The Message']);
  }

  public function formCommentInkubasi(Request $request)
  {
    $form_comment = new Comment;
    $form_comment ->user_id        	  = Auth::user()->id;
    $form_comment ->part_comments    	= 2;
    $form_comment ->text        	    = Input::get('text');
    $form_comment ->save();
    return Redirect::back()->withErrors(['Komentar berhasil', 'The Message']);
  }

  public function writingProgram(){
    if(Auth::user()){
      $user = User::where('id', Auth::user()->id)->first();
      $user_writing = WritingProgramParticipant::where('user_id', Auth::user()->id)->first();
      $user_inkubasi = InkubatorParticipant::where('user_id', Auth::user()->id)->first();
    }

     $sliders = Slider::orderBy('sliders.order', 'asc')
      ->join('users', 'users.id', '=', 'sliders.id_users')
      ->select('sliders.id','sliders.judul','sliders.deskripsi','sliders.order','sliders.foto','users.name')
      ->get();

      // konten writing program
      $writing_program_1 = ContentWritingProgram::where('order', 1)->first();
      $writing_program_2 = ContentWritingProgram::where('order', 2)->first();
      $writing_program_3 = ContentWritingProgram::where('order', 3)->first();
      $comments = Comment::orderBy('comments.created_at', 'desc')->where('comments.part_comments', 1)->paginate(15);
      $inkubasi_comments = Comment::orderBy('comments.created_at', 'desc')->where('comments.part_comments', 2)->paginate(15);
      $writing_program_participants = WritingProgramParticipant::orderBy('created_at', 'desc')->paginate(24);   

      // konten inkubator
      $inkubasi_1 = ContentInkubasi::where('order', 1)->first();
      $inkubasi_2 = ContentInkubasi::where('order', 2)->first();
      $inkubasi_3 = ContentInkubasi::where('order', 3)->first();
      $inkubasi_participants = InkubatorParticipant::orderBy('created_at', 'desc')->paginate(24);
      $program_novels = ProgramNovel::orderBy('created_at', 'desc')->paginate(24);
      return view("writing-program",compact('program_novels', 'inkubasi_comments', 'user_inkubasi', 'user_writing', 'inkubasi_participants', 'writing_program_participants', 'user', 'comments', 'writing_program_1', 'writing_program_2', 'writing_program_3', 'inkubasi_1', 'inkubasi_2', 'inkubasi_3', 'sliders'));
  } 

  public function programNovel(){
    $user_writing = WritingProgramParticipant::where('user_id', Auth::user()->id)->first();
    $program_novel = ProgramNovel::orderBy('created_at', 'desc')->where('participant_id', $user_writing->id)->paginate(24);
    $program_novels = ProgramNovel::orderBy('created_at', 'desc')->paginate(24);

    // Kondisi jika id user = id perndaftar
    // $program_novels = ProgramNovel::orderBy('created_at', 'desc')->where('participant_id', $user_writing->id)->get();

    return view("program-novel",compact('program_novel_project', 'program_novels', 'program_novel', 'user_writing'));
  }

  public function destroyProgramNovel($id)
  {
    $program_novel = ProgramNovel::findOrFail($id);
    $program_novel->delete();
    return Redirect::back()->withErrors(['Project berhasil dihapus.', 'The Message']);
  }

  public function createformulirProgramNovel(){
    $genres=Category::pluck('name', 'id_category');
    $genres->prepend('Pilih Genre', '');
    $user_writing = WritingProgramParticipant::where('user_id', Auth::user()->id)->first();

    $part_writing_program_1 = PartWritingProgram::where('part', 1)->first();
    $part_writing_program_2 = PartWritingProgram::where('part', 2)->first();
    $part_writing_program_3 = PartWritingProgram::where('part', 3)->first();
    $part_writing_program_4 = PartWritingProgram::where('part', 4)->first();
    $part_writing_program_5 = PartWritingProgram::where('part', 5)->first();
    $part_writing_program_6 = PartWritingProgram::where('part', 6)->first();
    $part_writing_program_7 = PartWritingProgram::where('part', 7)->first();
    $part_writing_program_8 = PartWritingProgram::where('part', 8)->first();
    $part_writing_program_9 = PartWritingProgram::where('part', 9)->first();
    $part_writing_program_10 = PartWritingProgram::where('part', 10)->first();

    return view("create-program-novel", compact('user_writing', 'genres', 'part_writing_program_1', 'part_writing_program_2', 'part_writing_program_3', 'part_writing_program_4', 'part_writing_program_5', 'part_writing_program_6', 'part_writing_program_7', 'part_writing_program_8', 'part_writing_program_9', 'part_writing_program_10'));
  }

  public function postformulirProgramNovel(Request $request, $id){
        // store
        $program_novel= new ProgramNovel;
        $program_novel->participant_id        = $id;
        $program_novel->title                 = Input::get('title');
        $program_novel->category_id           = Input::get('category_id');
        if(Input::get('stage_1')){
          $program_novel->stage_1               = Input::get('stage_1');
        }
        if(Input::get('stage_2')){
          $program_novel->stage_2               = Input::get('stage_2');
        }
        if(Input::get('stage_3')){
          $program_novel->stage_3               = Input::get('stage_3');
        }
        if(Input::get('stage_4')){
          $program_novel->stage_4               = Input::get('stage_4');
        }
        if(Input::get('stage_5')){
          $program_novel->stage_5               = Input::get('stage_5');
        }
        if(Input::get('stage_6')){
          $program_novel->stage_6               = Input::get('stage_6');
        }
        if(Input::get('stage_7')){
          $program_novel->stage_7               = Input::get('stage_7');
        }
        if(Input::get('stage_8')){
          $program_novel->stage_8               = Input::get('stage_8');
        }
        if(Input::get('stage_9')){
          $program_novel->stage_9               = Input::get('stage_9');
        }
        if(Input::get('stage_10')){
          $program_novel->stage_10              = Input::get('stage_10');
        }

        if(Input::get('book_id')){
          // Mengambil nilai dari form
          $program_novel->book_id               = Input::get('book_id');
          // Memisahkan data menjadi beberapa array
          $arr_link = explode("/",$program_novel->book_id);
          // Menghitung apakah jumlah array = 5
          if(count($arr_link) == 5){
            // Deteksi apakah array ke 4 adalah angka
            if(is_numeric($arr_link[4])){
              // Mengecek storynya ada atau tidak
              $story = Story::where('id_user', Auth::user()->id)->where('id_story', $arr_link[4])->first();
              
              // Kondisi jika story ada
              if($story){
                // check double program novel
                $check_double_program_novel = ProgramNovel::wherebookId($arr_link[4])->first();
                if (!$check_double_program_novel) {
                  $program_novel ->book_id        	  = $arr_link[4];
                  $program_novel ->save();  
                  return Redirect::action('HomeController@programNovel', ['id' => $id])->with('flash-success','Project berhasil ditambahkan.');
                }else{
                  return Redirect::back()->withErrors(['Story ini sudah di daftarkan !', 'The Message']);
                }
              }else{
                return Redirect::back()->withErrors(['Link Story Tidak Sesuai', 'The Message']);
              }
            }
          }
        }

        $program_novel->save();
        return Redirect::action('HomeController@programNovel', ['id' => $id])->with('flash-success','Project berhasil ditambahkan.');
  }

  public function formulirProgramnovel(Request $request, $id){
    $part_writing_program_1 = PartWritingProgram::where('part', 1)->first();
    $part_writing_program_2 = PartWritingProgram::where('part', 2)->first();
    $part_writing_program_3 = PartWritingProgram::where('part', 3)->first();
    $part_writing_program_4 = PartWritingProgram::where('part', 4)->first();
    $part_writing_program_5 = PartWritingProgram::where('part', 5)->first();
    $part_writing_program_6 = PartWritingProgram::where('part', 6)->first();
    $part_writing_program_7 = PartWritingProgram::where('part', 7)->first();
    $part_writing_program_8 = PartWritingProgram::where('part', 8)->first();
    $part_writing_program_9 = PartWritingProgram::where('part', 9)->first();
    $part_writing_program_10 = PartWritingProgram::where('part', 10)->first();
    $program_novel = ProgramNovel::where('id', $id)->first();

    $genres=Category::pluck('name', 'id_category');
    $genres->prepend('Pilih Genre', '');

    return view("form-prog-novel", compact('genres', 'program_novel', 'part_writing_program_1', 'part_writing_program_2', 'part_writing_program_3', 'part_writing_program_4', 'part_writing_program_5', 'part_writing_program_6', 'part_writing_program_7', 'part_writing_program_8', 'part_writing_program_9', 'part_writing_program_10') );
  }

  public function updateformulirProgramNovel(Request $request, $id){
    // store
    $program_novel = ProgramNovel::where('id', $id)->firstOrFail();
    
    $program_novel->title                 = Input::get('title');
    $program_novel->category_id           = Input::get('category_id');
    if(Input::get('stage_1')){
      $program_novel->stage_1               = Input::get('stage_1');
    }
    if(Input::get('stage_2')){
      $program_novel->stage_2               = Input::get('stage_2');
    }
    if(Input::get('stage_3')){
      $program_novel->stage_3               = Input::get('stage_3');
    }
    if(Input::get('stage_4')){
      $program_novel->stage_4               = Input::get('stage_4');
    }
    if(Input::get('stage_5')){
      $program_novel->stage_5               = Input::get('stage_5');
    }
    if(Input::get('stage_6')){
      $program_novel->stage_6               = Input::get('stage_6');
    }
    if(Input::get('stage_7')){
      $program_novel->stage_7               = Input::get('stage_7');
    }
    if(Input::get('stage_8')){
      $program_novel->stage_8               = Input::get('stage_8');
    }
    if(Input::get('stage_9')){
      $program_novel->stage_9               = Input::get('stage_9');
    }
    if(Input::get('stage_10')){
      $program_novel->stage_10              = Input::get('stage_10');
    }

    if(Input::get('book_id')){
      $program_novel->book_id               = Input::get('book_id');
      $arr_link = explode("/",$program_novel->book_id);
      if(count($arr_link) == 5){
        if(is_numeric($arr_link[4])){
          $story = Story::where('id_user', Auth::user()->id)->where('id_story', $arr_link[4])->first();
          if($story){
            $program_novel ->book_id        	  = $arr_link[4];
            $program_novel ->save();  
            return Redirect::action('HomeController@programNovel', ['id' => $id])->with('flash-success','Project berhasil diupdate.');
          }else{
            return Redirect::back()->withErrors(['Link Story Tidak Sesuai', 'The Message']);
          }
        }
      }
    }

    $program_novel->save();
    return Redirect::action('HomeController@programNovel', ['id' => $id])->with('flash-success','Project berhasil diupdate.');
}

  public function detailProgramnovel($id){
      $part_writing_program_1 = PartWritingProgram::where('part', 1)->first();
      $part_writing_program_2 = PartWritingProgram::where('part', 2)->first();
      $part_writing_program_3 = PartWritingProgram::where('part', 3)->first();
      $part_writing_program_4 = PartWritingProgram::where('part', 4)->first();
      $part_writing_program_5 = PartWritingProgram::where('part', 5)->first();
      $part_writing_program_6 = PartWritingProgram::where('part', 6)->first();
      $part_writing_program_7 = PartWritingProgram::where('part', 7)->first();
      $part_writing_program_8 = PartWritingProgram::where('part', 8)->first();
      $part_writing_program_9 = PartWritingProgram::where('part', 9)->first();
      $part_writing_program_10 = PartWritingProgram::where('part', 10)->first();
      $program_novel = ProgramNovel::where('id', $id)->first();
      $comments = ProgramNovelComment::orderBy('created_at', 'desc')->where('program_id', $program_novel->id)->paginate(15);
      $user_writing = WritingProgramParticipant::where('user_id', Auth::user()->id)->first();

      return view("show-prog-novel", compact('user_writing', 'comments', 'program_novel', 'part_writing_program_1', 'part_writing_program_2', 'part_writing_program_3', 'part_writing_program_4', 'part_writing_program_5', 'part_writing_program_6', 'part_writing_program_7', 'part_writing_program_8', 'part_writing_program_9', 'part_writing_program_10'));
  }

  public function formWritingProgram(Request $request)
  {
    $form = new WritingProgramParticipant;
    $form ->user_id        	  = Input::get('user_id');
    $form ->pekerjaan        	= Input::get('pekerjaan');
    $form ->save();
    return Redirect::back()->withErrors(['Selamat !!! kamu berhasil mendaftar.', 'The Message']);
  }

  public function profilUser($id){
    $user = Auth::user();
    return view("editprofil.my_profile", compact('user'));
  }

  public function rating(Request $request, $id_story)
  {
    $rating = new StoryRating;
    if(Auth::user()){
      $rating->id_user        	= Auth::user()->id;
    }
    $rating->id_story         	= $id_story;
    $rating->rating      	      = Input::get('stars');
    $rating->save();

    // count jumlah bintang
    $jumlah_bintang = StoryRating::where('id_story', $id_story)->sum('rating');
    // count jumlah user rating
    $jumlah_user_rating = StoryRating::where('id_story', $id_story)->count();
    // update
    $update_rating = $jumlah_bintang/$jumlah_user_rating;

    $story_rating = Story::where('id_story', $id_story)->first();
    $story_rating->rating = $update_rating;
    $story_rating->save();
    return Redirect::back()->withErrors(['Rating berhasil', 'The Message']);
  }

  public function homeInkubasi(){
    $inkubasi_participants = InkubatorParticipant::orderBy('created_at', 'desc')->paginate(25);   
    $mentors = Mentor::orderBy('created_at', 'desc')->where('status', "Aktif")->get();
    $chats = ChatInkubasi::orderBy('created_at', 'asc')->paginate(100);

    // foreach ($chats as $key => $chat) {
    // echo "<pre>";
    // print_r($chat->user->userProfil);
    // echo "</pre>";
    // exit();
    // }
    return view("homeinkubasi", compact('chats', 'mentors', 'inkubasi_participants'));
  }

  public function newMessageChat(){
    
    return view("new-message-chat");
  }

  public function messageChat(){
    $messages = Message::orderBy('created_at', 'desc')->get();
    $date_now = date('Y-m-d h:i:s');

    foreach ($messages as $key => $message) {
      $update  = date_create($message->updated_at);
      $now = date_create($date_now);
      $diff  = date_diff($update, $now);
    }
    return view("home-message", compact('messages', 'diff'));
  }

  public function conversation($encrypted){
    $messages = Message::orderBy('created_at', 'desc')->get();
    $date_now = date('Y-m-d h:i:s');
    $id = Crypt::decryptString($encrypted);

    foreach ($messages as $key => $message) {
      $update  = date_create($message->updated_at);
      $now = date_create($date_now);
      $diff  = date_diff($update, $now);
    }

    $conversations = Conversation::orderBy('created_at', 'asc')
    ->where('message_id', $id)
    ->get();

    $check = Message::where('messages.id', $id)->first(); 
    $name_1 = Message::leftjoin('users', 'users.id', '=', 'messages.user_id')->where('messages.id', $id)->first(); 
    $name_2 = Message::leftjoin('users', 'users.id', '=', 'messages.user_other_id')->where('messages.id', $id)->first(); 
    $send_id = $id;
    return view("message-chat", compact('send_id', 'messages', 'diff', 'conversations', 'name_1', 'name_2', 'check'));
  }

  public function messageChatSent(Request $request){

    $messages = Message::orderBy('created_at', 'desc')->get();
    // $id_last = Message::pluck('id')->last();
    // $id_sum = $id_last + 1;
    // foreachnya error
    // jika kondisi data tidak kosong maka sebelum save pesan akan di cek dulu apakah percakapannya ada atau tidak, jika ada tidak akan membuat percakapan baru.
    if (!$messages->isEmpty()) {
      foreach ($messages as $key => $a) {
        if( ($a->user_id == Auth::user()->id && $a->user_other_id == Input::get('user_other_id')) || ($a->user_other_id == Auth::user()->id && $a->user_id == Input::get('user_other_id')) )
        {
          return Redirect::back()->withErrors(['Percakapan sudah ada !', 'The Message']);
        }else{
          // tak terjadi apa apa
        }
      }
     }
    //  else{
    //    $message = new Message;
    //    $message->user_id              = Auth::user()->id;
    //    $message->user_other_id        = Input::get('user_other_id');
    //    $message->save();
    //  }

    $message = new Message;
    $message->user_id              = Auth::user()->id;
    $message->user_other_id        = Input::get('user_other_id');
    $message->save();
    
    $message_id = Message::pluck('id')->last();
    
    $encrypted = Crypt::encryptString($message_id);
    // $decrypted = Crypt::decryptString($encrypted);
    $update_message = Message::where('id', $message_id)->first();
    $update_message->encrypted            = $encrypted;
    $update_message->save();

    $conversation = new Conversation;
    $conversation->message_id      = $message_id;
    $conversation->user_id         = Auth::user()->id;
    $conversation->is_read         = 0;
    $conversation->text            = Input::get('text');
    $conversation->save();

    // echo "<pre>";
    // print_r(Input::get('text'));
    // echo "</pre>";
    // exit();

    return Redirect::action('HomeController@messageChat', compact(''))->with('flash-store','Pesan berhasil dikirim.');
  }

  public function messageChatReply(Request $request, $id){
    $mytime = date('Y-m-d h:i:s');
    $message = Message::where('id', $id)->firstOrFail();
    $message->updated_at           = $mytime;   
    $message->save();

    $conversation = new Conversation;
    $conversation->message_id      = $id;
    $conversation->user_id         = Auth::user()->id;
    $conversation->is_read         = 0;
    $conversation->text            = Input::get('text');
    $conversation->save();

    // echo "<pre>";
    // print_r(Input::get('text'));
    // echo "</pre>";
    // exit();
    return Redirect::back()->withErrors(['Pesan berhasil dikirim', 'The Message']);
  }

  public function searchMessage(Request $request){
    $user = Auth::user();
    $search = $request->get('search');
    $message = Message::where('name','LIKE','%'.$search.'%')->get();
    
    if($message->user_id == Auth::user()->id){
      $messages = Message::leftJoin('users', 'users.id', '=', 'messages.user_id')
                          ->where('name','LIKE','%'.$search.'%')
                          ->get();
    }elseif($message->user_other_id == Auth::user()->id){
      $messages = Message::leftJoin('users', 'users.id', '=', 'messages.user_other_id')
                          ->where('name','LIKE','%'.$search.'%')
                          ->get();
    }
    $date_now = date('Y-m-d h:i:s');

    foreach ($messages as $key => $message) {
      $update  = date_create($message->updated_at);
      $now = date_create($date_now);
      $diff  = date_diff($update, $now);
    }
    return view('home-message', compact('messages', 'diff'),array('user' => $user));
  }

  public function destroyMessage($id)
  {
      $message = Message::where('id', $id)->firstOrFail();
      $message->delete();
      $conversations = Conversation::where('message_id', $message->id)->delete();

      $messages = Message::orderBy('created_at', 'desc')->get();
      $date_now = date('Y-m-d h:i:s');

      foreach ($messages as $key => $message) {
        $update  = date_create($message->updated_at);
        $now = date_create($date_now);
        $diff  = date_diff($update, $now);
      }
      return view("home-message", compact('messages', 'diff'));
  }

  public function filterNewsFeed(Request $request, $id_category_news_feed)
  {
    $search = $request->get('search');
    $newsfeeds = NewFeed::where('id_category_news_feed', $id_category_news_feed)->paginate(25);
    $category = CategoryNewsFeed::where('id_category_news_feed', $id_category_news_feed)->first();
    $sliders = Slider::orderBy('sliders.order', 'asc')->get();
    $newsfeed_categories = CategoryNewsFeed::orderBy('created_at', 'desc')->get();
    return view('news-feed-filter', compact('category', 'sliders', 'search', 'newsfeeds', 'newsfeed_categories'));
  }

  public function formInkubasi(Request $request)
  {
    $form = new InkubatorParticipant;
    $form ->user_id        	  = Input::get('user_id');
    $form ->pekerjaan        	= Input::get('pekerjaan');
    $form ->save();
    return Redirect::back()->withErrors(['Selamat !!! kamu berhasil mendaftar.', 'The Message']);
  }

  public function formChatInkubasi(Request $request)
  {
    $form = new ChatInkubasi;
    $form ->user_id        	  = Input::get('user_id');
    $form ->text        	    = Input::get('text');
    $form ->save();
    return Redirect::back()->withErrors(['Komentar berhasil diposting.', 'The Message']);
  }

  public function dataAjax(Request $request)
    {
    	$data = [];

        if($request->has('q')){
            $search = $request->q;
            $data = DB::table("users")
            		->select("id","name")
                ->where('name','LIKE',"%$search%")
                ->where('id', '!=', Auth::user()->id)
            		->get();
        }


        return response()->json($data);
    }
}
