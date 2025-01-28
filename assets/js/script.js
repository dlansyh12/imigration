document.addEventListener('DOMContentLoaded', function() {
    const tableCells = document.querySelectorAll('table td');
    const container = document.querySelector('.container');

    tableCells.forEach(cell => {
        cell.addEventListener('mouseover', function() {
            this.classList.add('hovered');
        });

        cell.addEventListener('mouseout', function() {
            this.classList.remove('hovered');
        });
    });

    container.addEventListener('mouseover', function() {
        this.classList.add('hovered');
    });

    container.addEventListener('mouseout', function() {
        this.classList.remove('hovered');
    });
});
