<?php
$title = "Bella Luxe Salon";
include("common/header.php");
include("common/nav.php");
include "../includes/service.inc.php";
require_once('../classes/ServiceController.class.php');


$serviceArray = ['Haircut and Style', 'Color and Dimension', 'Waves and Texture', 'Spa', 'Permanent Makeup'];
$resultsArray = [];
foreach ($serviceArray as $service) {
    $newService = new ServiceController();
    $results = $newService->showServices($service);
    $resultsArray[] = $results;
}

?>

<!-- InstanceBeginEditable name="content" -->
<div class="container-fluid">
    <main class="row">
        <div class="col-12 col-md-4 ps-4">
            <img class="paul" src="images/paulMitchellLogo.png" width="" height="" alt="Paul Mitchell Logo">
            <!-- <img class="focus" src="images/focus.png" width="" height="" alt="Focus"> -->
            <p class="">Bella Luxe Salon is a full-service, Paul Mitchell Focus Salon dedicated to helping every client look and feel their best. Our experienced stylists are passionate about creating beautiful,
                personalized looks that fit each client's individual style, personality, and lifestyle.</p>
            <p class="">We use only high-quality Paul Mitchell products and are committed to providing exceptional service from the moment you walk through our doors. Our stylists participate in regular education and training
                to stay current with the latest hair care techniques, trends, colors, cuts, and styling methods.</p>
            <p class="">Whether you're looking for a fresh new haircut, a beautiful color transformation, highlights, a special-occasion style, or simply some time to relax and pamper yourself, our team is here to help. We
                take the time to listen to what you want and work with you to achieve a look you'll love.</p>
            <p class="">At Bella Luxe Salon, we believe great hair is more than just a style—it's about confidence. Our goal is to provide a warm, welcoming salon experience where you can relax, feel comfortable, and leave
                looking and feeling your very best.</p>

            <a href="#contact"><button type="button" class="btn btn-outline-secondary contact_btn"
                    name="contact">Contact Us</button></a>
        </div>
        <div class="col-12 col-md-8">
            <img class="models" src="images/models.jpg" width="" height="" alt="models">
        </div>
    </main>
    <!-- Accordion -->
    <div class="row" id="service">
        <div class="accordion" id="serviceAccordion">
            <div class="accordion-item">
                <h2 class="accordion-header">
                    <a href="#" class="">
                        <button class="accordion-button fancy" type="button" data-bs-toggle="collapse"
                            data-bs-target="#collapseOne" aria-expanded="false" aria-controls="collapseOne">
                            Haircuts & Styles
                        </button>
                    </a>
                </h2>
                <div id="collapseOne" class="accordion-collapse collapse" data-bs-parent="#serviceAccordion">
                    <div class="accordion-body">
                        <div class="container">
                            <div class="row my-3">
                                <div class="col-md-2 d-none d-md-block">
                                    <img class="img-fluid border border-muted p-3" src="images/black.jpg"
                                        alt="Dark Hair Model">
                                </div>
                                <div class="d-none d-md-block col-md-4 col-lg-6">
                                    <h5>Precision Cuts & Styling for the Whole Family</h5>
                                    <p class="text-muted">A great haircut is the foundation of any style—it
                                        should make you look polished,
                                        feel confident, and fit seamlessly into your daily routine. Whether you're a
                                        busy mom looking for a chic, low-maintenance cut, a professional seeking a
                                        sharp, executive style, a gentleman wanting a classic or modern edge, or a child
                                        getting their very first trim, our skilled stylists bring expertise and care to
                                        every chair. We believe everyone deserves to love their hair, which is why we
                                        take the time to consult with each client about their hair type, face shape,
                                        lifestyle, and styling preferences before we ever pick up our shears. From
                                        timeless bobs and layered looks to fade cuts, beard trims, and gentle children's
                                        cuts that make the experience fun and stress-free, we create styles that enhance
                                        your natural beauty and work with your real life. Walk in as yourself, walk out
                                        feeling like the best version of you.</p>
                                </div>
                                <div class="col-12 col-md-4">
                                    <table class="table">
                                        <thead>
                                            <tr>
                                                <th>Service</th>
                                                <th>Price</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            foreach ($resultsArray[0] as $result) {
                                                echo "<tr>";
                                                echo "<td>" . $result['service'] . "</td>";
                                                echo "<td>$" . $result['price'] . "+</td>";
                                                echo "</tr>";
                                            }
                                            ?>
                                        </tbody>
                                    </table>
                                </div>
                                <!-- <div class="col-12 col-md-4">
                                    <h5>Why Get a New Style?</h5>
                                    <p>A fresh cut enhances your natural beauty, boosts confidence, and makes daily
                                        styling effortless. Our stylists create looks tailored to your hair type and
                                        lifestyle—so you always look and feel your best.</p>
                                </div> -->

                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="accordion-item">
                <h2 class="accordion-header">
                    <button class="accordion-button collapsed fancy" type="button" data-bs-toggle="collapse"
                        data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                        Color & Dimension
                    </button>
                </h2>
                <div id="collapseTwo" class="accordion-collapse collapse" data-bs-parent="#serviceAccordion">
                    <div class="accordion-body">
                        <div class="container">
                            <div class="row my-3">
                                <div class="col-md-2 d-none d-md-block">
                                    <img class="img-fluid border border-muted p-3" src="images/red.jpg"
                                        alt="Red Hair Model">
                                </div>
                                <div class="d-none d-md-block col-md-4 col-lg-6">
                                    <h5>Transform Your Look with Expert Color & Highlights</h5>
                                    <p class="text-muted">There's something magical about walking out of the salon with
                                        freshly colored
                                        hair—it's an instant confidence boost that radiates from the inside out. Whether
                                        you're looking to cover grays, add dimension with subtle highlights, or
                                        completely reinvent yourself with a bold new shade, professional color services
                                        do more than just change your hair. They enhance your natural features, brighten
                                        your complexion, and give you that polished, put-together feeling that lasts for
                                        weeks. Our expert colorists take the time to understand your lifestyle,
                                        maintenance preferences, and personal style to create a customized color that's
                                        uniquely you. From sun-kissed balayage to rich, vibrant all-over color, we use
                                        premium products that protect your hair's health while delivering stunning,
                                        long-lasting results that turn heads wherever you go.</p>
                                </div>
                                <div class=" col-12 col-md-4">
                                    <table class="table">
                                        <tr>
                                            <th>Service</th>
                                            <th>Price</th>
                                        </tr>
                                        <?php
                                        foreach ($resultsArray[1] as $result) {
                                            echo "<tr>";
                                            echo "<td>" . $result['service'] . "</td>";
                                            echo "<td>$" . $result['price'] . "+</td>";
                                            echo "</tr>";
                                        }
                                        ?>

                                    </table>
                                </div>
                                <div class="col-12 col-md-4">
                                    <h5>Why Get a New Style?</h5>
                                    <p>A fresh cut enhances your natural beauty, boosts confidence, and makes daily
                                        styling effortless. Our stylists create looks tailored to your hair type and
                                        lifestyle—so you always look and feel your best.</p>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="accordion-item">
                <h2 class="accordion-header">
                    <button class="accordion-button collapsed fancy" type="button" data-bs-toggle="collapse"
                        data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                        Waves & Texture
                    </button>
                </h2>
                <div id="collapseThree" class="accordion-collapse collapse" data-bs-parent="#serviceAccordion">
                    <div class="accordion-body">
                        <div class="container">
                            <div class="row my-3">
                                <div class="col-md-2 d-none d-md-block">
                                    <img class="img-fluid border border-muted p-3" src="images/blond.jpg"
                                        alt="Blond Hair Model">
                                </div>
                                <div class="d-none d-md-block col-md-4 col-lg-6">
                                    <h5>Waves, Textures & Smoothing Treatments</h5>
                                    <p class="text-muted">Whether you're dreaming of bouncy curls, beachy waves, or
                                        sleek,
                                        frizz-free
                                        smoothness, our texture transformation services give you the hair you've
                                        always
                                        wanted with results that last for months. Add volume and movement with a
                                        classic
                                        perm or embrace gorgeous, defined spirals with a spiral perm that brings
                                        your
                                        hair to life with effortless dimension. If you're battling frizz and
                                        craving
                                        silky-smooth strands, our Keratin California Smooth treatment tames
                                        unruly hair
                                        while maintaining natural body and movement, cutting your styling time
                                        in half.
                                        For the ultimate in luxury hair care, our Awapuhi Keratin Treatment
                                        infuses your
                                        hair with deep hydration and shine while creating a beautifully smooth,
                                        manageable texture that moves naturally and feels incredibly soft. Each
                                        treatment is customized to your hair's unique needs and your desired
                                        look, so
                                        whether you want to add texture or eliminate it, we'll help you achieve
                                        hair
                                        that's healthy, gorgeous, and perfectly you.</p>
                                </div>
                                <div class=" col-12 col-md-4">
                                    <table class="table">
                                        <tr>
                                            <th>Service</th>
                                            <th>Price</th>
                                        </tr>
                                        <?php
                                        foreach ($resultsArray[2] as $result) {
                                            echo "<tr>";
                                            echo "<td>" . $result['service'] . "</td>";
                                            echo "<td>$" . $result['price'] . "+</td>";
                                            echo "</tr>";
                                        }
                                        ?>

                                    </table>
                                </div>
                                <!-- <div class="col-12 col-md-4">
                                    <h5>Why Get a New Style?</h5>
                                    <p>A fresh cut enhances your natural beauty, boosts confidence, and makes daily
                                        styling effortless. Our stylists create looks tailored to your hair type and
                                        lifestyle—so you always look and feel your best.</p>
                                </div> -->

                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="accordion-item">
                <h2 class="accordion-header">
                    <button class="accordion-button collapsed fancy" type="button" data-bs-toggle="collapse"
                        data-bs-target="#collapseFour" aria-expanded="false" aria-controls="collapseFour">
                        Spa
                    </button>
                </h2>
                <div id="collapseFour" class="accordion-collapse collapse" data-bs-parent="#serviceAccordion">
                    <div class="accordion-body">
                        <div class="container">
                            <div class="row my-3">
                                <div class="col-md-2 d-none d-md-block">
                                    <img class="img-fluid border border-muted p-3" src="images/brow.jpg"
                                        alt="Eyes Brows">
                                </div>
                                <div class="d-none d-md-block col-md-4 col-lg-6">
                                    <h5>Spa Services & Waxing</h5>
                                    <p class="text-muted">Smooth, hair-free skin isn't just about looking great—it's
                                        about feeling
                                        confident and comfortable in your own body every single day. Our
                                        professional
                                        waxing services offer a quick, effective solution for unwanted hair,
                                        leaving
                                        your skin silky soft for weeks at a time. Whether you need a quick lip
                                        or chin
                                        wax to keep your face flawlessly groomed, perfectly shaped eyebrows that
                                        frame
                                        your eyes and define your features, a full face wax for that radiant,
                                        polished
                                        glow, or smooth legs and arms that stay beach-ready all season long, our
                                        experienced estheticians use gentle techniques and high-quality products
                                        to
                                        minimize discomfort and maximize results. We create a comfortable,
                                        private
                                        environment where you can relax and trust that you're in caring,
                                        professional
                                        hands. Say goodbye to daily shaving and stubble, and hello to
                                        consistently
                                        smooth skin that lets you feel your most confident, beautiful self.</p>
                                </div>
                                <div class=" col-12 col-md-4">
                                    <table class="table">
                                        <tr>
                                            <th>Service</th>
                                            <th>Price</th>
                                        </tr>
                                        <?php
                                        foreach ($resultsArray[3] as $result) {
                                            echo "<tr>";
                                            echo "<td>" . $result['service'] . "</td>";
                                            echo "<td>$" . $result['price'] . "+</td>";
                                            echo "</tr>";
                                        }
                                        ?>

                                    </table>
                                </div>
                                <!-- <div class="col-12 col-md-4">
                                    <h5>Why Get a New Style?</h5>
                                    <p>A fresh cut enhances your natural beauty, boosts confidence, and makes daily
                                        styling effortless. Our stylists create looks tailored to your hair type and
                                        lifestyle—so you always look and feel your best.</p>
                                </div> -->

                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="accordion-item">
                <h2 class="accordion-header">
                    <button class="accordion-button collapsed fancy" type="button" data-bs-toggle="collapse"
                        data-bs-target="#collapseFive" aria-expanded="false" aria-controls="collapseFive">
                        Permanent Makeup
                    </button>
                </h2>
                <div id="collapseFive" class="accordion-collapse collapse" data-bs-parent="#serviceAccordion">
                    <div class="accordion-body">
                        <div class="container">
                            <div class="row my-3">
                                <div class="col-md-2 d-none d-md-block">
                                    <img class="img-fluid border border-muted p-3" src="images/eyelashBA.jpg"
                                        alt="Eye Brows and Eyelashes">
                                </div>
                                <div class="d-none d-md-block col-md-4 col-lg-6">
                                    <h5>Permanent Makeup</h5>
                                    <p class="text-muted">Imagine waking up every morning with perfectly shaped brows
                                        and
                                        beautifully
                                        defined eyes—no makeup routine required. Our permanent makeup services
                                        give you
                                        flawless, long-lasting results that save you precious time while
                                        enhancing your
                                        natural beauty around the clock. Whether you have sparse brows that need
                                        filling, want to create a more defined arch, or simply desire the
                                        convenience of
                                        never having to draw them on again, our expertly applied permanent
                                        eyebrow
                                        techniques create natural-looking, hair-like strokes or soft, powdered
                                        brows
                                        that frame your face beautifully. Our permanent eye makeup services add
                                        subtle
                                        definition to your lash line, creating the appearance of fuller, darker
                                        lashes
                                        and making your eyes pop without the daily hassle of eyeliner
                                        application. Each
                                        treatment is carefully customized to complement your unique features,
                                        skin tone,
                                        and personal style, using advanced techniques and premium pigments that
                                        fade
                                        naturally over time. Wake up ready to go, look polished from morning to
                                        night,
                                        and reclaim hours of your life—all while looking effortlessly
                                        put-together every
                                        single day.</p>
                                </div>
                                <div class=" col-12 col-md-4">
                                    <table class="table">
                                        <tr>
                                            <th>Service</th>
                                            <th>Price</th>
                                        </tr>
                                        <?php
                                        foreach ($resultsArray[4] as $result) {
                                            echo "<tr>";
                                            echo "<td>" . $result['service'] . "</td>";
                                            echo "<td>$" . $result['price'] . "+</td>";
                                            echo "</tr>";
                                        }
                                        ?>

                                    </table>
                                </div>
                                <!-- <div class="col-12 col-md-4">
                                    <h5>Why Get a New Style?</h5>
                                    <p>A fresh cut enhances your natural beauty, boosts confidence, and makes daily
                                        styling effortless. Our stylists create looks tailored to your hair type and
                                        lifestyle—so you always look and feel your best.</p>
                                </div> -->

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!--Gallery-->
    <div class="row" id="gallery">
        <div class="col-12">

            <!-- Gallery Carousel -->
            <div class="gallery-carousel-wrapper">
                <h2 class="logo_type fs-1 p-2 mt-3 text-center">Gallery</h2>
                <div id="galleryCarousel" class="carousel slide" data-bs-ride="false">
                    <div class="carousel-indicators">
                        <button type="button" data-bs-target="#galleryCarousel" data-bs-slide-to="0"
                            class="active"></button>
                        <button type="button" data-bs-target="#galleryCarousel" data-bs-slide-to="1"></button>
                        <button type="button" data-bs-target="#galleryCarousel" data-bs-slide-to="2"></button>
                        <button type="button" data-bs-target="#galleryCarousel" data-bs-slide-to="3"></button>
                        <button type="button" data-bs-target="#galleryCarousel" data-bs-slide-to="4"></button>
                    </div>

                    <div class="carousel-inner">
                        <div class="carousel-item active">
                            <img src="https://images.unsplash.com/photo-1560066984-138dadb4c035?w=800&h=500&fit=crop"
                                alt="Salon Interior 1">
                        </div>
                        <div class="carousel-item">
                            <img src="https://images.unsplash.com/photo-1521590832167-7bcbfaa6381f?w=800&h=500&fit=crop"
                                alt="Hair Styling 1">
                        </div>
                        <div class="carousel-item">
                            <img src="https://images.unsplash.com/photo-1562322140-8baeececf3df?w=800&h=500&fit=crop"
                                alt="Hair Color">
                        </div>
                        <div class="carousel-item">
                            <img src="https://images.unsplash.com/photo-1519699047748-de8e457a634e?w=800&h=500&fit=crop"
                                alt="Salon Interior 2">
                        </div>
                        <div class="carousel-item">
                            <img src="https://images.unsplash.com/photo-1522337660859-02fbefca4702?w=800&h=500&fit=crop"
                                alt="Hair Styling 2">
                        </div>
                    </div>

                    <button class="carousel-control-prev" type="button" data-bs-target="#galleryCarousel"
                        data-bs-slide="prev">
                        <span class="carousel-control-prev-icon"></span>
                        <span class="visually-hidden">Previous</span>
                    </button>
                    <button class="carousel-control-next" type="button" data-bs-target="#galleryCarousel"
                        data-bs-slide="next">
                        <span class="carousel-control-next-icon"></span>
                        <span class="visually-hidden">Next</span>
                    </button>
                </div>
            </div>

        </div>
    </div>
    <!--Testimonials-->
    <div class="row" id="testimonials">
        <div class="col-12">

            <h2 class="logo_type fs-1 p-2 mt-3 text-center">Testimonials</h2>

            <div id="carouselExampleFade" class="carousel slide carousel-fade position-relative">

                <div class="carousel-inner">

                    <!-- Slide 1 -->
                    <div class="carousel-item active">
                        <div class="test shadow-lg p-4 mb-4 rounded mx-auto" style="max-width: 700px;">
                            <div class="p-3 p-md-5 text-center">
                                <i class='bxrds bx-quote-right bx-invert-opacity'
                                    style="--bx-duotone-primary-color:#e7f6f6;"></i>
                                <p class="mt-3">
                                    I absolutely love Bella Luxe Salon! I have been coming here for over two years and have always left feeling beautiful and confident.
                                    Lori really takes the time to listen to what I want and somehow always makes it look even better than I imagined.
                                    The entire staff is friendly, welcoming, and professional. I wouldn't trust anyone else with my hair. Bella Luxe is definitely my happy place!
                                    <br><br><strong>Amanda Richardson</strong>
                                </p>
                            </div>
                        </div>
                    </div>

                    <!-- Slide 2 -->
                    <div class="carousel-item">
                        <div class="test shadow-lg p-4 mb-4 rounded mx-auto" style="max-width: 700px;">
                            <div class="p-3 p-md-5 text-center">
                                <i class='bxrds bx-quote-right bx-invert-opacity'
                                    style="--bx-duotone-primary-color:#e7f6f6;"></i>
                                <p class="mt-3">
                                    I found Bella Luxe Salon after having a terrible experience at another salon, and I am so glad I did! Lori was incredibly patient and took the time
                                    to understand exactly what I wanted. She completely transformed my color and gave me the perfect cut. My hair has never looked or felt this healthy.
                                    Everyone at the salon is so friendly and makes you feel right at home. I highly recommend Bella Luxe!
                                    <br><br><strong>Michelle Carter</strong>
                                </p>
                            </div>
                        </div>
                    </div>

                    <!-- Slide 3 -->
                    <div class="carousel-item">
                        <div class="test shadow-lg p-4 mb-4 rounded mx-auto" style="max-width: 700px;">
                            <div class="p-3 p-md-5 text-center">
                                <i class='bxrds bx-quote-right bx-invert-opacity'
                                    style="--bx-duotone-primary-color:#e7f6f6;"></i>
                                <p class="mt-3">
                                    Bella Luxe Salon is amazing! I have been seeing Lori for almost a year now, and every appointment has been a wonderful experience. She is incredibly
                                    talented and always seems to know exactly what will work best with my hair. I especially love how much attention she pays to the little details.
                                    The salon is beautiful, relaxing, and the staff is wonderful. I always look forward to my appointments!
                                    <br><br><strong>Stephanie Morgan</strong>
                                </p>
                            </div>
                        </div>
                    </div>
                    <!-- Slide 4 -->
                    <div class="carousel-item">
                        <div class="test shadow-lg p-4 mb-4 rounded mx-auto" style="max-width: 700px;">
                            <div class="p-3 p-md-5 text-center">
                                <i class='bxrds bx-quote-right bx-invert-opacity'
                                    style="--bx-duotone-primary-color:#e7f6f6;"></i>
                                <p class="mt-3">
                                    I can't say enough good things about Bella Luxe Salon. I recently decided to make a big change to my hairstyle and was nervous about trying something
                                    completely different. Lori listened to my ideas, made some great suggestions, and gave me a style that I absolutely love. The compliments I've received
                                    from my colleagues and friends have been amazing! The prices are very reasonable for the quality of service, and everyone is so warm and welcoming.
                                    I have finally found my salon!
                                    <br><br><strong>Karen Mitchell</strong>
                                </p>
                            </div>
                        </div>
                    </div>
                    <!-- Slide 5 -->
                    <div class="carousel-item">
                        <div class="test shadow-lg p-4 mb-4 rounded mx-auto" style="max-width: 700px;">
                            <div class="p-3 p-md-5 text-center">
                                <i class='bxrds bx-quote-right bx-invert-opacity'
                                    style="--bx-duotone-primary-color:#e7f6f6;"></i>
                                <p class="mt-3">
                                    I have been going to Bella Luxe Salon for several years, and I wouldn't dream of going anywhere else. Lori and her staff are always so friendly and make every visit enjoyable.
                                    Whether I'm getting a haircut, color, or just a little refresh, I always leave feeling great. Lori really cares about her clients and takes pride in her work. Bella Luxe has that
                                    perfect combination of professional service and a comfortable, friendly atmosphere
                                    <br><br><strong>Jessica Bennett</strong>
                                </p>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Controls centered vertically -->
                <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleFade"
                    data-bs-slide="prev">
                    <span class="carousel-control-prev-icon"></span>
                    <span class="visually-hidden">Previous</span>
                </button>

                <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleFade"
                    data-bs-slide="next">
                    <span class="carousel-control-next-icon"></span>
                    <span class="visually-hidden">Next</span>
                </button>

            </div>

        </div>
    </div>
    <!--Contact-- Use contact us and floating label-->
    <div class="row m-5" id="contact">
        <div class="col">
            <h2 class="logo_type fs-1 p-2 mt-3 text-center">Contact Us</h2>
            <div class="container text-center">
                <div class="row">
                    <div class="col-md-6 mx-auto">
                        <form id="contact" onsubmit="" action="" method="post">
                            <div class="form-floating mb-3">
                                <input type="text" class="form-control" id="name" name="name" placeholder="Your Name"
                                    required>
                                <label for="name">Name</label>
                            </div>
                            <div class="form-floating mb-3">
                                <input type="email" class="form-control" id="email" name="email"
                                    placeholder="Your Email" required>
                                <label for="email">Email</label>
                            </div>
                            <div class="form-floating mb-3">
                                <textarea class="form-control" id="message" name="message" placeholder="Your Message"
                                    required></textarea>
                                <label for="message">Message</label>
                            </div>
                            <button type="submit" class="btn btn-outline-secondary">Submit</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>

<?php
include("common/footer.php");
?>