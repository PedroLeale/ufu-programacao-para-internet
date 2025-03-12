document.addEventListener('DOMContentLoaded', function() {
    const headings = document.querySelectorAll('h2');
    
    headings.forEach(heading => {
        heading.addEventListener('dblclick', function() {
            const section = this.parentElement;
            
            Array.from(section.children).forEach(child => {
                if (child !== this) {
                    child.style.display = child.style.display === 'none' ? '' : 'none';
                }
            });
        });
    });
});