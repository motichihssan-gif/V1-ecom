@extends('Master_page')

@section('title', 'S\'inscrire')

@section('content')
<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-6 col-lg-5">
            <div class="card shadow-lg" style="border-radius: 10px; border: none;">
                <div class="card-header bg-success text-white text-center" style="border-radius: 10px 10px 0 0;">
                    <h3 class="mb-0"><i class="fas fa-user-plus"></i> Créer un compte</h3>
                </div>
                
                <div class="card-body p-4">
                    @if ($errors->any())
                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                            <strong>Erreurs:</strong>
                            <ul class="mb-0 mt-2">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    @endif

                    <form method="POST" action="{{ route('register') }}" class="">
                        @csrf

                        <div class="mb-3">
                            <label for="name" class="form-label"><strong>Nom complet</strong></label>
                            <input 
                                type="text" 
                                class="form-control @error('name') is-invalid @enderror" 
                                id="name" 
                                name="name" 
                                value="{{ old('name') }}"
                                placeholder="Jean Dupont" 
                                required
                            >
                            @error('name')
                                <span class="invalid-feedback d-block">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="email" class="form-label"><strong>Email</strong></label>
                            <input 
                                type="email" 
                                class="form-control @error('email') is-invalid @enderror" 
                                id="email" 
                                name="email" 
                                value="{{ old('email') }}"
                                placeholder="votre@email.com" 
                                required
                            >
                            @error('email')
                                <span class="invalid-feedback d-block">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="password" class="form-label"><strong>Mot de passe</strong></label>
                            <input 
                                type="password" 
                                class="form-control @error('password') is-invalid @enderror" 
                                id="password" 
                                name="password" 
                                placeholder="Votre mot de passe" 
                                required
                            >
                            @error('password')
                                <span class="invalid-feedback d-block">{{ $message }}</span>
                            @enderror
                            <small class="form-text text-muted">Au moins 8 caractères</small>
                        </div>

                        <div class="mb-3">
                            <label for="password_confirmation" class="form-label"><strong>Confirmer le mot de passe</strong></label>
                            <input 
                                type="password" 
                                class="form-control @error('password_confirmation') is-invalid @enderror" 
                                id="password_confirmation" 
                                name="password_confirmation" 
                                placeholder="Confirmez votre mot de passe" 
                                required
                            >
                            @error('password_confirmation')
                                <span class="invalid-feedback d-block">{{ $message }}</span>
                            @enderror
                        </div>

                        <button type="submit" class="btn btn-success btn-lg w-100">
                            <i class="fas fa-user-plus"></i> S'inscrire
                        </button>
                    </form>

                    <hr class="my-4">

                    <div class="text-center">
                        <p class="mb-0">Déjà inscrit? <a href="{{ route('login') }}" class="btn-link">Se connecter ici</a></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
