<div class="container mt-5">
  <div class="row">
    <div class="col-md-4">
      <div class="card">
        <div class="card-header">Total Numbers</div>
        <div class="card-body">
          <h1><?= $data['totalCustomers']; ?></h1>
          <a class="btn btn-primary" href="/shifa1/numbers/create">Add New</a>
          <a class="btn btn-success" href="/shifa1/numbers/">Search Here</a>
        </div>
      </div>
    </div>

    <div class="col-md-4">
      <div class="card">
        <div class="card-header">Total Employees</div>
        <div class="card-body">
          <h1><?= $data['totalPersons'] ?></h1>
          <a class="btn btn-primary" href="<?= URLROOT ?>/persons/create">Add New</a>
          <a class="btn btn-success" href="<?= URLROOT ?>/persons">List</a>
        </div>
      </div>
    </div>
    <!-- 
    <div class="col-md-4">
      <div class="card">
        <div class="card-header">Total Numbers</div>
        <div class="card-body">
          <h1>456</h1>
          <a class="btn btn-primary" href="#">Add New</a>
        </div>
      </div>
    </div> -->
  </div>
</div>