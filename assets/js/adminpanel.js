function showSection(section) {
    // Hide all sections
    document.getElementById('dashboard-section').style.display = 'none';
    document.getElementById('bookings-section').style.display = 'none';
    
    const adminsSection = document.getElementById('admins-section');
    if (adminsSection) {
        adminsSection.style.display = 'none';
    }
    
    document.getElementById('settings-section').style.display = 'none';
    
    // Show selected section
    document.getElementById(section + '-section').style.display = 'block';
    
    // Update active nav link
    document.querySelectorAll('.nav-link').forEach(link => {
        link.classList.remove('active');
    });
    event.target.closest('.nav-link').classList.add('active');
}

// Search functionality
const bookingSearch = document.getElementById('bookingSearch');
if (bookingSearch) {
    bookingSearch.addEventListener('input', function(e) {
        const searchTerm = e.target.value.toLowerCase();
        const rows = document.querySelectorAll('#bookings-section tbody tr');
        
        rows.forEach(row => {
            const text = row.textContent.toLowerCase();
            row.style.display = text.includes(searchTerm) ? '' : 'none';
        });
    });
}

// Status filter
const statusFilter = document.getElementById('statusFilter');
if (statusFilter) {
    statusFilter.addEventListener('change', function(e) {
        const status = e.target.value.toLowerCase();
        const rows = document.querySelectorAll('#bookings-section tbody tr');
        
        rows.forEach(row => {
            if (!status) {
                row.style.display = '';
            } else {
                const rowStatus = row.querySelector('.badge-status').textContent.toLowerCase();
                row.style.display = rowStatus.includes(status) ? '' : 'none';
            }
        });
    });
}


// showSection helper
function showSection(id){
    document.querySelectorAll('.main-content > div[id$="-section"]').forEach(d=>d.style.display='none');
    var el = document.getElementById(id+'-section');
    if (el) el.style.display='block';
    document.querySelectorAll('.sidebar .nav-link').forEach(a=>a.classList.remove('active'));
    document.querySelectorAll('.sidebar .nav-link').forEach(a=>{ if (a.getAttribute('onclick') && a.getAttribute('onclick').includes(id)) a.classList.add('active'); });
}
showSection('dashboard');

// populate edit admin modal
document.querySelectorAll('.btn-edit-admin').forEach(btn=>{
    btn.addEventListener('click', function(){
        var tr = this.closest('tr');
        document.getElementById('editAdminCode').value = tr.getAttribute('data-adminid') || '';
        document.getElementById('editAdminName').value = tr.getAttribute('data-adminname') || '';
        document.getElementById('editAdminEmail').value = tr.getAttribute('data-adminemail') || '';
        document.getElementById('editAdminStatus').value = tr.getAttribute('data-adminstatus') || 'Active';
        document.getElementById('editAdminPassword').value = '';
    });
});

// populate edit booking modal
document.querySelectorAll('.btn-edit-booking').forEach(btn=>{
    btn.addEventListener('click', function(){
        var tr = this.closest('tr');
        document.getElementById('editTransactionCode').value = tr.getAttribute('data-transaction') || '';
        document.getElementById('editMemberName').value = tr.getAttribute('data-visitor') || '';
        document.getElementById('editMemberEmail').value = tr.getAttribute('data-email') || '';
        document.getElementById('editTicketType').value = tr.getAttribute('data-ticket') || 'Adult';
        document.getElementById('editQuantity').value = tr.getAttribute('data-qty') || 1;
        document.getElementById('editTotal').value = tr.getAttribute('data-total') || 0;
        document.getElementById('editTransactionDate').value = tr.getAttribute('data-date') || '';
        document.getElementById('editPaymentStatus').value = tr.getAttribute('data-status') || 'Pending';
    });
});

// search & filter
document.getElementById('searchBookings')?.addEventListener('input', function(){
    var q = this.value.toLowerCase();
    document.querySelectorAll('#bookingsTable tbody tr').forEach(tr=>{
        var text = tr.innerText.toLowerCase();
        tr.style.display = text.includes(q) ? '' : 'none';
    });
});
document.getElementById('filterStatus')?.addEventListener('change', function(){
    var s = this.value.toLowerCase();
    document.querySelectorAll('#bookingsTable tbody tr').forEach(tr=>{
        var st = (tr.getAttribute('data-status') || '').toLowerCase();
        tr.style.display = (s === '' || st === s) ? '' : 'none';
    });
});
