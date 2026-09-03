<div class="container p-3">
    <div class="card">
        <div class="card-body">
            <h2><?php echo htmlspecialchars($serviceHeader ?? 'Service Management') ?></h2>

            <?php
            // Initialize service variable properly
            $service = $service ?? 'default';
            $newService = new ServiceController();
            $results = $newService->showServices($service);
            ?>

            <p class="text-info">Current Services and Prices</p>
            <p class="text-info">To modify a service, change the service name and price, then click the "Modify" button.</p>

            <?php if (!empty($results)): ?>
                <?php foreach ($results as $result): ?>
                    <form action="../includes/service.inc.php" method="post" class="service-form mb-2">
                        <!-- Add CSRF token if available -->
                        <?php if (isset($_SESSION['csrf_token'])): ?>
                            <input type="hidden" name="csrf_token"
                                value="<?php echo htmlspecialchars($_SESSION['csrf_token'], ENT_QUOTES); ?>">
                        <?php endif; ?>

                        <input type="hidden" name="id" value="<?php echo htmlspecialchars($result["id"]) ?>">
                        <input type="hidden" name="type" value="<?php echo htmlspecialchars($result["type"]) ?>">
                        <input type="hidden" name="page" value="<?php echo htmlspecialchars($page ?? 'index') ?>">

                        <div class="row align-items-center">
                            <div class="col-md-6 col-sm-12 pb-2">
                                <input type="text" class="form-control" placeholder="Service name" name="service"
                                    value="<?php echo htmlspecialchars($result["service"]) ?>" required>
                            </div>
                            <div class="col-md-2 col-sm-6 pb-2">
                                <input type="number" class="form-control" placeholder="Price" name="price"
                                    value="<?php echo htmlspecialchars($result["price"]) ?>" min="0" step="0.01" required>
                            </div>
                            <div class="col-md-4 col-sm-6 pb-2">
                                <div class="btn-group w-100" role="group">
                                    <button type="submit" class="btn btn-primary btn-sm" name="modify">
                                        <i class="fas fa-edit"></i> Modify
                                    </button>
                                    <button type="submit" class="btn btn-danger btn-sm delete-btn" name="delete"
                                        onclick="return confirm('Are you sure you want to delete this service?')">
                                        <i class="fas fa-trash"></i> Delete
                                    </button>
                                </div>
                            </div>
                        </div>
                    </form>
                <?php endforeach; ?>
            <?php else: ?>
                <div class="alert alert-info">
                    <i class="fas fa-info-circle"></i> No services found. Add a new service below.
                </div>
            <?php endif; ?>

            <hr class="my-4">

            <p class="text-info">
                <i class="fas fa-plus-circle"></i> Add a New Service
            </p>

            <form action="../includes/service.inc.php" method="post" class="mt-3">
                <!-- Add CSRF token if available -->
                <?php if (isset($_SESSION['csrf_token'])): ?>
                    <input type="hidden" name="csrf_token"
                        value="<?php echo htmlspecialchars($_SESSION['csrf_token'], ENT_QUOTES); ?>">
                <?php endif; ?>

                <input type="hidden" name="type" value="<?php echo htmlspecialchars($service) ?>">
                <input type="hidden" name="page" value="<?php echo htmlspecialchars($page ?? 'index') ?>">

                <div class="row align-items-end">
                    <div class="col-md-6 col-sm-12 pb-2">
                        <label for="new-service" class="form-label text-muted">Service Name</label>
                        <input type="text" id="new-service" class="form-control" placeholder="Enter service name"
                            name="service" required>
                    </div>
                    <div class="col-md-2 col-sm-6 pb-2">
                        <label for="new-price" class="form-label text-muted">Price</label>
                        <input type="number" id="new-price" class="form-control" placeholder="0.00" name="price" min="0"
                            step="0.01" required>
                    </div>
                    <div class="col-md-4 col-sm-6 pb-2">
                        <button type="submit" class="btn btn-success w-100" name="add">
                            <i class="fas fa-plus"></i> Add New Service
                        </button>
                    </div>
                </div>
            </form>

            <!-- Messages and Navigation -->
            <div class="row mt-4">
                <div class="col-md-8 col-sm-12">
                    <?php
                    $message = $_GET['message'] ?? '';
                    if ($message) {

                        // Determine message type based on content or add a message type session variable
                        $messageClass = 'alert-info';
                        if (
                            strpos(strtolower($message), 'error') !== false || strpos(strtolower($message), 'invalid') !== false ||
                            strpos(strtolower($message), 'please') !== false
                        ) {
                            $messageClass = 'alert-danger';
                        } elseif (strpos(strtolower($message), 'successfully') !== false || strpos(strtolower($message), 'added') !== false) {
                            $messageClass = 'alert-success';
                        }

                        echo '<div class="alert ' . $messageClass . ' alert-dismissible fade show" role="alert">';
                        echo '<i class="fas fa-info-circle"></i> ' . htmlspecialchars($message);
                        echo '<button type="button" class="btn-close" data-bs-dismiss="alert"></button>';
                        echo '</div>';

                        /// Clear the message after displaying
                        unset($_GET['message']);
                    }
                    ?>
                </div>
                <div class="col-md-4 col-sm-12">
                    <a href="index.php#services" class="btn btn-outline-primary w-100">
                        <i class="fas fa-arrow-left"></i> Go to Services Page
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>

<style>
    .service-form {
        background-color: #f8f9fa;
        padding: 1rem;
        border-radius: 0.375rem;
        border-left: 4px solid #0d6efd;
    }

    .service-form:hover {
        box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        transition: box-shadow 0.2s ease-in-out;
    }

    .delete-btn:hover {
        background-color: #dc3545 !important;
    }

    @media (max-width: 576px) {
        .btn-group {
            display: flex;
            flex-direction: column;
        }

        .btn-group .btn {
            margin-bottom: 0.25rem;
        }
    }
</style>