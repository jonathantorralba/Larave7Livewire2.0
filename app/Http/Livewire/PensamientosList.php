<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Post;

class PensamientosList extends Component
{
    public $post, $edit_mode, $body;

    protected $rules        = ['body' => 'required'];

    public function mount($post){

        $this->post         = $post;
        $this->edit_mode    = false;
        $this->body         ='';
    }

    public function edit(){

        $this->edit_mode = true;
        $this->body      = $this->post->body;
    }

    public function cancel(){

        $this->edit_mode = false;
    }

    public function update(){

        $this->validate();
        $this->post->body = $this->body;
        $this->post->save();

        $this->resetValues();
    }

    public function delete(){
        
        $this->post->delete();
        $this->emit('postDeleted');
    }

    public function resetValues(){

        $this->edit_mode    = false;
        $this->body         ='';
    }

    public function render(){
        return view('livewire.pensamientos-list');
    }
}
