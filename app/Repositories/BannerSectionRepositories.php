<?php
namespace App\Repositories;
use App\Models\BannerSection;
use App\Traits\Uploadable;
use Illuminate\Support\Str;
use App\Repositories\Interface\BannerSectionInterface;

class BannerSectionRepositories implements BannerSectionInterface
{
    use Uploadable;
    public function all(){
        return BannerSection::Orderby('id','asc')->get();
    }
    public function store(array $data){
        $bannerSection= new BannerSection();
        $filename = "";
        if (array_key_exists('image', $data)){
            $filename = $this->uploadOne($data['image'], 830, 500, 'backend/images/bannerSection/', true);
        }
        $bannerSection->title=$data['title'];
        $bannerSection->image=$filename;
        $bannerSection->sub_title=$data['sub_title'];
        $bannerSection->youtube_link=$data['youtube_link'];
        $bannerSection->description=$data['description'];
        $bannerSection->save();
    }
    public function get($id){
        return BannerSection::find($id);
    }
    public function first(){
        return BannerSection::latest()->first();
    }
    public function update(array $data,$id){
        $bannerSection=BannerSection::find($id);
        $filename = "";
        if (array_key_exists('image', $data)){
            $this->deleteOne($bannerSection->image);
            $filename = $this->uploadOne($data['image'], 830, 500, 'backend/images/bannerSection/', true);
        }else{
            $filename=$bannerSection->image;
        }
        $bannerSection->title=$data['title'];
        $bannerSection->image=$filename;
        $bannerSection->sub_title=$data['sub_title'];
        $bannerSection->youtube_link=$data['youtube_link'];
        $bannerSection->description=$data['description'];
        $bannerSection->save();
    }
    public function delete($id){
        $bannerSection=BannerSection::find($id);
        $this->deleteOne($bannerSection->image);
        if(!empty($bannerSection)){
            $bannerSection->delete();
        }
    }
}
