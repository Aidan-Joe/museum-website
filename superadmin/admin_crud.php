<!-- MODALS -->
<!-- Add Admin -->
<div class="modal fade" id="addAdminModal" tabindex="-1"><div class="modal-dialog"><div class="modal-content">
<form method="POST" action="">
    <div class="modal-header"><h5 class="modal-title">Add New Admin</h5></div>
    <div class="modal-body">
        <input type="text" name="AdminName" class="form-control mb-2" placeholder="Full Name" required>
        <input type="email" name="admin_email" class="form-control mb-2" placeholder="Email" required>
        <input type="text" name="Password" class="form-control mb-2" placeholder="Password" required>
    </div>
    <div class="modal-footer">
        <button class="btn btn-secondary" data-bs-dismiss="modal" type="button">Cancel</button>
        <button class="btn btn-primary" name="add_admin" type="submit">Add Admin</button>
    </div>
</form>
</div></div></div>

<!-- Edit Admin -->
<div class="modal fade" id="editAdminModal" tabindex="-1"><div class="modal-dialog"><div class="modal-content">
<form method="POST" action="">
    <div class="modal-header"><h5 class="modal-title">Edit Admin</h5></div>
    <div class="modal-body">
        <input type="hidden" name="AdminCode" id="editAdminCode">
        <input type="text" name="AdminName" id="editAdminName" class="form-control mb-2" placeholder="Name" required>
        <input type="email" name="admin_email" id="editAdminEmail" class="form-control mb-2" placeholder="Email" required>
        <input type="text" name="Password" id="editAdminPassword" class="form-control mb-2" placeholder="Password (leave blank to keep)">
        <select name="Status" id="editAdminStatus" class="form-select mb-2"><option>Active</option><option>Inactive</option></select>
    </div>
    <div class="modal-footer"><button class="btn btn-secondary" data-bs-dismiss="modal" type="button">Cancel</button><button class="btn btn-primary" name="edit_admin" type="submit">Save</button></div>
</form>
</div></div></div>