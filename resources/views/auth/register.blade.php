@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="d-flex justify-content-center align-items-center" style="min-height: 100vh">
            <div class="col-md-5">
                <div class="card p-3">
                    <div class="card-header bg-transparent text-center h4">Register your Account</div>

                    <div class="card-body">
                        <form method="POST" action="/register">
                            @csrf

                            <div class="form-group">
                                <label for="email">{{ __('E-Mail Address') }}</label>
                                <div class="input-group mb-3 mt-2">

                                    <span class="input-group-text" id="basic-addon1"><i class="fa fa2x fa-envelope-o"
                                            aria-hidden="true"></i></span>
                                    <input type="email" id="email" name="email" class="form-control @error('email') is-invalid @enderror"
                                        placeholder="email here..." aria-label="Email" aria-describedby="EmailInput">
                                    @error('email')
                                        <div class="invalid-feedback">
                                            <strong>{{ $message }}</strong>
                                        </div>
                                    @enderror
                                </div>


                            </div>
                            <div class="form-group">
                                <label for="account">{{ __('ML Account') }}</label>
                                <div class="input-group mb-3 mt-2">

                                    <span class="input-group-text" id="basic-addon1"><i class="fa fa2x fa-user-circle"
                                            aria-hidden="true"></i></span>
                                    <input type="text" id="account"
                                        class="form-control @error('account') is-invalid @enderror" name="account"
                                        placeholder="account here..." aria-label="Account" aria-describedby="AccountInput">
                                    @error('account')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>


                            </div>


                            <div class="d-grid gap-2 mt-4">
                                <button type="submit" class="btn btn-primary ">
                                    {{ __('Register') }}
                                </button>
                            </div>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
