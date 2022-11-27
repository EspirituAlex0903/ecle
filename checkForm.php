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
      <button class="button-submits" style="width:40%; border-radius: 4px; background-color: #f04e98; border: none; color: #fff;">Submit</button>
    </div>
  </div>
</form>
<button onclick="location.href='index.php'" class="button-back btn-dark mt-3">Back</button>
