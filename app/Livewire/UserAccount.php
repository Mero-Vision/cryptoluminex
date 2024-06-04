<?php

namespace App\Livewire;

use App\Models\ClientBalance;
use App\Models\CryptoCurrency;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Illuminate\Support\Str;
use Illuminate\Validation\Rule;
use Livewire\Attributes\Validate;

class UserAccount extends Component
{
    #[Validate('required')]
    public $name;

    #[Validate]
    public $email;

    #[Validate]
    public $mobile_no;

    #[Validate('required|min:4')]
    public $password;

    public function rules()
    {
        return [
            'email' => [
                'required',
                Rule::unique('users', 'email'),
            ],
            'mobile_no' => ['required', Rule::unique('users', 'mobile_no')]

        ];
    }

    protected $messages = [
        'email.unique' => 'The email has already been taken.',
    ];

    public function save()
    {

        $validated = $this->validate();

        $client = User::create($validated + ['status' => 'client']);
        $currency = CryptoCurrency::get();
        foreach ($currency as $data) {
            ClientBalance::create([
                'client_id' => $client->id,
                'balance' => 0,
                'dollar_balance' => 0,
                'currency_id' => $data->id,
                'wallet_address' => 'coinluminex' . Str::random(26),

            ]);
        }
        Auth::login($client);

        sweetalert()->addSuccess('Your account has been created successfully! Please login!');
        return $this->redirect('/');
    }
    public function render()
    {
        return view('livewire.user-account');
    }
}