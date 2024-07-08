import "./bootstrap";
import "~resources/scss/app.scss";
import.meta.glob(["../img/**"]);
import * as bootstrap from "bootstrap";




document.addEventListener('DOMContentLoaded', function() {
    const descriptionField = document.querySelector('textarea[name="description"]');
    const counter = document.createElement('div');
    counter.classList.add('text-muted');
    counter.style.textAlign = 'right';
    counter.textContent = '0/1000';
    descriptionField.parentNode.appendChild(counter);

    descriptionField.addEventListener('input', function() {
        const length = descriptionField.value.length;
        counter.textContent = `${length}/1000`;
    });
});