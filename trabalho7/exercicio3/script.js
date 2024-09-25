document.addEventListener('DOMContentLoaded', function() {
    const interestInput = document.getElementById('interest');
    const interestList = document.getElementById('interest-list');

    function createListItem(interestText) {
        const listItem = document.createElement('li');
        listItem.innerHTML = `${interestText} <button class="close-btn">✖</button>`;
        return listItem;
    }

    function addInterest(interestText) {
        const listItem = createListItem(interestText);
        interestList.appendChild(listItem);
        interestInput.value = '';
    }

    interestInput.addEventListener('keypress', function(event) {
        if (event.key === 'Enter') {
            event.preventDefault();
            const interestText = interestInput.value.trim();
            if (interestText !== '') {
                addInterest(interestText);
            }
        }
    });

    interestList.addEventListener('click', function(event) {
        if (event.target.classList.contains('close-btn')) {
            const listItem = event.target.parentElement;
            interestList.removeChild(listItem);
        }
    });
});