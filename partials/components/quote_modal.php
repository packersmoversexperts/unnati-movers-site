<template id="quoteTemplate">
  <div class="panel">
    <button class="closeModal" style="float:right;border:0;background:transparent;font-size:20px">✖</button>
    <h3>🚚 Get Quote Now</h3>
    <form>
      <div class="form-grid">
        <input name="firstName" placeholder="First Name" required>
        <input name="lastName" placeholder="Last Name" required>
        <input class="full" name="phone" placeholder="Enter your phone" required>
        <input class="full" type="email" name="email" placeholder="Enter your eMail Address" required>
        <input name="fromCity" placeholder="From City" required>
        <input name="fromState" placeholder="From State" required>
        <input name="toCity" placeholder="To City" required>
        <input name="toState" placeholder="To State" required>
        <select class="full" name="serviceType" required>
          <option value="">Select Service Type</option>
          <option>Bike Relocations</option>
          <option>Car Relocations</option>
          <option>Packers And Movers</option>
          <option>Office Relocations</option>
          <option>Storage And Warehouse</option>
          <option>Other Relocations</option>
        </select>
        <input class="full" type="date" name="date" required>
      </div>
      <button type="submit" class="btn btn-yellow" style="margin-top:12px;width:100%">Get A Free Quote</button>
    </form>
  </div>
</template>
