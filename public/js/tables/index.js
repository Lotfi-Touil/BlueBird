function truncateMessage(element, ogMessage, maxLength) {
    if (element.textContent.length > maxLength) {
        element.textContent = element.textContent.substring(0, maxLength) + '...';
    } else {
        element.textContent = ogMessage.textContent.substring(0, maxLength) + '...';
    }
}

function handleResize(truncatedMessages, ogMessages) {
    const maxWidth = window.innerWidth <= 1180 ? 30 : 48;

    truncatedMessages.forEach((truncatedMessage, key) => {
        truncateMessage(truncatedMessage, ogMessages[key], maxWidth);
    });
}

window.addEventListener('DOMContentLoaded', () => {
    const truncatedMessages = document.querySelectorAll('.truncated-message');
    const ogMessages = document.querySelectorAll('.truncated-message-og');
    handleResize(truncatedMessages, ogMessages);
});

window.addEventListener('resize', () => {
    const truncatedMessages = document.querySelectorAll('.truncated-message');
    const ogMessages = document.querySelectorAll('.truncated-message-og');
    handleResize(truncatedMessages, ogMessages);
});