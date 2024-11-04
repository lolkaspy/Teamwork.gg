//#region меняющийся текст на главной странице
const words = ["завтра!", "вчера!", "послезавтра!", "через год!", "год назад!"];
const backgrounds = [
    'it.jpg',
    'project.jpg',
    'sport.jpg',
    'cybersport.jpg',
    'science.jpg'
];

const dynamicText = document.getElementById('dynamic-text');
const dynamicContent = document.getElementById("dynamic-bg");
if (dynamicText && dynamicContent){
let index = 0;
let interval;
let timeout = 425;
dynamicText.addEventListener('mouseenter', () => {
    index = 0;
    interval = setInterval(() => {
        dynamicText.textContent = words[index];
        dynamicContent.style.backgroundImage = "url('static/images/" + backgrounds[index] + "')";
        dynamicContent.style.color = "white";
        index = (index + 1) % words.length; // Циклический переход по массиву
    }, timeout);
});

dynamicText.addEventListener('mouseleave', () => {
    clearInterval(interval);
    dynamicText.textContent = "всегда!";
    dynamicContent.style.backgroundImage = "";
    dynamicContent.style.color = "black";
});
}
//#endregion

//-------------------------//

//#region fadein анимация
document.addEventListener('DOMContentLoaded', function() {
    const scrollElements = document.querySelectorAll('.fade-in');
    const elementInView = (el, dividend = 1) => {
        const elementTop = el.getBoundingClientRect().top;
        return (
            elementTop <= (window.innerHeight || document.documentElement.clientHeight) / dividend
        );
    };
    const displayScrollElement = (element) => {
        element.classList.add('visible');
    };
    const hideScrollElement = (element) => {
        element.classList.remove('visible');
    };
    const handleScrollAnimation = () => {
        scrollElements.forEach((el) => {
            if (elementInView(el, 1.25)) {
                displayScrollElement(el);
            } else {
                hideScrollElement(el);
            }
        });
    };
    window.addEventListener('scroll', () => {
        handleScrollAnimation();
    });
    // Инициализация, чтобы проверить элементы при загрузке
    handleScrollAnimation();
});
//#endregion
