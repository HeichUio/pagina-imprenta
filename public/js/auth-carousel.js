document.addEventListener("DOMContentLoaded", () => {

    const slides = [
        {
            img: "/images/tmioka.png",
            title: "Playeras Personalizadas",
            desc: "Diseños únicos para tu marca."
        },
        {
            img: "/images/moonn.png",
            title: "Sudaderas Premium",
            desc: "Calidad y estilo en cada prenda."
        },
        {
            img: "/images/legato.png",
            title: "Tazas Personalizadas",
            desc: "El detalle perfecto para cualquier ocasión."
        }
    ];

    let index = 0;

    const bg = document.querySelector(".left");
    const title = document.querySelector(".hero-text h1");
    const desc = document.querySelector(".hero-text p");

    function changeSlide() {
        bg.classList.add("fade");

        setTimeout(() => {
            index = (index + 1) % slides.length;

            bg.style.backgroundImage = `url(${slides[index].img})`;
            title.textContent = slides[index].title;
            desc.textContent = slides[index].desc;

            bg.classList.remove("fade");
        }, 500);
    }

    // inicial
    bg.style.backgroundImage = `url(${slides[0].img})`;

    setInterval(changeSlide, 5000);

});