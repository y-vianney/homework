function showDialog() {
    document.querySelector('#dialog').style.display = 'flex';
}

function closeDialog() {
    document.querySelector('#dialog').style.display = 'none';
}

document.getElementsByClassName('delete')[0].addEventListener('click', (e) => {
    showDialog();
    e.preventDefault();
})

document.getElementsByClassName('btnBack')[0].addEventListener('click', (e) => {
    closeDialog();
    e.preventDefault();
})
document.getElementsByClassName('btnBack')[1].addEventListener('click', (e) => {
    closeDialog();
    e.preventDefault();
})