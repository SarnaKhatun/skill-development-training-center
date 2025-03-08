<?php
namespace App\Repositories;
use App\Models\Board;
use App\Repositories\Interface\BoardInterface;

class BoardRepositories implements BoardInterface
{
    public function all(){
        return Board::Orderby('id','desc')->get();
    }
    public function store(array $data){
        $board= new Board();
        $board->name=$data['name'];
        $board->save();
    }
    public function get($id){
        return Board::find($id);
    }
    public function update(array $data,$id){
        $board=Board::find($id);
        $board->name=$data['name'];
        $board->save();
    }
    public function delete($id){
        $board=Board::find($id);
        if(!empty($board)){
            $board->delete();
        }
    }
}
