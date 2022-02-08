
<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container-fluid">
        <a class="navbar-brand" href="{{route('dashboard')}}">Dashboard</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        Dinos
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <li><a class="dropdown-item" href="{{route('caracteristiques.index')}}">Caracteristiques</a></li>
                        <li><a class="dropdown-item" href="{{route('nourritures.index')}}">Nourritures</a></li>
                        <li><a class="dropdown-item" href="{{route('especes.index')}}">Especes</a></li>
                        <li><a class="dropdown-item" href="{{route('dinos.index')}}">Dinos</a></li>
                    </ul>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownEnclos" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        Enclos
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="navbarDropdownEnclos">
                        <li><a class="dropdown-item" href="{{route('typeEnclos.index')}}">Types Enclos</a></li>
                        <li><a class="dropdown-item" href="{{route('climats.index')}}">Climats</a></li>
                        <li><a class="dropdown-item" href="{{route('environnements.index')}}">Environnements</a></li>
                        <li><a class="dropdown-item" href="{{route('enclos.index')}}">Enclos</a></li>
                    </ul>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownProduits" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        Produits
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="navbarDropdownProduits">
                        <li><a class="dropdown-item" href="{{route('modesLivraisons.index')}}">Modes Livraisons</a></li>
                        <li><a class="dropdown-item" href="{{route('statutsCommandes.index')}}">Statuts Commandes</a></li>
                        <li><a class="dropdown-item" href="{{route('taxes.index')}}">Taxes</a></li>
                        <li><a class="dropdown-item" href="{{route('categories.index')}}">Categories</a></li>
                        <li><a class="dropdown-item" href="{{route('produits.index')}}">Produits</a></li>
                    </ul>
                </li>
            </ul>
        </div>
    </div>
</nav>
