<x-guest-layout>

    <h1 class="auth-heading">
        Forgot your password?
    </h1>

    <p class="auth-subtitle">
        No problem. Just let us know your email address and we will email you a password reset link that will allow you
        to choose a new one.
    </p>

    <!-- Session Status -->
    <x-auth-session-status class="auth-message" :status="session('status')" />

    <form method="POST" action="{{ route('password.email') }}">
        @csrf

        <!-- Email Address -->
        <div class="auth-field">
            <label for="email" class="auth-label">
                Email
            </label>

            <input id="email" class="auth-input" type="email" name="email" value="{{ old('email') }}" required
                autofocus autocomplete="username" placeholder="you@example.com">

            @if ($errors->has('email'))
                <div class="auth-error">
                    {{ $errors->first('email') }}
                </div>
            @endif
        </div>

        <button type="submit" class="auth-submit">
            Email Password Reset Link
        </button>

    </form>
</x-guest-layout>
