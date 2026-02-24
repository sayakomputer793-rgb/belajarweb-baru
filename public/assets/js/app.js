/**
 * DevPortfolio — Main JavaScript
 */
document.addEventListener('DOMContentLoaded', () => {
    initNavbar();
    initTypingEffect();
    initScrollReveal();
    initSkillBars();
    initProjectFilter();
    initProjectModal();
    initContactForm();
    initScrollTop();
});

/* ---------- Navbar ---------- */
function initNavbar() {
    const nav = document.getElementById('mainNav');
    if (!nav) return;

    window.addEventListener('scroll', () => {
        if (window.scrollY > 50) {
            nav.classList.add('py-2', 'shadow-xl');
            nav.style.background = 'rgba(10, 10, 26, 0.9)';
        } else {
            nav.classList.remove('py-2', 'shadow-xl');
            nav.style.background = 'rgba(255, 255, 255, 0.03)';
        }
    });

    // Active link highlight
    const sections = document.querySelectorAll('section[id]');
    window.addEventListener('scroll', () => {
        let current = '';
        sections.forEach(section => {
            const sectionTop = section.offsetTop;
            if (pageYOffset >= sectionTop - 150) {
                current = section.getAttribute('id');
            }
        });

        document.querySelectorAll('.nav-link').forEach(link => {
            link.classList.remove('text-white', 'fw-bold');
            if (link.getAttribute('href').includes('#' + current)) {
                link.classList.add('text-white', 'fw-bold');
            }
        });
    });
}

/* ---------- Typing Effect ---------- */
function initTypingEffect() {
    const el = document.querySelector('.typing-text');
    if (!el) return;

    const words = el.getAttribute('data-words').split(',');
    let wordIndex = 0;
    let charIndex = 0;
    let isDeleting = false;
    let typeSpeed = 100;

    function type() {
        const currentWord = words[wordIndex % words.length];
        const fullText = currentWord;

        if (isDeleting) {
            el.textContent = fullText.substring(0, charIndex - 1);
            charIndex--;
            typeSpeed = 50;
        } else {
            el.textContent = fullText.substring(0, charIndex + 1);
            charIndex++;
            typeSpeed = 100;
        }

        if (!isDeleting && charIndex === fullText.length) {
            isDeleting = true;
            typeSpeed = 2000;
        } else if (isDeleting && charIndex === 0) {
            isDeleting = false;
            wordIndex++;
            typeSpeed = 500;
        }

        setTimeout(type, typeSpeed);
    }

    type();
}

/* ---------- Scroll Reveal ---------- */
function initScrollReveal() {
    const reveals = document.querySelectorAll('.reveal, .reveal-left, .reveal-right');

    const revealObserver = new IntersectionObserver((entries) => {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                entry.target.classList.add('revealed');
                // Also trigger stagger children if parent is revealed
                if (entry.target.classList.contains('stagger-children')) {
                    entry.target.classList.add('revealed');
                }
            }
        });
    }, { threshold: 0.1, rootMargin: '0px 0px -50px 0px' });

    reveals.forEach(el => revealObserver.observe(el));
}

/* ---------- Skill Bars ---------- */
function initSkillBars() {
    const skillFills = document.querySelectorAll('.skill-fill');

    const skillObserver = new IntersectionObserver((entries) => {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                const percent = entry.target.getAttribute('data-percent');
                entry.target.style.width = percent + '%';
            }
        });
    }, { threshold: 0.5 });

    skillFills.forEach(fill => skillObserver.observe(fill));
}

/* ---------- Project Filter ---------- */
function initProjectFilter() {
    const filterButtons = document.querySelectorAll('[data-filter]');
    const items = document.querySelectorAll('.portfolio-item');

    filterButtons.forEach(btn => {
        btn.addEventListener('click', () => {
            // Active state
            filterButtons.forEach(b => b.classList.remove('active', 'bg-indigo-600', 'text-white'));
            btn.classList.add('active', 'bg-indigo-600', 'text-white');

            const filterValue = btn.getAttribute('data-filter');

            items.forEach(item => {
                if (filterValue === '*' || item.classList.contains(filterValue.substring(1))) {
                    item.style.display = 'block';
                    setTimeout(() => item.style.opacity = '1', 10);
                } else {
                    item.style.opacity = '0';
                    setTimeout(() => item.style.display = 'none', 300);
                }
            });
        });
    });
}

