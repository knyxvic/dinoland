@extends('layouts/marketplace')

@section('content')

    <!-- Start Breadcrumbs -->
   <!-- <div class="breadcrumbs">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6 col-md-6 col-12">
                    <div class="breadcrumbs-content">
                        <h1 class="page-title">Single Product</h1>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6 col-12">
                    <ul class="breadcrumb-nav">
                        <li><a href="index.html"><i class="lni lni-home"></i> Home</a></li>
                        <li><a href="index.html">Shop</a></li>
                        <li>Single Product</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>-->
    <!-- End Breadcrumbs -->

    <!-- Start Item Details -->
    <section class="item-details section">
        <div class="container">
            <div class="top-area">
                <div class="row align-items-center">
                    <div class="col-lg-6 col-md-12 col-12">
                        <div class="product-images">
                            <main id="gallery">
                                <div class="main-img">
                                    <img src="{{ asset('/images/product-details/01.jpg')}}" id="current" alt="#">
                                </div>
                                <div class="images">
                                    <img src="{{ asset('/images/product-details/01.jpg')}}" class="img" alt="#">
                                    <img src="{{ asset('/images/product-details/02.jpg')}}" class="img" alt="#">
                                    <img src="{{ asset('/images/product-details/03.jpg')}}" class="img" alt="#">
                                    <img src="{{ asset('/images/product-details/04.jpg')}}" class="img" alt="#">
                                    <img src="{{ asset('/images/product-details/05.jpg')}}" class="img" alt="#">
                                </div>
                            </main>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-12 col-12">
                        <div class="product-info">
                            <h2 class="title">{{Str::ucfirst($produit->nom)}}</h2>
                            <p class="category"><a href="{{route('categories',['id'=>$produit->category->id])}}">{{Str::ucfirst($produit->category->nom)}}</a></p>
                            <h3 class="price">{{$produit->prix}} €</h3>
                            <div class="bottom-content">
                                <div class="row align-items-end">
                                    <div class="col-lg-4 col-md-4 col-12">
                                        <div class="button cart-button">
                                            @if($produit->quantite > 0)
                                            <button class="btn" style="width: 100%;">Add to Cart</button>
                                            @else
                                                Rupture de stock
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </section>
    <!-- End Item Details -->



@stop
