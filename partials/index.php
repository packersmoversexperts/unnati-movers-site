<?php require_once __DIR__ . '/partials/header.php'; ?>
<main class="container">
  <section class="hero">
    <h1>Unnati Movers Pvt Ltd</h1>
    <p class="tagline">“सुरक्षित सफर, भरोसे के साथ”</p>
    <div class="cta">
      <a href="#" class="btn btn-yellow" id="openQuote">Get a Free Quote</a>
      <a href="tel:+919660772299" class="btn btn-outline">Call Now</a>
    </div>
  </section>

  <section class="quote-block" id="homeQuote">
    <?php include __DIR__ . '/components/quote_modal.php'; ?>
  </section>

  <section class="why">
    <h2>Why Choose Us</h2>
    <div class="grid">
      <div class="card">✅ Safe & Secure Relocation</div>
      <div class="card">✅ Pan India Coverage</div>
      <div class="card">✅ Affordable Pricing</div>
      <div class="card">✅ 24×7 Support</div>
    </div>
  </section>

  <section class="services">
    <h2>Our Services</h2>
    <div class="grid">
      <a class="svc" href="/services/household">Household Shifting</a>
      <a class="svc" href="/services/office">Office Relocation</a>
      <a class="svc" href="/services/car">Car Transport</a>
      <a class="svc" href="/services/bike">Bike Transport</a>
      <a class="svc" href="/services/pet">Pet Relocation</a>
      <a class="svc" href="/services/packing">Packing Services</a>
      <a class="svc" href="/services/warehouse">Warehousing & Storage</a>
    </div>
  </section>

  <section class="tracking">
    <h2>Track Your Shipment</h2>
    <form class="track-form" method="get" action="/public/tracking_public.php">
      <input type="text" name="tid" placeholder="Enter Tracking/Invoice Number">
      <button type="submit" class="btn btn-blue">Track Now</button>
    </form>
  </section>
</main>
<?php require_once __DIR__ . '/partials/footer.php'; ?>
