// Function to show toast notification
function showToast(message) {
    const toastContainer = document.getElementById('toastContainer');
    const toast = document.createElement('div');
    toast.className = 'toast';
    toast.textContent = message;
    toastContainer.appendChild(toast);

    setTimeout(function () {
        toast.classList.add('toast-hidden');
        setTimeout(function () {
            toastContainer.removeChild(toast);
        }, 1000);
    }, 3000);
}

// Event listener for form submission
document.getElementById('myForm').addEventListener('submit', function (event) {
    event.preventDefault(); // Prevent form submission

    showToast('Successfully logged in !!!');

});
