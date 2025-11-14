// Mobile menu toggle
const toggleMenu = document.getElementById('toggle-menu');
const navItems = document.getElementById('nav-items');

if (toggleMenu) {
    toggleMenu.addEventListener('click', () => {
        navItems.classList.toggle('active');
    });
}

// Update summary when form changes
const visitDateInput = document.getElementById('visitDate');
const ticketQtyInputs = document.querySelectorAll('.ticket-qty');

// Update date in summary
if (visitDateInput) {
    visitDateInput.addEventListener('change', function() {
        const date = new Date(this.value);
        const options = { year: 'numeric', month: 'long', day: 'numeric' };
        document.getElementById('summaryDate').textContent = date.toLocaleDateString('en-US', options);
    });
}

// // Update time in summary
// if (visitTimeInput) {
//     visitTimeInput.addEventListener('change', function() {
//         const time = this.value;
//         if (time) {
//             const [hours, minutes] = time.split(':');
//             const hour = parseInt(hours);
//             const ampm = hour >= 12 ? 'PM' : 'AM';
//             const displayHour = hour > 12 ? hour - 12 : (hour === 0 ? 12 : hour);
//             document.getElementById('summaryTime').textContent = `${displayHour}:${minutes} ${ampm}`;
//         }
//     });
// }

// Update tickets and total price
function updateSummary() {
    let total = 0;
    let ticketsHtml = '';
    let hasTickets = false;

    ticketQtyInputs.forEach(input => {
        const qty = parseInt(input.value) || 0;
        const price = parseInt(input.dataset.price);
        const type = input.dataset.type;

        if (qty > 0) {
            hasTickets = true;
            const subtotal = qty * price;
            total += subtotal;
            ticketsHtml += `
                <div class="summary-row">
                    <span>${type} (${qty}×):</span>
                    <strong>Rp ${subtotal.toLocaleString('id-ID')}</strong>
                </div>
            `;
        }
    });

    // Update tickets summary
    const ticketsSummaryDiv = document.getElementById('ticketsSummary');
    if (hasTickets) {
        ticketsSummaryDiv.innerHTML = ticketsHtml;
    } else {
        ticketsSummaryDiv.innerHTML = `
            <div class="summary-row">
                <span>Tickets:</span>
                <strong>Not selected</strong>
            </div>
        `;
    }

    // Update total
    document.getElementById('totalPrice').textContent = `Rp ${total.toLocaleString('id-ID')}`;
}

// Add event listeners to all ticket quantity inputs
ticketQtyInputs.forEach(input => {
    input.addEventListener('input', updateSummary);
});

// Form validation
const bookingForm = document.getElementById('bookingForm');
if (bookingForm) {
    bookingForm.addEventListener('submit', function(e) {
        // Check if at least one ticket is selected
        let totalTickets = 0;
        ticketQtyInputs.forEach(input => {
            totalTickets += parseInt(input.value) || 0;
        });

        if (totalTickets === 0) {
            e.preventDefault();
            alert('Please select at least one ticket!');
            return false;
        }

        // Check if date is selected
        if (!visitDateInput.value) {
            e.preventDefault();
            alert('Please select a visit date!');
            return false;
        }

        // // Check if time is selected
        // if (!visitTimeInput.value) {
        //     e.preventDefault();
        //     alert('Please select a time slot!');
        //     return false;
        // }

        // Check if date is not in the past
        const selectedDate = new Date(visitDateInput.value);
        const today = new Date();
        today.setHours(0, 0, 0, 0);
        
        if (selectedDate < today) {
            e.preventDefault();
            alert('Please select a future date!');
            return false;
        }

        // Check if date is not Monday
        if (selectedDate.getDay() === 1) {
            e.preventDefault();
            alert('Museum is closed on Mondays. Please select another date.');
            return false;
        }

        return true;
    });
}

// Prevent selecting past dates
if (visitDateInput) {
    const today = new Date();
    const tomorrow = new Date(today);
    tomorrow.setDate(tomorrow.getDate() + 1);
    const minDate = tomorrow.toISOString().split('T')[0];
    visitDateInput.setAttribute('min', minDate);
}

// Show error messages if any
window.addEventListener('DOMContentLoaded', function() {
    const urlParams = new URLSearchParams(window.location.search);
    const error = urlParams.get('error');
    
    if (error === 'no_tickets') {
        alert('Please select at least one ticket!');
    } else if (error === 'booking_failed') {
        alert('Booking failed. Please try again or contact support.');
    }
});