<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Laravel</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

    <!-- Fonts -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css"
        integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <style>
        .scrollable-container {
            position: relative;
            display: flex;
            align-items: center;
            margin-top: 20px;
        }

        .cards-row {
            display: flex;
            overflow: auto;
            scroll-behavior: smooth;
            width: 80vw;
            padding: 10px;
            overflow-x: scroll;
            scrollbar-width: none;
        }

        .card {
            flex: 0 0 122px;
            height: 122px;
            background: #FFFFFF;
            border-radius: 8px;
            margin: 0 10px;
            display: flex;
            align-items: center;
            justify-content: center;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            border: none;
        }

        .card {
            background: #FFFFFF;
            border-radius: 8px;
            margin: 0 10px;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            padding: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            transition: border-color 0.3s, color 0.3s;
            /* Smooth transition */
            border: 2px solid transparent;
            /* Initial border */
        }

        .category-link {
            text-decoration: none;
            border: 1px solid white;
            /* Remove underline */
            color: inherit;
            /* Inherit text color */
            text-align: center;
            /* Center text */
        }

        .card:hover {
            border: 1px solid #F52968;
            /* Change border color on hover */
            color: #F52968;
            /* Change text color on hover */
        }

        .category-image {
            width: 50px;
            height: 50px;
            /* Set height to keep image dimensions consistent */
            margin-bottom: 5px;
            /* Space between image and text */
        }

        .category-name {
            font-size: 14px;
            /* Adjust font size */
            font-weight: 600;
            /* Bold text */
            color: #000;
            /* Default text color */
        }


        .scroll-btn-left,
        .scroll-btn-right {
            background: #fff;
            border: none;
            cursor: pointer;
            font-size: 24px;
            padding: 10px;
            border-radius: 50%;
        }
    </style>

    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />

    <style>
        .border-on-hover {
            border: 1px solid transparent;
        }

        .border-on-hover:hover {
            border-color: #E1406A;
            border: 1px solid #E1406A;
        }
    </style>

</head>

