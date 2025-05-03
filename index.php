<?php
$data = json_decode(file_get_contents('data.json'), true);
$profile = $data['profile'];
$skills = $data['skills'];
$projects = $data['projects'];
$social = $data['social'];

include('header.php');
?>

<!-- Header -->
<header class="profile-header text-center">
    <div class="container pt-5">
<img src="<?= $profile['profile_img'] ?>" alt="Profile Photo" class="profile-img rounded-circle mb-3" style="width: 250px; height: 250px; object-fit: cover;">


        <h1><?= $profile['name'] ?></h1>
        <h3><?= $profile['title'] ?></h3>
    <div ></div>
    </div>
</header>

<!-- About Section -->
<section id="about" class="py-5">
    <div class="container">
        <h2 class="section-title mb-4">About Me</h2>
        <div class="row">
            <div class="col-lg-8">
                <p class="lead"><?= $profile['bio'] ?></p>
            </div>
            <div class="col-lg-4">
                <div class="bg-white p-4 rounded shadow">
                    <h5><i class="bi bi-info-circle me-2"></i>Quick Info</h5>
                    <ul class="list-unstyled">
                        <li><i class="bi bi-mortarboard me-2"></i><?= $profile['university'] ?></li>
                        <li><i class="bi bi-geo-alt me-2"></i><?= $profile['location'] ?></li>
                        <li><i class="bi bi-envelope me-2"></i><?= $profile['email'] ?></li>
                        <li><i class="bi bi-phone me-2"></i><?= $profile['phone'] ?></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Skills Section -->
<section id="skills" class="bg-light py-5">
    <div class="container">
        <h2 class="section-title mb-4">Technical Skills</h2>
        <div class="row g-4 justify-content-center">
            <!-- Technical Skills Card -->
            <div class="col-md-6 col-lg-4">
                <div class="skill-card bg-white p-4 rounded shadow">
                    <h4><i class="bi bi-code-square me-2"></i>Technical Proficiencies</h4>
                    <?php foreach ($skills['technical'] as $skill): ?>
                        <div class="progress mt-3">
                            <div class="progress-bar custom-progress" style="width: <?= $skill['progress'] ?>%"></div>
                        </div>
                        <div class="mt-2"><?= $skill['name'] ?></div>
                    <?php endforeach; ?>
                </div>
            </div>

            <!-- Languages Card -->
            <div class="col-md-6 col-lg-4">
                <div class="skill-card bg-white p-4 rounded shadow">
                    <h4><i class="bi bi-globe me-2"></i>Languages</h4>
                    <?php foreach ($skills['languages'] as $lang): ?>
                        <h5 class="mt-3">
                            <i class="bi bi-translate me-2"></i>
                            <?= $lang['name'] ?> 
                            <span class="badge bg-primary"><?= $lang['level'] ?></span>
                        </h5>
                    <?php endforeach; ?>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Projects Section -->
<section id="projects" class="py-5">
    <div class="container">
        <h2 class="section-title mb-4">Featured Projects</h2>
        <div class="row g-4 justify-content-center">
            <?php foreach ($projects as $project): ?>
                <div class="col-md-6 col-lg-4">
                    <div class="card h-100 shadow">
                        <div class="card-body">
                            <h5 class="card-title"><?= $project['title'] ?></h5>
                            <p class="card-text"><?= $project['description'] ?></p>
                            <div class="tech-icons mt-3">
                                <div class="d-flex gap-3 justify-content-center">
                                    <?php foreach ($project['tech'] as $tech): ?>
                                        <img src="https://cdn.jsdelivr.net/gh/devicons/devicon/icons/<?= $tech ?>/<?= $tech ?>-original.svg" 
                                             alt="<?= ucfirst($tech) ?>" style="height: 40px">
                                    <?php endforeach; ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>

<!-- Contact Section -->
<section id="contact" class="bg-light py-5">
    <div class="container">
        <h2 class="section-title mb-4">Get in Touch</h2>
        <div class="row g-4">
           
    <!-- Contact Section -->
    <section id="contact" class="bg-light py-5">
        <div class="container">
            <h2 class="section-title mb-4">Get in Touch</h2>
            <div class="row g-4">
                <div class="col-md-6">
                    <form>
                        <div class="mb-3">
                            <input type="text" class="form-control" placeholder="Your Name">
                        </div>
                        <div class="mb-3">
                            <input type="email" class="form-control" placeholder="Your Email">
                        </div>
                        <div class="mb-3">
                            <textarea class="form-control" rows="4" placeholder="Your Message"></textarea>
                        </div>
                        <button type="submit" class="btn btn-primary">Send Message</button>
                        <a href="https://wa.me/9647509208992" class="btn whatsapp-btn ms-2" target="_blank">
                            <i class="bi bi-whatsapp"></i> WhatsApp
                        </a>
                    </form>
                </div>
                <div class="col-md-6">
                    <div class="bg-white p-4 rounded shadow">
                        <h4><i class="bi bi-geo-alt me-2"></i>Location</h4>
                        <p class="mb-4">Ranya, Sulaymaniyah</p>
                        <h4><i class="bi bi-envelope me-2"></i>Email</h4>
                        <p class="mb-4">abdul001.gmcd@gmail.com</p>
                        <h4><i class="bi bi-phone me-2"></i>Phone</h4>
                        <p class="mb-4">009647509208992</p>
                        <div class="social-links">
                            <a href="https://www.snapchat.com/add/abdul_92089" class="btn btn-outline-dark me-2" target="_blank">
                                <i class="bi bi-snapchat"></i>
                            </a>
                            <a href="https://www.instagram.com/abdulrahmann_001" class="btn btn-outline-danger me-2" target="_blank">
                                <i class="bi bi-instagram"></i>
                            </a>
                            <a href="https://www.facebook.com/muhamad.eyhgfsuuhg" class="btn btn-outline-primary me-2" target="_blank">
                                <i class="bi bi-facebook"></i>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
        </div>
    </div>
</section>

<?php include('footer.php'); ?>