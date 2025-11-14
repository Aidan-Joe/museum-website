
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
// showSection helper
function showSection(id){
    document.querySelectorAll('.main-content > div[id$="-section"]').forEach(d=>d.style.display='none');
    var el = document.getElementById(id+'-section');
    if (el) el.style.display='block';
    document.querySelectorAll('.sidebar .nav-link').forEach(a=>a.classList.remove('active'));
    document.querySelectorAll('.sidebar .nav-link').forEach(a=>{ if (a.getAttribute('onclick') && a.getAttribute('onclick').includes(id)) a.classList.add('active'); });
}
showSection('dashboard');
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
