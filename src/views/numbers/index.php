<div class="container mt-5">

  <form action="<?= URLROOT ?>/numbers/renderSearch" method="POST">
    <div class="row mb-5">
      <div class="col-md-5 mb-2">
        <input type="number" value="<?= $_SESSION['number'] ?>" name="number" id="search-number" class="form-control" placeholder="Search number here">
      </div>

      <div class="col-md-5 mb-2">
        <select name="person_id" class="form-select" id="person_id">
          <option value="-1" selected>Select a person</option>
          <?php foreach ($data['persons'] as $person) : ?>
            <option value="<?= $person['person_id'] ?>" <?= isset($_SESSION['person_id']) && $_SESSION['person_id'] == $person['person_id'] ? 'selected' : ''; ?>><?= $person['name'] ?></option>
          <?php endforeach; ?>
        </select>
      </div>

      <div class="col-md-2 mb-2">
        <input type="submit" value="Search" class="btn btn-primary">
      </div>
    </div>
  </form>

  <table class="table" id="myTable">
    <thead>
      <tr>
        <th scope="col">Sr#</th>
        <th scope="col">Name</th>
        <th scope="col">Phone</th>
        <th scope="col">Monthly</th>
        <th scope="col">Address</th>
        <th scope="col">Action</th>
      </tr>
    </thead>
    <tbody>
      <?php
      if (sizeof($data['numbers']) > 0) :
        for ($i = 0; $i < sizeof($data['numbers']); $i++) : ?>
          <tr>
            <td><?= $data['numbers'][$i]['sr_no'] ?></td>
            <td><?= $data['numbers'][$i]['name'] ?></td>
            <td><a href="tel:<?= $data['numbers'][$i]['contact_number'] ?>"><?= $data['numbers'][$i]['contact_number'] ?></a></td>
            <td><?= $data['numbers'][$i]['monthly_payment'] ?></td>
            <td><?= $data['numbers'][$i]['address'] ?></td>
            <td>
              <a class="btn btn-sm btn-primary" href="<?= URLROOT ?>/numbers/edit/<?= $data['numbers'][$i]['id'] ?>">Update</a>
              <a class="btn btn-sm btn-danger" href="<?= URLROOT ?>/numbers/delete/<?= $data['numbers'][$i]['id'] ?>">Delete</a>
            </td>
          </tr>
        <?php
        endfor;
      else :
        ?>
        <tr>
          <td colspan="6" class="text-center">No Result found</td>
        </tr>
      <?php endif; ?>
    </tbody>
  </table>



  <?php if (isset($data['is_pagination']) && $data['is_pagination']) : ?>
    <nav aria-label="Page navigation example">
      <ul class="pagination">
        <li class="page-item <?= $data['currentPage'] - 1 === 0 ? 'disabled' : '' ?> ">
          <a class="page-link " href="<?= URLROOT ?>/numbers/<?= $data['method']; ?>/<?= $data['currentPage'] - 1 ?>">Previous</a>
        </li>
        <?php for ($i = 0; $i < $data['totalPages']; $i++) : ?>

          <li class="page-item <?= $data['currentPage'] == $i + 1 ? "active" : '' ?>">
            <a class="page-link" href="<?= URLROOT ?>/numbers/<?= $data['method']; ?>/<?= $i + 1 ?>"><?= $i + 1 ?></a>
          </li>

        <?php endfor; ?>
        <li class="page-item <?= $data['currentPage'] == $data['totalPages'] ? "disabled" : '' ?>">
          <a class="page-link " href="<?= URLROOT ?>/numbers/<?= $data['method']; ?>/<?= $data['currentPage'] + 1 ?>">Next</a>
        </li>
      </ul>
    </nav>
  <?php endif; ?>

</div>