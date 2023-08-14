<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreVideoRequest;
use App\Http\Requests\UpdateRequestController;
use App\Models\Category;
use App\Models\Video;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class VideoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        $this->middleware('checkVerifyEmail',['only'=>['create']]);
    }

    public function index()
    {

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
//        if(!Auth::check()){
//            return redirect()->route('login.create');
//        }

        $categories = Category::all();
        return view('videos.create',compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
//    public function store(Request $request)
//    {

//        Video::create([
//           'name'=>$request->name,
//           'url'=>$request->url,
//           'length'=>$request->length,
//           'slug'=>$request->slug,
//           'description'=>$request->description,
//           'thumbnail'=>$request->thumbnail,
//        ]);
//
//        $request->validate([
//            'name'=>['required'],
//            'length'=>['required','integer'],
//            'url'=>['required','url'],
//            'slug'=>['required','unique:videos'],
//            'thumbnail'=>['required','url'],
//            'description'=>['required']
//        ]);
//        Video::create($request->all());
//        return redirect()->route('home')->with('success','created successfully');
//    }
  public function store(StoreVideoRequest $request)
    {
       $request->user()->videos()->create($request->all());

        return redirect()->route('home')->with('success','created successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Video $video)
    {
//        $video = Video::find($id);
//        if($video === null){
//            abort(404);
//        }
//        dd($video->category());
        $video->load('comments.user');
        return view('videos.show',compact('video'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Video $video)
    {
        $categories = Category::all();

        return view('videos.edit',compact('video','categories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateRequestController $request, Video $video)
    {
       $video->update($request->all());
       return redirect()->route('videos.show',$video->slug)->with('success','updated successfylly');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