<body class="font-sans antialiased ">

    {{-- Header  --}}
    <nav class="navbar navbar-expand-lg bg-body-tertiary">
        <div class="container">
            <!-- Left Side: Navbar Brand and Shopping In -->
            <a class="navbar-brand" href="#">Navbar</a>

            <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link" href="#">Shopping In</a>
                    </li>
                    <li>
                        <select class="form-select form-select-sm ms-2">
                            <option value="60065">60065</option>
                            <option value="60066">60066</option>
                            <option value="60067">60067</option>
                            <option value="60068">60068</option>
                            <option value="60069">60069</option>
                        </select>
                    </li>
                </ul>

                <!-- Center: Search Bar with Icon Inside Input -->
                <form class="d-flex flex-grow-1 mx-3" role="search" method="GET" action="{{ route('search') }}">
                    <div class="input-group">
                        <span class="input-group-text">
                            <i class="fa-solid fa-magnifying-glass"></i>
                        </span>
                        <input class="form-control" type="search" placeholder="Search for the product..."
                            aria-label="Search" name="query" />
                    </div>
                </form>

                <!-- Right Side: Auth and Cart Buttons -->
                <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                    @auth
                        <li class="nav-item">
                            <a href="{{ route('dashboard') }}" class="nav-link">
                                Dashboard
                            </a>
                        </li>
                    @else
                        <li class="nav-item">
                            <a href="{{ route('login') }}" class="nav-link">
                                <i class="bi bi-person"></i> Login
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('register') }}" class="nav-link">
                                Register
                            </a>
                        </li>
                    @endauth
                    <li class="nav-item">
                        <a class="btn" href="/cart" style="position: relative;">
                            <i class="bi bi-cart-fill"></i> Cart (2)
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>


    {{-- content area  --}}


    {{-- category slider  --}}
    <div class="container-fluid" style='background-color: #FDEDF0'>
        <div class="container-fluid p-3">
            <div class='container'>
                <div class='d-flex justify-between'>
                    <div class='col-6'>
                        <h4>Our Online Services</h4>
                    </div>
                    <form class="d-flex flex-grow-1 mx-3" role="search" method="GET" action="{{ route('search') }}">
                        <div class="input-group">
                            <input class="form-control" type="search" id="search-input"
                                placeholder="Search for the Pooja..." aria-label="Search" name="query" />
                            <span class="input-group-text">
                                <i class="fa-solid fa-magnifying-glass"></i>
                            </span>
                        </div>
                    </form>

                </div>
                <div class='d-flex'>
                    <div class="container text-center">
                        <div
                            class="row row-cols-2 row-cols-sm-3 row-cols-md-3 row-cols-lg-6 row-cols-xl-8 g-2 g-lg-3 gx-3">
                            <div class="col bg-white border-on-hover m-3  rounded p-1">
                                <div class="p-px d-flex justify-between align-items-center">
                                    <div class="">
                                        <img src="images/cat1.png" class="img-fluid rounded-start" alt="..." />
                                    </div>
                                    <div class="card-body d-flex align-items-center">

                                        <h5 class="card-title  mr-0 ml-auto">Online Puja</h5>

                                    </div>
                                </div>
                            </div>
                            <div class="col bg-white border-on-hover m-3 rounded p-1">
                                <div class="p-px d-flex justify-between align-items-center">
                                    <div class="">
                                        <img src="images/cat1.png" class="img-fluid rounded-start" alt="..." />
                                    </div>
                                    <div class="card-body d-flex align-items-center">
                                        <h5 class="card-title  mr-0 ml-auto">Astrology</h5>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="container">
            <div class="row row-cols-2 ">
                <div class="col">
                    <h4>Explore Pujas By Category</h4>
                </div>
                <div class="col text-end">
                    <button class="button border-0"> view all <i class="fa-solid fa-chevron-down"></i></button>
                </div>
            </div>

        </div>

        <div class="container scrollable-container">
            <section id="category-section">
                <!-- Cards will be injected here by AJAX -->
            </section>

            <button onclick="scrollRight()" class="scroll-btn-right">
                <i class="fa-solid fa-chevron-right"></i>
            </button>
        </div>
    </div>

    {{-- product list  --}}
    <div class="shop container-fluid" style="margin-top: 20px;">
        <div class="container">
            <div class="products row row-cols-2 row-cols-sm-3 row-cols-md-3 row-cols-lg-4 row-cols-xl-5"
                id="products-container">
                <!-- Products will be injected here by AJAX -->
            </div>
            <button id="load-more" style="display: none;">Load More</button>
        </div>
    </div>

    <script>
        // Global variables
        let currentPage = 1;
        const perPage = 10; // Number of products per page

        function scrollRight() {
            const scrollContainer = document.getElementById('scrollContainer');
            scrollContainer.scrollLeft += 200;
        }

        $(document).ready(function() {
            $.ajax({
                url: '/categories',
                type: 'GET',
                success: function(data) {
                    const categorySection = $('#category-section');
                    categorySection.empty(); // Clear any existing content

                    categorySection.append(`
                        <div id="scrollContainer" class="cards-row"></div>
                    `);

                    data.forEach(function(category) {
                        $('#scrollContainer').append(`
                            <div class="card">
                                <a href="#" data-category-slug="${category.slug}" class="category-link">
                                    <div class="row">
                                        <div class="col-12 d-flex align-center justify-content-center">
                                            <img src="${category.image_path}" alt="${category.name}" class="category-image">
                                        </div>
                                        <div class="col-12 category-name">
                                            ${category.name}
                                        </div>
                                    </div>
                                </a>
                            </div>
                        `);
                    });
                },
                error: function(xhr, status, error) {
                    console.error("Error fetching categories: ", error);
                }
            });
            fetchProducts(currentPage);


            $('#search-input').on('input', function() {
                const query = $(this).val();
                currentPage = 1; // Reset to the first page
                $('#products-container').empty(); // Clear existing products

                if (query.length > 0) {
                    searchProducts(query, currentPage); // Call search function
                } else {
                    fetchProducts(currentPage); // Fetch all products if search is cleared
                }
            });
        });


        function searchProducts(query, page) {
            $.ajax({
                url: '/products/search', // Update with your search route
                type: 'GET',
                data: {
                    query: query,
                    page: page,
                    per_page: perPage
                },
                success: function(data) {
                    const productsContainer = $('#products-container');

                    data.data.forEach(function(product) {
                        productsContainer.append(`
                    <div class="product col p-2">
                        <x-product-card 
                            title="${product.name}" 
                            imageSrc="${product.image_path}" 
                            priceRange="${product.price}" 
                            buttonText="Book Now" />
                    </div>
                `);
                    });

                    // Show "Load More" button if there are more products
                    if (data.next_page_url) {
                        $('#load-more').show().off('click').on('click', function() {
                            currentPage++;
                            searchProducts(query, currentPage);
                        });
                    } else {
                        $('#load-more').hide();
                    }
                },
                error: function(xhr, status, error) {
                    console.error("Error searching products: ", error);
                }
            });
        }


        function fetchProducts(page) {
            $.ajax({
                url: '/products',
                type: 'GET',
                data: {
                    page: page,
                    per_page: perPage
                },
                success: function(data) {
                    const productsContainer = $('#products-container');

                    data.data.forEach(function(product) {
                        productsContainer.append(`
                            <div class="product col p-2">
                                <x-product-card 
                                    title="${product.name}" 
                                    imageSrc="${product.image_path}" 
                                    priceRange="${product.price}" 
                                    buttonText="Book Now" />
                            </div>
                        `);
                    });

                    // Show "Load More" button if there are more products
                    if (data.next_page_url) {
                        $('#load-more').show().off('click').on('click', function() {
                            currentPage++;
                            fetchProducts(currentPage);
                        });
                    } else {
                        $('#load-more').hide();
                    }
                },
                error: function(xhr, status, error) {
                    console.error("Error fetching products: ", error);
                }
            });
        }

        $(document).on('click', '.category-link', function(e) {
            e.preventDefault();

            const categorySlug = $(this).data('category-slug');
            currentPage = 1; // Reset to the first page
            $('#products-container').empty(); // Clear existing products

            // Fetch products for the selected category using the slug
            fetchProductsByCategorySlug(categorySlug, currentPage);
        });

        function fetchProductsByCategorySlug(categorySlug, page) {
            $.ajax({
                url: `/products/category/${categorySlug}`, // Adjust the URL to accept slug
                type: 'GET',
                data: {
                    page: page,
                    per_page: perPage // Use the global perPage variable
                },
                success: function(data) {
                    const productsContainer = $('#products-container');

                    data.data.forEach(function(product) {
                        productsContainer.append(`
                            <div class="product col p-2">
                                <x-product-card 
                                    title="${product.name}" 
                                    imageSrc="${product.image_path}" 
                                    priceRange="${product.price}" 
                                    buttonText="book Now" />
                            </div>
                        `);
                    });

                    // Show "Load More" button if there are more products
                    if (data.next_page_url) {
                        $('#load-more').show().off('click').on('click', function() {
                            currentPage++;
                            fetchProductsByCategorySlug(categorySlug, currentPage);
                        });
                    } else {
                        $('#load-more').hide();
                    }
                },
                error: function(xhr, status, error) {
                    console.error("Error fetching products: ", error);
                }
            });
        }
    </script>







    {{-- footer   --}}
    <div style=' background-color: #343a46'>
        <div class="container">
            <footer class="py-5 text-white">
                <div class="row">
                    <div class="col-1">
                    </div>
                    <div class="col-2">
                        <h5>Section</h5>
                        <ul class="nav flex-column">
                            <li class="nav-item mb-2"><a href="#" class="nav-link text-white p-0 ">Home</a>
                            </li>
                            <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-white">Features</a>
                            </li>
                            <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-white">Pricing</a>
                            </li>
                            <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-white">FAQs</a></li>
                            <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-white">About</a>
                            </li>
                        </ul>
                    </div>
                    <div class="col-2">
                        <h5>Section</h5>
                        <ul class="nav flex-column">
                            <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-white">Home</a></li>
                            <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-white">Features</a>
                            </li>
                            <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-white">Pricing</a>
                            </li>
                            <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-white">FAQs</a></li>
                            <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-white">About</a>
                            </li>
                        </ul>
                    </div>
                    <div class="col-3">
                        <h5>Section</h5>
                        <ul class="nav flex-column">
                            <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-white">Home</a></li>
                            <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-white">Features</a>
                            </li>
                            <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-white">Pricing</a>
                            </li>
                            <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-white">FAQs</a></li>
                            <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-white">About</a>
                            </li>
                        </ul>
                    </div>
                    <div class="col-1 offset-1">
                        <form>

                            <div class="d-flex w-100 gap-2">
                                <label for="newsletter1" class="visually-hidden">Lofo</label>
                                <input id="newsletter1" type="text" class="form-control"
                                    placeholder="Email address" />
                                <button class="btn btn-primary" type="button">Subscribe</button>
                            </div>
                        </form>
                        <form>

                            <div class="d-flex w-100 gap-2">
                                <label for="newsletter1" class="visually-hidden">Lofo</label>
                                <input id="newsletter1" type="text" class="form-control"
                                    placeholder="Email address" />
                                <button class="btn btn-primary" type="button">Subscribe</button>
                            </div>
                        </form>
                    </div>
                    <div class="col-1 offset-1">

                    </div>
                </div>

                <div class="d-flex justify-center py-4 my-4 ">
                    <p>© 2024 Utkarsh, Inc. All rights reserved.</p>

                </div>
            </footer>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"
        integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js"
        integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous">
    </script>
</body>

</html>
