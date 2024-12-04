<?php

namespace App\Livewire;

use App\Models\User;
use Livewire\Component;
use Illuminate\Support\Facades\Auth;

class ThemeComponent extends Component
{
    public $themeFromView;
    public $cambioTheme;

    public function mount()
    {
        $user = Auth::user();
        $this->cambioTheme = $user->theme;
        // dd($this->cambioTheme);
    }
    
    public function cambioEstado()
    {
        $this->cambioTheme = $this->themeFromView ? 'retro' : '';
        // dd($this->cambioTheme);

        $user = Auth::user();
        $tema = User::find($user->id);
        $tema->update([
            'theme' => $this->cambioTheme,
        ]);
    }

    public function render()
    {
        return view('livewire.theme-component', [
            'cambioTheme' => $this->cambioTheme,
        ]);
    }
}
