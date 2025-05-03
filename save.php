<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Load existing data
    $data = json_decode(file_get_contents('data.json'), true);
    
    // Update profile section
    $data['profile'] = array_map('htmlspecialchars', $_POST['profile']);
    
    // Update skills
    $data['skills'] = [
        'technical' => array_map(function($skill) {
            return [
                'name' => htmlspecialchars($skill['name']),
                'progress' => min(max((int)$skill['progress'], 0), 100)
            ];
        }, $_POST['skills']['technical']),
        'languages' => array_map(function($lang) {
            return [
                'name' => htmlspecialchars($lang['name']),
                'level' => htmlspecialchars($lang['level'])
            ];
        }, $_POST['skills']['languages'])
    ];
    
    // Update projects
    $data['projects'] = array_map(function($project) {
        return [
            'title' => htmlspecialchars($project['title']),
            'description' => htmlspecialchars($project['description']),
            'tech' => array_map('trim', explode(',', $project['tech']))
        ];
    }, $_POST['projects']);
    
    // Update social links
    $data['social'] = array_map('htmlspecialchars', $_POST['social']);
    
    // Update styles
    $data['styles'] = [
        'primary_color' => $_POST['styles']['primary_color'],
        'secondary_color' => $_POST['styles']['secondary_color'],
        'background_color' => $_POST['styles']['background_color'],
        'header_gradient' => $_POST['styles']['header_gradient']
    ];
    
    // Save back to file
    file_put_contents('data.json', json_encode($data, JSON_PRETTY_PRINT));
    header('Location: index.php');
    exit;
}