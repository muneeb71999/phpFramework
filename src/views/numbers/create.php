<style>
  .grid {
    display: grid !important;
    grid-template-columns: repeat(auto-fill, minmax(18rem, 1fr)) !important;
    gap: 1rem !important;
  }

  #number-search-result {
    position: absolute !important;
    top: 120% !important;
    left: 0;
    width: 100% !important;
    border: 1px solid gray;
    border-radius: 4px;
  }
</style>

<div class="container-sm mt-5">
  <div class="row">


    <h2 class="mb-3 d-flex justify-content-between flex-wrap">
      <span>
        Create New Record
      </span>
      <a class="btn btn-success" href="/shifa1/numbers/">Search Here</a>
    </h2>

    <form method="post" action="<?= URLROOT ?>/numbers/save">
      <div class="grid">

        <div class="form-group">
          <label for="sr_no" class="form-label">Sr#</label>
          <input type="text" value="<?= isset($data['sr_no']) ? $data['sr_no'] : ''; ?>" name="sr_no" autofocus class="form-control" id="sr_no" aria-describedby="emailHelp">
          <?php if (isset($data['sr_no_error'])) : ?>
            <div class="d-block invalid-feedback">
              <?= $data['sr_no_error'] ?>
            </div>
          <?php endif; ?>
        </div>

        <div class="form-group">
          <label for="customer_name" class="form-label">Name</label>
          <input type="text" value="<?= isset($data['customer_name']) ? $data['customer_name'] : ''; ?>" name="customer_name" autofocus class="form-control" id="customer_name" aria-describedby="emailHelp">
          <?php if (isset($data['customer_name_error'])) : ?>
            <div class="d-block invalid-feedback">
              <?= $data['customer_name_error'] ?>
            </div>
          <?php endif; ?>
        </div>

        <div class="form-group position-relative">
          <label for="customer_number" class="form-label">Number</label>
          <input type="text" value="<?= isset($data['customer_number']) ? $data['customer_number'] : ''; ?>" name="customer_number" maxlength="11" class="form-control" id="customer_number">
          <?php if (isset($data['customer_number_error'])) : ?>
            <div class="d-block invalid-feedback">
              <?= $data['customer_number_error'] ?>
            </div>
          <?php endif; ?>

          <div id="number-search-result">
            <div class="spinner-border" role="status" style="display: none;" id="number-search-spinner">
              <span class="visually-hidden">Loading...</span>
            </div>
            <div class="list-group" id="number-search-result-list">
            </div>
          </div>

        </div>

        <div class="form-group">
          <label for="customer_monthly" class="form-label">Monthly</label>
          <input type="number" value="0" name="customer_monthly" class="form-control" id="customer_monthly">
          <?php if (isset($data['customer_monthly_error'])) : ?>
            <div class="d-block invalid-feedback">
              <?= $data['customer_monthly_error'] ?>
            </div>
          <?php endif; ?>
        </div>

        <div>
          <label for="customer_person" class="form-label">Person</label>
          <select class="form-select" name="person_id" aria-label="Default select example">
            <?php foreach ($data['persons'] as $person) : ?>
              <option value="<?= $person['person_id'] ?>"><?= $person['name'] ?></option>
            <?php endforeach; ?>
          </select>
        </div>

        <div style="grid-column: 1 / -1;">
          <label for="customer_address" class="form-label">Address</label>
          <textarea type="text" rows="5" name="customer_address" class="form-control" id="customer_address"><?= isset($data['customer_address']) ? $data['customer_address'] : ''; ?></textarea>
          <?php if (isset($data['customer_address_error'])) : ?>
            <div class="d-block invalid-feedback">
              <?= $data['customer_address_error'] ?>
            </div>
          <?php endif; ?>
        </div>
      </div>

      <button type="submit" class="mt-3 btn btn-primary">Submit</button>
    </form>

  </div>
</div>