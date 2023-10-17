<?php

namespace App\Livewire\User;

use Livewire\Component;
use App\Models\Document;

class Dashboard extends Component
{
    public $totalDocument;
    public $data;

    public function render()
    {
        $this->totalDocument = Document::count();




        return view('livewire.user.dashboard')->layout('layouts.user-app');
    }

    public function show(){
        $data=Document::all();
        return view('livewire.user.show', compact('data'));
    }
}