/* ---------- Project Modal ---------- */
function initProjectModal() {
    const modal = document.getElementById('projectModal');
    const closeBtn = document.getElementById('closeModal');
    const projectLinks = document.querySelectorAll('a[href*="/projects/"]');

    if (!modal) return;

    projectLinks.forEach(link => {
        // Only hijack links that aren't external or already handled
        if (link.getAttribute('target') === '_blank') return;

        link.addEventListener('click', async (e) => {
            e.preventDefault();
            const href = link.getAttribute('href');
            const slug = href.split('/').pop();

            modal.classList.add('active');
            document.body.style.overflow = 'hidden';

            try {
                const response = await fetch(`${window.location.origin}/belajarweb.baru/public/api/projects/${slug}`);
                const data = await response.json();

                if (data) {
                    renderModalContent(data);
                }
            } catch (error) {
                console.error('Fetch error:', error);
                document.getElementById('modalContent').innerHTML = '<div class="p-10 text-center text-danger">Failed to load project details.</div>';
            }
        });
    });

    const closeModal = () => {
        modal.classList.remove('active');
        document.body.style.overflow = '';
    };

    closeBtn?.addEventListener('click', closeModal);
    modal.addEventListener('click', (e) => {
        if (e.target === modal) closeModal();
    });
}

function renderModalContent(project) {
    const content = document.getElementById('modalContent');
    const techs = project.tech_stack.split(',').map(t =>
        `<span class="px-3 py-1 bg-white/5 rounded-full text-indigo-400 small border border-white/10">${t.trim()}</span>`
    ).join('');

    content.innerHTML = `
        <div class="row g-0">
            <div class="col-lg-12">
                <img src="/belajarweb.baru/public/assets/images/${project.screenshot || 'project-placeholder.jpg'}" class="w-100 object-cover" style="max-height: 400px;">
            </div>
            <div class="col-lg-12">
                <div class="p-8">
                    <span class="text-indigo-400 fw-bold small uppercase tracking-tighter mb-2 d-block">${project.category_name}</span>
                    <h2 class="text-white fw-bold mb-4 display-6">${project.title}</h2>
                    <p class="text-slate-400 fs-5 mb-6 leading-relaxed">${project.description}</p>
                    
                    <div class="d-flex flex-wrap gap-2 mb-8">
                        ${techs}
                    </div>
                    
                    <div class="d-flex gap-3">
                        ${project.demo_url ? `<a href="${project.demo_url}" target="_blank" class="btn btn-primary px-6 py-2 rounded-xl glass-hover">Live Demo <i class="fas fa-external-link-alt ms-2"></i></a>` : ''}
                        ${project.github_url ? `<a href="${project.github_url}" target="_blank" class="btn btn-outline-light border-white/10 px-6 py-2 rounded-xl glass-hover"><i class="fab fa-github me-2"></i> GitHub</a>` : ''}
                    </div>
                </div>
            </div>
        </div>
    `;
}

/* ---------- Contact Form ---------- */
function initContactForm() {
    const form = document.getElementById('contactForm');
    if (!form) return;

    form.addEventListener('submit', async (e) => {
        e.preventDefault();
        const alert = form.querySelector('.id-contact-alert');
        const submitBtn = form.querySelector('button[type="submit"]');
        const originalBtnText = submitBtn.innerHTML;

        submitBtn.disabled = true;
        submitBtn.innerHTML = '<span class="spinner-border spinner-border-sm me-2"></span> Sending...';

        try {
            const formData = new FormData(form);
            const response = await fetch('/belajarweb.baru/public/contact/send', {
                method: 'POST',
                body: formData
            });

            const result = await response.json();

            alert.style.display = 'block';
            if (result.success) {
                alert.className = 'contact-alert alert-success mt-3';
                alert.innerHTML = `<i class="fas fa-check-circle me-2"></i> ${result.message}`;
                form.reset();
            } else {
                alert.className = 'contact-alert alert-danger mt-3';
                alert.innerHTML = `<i class="fas fa-exclamation-circle me-2"></i> ${result.message}`;
            }
        } catch (error) {
            alert.style.display = 'block';
            alert.className = 'contact-alert alert-danger mt-3';
            alert.innerHTML = '<i class="fas fa-exclamation-circle me-2"></i> Something went wrong. Please try again later.';
        } finally {
            submitBtn.disabled = false;
            submitBtn.innerHTML = originalBtnText;
        }
    });
}

/* ---------- Scroll Top ---------- */
function initScrollTop() {
    const btn = document.getElementById('scrollTop');
    if (!btn) return;

    window.addEventListener('scroll', () => {
        if (window.scrollY > 500) {
            btn.classList.remove('opacity-0', 'invisible');
            btn.classList.add('opacity-100', 'visible');
        } else {
            btn.classList.add('opacity-0', 'invisible');
            btn.classList.remove('opacity-100', 'visible');
        }
    });

    btn.addEventListener('click', () => {
        window.scrollTo({ top: 0, behavior: 'smooth' });
    });
}
