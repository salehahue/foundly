<x-guest-layout>

    <h1 class="auth-heading">
        Join Foundly.
    </h1>

    <p class="auth-subtitle">
        Create an account to report and find lost items.
    </p>

    <form method="POST" action="{{ route('register') }}" class="auth-form">
        @csrf

        <div class="auth-field">
            <label for="name" class="auth-label">
                Name
            </label>

            <input id="name" class="auth-input" type="text" name="name" value="{{ old('name') }}" required
                autofocus autocomplete="name" placeholder="Your name">

            @if ($errors->has('name'))
                <div class="auth-error">
                    {{ $errors->first('name') }}
                </div>
            @endif
        </div>

        <div class="auth-field">
            <label for="email" class="auth-label">
                Email
            </label>

            <input id="email" class="auth-input" type="email" name="email" value="{{ old('email') }}" required
                autocomplete="username" placeholder="you@example.com">

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
                autocomplete="new-password" placeholder="Create a password">

            @if ($errors->has('password'))
                <div class="auth-error">
                    {{ $errors->first('password') }}
                </div>
            @endif
        </div>

        <div class="auth-field">
            <label for="password_confirmation" class="auth-label">
                Confirm password
            </label>

            <input id="password_confirmation" class="auth-input" type="password" name="password_confirmation" required
                autocomplete="new-password" placeholder="Repeat your password">

            @if ($errors->has('password_confirmation'))
                <div class="auth-error">
                    {{ $errors->first('password_confirmation') }}
                </div>
            @endif
        </div>

        <button type="submit" class="auth-submit">
            Create account
        </button>

    </form>

    <div class="auth-footer">
        Already have an account?
        <a href="{{ route('login') }}">
            Log in
        </a>
    </div>

</x-guest-layout>
