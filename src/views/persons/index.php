<div class="container mt-5">

  <div class="d-flex justify-content-between">
    <h2>Person List</h2>
    <a class="btn btn-primary" href="<?= URLROOT ?>/persons/create">New Person</a>
  </div>

  <table class="table">
    <thead>
      <tr>
        <th scope="col">#</th>
        <th scope="col">Name</th>
        <th scope="col">Action</th>
      </tr>
    </thead>
    <tbody>

      <?php for ($i = 0; $i < sizeof($data['persons']); $i++) : ?>
        <tr>
          <th><?= $i + 1 ?></th>
          <td><?= $data['persons'][$i]['name'] ?></td>
          <td>
            <a href="<?= URLROOT ?>/persons/edit/<?= $data['persons'][$i]['person_id'] ?>" class="btn btn-sm btn-primary">Edit</a>
            <a href="<?= URLROOT ?>/persons/delete/<?= $data['persons'][$i]['person_id'] ?>" class="btn btn-sm btn-danger">Delete</a>
          </td>
        </tr>
      <?php endfor; ?>

    </tbody>
  </table>
</div>