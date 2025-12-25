<?php

namespace App\Livewire;

use App\Models\User;
use Livewire\Component;
use Livewire\Attributes\Validate;
use Illuminate\Support\Facades\Hash;
use Livewire\WithFileUploads;
use Livewire\WithPagination;

class Users extends Component
{
    use WithFileUploads, WithPagination;

    #[Validate('required|string|min:3')]
    public $name = "";
    #[Validate('required|string|email:dns')]
    public $email = "";
    #[Validate('required|string|min:5')]
    public $password = "";
    #[Validate('image|max:9048')]
    public $avatar;
    // public $validated = [];
    public function createUser()
    {
        $validated = $this->validate();
        if ($this->avatar) {
            $validated['avatar']->store('avatar', 'public');
        }

        User::create(
            [
                'name' => $this->name,
                'email' => $this->email,
                'password' => Hash::make($this->password),
                'avatar' => $validated['avatar']->temporaryUrl() ?? "https://img.freepik.com/premium-vector/business-man-avatar-profile_1133257-2431.jpg?semt=ais_hybrid&w=740&q=80",
            ]
        );
        $this->reset();
        session()->flash('status', 'Post successfully updated.');
    }

    public function render()
    {
        return view('livewire.users', [
            'users' => User::latest()->paginate(10),
        ]);
    }
}
