<footer>
        <div class="footer-content">
            <p>Last updated: <?= date("F j, Y", filemtime("data.json")) ?></p>
            <p>&copy; <?= date("Y") ?> <?= $profile['name'] ?>. All rights reserved.</p>
        </div>
    </footer>
</body>
</html>