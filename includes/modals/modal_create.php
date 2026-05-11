<div class="modal fade" id="createProduct" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5">Add product</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form action="../../actions/create_product.php" method="post" id="createForm" novalidate>          
          <div class="input-group mb-3">
            <span class="input-group-text">Product name</span>
            <input type="text" class="form-control" id="create_name" name="name" placeholder="Ultra Potato" required>
            <div class="invalid-feedback">Product name is required.</div>
          </div>

          <div class="input-group mb-3">
              <span class="input-group-text">Price €</span>
              <input type="number" class="form-control" id="create_price" name="price" step="0.01" min="0" max="999999.99" required>
              <div class="invalid-feedback">Please enter a valid price.</div>
          </div>

          <div class="input-group mb-3">
              <span class="input-group-text">Description</span>
              <textarea class="form-control" id="create_description" name="description" rows="3" required></textarea>
              <div class="invalid-feedback">Description is required.</div>
          </div>

          <div class"mb-3">
            <select class="form-select" id="create_category" name="category_id" required>
              <?php foreach ($categories as $cat) : ?>
              <option value="<?= $cat['id'] ?>"><?= htmlspecialchars($cat['name']) ?></option>
              <?php endforeach; ?>
            </select>
            <div class="invalid-feedback">Please select a category.</div>
          </div>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary" form="createForm">Confirm</button>
      </div>
    </div>
  </div>
</div>
