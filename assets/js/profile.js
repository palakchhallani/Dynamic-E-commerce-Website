
    document.querySelectorAll('.opt ul li').forEach(item => {
        item.addEventListener('click', function () {
            // Get the corresponding section ID
            const sectionId = 'content-' + this.id;

            // Hide all sections
            document.querySelectorAll('.details .content').forEach(content => {
                content.classList.remove('active'); // Remove 'active' class
                content.style.display = 'none'; // Hide the section
            });

            // Show the selected section
            const activeSection = document.getElementById(sectionId);
            if (activeSection) {
                activeSection.classList.add('active'); // Add 'active' class
                activeSection.style.display = 'block'; // Show the section
            }
        });
    });