document.getElementById('user-menu-button').onclick = function () {
    let obj = document.getElementById('user-menu');

    if (obj.style.display !== 'none') {
        obj.style.display = 'none';
        return;
    }

    obj.style.display = '';
};
