(function () {
    const flashesElement = document.getElementById('backend-flash-messages');

    if (!flashesElement || typeof toastr === 'undefined') {
        return;
    }

    let flashes = {};

    try {
        flashes = JSON.parse(flashesElement.textContent || '{}');
    } catch (error) {
        console.error('Unable to parse flash messages:', error);
        return;
    }

    const hasMessage = Object.values(flashes).some(Boolean);

    if (!hasMessage) {
        return;
    }

    toastr.options = {
        closeButton: true,
        progressBar: true
    };

    if (flashes.success) {
        toastr.success(flashes.success);
    }

    if (flashes.error) {
        toastr.error(flashes.error);
    }

    if (flashes.info) {
        toastr.info(flashes.info);
    }

    if (flashes.warning) {
        toastr.warning(flashes.warning);
    }
})();
