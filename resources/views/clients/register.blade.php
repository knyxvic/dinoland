@extends('layouts.marketplace')

@section('content')

    <section class="vh-90 ">
        <div class="mask d-flex align-items-center h-100 gradient-custom-3">
            <div class="container h-100">
                <div class="row d-flex justify-content-center align-items-center h-100">
                    <div class="col-12 col-md-9 col-lg-7 col-xl-6">
                        <div class="card" style="border-radius: 15px;">
                            <div class="card-body p-2">
                                <h2 class="text-uppercase text-center mb-5">Create an account</h2>

                                <form method="POST" action="{{ route('client.register') }}">
                                    @csrf
                                    @if(Session::has('error'))
                                        <div class="alert alert-warning">
                                            <strong>{{session::get('error')}}</strong>
                                        </div>
                                    @endif
                                    <div class="form-outline mb-2">
                                        <label class="form-label" for="form3Example1cg">Nom</label>
                                        <input type="text" name="nom" id="form3Example1cg" class="form-control form-control-lg" required />
                                    </div>
                                    <div class="form-outline mb-2">
                                        <label class="form-label" for="form3Example1cg">Prénom</label>
                                        <input type="text" name="prenom" id="form3Example1cg" class="form-control form-control-lg"  required/>
                                    </div>

                                    <div class="form-outline mb-2">
                                        <label class="form-label" for="form3Example3cg">Email</label>
                                        <input type="email" name="email" id="form3Example3cg" class="form-control form-control-lg" required />
                                    </div>
                                    <div class="form-outline mb-2">
                                        <label class="form-label" for="tel">Téléphone</label>
                                        <input type="text" name="tel" id="tel" class="form-control form-control-lg" required />
                                    </div>

                                    <div class="form-outline mb-2">
                                        <label class="form-label" for="form3Example4cg">Password</label>
                                        <input type="password" name="password" id="form3Example4cg" class="form-control form-control-lg"  required/>
                                    </div>

                                    <div class="form-outline mb-2">
                                        <label class="form-label" for="form3Example4cdg">Repeat your password</label>
                                        <input type="password" name="password_confirmation" id="form3Example4cdg" class="form-control form-control-lg" required />
                                    </div>


                                    <div class="d-flex justify-content-center">
                                        <button type="submit" class="btn btn-success btn-block btn-lg gradient-custom-4 text-body">Register</button>
                                    </div>


                                </form>
                                <p class="text-center text-muted mt-5 mb-0">Have already an account? <a href="{{route('client_login_from')}}" class="fw-bold text-body"><u>Login here</u></a></p>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    @stop
