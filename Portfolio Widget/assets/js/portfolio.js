let articles = document.querySelectorAll('.gray-scale-column')
let horizontal, vertical, mouseSpan;

articles.forEach((article) => {
    // Mouse Move
    article.addEventListener('mousemove', (e) => {
        horizontal = e.offsetX
        vertical = e.offsetY
        mouseSpan = e.target.querySelector('.gray-scale-spout span')

        mouseSpan.style.transform = `translate(${horizontal}px, ${vertical}px)`
        mouseSpan.style.opacity = "1"
    })

    // Mouse Leave
    article.addEventListener('mouseleave', () => {
        mouseSpan = article.querySelector('.gray-scale-spout span')
        mouseSpan.style.opacity = "0"
    })

})