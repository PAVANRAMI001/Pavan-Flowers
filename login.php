
<?php
include 'db.php';

// Fetch all flowers
$search = $_GET['search'] ?? '';
$query = "SELECT * FROM flowers WHERE name LIKE '%$search%' OR description LIKE '%$search%'";
$result = $conn->query($query);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pavan Flowers - Your Ultimate Flower Shop</title>
    <!-- Bootstrap CSS & FontAwesome for Icons -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
    <style>
        /* Global Styles */
        body { font-family: 'Helvetica Neue', sans-serif; background: #f0f8ff; color: #333; margin: 0; }
        .container { max-width: 1200px; margin: 0 auto; }

        /* Navbar Styles */
        .navbar { position: sticky; top: 0; z-index: 100; background: #ff6f61; box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1); }
        .navbar .navbar-brand { font-weight: bold; font-size: 1.5rem; color: white; }
        .navbar a { color: white !important; }

        .navbar-nav .nav-link {
            font-size: 1.1rem;
            text-transform: uppercase;
            letter-spacing: 1px;
        }
        .navbar-toggler { border-color: white; }
        
        /* Hero Section */
        .hero {
            background: url('https://source.unsplash.com/1600x500/?flowers') no-repeat center center/cover;
            color: white;
            text-align: center;
            padding: 100px 20px;
            margin-bottom: 60px;
            box-shadow: inset 0 0 200px rgba(0, 0, 0, 0.4);
        }
        .hero h1 { font-size: 4rem; text-shadow: 3px 3px 15px rgba(0, 0, 0, 0.6); }
        .hero p { font-size: 1.5rem; font-weight: 300; }

        /* Card Styles */
        .card {
            border-radius: 15px;
            overflow: hidden;
            transition: transform 0.3s, box-shadow 0.3s;
            background: white;
            box-shadow: 0 2px 12px rgba(0, 0, 0, 0.1);
            
        }
        .card:hover { transform: scale(1.05); box-shadow: 0 6px 20px rgba(0, 0, 0, 0.15); }
        .card-img-top { object-fit: cover;height: 250px;/* width: 100px;*/ transition: transform 0.5s ease; }
        .card-img-top:hover { transform: scale(1.1); }
        
        .card-body { text-align: center; padding: 30px; }
        .card-title { font-size: 1.5rem; font-weight: bold; color: #333; }
        .card-text { font-size: 1.1rem; color: #777; }
        .btn-custom {
            background-color: #ff6f61;
            color: white;
            border: none;
            padding: 10px 20px;
            border-radius: 25px;
            transition: background 0.3s;
        }
        .btn-custom:hover { background-color: #e55b4e; }

        /* Footer Styles */
        footer {
            background: #333;
            color: white;
            text-align: center;
            padding: 40px 0;
            margin-top: 60px;
        }


        
        /* Carousel Styles */
        .carousel-inner img { object-fit: cover; width: 30%; height: 30%;}
        .carousel-item { transition: transform 0.5s ease; width:50%; margin-left: 25%; }
        .carousel-control-prev, .carousel-control-next { background: rgba(0, 0, 0, 0.3); }

        /* Product Rating */
        .rating { color: #ffcc00; font-size: 1.1rem; }

        /* Search and Category Filters */
        .search-bar input { border-radius: 25px; border: 2px solid #ff6f61; padding: 10px 20px; }
    </style>
</head>
<body>
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-light">
        <div class="container">
            <!-- Logo added here -->
            <a class="navbar-brand" href="#">
                <img src="LOGO.PNG" alt="Blossom Haven Logo" style="width: 50px; height: 50px; border-radius: 50%; margin-right: 10px;">
                PAVAN Flowers
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item"><a class="nav-link" href="#">Home</a></li>
                    <li class="nav-item"><a class="nav-link" href="#">About Us</a></li>
                    <li class="nav-item"><a class="nav-link" href="#">Contact</a></li>
                    <li class="nav-item"><a class="nav-link" href="#">Cart <span class="badge bg-danger">0</span></a></li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- Hero Section -->
    <section class="hero">
        <h1>Welcome to Pavan Flowers</h1>
        <p>Your Ultimate Destination for Fresh Flowers</p>
        <form action="login.php" method="GET" class="search-bar mt-4">
            <input type="text" name="search" class="form-control w-50 mx-auto" placeholder="Search for flowers..." value="<?php echo htmlspecialchars($search); ?>">
        </form>
    </section>

    <!-- Featured Flowers Carousel -->
    <div id="flowerCarousel" class="carousel slide" data-bs-ride="carousel">
        <div class="carousel-inner">
            <div class="carousel-item active">
                <a href="practic.php">
                <img src="wa1.jpg" class="d-block w-100" alt="Flower 1" align="center" class="op1">
                </a>
            </div>
            <div class="carousel-item">
                <img src="wa2.jpg" class="d-block w-100" alt="Flower 2" align="center" class="op1">
            </div>
            <div class="carousel-item">
                <img src="wa3.jpg" class="d-block w-100" alt="Flower 3" align='center' class="op1">
            </div>
            <div class="carousel-item">
                <img src="p1.jpg" class="d-block w-100" alt="Flower 4" align='center' class="op1">
            </div>
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#flowerCarousel" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#flowerCarousel" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </button>
    </div>

    <!-- Featured Flowers Section -->
    <div class="container my-5">
        <h2 class="text-center mb-4">Our Featured Flowers</h2>
        <div class="row">
            <?php while ($row = $result->fetch_assoc()) { ?>
                <div class="col-lg-4 col-md-6 mb-4">
                    <div class="card">
                        <img src="<?php echo htmlspecialchars($row['image_url']); ?>" class="card-img-top" alt="<?php echo $row['name']; ?>">            
                        <div class="card-body">
                            <h5 class="card-title"><?php echo htmlspecialchars($row['name']); ?></h5>
                            <p class="card-text"><?php echo htmlspecialchars($row['description']); ?></p>
                            <p class="card-text"><strong>Price: ₹<?php echo number_format($row['price'], 2); ?></strong></p>
                            <div class="rating">
                                <?php for ($i = 0; $i < 5; $i++) { ?>
                                    <i class="fas fa-star"></i>
                                <?php } ?>
                            </div>
                            <form action="order.php" method="POST" class="mt-3">
                                <input type="hidden" name="flower_id" value="<?php echo $row['id']; ?>">
                                <div class="mb-3">
                                    <input type="number" name="quantity" min="1" class="form-control" placeholder="Quantity" required>
                                </div>
                                <button type="submit" class="btn btn-custom">Order Now</button>
                            </form>
                        </div>
                    </div>
                </div>
            <?php } ?>
        </div>
    </div>

    <!-- Footer -->
    <footer>
        <p>&copy; 2024 Pavan Flowers. All Rights Reserved.</p>
    </footer>

    <!-- Bootstrap JS & Custom Scripts -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>
   
</body>
</html>
