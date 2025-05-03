<?php
$data = json_decode(file_get_contents('data.json'), true);
include('header.php');
?>

<div class="container py-5">
    <h1 class="mb-4">Edit Profile</h1>
    
    <form action="save.php" method="post" enctype="multipart/form-data">
        
        <!-- Profile Section -->
        <div class="card mb-4 shadow">
            <div class="card-header bg-primary text-white">
                <h4><i class="bi bi-person-circle me-2"></i>Basic Information</h4>
            </div>
            <div class="card-body">
                <div class="row g-3">
                    <div class="col-md-6">
                        <label class="form-label">Full Name</label>
                        <input type="text" class="form-control" name="profile[name]" 
                               value="<?= htmlspecialchars($data['profile']['name']) ?>">
                    </div>
                    <div class="col-md-6">
                        <label class="form-label">Professional Title</label>
                        <input type="text" class="form-control" name="profile[title]" 
                               value="<?= htmlspecialchars($data['profile']['title']) ?>">
                    </div>
                    <div class="col-12">
                        <label class="form-label">Bio</label>
                        <textarea class="form-control" name="profile[bio]" rows="4"><?= 
                            htmlspecialchars($data['profile']['bio']) ?></textarea>
                    </div>
                    <div class="col-md-4">
                        <label class="form-label">Profile Image</label>
                        <input type="text" class="form-control" name="profile[profile_img]" 
                               value="<?= htmlspecialchars($data['profile']['profile_img']) ?>">
                    </div>
                    <div class="col-md-4">
                        <label class="form-label">University</label>
                        <input type="text" class="form-control" name="profile[university]" 
                               value="<?= htmlspecialchars($data['profile']['university']) ?>">
                    </div>
                    <div class="col-md-4">
                        <label class="form-label">Location</label>
                        <input type="text" class="form-control" name="profile[location]" 
                               value="<?= htmlspecialchars($data['profile']['location']) ?>">
                    </div>
                </div>
            </div>
        </div>

        <!-- Skills Section -->
        <div class="card mb-4 shadow">
            <div class="card-header bg-primary text-white">
                <h4><i class="bi bi-gear-wide-connected me-2"></i>Skills & Languages</h4>
            </div>
            <div class="card-body">
                <h5>Technical Skills</h5>
                <div id="technical-skills">
                    <?php foreach($data['skills']['technical'] as $index => $skill): ?>
                    <div class="row g-3 mb-3">
                        <div class="col-md-6">
                            <input type="text" class="form-control" 
                                   name="skills[technical][<?= $index ?>][name]" 
                                   value="<?= htmlspecialchars($skill['name']) ?>">
                        </div>
                        <div class="col-md-4">
                            <input type="number" class="form-control" min="0" max="100"
                                   name="skills[technical][<?= $index ?>][progress]" 
                                   value="<?= $skill['progress'] ?>">
                        </div>
                    </div>
                    <?php endforeach; ?>
                </div>

                <h5 class="mt-4">Languages</h5>
                <div id="languages">
                    <?php foreach($data['skills']['languages'] as $index => $lang): ?>
                    <div class="row g-3 mb-3">
                        <div class="col-md-6">
                            <input type="text" class="form-control" 
                                   name="skills[languages][<?= $index ?>][name]" 
                                   value="<?= htmlspecialchars($lang['name']) ?>">
                        </div>
                        <div class="col-md-6">
                            <select class="form-select" 
                                    name="skills[languages][<?= $index ?>][level]">
                                <option value="Native" <?= $lang['level'] === 'Native' ? 'selected' : '' ?>>Native</option>
                                <option value="Advanced" <?= $lang['level'] === 'Advanced' ? 'selected' : '' ?>>Advanced</option>
                                <option value="Fluent" <?= $lang['level'] === 'Fluent' ? 'selected' : '' ?>>Fluent</option>
                            </select>
                        </div>
                    </div>
                    <?php endforeach; ?>
                </div>
            </div>
        </div>

        <!-- Projects Section -->
        <div class="card mb-4 shadow">
            <div class="card-header bg-primary text-white">
                <h4><i class="bi bi-folder me-2"></i>Projects</h4>
            </div>
            <div class="card-body">
                <div id="projects">
                    <?php foreach($data['projects'] as $index => $project): ?>
                    <div class="project-group mb-4 border p-3 rounded">
                        <div class="row g-3">
                            <div class="col-md-6">
                                <label class="form-label">Project Title</label>
                                <input type="text" class="form-control" 
                                       name="projects[<?= $index ?>][title]" 
                                       value="<?= htmlspecialchars($project['title']) ?>">
                            </div>
                            <div class="col-md-6">
                                <label class="form-label">Technologies (comma-separated)</label>
                                <input type="text" class="form-control" 
                                       name="projects[<?= $index ?>][tech]" 
                                       value="<?= implode(',', $project['tech']) ?>">
                            </div>
                            <div class="col-12">
                                <label class="form-label">Description</label>
                                <textarea class="form-control" 
                                          name="projects[<?= $index ?>][description]" 
                                          rows="3"><?= 
                                    htmlspecialchars($project['description']) ?></textarea>
                            </div>
                        </div>
                    </div>
                    <?php endforeach; ?>
                </div>
            </div>
        </div>

        <!-- Social & Contact Section -->
        <div class="card mb-4 shadow">
            <div class="card-header bg-primary text-white">
                <h4><i class="bi bi-link-45deg me-2"></i>Social & Contact</h4>
            </div>
            <div class="card-body">
                <div class="row g-3">
                    <?php foreach($data['social'] as $platform => $url): ?>
                    <div class="col-md-4">
                        <label class="form-label text-capitalize"><?= $platform ?></label>
                        <input type="url" class="form-control" 
                               name="social[<?= $platform ?>]" 
                               value="<?= htmlspecialchars($url) ?>">
                    </div>
                    <?php endforeach; ?>
                </div>
            </div>
        </div>

        <!-- Style Customization -->
        <div class="card mb-4 shadow">
            <div class="card-header bg-primary text-white">
                <h4><i class="bi bi-palette me-2"></i>Color Customization</h4>
            </div>
            <div class="card-body">
                <div class="row g-3">
                    <div class="col-md-4">
                        <label class="form-label">Primary Color</label>
                        <input type="color" class="form-control form-control-color" 
                               name="styles[primary_color]" 
                               value="<?= $data['styles']['primary_color'] ?>">
                    </div>
                    <div class="col-md-4">
                        <label class="form-label">Secondary Color</label>
                        <input type="color" class="form-control form-control-color" 
                               name="styles[secondary_color]" 
                               value="<?= $data['styles']['secondary_color'] ?>">
                    </div>
                    <div class="col-md-4">
                        <label class="form-label">Background Color</label>
                        <input type="color" class="form-control form-control-color" 
                               name="styles[background_color]" 
                               value="<?= $data['styles']['background_color'] ?>">
                    </div>
                    <div class="col-md-6">
                        <label class="form-label">Header Gradient Start</label>
                        <input type="color" class="form-control form-control-color" 
                               name="styles[header_gradient][]" 
                               value="<?= $data['styles']['header_gradient'][0] ?>">
                    </div>
                    <div class="col-md-6">
                        <label class="form-label">Header Gradient End</label>
                        <input type="color" class="form-control form-control-color" 
                               name="styles[header_gradient][]" 
                               value="<?= $data['styles']['header_gradient'][1] ?>">
                    </div>
                </div>
            </div>
        </div>

        <div class="text-center">
            <button type="submit" class="btn btn-primary btn-lg">
                <i class="bi bi-save me-2"></i>Save All Changes
            </button>
        </div>
    </form>
</div>

<?php include('footer.php'); ?>