@extends('layouts.app', ['title' => 'Register'])
@section('content')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/css/select2.min.css">
<script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk="
    crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/js/select2.min.js"></script>
<style>
    .success {
        outline: 2px solid green;
    }

    .error {
        outline: 2px solid red;
    }
</style>
<script>
    $(document).ready(function () {
        // Define regular expression
        var regex = /^\d*[.]?\d*$/;

        $("#contact").on("input", function () {
            // Get input value
            var inputVal = $(this).val();

            // Test input value against regular expression
            if (regex.test(inputVal)) {
                $(this).removeClass("error").addClass("success");
                document.getElementById('errorPhone').style.display = 'none';
            } else {
                $(this).removeClass("success").addClass("error");
                document.getElementById('errorPhone').style.display = '';
            }
        });
    });
</script>
<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Register') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('register') }}">
                        @csrf

                        <div class="row mb-3">
                            <label for="name" class="col-md-4 col-form-label text-md-end">{{ __('Name') }}</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror"
                                    name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="code" class="col-md-4 col-form-label text-md-end">{{ __('Country') }}</label>

                            <div class="col-md-6">
                                <select class="form-select" aria-label="Default select example" name='code' required
                                    id='coutry'>
                                    <option selected disabled>Select Country</option>
                                    @foreach ($countries as $country)
                                        <option value="{{$country['code']}}">{{$country['name']}}</option>
                                    @endforeach
                                </select>
                                @error('code')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <script>
                                $("#coutry").select2({
                                    placeholder: {
                                        id: '',
                                        text: 'Select a country'
                                    },
                                    minimumInputLength: 0,
                                    country: {
                                        noResults: function () {
                                            return "No result found";
                                        }
                                    },
                                });
                            </script>
                        </div>

                        <div class="row mb-3">
                            <label for="contact" class="col-md-4 col-form-label text-md-end">{{ __('Contact') }}</label>

                            <div class="col-md-6">
                                <input id="contact" type="text"
                                    class="form-control @error('contact') is-invalid @enderror" name="contact"
                                    value="{{ old('contact') }}" required autocomplete="contact" minlength="9"
                                    maxlength="13">
                                <small class="text-danger" id="errorPhone" style="display:none;">Only
                                    digits(0-9)
                                    are required</small>
                                @error('contact')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="email"
                                class="col-md-4 col-form-label text-md-end">{{ __('Email Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror"
                                    name="email" value="{{ old('email') }}" required autocomplete="email">

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="password"
                                class="col-md-4 col-form-label text-md-end">{{ __('Password') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password"
                                    class="form-control @error('password') is-invalid @enderror" name="password"
                                    required autocomplete="new-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="password-confirm"
                                class="col-md-4 col-form-label text-md-end">{{ __('Confirm Password') }}</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control"
                                    name="password_confirmation" required autocomplete="new-password">
                            </div>
                        </div>

                        <div class="row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Register') }}
                                </button>
                            </div>
                        </div>
                    </form>
                    <p class="text-center mt-3">Already has account? <a href="/login">Sign In</a></p>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection