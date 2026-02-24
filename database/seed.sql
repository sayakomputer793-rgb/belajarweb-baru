-- ==============================================
-- Dummy / Seed Data
-- ==============================================

USE portfolio_db;

-- Admin User (password: admin123)
INSERT INTO users (username, email, password, full_name, role) VALUES
('admin', 'admin@devportfolio.com', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'Dio Developer', 'admin');

-- Categories
INSERT INTO categories (name, slug) VALUES
('Web Development', 'web'),
('Mobile App', 'mobile'),
('Artificial Intelligence', 'ai'),
('UI/UX Design', 'design'),
('DevOps', 'devops');

-- Projects
INSERT INTO projects (title, slug, description, short_desc, category_id, tech_stack, demo_url, github_url, featured, status) VALUES
('E-Commerce Platform', 'e-commerce-platform',
 'Platform e-commerce full-stack dengan fitur keranjang belanja, pembayaran online, manajemen inventori, dan dashboard admin. Dibangun menggunakan arsitektur microservice untuk skalabilitas tinggi.',
 'Full-stack e-commerce platform dengan payment gateway integration',
 1, 'Laravel,Vue.js,MySQL,Redis,Stripe', 'https://demo.example.com', 'https://github.com/example/ecommerce', 1, 'published'),

('AI Chatbot Assistant', 'ai-chatbot-assistant',
 'Chatbot cerdas berbasis NLP yang dapat memahami konteks percakapan, menjawab pertanyaan, dan memberikan rekomendasi. Menggunakan model transformer dan fine-tuning untuk domain spesifik.',
 'Intelligent chatbot menggunakan NLP dan deep learning',
 3, 'Python,TensorFlow,FastAPI,React,Docker', 'https://demo.example.com', 'https://github.com/example/chatbot', 1, 'published'),

('Task Management App', 'task-management-app',
 'Aplikasi manajemen tugas mobile cross-platform dengan fitur real-time collaboration, kanban board, time tracking, dan notifikasi push. Sync otomatis antar perangkat.',
 'Cross-platform task manager dengan real-time sync',
 2, 'Flutter,Dart,Firebase,Node.js', 'https://demo.example.com', 'https://github.com/example/taskapp', 1, 'published'),

('Portfolio Dashboard UI', 'portfolio-dashboard-ui',
 'Desain UI/UX modern untuk dashboard analytics dengan data visualization yang interaktif. Menggunakan prinsip design system dan accessibility best practices.',
 'Modern analytics dashboard dengan interactive charts',
 4, 'Figma,React,D3.js,TailwindCSS', 'https://demo.example.com', 'https://github.com/example/dashboard', 0, 'published'),

('CI/CD Pipeline Automation', 'cicd-pipeline-automation',
 'Sistem otomasi deployment end-to-end dengan infrastructure as code. Mendukung multi-environment deployment, automated testing, dan monitoring terintegrasi.',
 'Automated deployment pipeline dengan IaC',
 5, 'Docker,Kubernetes,Jenkins,Terraform,AWS', 'https://demo.example.com', 'https://github.com/example/cicd', 0, 'published'),

('Machine Learning Dashboard', 'ml-dashboard',
 'Dashboard interaktif untuk monitoring dan visualisasi model machine learning. Fitur experiment tracking, model comparison, dan real-time prediction monitoring.',
 'ML model monitoring dan experiment tracking platform',
 3, 'Python,Streamlit,PostgreSQL,Scikit-learn,Plotly', 'https://demo.example.com', 'https://github.com/example/mldash', 1, 'published');

-- Blog Posts
INSERT INTO blogs (user_id, title, slug, content, excerpt, status) VALUES
(1, 'Memulai Karir sebagai Full-Stack Developer di 2024',
 'memulai-karir-fullstack-developer-2024',
 '<h2>Roadmap Full-Stack Developer</h2>
<p>Menjadi full-stack developer di era modern membutuhkan pemahaman yang luas tentang berbagai teknologi. Artikel ini akan membahas roadmap lengkap yang bisa kamu ikuti untuk memulai karir sebagai full-stack developer.</p>

<h3>1. Fondasi Web</h3>
<p>Mulai dengan HTML5, CSS3, dan JavaScript modern (ES6+). Pahami DOM manipulation, responsive design, dan CSS frameworks seperti Bootstrap atau Tailwind CSS. Ini adalah fondasi yang tidak bisa dilewati.</p>

<h3>2. Frontend Framework</h3>
<p>Pilih salah satu: React, Vue.js, atau Angular. React saat ini paling populer di industri, namun Vue.js lebih mudah dipelajari untuk pemula. Pelajari state management, routing, dan component architecture.</p>

<h3>3. Backend Development</h3>
<p>PHP dengan Laravel, Node.js dengan Express, atau Python dengan Django/FastAPI. Pahami RESTful API design, authentication, dan database management. Gunakan ORM untuk interaksi database yang aman.</p>

<h3>4. Database & DevOps</h3>
<p>Kuasai minimal satu SQL (MySQL/PostgreSQL) dan satu NoSQL (MongoDB). Pelajari dasar Docker, CI/CD, dan cloud deployment (AWS/GCP/Azure).</p>

<p>Yang terpenting adalah konsistensi belajar dan membangun proyek nyata. Portfolio yang kuat lebih berharga dari sertifikat apapun.</p>',
 'Panduan lengkap roadmap menjadi full-stack developer di era modern dengan tips praktis dan resource terbaik.',
 'published'),

