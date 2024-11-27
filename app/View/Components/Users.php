<?php

namespace App\View\Components;

use App\Models\User;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Users extends Component
{
    public $users;
    public $me;
    /**
     * Create a new component instance.
     */
    public function __construct()
    {
        $this->me = auth()->user();
        $this->users = User::query()->whereNot('id', auth()->id())->get();
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.users');
    }
}
