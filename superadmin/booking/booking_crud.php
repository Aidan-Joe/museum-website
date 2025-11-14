<div class="modal fade" id="addBookingModal" tabindex="-1">
  <div class="modal-dialog">
    <div class="modal-content">
      <form method="POST" action="">
        <div class="modal-header">
          <h5 class="modal-title">New Booking</h5>
        </div>
        <div class="modal-body">
          <input name="MemberName" class="form-control mb-2" placeholder="Visitor Name" required>
          <input name="member_email" class="form-control mb-2" placeholder="Email" required>

          <select name="TicketType" class="form-select mb-2">
            <option>Adult</option>
            <option>Student</option>
            <option>Child</option>
            <option>Family</option>
          </select>

          <input name="Quantity" type="number" class="form-control mb-2" min="1" value="1" required>

          <select name="PaymentType" class="form-select mb-2" required>
            <option value="Cash">Cash</option>
            <option value="Credit">Credit</option>
            <option value="Transfer">Transfer</option>
          </select>

          <input name="Total" type="number" step="0.01" class="form-control mb-2" placeholder="Total (Rp)" required>
          <input name="TransactionDate" type="date" class="form-control mb-2" required>
        </div>

        <div class="modal-footer">
          <button class="btn btn-secondary" data-bs-dismiss="modal" type="button">Cancel</button>
          <button class="btn btn-primary" name="add_booking" type="submit">Create Booking</button>
        </div>
      </form>
    </div>
  </div>
</div>


<div class="modal fade" id="editBookingModal" tabindex="-1">
  <div class="modal-dialog">
    <div class="modal-content">
      <form method="POST" action="">
        <div class="modal-header">
          <h5 class="modal-title">Edit Booking</h5>
        </div>
        <div class="modal-body">
          <input type="hidden" name="TransactionCode" id="editTransactionCode">
          <input name="MemberName" id="editMemberName" class="form-control mb-2" placeholder="Visitor Name" required>
          <input name="member_email" id="editMemberEmail" class="form-control mb-2" placeholder="Email" required>

          <select name="TicketType" id="editTicketType" class="form-select mb-2">
            <option>Adult</option>
            <option>Student</option>
            <option>Child</option>
            <option>Family</option>
          </select>

          <input name="Quantity" id="editQuantity" type="number" class="form-control mb-2" min="1" required>

         <select name="PaymentMethod" class="form-select mb-2" required>
  <option value="Cash">Cash</option>
  <option value="Credit">Credit</option>
  <option value="Transfer">Transfer</option>
</select>


          <input name="Total" id="editTotal" type="number" step="0.01" class="form-control mb-2" required>
          <input name="TransactionDate" id="editTransactionDate" type="date" class="form-control mb-2" required>

          <select name="PaymentStatus" id="editPaymentStatus" class="form-select mb-2">
            <option>Pending</option>
            <option>Confirmed</option>
            <option>Cancelled</option>
          </select>
        </div>

        <div class="modal-footer">
          <button class="btn btn-secondary" data-bs-dismiss="modal" type="button">Cancel</button>
          <button class="btn btn-primary" name="edit_booking" type="submit">Save</button>
        </div>
      </form>
    </div>
  </div>
</div>
