<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Illuminate\Support\Str;
use App\Models\ShortLink as ShortLinkModel;

class ShortLink extends Component
{
    public $link_url;
    public $onCreate = false;

    public function mount(){
        $this->link_url = null;
    }

    public function render()
    {
        $shortLinks = ShortLinkModel::latest()->get();
        return view('livewire.short-link', compact('shortLinks'));
    }

    public function store(){
        $rules = [
            'link_url' => 'required|url'
        ];

        $validated = $this->validate($rules);
        if($validated){
            $input = [
                'link'  => $this->link_url,
                'code'  => $this->generateUniqueCode()
            ];
            
            ShortLinkModel::create($input);
            $this->resetInput();
        }
    }

    public function generateUniqueCode()
    {
        do {
            $code = Str::random(7);
        } while (ShortLinkModel::where("code", "=", $code)->first());
  
        return $code;
    }

    private function resetInput()
    {
        $this->link_url = null;
    }

    public function viewLink($code)
    {
        $find = ShortLinkModel::where('code', $code)->first();
   
        return redirect($find->link);
    }
}