(1, 'Clean Architecture dalam PHP: Panduan Praktis',
 'clean-architecture-php-panduan-praktis',
 '<h2>Apa itu Clean Architecture?</h2>
<p>Clean Architecture adalah pendekatan desain software yang memisahkan concerns dan membuat kode lebih maintainable, testable, dan scalable. Prinsip utamanya: dependency harus selalu mengarah ke dalam (inner layers).</p>

<h3>Struktur Layer</h3>
<p><strong>Entities:</strong> Business objects dan rules yang paling inti. Tidak bergantung pada framework atau database apapun.</p>
<p><strong>Use Cases:</strong> Application-specific business rules. Mengorkestrasikan aliran data dari dan ke entities.</p>
<p><strong>Interface Adapters:</strong> Converts data antara use cases dan external agencies (controllers, presenters, gateways).</p>
<p><strong>Frameworks & Drivers:</strong> Layer terluar — database, web framework, UI. Ini adalah detail yang bisa diganti.</p>

<h3>Implementasi di PHP</h3>
<p>Dalam PHP, kita bisa menerapkan clean architecture dengan memisahkan kode ke dalam namespace yang jelas. Gunakan interfaces untuk dependency inversion dan dependency injection container untuk wiring.</p>

<p>Dengan clean architecture, perubahan pada satu layer tidak akan mempengaruhi layer lainnya. Ini membuat kode kita lebih robust dan mudah di-test.</p>',
 'Memahami dan mengimplementasikan clean architecture dalam proyek PHP untuk kode yang lebih bersih dan maintainable.',
 'published'),

(1, 'Docker untuk Developer: Dari Nol sampai Production',
 'docker-untuk-developer-dari-nol',
 '<h2>Kenapa Docker?</h2>
<p>Docker menyelesaikan masalah klasik "works on my machine". Dengan containerization, kita bisa memastikan aplikasi berjalan identik di semua environment — development, staging, dan production.</p>

<h3>Konsep Dasar</h3>
<p><strong>Image:</strong> Blueprint read-only yang berisi OS, runtime, dan aplikasi kita.</p>
<p><strong>Container:</strong> Instance yang berjalan dari sebuah image. Isolated, lightweight, dan disposable.</p>
<p><strong>Dockerfile:</strong> Script untuk membangun custom image.</p>
<p><strong>Docker Compose:</strong> Tool untuk mendefinisikan dan menjalankan multi-container applications.</p>

<h3>Best Practices</h3>
<p>Gunakan multi-stage builds untuk mengoptimalkan ukuran image. Jangan jalankan container sebagai root. Gunakan .dockerignore untuk mengecualikan file yang tidak perlu. Selalu pin version pada base image.</p>

<p>Docker adalah skill essential bagi developer modern. Investasi waktu untuk mempelajarinya akan membuahkan hasil yang besar dalam produktivitas dan deployment workflow.</p>',
 'Panduan komprehensif Docker untuk developer, dari konsep dasar hingga deployment production-ready.',
 'published');

-- Settings
INSERT INTO settings (setting_key, setting_value) VALUES
('site_name', 'DevPortfolio'),
('site_tagline', 'Full-Stack Developer & Tech Enthusiast'),
('hero_name', 'Dio Developer'),
('hero_title', 'Full-Stack Developer'),
('hero_subtitle', 'Membangun solusi digital yang elegan dan scalable'),
('about_text', 'Saya adalah seorang full-stack developer dengan passion di bidang web development, artificial intelligence, dan cloud computing. Dengan pengalaman lebih dari 3 tahun, saya telah membangun berbagai aplikasi dari konsep hingga production. Saya percaya bahwa teknologi harus membuat hidup lebih baik, dan saya berkomitmen untuk terus belajar dan berkontribusi di komunitas tech.'),
('about_experience', '3+'),
('about_projects_completed', '25+'),
('about_clients', '15+'),
('github_url', 'https://github.com'),
('linkedin_url', 'https://linkedin.com'),
('twitter_url', 'https://twitter.com'),
('email', 'hello@devportfolio.com'),
('skills', 'PHP:90,JavaScript:85,Python:80,Laravel:88,React:82,Vue.js:85,MySQL:87,Docker:75,Git:90,Node.js:78,CSS/SASS:88,AWS:70');
