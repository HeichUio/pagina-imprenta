const slides = [
    {
        img: "/images/darkrai.png",
        title: "Playeras Personalizadas",
        desc: "Diseños únicos para tu marca."
    },
    {
        img: "/images/legato.png",
        title: "Sudaderas Premium",
        desc: "Comodidad y estilo en cada prenda."
    },
    {
        img: "/images/example.png",
        title: "Tazas Personalizadas",
        desc: "Perfectas para regalo o negocio."
    }
];

let i = 0;

function changeSlide(){
    const bg = document.getElementById("hero-bg");
    const title = document.getElementById("hero-title");
    const desc = document.getElementById("hero-desc");

    if(!bg || !title || !desc) return;

    bg.style.backgroundImage = `url(${slides[i].img})`;

    title.style.opacity = 0;
    desc.style.opacity = 0;

    setTimeout(()=>{
        title.innerText = slides[i].title;
        desc.innerText = slides[i].desc;

        title.style.opacity = 1;
        desc.style.opacity = 1;
    }, 300);

    i = (i + 1) % slides.length;
}

setInterval(changeSlide, 5000);
changeSlide();