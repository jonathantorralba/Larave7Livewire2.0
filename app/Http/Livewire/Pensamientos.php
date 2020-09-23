<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use App\Post;

class Pensamientos extends Component
{
    use WithPagination;

    public $body, $foo;

    protected $listeners    = ['postDeleted' => '$refresh'];
    protected $rules        = ['body' => 'required|min:3|max:254'];

    public function mount(){

        $this->body     = '';
        $this->foo      = '';        
    }

    // VALIDACION A TIEMPO REAL
    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }

    public function submit(){

        $this->validate();
        //$this->addError('body', 'The email field is invalid.');

        Post::create([
            'title' => $this->body,
            'body'  => $this->body
        ]);

        session()->flash('message', 'Post successfully updated.');
        $this->resetValues();
    }

    public function resetValues(){
        $this->body     = '';
    }

    /*public function updating($name, $value)
    {
        //
    }

    public function updatingFoo($value)
    {
        //
    }

    public function updatedFoo($value)
    {
        //
    }

    public function test(){
        for ($i = 0; $i <= 1; $i++) {
            $this->foo .= 'Nena ';
        }
    }*/

    public function render(){

        return view('livewire.pensamientos', [
            'posts' => Post::orderBy('id', 'desc')->paginate(4)
        ]);
    }
}
