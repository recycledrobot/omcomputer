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
    </div>
  </section>

  <section class="section">
      <div class="container">

          <form id="dataForm" enctype="multipart/form-data">

              <!-- Organization Name -->
              <div class="field">
                <label class="label has-text-white">Organisation Name</label>
                <div class="control has-icons-left">
                  <input class="input" type="text" name="organisation" placeholder="Organisation Name">
                  <span class="icon is-small is-left">
                    <i class="fas fa-building"></i>  <!-- Organisation Name Icon -->
                  </span>
                </div>
              </div>
              <div class="field">
                <label class="label has-text-white">Pan/Vat No</label>
                <div class="control">
                  <input class="input" type="text" name="document_number" placeholder="Pan/Vat No">
                </div>
              </div>

              <!-- Mobile/Phone Number -->
              <div class="field">
                  <label class="label has-text-white" for="phone-number">Mobile/Phone Number</label>
                  <div class="control has-icons-left">
                      <input id="phone-number" name="phone" class="input" type="tel" placeholder="Enter Contact No" required>
                      <span class="icon is-small is-left">
                          <i class="fas fa-phone"></i>
                      </span>
                  </div>
              </div>

              <!-- Email -->
              <div class="field">
                  <label class="label has-text-white" for="email">Email</label>
                  <div class="control has-icons-left">
                      <input id="email" name="email" class="input" type="email" placeholder="Enter Email" required>
                      <span class="icon is-small is-left">
                          <i class="fas fa-envelope"></i>
                      </span>
                  </div>
              </div>

              <!-- Official Document Selection -->
              <div class="field">
                  <label class="label has-text-white" for="document">Select Official Document</label>
                  <div class="control">
                      <div class="select">
                          <select id="document" name="document" required>
                              <option value="" disabled selected>Select a document</option>
                              <option value="PAN">PAN</option>
                              <option value="VAT">VAT</option>
                          </select>
                      </div>
                  </div>
              </div>

              <!-- File Upload -->
              <div class="field">
                  <label class="label has-text-white">Upload Document</label>
                  <div class="file has-name">
                      <label class="file-label">
                          <input class="file-input" type="file" name="file_upload" required>
                          <span class="file-cta">
                              <span class="file-icon">
                                  <i class="fas fa-upload"></i>
                              </span>
                              <span class="file-label"> Choose a file… </span>
                          </span>
                          <span class="file-name">No file chosen</span>
                      </label>
                  </div>
              </div>

              <!-- Terms and Conditions -->
              <div class="field">
                  <div class="control">
                      <label class="checkbox">
                          <input type="checkbox" name="terms" required>
                          I agree to the <a href="#">terms and conditions</a>
                      </label>
                  </div>
              </div>

              <!-- Submit and Cancel Buttons -->
              <div class="field is-grouped">
                  <div class="control">
                      <button type="submit" class="button is-link">Submit</button>
                  </div>
                  <div class="control">
                      <button type="reset" class="button is-link is-light">Cancel</button>
                  </div>
              </div>

          </form>

          <div id="message-container"></div>

      </div>
  </section>


  <?php include __DIR__ . "/partials/footer.php"; ?>

  <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
  <script src="/js/scripts.js"></script>
</body>

</html>
