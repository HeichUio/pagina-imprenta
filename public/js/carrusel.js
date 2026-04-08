let index = 1;
const total = 8;

setInterval(() => {
    index++;
    if (index > total) index = 1;

    const radio = document.getElementById("img" + index);
    if (radio) {
        radio.checked = true;
    }
}, 5000); 