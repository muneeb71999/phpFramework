<style>
  .grid {
    display: grid !important;
    grid-template-columns: repeat(auto-fill, minmax(18rem, 1fr)) !important;
    gap: 1rem !important;
  }

  #number-search-result {
    position: absolute;
    top: 110%;
    left: 0;
    width: 100%;
  }
</style>

<div class="container-sm mt-5">
  <div class="row">
    <h2 class="mb-3 d-flex justify-content-between flex-wrap">
      <span>
        Create New Person
      </span>
    </h2>

    <form action="<?= URLROOT ?>/persons/save" method="POST">
      <div class="grid">

        <div class="form-group">
          <label for="person_name" class="form-label">Name</label>
          <input type="text" name="person_name" autofocus class="form-control" id="person_name" aria-describedby="emailHelp">
          <?php if (isset($data['person_name_error'])) : ?>
            <div class="d-block invalid-feedback">
              <?= $data['person_name_error'] ?>
            </div>
          <?php endif; ?>
        </div>
      </div>

      <button type="submit" class="mt-3 btn btn-primary">Submit</button>
    </form>

  </div>
</div>