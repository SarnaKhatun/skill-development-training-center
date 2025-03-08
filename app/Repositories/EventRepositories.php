<?php
namespace App\Repositories;
use App\Models\Event;
use App\Traits\Uploadable;
use Illuminate\Support\Str;
use App\Repositories\Interface\EventInterface;

class EventRepositories implements EventInterface
{
    use Uploadable;
    public function all(){
        return Event::Orderby('id','asc')->get();
    }
    public function store(array $data){
        $event= new Event();
        $filename = "";
        if (array_key_exists('image', $data)){
            $filename = $this->uploadOne($data['image'], 830, 500, 'backend/images/event/', true);
        }
        $event->title=$data['title'];
        $event->slug=Str::slug($data['title']);
        $event->image=$filename;
        $event->date=$data['date'];
        $event->time=$data['time'];
        $event->location=$data['location'];
        $event->short_description=$data['short_description'];
        $event->description=$data['description'];
        $event->save();
    }
    public function get($id){
        return Event::find($id);
    }
    public function update(array $data,$id){
        $event=Event::find($id);
        $filename = "";
        if (array_key_exists('image', $data)){
            $this->deleteOne($event->image);
            $filename = $this->uploadOne($data['image'], 830, 500, 'backend/images/event/', true);
        }else{
            $filename=$event->image;
        }
        $event->title=$data['title'];
        $event->slug=Str::slug($data['title']);
        $event->image=$filename;
        $event->date=$data['date'];
        $event->time=$data['time'];
        $event->location=$data['location'];
        $event->short_description=$data['short_description'];
        $event->description=$data['description'];
        $event->save();
    }
    public function delete($id){
        $event=Event::find($id);
        $this->deleteOne($event->image);
        if(!empty($event)){
            $event->delete();
        }
    }
}
