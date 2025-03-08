<?php

namespace App\Repositories;
use App\Models\Admin;
use App\Models\Gallery;
use \App\Repositories\Interface\GalleryInterface;
use App\Traits\Uploadable;
use Illuminate\Support\Facades\Hash;

class GalleryRepositories implements GalleryInterface
{
    use Uploadable;
    public function all(){
        return Gallery::orderBy('id','desc')->paginate(12);
    }

    public function store(array $data){
        $filename = "";
        if (array_key_exists('filename', $data)){
            $filename = $this->uploadOne($data['filename'], 1050, 790, 'backend/images/galley/', true,true);
        }
        $gallay_image = new Gallery();
        $gallay_image->filename = $data['filename']->getClientOriginalName();
        $gallay_image->path_name = $filename;
        $gallay_image->file_size = number_format(filesize($filename) / 1024);
        $gallay_image->save();
    }

    public function get($id){

    }

    public function update(array $data,$id){

    }

    public function delete($id){
        $gallery =  Gallery::find($id);

        if(!empty($gallery)){
            $this->deleteOne($gallery->path_name);
            $gallery->delete();
        }
    }
}
