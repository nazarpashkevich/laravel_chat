<?php

namespace App\DTOs;

use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Spatie\LaravelData\Support\Validation\ValidationContext;

class UserData extends \Spatie\LaravelData\Data
{

    public function __construct(
        public ?int $id = null,
        public string $email,
        public string $name,
        public ?string $password = null,
        public ?string $picture = null,
        public ?string $onlineAt = null,
    )
    {}

    // register or update requests
    public static function rules(ValidationContext $context): array
    {
        return [
            'email' => ['email', 'required', 'unique:users'],
            'password' => ['string'],
            'name' => ['string', 'required'],
            'picture' => ['string'],
        ];
    }

    public function registerData(): array
    {
        $data = parent::toArray();
        if (empty($data['password'])) {
            $data['password'] = Str::random(8);
        }
        $data['password'] = Hash::make($data['password']);

        return $data;
    }
}
