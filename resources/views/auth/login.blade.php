<x-guest-layout>

    <h1 class="auth-heading">
        Welcome back.
    </h1>

    <p class="auth-subtitle">
        Log in to continue to Foundly.
    </p>

    <x-auth-session-status class="auth-message" :status="session('status')" />

    <form method="POST" action="{{ route('login') }}" class="auth-form">
        @csrf

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

        <div class="auth-field">
            <label for="password" class="auth-label">
                Password
            </label>

            <input id="password" class="auth-input" type="password" name="password" required
                autocomplete="current-password" placeholder="Your password">

            @if ($errors->has('password'))
                <div class="auth-error">
                    {{ $errors->first('password') }}
                </div>
            @endif
        </div>

        <div class="auth-options">

            <label for="remember_me" class="auth-checkbox">
                <input id="remember_me" type="checkbox" name="remember">

                <span>Remember me</span>
            </label>

            @if (Route::has('password.request'))
                <a href="{{ route('password.request') }}" class="auth-link">
                    Forgot password?
                </a>
            @endif

        </div>

        <button type="submit" class="auth-submit">
            Log in
        </button>

    </form>

    <div class="auth-footer">
        Don't have an account?
        <a href="{{ route('register') }}">
            Create one
        </a>
    </div>

</x-guest-layout>
