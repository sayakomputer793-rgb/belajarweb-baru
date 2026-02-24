/**
 * DevPortfolio - Main JavaScript
 */

document.addEventListener('DOMContentLoaded', () => {
    // Initialize Lucide Icons
    if (typeof lucide !== 'undefined') {
        lucide.createIcons();
    }

    // --- Navbar ---
    const navbar = document.getElementById('navbar');
    const navToggle = document.getElementById('nav-toggle');
    const navClose = document.getElementById('nav-close');
    const mobileMenu = document.getElementById('mobile-menu');
    const mobileLinks = document.querySelectorAll('.mobile-link');

    window.addEventListener('scroll', () => {
        if (window.scrollY > 50) {
            navbar.classList.add('py-4', 'bg-dark/90');
            navbar.classList.remove('py-6');
        } else {
            navbar.classList.remove('py-4', 'bg-dark/90');
            navbar.classList.add('py-6');
        }
    });

    const toggleMenu = () => {
        mobileMenu.classList.toggle('translate-x-full');
        document.body.classList.toggle('overflow-hidden');
    };

    if (navToggle) navToggle.addEventListener('click', toggleMenu);
    if (navClose) navClose.addEventListener('click', toggleMenu);
    mobileLinks.forEach(link => link.addEventListener('click', toggleMenu));

    // --- Scroll Reveal ---
    const revealElements = document.querySelectorAll('.reveal, .reveal-left, .reveal-right');

    const revealObserver = new IntersectionObserver((entries) => {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                entry.target.classList.add('revealed');

                // If it has skill bars, animate them
                const skillFills = entry.target.querySelectorAll('.skill-fill');
                if (skillFills.length > 0) {
                    skillFills.forEach(fill => {
                        fill.style.width = fill.dataset.percent;
                    });
                }
            }
        });
    }, { threshold: 0.1 });

    revealElements.forEach(el => revealObserver.observe(el));

    // --- Contact Form ---
    const contactForm = document.getElementById('contact-form');
    const contactAlert = document.getElementById('contact-alert');
    const btnText = document.getElementById('btn-text');
    const btnIcon = document.getElementById('btn-icon');

    if (contactForm) {
        contactForm.addEventListener('submit', async (e) => {
            e.preventDefault();

            // UI State: Loading
            const originalBtnText = btnText.textContent;
            btnText.textContent = 'Sending...';
            contactForm.classList.add('opacity-50', 'pointer-events-none');

            try {
                const formData = new FormData(contactForm);
                const response = await fetch('contact/send', {
                    method: 'POST',
                    body: formData
                });

                const result = await response.json();

                contactAlert.style.display = 'block';
                if (result.success) {
                    contactAlert.className = 'contact-alert alert-success';
                    contactAlert.textContent = result.message || 'Message sent successfully!';
                    contactForm.reset();
                } else {
                    contactAlert.className = 'contact-alert alert-danger';
                    contactAlert.textContent = result.message || 'Something went wrong. Please try again.';
                }
            } catch (error) {
                contactAlert.style.display = 'block';
                contactAlert.className = 'contact-alert alert-danger';
                contactAlert.textContent = 'Network error. Please try again later.';
            } finally {
                btnText.textContent = originalBtnText;
                contactForm.classList.remove('opacity-50', 'pointer-events-none');

                // Auto hide alert after 5 seconds
                setTimeout(() => {
                    contactAlert.style.display = 'none';
                }, 5000);
            }
        });
    }
});
