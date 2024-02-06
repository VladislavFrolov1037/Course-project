let resetBtn = document.getElementById('reset');
let form = document.querySelector('.filterForm');

resetBtn.addEventListener('click', () => {
    history.replaceState({}, document.title, window.location.pathname);
    location.reload();
});
