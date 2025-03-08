<?php

namespace App\Http\Controllers\Admin;

use Exception;
use Illuminate\Http\Request;
use App\Models\BannerSection;
use App\Http\Controllers\Controller;
use App\Http\Requests\BannerSectionRequest;
use App\Repositories\Interface\BannerSectionInterface;

class BannerSectionController extends Controller
{
    protected $bannerSection;
    public function __construct(BannerSectionInterface $bannerSection){
        $this->bannerSection=$bannerSection;
    }
    public function index(){
        $data=[];
        $data['bannerSection']=$this->bannerSection->first();
        return view('admin.bannerSection.index',$data);
    }

    public function create()
    {
        return view('admin.bannerSection.create');
    }

    public function store(BannerSectionRequest $request){
        try{
            //dd($request);
            $this->bannerSection->store($request->all());
            return redirect()->route('admin.bannerSection.index')->with('success','bannerSection Created Successfully');
        }catch(Exception $e){
            return back()->with('error','Something went to Wrong');
        }
    }

    public function edit($id){
        try{
            $data=[];
            $data['bannerSection']=$this->bannerSection->get($id);
            return view('admin.bannerSection.create',$data);
        }catch(Exception $e){
            return back()->with('error','Sorry Something went to Wrong');
        }
    }

    public function update(Request  $request,$id){
        $request->validate([
            'title'=>'required|max:15',
            'sub_title'=>'required|max:60',
            'description'=>'required|max:490',
            'image'=>'nullable|image|mimes:png,jpg',
        ]);
        try{
            $this->bannerSection->update($request->all(),$id);
            return redirect()->route('admin.bannerSection.index')->with('success','bannerSection  Update Successfully');
        }catch(Exception $e){
            return back()->with('error','Sorry Something Went to Wrong');
        }
    }

    public function show($id)
    {


    }
    public function delete($id)
    {
        try {
            $this->bannerSection->delete($id);
            return redirect()->back()->with('success','bannerSection Deleted Successfully');
        }catch (Exception $e){
            return redirect()->back()->with('error','Sorry Something Went to Wrong');
        }

    }
}

