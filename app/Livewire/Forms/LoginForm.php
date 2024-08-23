<?php

namespace App\Livewire\Forms;

use Illuminate\Support\Facades\Hash;
use Illuminate\Auth\Events\Lockout;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\RateLimiter;
use Illuminate\Support\Str;
use Illuminate\Validation\ValidationException;
use Livewire\Attributes\Validate;
use Livewire\Form;
use \App\Models\User as UsuarioEnMongo;

class LoginForm extends Form
{
    #[Validate('required|string|email')]
    public string $email = '';

    #[Validate('required|string')]
    public string $password = '';

    #[Validate('boolean')]
    public bool $remember = false;

    /**
     * Attempt to authenticate the request's credentials.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function authenticate(): void
    {
        $this->ensureIsNotRateLimited();


        try {
            // Verificar si el email existe en la base de datos
            $user = UsuarioEnMongo::where('email', $this->email)->first();

            if (!$user) {
                // Si el email no existe, aumentar el contador de RateLimiter y lanzar una excepción
                RateLimiter::hit($this->throttleKey());

                throw ValidationException::withMessages([
                    'form.email' => trans('auth.failed'), // Mensaje de error si el email no existe
                ]);
            }

            // Si el usuario existe, verificar la contraseña
            if (!Hash::check($this->password, $user->password)) {
                // Si la contraseña es incorrecta, lanzar una excepción
                RateLimiter::hit($this->throttleKey());

                throw ValidationException::withMessages([
                    'form.password' => trans('auth.password'), // Mensaje de error si la contraseña es incorrecta
                ]);
            }

            // Si el email y la contraseña son correctos, iniciar sesión
            Auth::login($user, $this->remember);

            // Limpiar el RateLimiter para este usuario
            RateLimiter::clear($this->throttleKey());
        } catch (\Exception $e) {
            // Manejar cualquier otra excepción que ocurra durante el proceso
            throw ValidationException::withMessages([
                'form.email' => trans('auth.failed'), // Mensaje genérico de error
            ]);
        }
    }

    /**
     * Ensure the authentication request is not rate limited.
     */
    protected function ensureIsNotRateLimited(): void
    {
        if (! RateLimiter::tooManyAttempts($this->throttleKey(), 5)) {
            return;
        }

        event(new Lockout(request()));

        $seconds = RateLimiter::availableIn($this->throttleKey());

        throw ValidationException::withMessages([
            'form.email' => trans('auth.throttle', [
                'seconds' => $seconds,
                'minutes' => ceil($seconds / 60),
            ]),
        ]);
    }

    /**
     * Get the authentication rate limiting throttle key.
     */
    protected function throttleKey(): string
    {
        return Str::transliterate(Str::lower($this->email) . '|' . request()->ip());
    }
}
