<?php

namespace App\Livewire;

use App\Models\User;
use Livewire\Component;
use Illuminate\Support\Facades\Auth;

class ThemeComponent extends Component
{
    public $themeFromView;
    public $cambioTheme;


    public function mount(){
        $user = Auth::user();
        $agregarTheme = User::find($user->id);
        $theme = $agregarTheme->theme;
        $this->cambioTheme= $theme;
        // $this->dispatch('themeChanged', $this->cambioTheme);
    }
    
    public function cambioEstado()
    {
        $this->cambioTheme = $this->themeFromView ? 'retro' : 'dark';
        
        $user = Auth::user();
        $agregarTheme = User::find($user->id);
        
        if ($user->theme == null || !empty($user->theme)) {
            $agregarTheme->update([
                'theme' => $this->cambioTheme,
            ]);
        }
        // $this->dispatch('themeChanged', $this->cambioTheme);
    }

    public function render()
    {
        return view('livewire.theme-component', [
            'cambioTheme' => $this->cambioTheme,
        ]);
    }
}
