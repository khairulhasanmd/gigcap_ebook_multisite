
    // Open Offcanvas Menu
    document.querySelector('.offcanvas-open-btn').addEventListener('click', function () {
        document.body.classList.add('offcanvas-active');
    });

    // Close Offcanvas Menu
    document.querySelector('.offcanvas-close-btn').addEventListener('click', function () {
        document.body.classList.remove('offcanvas-active');
    });

    // Close when clicking on overlay
    document.querySelector('.offcanvas__overlay').addEventListener('click', function () {
        document.body.classList.remove('offcanvas-active');
    });

