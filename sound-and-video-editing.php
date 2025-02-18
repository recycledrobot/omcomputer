<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>OM Computer Maintenance</title>

  <meta name="description" content="OM Computer Maintenance offers top-notch IT support, repairs, and maintenance services for businesses and individuals. Reliable, affordable, and fast service.">
  <meta name="keywords" content="computer maintenance, IT support, computer repair, OM Computer Maintenance, IT services">
  <meta name="author" content="OM Computer Maintenance">
  <meta property="og:title" content="OM Computer Maintenance - Expert IT Services">
  <meta property="og:description" content="Professional IT services including repairs, maintenance, and support.">
  <meta property="og:image" content="om.jpg">
  <meta property="og:type" content="website">
  <meta property="og:url" content="https://omcomputermaintenance.com.np">
  <meta name="twitter:card" content="summary_large_image">
  <meta name="twitter:title" content="OM Computer Maintenance - Expert IT Services">
  <meta name="twitter:description" content="OM Computer Maintenance offers top-notch IT support, repairs, and maintenance services for businesses and individuals. Reliable, affordable, and fast service.">
  <meta name="twitter:image" content="https://omcomputermaintenance.com.np/om.jpg">

  <link rel="stylesheet" href="/css/bulma.min.css">
  <link rel="stylesheet" href="/css/styles.css">
  <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
  <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>

</head>

<body class="has-navbar-fixed-top has-background-black-ter">

  <?php include __DIR__ . "/partials/navbar.php"; ?>

  <section class="hero is-black is-medium">
    <div class="hero-body">
      <div class="container has-text-centered">
        <div class="columns is-centered">
          <div class="column is-9">
            <h1 class="title is-0" data-aos="zoom-out">Om Computer Maintenance</h1>
            <h2 class="subtitle is-2" data-aos="zoom-in">Annual Maintenace Contract</h2>
            <!--p class="subtitle is-4">Offering top-notch IT support, repairs, and maintenance services for businesses and individuals. Reliable, affordable, and fast service.</p-->
          </div>
        </div>
      </div>
  </section>

  <section class="section is-medium py-2 ">
      <div class="container  ">
        <div class="box has-background-black ">
          <h1 class="title has-text-white ">Videos Worked</h1>

          <div class="columns ">
              <div class="column is-two-thirds">
                  <h2 id="videoTitle" class="subtitle has-text-white ">Gai Ghat Dham</h2>
                  <div class="video-container">
                      <video id="videoPlayer" controls class="video-player">
                          <source src="vid/gai.mp4" type="video/mp4">
                          Your browser does not support the video tag.
                      </video>
                  </div>
              </div>

              <div class="column">
                  <h2 class="subtitle has-text-white">Videos</h2>
                  <ul id="playlist" class="box">
                      <li><span data-src="vid/gai.mp4" data-title="Gai Ghat Dham" class="playlist-item">Gai Ghat Dham</span></li>
                      <li><span data-src="vid/gai.mp4" data-title="Video 2" class="playlist-item">Video 2</span></li>
                      <li><span data-src="vid/gai.mp4" data-title="Video 3" class="playlist-item">Video 3</span></li>
                  </ul>
              </div>
          </div>
        </div>
      </div>
  </section>



  <footer class="footer has-background-black">
    <div class="content has-text-centered has-text-light mt-6">
      <p>&copy; Om Computer Maintenance</p>
    </div>
  </footer>

  <script src="/js/scripts.js"></script>
  <script>
    AOS.init({
      duration: 2000
    });
  </script>
</body>

</html>