document.addEventListener('DOMContentLoaded', () => {
    // Custom multi-select dropdown
    const selectBox = document.getElementById('custom-select-box');
    const optionsContainer = document.getElementById('options-container');
    const checkboxes = optionsContainer.querySelectorAll('input[type="checkbox"]');
    const hiddenSelect = document.getElementById('libraries-select');

    if (selectBox) {
        selectBox.addEventListener('click', () => {
            optionsContainer.classList.toggle('active');
        });

        checkboxes.forEach(checkbox => {
            checkbox.addEventListener('change', () => {
                const selectedOptions = [];
                checkboxes.forEach((cb, index) => {
                    hiddenSelect.options[index].selected = cb.checked;
                    if (cb.checked) {
                        selectedOptions.push(cb.parentElement.textContent.trim());
                    }
                });

                const selectBoxText = selectBox.querySelector('span');
                if (selectedOptions.length > 0) {
                    if (selectedOptions.length > 2) {
                        selectBoxText.textContent = `${selectedOptions.length} libraries selected`;
                    } else {
                        selectBoxText.textContent = selectedOptions.join(', ');
                    }
                } else {
                    selectBoxText.textContent = 'Select Libraries...';
                }
            });
        });

        window.addEventListener('click', (e) => {
            if (!selectBox.contains(e.target)) {
                optionsContainer.classList.remove('active');
            }
        });
    }
});