<?php global $conn;
include 'inc/header.php' ?>
<?php
$sql = 'SELECT * FROM feedback';
$result =mysqli_query($conn, $sql);
$feedbacks = mysqli_fetch_all($result, MYSQLI_ASSOC);
?>

<h2>Feedbacks</h2>

<?php if (empty($feedbacks)): ?>
    <p class="lead mt3">There is no any feedbacks yet.</p>
<?php endif; ?>

<?php foreach ($feedbacks as $feedback): ?>
    <div class="card my-3">
        <div class="card-body text-center">
            <?php echo $feedback['body'] ?>
            <div class="text-secondary mt-2">
                By <?php echo $feedback['name']?> on <?php echo $feedback['date'] ?>
            </div>
        </div>
    </div>
<?php endforeach; ?>

<?php include 'inc/footer.php' ?>
