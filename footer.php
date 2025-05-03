<footer class="footer mt-5 py-4 bg-light border-top">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-md-6 text-center text-md-start">
                <p class="text-muted mb-0">
                    Last updated: <?= date("F j, Y", filemtime("data.json")) ?>
                </p>
            </div>
            <div class="col-md-6 text-center text-md-end mt-3 mt-md-0">
                <p class="mb-0">
                    &copy; <?= date("Y") ?> <?= htmlspecialchars($profile['name']) ?>. All rights reserved.
                </p>
            </div>
        </div>
    </div>
</footer>

<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>