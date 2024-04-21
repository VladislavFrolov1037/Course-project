let forms = document.querySelectorAll('.custom-form');

forms.forEach((form) => {
    form.addEventListener('submit', (event) => {
        let actionValue = event.target.querySelector('.sendForm').getAttribute('data-action');

        let actionUrl = event.target.getAttribute('action');
        if (actionUrl) {
            if (actionUrl.includes('?')) {
                actionUrl += `&action=${actionValue}`;
            } else {
                actionUrl += `?action=${actionValue}`;
            }
            event.target.setAttribute('action', actionUrl);
        }

        let sendFormBtn = event.target.querySelector('.sendForm');
        if (sendFormBtn) {
            sendFormBtn.disabled = true;
        }
    });
});
