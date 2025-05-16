const cursorCreation = document.createElement('div');
cursorCreation.classList.add('cursor');
cursorCreation.innerHTML = `
<svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" width="25" height="25" viewBox="0 0 38 38">
  <path d="M22.9007 35.9085L24.4313 37.2981C11.5073 39.3176 -2.54123 28.4335 1.73673 14.6784C3.55463 8.82921 13.4148 1.30258 19.2881 0.439744C23.6728 -0.205658 20.5391 2.83506 22.9204 3.02571L27.5615 2.31464L26.3067 5.61189L29.8736 5.24268L29.9511 7.74259L32.5203 8.57066L26.5391 14.4728C27.8345 15.6997 29.4466 14.3602 30.713 13.6812L30.1984 16.9393L35.2466 14.9358L31.49 19.2825C32.7773 20.7755 33.564 21.4811 33.0672 23.5928C34.1148 23.7216 37.1973 19.8715 37.8386 22.4738C35.0023 23.8111 36.5453 25.7847 36.4145 26.2901C36.3544 26.5174 34.1694 30.2646 33.9812 30.4126C31.3952 32.4876 28.5082 34.294 25.2611 34.6151L27.2262 35.4077C27.0616 37.143 23.3078 34.6161 22.8947 35.9118L22.9007 35.9085Z"/>
</svg>
`;
document.body.appendChild(cursorCreation);

const cursor = document.querySelector('.cursor');
const path = cursor.querySelector('path');
const svg = cursor.querySelector('svg');

document.addEventListener('mousemove', (e) => {
    cursor.style.left = e.clientX + 'px';
    cursor.style.top = e.clientY + 'px';
});

const elements = document.querySelectorAll('.hoverCursor');

function updateSvgStyle(fillColor, width, height) {
    path.style.fill = fillColor;
    svg.style.width = width;
    svg.style.height = height;
}

elements.forEach(element => {
    element.addEventListener('mouseenter', () => {
        updateSvgStyle('#cb321e', '30px', '30px');
    });

    element.addEventListener('mouseleave', () => {
        updateSvgStyle('rgba(203,50,30,0.7)', '20px', '20px');
    });
});
