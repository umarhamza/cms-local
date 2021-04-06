<!DOCTYPE html>
<html lang="en">

<head>
    <?php include('components/meta.php') ?>
    <title>CMS Local - Locations</title>
</head>

<body class="location-page">
    <?php include('components/header.php') ?>
    <main id="main">
        <div class="hero" style="background-image: url('./images/locations-hero.jpeg');">
            <div class="hero-container">
                <h1>Locations</h1>
                <a href="#carousel" class="smooth-scroll">Learn more</a>
            </div>
        </div>
        <div id="carousel">
            <div class="container-fluid d-none">
                <div class="row">
                    <div class="col col-12 locations-carousel">
                        <h2></h2>
                        <div class="glide">
                            <div data-glide-el="track" class="glide__track">
                                <ul class="glide__slides">
                                </ul>
                            </div>

                            <div class="glide__arrows" data-glide-el="controls">
                                <button class="glide__arrow glide__arrow--left btn btn-primary my-2" data-glide-dir="<">prev</button>
                                <button class="glide__arrow glide__arrow--right btn btn-primary my-2" data-glide-dir=">">next</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
    <?php include('components/footer.php') ?>
</body>

</html>