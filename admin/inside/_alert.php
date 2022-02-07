<div class="alert alert-<?php echo $type; ?> alert-dismissible fade show" id="alert" role="alert">
    <audio src="../music/<?php echo $type == 'danger' ? 'error' : $type; ?>.mp3" autoplay></audio>
    <strong class="text-uppercase"><?php echo $type == 'danger' ? 'Error' : 'Congo'; ?>!!</strong> <?php echo $message; ?>
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>

<script>
    setTimeout(() => {
        document.getElementById('alert').classList.remove('show');
    }, 3000);
</script>