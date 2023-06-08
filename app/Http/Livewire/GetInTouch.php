<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\User;
use App\Models\NewsLetter;


class GetInTouch extends Component
{
    public $form=[];

    public function mount()
    {
        $this->form = ['type'=>'homeowner'];
    }

    public function save()
    {
        $this->validate([
            'form.name' => 'required',
            'form.email' => 'required|email:rfc,dns',
            'form.phone' => 'required|digits:10',
            // 'form.news_letter' => 'required',
            'form.type' => 'required',
        ],[],[
            'form.name' => 'Name',
            'form.email' => 'Email',
            'form.phone' => 'Phone',
            'form.news_letter' => 'News letter'
        ]);

        NewsLetter::create($this->form);
        $this->form = ['type'=>'homeowner'];
        //send email
        session()->flash('message', 'Thank you for contacting us!');
    }

    public function render()
    {
        return view('livewire.get-in-touch');
    }
}
