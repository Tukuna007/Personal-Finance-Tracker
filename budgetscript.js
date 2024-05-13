document.addEventListener('DOMContentLoaded', function() {
    document.getElementById('budgetForm').addEventListener('submit', function(event) {
        event.preventDefault(); // Prevent form submission

        const formData = new FormData(this);

        fetch('save_budgets.php', {
            method: 'POST',
            body: formData
        })
        .then(response => response.json())
        .then(data => {
            document.getElementById('message').textContent = data.message;
            this.reset(); // Clear the form
        })
        .catch(error => console.error('Error:', error));
    });
});
