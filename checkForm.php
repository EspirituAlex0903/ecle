<form method="POST">
  <div class="row mt-5 g-3">
    <div class="col-md">
      <div>
        <h5>Please enter your provided reference number to check the current status</h5>
        <input type="text" name="transnumber" oninvalid="this.setCustomValidity('Please enter your reference number!')" oninput="this.setCustomValidity('')" class="form-control" required>
      </div>
    </div>
  </div>
  <div class="row">
    <div class="col-md pt-3">
      <button class="btn btn-dark">Submit</button>
    </div>
  </div>
</form>
<button onclick="location.href='index.php'" class="btn btn-dark mt-3">Back</button>